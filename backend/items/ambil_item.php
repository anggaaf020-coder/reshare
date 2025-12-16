<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

if (!isset($_SESSION['user_id'])) exit;

$item_id = $_POST['item_id'];
$user_id = $_SESSION['user_id'];
$redirect = $_POST['redirect'] ?? '../../frontend/katalog.php';

$stmt = $conn->prepare("
  UPDATE items
  SET status='taken',
      taken_by=?,
      taken_at=NOW()
  WHERE id=? AND status='available'
");
$stmt->bind_param("ii", $user_id, $item_id);
$stmt->execute();

header("Location: $redirect");
exit;
