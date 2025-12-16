<?php
require_once __DIR__ . '/../backend/items/get_detail.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Barang | ReShare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'DM Sans', sans-serif; }
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

    <a href="javascript:history.back()"
       class="absolute top-6 left-6 flex items-center gap-1
              text-[#fafaf7] font-medium hover:opacity-80 transition">
        <img src="/reshare/assets/icons/back.svg" class="w-10 h-10" alt="Back">
        <span class="text-[30px] font-semibold text-[#3e5648]">Kembali</span>
    </a>

    <div class="grid grid-cols-2 gap-12 items-stretch">

        <!-- ================= LEFT : IMAGE ================= -->
        <div class="bg-white rounded-3xl p-10 shadow-xl flex items-center justify-center h-[480px] w-full">
            <img src="/reshare/<?= htmlspecialchars($item['foto']); ?>"
                 class="w-full h-full rounded-3xl object-cover shadow">
        </div>

        <!-- ================= RIGHT : DETAIL ================= -->
        <div class="bg-white rounded-3xl p-10 shadow-xl flex flex-col justify-between min-h-[480px]">

            <div>

                <!-- KATEGORI -->
                <p class="text-[#3e5648] font-medium">
                    <?= htmlspecialchars($item['kategori']); ?>
                </p>

                <!-- NAMA BARANG -->
                <h1 class="text-3xl font-semibold text-[#3e5648] mt-2">
                    <?= htmlspecialchars($item['nama_barang']); ?>
                </h1>

                <!-- DONATUR -->
                <p class="text-sm text-gray-600 mt-3">
                    <?= htmlspecialchars($item['username']); ?> |
                    <?= htmlspecialchars($item['alamat']); ?> |
                    <?= htmlspecialchars($item['phone']); ?>
                </p>

                <div class="border-b border-[#7fb7a4] my-6"></div>

                <!-- KONDISI -->
                <p class="font-semibold text-[#3e5648] mb-2">Kondisi Barang</p>
                <span class="inline-block px-6 py-1 rounded-full
                             bg-[#6B7F72] text-white text-sm">
                    <?= htmlspecialchars($item['kondisi']); ?>
                </span>

                <div class="border-b border-[#7fb7a4] my-6"></div>

                <!-- DESKRIPSI -->
                <p class="font-semibold text-[#3e5648] mb-2">Deskripsi</p>
                <p class="text-sm text-gray-700 leading-relaxed">
                    <?= nl2br(htmlspecialchars($item['deskripsi'])); ?>
                </p>
            </div>

            <!-- ================= BUTTON ================= -->
            <div class="mt-10 flex justify-end gap-4">

                <!-- HUBUNGI -->
                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $item['phone']); ?>"
                   target="_blank"
                   class="inline-flex items-center gap-2 bg-[#7fb7a4] text-white
                          px-4 py-1 rounded-full font-semibold shadow-sm
                          hover:opacity-90 transition">
                    <img src="../assets/icons/kontak.svg" class="w-4 h-4" alt="">
                    Hubungi
                </a>

                <!-- AMBIL -->
                <form action="/reshare/backend/items/ambil_item.php" method="POST">
                    <input type="hidden" name="item_id" value="<?= $item['id']; ?>">
                    <input type="hidden" name="redirect" value="<?= htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'katalog.php'); ?>">
                    <button class="bg-[#3e5648] text-white px-8 py-2 rounded-full">
                        Ambil
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
