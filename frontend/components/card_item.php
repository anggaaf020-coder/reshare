<?php
/**
 * REQUIRED:
 * $item     → data barang
 * $mode     → 'home' | 'katalog'
 * $basePath → path relatif ke root (misal '..')
 */

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
    src="<?= $basePath; ?>/assets/images/items/<?= $item['foto']; ?>"
    alt="<?= $item['nama_barang']; ?>"
    class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
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
      src="<?= $basePath; ?>/assets/images/items/<?= $item['foto']; ?>"
      class="w-full h-full object-cover"
      alt="<?= $item['nama_barang']; ?>"
    >
  </div>

  <!-- INFO -->
  <div class="flex-1 flex flex-col justify-between">

    <!-- ATAS -->
    <div class="space-y-2">
      <h3 class="text-lg font-semibold text-[#3e5648] leading-snug">
        <?= $item['nama_barang']; ?>
      </h3>

      <p class="text-sm text-gray-600 leading-snug">
        <?= $item['deskripsi']; ?>
      </p>
    </div>

    <!-- BAWAH -->
    <div class="flex items-center justify-between mt-3">

      <!-- BADGE + DONATUR -->
      <div class="space-y-1">
        <span class="inline-flex items-center justify-center min-w-[110px] h-[26px]
                     text-xs text-white rounded-full <?= $badgeClass; ?>">
          <?= $item['kondisi']; ?>
        </span>

        <div class="flex items-center gap-2 mt-1">
          <img src="<?= $basePath; ?>/assets/icons/user_h.svg" class="w-4 h-4 opacity-70">
          <p class="text-sm font-medium text-[#3e5648]">
            <?= $item['donatur']; ?>
          </p>
        </div>
      </div>

      <!-- BUTTON -->
      <a href="detail_barang.php?id=<?= $item['item_id']; ?>"
         class="flex items-center gap-2 px-5 py-1 rounded-full
                bg-[#7fb7a4] text-white text-sm
                hover:opacity-90 transition">
        Lihat Detail
        <span class="text-lg">›</span>
      </a>

    </div>
  </div>
</div>

<?php endif; ?>
