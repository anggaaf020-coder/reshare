<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../frontend/login.php");
    exit;
}

// ================= AMBIL INPUT =================
$identifier = trim($_POST['identifier'] ?? ''); // username atau email
$password   = $_POST['password'] ?? '';

// ================= VALIDASI =================
if (empty($identifier) || empty($password)) {
    $_SESSION['error'] = 'Nama/Email dan password wajib diisi';
    header("Location: ../../frontend/login.php");
    exit;
}

// ================= CEK USER (USERNAME / EMAIL) =================
$stmt = $conn->prepare(
    "SELECT id, username, phone, email, password
     FROM users
     WHERE email = ? OR username = ?
     LIMIT 1"
);

$stmt->bind_param("ss", $identifier, $identifier);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = 'Nama/Email atau password salah';
    header("Location: ../../frontend/login.php");
    exit;
}

$user = $result->fetch_assoc();

// ================= VERIFIKASI PASSWORD =================
if (!password_verify($password, $user['password'])) {
    $_SESSION['error'] = 'Nama/Email atau password salah';
    header("Location: ../../frontend/login.php");
    exit;
}

// ================= LOGIN BERHASIL =================
$_SESSION['login']    = true;
$_SESSION['user_id']  = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['email']    = $user['email'];
$_SESSION['phone']    = $user['phone'];

$stmt->close();

header("Location: ../../frontend/welcome.php");
exit;
