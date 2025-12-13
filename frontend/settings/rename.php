<?php
/* include '../components/navbar.php'; */
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Username | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F7F5EB]">

    <!-- HEADER -->
    <div class="flex items-center gap-3 px-5 py-4 bg-[#EEEBD9]">
        <a href="../home.php" class="text-xl">&#8592;</a>
        <h2 class="text-lg font-semibold text-[#4A5D49]">Ganti Username</h2>
    </div>

    <!-- MAIN SECTION -->
    <div class="grid grid-cols-2 px-20 py-10">

        <!-- LEFT FORM -->
        <div class="flex flex-col justify-center">

            <h1 class="text-2xl font-semibold text-center text-[#4A5D49] mb-6">
                Selamat Datang di <br> ReShare
            </h1>

            <!-- USERNAME LAMA -->
            <label class="text-sm">Username lama</label>
            <input id="oldUsername" type="text"
                   class="w-[80%] px-4 py-2 bg-[#4A5D49] text-white rounded-full mt-1 mb-4 shadow outline-none">

            <!-- USERNAME BARU -->
            <label class="text-sm">Username baru</label>
            <input id="newUsername" type="text"
                   class="w-[80%] px-4 py-2 bg-[#4A5D49] text-white rounded-full mt-1 mb-4 shadow outline-none">

            <!-- CEK USERNAME -->
            <button id="checkBtn"
                    class="mt-2 bg-white text-[#4A5D49] shadow px-6 py-1 rounded-full w-[40%] hover:bg-gray-100 transition">
                Cek Username
            </button>

            <p id="checkResult" class="mt-2 text-sm"></p>

            <!-- SUBMIT -->
            <form action="../../backend/user/update_name.php" method="POST">
                <input type="hidden" name="new_username" id="hiddenUsername">
                <button type="submit"
                        class="mt-6 bg-[#4A5D49] text-white px-6 py-1 rounded-full w-[40%] hover:opacity-90 transition">
                    Send
                </button>
            </form>

        </div>

        <!-- RIGHT ILLUSTRATION -->
        <div class="flex items-center justify-center">
            <div class="w-[70%] h-[70%] bg-gray-200 flex items-center justify-center rounded-xl">
                gambar
            </div>
        </div>

    </div>


    <!-- JS: CEK USERNAME -->
    <script>
        document.getElementById("checkBtn").onclick = () => {
            let newUser = document.getElementById("newUsername").value;

            if (newUser.trim() === "") {
                document.getElementById("checkResult").innerHTML =
                    "<span class='text-red-500'>Username tidak boleh kosong</span>";
                return;
            }

            fetch("../../backend/user/check_username.php?username=" + newUser)
                .then(res => res.text())
                .then(data => {

                    const hiddenInput = document.getElementById("hiddenUsername");

                    if (data === "available") {
                        document.getElementById("checkResult").innerHTML =
                            "<span class='text-green-600'>Username tersedia ✓</span>";
                        hiddenInput.value = newUser; 
                    } else {
                        document.getElementById("checkResult").innerHTML =
                            "<span class='text-red-500'>Username sudah dipakai ✗</span>";
                        hiddenInput.value = ""; 
                    }
                });
        };
    </script>

</body>
</html>
