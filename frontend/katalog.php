<?php
    require_once __DIR__ . '/../backend/config/connection.php';

    $q        = trim($_GET['q'] ?? '');
    $kategori = trim($_GET['kategori'] ?? '');

    $sql = "
    SELECT 
      i.id,
      i.nama_barang,
      i.kategori,
      i.kondisi,
      i.deskripsi,
      i.foto,
      u.username AS donatur
    FROM items i
    JOIN users u ON i.user_id = u.id
    WHERE i.status = 'available'
    ";

    $params = [];
    $types  = "";

    if ($kategori !== '') {
      $sql .= " AND i.kategori = ?";
      $params[] = $kategori;
      $types .= "s";
    }

    if ($q !== '') {
      $sql .= " AND i.nama_barang LIKE ?";
      $params[] = "%$q%";
      $types .= "s";
    }

    $sql .= " ORDER BY i.created_at DESC";

    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
      $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();

    $items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Katalog | ReShare</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../style/main.css">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-katalog h-screen overflow-hidden" >

<div class="bg-overlay h-screen flex flex-col">

  <?php include 'components/navbar_katalog.php'; ?>

  <div class="flex-1 pt-40 px-6 overflow-hidden">

    <div class="max-w-4xl mx-auto bg-[#FAFAF7] rounded-t-3xl p-6 overflow-y-auto h-full">

      <div class="h-8"></div>

        <?php if ($q): ?>
          <div class="mb-6 px-6">
            <p class="text-[20px] text-[#3e5648]">
              Hasil pencarian untuk:
              <span class="font-semibold">"<?= htmlspecialchars($q); ?>"</span>
            </p>
          </div>
        <?php endif; ?>

      <!-- LIST CARD (1 KOLOM KE BAWAH) -->
      <div class="px-6 space-y-6 pb-10">

        <?php if (count($items) === 0): ?>
          <p class="text-center text-gray-500">Belum ada barang tersedia</p>
        <?php endif; ?>

        <?php foreach ($items as $item): ?>
          <?php
            $mode = 'katalog';
            $basePath = '..';
            include 'components/card_item.php';
          ?>
        <?php endforeach; ?>

      </div>

    </div>
  </div>
</div>

</body>
</html>
