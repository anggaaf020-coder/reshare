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
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/main.css">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="h-screen bg-[#F4F1E3]">

    <div class="relative h-full overflow-hidden">
    <div
        class="absolute inset-0 -z-10 bg-cover bg-center opacity-70"
        style="background-image: url('../assets/images/background/bg4.jpg');">
    </div>

        <div class="h-[80%] flex mt-20 mx-20 rounded-t-[40px] bg-white rounded-[40px] overflow-hidden shadow-xl" >
        <!-- LEFT SIDE IMAGE -->
         <div class="relative w-1/2 bg-[#F4F1E3] flex items-center justify-center px-10"
             style="background-image: url('../assets/images/background/bg4.jpg');">
            <div>
                <img src="../assets/images/logo/login.png" alt="" class="w-96 relative flex item-center justify-center">
            </div>
        </div>
        <!-- RIGHT SIDE -->
         <div class="w-1/2 bg-[#3e5648] flex items-center justify-center px-16">

            <div class="w-full max-w-md text-[#fafaf7] pt-5">

                <h1 class="text-3xl font-semibold text-center tracking-wide">
                    Selamat Datang di <span class="text-4xl font-bold">ReShare</span>
                </h1>
                <p class="mt-2 text-center text-lg">
                    Ayo mulai berbagi barang bermanfaat
                </p>

                <div class="w-50 bg-[#fafaf7] mx-auto mt-6 border-b"></div>

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

                    <label class="block text-[#fafaf7] font-bold text-lg mb-1">Nama atau Email</label>
                    <input type="text" name="identifier" class="w-full px-4 py-2 rounded-lg text-gray-700 bg-[#fafaf7] focus:outline-none shadow-sm" placeholder="Masukkan nama atau email" required>

                    <label class="block text-[#fafaf7] font-bold text-lg mt-5 mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 rounded-lg text-gray-700 bg-[#fafaf7] focus:outline-none shadow-sm" placeholder="Masukkan password" required>
                    <p class="text-sm text-[#fafaf7] mt-3">Lupa <a href="/reshare/frontend/settings/lupa_password.php" class="font-bold hover:text-[#fafaf7] mt-3">password</a>?</p>

                    <button type="submit" class="w-full py-2 rounded-lg mt-6 text-lg font-bold [text-shadow:0_2px_10px_rgba(0,0,0,0.4)] shadow hover:opacity-90 transition bg-[#7fb7a4]">
                    Login
                    </button>

                    <p class="text-center text-[#fafaf7] text-sm mt-4">
                        Belum punya akun?
                        <a href="register.php" class="font-bold hover:text-[#fafaf7]">Register</a>
                    </p>

                </form>

            </div>

        </div>

    </div>

    <script src="../js/darkmode.js"></script>

</body>
</html>
