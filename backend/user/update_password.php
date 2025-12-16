<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

// ================= PROTEKSI =================
if (empty($_SESSION['login']) || empty($_SESSION['user_id'])) {
    header("Location: ../../frontend/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../frontend/settings/ganti_password.php");
    exit;
}

$userId = (int) $_SESSION['user_id'];

$oldPass = $_POST['old_password'] ?? '';
$newPass = $_POST['new_password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// ================= VALIDASI =================
if ($oldPass === '' || $newPass === '' || $confirm === '') {
    $_SESSION['error'] = 'Semua field wajib diisi';
    header("Location: ../../frontend/settings/ganti_password.php");
    exit;
}

if ($newPass !== $confirm) {
    $_SESSION['error'] = 'Konfirmasi password tidak cocok';
    header("Location: ../../frontend/settings/ganti_password.php");
    exit;
}

if (strlen($newPass) < 8) {
    $_SESSION['error'] = 'Password minimal 8 karakter';
    header("Location: ../../frontend/settings/ganti_password.php");
    exit;
}

// ================= CEK PASSWORD LAMA =================
$stmt = $conn->prepare(
    "SELECT password FROM users WHERE id = ? LIMIT 1"
);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    $_SESSION['error'] = 'User tidak ditemukan';
    header("Location: ../../frontend/settings/ganti_password.php");
    exit;
}

$user = $result->fetch_assoc();
$stmt->close();

if (!password_verify($oldPass, $user['password'])) {
    $_SESSION['error'] = 'Password lama salah';
    header("Location: ../../frontend/settings/ganti_password.php");
    exit;
}

// ================= UPDATE PASSWORD =================
$newHash = password_hash($newPass, PASSWORD_DEFAULT);

$update = $conn->prepare(
    "UPDATE users SET password = ? WHERE id = ? LIMIT 1"
);
$update->bind_param("si", $newHash, $userId);

if (!$update->execute()) {
    die("Database error: " . $update->error);
}

$update->close();

$_SESSION['success'] = 'Password berhasil diubah';
header("Location: ../../frontend/home.php?updated=password");
exit;
