<div class="bg-white rounded-xl shadow p-4 flex gap-4 items-center border border-gray-200">

    <!-- FOTO BARANG -->
    <div class="w-28 h-24 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
        <img src="../assets/items/<?= $item['foto'] ?>"
             class="w-full h-full object-cover">
    </div>

    <!-- INFO -->
    <div class="flex-1">
        <h3 class="font-semibold text-[#4A5D49] text-sm">
            <?= $item['nama_barang'] ?>
        </h3>

        <p class="text-xs text-gray-600 mt-1">
            <?= $item['deskripsi_singkat'] ?>
        </p>

        <p class="text-xs text-gray-500 mt-1">
            <?= $item['donatur'] ?>
        </p>
    </div>

    <!-- BUTTON -->
    <a href="detail_barang.php?id=<?= $item['item_id']; ?>"
       class="bg-[#4A5D49] text-white px-4 py-1 rounded-full text-sm shadow hover:opacity-90 transition">
        Lihat Detail
    </a>

</div>
