<?php
require_once __DIR__ . '/../backend/events/fetch_events.php';
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
</head>

<body class="bg-[#fafaf7]">
<script src="../js/dropdown.js"></script>
<!-- ================= HERO EVENT ================= -->
<section class="relative min-h-[80vh] px-16 pt-32 pb-40 overflow-hidden">

<!-- Background ilustrasi -->
    <div class="absolute inset-0 h-full bg-[url('../assets/images/background/bg7.png')] bg-cover bg-center opacity-60"></div>

    <!-- Konten -->
    <div class="relative z-10 max-w-6xl mx-auto mt-12">

        <h1 class="text-5xl font-serif text-[#3e5648] leading-tight">
            Spread Kindness, Share Hope
        </h1>

        <p class="text-[35px] font-semibold text-[#3e5648] mt-4">
            Give more, care more,<br>share more
        </p>

        <!-- Search -->
        <form action="katalog_events.php" method="GET"
            class="mt-10 w-[45%] bg-[#fafaf7] rounded-full px-6 py-3 shadow flex items-center">
            <input
                type="text"
                name="q"
                placeholder="cari event terdekat"
                class="flex-1 text-[#3e5648] bg-transparent font-medium outline-none"
                required
            >
            <button type="submit">
                <img src="../assets/icons/cari.svg" class="w-5 h-5 opacity-70">
            </button>
        </form>

        <div class="flex gap-4 mt-8">

            <!-- BUAT EVENT -->
            <a href="upload_event.php"
            class="bg-[#fafaf7] px-6 py-2 rounded-full
                    flex items-center justify-center gap-3
                    shadow-md hover:shadow-lg transition">

                <img src="../assets/icons/event.svg" class="w-5 h-5">
                <span class="text-[20px] text-[#3e5648] font-medium">
                    Buat Event
                </span>
            </a>

            <!-- KATALOG EVENT -->
            <a href="katalog_events.php"
            class="bg-[#fafaf7] px-6 py-2 rounded-full
                    flex items-center justify-center gap-3
                    shadow-md hover:shadow-lg transition">

                <img src="../assets/icons/kategori.svg" class="w-5 h-5">
                <span class="text-[20px] text-[#3e5648] font-medium">
                    Katalog Event
                </span>
            </a>

        </div>

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
<section class="max-w-6xl mx-auto pt-36 px-8 pb-20">

  <h1 class="text-3xl font-semibold text-[#3e5648] mb-10">
    Event terdekat
  </h1>

  <?php if (empty($events)): ?>
    <p class="text-gray-500">
      Belum ada event yang tersedia saat ini.
    </p>
  <?php else: ?>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">

    <?php foreach ($events as $event): ?>
        <a href="detail_event.php?id=<?= $event['id']; ?>"
        class="bg-white rounded-3xl border border-[#4A5D49]/30
                overflow-hidden shadow hover:shadow-xl
                transition duration-300 hover:-translate-y-1">

        <!-- POSTER -->
        <div class="h-72 bg-[#fafaf7] flex items-center justify-center">
            <img
            src="/reshare/assets/images/events/<?= htmlspecialchars($event['poster']); ?>"
            alt="<?= htmlspecialchars($event['title']); ?>"
            class="max-h-full max-w-full object-contain
                    transition-transform duration-300
                    group-hover:scale-105">
        </div>

        <!-- INFO -->
        <div class="p-6">
            <h3 class="text-xl font-semibold text-[#4A5D49] leading-snug">
            <?= htmlspecialchars($event['title']); ?>
            </h3>

            <?php if (!empty($event['event_date'])): ?>
            <p class="mt-3 text-[18px] text-[#4A5D49]">
                📅 <?= date('d F Y', strtotime($event['event_date'])); ?>
            </p>
            <?php endif; ?>

            <p class="mt-1 text-[18px] text-gray-600">
            Penyelenggara: <?= htmlspecialchars($event['username']); ?>
            </p>
        </div>

        </a>
    <?php endforeach; ?>

    </div>

  <?php endif; ?>

</section>

<script src="/js/dropdown .js"></script>

<?php include 'components/footer.php'; ?>

</body>
</html>
