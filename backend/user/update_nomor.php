<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

// ================= PROTEKSI LOGIN =================
if (empty($_SESSION['login']) || empty($_SESSION['user_id'])) {
    header("Location: ../../frontend/login.php");
    exit;
}

// ================= PROTEKSI METHOD =================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../frontend/settings/ganti_nomor.php");
    exit;
}

$userId   = (int) $_SESSION['user_id'];
$newPhone = trim($_POST['new_phone'] ?? '');

// ================= VALIDASI =================
if ($newPhone === '') {
    $_SESSION['error'] = 'Nomor telepon wajib diisi';
    header("Location: ../../frontend/settings/ganti_nomor.php");
    exit;
}

// hanya angka, panjang 10–15 digit
if (!preg_match('/^[0-9]{10,15}$/', $newPhone)) {
    $_SESSION['error'] = 'Nomor telepon tidak valid';
    header("Location: ../../frontend/settings/ganti_nomor.php");
    exit;
}

// ================= CEK DUPLIKASI =================
$cek = $conn->prepare(
    "SELECT id FROM users WHERE phone = ? AND id != ? LIMIT 1"
);
$cek->bind_param("si", $newPhone, $userId);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    $_SESSION['error'] = 'Nomor telepon sudah digunakan';
    $cek->close();
    header("Location: ../../frontend/settings/ganti_nomor.php");
    exit;
}
$cek->close();

// ================= UPDATE =================
$update = $conn->prepare(
    "UPDATE users SET phone = ? WHERE id = ? LIMIT 1"
);
$update->bind_param("si", $newPhone, $userId);

if (!$update->execute()) {
    // SQL error nyata
    $error = $update->error;
    $update->close();
    die("Database error: " . $error);
}

// ❗ INI BAGIAN PALING PENTING
if ($update->affected_rows === 0) {
    $update->close();
    $_SESSION['error'] = 'Nomor tidak berubah atau data user tidak ditemukan';
    header("Location: ../../frontend/settings/ganti_nomor.php");
    exit;
}

// ================= SUKSES =================
$_SESSION['phone']   = $newPhone;
$_SESSION['success'] = 'Nomor telepon berhasil diubah';
$update->close();

header("Location: ../../frontend/home.php?updated=phone");
exit;
