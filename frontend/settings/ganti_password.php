<?php /* include '../components/navbar.php'; */ ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="bg-[#F7F5EB]" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <!-- HEADER -->
    <div class="flex items-center gap-3 px-5 py-4 bg-[#EEEBD9]">
        <a href="../home.php" class="text-xl">&#8592;</a>
        <h2 class="text-lg font-semibold text-[#4A5D49]">Ganti Password</h2>
    </div>

    <!-- MAIN -->
    <div class="grid grid-cols-2 px-20 py-10">

        <!-- LEFT -->
        <div class="flex flex-col justify-center">

            <h1 class="text-2xl font-semibold text-center text-[#4A5D49] mb-6">
                Selamat Datang di <br> ReShare
            </h1>

            <!-- PASSWORD LAMA -->
            <label class="text-sm">Password lama</label>
            <input type="password" name="old_password"
                   class="w-[80%] px-4 py-2 bg-[#4A5D49] text-white rounded-full shadow mt-1 mb-4 outline-none">

            <!-- PASSWORD BARU -->
            <label class="text-sm">Password baru</label>
            <input type="password" name="new_password"
                   class="w-[80%] px-4 py-2 bg-[#4A5D49] text-white rounded-full shadow mt-1 mb-4 outline-none">

            <!-- FORM SUBMIT -->
            <form action="../../backend/user/update_password.php" method="POST">
                <input type="hidden" name="old_password" id="oldPassInput">
                <input type="hidden" name="new_password" id="newPassInput">

                <button type="submit"
                        class="mt-6 bg-[#4A5D49] text-white px-6 py-1 rounded-full w-[40%] hover:opacity-90 transition">
                    Send
                </button>
            </form>

        </div>

        <!-- RIGHT (GAMBAR) -->
        <div class="flex items-center justify-center">
            <div class="w-[70%] h-[70%] bg-gray-200 rounded-xl flex items-center justify-center">
                gambar
            </div>
        </div>

    </div>

    <script>
        // Auto-assign hidden fields on submit
        document.querySelector("form").onsubmit = function() {
            document.getElementById("oldPassInput").value =
                document.querySelector("input[name='old_password']").value;

            document.getElementById("newPassInput").value =
                document.querySelector("input[name='new_password']").value;
        };
    </script>

</body>
</html>
