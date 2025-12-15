<?php
include 'components/navbar_h.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#fafaf7]">
<script src="../js/dropdown.js"></script>
<!-- ================= HERO EVENT ================= -->
<section class="relative min-h-[80vh] px-16 pt-32 pb-40 overflow-hidden">

<!-- Background ilustrasi -->
    <div class="absolute inset-0 h-full bg-[url('../assets/images/background/bg7.png')] bg-cover bg-center opacity-60"></div>

    <!-- Konten -->
    <div class="relative z-10 max-w-6xl mx-auto mt-12">

        <h1 class="text-5xl font-serif text-[#4A5D49] leading-tight">
            Spread Kindness, Share Hope
        </h1>

        <p class="text-3xl font-semibold text-[#4A5D49] mt-4">
            Give more, care more,<br>share more
        </p>

        <!-- Search -->
        <div class="mt-10 w-[35%] bg-white rounded-full px-6 py-2 shadow flex items-center">
            <input type="text"
                   placeholder="cari event terdekat"
                   class="flex-1 outline-none text-[#4A5D49]">
            <img src="../assets/icons/cari.svg" class="w-5 h-5 opacity-70">
        </div>

        <a href="add_event.php"
        class="bg-[#3e5648] w-[12%] px-5 py-1 rounded-full flex items-center gap-3 shadow-md hover:shadow-lg transition mt-8 mx-[120px]">
        <img src="../assets/icons/event.svg" class="w-3 invert brightness-0 saturate-100">
        <span class="text-[15px] text-[#fafaf7] font-medium">Add Event</span>
        </a>

        <!-- Foto bulat -->
        <img src="../assets/events/event1.jpg"
            class="absolute right-20 top-2
                    w-36 h-36
                    rounded-full object-cover
                    ring-1 ring-white/80
                    shadow-2xl">

        <img src="../assets/events/event2.jpg"
            class="absolute right-48 top-44
                    w-48 h-48
                    rounded-full object-cover
                    ring-1 ring-white/80
                    shadow-2xl">

    </div>
</section>

<!-- ================= FUTURE EVENT ================= -->
<section class="max-w-7xl mx-auto px-16 pb-24">

    <h2 class="text-3xl font-semibold text-center text-[#4A5D49] mt-16 mb-10">
        Future Event
    </h2>

    <!-- GRID EVENT -->
    <div class="grid grid-cols-3 gap-14">

        <!-- CARD -->
        <div class="border-2 border-[#4A5D49]/50 rounded-3xl p-6 bg-white">
            <div class="h-44 rounded-2xl overflow-hidden">
                <img src="/assetsevents/event1.jpg"
                     class="w-full h-full object-cover">
            </div>

            <h3 class="mt-4 text-lg font-semibold text-[#4A5D49]">
                Judul Event
            </h3>

            <p class="text-sm text-[#4A5D49] mt-2 flex items-center gap-2">
                📅 23 Desember 2025
            </p>

            <p class="text-sm text-gray-600 mt-1">
                Nama Penyelenggara
            </p>

            <a href="detail_event.php"
               class="inline-flex items-center gap-2 mt-4
                      bg-[#8bbfa9] text-white
                      px-5 py-2 rounded-full text-sm
                      hover:opacity-90 transition">
                Lihat detail →
            </a>
        </div>

        <!-- Duplikasi card (dummy) -->
        <div class="border-2 border-[#4A5D49]/50 rounded-3xl p-6 bg-white">
            <div class="h-44 rounded-2xl overflow-hidden">
                <img src="/assets/events/event2.jpg"
                     class="w-full h-full object-cover">
            </div>
            <h3 class="mt-4 text-lg font-semibold text-[#4A5D49]">Judul Event</h3>
            <p class="text-sm mt-2">📅 23 Desember 2025</p>
            <p class="text-sm text-gray-600 mt-1">Nama Penyelenggara</p>
            <a href="#" class="mt-4 inline-block bg-[#8bbfa9] text-white px-5 py-2 rounded-full text-sm">
                Lihat detail →
            </a>
        </div>

        <div class="border-2 border-[#4A5D49]/50 rounded-3xl p-6 bg-white">
            <div class="h-44 rounded-2xl overflow-hidden">
                <img src="../assets/images/events/event3.jpg"
                     class="w-full h-full object-cover">
            </div>
            <h3 class="mt-4 text-lg font-semibold text-[#4A5D49]">Judul Event</h3>
            <p class="text-sm mt-2">📅 23 Desember 2025</p>
            <p class="text-sm text-gray-600 mt-1">Nama Penyelenggara</p>
            <a href="#" class="mt-4 inline-block bg-[#8bbfa9] text-white px-5 py-2 rounded-full text-sm">
                Lihat detail →
            </a>
        </div>

    </div>

    <!-- GRID EVENT 2-->
    <div class="grid grid-cols-3 gap-14 mt-12">

        <!-- CARD -->
        <div class="border-2 border-[#4A5D49]/50 rounded-3xl p-6 bg-white">
            <div class="h-44 rounded-2xl overflow-hidden">
                <img src="../assets/images/events/event1.jpg"
                     class="w-full h-full object-cover">
            </div>

            <h3 class="mt-4 text-lg font-semibold text-[#4A5D49]">
                Judul Event
            </h3>

            <p class="text-sm text-[#4A5D49] mt-2 flex items-center gap-2">
                📅 23 Desember 2025
            </p>

            <p class="text-sm text-gray-600 mt-1">
                Nama Penyelenggara
            </p>

            <a href="detail_event.php"
               class="inline-flex items-center gap-2 mt-4
                      bg-[#8bbfa9] text-white
                      px-5 py-2 rounded-full text-sm
                      hover:opacity-90 transition">
                Lihat detail →
            </a>
        </div>

        <!-- Duplikasi card (dummy) -->
        <div class="border-2 border-[#4A5D49]/50 rounded-3xl p-6 bg-white">
            <div class="h-44 rounded-2xl overflow-hidden">
                <img src="../assets/images/events/event2.jpg"
                     class="w-full h-full object-cover">
            </div>
            <h3 class="mt-4 text-lg font-semibold text-[#4A5D49]">Judul Event</h3>
            <p class="text-sm mt-2">📅 23 Desember 2025</p>
            <p class="text-sm text-gray-600 mt-1">Nama Penyelenggara</p>
            <a href="#" class="mt-4 inline-block bg-[#8bbfa9] text-white px-5 py-2 rounded-full text-sm">
                Lihat detail →
            </a>
        </div>

        <div class="border-2 border-[#4A5D49]/50 rounded-3xl p-6 bg-white">
            <div class="h-44 rounded-2xl overflow-hidden">
                <img src="../assets/images/events/event3.jpg"
                     class="w-full h-full object-cover">
            </div>
            <h3 class="mt-4 text-lg font-semibold text-[#4A5D49]">Judul Event</h3>
            <p class="text-sm mt-2">📅 23 Desember 2025</p>
            <p class="text-sm text-gray-600 mt-1">Nama Penyelenggara</p>
            <a href="#" class="mt-4 inline-block bg-[#8bbfa9] text-white px-5 py-2 rounded-full text-sm">
                Lihat detail →
            </a>
        </div>

    </div>

</section>

<script src="/js/dropdown .js"></script>

<?php include 'components/footer.php'; ?>

</body>
</html>
