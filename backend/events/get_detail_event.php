<?php
require_once __DIR__ . '/../config/connection.php';

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("
SELECT 
  e.*,
  u.username,
  u.phone
FROM events e
JOIN users u ON e.user_id = u.id
WHERE e.id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

$event = $stmt->get_result()->fetch_assoc();

if (!$event) {
  exit('Event tidak ditemukan');
}
