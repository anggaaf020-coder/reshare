<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

/* ================= PROTEKSI LOGIN ================= */
if (!isset($_SESSION['login'], $_SESSION['user_id'])) {
    header("Location: ../../frontend/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../frontend/upload_barang.php");
    exit;
}

/* ================= AMBIL DATA ================= */
$user_id   = $_SESSION['user_id'];
$nama      = trim($_POST['nama_barang'] ?? '');
$kategori  = $_POST['kategori'] ?? '';
$kondisi   = $_POST['kondisi'] ?? '';
$alamat    = trim($_POST['alamat'] ?? '');
$deskripsi = trim($_POST['deskripsi'] ?? '');

/* ================= VALIDASI FIELD ================= */
if (
    empty($nama) ||
    empty($kategori) ||
    empty($kondisi) ||
    empty($alamat) ||
    empty($deskripsi)
) {
    $_SESSION['error'] = 'Semua field tidak boleh kosong.';
    header("Location: ../../frontend/upload_barang.php");
    exit;
}

/* ================= VALIDASI FOTO ================= */
if (
    !isset($_FILES['foto']) ||
    $_FILES['foto']['error'] !== UPLOAD_ERR_OK
) {
    $_SESSION['error'] = 'Foto barang wajib diupload.';
    header("Location: ../../frontend/upload_barang.php");
    exit;
}

$foto = $_FILES['foto'];
$ext  = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
$allowExt = ['jpg', 'jpeg', 'png', 'webp'];

if (!in_array($ext, $allowExt)) {
    $_SESSION['error'] = 'Format foto tidak didukung (jpg, jpeg, png, webp).';
    header("Location: ../../frontend/upload_barang.php");
    exit;
}

/* ================= UPLOAD FOTO ================= */
$namaFile = uniqid('item_') . '.' . $ext;
$folder   = __DIR__ . '/../../assets/images/items/';
$pathDB   = 'assets/images/items/' . $namaFile;

if (!is_dir($folder)) {
    mkdir($folder, 0755, true);
}

if (!move_uploaded_file($foto['tmp_name'], $folder . $namaFile)) {
    $_SESSION['error'] = 'Gagal mengupload foto barang.';
    header("Location: ../../frontend/upload_barang.php");
    exit;
}

/* ================= INSERT DATABASE ================= */
$stmt = $conn->prepare("
    INSERT INTO items
    (user_id, nama_barang, kategori, kondisi, deskripsi, alamat, foto)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "issssss",
    $user_id,
    $nama,
    $kategori,
    $kondisi,
    $deskripsi,
    $alamat,
    $pathDB
);

$stmt->execute();
$stmt->close();

/* ================= SUCCESS ================= */
$_SESSION['success'] = 'Barang berhasil ditambahkan.';
header("Location: ../../frontend/home.php");
exit;
