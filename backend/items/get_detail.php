<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

$id = intval($_GET['id'] ?? 0);

$sql = "
SELECT 
  i.id,
  i.nama_barang,
  i.kategori,
  i.kondisi,
  i.deskripsi,
  i.alamat,
  i.foto,
  i.status,
  u.username,
  u.phone
FROM items i
JOIN users u ON i.user_id = u.id
WHERE i.id = ? AND i.status = 'available'
";

$stmt = $conn->prepare($sql);

if (!$stmt) {
  die('SQL ERROR: ' . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();

$item = $stmt->get_result()->fetch_assoc();

if (!$item) {
  exit('Barang tidak ditemukan atau sudah diambil');
}

$isRequested = false;
$requestStatus = null;

if (isset($_SESSION['user_id'])) {
  $uid = $_SESSION['user_id'];

  $stmtReq = $conn->prepare("
    SELECT status
    FROM item_requests
    WHERE item_id = ? AND requester_id = ?
    LIMIT 1
  ");
  $stmtReq->bind_param("ii", $item['id'], $uid);
  $stmtReq->execute();
  $req = $stmtReq->get_result()->fetch_assoc();

if ($req) {
  $requestStatus = $req['status'];

  if ($req['status'] === 'pending') {
    $isRequested = true;   
  } else {
    $isRequested = false;  
  }
}
}