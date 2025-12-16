<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /reshare/frontend/login.php");
    exit;
}

$currentEmail = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Email | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
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
        <a href="javascript:history.back()"
           class="absolute top-6 left-6 flex items-center gap-1
                  text-[#fafaf7] font-medium hover:opacity-80 transition">
            <img src="/reshare/assets/icons/back.svg" class="w-10 h-10" alt="Back">
            <span class="text-[25px] font-semibold text-[#3e5648]">Kembali</span>
        </a>

        <!-- LEFT PANEL -->
        <div class="w-1/2 bg-[#3e5648] px-16 py-12 flex flex-col items-center justify-center">

            <!-- HEADER -->
            <div class="flex flex-col items-center text-center">
                <div class="flex items-center gap-4">
                    <img src="/reshare/assets/icons/email.svg" class="w-12 h-12">
                    <h1 class="text-5xl font-semibold text-[#fafaf7]">
                        Ganti Email
                    </h1>
                </div>
            </div>

            <!-- FORM -->
            <form method="POST" action="/reshare/backend/user/update_email.php"
                  class="space-y-3 w-full max-w-md">

                <!-- Divider -->
                <div class="max-w-xl w-full mt-7 border-b-[3px] border-[#fafaf7]/80 mb-10"></div>

                <!-- EMAIL LAMA (AUTO) -->
                <div>
                    <label class="block text-sm font-semibold text-[#fafaf7] mb-4">
                        EMAIL SAAT INI
                    </label>
                    <input type="email"
                           value="<?= htmlspecialchars($currentEmail) ?>"
                           readonly
                           class="w-full rounded-full px-5 py-3
                                  bg-gray-200 text-gray-600 text-sm
                                  cursor-not-allowed shadow-sm">
                </div>

                <!-- EMAIL BARU -->
                <div>
                    <label class="block text-sm font-semibold text-[#fafaf7] mb-4">
                        EMAIL BARU
                    </label>
                    <input type="email" name="new_email"
                           class="w-full rounded-full px-5 py-3
                                  text-gray-700 text-sm focus:outline-none shadow-sm"
                           placeholder="Masukkan Email baru"
                           required>
                </div>

                <!-- BUTTON -->
                <div class="grid grid-cols-1 gap-4 pt-10 max-w-lg w-1/2 mx-auto">
                    <button type="submit"
                            class="w-full py-3 rounded-full bg-[#8bbfa9]
                                   text-white font-bold hover:opacity-90 transition">
                        UBAH
                    </button>
                </div>

            </form>
        </div>

        <!-- RIGHT PANEL -->
        <div class="w-1/2 bg-cover bg-center flex items-center justify-center"
             style="background-image: url('/reshare/assets/images/background/bg5.jpg');">
            <div class="text-center">
                <img src="/reshare/assets/images/logo/login.png"
                     class="w-96 drop-shadow-2xl"
                     alt="ReShare Logo">
            </div>
        </div>

    </div>
</div>

<script src="/js/back.js"></script>
</body>
</html>
