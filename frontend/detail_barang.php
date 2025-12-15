<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Event | ReShare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { scrollbar-width: none; }
    </style>
</head>

<body class="relative min-h-screen bg-[#fafaf7]">

<!-- ================= BACKGROUND ================= -->
<div class="absolute inset-0 -z-10 bg-cover bg-center"
     style="background-image:url('../assets/images/background/bg2.jpg');">
    <div class="absolute inset-0 bg-[#fafaf7]/30"></div>
</div>

<!-- ================= CONTENT ================= -->
<div class="max-w-6xl mx-auto pt-36 px-10">

    <div class="grid grid-cols-2 gap-12 items-stretch">
   <a href="javascript:history.back()"
   class="absolute top-6 left-6 flex items-center gap-1
          text-[#fafaf7] font-medium hover:opacity-80 transition">

    <img src="/reshare/assets/icons/back.svg" class="w-10 h-10" alt="Back">
    <span class="text-[30px] font-semibold text-[#3e5648]">Kembali</span>
    </a>

        <!-- ================= LEFT : IMAGE SLIDER ================= -->
        <div class="bg-white rounded-3xl p-10 shadow-xl flex flex-col justify-between min-h-[480px]">
                <!-- Gambar dummy -->
                <img src="../assets/images/event/event1.jpg"
                     class="w-full h-full rounded-3xl object-cover flex-shrink-0 shadow">
        </div>

        <!-- ================= RIGHT : DETAIL ================= -->
        <div class="bg-white rounded-3xl p-10 shadow-xl flex flex-col justify-between min-h-[480px]">

            <div>
        <p class="text-[#3e5648] font-medium">
            Kategori : Elektronik
        </p>

        <h1 class="text-3xl font-semibold text-[#3e5648] mt-2">
            TV TCL 32-Inch
        </h1>

        <p class="text-sm text-gray-600 mt-3">
            Nama donatur | Alamat Donatur | 08xxxxxxxx
        </p>

        <div class="border-b border-[#7fb7a4] my-6"></div>

        <!-- Kondisi -->
        <p class="font-semibold text-[#3e5648] mb-2">Kondisi Barang</p>
        <span class="inline-block px-6 py-1 rounded-full
                     bg-[#6B7F72] text-white text-sm">
            Bagus
        </span>

        <div class="border-b border-[#7fb7a4] my-6"></div>

        <!-- Deskripsi -->
        <p class="font-semibold text-[#3e5648] mb-2">Deskripsi</p>
        <p class="text-sm text-gray-700 leading-relaxed">
            TV TCL ukuran 32 Inch, 2 tahun pemakaian,
            masih bagus dan layar jernih.
        </p>
    </div>

            <!-- ================= BUTTON ================= -->
            <div class="mt-10 flex justify-end gap-4">
            <a href="https://wa.me/6281234567890"
                target="_blank"
                class="inline-flex items-center gap-2 bg-[#7fb7a4] text-white px-4 py-1 rounded-full font-semibold shadow-sm hover:opacity-90 transition">
                <img src="../assets/icons/kontak.svg" class="w-4 h-4" alt="">
                Hubungi
            </a>
        <button
            class="flex items-center gap-2
                   border border-[#7fb7a4]
                   text-[#3e5648]
                   px-10 py-1 rounded-full
                   hover:bg-[#7fb7a4]/10 transition">
            Ambil
        </button>

        </div>

    </div>
</div>

<script src="../js/back.js"></script>

</body>
</html>