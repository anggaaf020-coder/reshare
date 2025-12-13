<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

requireLogin();
validatePostRequest();

$userId = getCurrentUserId();
$oldNomor = sanitize($_POST['old_nohp'] ?? '');
$newNomor = sanitize($_POST['new_nohp'] ?? '');

if (empty($oldNomor) || empty($newNomor)) {
    $_SESSION['error'] = 'Both fields are required';
    redirect('../../frontend/settings/ganti_nomor.php');
}

try {
    setUserContext($pdo, $userId);

    $stmt = $pdo->prepare("SELECT nomor FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();

    if ($user['nomor'] !== $oldNomor) {
        $_SESSION['error'] = 'Old phone number does not match';
        redirect('../../frontend/settings/ganti_nomor.php');
    }

    $stmt = $pdo->prepare("UPDATE users SET nomor = ? WHERE id = ?");
    $stmt->execute([$newNomor, $userId]);

    $_SESSION['user_nomor'] = $newNomor;
    $_SESSION['success'] = 'Phone number updated successfully!';
    redirect('../../frontend/home.php');

} catch (PDOException $e) {
    $_SESSION['error'] = 'Failed to update phone number';
    redirect('../../frontend/settings/ganti_nomor.php');
}
?>
