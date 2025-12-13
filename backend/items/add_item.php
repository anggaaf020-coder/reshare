<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

requireLogin();
validatePostRequest();

$userId = getCurrentUserId();
$namaBarang = sanitize($_POST['nama_barang'] ?? '');
$deskripsi = sanitize($_POST['deskripsi'] ?? '');
$deskripsiSingkat = sanitize($_POST['deskripsi_singkat'] ?? '');
$kategori = sanitize($_POST['kategori'] ?? '');
$kondisi = sanitize($_POST['kondisi'] ?? '');
$alamat = sanitize($_POST['alamat'] ?? '');

if (empty($namaBarang) || empty($deskripsi) || empty($kategori) || empty($kondisi) || empty($alamat)) {
    $_SESSION['error'] = 'All fields are required';
    redirect('../../frontend/upload_barang.php');
}

if (empty($deskripsiSingkat)) {
    $deskripsiSingkat = substr($deskripsi, 0, 100);
}

$foto = 'default.jpg';
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $uploadResult = uploadImage($_FILES['foto'], '../../assets/items/');
    if ($uploadResult['success']) {
        $foto = $uploadResult['filename'];
    } else {
        $_SESSION['error'] = $uploadResult['message'];
        redirect('../../frontend/upload_barang.php');
    }
}

try {
    setUserContext($pdo, $userId);

    $stmt = $pdo->prepare("
        INSERT INTO item (user_id, nama_barang, deskripsi, deskripsi_singkat, kategori, kondisi, foto, status, alamat, created_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, 'tersedia', ?, NOW())
        RETURNING item_id
    ");

    $stmt->execute([$userId, $namaBarang, $deskripsi, $deskripsiSingkat, $kategori, $kondisi, $foto, $alamat]);

    $_SESSION['success'] = 'Item added successfully!';
    redirect('../../frontend/katalog.php');

} catch (PDOException $e) {
    $_SESSION['error'] = 'Failed to add item. Please try again.';
    redirect('../../frontend/upload_barang.php');
}
?>
