<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

requireLogin();
validatePostRequest();

$userId = getCurrentUserId();
$itemId = $_POST['item_id'] ?? '';

if (empty($itemId)) {
    $_SESSION['error'] = 'Item ID required';
    redirect('../../frontend/katalog.php');
}

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("SELECT item_id, user_id, status FROM item WHERE item_id = ?");
    $stmt->execute([$itemId]);
    $item = $stmt->fetch();

    if (!$item) {
        $pdo->rollBack();
        $_SESSION['error'] = 'Item not found';
        redirect('../../frontend/katalog.php');
    }

    if ($item['status'] === 'diambil') {
        $pdo->rollBack();
        $_SESSION['error'] = 'Item already taken';
        redirect('../../frontend/detail_barang.php?id=' . $itemId);
    }

    if ($item['user_id'] === $userId) {
        $pdo->rollBack();
        $_SESSION['error'] = 'You cannot take your own item';
        redirect('../../frontend/detail_barang.php?id=' . $itemId);
    }

    $stmt = $pdo->prepare("UPDATE item SET status = 'diambil' WHERE item_id = ?");
    $stmt->execute([$itemId]);

    $stmt = $pdo->prepare("
        INSERT INTO transaksi (item_id, donor_id, penerima_id, tanggal)
        VALUES (?, ?, ?, NOW())
    ");
    $stmt->execute([$itemId, $item['user_id'], $userId]);

    $pdo->commit();

    $_SESSION['success'] = 'Item successfully claimed! Please contact the donor.';
    redirect('../../frontend/detail_barang.php?id=' . $itemId);

} catch (PDOException $e) {
    $pdo->rollBack();
    $_SESSION['error'] = 'Failed to claim item. Please try again.';
    redirect('../../frontend/detail_barang.php?id=' . $itemId);
}
?>
