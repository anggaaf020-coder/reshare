<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ReShare</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

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
            <img src="../assets/images/login-art.png"
                 class="w-4/5 max-h-[85%] object-cover opacity-90 rounded-xl shadow-lg"
                 alt="gambar">
        </div>

        <!-- RIGHT SIDE -->
        <div class="w-1/2 bg-[#4A5D49] flex items-center justify-center px-16">

            <div class="w-full max-w-md text-white">

                <!-- Header -->
                <h1 class="text-3xl font-semibold text-center tracking-wide">
                    Selamat Datang di <span class="text-[#F4F1E3]">ReShare</span>
                </h1>
                <p class="mt-2 text-center text-sm text-gray-200">
                    Ayo mulai berbagi barang bermanfaat!
                </p>

                <div class="w-1/2 mx-auto mt-6 border-b border-gray-300"></div>

                <!-- FORM -->
                <form action="../backend/auth/login_process.php" method="POST" class="mt-8">

                    <!-- Username -->
                    <label class="block text-sm mb-1">Nama</label>
                    <input type="text" name="username"
                           class="w-full px-4 py-2 rounded-lg text-black focus:outline-none shadow-sm"
                           placeholder="Masukkan nama" required>

                    <!-- Password -->
                    <label class="block text-sm mt-5 mb-1">Password</label>
                    <input type="password" name="password"
                           class="w-full px-4 py-2 rounded-lg text-black focus:outline-none shadow-sm"
                           placeholder="Masukkan password" required>

                    <!-- Forgot password -->
                    <a href="lupa_password.php" class="text-gray-200 text-sm mt-2 block hover:underline">
                        Lupa password?
                    </a>

                    <!-- Login button -->
                    <button type="submit"
                            class="w-full bg-[#F4F1E3] text-[#4A5D49] py-2 rounded-lg mt-6 text-lg font-semibold shadow hover:opacity-90 transition">
                        Login
                    </button>

                    <!-- Register link -->
                    <p class="text-center text-sm mt-4 text-gray-200">
                        Belum punya akun?
                        <a href="register.php" class="font-semibold underline hover:text-white">Register</a>
                    </p>

                </form>

            </div>

        </div>

    </div>

</body>
</html>
