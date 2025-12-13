<?php include 'koneksi.php';
session_start();

if(isset($_SESSION['login'])) {
    header('location:welcome_page.php');
}

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $login = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $login);

        if($result->num_rows > 0){
            echo "Login Sukses";
            $data = $result->fetch_assoc();
            $_SESSION['username'] = $data['username'];
            $_SESSION['login'] = true;
            header('location:welcome_page.php');
        } else {
           echo "<script>alert('⚠️Login gagal⚠️ Silahkan periksa ulang username atau password🙏');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post" class="form-container">
        <h1>Selamat Datang di Reshare</h1>
        <p> Username : <input type="text" name="username" id=""></p>
        <p> Password : <input type="password" name="password" id=""></p>
        <button type="submit" name="login"> Submit </button>
        <p>Belum punya akun? <a href="register.php">klik disini.</a></p>
    </form>
</body>
</html>