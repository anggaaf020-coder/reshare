<?php
/* include 'components/navbar_h.php'; */

// dummy data (nanti ganti dari database)
$riwayatDonasi = [
  [
    'foto' => 'sample1.jpg',
    'tanggal' => '23-12-2025',
    'deskripsi' => 'iPhone 11 BNIB iBox 4/64 GB'
  ],
  [
    'foto' => 'sample2.jpg',
    'tanggal' => '20-12-2025',
    'deskripsi' => 'Laptop Lenovo Thinkpad'
  ],
  [
    'foto' => 'sample3.jpg',
    'tanggal' => '18-12-2025',
    'deskripsi' => 'Catokan Rambut'
  ],
];

$riwayatAmbil = [
  [
    'foto' => 'sample4.jpg',
    'tanggal' => '22-12-2025',
    'deskripsi' => 'Rice Cooker Mini'
  ],
  [
    'foto' => 'sample5.jpg',
    'tanggal' => '19-12-2025',
    'deskripsi' => 'Buku Pemrograman'
  ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Inbox | ReShare</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body class="font-['DM_Sans'] min-h-screen relative overflow-hidden text-[#3e5648]">

<!-- BACKGROUND -->
<div class="fixed inset-0 -z-10 bg-cover bg-center"
     style="background-image:url('/reshare/assets/images/background/bg1.jpg');">
  <div class="absolute inset-0 bg-white/30 backdrop-blur-sm"></div>
</div>

<!-- TAB BUTTON -->
<div class="flex gap-6 px-10 pt-20">
 <!-- BACK BUTTON -->
    <a href="javascript:history.back()"
    class="absolute top-6 left-6 flex items-center gap-1
          text-[#fafaf7] font-medium hover:opacity-80 transition">

    <img src="/reshare/assets/icons/back.svg" class="w-8 h-8" alt="Back">
    <span class="text-xl font-semibold text-[#3e5648]">Kembali</span>
    </a>
  <button id="tabDonasi"
    class="px-8 py-2 rounded-full border border-[#3e5648] font-medium bg-white">
    Donasi
  </button>
  <button id="tabAmbil"
    class="px-8 py-2 rounded-full border border-[#3e5648] font-medium bg-transparent">
    Diambil
  </button>
</div>

<!-- CONTAINER -->
<div class="px-10 mt-6">
  <div class="bg-[#fafaf7] rounded-[32px] border border-[#3e5648]/60
              p-8 h-[60vh] overflow-y-auto">

    <!-- DONASI -->
    <div id="contentDonasi" class="grid grid-cols-2 gap-8">
      <?php foreach($riwayatDonasi as $r): ?>
      <div class="flex gap-5 border border-[#3e5648]/50 rounded-2xl p-4">
        <img src="/reshare/assets/images/<?= $r['foto'] ?>"
             class="w-28 h-20 rounded-xl object-cover">
        <div class="text-sm leading-relaxed">
          <p class="font-medium">Diunggah pada:</p>
          <p><?= $r['tanggal'] ?></p>
          <p class="font-medium mt-2">Deskripsi:</p>
          <p><?= $r['deskripsi'] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- AMBIL -->
    <div id="contentAmbil" class="grid grid-cols-2 gap-8 hidden">
      <?php foreach($riwayatAmbil as $r): ?>
      <div class="flex gap-5 border border-[#3e5648]/50 rounded-2xl p-4">
        <img src="/reshare/assets/images/<?= $r['foto'] ?>"
             class="w-28 h-20 rounded-xl object-cover">
        <div class="text-sm leading-relaxed">
          <p class="font-medium">Diambil pada:</p>
          <p><?= $r['tanggal'] ?></p>
          <p class="font-medium mt-2">Deskripsi:</p>
          <p><?= $r['deskripsi'] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>

<!-- SCRIPT TAB -->
<script>
const tabDonasi = document.getElementById('tabDonasi');
const tabAmbil = document.getElementById('tabAmbil');
const contentDonasi = document.getElementById('contentDonasi');
const contentAmbil = document.getElementById('contentAmbil');

tabDonasi.onclick = () => {
  tabDonasi.classList.add('bg-white');
  tabAmbil.classList.remove('bg-white');
  contentDonasi.classList.remove('hidden');
  contentAmbil.classList.add('hidden');
};

tabAmbil.onclick = () => {
  tabAmbil.classList.add('bg-white');
  tabDonasi.classList.remove('bg-white');
  contentAmbil.classList.remove('hidden');
  contentDonasi.classList.add('hidden');
};
</script>

</body>
</html>
