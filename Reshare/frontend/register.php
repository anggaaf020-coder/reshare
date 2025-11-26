<?php 
include 'koneksi.php';
session_start();

if(isset($_SESSION['isLogin'])) {
    header('location:welcome_page.php');
    exit;
}

if(isset($_POST['button'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];

    $cek_query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $cek_query);

    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Username sudah digunakan, silahkan coba lagi😉');</script>";
    } else {
        // Simpan data
        $query = "INSERT INTO user (username, password, email, hp) 
                  VALUES ('$username', '$password','$email','$hp')";
        $insert = mysqli_query($koneksi, $query);

        if($insert){
            // Set session
            $_SESSION['username'] = $username;
            $_SESSION['isLogin'] = true;

            // Redirect ke home
            header('Location: home.php');
            exit;
        } else {
            echo "<script>alert('Registrasi gagal');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="register.php" method="POST" class="form-container">
        <h1>Selamat datang di Reshare </h1>
        <p> Username : <input type="text" name="username" id="" required ></p>
        <p> Password : <input type="password" name="password" id="" required></p>
        <p> Email : <input type="text" name="email" required></p>
        <p> No. Telepon : <input type="number" name="hp" required></p>
        <button type="submit" name="button"> Submit </button>
        <p>Sudah punya akun? <a href="login.php">klik disini.</a></p>
    </form>
</body>
</html>