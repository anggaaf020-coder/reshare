<?php
require_once '../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../frontend/register.php');
    exit;
}

// ================= AMBIL INPUT =================
$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';

// ================= VALIDASI =================
if ($username === '' || $email === '' || $phone === '' || $password === '') {
    die('❌ Semua field wajib diisi');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('❌ Format email tidak valid');
}

if (strlen($password) < 6) {
    die('❌ Password minimal 6 karakter');
}

// ================= CEK DUPLIKASI =================
$cek = $conn->prepare(
    "SELECT id FROM users WHERE username = ? OR email = ?"
);
$cek->bind_param("ss", $username, $email);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    die('❌ Username atau email sudah digunakan');
}
$cek->close();

// ================= SIMPAN USER =================
$password_hash = password_hash($password, PASSWORD_BCRYPT);

$stmt = $conn->prepare(
    "INSERT INTO users (username, email, password, phone)
     VALUES (?, ?, ?, ?)"
);

$stmt->bind_param("ssss", $username, $email, $password_hash, $phone);

if ($stmt->execute()) {
    header("Location: ../../frontend/login.php?register=success");
    exit;
} else {
    die('❌ Registrasi gagal');
}

$stmt->close();
$conn->close();
?>