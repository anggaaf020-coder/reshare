<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';

$itemId = $_GET['id'] ?? '';

if (empty($itemId)) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Item ID required'
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT
            i.item_id,
            i.nama_barang,
            i.deskripsi,
            i.deskripsi_singkat,
            i.kategori,
            i.kondisi,
            i.foto,
            i.status,
            i.alamat,
            i.created_at,
            u.id as donatur_id,
            u.nama as donatur,
            u.email as donatur_email,
            u.nomor as donatur_nomor
        FROM item i
        JOIN users u ON i.user_id = u.id
        WHERE i.item_id = ?
    ");

    $stmt->execute([$itemId]);
    $item = $stmt->fetch();

    if (!$item) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => 'Item not found'
        ]);
        exit;
    }

    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'data' => $item
    ]);

} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Failed to fetch item details'
    ]);
}
?>
