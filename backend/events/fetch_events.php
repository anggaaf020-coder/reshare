<?php
require_once __DIR__ . '/../config/connection.php';

$sql = "
    SELECT 
        e.id,
        e.title,
        e.poster,
        e.alamat,
        e.event_date,
        u.username,
        u.phone
    FROM events e
    JOIN users u ON e.user_id = u.id
    WHERE e.event_date >= CURDATE()
    ORDER BY e.event_date ASC
    LIMIT 6
";

$result = $conn->query($sql);
$events = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
?>