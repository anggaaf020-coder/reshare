<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

if (!isset($_SESSION['login'])) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$username = trim($_POST['username'] ?? '');
$userId   = $_SESSION['user_id'];

if (strlen($username) < 3) {
    echo json_encode([
        'status' => 'invalid',
        'message' => 'Username minimal 3 karakter'
    ]);
    exit;
}

$stmt = $conn->prepare(
    "SELECT id FROM users WHERE username = ? AND id != ?"
);
$stmt->bind_param("si", $username, $userId);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode([
        'status' => 'taken',
        'message' => 'Username sudah digunakan'
    ]);
} else {
    echo json_encode([
        'status' => 'available',
        'message' => 'Username tersedia'
    ]);
}

$stmt->close();
