<?php
session_start();
require_once __DIR__ . '/../backend/config/connection.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION['user_id'];

/* BARANG YANG DIAMBIL */
$stmtTaken = $conn->prepare("
  SELECT i.*
  FROM items i
  WHERE i.taken_by = ?
  ORDER BY i.taken_at DESC
");
$stmtTaken->bind_param("i", $user_id);
$stmtTaken->execute();
$itemsTaken = $stmtTaken->get_result()->fetch_all(MYSQLI_ASSOC);

/* BARANG YANG DIDONASIKAN */
$stmtDonasi = $conn->prepare("
  SELECT i.*
  FROM items i
  WHERE i.user_id = ?
  ORDER BY i.created_at DESC
");
$stmtDonasi->bind_param("i", $user_id);
$stmtDonasi->execute();
$itemsDonasi = $stmtDonasi->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Inbox | ReShare</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body class="font-['DM_Sans'] bg-[#fafaf7] min-h-screen text-[#3e5648]">

<!-- BACKGROUND -->
<div class="fixed inset-0 -z-10 bg-cover bg-center"
     style="background-image:url('/reshare/assets/images/background/bg1.jpg');">
  <div class="absolute inset-0 bg-white/30 backdrop-blur-sm"></div>
</div>


<!-- BACK -->
<a href="javascript:history.back()"
   class="fixed top-6 left-6 flex items-center gap-2 z-50">
  <img src="/reshare/assets/icons/back.svg" class="w-10 h-10">
  <span class="text-[30px] font-semibold">Kembali</span>
</a>


<!-- BOX -->
<div class="justify-center min-h-[50px] flex items-center pt-36 pb-20 px-6">
<div class="max-w-4xl mx-auto bg-[#fafaf7] rounded-[28px] border border-[#3e5648]/50">

<!-- HEADER FIX -->
<div class="px-8 py-6 border-b border-[#3e5648]/20 grid grid-cols-2">
  <h2 class="text-xl font-semibold flex justify-start mt-6 px-10">
    <span id="titleDonasi">Barang yang Kamu Donasikan</span>
    <span id="titleAmbil" class="hidden">Barang yang Kamu Ambil</span>
  </h2>

<!-- TAB -->
<div class="flex justify-end gap-6 px-10 ">
  <button id="tabDonasi"
    class="px-8 py-1 rounded-full bg-[#3e5648] text-[#fafaf7] border border-[#3e5648] hover:bg-[#fafaf7] hover:text-[#3e5648] transition">
    Donasi
  </button>
  <button id="tabAmbil"
    class="px-8 py-1 rounded-full bg-[#3e5648] text-[#fafaf7] border border-[#3e5648] hover:bg-[#fafaf7] hover:text-[#3e5648] transition">
    Diambil
  </button>
</div>
</div>

<!-- SCROLL AREA -->
<div class="px-8 py-6 max-h-[55vh] overflow-y-auto
            overscroll-contain scrollbar-thin scrollbar-thumb-[#7fb7a4]/40">

<!-- DONASI -->
<div id="contentDonasi" class="space-y-4">
<?php if (empty($itemsDonasi)): ?>
  <p class="text-gray-500">Belum ada barang donasi.</p>
<?php else: ?>
  <?php foreach ($itemsDonasi as $item): ?>
    <?php $mode='inbox'; include 'components/card_item.php'; ?>
  <?php endforeach; ?>
<?php endif; ?>
</div>

<!-- AMBIL -->
<div id="contentAmbil" class="hidden space-y-4">
<?php if (empty($itemsTaken)): ?>
  <p class="text-gray-500">Belum ada barang diambil.</p>
<?php else: ?>
  <?php foreach ($itemsTaken as $item): ?>
    <?php $mode='inbox'; include 'components/card_item.php'; ?>
  <?php endforeach; ?>
<?php endif; ?>
</div>

</div>
</div>
</div>

<script>
const tabDonasi=document.getElementById('tabDonasi');
const tabAmbil=document.getElementById('tabAmbil');
const contentDonasi=document.getElementById('contentDonasi');
const contentAmbil=document.getElementById('contentAmbil');
const titleDonasi=document.getElementById('titleDonasi');
const titleAmbil=document.getElementById('titleAmbil');

tabDonasi.onclick=()=>{
 tabDonasi.classList.add('bg-white');
 tabAmbil.classList.remove('bg-white');
 contentDonasi.classList.remove('hidden');
 contentAmbil.classList.add('hidden');
 titleDonasi.classList.remove('hidden');
 titleAmbil.classList.add('hidden');
};

tabAmbil.onclick=()=>{
 tabAmbil.classList.add('bg-white');
 tabDonasi.classList.remove('bg-white');
 contentAmbil.classList.remove('hidden');
 contentDonasi.classList.add('hidden');
 titleAmbil.classList.remove('hidden');
 titleDonasi.classList.add('hidden');
};
</script>

</body>
</html>
