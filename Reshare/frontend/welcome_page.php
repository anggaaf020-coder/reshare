<?php
session_start();
    include 'koneksi.php';
    $username = $_SESSION['username'];

    if(isset($_POST['logout'])) {
        session_destroy();
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php include 'nav.html'; ?>
    <div>
        <!-- Section 1 -->
        <h1>Selamat Datang <span><?= $_SESSION['username'] ?></span> di ReShare</h1>
        <p>ReShare merupakan platform yang menyediakan tempat untuk saling membantu dan mendukung satu sama lain. 
        Melalui ReShare siapapun dapat berbagi barang layak pakai bagi mereka yang membutuhkan tanpa mengeluarkan biaya.
        Kami percaya setiap barang memiliki kesempatan untuk digunakan kembali bukan untuk di buang.
        ReShare menjadi jembatan bagi mereka yang ingin memberi dan untuk mereka yanng membutuhkan.</p>

        <!-- Section 2 -->
        <h1>Kurangi Sampah Hari ini, Berbagi Kebaikan Selamanya</h1>
        <p>ReShare hadir sebagai bentuk kepedulian terhadap lingkungan dengan memaksimalkan penggunaan barang bekas yang masih layak pakai.
        Dengan membangun komunitas yang peduli terhadap lingkungan, ReShare mengajak setiap individu untuk berkontribusi dalam mengurangi 
        limbah dan menciptakan bumi yang lebih bersih dan berkelanjutan.</p>
    </div>
    <form action="" method="post">
    <button type="submit" name="logout">logout</button>
    </form>
</body>
</html>