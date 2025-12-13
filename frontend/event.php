<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#F4F1E3]">

    <!-- (Nanti) <?php include 'components/navbar.php'; ?> -->

    <a href="home.php" class="text-xl text-[#4A5D49] mb-6 inline-block">
    ← home
    </a>

    <!-- ================= HEADER SECTION ================= -->
    <section class="w-full bg-[#D9D7C9] p-10 relative">

        <!-- Dua foto bulat -->
        <img src="../assets/images/events/bulat1.png"
             class="absolute top-10 right-28 w-16 h-16 rounded-full object-cover shadow">
        <img src="../assets/images/events/bulat2.png"
             class="absolute top-36 right-16 w-20 h-20 rounded-full object-cover shadow">

        <h1 class="text-4xl font-semibold text-[#4A5D49] mt-10">
            Spread Kindness, Share Hope
        </h1>
        <p class="text-xl text-gray-700 mt-2">
            Give more, care more, share more
        </p>

        <!-- Search Bar -->
        <div class="bg-white mt-6 w-[60%] rounded-full px-4 py-2 shadow flex items-center">
            <input type="text" class="flex-1 outline-none px-3" placeholder="Cari event...">
            <span class="text-lg text-gray-700">&#128269;</span>
        </div>
    </section>

    <?php include 'components/footer.php';  ?>

    <!-- ================= EVENTS LIST ================= -->
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <!-- FOTO EVENT (fixed ukuran) -->
            <div class="w-full h-40 bg-gray-100">
                <img src="../assets/events/<?= $event['poster']; ?>"
                    class="w-full h-full object-cover"
                    alt="<?= $event['title']; ?>">
            </div>

            <!-- ISI CARD -->
            <div class="p-5">
                <h3 class="font-semibold text-lg text-[#4A5D49]">
                    <?= $event['title']; ?>
                </h3>

                <p class="text-gray-600 text-sm mt-2">
                    <?= date("d F Y", strtotime($event['date'])); ?>
                </p>

                <p class="flex items-center gap-1 text-gray-600 text-sm mt-1">
                    📍 <?= $event['location']; ?>
                </p>

                <a href="detail_event.php?id=<?= $event['id']; ?>"
                class="mt-4 inline-block bg-[#4A5D49] text-white px-6 py-1 rounded-full hover:opacity-90 transition">
                    Lihat Detail
                </a>
            </div>

        </div>
        </div>
    </section>

</body>
</html>
