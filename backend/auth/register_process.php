<?php
    session_start();
    require_once '../config/connection.php';

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $phone    = trim($_POST['phone']);

    if ($username === '' || $email === '' || $password === '' || $phone === '') {
        $_SESSION['error'] = 'Semua field wajib diisi';
        header('Location: ../../frontend/register.php');
        exit;
    }

    // CEK USERNAME SUDAH ADA ATAU BELUM
    $cek = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $result = $cek->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = 'Username sudah digunakan';
        header('Location: ../../frontend/register.php');
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insert = $conn->prepare(
        "INSERT INTO users (username, email, password, phone)
        VALUES (?, ?, ?, ?)"
    );
    $insert->bind_param("ssss", $username, $email, $hashedPassword, $phone);
    $insert->execute();

    $_SESSION['success'] = 'Registrasi berhasil, silakan login';
    header('Location: ../../frontend/login.php');
exit;
