<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

if (!isset($_SESSION['user_id'])) {
  echo json_encode(['status'=>'unauthorized']);
  exit;
}

$item_id = $_POST['item_id'] ?? null;
$purpose = $_POST['purpose'] ?? null;
$alasan  = $_POST['alasan'] ?? null;
$user_id = $_SESSION['user_id'];

if (!$item_id || !$purpose || !$alasan) {
  echo json_encode(['status'=>'invalid']);
  exit;
}

/* CEK APAKAH SUDAH REQUEST */
$cek = $conn->prepare("
  SELECT id FROM item_requests
  WHERE item_id=? AND requester_id=? AND status IN ('pending','accepted')
");
$cek->bind_param("ii", $item_id, $user_id);
$cek->execute();

if ($cek->get_result()->num_rows > 0) {
  echo json_encode(['status'=>'exists']);
  exit;
}

/* INSERT REQUEST */
$stmt = $conn->prepare("
  INSERT INTO item_requests
  (item_id, requester_id, purpose, alasan, status)
  VALUES (?, ?, ?, ?, 'pending')
");
$stmt->bind_param("iiss", $item_id, $user_id, $purpose, $alasan);
$stmt->execute();

echo json_encode(['status'=>'success']);

$cekItem = $conn->prepare("
  SELECT status FROM items WHERE id = ?
");
$cekItem->bind_param("i", $item_id);
$cekItem->execute();
$item = $cekItem->get_result()->fetch_assoc();

if (!$item || $item['status'] === 'taken') {
  echo json_encode(['status' => 'taken']);
  exit;
}
