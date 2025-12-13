<?php include 'components/navbar_katalog.php';?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#F9F8F4]">

    <!-- ================= LIST ITEM ================= -->
    <div class="px-5 pt-28 space-y-5"> <!-- FIX: padding top agar tidak nabrak navbar -->

        <?php for ($i = 0; $i < 6; $i++): ?>
        <div class="bg-white rounded-xl shadow p-4 flex gap-4 items-center border border-gray-200">

            <!-- FOTO ITEM -->
            <div class="w-32 h-24 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                <img src="../assets/items/sample<?php echo ($i % 3) + 1; ?>.jpg"
                     class="w-full h-full object-cover">
            </div>

            <!-- INFORMASI ITEM -->
            <div class="flex-1">
                <h3 class="font-semibold text-[#4A5D49] text-sm">
                    &lt;nama produk&gt;
                </h3>

                <p class="text-xs text-gray-600 mt-1">
                    &lt;deskripsi singkat barang&gt;
                </p>

                <p class="text-xs text-gray-500 mt-2">
                    &lt;nama donatur&gt;
                </p>
            </div>

            <!-- TOMBOL DETAIL -->
            <a href="detail_barang.php?id=<?php echo $i+1; ?>"
               class="bg-[#4A5D49] text-white px-4 py-1 rounded-full text-sm shadow hover:opacity-90 transition">
                Lihat Detail
            </a>
        </div>
        <?php endfor; ?>

    </div>

    <?php include 'components/footer.php'; ?>
</body>
</html>

