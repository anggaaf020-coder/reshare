<?php include 'components/navbar.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Hilangkan scrollbar slider */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        .fade { transition: opacity 1.2s ease-in-out; }
    </style>
</head>

<body class="bg-white">

    <!-- ================= HERO SECTION ================= -->
    <section class="relative h-[90vh] w-full overflow-hidden">

        <!-- Slider Background -->
        <div class="absolute inset-0">
            <img id="homeBg1" src="../assets/images/background/slide1.jpg"
                 class="absolute inset-0 w-full h-full object-cover fade">
            <img id="homeBg2" src="../assets/images/background/slide2.jpg"
                 class="absolute inset-0 w-full h-full object-cover opacity-0 fade">
        </div>

        <div class="absolute inset-0 bg-black bg-opacity-30"></div>

        <!-- Search + Buttons -->
        <div class="relative z-10 max-w-4xl mx-auto text-center pt-36">

            <!-- (optional) Title -->
            <h1 class="text-4xl font-semibold text-white drop-shadow"></h1>

            <!-- Search Bar -->
            <div class="flex items-center bg-white mt-6 mx-auto w-[75%] rounded-full px-4 py-2 shadow">
                <input type="text" placeholder="Cari barang..."
                    class="flex-1 outline-none px-3">
                <button class="text-[#4A5D49] text-xl">&#128269;</button>
            </div>

            <!-- Buttons -->
            <div class="flex justify-center gap-6 mt-5">
                <button id="kategoriBtn"
                    class="bg-white text-[#4A5D49] px-6 py-1 rounded-full border shadow font-medium hover:bg-gray-100 transition">
                    Kategori
                </button>

                <a href="event.php"
                    class="bg-white text-[#4A5D49] px-6 py-1 rounded-full border shadow font-medium hover:bg-gray-100 transition">
                    Event
                </a>

                <button class="bg-white text-[#4A5D49] px-6 py-1 rounded-full border shadow font-medium hover:bg-gray-100 transition">
                    Fitur
                </button>
            </div>

            <!-- Dropdown Kategori -->
            <div id="kategoriDropdown"
                 class="hidden absolute left-1/2 -translate-x-1/2 mt-3 w-48 bg-white rounded-xl shadow-lg p-3 text-center space-y-2">

                <form action="katalog.php" method="GET">
                    <button name="kategori" value="Pakaian" class="w-full py-2 rounded-full border hover:bg-gray-100">Pakaian</button>
                    <button name="kategori" value="Elektronik" class="w-full py-2 rounded-full border hover:bg-gray-100">Elektronik</button>
                    <button name="kategori" value="Rumah Tangga" class="w-full py-2 rounded-full border hover:bg-gray-100">Rumah Tangga</button>
                    <button name="kategori" value="Buku" class="w-full py-2 rounded-full border hover:bg-gray-100">Buku</button>
                </form>

            </div>
        </div>
    </section>


    <!-- ================= REKOMENDASI (SLIDER) ================= -->
    <section class="mt-10 px-10">
        <h2 class="text-lg font-semibold text-[#4A5D49] mb-3">Rekomendasi</h2>

        <div class="relative bg-[#4A5D49] p-6 rounded-xl">

            <!-- Panah Navigasi -->
            <button id="rekPrev"
                class="absolute left-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                ◀
            </button>

            <button id="rekNext"
                class="absolute right-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                ▶
            </button>

            <!-- Slider Container -->
            <div id="rekSlider"
                class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar">

                <!-- CARD ITEM -->
                <div class="bg-white w-64 h-40 rounded-md shadow overflow-hidden flex-shrink-0">
                    <img src="../assets/items/sample1.jpg" class="w-full h-full object-cover">
                </div>

                <div class="bg-white w-64 h-40 rounded-md shadow overflow-hidden flex-shrink-0">
                    <img src="../assets/items/sample2.jpg" class="w-full h-full object-cover">
                </div>

                <div class="bg-white w-64 h-40 rounded-md shadow overflow-hidden flex-shrink-0">
                    <img src="../assets/items/sample3.jpg" class="w-full h-full object-cover">
                </div>

                <div class="bg-white w-64 h-40 rounded-md shadow overflow-hidden flex-shrink-0">
                    <img src="../assets/items/sample4.jpg" class="w-full h-full object-cover">
                </div>

            </div>
        </div>
    </section>


    <!-- ================= PILIH FAVORITMU ================= -->
    <section class="mt-14 px-10">
        <h2 class="text-lg font-semibold text-[#4A5D49]">Pilih Favoritmu</h2>
        <p class="text-sm text-gray-600 mb-4">Elektronik</p>

        <div class="space-y-6">
            <div class="bg-gray-50 border border-gray-300 h-40 rounded-lg shadow"></div>
            <div class="bg-gray-50 border border-gray-300 h-40 rounded-lg shadow"></div>
        </div>
    </section>


    <!-- ================= SPESIAL UNTUK KAMU (SLIDER) ================= -->
    <section class="mt-16 bg-[#4A5D49] px-10 py-14 rounded-t-3xl text-white">

        <h2 class="text-lg font-semibold mb-6">Spesial untuk kamu</h2>

        <div class="relative">

            <!-- Panah -->
            <button id="spesialPrev"
                class="absolute left-2 top-1/2 -translate-y-1/2 bg-white text-[#4A5D49] p-2 rounded-full shadow">
                ◀
            </button>

            <button id="spesialNext"
                class="absolute right-2 top-1/2 -translate-y-1/2 bg-white text-[#4A5D49] p-2 rounded-full shadow">
                ▶
            </button>

            <!-- Slider Container -->
            <div id="spesialSlider"
                class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar">

                <div class="bg-white w-[90%] mx-auto h-56 rounded-lg shadow flex-shrink-0"></div>
                <div class="bg-white w-[90%] mx-auto h-56 rounded-lg shadow flex-shrink-0"></div>
                <div class="bg-white w-[90%] mx-auto h-56 rounded-lg shadow flex-shrink-0"></div>

            </div>
        </div>

        <!-- Dots -->
        <div class="flex justify-center gap-2 mt-4">
            <div class="w-3 h-3 bg-white rounded-full"></div>
            <div class="w-3 h-3 border border-white rounded-full"></div>
            <div class="w-3 h-3 border border-white rounded-full"></div>
        </div>
    </section>

    <?php include 'components/footer.php';  ?>


    <!-- ================= JS ================= -->
    <script>
        // Dropdown Kategori
        document.getElementById("kategoriBtn").onclick = () => {
            document.getElementById("kategoriDropdown").classList.toggle("hidden");
        };

        // Background Slider Crossfade
        const bg1 = document.getElementById("homeBg1");
        const bg2 = document.getElementById("homeBg2");

        const images = [
            "../assets/images/background/slide1.jpg",
            "../assets/images/background/slide2.jpg",
            "../assets/images/background/slide3.jpg",
            "../assets/images/background/slide4.jpg"
        ];

        let index = 0;

        setInterval(() => {
            index = (index + 1) % images.length;

            bg2.src = images[index];
            bg2.classList.remove("opacity-0");

            setTimeout(() => {
                bg1.src = bg2.src;
                bg2.classList.add("opacity-0");
            }, 1200);

        }, 5000);


        // ===== Rekomendasi Slider =====
        const rekSlider = document.getElementById("rekSlider");
        document.getElementById("rekPrev").onclick = () => rekSlider.scrollLeft -= 300;
        document.getElementById("rekNext").onclick = () => rekSlider.scrollLeft += 300;

        // ===== Spesial Slider =====
        const spesialSlider = document.getElementById("spesialSlider");
        document.getElementById("spesialPrev").onclick = () => spesialSlider.scrollLeft -= 400;
        document.getElementById("spesialNext").onclick = () => spesialSlider.scrollLeft += 400;
    </script>

</body>
</html>
