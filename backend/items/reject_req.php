<?php
require_once __DIR__ . '/../config/connection.php';

$request_id = $_POST['request_id'] ?? null;
if (!$request_id) exit;

$stmt = $conn->prepare("
  UPDATE item_requests SET status = 'rejected'
  WHERE id = ?
");
$stmt->bind_param("i", $request_id);
$stmt->execute();

header("Location: ../../frontend/inbox.php");
