<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

$request_id = $_POST['request_id'] ?? null;
if (!$request_id) exit;

$conn->begin_transaction();

/* Ambil request */
$q = $conn->prepare("
  SELECT r.item_id, r.requester_id
  FROM item_requests r
  WHERE r.id = ? AND r.status = 'pending'
");
$q->bind_param("i", $request_id);
$q->execute();
$data = $q->get_result()->fetch_assoc();

if (!$data) {
  $conn->rollback();
  exit;
}

$item_id = $data['item_id'];
$requester = $data['requester_id'];

/* Update item */
$u1 = $conn->prepare("
  UPDATE items
  SET status = 'taken', taken_by = ?, taken_at = NOW()
  WHERE id = ?
");
$u1->bind_param("ii", $requester, $item_id);
$u1->execute();

/* Accept request */
$u2 = $conn->prepare("
  UPDATE item_requests SET status = 'accepted'
  WHERE id = ?
");
$u2->bind_param("i", $request_id);
$u2->execute();

/* Reject request lain */
$u3 = $conn->prepare("
  UPDATE item_requests
  SET status = 'rejected'
  WHERE item_id = ? AND id != ?
");
$u3->bind_param("ii", $item_id, $request_id);
$u3->execute();

$conn->commit();
header("Location: ../../frontend/inbox.php");
