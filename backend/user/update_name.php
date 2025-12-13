<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

requireLogin();
validatePostRequest();

$userId = getCurrentUserId();
$newUsername = sanitize($_POST['new_username'] ?? '');

if (empty($newUsername)) {
    $_SESSION['error'] = 'Username cannot be empty';
    redirect('../../frontend/settings/rename.php');
}

if (strlen($newUsername) < 3) {
    $_SESSION['error'] = 'Username must be at least 3 characters';
    redirect('../../frontend/settings/rename.php');
}

try {
    setUserContext($pdo, $userId);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE nama = ? AND id != ?");
    $stmt->execute([$newUsername, $userId]);

    if ($stmt->fetch()) {
        $_SESSION['error'] = 'Username already taken';
        redirect('../../frontend/settings/rename.php');
    }

    $stmt = $pdo->prepare("UPDATE users SET nama = ? WHERE id = ?");
    $stmt->execute([$newUsername, $userId]);

    $_SESSION['user_nama'] = $newUsername;
    $_SESSION['success'] = 'Username updated successfully!';
    redirect('../../frontend/home.php');

} catch (PDOException $e) {
    $_SESSION['error'] = 'Failed to update username';
    redirect('../../frontend/settings/rename.php');
}
?>
