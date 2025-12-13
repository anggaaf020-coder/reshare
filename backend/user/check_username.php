<?php
require_once '../config/connection.php';

$username = $_GET['username'] ?? '';

if (empty($username)) {
    echo 'invalid';
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE nama = ?");
    $stmt->execute([$username]);

    if ($stmt->fetch()) {
        echo 'taken';
    } else {
        echo 'available';
    }

} catch (PDOException $e) {
    echo 'error';
}
?>
