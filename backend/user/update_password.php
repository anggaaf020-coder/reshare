<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

requireLogin();
validatePostRequest();

$userId = getCurrentUserId();
$oldPassword = $_POST['old_password'] ?? '';
$newPassword = $_POST['new_password'] ?? '';

if (empty($oldPassword) || empty($newPassword)) {
    $_SESSION['error'] = 'Both fields are required';
    redirect('../../frontend/settings/ganti_password.php');
}

if (strlen($newPassword) < 6) {
    $_SESSION['error'] = 'New password must be at least 6 characters';
    redirect('../../frontend/settings/ganti_password.php');
}

try {
    setUserContext($pdo, $userId);

    $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();

    if (!verifyPassword($oldPassword, $user['password'])) {
        $_SESSION['error'] = 'Old password is incorrect';
        redirect('../../frontend/settings/ganti_password.php');
    }

    $hashedPassword = hashPassword($newPassword);

    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->execute([$hashedPassword, $userId]);

    $_SESSION['success'] = 'Password updated successfully!';
    redirect('../../frontend/home.php');

} catch (PDOException $e) {
    $_SESSION['error'] = 'Failed to update password';
    redirect('../../frontend/settings/ganti_password.php');
}
?>
