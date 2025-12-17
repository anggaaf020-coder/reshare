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
    <?php if (isset($_SESSION['error']) || isset($_SESSION['success'])): ?>
        <div id="toast"
            class="fixed top-6 right-6 z-50
                    flex items-center gap-3
                    px-5 py-4 rounded-xl shadow-lg
                    <?= isset($_SESSION['error']) ? 'bg-red-500' : 'bg-green-500' ?>
                    text-white
                    translate-x-full opacity-0
                    transition-all duration-500">

        <span class="font-semibold">
            <?= htmlspecialchars($_SESSION['error'] ?? $_SESSION['success']) ?>
        </span>

        <button onclick="closeToast()"
                class="ml-2 text-xl leading-none">&times;</button>
        </div>

        <?php
        unset($_SESSION['error'], $_SESSION['success']);
        endif;
    ?>

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
                        <!-- SEE -->
                    <svg id="eyeOpenLogin"
                            xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" viewBox="0 0 16 16"
                            class="fill-#3e5648">
                        <g>
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0"/>
                        </g>
                    </svg>

                        <!-- HIDE -->
                    <svg id="eyeClosedLogin"
                            xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" viewBox="0 0 16 16"
                            class="fill-#3e5648 hidden">
                        <path d="M13.359 11.238C12.062 12.197 10.355 13 8 13c-2.355 0-4.062-.803-5.359-1.762C1.223 10.206.278 8.834.09 8.513a.58.58 0 0 1 0-.513c.188-.32 1.133-1.693 2.55-2.725C3.938 4.316 5.645 3.5 8 3.5c.88 0 1.69.11 2.42.307l-.889.889A3.5 3.5 0 0 0 4.5 8a3.5 3.5 0 0 0 5.804 2.657z"/>
                        <path d="M15.854 15.146a.5.5 0 0 1-.708 0l-14-14a.5.5 0 1 1 .708-.708l14 14a.5.5 0 0 1 0 .708"/>
                    </svg>
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

<script>
document.addEventListener("DOMContentLoaded", () => {
  const toast = document.getElementById("toast");

  if (toast) {
    setTimeout(() => {
      toast.classList.remove("translate-x-full", "opacity-0");
    }, 100);

    setTimeout(() => {
      toast.classList.add("translate-x-full", "opacity-0");
    }, 4000);
  }
});

function closeToast() {
  const toast = document.getElementById("toast");
  if (toast) {
    toast.classList.add("translate-x-full", "opacity-0");
  }
}
</script>


</body>
</html>
