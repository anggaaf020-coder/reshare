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

                <form action="../backend/auth/login_process.php" method="POST" class="mt-8">

                    <label class="block text-[#fafaf7] font-bold text-lg mb-1">Nama atau Email</label>
                    <input type="text" name="identifier" class="w-full px-4 py-2 rounded-lg text-gray-700 bg-[#fafaf7] focus:outline-none shadow-sm" placeholder="Masukkan nama atau email" required>

                    <label class="block text-[#fafaf7] font-bold text-lg mt-5 mb-1">
                    Password
                    </label>

                    <div class="relative">
                    <input
                        id="loginPassword"
                        type="password"
                        name="password"
                        class="w-full px-4 py-2 pr-12 rounded-lg
                            text-gray-700 bg-[#fafaf7]
                            focus:outline-none shadow-sm"
                        placeholder="Masukkan password"
                        required
                    >

                    <button
                        type="button"
                        onclick="toggleLoginPassword()"
                        class="absolute right-4 top-1/2 -translate-y-1/2
                            text-gray-500 hover:text-gray-700"
                        tabindex="-1">

                        <!-- HIDE -->
                    <svg id="eyeOpenLogin"
<<<<<<< HEAD
                            src="../assets/icons/
=======
                            xmlns="http://www.w3.org/2000/svg"
>>>>>>> 6fbd84a8c10b694aa94a8ccb81385a8fb0d20970
                            width="16" height="16" viewBox="0 0 16 16"
                            class="fill-#3e5648">
                        <g>
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0"/>
                        </g>
                    </svg>

                        <!-- SEE -->
<<<<<<< HEAD
                        <svg id="eyeClosedLogin"
                                xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" viewBox="0 0 16 16"
                                class="fill-#3e5648 hidden">
                            <path d="M13.359 11.238C12.062 12.197 10.355 13 8 13c-2.355 0-4.062-.803-5.359-1.762C1.223 10.206.278 8.834.09 8.513a.58.58 0 0 1 0-.513c.188-.32 1.133-1.693 2.55-2.725C3.938 4.316 5.645 3.5 8 3.5c.88 0 1.69.11 2.42.307l-.889.889A3.5 3.5 0 0 0 4.5 8a3.5 3.5 0 0 0 5.804 2.657z"/>
                            <path d="M15.854 15.146a.5.5 0 0 1-.708 0l-14-14a.5.5 0 1 1 .708-.708l14 14a.5.5 0 0 1 0 .708"/>
                        </svg>
=======
                    <svg id="eyeClosedLogin"
                            xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" viewBox="0 0 16 16"
                            class="fill-#3e5648 hidden">
                        <path d="M13.359 11.238C12.062 12.197 10.355 13 8 13c-2.355 0-4.062-.803-5.359-1.762C1.223 10.206.278 8.834.09 8.513a.58.58 0 0 1 0-.513c.188-.32 1.133-1.693 2.55-2.725C3.938 4.316 5.645 3.5 8 3.5c.88 0 1.69.11 2.42.307l-.889.889A3.5 3.5 0 0 0 4.5 8a3.5 3.5 0 0 0 5.804 2.657z"/>
                        <path d="M15.854 15.146a.5.5 0 0 1-.708 0l-14-14a.5.5 0 1 1 .708-.708l14 14a.5.5 0 0 1 0 .708"/>
                    </svg>

>>>>>>> 6fbd84a8c10b694aa94a8ccb81385a8fb0d20970
                    </button>
                    </div>



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

<script>
<<<<<<< HEAD
    document.addEventListener("DOMContentLoaded", () => {
    const toast = document.getElementById("toast");
    if (toast) {
        setTimeout(() => toast.classList.remove("translate-x-full","opacity-0"), 100);
        setTimeout(() => toast.classList.add("translate-x-full","opacity-0"), 4000);
    }
    });

    function closeToast() {
    const toast = document.getElementById("toast");
    if (toast) toast.classList.add("translate-x-full","opacity-0");
    }
</script>

<script>
function toggleLoginPassword() {
    const input = document.getElementById("loginPassword");
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


=======
    const passwordInput = document.getElementById("loginPassword");

    passwordInput.addEventListener("mousedown", e => {
    if (e.ctrlKey) {
        passwordInput.type = "text";
    }
    });

    document.addEventListener("mouseup", () => {
    passwordInput.type = "password";
    });
</script>

>>>>>>> 6fbd84a8c10b694aa94a8ccb81385a8fb0d20970
</body>
</html>
