<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';

$kategori = $_GET['kategori'] ?? '';
$search = $_GET['search'] ?? '';
$status = $_GET['status'] ?? 'tersedia';

try {
    $sql = "
        SELECT
            i.item_id,
            i.nama_barang,
            i.deskripsi_singkat,
            i.kategori,
            i.kondisi,
            i.foto,
            i.status,
            i.created_at,
            u.nama as donatur
        FROM item i
        JOIN users u ON i.user_id = u.id
        WHERE i.status = ?
    ";

    $params = [$status];

    if (!empty($kategori)) {
        $sql .= " AND i.kategori = ?";
        $params[] = $kategori;
    }

    if (!empty($search)) {
        $sql .= " AND (i.nama_barang ILIKE ? OR i.deskripsi ILIKE ?)";
        $searchParam = "%$search%";
        $params[] = $searchParam;
        $params[] = $searchParam;
    }

    $sql .= " ORDER BY i.created_at DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $items = $stmt->fetchAll();

    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'data' => $items
    ]);

} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Failed to fetch items'
    ]);
}
?>
