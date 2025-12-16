<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../../frontend/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('INVALID METHOD');
}

$user_id     = $_SESSION['user_id'];
$title       = $_POST['title'] ?? '';
$alamat      = $_POST['alamat'] ?? '';
$description = $_POST['description'] ?? '';
$event_date  = $_POST['event_date'] ?? '';
$poster      = $_FILES['poster'] ?? null;

/* VALIDASI */
/* VALIDASI */
if (!$title || !$alamat || !$description || !$event_date || !$poster || $poster['error'] !== UPLOAD_ERR_OK) {
    $_SESSION['error'] = 'Semua field wajib diisi, termasuk poster event.';
    header("Location: ../../frontend/upload_event.php");
    exit;
}

/* UPLOAD FOTO */
$ext = pathinfo($poster['name'], PATHINFO_EXTENSION);
$filename = uniqid('event_') . '.' . $ext;

$uploadDir = __DIR__ . '/../../assets/images/events/';
$target    = $uploadDir . $filename;

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (!move_uploaded_file($poster['tmp_name'], $target)) {
    exit('GAGAL UPLOAD POSTER');
}

/* INSERT DB */
$stmt = $conn->prepare(
    "INSERT INTO events
     (user_id, title, description, alamat, poster, event_date)
     VALUES (?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "isssss",
    $user_id,
    $title,
    $description,
    $alamat,
    $filename,
    $event_date
);

$stmt->execute();

/* REDIRECT */
header("Location: ../../frontend/event.php?success=1");
exit;
