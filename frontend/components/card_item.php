<?php
$mode = $mode ?? 'katalog';
$basePath = $basePath ?? '..';

$badgeClass = match($item['kondisi']) {
  'Seperti Baru' => 'bg-[#3e5648]',
  'Bagus'        => 'bg-[#657b6e]',
  'Layak Pakai'  => 'bg-[#7fb7a4]',
  default        => 'bg-gray-400'
};
?>

<!-- ================= MODE HOME (REKOMENDASI) ================= -->
<?php if ($mode === 'home'): ?>

<a href="detail_barang.php?id=<?= $item['item_id']; ?>"
   class="relative w-64 h-40 shrink-0 rounded-xl overflow-hidden group">

  <!-- IMAGE -->
  <img
    src="/reshare/<?= htmlspecialchars($item['foto']); ?>"
    class="w-full h-full object-cover"
    alt="<?= htmlspecialchars($item['nama_barang']); ?>"
  >

  <!-- OVERLAY -->
  <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

  <!-- BADGE -->
  <span class="absolute bottom-3 left-3 px-3 py-1 rounded-full text-xs text-white <?= $badgeClass; ?>">
    <?= $item['kondisi']; ?>
  </span>

  <!-- TITLE -->
  <p class="absolute bottom-10 left-3 right-3 text-white font-semibold text-sm leading-tight">
    <?= $item['nama_barang']; ?>
  </p>
</a>

<?php endif; ?>


<!-- ================= MODE KATALOG ================= -->
<?php if ($mode === 'katalog'): ?>

<div class="bg-white rounded-2xl border border-[#3e5648]/60 p-4 flex gap-4">

  <!-- FOTO -->
  <div class="w-28 h-28 flex-shrink-0 rounded-xl overflow-hidden bg-gray-100">
    <img
      src="/reshare/<?= htmlspecialchars($item['foto']); ?>"
      class="w-full h-full object-cover"
      alt="<?= htmlspecialchars($item['nama_barang']); ?>">
  </div>

  <!-- INFO -->
  <div class="flex-1 flex flex-col justify-between">

    <!-- TEKS UTAMA -->
    <div class="space-y-2">

      <!-- NAMA BARANG -->
      <h3 class="text-lg font-semibold text-[#3e5648]">
        <?= htmlspecialchars($item['nama_barang']); ?>
      </h3>

      <!-- DESKRIPSI -->
      <p class="text-sm text-gray-600 line-clamp-2">
        <?= htmlspecialchars($item['deskripsi']); ?>
      </p>

      <!-- KONDISI -->
      <span class="inline-block w-fit px-4 py-1 rounded-full text-xs text-white <?= $badgeClass; ?>">
        <?= htmlspecialchars($item['kondisi']); ?>
      </span>

    <div class="flex items-center justify-between mt-2">

      <!-- DONATUR -->
      <div class="flex items-center gap-2 text-xs text-gray-500">
        <img src="/reshare/assets/icons/user_h.svg"
            alt="Donatur"
            class="w-4 h-4 opacity-70">
        <span class="font-medium">
          <?= htmlspecialchars($item['donatur']); ?>
        </span>
      </div>

      <!-- BUTTON -->
      <a href="detail_barang.php?id=<?= $item['id']; ?>"
        class="flex items-center gap-2 px-5 py-1 rounded-full
                bg-[#7fb7a4] text-white text-sm hover:opacity-90 transition">
        Lihat Detail
      </a>

    </div>
    </div>

  </div>
</div>


<?php endif; ?>
<?php if ($mode === 'inbox'): ?>

<div class="flex items-center gap-4
            bg-white rounded-xl border border-[#3e5648]/20
            p-4 max-w-[520px]
            hover:shadow-md transition">

  <div class="w-20 h-20 rounded-lg overflow-hidden bg-gray-100">
    <img src="/reshare/<?= htmlspecialchars($item['foto']); ?>"
         class="w-full h-full object-cover">
  </div>

  <div class="flex-1 text-sm space-y-1">

    <p class="font-semibold text-base">
      <?= htmlspecialchars($item['nama_barang']); ?>
    </p>

    <div class="flex gap-2 text-xs text-gray-600">
      <span><?= htmlspecialchars($item['kategori']); ?></span>
      <span>•</span>
      <span><?= htmlspecialchars($item['kondisi']); ?></span>
    </div>

    <?php if (!empty($item['taken_at'])): ?>
      <p class="text-xs text-gray-500">
        Diambil pada <?= date('d M Y', strtotime($item['taken_at'])); ?>
      </p>
    <?php else: ?>
      <p class="text-xs text-gray-500">
        Diunggah <?= date('d M Y', strtotime($item['created_at'])); ?>
      </p>
    <?php endif; ?>

  </div>
</div>
<?php endif; ?>
