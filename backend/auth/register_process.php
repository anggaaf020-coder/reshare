<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

validatePostRequest();

if (!rateLimitCheck('register', 3, 600)) {
    $_SESSION['error'] = 'Too many registration attempts. Please try again later.';
    redirect('../../frontend/register.php');
}

$nama = sanitize($_POST['username'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$nomor = sanitize($_POST['nomor'] ?? '');

if (empty($nama) || empty($email) || empty($password) || empty($nomor)) {
    $_SESSION['error'] = 'All fields are required';
    redirect('../../frontend/register.php');
}

if (!validateEmail($email)) {
    $_SESSION['error'] = 'Invalid email format';
    redirect('../../frontend/register.php');
}

if (strlen($password) < 6) {
    $_SESSION['error'] = 'Password must be at least 6 characters';
    redirect('../../frontend/register.php');
}

try {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        $_SESSION['error'] = 'Email already registered';
        redirect('../../frontend/register.php');
    }

    $hashedPassword = hashPassword($password);

    $stmt = $pdo->prepare("
        INSERT INTO users (nama, email, password, nomor, created_at)
        VALUES (?, ?, ?, ?, NOW())
        RETURNING id
    ");

    $stmt->execute([$nama, $email, $hashedPassword, $nomor]);
    $user = $stmt->fetch();

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_nama'] = $nama;
    $_SESSION['user_email'] = $email;
    $_SESSION['success'] = 'Registration successful!';

    redirect('../../frontend/home.php');

} catch (PDOException $e) {
    $_SESSION['error'] = 'Registration failed. Please try again.';
    redirect('../../frontend/register.php');
}
?>
