<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

requireLogin();
validatePostRequest();

$userId = getCurrentUserId();
$oldEmail = sanitize($_POST['old_email'] ?? '');
$newEmail = sanitize($_POST['new_email'] ?? '');

if (empty($oldEmail) || empty($newEmail)) {
    $_SESSION['error'] = 'Both fields are required';
    redirect('../../frontend/settings/ganti_email.php');
}

if (!validateEmail($newEmail)) {
    $_SESSION['error'] = 'Invalid email format';
    redirect('../../frontend/settings/ganti_email.php');
}

try {
    setUserContext($pdo, $userId);

    $stmt = $pdo->prepare("SELECT email FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();

    if ($user['email'] !== $oldEmail) {
        $_SESSION['error'] = 'Old email does not match';
        redirect('../../frontend/settings/ganti_email.php');
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
    $stmt->execute([$newEmail, $userId]);

    if ($stmt->fetch()) {
        $_SESSION['error'] = 'Email already in use';
        redirect('../../frontend/settings/ganti_email.php');
    }

    $stmt = $pdo->prepare("UPDATE users SET email = ? WHERE id = ?");
    $stmt->execute([$newEmail, $userId]);

    $_SESSION['user_email'] = $newEmail;
    $_SESSION['success'] = 'Email updated successfully!';
    redirect('../../frontend/home.php');

} catch (PDOException $e) {
    $_SESSION['error'] = 'Failed to update email';
    redirect('../../frontend/settings/ganti_email.php');
}
?>
