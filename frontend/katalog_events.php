<?php
    require_once __DIR__ . '/../backend/events/fetch_events.php';
    include 'components/navbar_h.php';

    $q = trim($_GET['q'] ?? '');

    $sql = "
    SELECT e.*, u.username
    FROM events e
    JOIN users u ON e.user_id = u.id
    WHERE 1
    ";

    if ($q !== '') {
        $sql .= " AND e.title LIKE ?";
    }

    $sql .= " ORDER BY e.event_date ASC";

    $stmt = $conn->prepare($sql);

    if ($q !== '') {
        $like = "%$q%";
        $stmt->bind_param("s", $like);
    }

    $stmt->execute();
    $events = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Event | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'DM Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#fafaf7]">
<script src="../js/dropdown.js"></script>

<!-- ================= HEADER ================= -->
<section class="px-16 pt-32 pb-16">
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-4xl font-serif text-[#3e5648]">
            Katalog Event Donasi
        </h1>
        <p class="mt-4 text-[35px] text-[#4A5D49]">
            Temukan dan ikuti event berbagi di sekitarmu
        </p>
    </div>
</section>

<!-- ================= GRID KATALOG EVENT ================= -->
<section class="max-w-7xl mx-auto px-16 pb-32">

        <div class="grid grid-cols-2 gap-16">

            <?php if (empty($events)): ?>
                <p class="text-gray-500 col-span-2 text-center">
                    Belum ada event tersedia.
                </p>
            <?php else: ?>

            <?php foreach ($events as $event): ?>
            <div class="bg-white rounded-3xl border border-[#4A5D49]/30
                        overflow-hidden shadow hover:shadow-xl transition">

                <!-- POSTER -->
                <div class="h-80 overflow-hidden">
                    <img
                        src="/reshare/assets/images/events/<?= htmlspecialchars($event['poster']); ?>"
                        class="w-full h-full object-cover hover:scale-105 transition duration-500"
                        alt="<?= htmlspecialchars($event['title']); ?>">
                </div>

                <!-- CONTENT -->
                <div class="p-6">
                    <h3 class="text-[25px] font-semibold text-[#4A5D49]">
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

                    <!-- DETAIL -->
                    <a href="detail_event.php?id=<?= $event['id']; ?>"
                    class="inline-block mt-6 bg-[#7fb7a4] text-white
                            px-6 py-2 rounded-full text-[15px]
                            hover:opacity-90 transition">
                        Lihat Detail 
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

            <?php endif; ?>
            </div>

</section>
<?php include 'components/footer.php'; ?>
</body>
</html>
