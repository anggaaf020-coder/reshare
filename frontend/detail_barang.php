<?php
/* include 'components/navbar.php'; */
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { scrollbar-width: none; }
    </style>
</head>

<body class="bg-[#F7F5EB]">

    <!-- ================= HEADER ================= -->
    <div class="flex items-center gap-3 px-5 py-4 bg-[#EEEBD9]">
        <a href="katalog.php" class="text-xl">&#8592;</a>
        <h2 class="text-lg font-semibold text-[#4A5D49]">Ambil</h2>
    </div>

    <!-- ================= MAIN DETAIL ================= -->
    <div class="px-10 py-10 grid grid-cols-2 gap-10">

        <!-- ========== FOTO SLIDER ========== -->
        <div class="bg-white rounded-2xl shadow p-5 border border-gray-200 flex flex-col">

            <div class="w-full h-[350px] rounded-xl bg-gray-100 overflow-hidden">
                <img id="mainFoto"
                     src="../assets/items/sample1.jpg"
                     class="w-full h-full object-cover">
            </div>

            <!-- Thumbnail & Dots -->
            <div class="flex justify-center gap-3 mt-4">

                <div class="w-3 h-3 bg-black rounded-full slider-dot" data-img="../assets/items/sample1.jpg"></div>
                <div class="w-3 h-3 bg-gray-300 rounded-full slider-dot" data-img="../assets/items/sample2.jpg"></div>
                <div class="w-3 h-3 bg-gray-300 rounded-full slider-dot" data-img="../assets/items/sample3.jpg"></div>

            </div>
        </div>


        <!-- ========== INFORMASI BARANG ========== -->
        <div>

            <p class="text-sm text-gray-500">Kategori: &lt;kategori&gt;</p>

            <h1 class="text-2xl font-semibold text-[#4A5D49] mt-1">
                &lt;nama produk&gt;
            </h1>

            <!-- Donatur -->
            <p class="text-sm text-gray-600 mt-2">
                &lt;nama donatur&gt; |
                &lt;alamat donatur&gt; |
                &lt;08xxxxxxxx&gt;
            </p>

            <hr class="border-gray-300 my-4">

            <!-- Kondisi -->
            <p class="font-semibold text-[#4A5D49]">Kondisi Barang</p>
            <p class="text-sm text-gray-700 mt-1">
                &lt;kondisi barang&gt;
            </p>

            <hr class="border-gray-300 my-4">

            <!-- Deskripsi -->
            <p class="font-semibold text-[#4A5D49]">Deskripsi</p>
            <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                &lt;deskripsi lengkap barang&gt;
            </p>

            <!-- Tombol -->
            <div class="mt-8 flex gap-4">

                <!-- TOMBOL HUBUNGI WA -->
                <a id="btnWA"
                   href="https://wa.me/628XXXXXX?text=Halo%20saya%20ingin%20mengambil%20barang%20Anda"
                   target="_blank"
                   class="bg-[#4A5D49] text-white px-6 py-2 rounded-full shadow hover:opacity-90 transition">
                    Hubungi
                </a>

                <!-- TOMBOL AMBIL -->
                <form action="../backend/items/ambil_item.php" method="POST">
                    <input type="hidden" name="item_id" value="<?php echo $_GET['id'] ?? 0; ?>">
                    <button type="submit"
                        class="bg-white text-[#4A5D49] px-6 py-2 rounded-full shadow border hover:bg-gray-100 transition">
                        Ambil
                    </button>
                </form>

            </div>

        </div>

    </div>

    <script>
        const mainFoto = document.getElementById("mainFoto");
        const dots = document.querySelectorAll(".slider-dot");

        dots.forEach(dot => {
            dot.addEventListener("click", () => {
                mainFoto.src = dot.dataset.img;

                dots.forEach(d => d.classList.remove("bg-black"));
                dots.forEach(d => d.classList.add("bg-gray-300"));
                dot.classList.remove("bg-gray-300");
                dot.classList.add("bg-black");
            });
        });
    </script>

</body>
</html>
