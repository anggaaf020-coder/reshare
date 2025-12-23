<?php
require_once __DIR__ . '/../config/connection.php';

$sql = "
  SELECT 
    u.id,
    u.username,
    COUNT(i.id) AS total
  FROM users u
  JOIN items i ON i.user_id = u.id
  GROUP BY u.id
  ORDER BY total DESC
  LIMIT 5
";

$result = $conn->query($sql);

$topDonatur = [];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $topDonatur[] = $row;
  }
}
