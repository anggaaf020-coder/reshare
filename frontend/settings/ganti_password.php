<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /reshare/frontend/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password | ReShare</title>

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
        <a href="javascript:history.back()"
           class="absolute top-6 left-6 flex items-center gap-1 text-[#fafaf7]">
            <img src="/reshare/assets/icons/back.svg" class="w-10 h-10">
            <span class="text-[25px] font-semibold text-[#3e5648]">Kembali</span>
        </a>

        <!-- LEFT PANEL -->
        <div class="w-1/2 bg-[#3e5648] px-16 py-12 flex flex-col items-center justify-center">

            <div class="flex items-center gap-4 mb-6">
                <img src="/reshare/assets/icons/password.svg" class="w-12 h-12">
                <h1 class="text-5xl font-bold text-[#fafaf7]">
                    Ganti Password
                </h1>
            </div>

            <!-- FORM -->
            <form method="POST"
                  action="/reshare/backend/user/update_password.php"
                  class="space-y-4 w-full max-w-md">

                <div class="border-b-[3px] border-[#fafaf7]/80 mb-8"></div>

                <!-- PASSWORD LAMA (TOGGLE) -->
                <div class="relative">
                    <input
                        type="password"
                        id="oldPassword"
                        name="old_password"
                        placeholder="Password lama"
                        required
                        class="w-full rounded-full px-5 py-3 pr-12 text-sm shadow-sm">

                    <button type="button"
                            onclick="toggleOldPassword()"
                            class="absolute right-4 top-1/2 -translate-y-1/2
                                   text-gray-500 hover:text-gray-700">
                        👁
                    </button>
                </div>

                <!-- PASSWORD BARU (TIDAK DI-HIDE) -->
                <input
                    type="text"
                    name="new_password"
                    placeholder="Password baru"
                    required
                    minlength="8"
                    class="w-full rounded-full px-5 py-3 text-sm shadow-sm">

                <!-- KONFIRMASI PASSWORD BARU (TIDAK DI-HIDE) -->
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
                        UBAH
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

<script>
function toggleOldPassword() {
    const input = document.getElementById('oldPassword');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>

</body>
</html>
