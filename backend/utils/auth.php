<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/connection.php';

function getLoggedInUser()
{
    global $conn;

    if (!isset($_SESSION['user_id'])) {
        return null;
    }

    $stmt = $conn->prepare("
        SELECT username, email, phone 
        FROM users 
        WHERE id = ?
        LIMIT 1
    ");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();

    return $stmt->get_result()->fetch_assoc();
}
