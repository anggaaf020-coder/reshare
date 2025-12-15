<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-katalog h-screen overflow-hidden">

    <!-- OVERLAY -->
    <div class="bg-overlay h-screen flex flex-col">

        <?php include 'components/navbar_katalog.php'; ?>

        <!-- CONTENT WRAPPER -->
        <div class="flex-1 pt-40 px-6 overflow-hidden">

            <!-- SCROLL AREA -->
            <div class="max-w-4xl mx-auto bg-[#FAFAF7] rounded-t-3xl rounded-b-none p-6 overflow-y-auto h-full">
            <div class="h-8"></div>
            <!-- JARAK CARD & CONTAINER -->
                    <div class="px-6 space-y-6 pb-10">
                        <?php
                            $items = [
                                [
                                    'item_id' => 1,
                                    'nama_barang' => 'Iphone 11 Like New',
                                    'deskripsi' => 'Ip 11 BNIB iBox 4/64 gb',
                                    'kondisi' => 'Seperti Baru',
                                    'donatur' => 'Syifa cantik',
                                    'foto' => 'sample1.jpg'
                                ],
                                [
                                    'item_id' => 2,
                                    'nama_barang' => 'Enzo Catokan Rambut',
                                    'deskripsi' => 'catokan rambut roll, kondisi oke',
                                    'kondisi' => 'Bagus',
                                    'donatur' => 'Syifa cantik',
                                    'foto' => 'sample2.jpg'
                                ],
                                [
                                    'item_id' => 3,
                                    'nama_barang' => 'HP 14S-Slim',
                                    'deskripsi' => 'laptop hp ryzen 3, kondisi cukup oke',
                                    'kondisi' => 'Layak Pakai',
                                    'donatur' => 'Syifa cantik',
                                    'foto' => 'sample3.jpg'
                                ],
                                                        [
                                    'item_id' => 1,
                                    'nama_barang' => 'Iphone 11 Like New',
                                    'deskripsi' => 'Ip 11 BNIB iBox 4/64 gb',
                                    'kondisi' => 'Seperti Baru',
                                    'donatur' => 'Syifa cantik',
                                    'foto' => 'sample1.jpg'
                                ],
                                                        [
                                    'item_id' => 1,
                                    'nama_barang' => 'Iphone 11 Like New',
                                    'deskripsi' => 'Ip 11 BNIB iBox 4/64 gb',
                                    'kondisi' => 'Seperti Baru',
                                    'donatur' => 'Syifa cantik',
                                    'foto' => 'sample1.jpg'
                                ],
                                                        [
                                    'item_id' => 1,
                                    'nama_barang' => 'Iphone 11 Like New',
                                    'deskripsi' => 'Ip 11 BNIB iBox 4/64 gb',
                                    'kondisi' => 'Seperti Baru',
                                    'donatur' => 'Syifa cantik',
                                    'foto' => 'sample1.jpg'
                                ],
                            ];
                        ?>


                        <?php foreach ($items as $item): ?>
                            <?php include 'components/card_item.php'; ?>
                        <?php endforeach; ?>
                    </div>
            </div>
        </div>

    
    </div>
</body>
</html>
