<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ReShare</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Modern Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="h-screen bg-[#F4F1E3]">
    <div class="relative h-full overflow-hidden">
    <div
        class="absolute inset-0 -z-10 bg-cover bg-center opacity-70"
        style="background-image: url('../assets/images/background/bg4.jpg');">
    </div>
   
<!-- conten -->
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

                <!-- FORM -->
                <form action="../backend/auth/register_process.php" method="POST" class="mt-8">

                    <!-- GRID INPUT: NAMA + EMAIL -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold mb-1 flex items-center justify-start gap-2">
                            <img src="../assets/icons/user.svg" alt="" class="flex items-center">
                            Nama
                            </label>
                            <input type="text" name="username"
                                   class="w-full px-4 py-2 rounded-full text-black focus:outline-none shadow-sm"
                                   placeholder="Nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1 flex item-center justify-start gap-2">
                            <img src="../assets/icons/email.svg" alt="" class="flex item-center">
                            Email
                            </label>
                            <input type="email" name="email"
                                   class="w-full px-4 py-2 rounded-full text-black focus:outline-none shadow-sm"
                                   placeholder="Email aktif" required>
                        </div>
                    </div>

                    <!-- GRID INPUT: PASSWORD + NO HP -->
                    <div class="grid grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-semibold mb-1 flex item-center justify-start gap-2">
                            <img src="../assets/icons/password.svg" alt="" class="flex item-center">
                            Password
                            </label>
                            <input type="password" name="password"
                                   class="w-full px-4 py-2 rounded-full text-black focus:outline-none shadow-sm"
                                   placeholder="Minimal 6 karakter" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1 flex item-center justify-start gap-2">
                            <img src="../assets/icons/kontak.svg" alt="" class="flex item-center">
                            No Handphone
                            </label>
                            <input type="text" name="nomor"
                                   class="w-full px-4 py-2 rounded-full text-black focus:outline-none shadow-sm"
                                   placeholder="08xxxxxxxx" required>
                        </div>
                    </div>

                    <!-- Masuk -->
                    <button type="button"
                        class="w-full bg-[#7fb7a4] text-white mt-7 py-2 rounded-full font-semibold shadow hover:bg-gray-200 transition">
                        Sign In
                    </button>

                    <!-- Garis OR -->
                    <div class="flex items-center gap-4 my-6">
                        <div class="flex-1 border-t border-gray-300"></div>
                        <span class="text-sm text-gray-200">Atau</span>
                        <div class="flex-1 border-t border-gray-300"></div>
                    </div>

                    

                    <!-- Login dengan Google -->
                    <div class="flex justify-center mt-6">
                        <button type="submit"
                                class="w-100 px-8 py-2 pt-2 bg-[#7fb7a4] text-[#fafaf7] rounded-full text-xl font-bold shadow hover:bg-gray-200 transition">
                            <img src="../assets/icons/google.svg" alt="Google Logo" class="inline w-6 h-6 mr-2 align-middle">
                            Google
                        </button>
                    </div>

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

</body>
</html>
