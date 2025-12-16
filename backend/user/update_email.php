<?php
session_start();
require_once __DIR__ . '/../config/connection.php';


if (!isset($_SESSION['login'])) {
    header("Location: ../../frontend/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../frontend/settings/ganti_email.php");
    exit;
}

$userId   = $_SESSION['user_id'];
$newEmail = trim($_POST['new_email'] ?? '');

// ================= VALIDASI =================
if (empty($newEmail)) {
    $_SESSION['error'] = 'Email baru wajib diisi';
    header("Location: ../../frontend/settings/ganti_email.php");
    exit;
}

if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Format email tidak valid';
    header("Location: ../../frontend/settings/ganti_email.php");
    exit;
}

// ================= CEK EMAIL SUDAH DIGUNAKAN =================
$cek = $conn->prepare(
    "SELECT id FROM users WHERE email = ? AND id != ?"
);
$cek->bind_param("si", $newEmail, $userId);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    $_SESSION['error'] = 'Email telah digunakan';
    $cek->close();
    header("Location: ../../frontend/settings/ganti_email.php");
    exit;
}
$cek->close();

// ================= UPDATE =================
$update = $conn->prepare(
    "UPDATE users SET email = ? WHERE id = ?"
);
$update->bind_param("si", $newEmail, $userId);

if ($update->execute()) {
    $_SESSION['email']   = $newEmail; // sinkron session
    $_SESSION['success'] = 'Email berhasil diubah';
    $update->close();

    header("Location: ../../frontend/home.php?updated=email");
    exit;
}

$update->close();
$_SESSION['error'] = 'Gagal mengubah email';
header("Location: ../../frontend/settings/ganti_email.php");
exit;
