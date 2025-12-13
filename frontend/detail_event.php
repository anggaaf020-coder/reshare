<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#F4F1E3] p-10">

    <!-- Back Button -->
    <a href="event.php" class="text-xl text-[#4A5D49] mb-6 inline-block">
        ← Event
    </a>

    <div class="bg-white rounded-2xl p-8 shadow flex gap-10">

        <!-- Poster -->
        <div class="w-1/2">
            <img src="../assets/events/event1.png"
                 class="w-full h-[400px] rounded-xl object-cover shadow"
                 alt="Event Poster">

            <!-- Slider dots (opsional) -->
            <div class="flex justify-center gap-2 mt-4">
                <div class="w-3 h-3 bg-black rounded-full"></div>
                <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
            </div>
        </div>

        <!-- Info Event -->
        <div class="w-1/2">

            <p class="text-sm text-gray-600">Pakaian</p>

            <h2 class="text-3xl font-semibold text-[#4A5D49]">
                Sedekah Buku, Buka Jendela Dunia
            </h2>

            <p class="text-gray-600 mt-2">
                Oleh: RS Surya Medika · 08xxxxxxxxxx
            </p>

            <hr class="my-4 border-[#4A5D49] opacity-40">

            <h3 class="font-semibold text-lg text-[#4A5D49]">Deskripsi</h3>

            <p class="text-gray-700 mt-2 leading-relaxed">
                Event ini bertujuan untuk mengajak masyarakat menyumbangkan buku layak baca untuk dibagikan
                kepada anak-anak di berbagai daerah. Anda dapat mendaftar melalui WhatsApp.
            </p>

            <!-- Tombol daftar -->
            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20mendaftar%20event%20ReShare"
               target="_blank"
               class="mt-6 inline-block bg-[#4A5D49] text-white px-10 py-2 rounded-full font-semibold hover:opacity-90 transition">
                Daftar
            </a>

        </div>

    </div>

</body>
</html>
