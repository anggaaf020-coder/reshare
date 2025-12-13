<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

requireLogin();
validatePostRequest();

$userId = getCurrentUserId();
$itemId = $_POST['item_id'] ?? '';
$namaBarang = sanitize($_POST['nama_barang'] ?? '');
$deskripsi = sanitize($_POST['deskripsi'] ?? '');
$deskripsiSingkat = sanitize($_POST['deskripsi_singkat'] ?? '');
$kategori = sanitize($_POST['kategori'] ?? '');
$kondisi = sanitize($_POST['kondisi'] ?? '');
$alamat = sanitize($_POST['alamat'] ?? '');

if (empty($itemId) || empty($namaBarang) || empty($deskripsi) || empty($kategori) || empty($kondisi)) {
    $_SESSION['error'] = 'All fields are required';
    redirect('../../frontend/katalog.php');
}

try {
    setUserContext($pdo, $userId);

    $stmt = $pdo->prepare("SELECT foto, user_id FROM item WHERE item_id = ?");
    $stmt->execute([$itemId]);
    $item = $stmt->fetch();

    if (!$item) {
        $_SESSION['error'] = 'Item not found';
        redirect('../../frontend/katalog.php');
    }

    if ($item['user_id'] !== $userId) {
        $_SESSION['error'] = 'Unauthorized action';
        redirect('../../frontend/katalog.php');
    }

    $foto = $item['foto'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['foto'], '../../assets/items/');
        if ($uploadResult['success']) {
            $foto = $uploadResult['filename'];

            if ($item['foto'] !== 'default.jpg' && file_exists('../../assets/items/' . $item['foto'])) {
                unlink('../../assets/items/' . $item['foto']);
            }
        }
    }

    $stmt = $pdo->prepare("
        UPDATE item
        SET nama_barang = ?, deskripsi = ?, deskripsi_singkat = ?, kategori = ?, kondisi = ?, foto = ?, alamat = ?
        WHERE item_id = ? AND user_id = ?
    ");

    $stmt->execute([$namaBarang, $deskripsi, $deskripsiSingkat, $kategori, $kondisi, $foto, $alamat, $itemId, $userId]);

    $_SESSION['success'] = 'Item updated successfully!';
    redirect('../../frontend/detail_barang.php?id=' . $itemId);

} catch (PDOException $e) {
    $_SESSION['error'] = 'Failed to update item';
    redirect('../../frontend/katalog.php');
}
?>
