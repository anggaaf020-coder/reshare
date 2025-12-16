<?php
require_once __DIR__ . '/../backend/events/get_detail_event.php';
?>

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
                 <img src="/reshare/assets/images/events/<?= htmlspecialchars($event['poster']); ?>"
                        class="w-full h-full rounded-3xl object-cover shadow">
        </div>

        <!-- ================= RIGHT : DETAIL ================= -->
        <div class="bg-white rounded-3xl p-10 shadow-xl flex flex-col justify-between min-h-[480px]">

            <div> 
                <h1 class="text-2xl font-semibold text-[#3e5648]">
                 <?= htmlspecialchars($event['title']); ?>
                </h1>

            <p class="text-sm text-[#3e5648] mt-1">
                <?= htmlspecialchars($event['username']); ?>
                    &nbsp;|&nbsp;
                <?= htmlspecialchars($event['alamat']); ?>
            </p>

                <h2 class="font-semibold text-[#3e5648] mt-3 mb-1">Deskripsi</h2>

            <p class="text-[#4A5D49] leading-relaxed">
                <?= nl2br(htmlspecialchars($event['description'])); ?>
            </p>


                <ol class="list-decimal list-inside mt-4 text-[#3e5648] space-y-1">
                    <li>Buku</li>
                    <li>Alat tulis</li>
                    <li>Dana</li>
                </ol>
            </div>

            <!-- ================= BUTTON ================= -->
            <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $event['phone']); ?>"
                target="_blank"
                 class="inline-flex items-center gap-2 bg-[#7fb7a4] text-white px-4 py-1 rounded-full font-semibold shadow-sm hover:opacity-90 transition">
                    <img src="../assets/icons/kontak.svg" class="w-4 h-4" alt="">
                    Hubungi
                </a>
            </div>

        </div>

    </div>
</div>

<script src="../js/back.js"></script>

</body>
</html>