<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';

$eventId = $_GET['id'] ?? '';

if (empty($eventId)) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Event ID required'
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("
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
        WHERE event_id = ?
    ");

    $stmt->execute([$eventId]);
    $event = $stmt->fetch();

    if (!$event) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => 'Event not found'
        ]);
        exit;
    }

    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'data' => $event
    ]);

} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Failed to fetch event details'
    ]);
}
?>
