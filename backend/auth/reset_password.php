<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

// ================= PROTEKSI METHOD =================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../frontend/settings/lupa_password.php");
    exit;
}

// ================= AMBIL DATA =================
$email            = trim($_POST['email'] ?? '');
$phone            = trim($_POST['phone'] ?? '');
$newPassword      = $_POST['new_password'] ?? '';
$confirmPassword  = $_POST['confirm_password'] ?? '';

// ================= VALIDASI =================
if (empty($email) || empty($phone) || empty($newPassword) || empty($confirmPassword)) {
    $_SESSION['error'] = 'Semua field wajib diisi';
    header("Location: ../../frontend/settings/lupa_password.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Format email tidak valid';
    header("Location: ../../frontend/settings/lupa_password.php");
    exit;
}

if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
    $_SESSION['error'] = 'Nomor HP tidak valid';
    header("Location: ../../frontend/settings/lupa_password.php");
    exit;
}

if (strlen($newPassword) < 8) {
    $_SESSION['error'] = 'Password minimal 8 karakter';
    header("Location: ../../frontend/settings/lupa_password.php");
    exit;
}

if ($newPassword !== $confirmPassword) {
    $_SESSION['error'] = 'Konfirmasi password tidak cocok';
    header("Location: ../../frontend/settings/lupa_password.php");
    exit;
}

// ================= CEK USER =================
$cek = $conn->prepare(
    "SELECT id FROM users WHERE email = ? AND phone = ?"
);
$cek->bind_param("ss", $email, $phone);
$cek->execute();
$result = $cek->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = 'Email dan nomor HP tidak ditemukan';
    $cek->close();
    header("Location: ../../frontend/settings/lupa_password.php");
    exit;
}

$user = $result->fetch_assoc();
$userId = $user['id'];
$cek->close();

// ================= UPDATE PASSWORD =================
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$update = $conn->prepare(
    "UPDATE users SET password = ? WHERE id = ?"
);
$update->bind_param("si", $hashedPassword, $userId);

if ($update->execute()) {
    $_SESSION['success'] = 'Password berhasil direset. Silakan login kembali.';
    $update->close();
    header("Location: ../../frontend/login.php");
    exit;
}

$update->close();
$_SESSION['error'] = 'Gagal mereset password';
header("Location: ../../frontend/settings/lupa_password.php");
exit;
