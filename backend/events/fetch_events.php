<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';

$kategori = $_GET['kategori'] ?? '';
$search = $_GET['search'] ?? '';

try {
    $sql = "
        SELECT
            event_id,
            title,
            deskripsi,
            kategori,
            tanggal,
            lokasi,
            poster,
            contact,
            created_at
        FROM event
        WHERE tanggal >= CURRENT_DATE
    ";

    $params = [];

    if (!empty($kategori)) {
        $sql .= " AND kategori = ?";
        $params[] = $kategori;
    }

    if (!empty($search)) {
        $sql .= " AND (title ILIKE ? OR deskripsi ILIKE ?)";
        $searchParam = "%$search%";
        $params[] = $searchParam;
        $params[] = $searchParam;
    }

    $sql .= " ORDER BY tanggal ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $events = $stmt->fetchAll();

    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'data' => $events
    ]);

} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Failed to fetch events'
    ]);
}
?>
