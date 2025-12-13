<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

validatePostRequest();

if (!rateLimitCheck('login', 5, 300)) {
    $_SESSION['error'] = 'Too many login attempts. Please try again in 5 minutes.';
    redirect('../../frontend/login.php');
}

$username = sanitize($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    $_SESSION['error'] = 'Username and password are required';
    redirect('../../frontend/login.php');
}

try {
    $stmt = $pdo->prepare("SELECT id, nama, email, password, nomor FROM users WHERE nama = ? OR email = ?");
    $stmt->execute([$username, $username]);

    $user = $stmt->fetch();

    if (!$user || !verifyPassword($password, $user['password'])) {
        $_SESSION['error'] = 'Invalid username or password';
        redirect('../../frontend/login.php');
    }

    session_regenerate_id(true);

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_nama'] = $user['nama'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_nomor'] = $user['nomor'];
    $_SESSION['success'] = 'Login successful!';

    redirect('../../frontend/home.php');

} catch (PDOException $e) {
    $_SESSION['error'] = 'Login failed. Please try again.';
    redirect('../../frontend/login.php');
}
?>
