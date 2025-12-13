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

    <div class="flex h-full">

        <!-- LEFT SIDE IMAGE -->
        <div class="w-1/2 bg-[#F4F1E3] flex items-center justify-center px-10">
            <img src="../assets/images/register-art.png"
                 class="w-4/5 max-h-[85%] object-cover opacity-90 rounded-xl shadow-lg"
                 alt="gambar ilustrasi">
        </div>

        <!-- RIGHT SIDE -->
        <div class="w-1/2 bg-[#4A5D49] flex items-center justify-center px-16">

            <div class="w-full max-w-xl text-white">

                <!-- Header -->
                <h1 class="text-3xl font-semibold text-center tracking-wide">
                    Selamat Datang di <span class="text-[#F4F1E3]">ReShare</span>
                </h1>
                <div class="w-1/2 mx-auto mt-4 border-b border-gray-300"></div>

                <!-- FORM -->
                <form action="../backend/auth/register_process.php" method="POST" class="mt-10">

                    <!-- GRID INPUT: NAMA + EMAIL -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm mb-1">Nama</label>
                            <input type="text" name="username"
                                   class="w-full px-4 py-2 rounded-full text-black focus:outline-none shadow-sm"
                                   placeholder="Nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-sm mb-1">Email</label>
                            <input type="email" name="email"
                                   class="w-full px-4 py-2 rounded-full text-black focus:outline-none shadow-sm"
                                   placeholder="Email aktif" required>
                        </div>
                    </div>

                    <!-- GRID INPUT: PASSWORD + NO HP -->
                    <div class="grid grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm mb-1">Password</label>
                            <input type="password" name="password"
                                   class="w-full px-4 py-2 rounded-full text-black focus:outline-none shadow-sm"
                                   placeholder="Minimal 6 karakter" required>
                        </div>

                        <div>
                            <label class="block text-sm mb-1">No Handphone</label>
                            <input type="text" name="nomor"
                                   class="w-full px-4 py-2 rounded-full text-black focus:outline-none shadow-sm"
                                   placeholder="08xxxxxxxx" required>
                        </div>
                    </div>

                    <!-- Garis OR -->
                    <div class="flex items-center gap-4 my-6">
                        <div class="flex-1 border-t border-gray-300"></div>
                        <span class="text-sm text-gray-200">Or</span>
                        <div class="flex-1 border-t border-gray-300"></div>
                    </div>

                    <!-- Login dengan Google -->
                    <button type="button"
                        class="w-full bg-white text-[#4A5D49] py-2 rounded-full font-semibold shadow hover:opacity-90 transition">
                        Google
                    </button>

                    <!-- Sign In Button -->
                    <div class="flex justify-end mt-6">
                        <button type="submit"
                                class="px-8 py-2 bg-[#F4F1E3] text-[#4A5D49] rounded-full text-lg font-semibold shadow hover:bg-gray-200 transition">
                            SignIn
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

</body>
</html>
