<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/main.css">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="h-screen">

    <div class="flex h-full">

        <div class="w-1/2 flex items-center justify-center px-10" style="background-color: var(--bg-body);">
            <img src="../assets/images/login-art.png" class="w-4/5 max-h-[85%] object-cover opacity-90 rounded-xl shadow-lg" alt="Login">
        </div>

        <div class="w-1/2 flex items-center justify-center px-16" style="background-color: #4A5D49;">

            <div class="w-full max-w-md text-white">

                <h1 class="text-3xl font-semibold text-center tracking-wide">
                    Selamat Datang di <span style="color: #F4F1E3;">ReShare</span>
                </h1>
                <p class="mt-2 text-center text-sm" style="color: #E4DED6;">
                    Ayo mulai berbagi barang bermanfaat
                </p>

                <div class="w-1/2 mx-auto mt-6 border-b" style="border-color: rgba(228, 222, 214, 0.3);"></div>

                <?php if (isset($_SESSION['error'])): ?>
                <div class="mt-6 p-3 rounded-lg" style="background-color: rgba(200, 110, 110, 0.2); border: 1px solid #C86E6E; color: #C86E6E;">
                    <?= htmlspecialchars($_SESSION['error']); ?>
                    <?php unset($_SESSION['error']); ?>
                </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['success'])): ?>
                <div class="mt-6 p-3 rounded-lg" style="background-color: rgba(124, 143, 106, 0.2); border: 1px solid #7C8F6A; color: #7C8F6A;">
                    <?= htmlspecialchars($_SESSION['success']); ?>
                    <?php unset($_SESSION['success']); ?>
                </div>
                <?php endif; ?>

                <form action="../backend/auth/login_process.php" method="POST" class="mt-8">

                    <label class="block text-sm mb-1">Nama atau Email</label>
                    <input type="text" name="username" class="w-full px-4 py-2 rounded-lg text-black focus:outline-none shadow-sm" placeholder="Masukkan nama atau email" required>

                    <label class="block text-sm mt-5 mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 rounded-lg text-black focus:outline-none shadow-sm" placeholder="Masukkan password" required>

                    <button type="submit" class="w-full py-2 rounded-lg mt-6 text-lg font-semibold shadow hover:opacity-90 transition" style="background-color: #F4F1E3; color: #4A5D49;">
                        Login
                    </button>

                    <p class="text-center text-sm mt-4" style="color: #E4DED6;">
                        Belum punya akun?
                        <a href="register.php" class="font-semibold underline hover:text-white">Register</a>
                    </p>

                </form>

            </div>

        </div>

    </div>

    <script src="../js/darkmode.js"></script>

</body>
</html>
