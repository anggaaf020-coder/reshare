<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ReShare</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Modern Font -->
     <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="h-screen bg-[#F4F1E3]">
    <div class="relative h-full overflow-hidden">
    <div
        class="absolute inset-0 -z-10 bg-cover bg-center opacity-70"
        style="background-image: url('../assets/images/background/bg4.jpg');">
    </div>
   
<!-- konten -->
    <div class="h-[80%] flex mt-20 mx-20 bg-white rounded-[40px] overflow-hidden shadow-xl" >

        <!-- LEFT SIDE IMAGE -->
        <div class="relative w-1/2 bg-[#F4F1E3] flex items-center justify-center px-10"
             style="background-image: url('../assets/images/background/bg4.jpg');">
            <div>
                <img src="../assets/images/logo/login.png" alt="" class="w-96 relative flex item-center justify-center">
            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="w-1/2 bg-[#3e5648] flex items-center justify-center px-16">

            <div class="w-full max-w-xl text-[#fafaf7]">

                <!-- Header -->
                <h1 class="text-3xl font-semibold text-center tracking-wide">
                    Selamat Datang di <span class="text-[#F4F1E3]">ReShare</span>
                </h1>
                <p class="text-sm text-center tracking-wide mt-2 mb-2">Ayo mulai berbagi barang bermanfaat</p>
                <div class="w-50 mx-auto mt-4 border-b border-gray-300"></div>

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

                <button onclick="closeToast()" class="ml-2 text-xl leading-none">&times;</button>
            </div>

            <?php
            unset($_SESSION['error'], $_SESSION['success']);
            endif;
            ?>



            <form action="../backend/auth/register_process.php" method="POST" class="mt-8 space-y-6">

            <!-- GRID: NAMA + EMAIL -->
            <div class="grid grid-cols-2 gap-6">
                <div>
                <label class="block text-sm font-semibold mb-1 flex items-center gap-2">
                    <img src="../assets/icons/user.svg">
                    Nama
                </label>
                <input type="text" name="username"
                    class="w-full px-4 py-2 rounded-full text-black shadow-sm"
                    placeholder="Nama lengkap" required>
                </div>

                <div>
                <label class="block text-sm font-semibold mb-1 flex items-center gap-2">
                    <img src="../assets/icons/email.svg">
                    Email
                </label>
                <input type="email" name="email"
                    class="w-full px-4 py-2 rounded-full text-black shadow-sm"
                    placeholder="Email aktif" required>
                </div>
            </div>

            <!-- GRID: PASSWORD + NO HP -->
            <div class="grid grid-cols-2 gap-6">

                <!-- PASSWORD -->
                <div>
                <label class="block text-sm font-semibold mb-1 flex items-center gap-2">
                    <img src="../assets/icons/password.svg">
                    Password
                </label>

                <div class="relative">
                    <input
                    id="password"
                    type="password"
                    name="password"
                    class="w-full px-4 py-2 pr-12 rounded-full text-black shadow-sm"
                    placeholder="Minimal 6 karakter"
                    required
                    >

                    <button type="button"
                    onclick="togglePassword()"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">

                    <!-- TOMBOL HIDE -->
                    <svg id="eyeOpenLogin"
                            xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" viewBox="0 0 16 16"
                            class="fill-#3e5648">
                        <g>
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0"/>
                        </g>
                    </svg>

                        <!-- TOMBOL SEE -->
                    <svg id="eyeClosedLogin"
                            xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" viewBox="0 0 16 16"
                            class="fill-#3e5648 hidden">
                        <path d="M13.359 11.238C12.062 12.197 10.355 13 8 13c-2.355 0-4.062-.803-5.359-1.762C1.223 10.206.278 8.834.09 8.513a.58.58 0 0 1 0-.513c.188-.32 1.133-1.693 2.55-2.725C3.938 4.316 5.645 3.5 8 3.5c.88 0 1.69.11 2.42.307l-.889.889A3.5 3.5 0 0 0 4.5 8a3.5 3.5 0 0 0 5.804 2.657z"/>
                        <path d="M15.854 15.146a.5.5 0 0 1-.708 0l-14-14a.5.5 0 1 1 .708-.708l14 14a.5.5 0 0 1 0 .708"/>
                    </svg>
                    </button>
                </div>
                </div>

                <!-- NO HP -->
                <div>
                <label class="block text-sm font-semibold mb-1 flex items-center gap-2">
                    <img src="../assets/icons/kontak.svg">
                    No Handphone
                </label>
                <input type="text" name="phone"
                    class="w-full px-4 py-2 rounded-full text-black shadow-sm"
                    placeholder="08xxxxxxxx" required>
                </div>

            </div>

            <!-- SUBMIT -->
            <button type="submit"
                class="w-full bg-[#7fb7a4] text-white py-3 rounded-full font-semibold shadow hover:bg-[#6fa896] transition">
                Register
            </button>

            <!-- OR -->
            <div class="flex items-center gap-4">
                <div class="flex-1 border-t border-gray-300"></div>
                <span class="text-sm text-gray-200">Atau</span>
                <div class="flex-1 border-t border-gray-300"></div>
            </div>

             <a href="../backend/auth/google_login.php"
                class="w-[30%] mx-auto flex items-center justify-center gap-3
                bg-[#7fb7a4] text-white py-2 rounded-full
                font-semibold shadow hover:opacity-90 transition">
                <img src="../assets/icons/google.svg" class="w-6 h-6">
                Google
            </a>

            </form>


                <!-- Link ke Login -->
                <p class="text-center text-sm mt-6 text-gray-200">
                    Sudah punya akun?
                    <a href="login.php" class="font-semibold underline hover:text-white">Login</a>
                </p>

            </div>

        </div>

    </div>
    </div>

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

<script>
function togglePassword() {
  const input = document.getElementById("password");
  const eyeOpen = document.getElementById("eyeOpenLogin");
  const eyeClosed = document.getElementById("eyeClosedLogin");

  if (input.type === "password") {
    input.type = "text";
    eyeOpen.classList.add("hidden");
    eyeClosed.classList.remove("hidden");
  } else {
    input.type = "password";
    eyeOpen.classList.remove("hidden");
    eyeClosed.classList.add("hidden");
  }
}
</script>


</body>
</html>
