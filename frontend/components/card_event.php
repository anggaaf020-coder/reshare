<div class="bg-white rounded-xl shadow overflow-hidden">

    <!-- Foto Event -->
    <div class="w-full h-40 bg-gray-100">
        <img src="../assets/events/<?= $event['poster']; ?>"
             class="w-full h-full object-cover">
    </div>

    <!-- Konten -->
    <div class="p-5">
        <h3 class="font-semibold text-lg text-[#4A5D49]">
            <?= $event['title']; ?>
        </h3>

        <p class="text-gray-600 text-sm mt-2">
            <?= date("d F Y", strtotime($event['tanggal'])); ?>
        </p>

        <p class="flex items-center gap-1 text-gray-600 text-sm mt-1">
            📍 <?= $event['lokasi']; ?>
        </p>

        <a href="detail_event.php?id=<?= $event['event_id']; ?>"
           class="mt-4 inline-block bg-[#4A5D49] text-white px-6 py-1 rounded-full hover:opacity-90 transition">
            Lihat Detail
        </a>
    </div>
</div>
