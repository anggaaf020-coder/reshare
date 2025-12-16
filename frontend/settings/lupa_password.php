<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="h-screen bg-[#F4F1E3]">
<div class="relative h-full overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 -z-10 bg-cover bg-center"
         style="background-image: url('/reshare/assets/images/background/bg5.jpg');">
        <div class="absolute inset-0 bg-[#fafaf7]/40"></div>
    </div>

    <!-- CARD -->
    <div class="h-[80%] flex mt-20 mx-20 rounded-[40px] bg-[#fafaf7] overflow-hidden shadow-xl">

        <!-- BACK BUTTON -->
        <a href="/reshare/frontend/login.php"
           class="absolute top-6 left-6 flex items-center gap-1 text-[#fafaf7]">
            <img src="/reshare/assets/icons/back.svg" class="w-10 h-10">
            <span class="text-[25px] font-semibold text-[#3e5648]">Kembali</span>
        </a>

        <!-- LEFT PANEL -->
        <div class="w-1/2 bg-[#3e5648] px-16 py-12 flex flex-col items-center justify-center">

            <div class="flex items-center gap-4 mb-6">
                <img src="/reshare/assets/icons/password.svg" class="w-12 h-12">
                <h1 class="text-5xl font-bold text-[#fafaf7]">
                    Lupa Password
                </h1>
            </div>

            <!-- ALERT -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm w-full max-w-md">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm w-full max-w-md">
                    <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <!-- FORM -->
            <form method="POST"
                  action="/reshare/backend/auth/reset_password.php"
                  class="space-y-4 w-full max-w-md">

                <div class="border-b-[3px] border-[#fafaf7]/80 mb-8"></div>

                <!-- EMAIL -->
                <input
                    type="email"
                    name="email"
                    placeholder="Email terdaftar"
                    required
                    class="w-full rounded-full px-5 py-3 text-sm shadow-sm">

                <!-- NOMOR HP -->
                <input
                    type="text"
                    name="phone"
                    placeholder="Nomor HP terdaftar"
                    required
                    class="w-full rounded-full px-5 py-3 text-sm shadow-sm">

                <!-- PASSWORD BARU -->
                <input
                    type="text"
                    name="new_password"
                    placeholder="Password baru"
                    required
                    minlength="8"
                    class="w-full rounded-full px-5 py-3 text-sm shadow-sm">

                <!-- KONFIRMASI PASSWORD -->
                <input
                    type="text"
                    name="confirm_password"
                    placeholder="Konfirmasi password baru"
                    required
                    minlength="8"
                    class="w-full rounded-full px-5 py-3 text-sm shadow-sm">

                <!-- BUTTON -->
                <div class="pt-10 w-1/2 mx-auto">
                    <button type="submit"
                            class="w-full py-3 rounded-full bg-[#8bbfa9]
                                   text-white font-bold text-lg">
                        RESET
                    </button>
                </div>

            </form>
        </div>

        <!-- RIGHT PANEL -->
        <div class="w-1/2 bg-cover bg-center flex items-center justify-center"
             style="background-image: url('/reshare/assets/images/background/bg5.jpg');">
            <img src="/reshare/assets/images/logo/login.png"
                 class="w-96 drop-shadow-2xl">
        </div>

    </div>
</div>

</body>
</html>
