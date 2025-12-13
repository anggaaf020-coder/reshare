<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Nomor HP | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="bg-[#F7F5EB]" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <!-- HEADER -->
    <div class="flex items-center gap-3 px-5 py-4 bg-[#EEEBD9]">
        <a href="../home.php" class="text-xl">&#8592;</a>
        <h2 class="text-lg font-semibold text-[#4A5D49]">Ganti Nomor HP</h2>
    </div>

    <!-- MAIN -->
    <div class="grid grid-cols-2 px-20 py-10">

        <!-- LEFT -->
        <div class="flex flex-col justify-center">

            <h1 class="text-2xl font-semibold text-center text-[#4A5D49] mb-6">
                Selamat Datang di <br> ReShare
            </h1>

            <!-- NOMOR LAMA -->
            <label class="text-sm">Nomor lama</label>
            <input type="text" id="old_nohp"
                   class="w-[80%] px-4 py-2 bg-[#4A5D49] text-white rounded-full shadow mt-1 mb-4 outline-none">

            <!-- NOMOR BARU -->
            <label class="text-sm">Nomor baru</label>
            <input type="text" id="new_nohp"
                   class="w-[80%] px-4 py-2 bg-[#4A5D49] text-white rounded-full shadow mt-1 mb-4 outline-none">

            <form action="../../backend/user/update_nomor.php" method="POST">
                <input type="hidden" name="old_nohp" id="hidden_old_nohp">
                <input type="hidden" name="new_nohp" id="hidden_new_nohp">

                <button type="submit"
                        class="mt-6 bg-[#4A5D49] text-white px-6 py-1 rounded-full w-[40%] hover:opacity-90 transition">
                    Send
                </button>
            </form>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center justify-center">
            <div class="w-[70%] h-[70%] bg-gray-200 rounded-xl flex items-center justify-center">
                gambar
            </div>
        </div>

    </div>

    <script>
        document.querySelector("form").onsubmit = function() {
            document.getElementById("hidden_old_nohp").value =
                document.getElementById("old_nohp").value;
            document.getElementById("hidden_new_nohp").value =
                document.getElementById("new_nohp").value;
        };
    </script>

</body>
</html>
