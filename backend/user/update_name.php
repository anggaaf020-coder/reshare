<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

// ================= PROTEKSI =================
if (!isset($_SESSION['login']) || !isset($_SESSION['user_id'])) {
    header("Location: ../../frontend/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../frontend/settings/rename.php");
    exit;
}

// ================= AMBIL DATA =================
$newUsername = trim($_POST['new_username'] ?? '');
$userId      = $_SESSION['user_id'];

// ================= VALIDASI =================
if ($newUsername === '') {
    $_SESSION['error'] = 'Username baru wajib diisi';
    header("Location: ../../frontend/settings/rename.php");
    exit;
}

if (strlen($newUsername) < 3) {
    $_SESSION['error'] = 'Username minimal 3 karakter';
    header("Location: ../../frontend/settings/rename.php");
    exit;
}

// ================= CEK DUPLIKASI =================
$cek = $conn->prepare(
    "SELECT id FROM users WHERE username = ? AND id != ?"
);
$cek->bind_param("si", $newUsername, $userId);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    $_SESSION['error'] = 'Username sudah digunakan';
    $cek->close();
    header("Location: ../../frontend/settings/rename.php");
    exit;
}
$cek->close();

// ================= UPDATE =================
$update = $conn->prepare(
    "UPDATE users SET username = ? WHERE id = ?"
);
$update->bind_param("si", $newUsername, $userId);

if ($update->execute()) {
    // 🔥 INI KUNCI AGAR DROPDOWN LANGSUNG BERUBAH
    $_SESSION['username'] = $newUsername;

    $_SESSION['success'] = 'Username berhasil diperbarui';
    $update->close();

    header("Location: ../../frontend/home.php?updated=username");
    exit;
}

$update->close();
$_SESSION['error'] = 'Gagal mengubah username';
header("Location: ../../frontend/settings/rename.php");
exit;
