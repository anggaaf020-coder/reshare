<?php
include 'components/navbar.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | ReShare</title>

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .fade {
            animation: fadeEffect 1.3s ease-in-out;
        }

        @keyframes fadeEffect {
            from { opacity: 0.3; }
            to   { opacity: 1; }
        }
    </style>
</head>

<body class="bg-white">

    <!-- ================= HERO FULLSCREEN ================= -->
    <section class="relative h-[90vh] w-full overflow-hidden">

        <!-- BACKGROUND SLIDER -->
        <div class="absolute inset-0">
            <img id="bg1" src="../assets/images/background/slide1.jpg"
                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-[1500ms]">
            <img id="bg2" src="../assets/images/background/slide2.jpg"
                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-[1500ms]">
            <img id="b32" src="../assets/images/background/slide3.jpg"
                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-[1500ms]">
            <img id="bg4" src="../assets/images/background/slide4.jpg"
                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-[1500ms]">
        </div>


        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <!-- Text -->
        <div class="relative z-10 text-center text-white px-10 pt-40 max-w-4xl mx-auto">

            <h1 class="text-4xl font-bold mb-6 drop-shadow-lg font-sans-serif ">Selamat Datang di ReShare</h1>

            <p class="text-base leading-relaxed text-gray-200 drop-shadow">
                ReShare merupakan platform yang menyediakan tempat untuk saling membantu dan mendukung satu sama lain.
                Melalui ReShare siapapun dapat berbagi barang layak pakai bagi mereka yang membutuhkan tanpa mengeluarkan biaya.
                Kami percaya setiap barang memiliki kesempatan untuk digunakan kembali bukan untuk dibuang.
            </p>

            <!-- Buttons in Hero -->
            <div class="flex justify-center gap-6 mt-10">
                <a href="home.php"
                   class="bg-[#F4F1E3] text-[#4A5D49] px-8 py-2 rounded-full font-semibold shadow hover:bg-white transition">
                    Lihat Katalog
                </a>

                <a href="upload_barang.php"
                   class="bg-[#F4F1E3] text-[#4A5D49] px-8 py-2 rounded-full font-semibold shadow hover:bg-white transition">
                    Donasi Barang
                </a>
            </div>
        </div>
    </section>

    <!-- ================= MOTTO (FULL WHITE) ================= -->
    <section class="w-full bg-white flex items-center justify-center py-24 px-16">
        <div class="w-full max-w-6xl flex gap-14 items-center">

            <!-- ILUSTRASI -->
            <img src="../assets/images/welcome-illustration.png"
                 alt="donate illustration"
                 class="w-1/3 rounded-lg shadow">

            <!-- Teks -->
            <div class="flex-1">
                <h2 class="text-3xl font-semibold text-[#4A5D49]">
                    Kurangi Sampah Hari ini, Berbagi Kebaikan Selamanya
                </h2>

                <p class="mt-4 text-gray-700 leading-relaxed">
                    ReShare hadir sebagai bentuk kepedulian terhadap lingkungan dengan memaksimalkan penggunaan
                    barang bekas yang masih layak pakai. Dengan membangun komunitas yang peduli terhadap lingkungan,
                    ReShare mengajak setiap individu untuk berkontribusi dalam mengurangi limbah dan menciptakan
                    bumi yang lebih bersih dan berkelanjutan.
                </p>
            </div>

        </div>
    </section>

    <?php include 'components/footer.php';  ?>

        <script>
            const images = [
                "../assets/images/background/slide1.jpg",
                "../assets/images/background/slide2.jpg",
                "../assets/images/background/slide3.jpg",
                "../assets/images/background/slide4.jpg"
            ];

            let index = 0;

            const bg1 = document.getElementById("bg1");
            const bg2 = document.getElementById("bg2");

            setInterval(() => {
                index = (index + 1) % images.length;

                bg2.src = images[index];

                bg2.classList.remove("opacity-0");

                setTimeout(() => {
                    bg1.src = bg2.src;
                    bg2.classList.add("opacity-0");
                }, 1500); 
            }, 5000);
        </script>


</body>
</html>
