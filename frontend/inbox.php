  <?php
  session_start();
  require_once __DIR__ . '/../backend/config/connection.php';

  if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
  }

  $user_id = $_SESSION['user_id'];

  // TAKEN
  $stmtTaken = $conn->prepare("
    SELECT i.*
    FROM items i
    WHERE i.taken_by = ?
    ORDER BY i.taken_at DESC
  ");
  $stmtTaken->bind_param("i", $user_id);
  $stmtTaken->execute();
  $itemsTaken = $stmtTaken->get_result()->fetch_all(MYSQLI_ASSOC);

  // DONATE
  $stmtDonasi = $conn->prepare("
    SELECT i.*
    FROM items i
    WHERE i.user_id = ?
    ORDER BY i.created_at DESC
  ");
  $stmtDonasi->bind_param("i", $user_id);
  $stmtDonasi->execute();
  $itemsDonasi = $stmtDonasi->get_result()->fetch_all(MYSQLI_ASSOC);

  // REQ
  $stmtMyReq = $conn->prepare("
    SELECT
      r.status,
      r.created_at,
      i.nama_barang,
      i.foto,
      i.taken_at
    FROM item_requests r
    JOIN items i ON r.item_id = i.id
    WHERE r.requester_id = ?
    ORDER BY r.created_at DESC
  ");
  $stmtMyReq->bind_param("i", $user_id);
  $stmtMyReq->execute();
  $myRequests = $stmtMyReq->get_result()->fetch_all(MYSQLI_ASSOC);

  $stmtReq = $conn->prepare("
    SELECT
      r.id AS request_id,
      r.status,
      r.purpose,
      r.alasan,
      r.created_at,
      i.nama_barang,
      i.foto,
      u.username
    FROM item_requests r
    JOIN items i ON r.item_id = i.id
    JOIN users u ON r.requester_id = u.id
    WHERE i.user_id = ?
    AND r.status = 'pending'
    ORDER BY r.created_at DESC
  ");
  $stmtReq->bind_param("i", $user_id);
  $stmtReq->execute();
  $requests = $stmtReq->get_result()->fetch_all(MYSQLI_ASSOC);

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


<<<<<<< HEAD
  <!-- BOX -->
    <div class="justify-center min-h-[50px] flex items-center pt-28 pb-20 px-6">
    <div class="w-[800px] mx-auto bg-[#fafaf7] rounded-[28px] border border-[#3e5648]/50 flex flex-col">
=======
<!-- BOX -->
  <div class="justify-center min-h-[50px] flex items-center pt-36 pb-20 px-6">
  <div class="w-[800px] mx-auto bg-[#fafaf7] rounded-[28px] border border-[#3e5648]/50 flex flex-col">

>>>>>>> 6fbd84a8c10b694aa94a8ccb81385a8fb0d20970


<<<<<<< HEAD
      <div class="px-10 py-6 border-b border-[#3e5648]/20 flex flex-col items-center">
        <div class="max-w-[640px] mx-auto flex flex-col items-center">
=======
<!-- TAB -->
<div class="flex justify-end gap-6 px-10 ">
  <button id="tabDonasi"
    class="px-8 py-1 rounded-full bg-[#3e5648] text-[#fafaf7] border border-[#3e5648] hover:bg-[#fafaf7] hover:text-[#3e5648] onclick:text-[#3e5648] transition">
    Donasi
  </button>
  <button id="tabAmbil"
    class="px-8 py-1 rounded-full bg-[#3e5648] text-[#fafaf7] border border-[#3e5648] hover:bg-[#fafaf7] hover:text-[#3e5648] onclick:text-[#3e5648] transition">
    Diambil
  </button>
</div>
</div>
>>>>>>> 6fbd84a8c10b694aa94a8ccb81385a8fb0d20970


        <!-- JUDUL -->
        <h2 class="text-[25px] font-semibold text-[#3e5648] mb-5 text-center">
          <span id="titleDonasi">Barang yang Kamu Donasikan</span>
          <span id="titleAmbil" class="hidden">Barang yang Kamu Ambil</span>
          <span id="titlePermintaan" class="hidden">Permintaan Pengambilan</span>
        </h2>

        <!-- TABS -->
        <div class="flex gap-4">
          <button id="tabDonasi" class="w-[130px] h-10 text-sm rounded-full bg-[#3e5648] text-[#fafaf7] border border-[#3e5648] hover:bg-[#fafaf7] hover:text-[#3e5648] transition">
            Donasi
          </button>

          <button id="tabAmbil" class="w-[130px] h-10 text-sm rounded-full bg-[#3e5648] text-[#fafaf7] border border-[#3e5648] hover:bg-[#fafaf7] hover:text-[#3e5648] transition">
            Diambil
          </button>

          <button id="tabPermintaan" class="w-[130px] h-10 text-sm rounded-full bg-[#3e5648] text-[#fafaf7] border border-[#3e5648] hover:bg-[#fafaf7] hover:text-[#3e5648] transition">
            Permintaan
          </button>
        </div>
  </div>
  </div>

  <!-- SCROLL AREA -->
  <div class="px-8 py-6 pr-10 max-h-[55vh] overflow-y-auto
              overscroll-contain scrollbar-thin scrollbar-thumb-[#7fb7a4]/40">
  <div class="max-w-[640px] mx-auto">

  <!-- DONASI -->
  <div id="contentDonasi" class="space-y-4">
    <?php if (empty($itemsDonasi)): ?>
      <p class="text-center text-gray-500">
        Belum ada barang donasi.
      </p>
    <?php else: ?>
      <?php foreach ($itemsDonasi as $item): ?>
        <?php $mode='inbox'; include 'components/card_item.php'; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

<!-- AMBIL (REQUESTER) -->
<div id="contentAmbil" class="hidden space-y-4">

<?php if (empty($myRequests)): ?>
  <p class="text-center text-gray-500">
    Belum ada permintaan barang.
  </p>
<?php else: ?>
  <?php foreach ($myRequests as $r): ?>
    <div class="bg-white p-4 rounded-xl shadow flex gap-4">

      <img src="/reshare/<?= htmlspecialchars($r['foto']); ?>"
           class="w-20 h-20 rounded-lg object-cover">

      <div class="flex-1">
        <p class="font-semibold text-[#3e5648]">
          <?= htmlspecialchars($r['nama_barang']); ?>
        </p>

        <?php if ($r['status'] === 'pending'): ?>
          <span class="inline-flex items-center gap-1
                      px-3 py-1 rounded-full text-xs
                      bg-yellow-100 text-yellow-700 font-medium">
            ⏳ Menunggu persetujuan
          </span>

        <?php elseif ($r['status'] === 'accepted'): ?>
          <span class="inline-flex items-center gap-1
                      px-3 py-1 rounded-full text-xs
                      bg-green-100 text-green-700 font-medium">
            ✅ Diambil
          </span>

        <?php else: ?>
          <span class="inline-flex items-center gap-1
                      px-3 py-1 rounded-full text-xs
                      bg-red-100 text-red-700 font-medium">
            ❌ Ditolak donatur
          </span>
        <?php endif; ?>


        <p class="text-xs text-gray-400 mt-2">
          Diajukan: <?= date('d M Y H:i', strtotime($r['created_at'])) ?>
        </p>
      </div>

    </div>
  <?php endforeach; ?>
<?php endif; ?>

</div>


  <!-- Permintaan -->
  <div id="contentPermintaan" class="hidden space-y-4">
    <?php if (empty($requests)): ?>
    <p class="text-gray-500">Belum ada permintaan.</p>
      <?php else: ?>
        <?php foreach ($requests as $r): ?>
          <div class="bg-white p-4 rounded-xl shadow flex gap-4">

            <img src="/reshare/<?= htmlspecialchars($r['foto']); ?>"
                class="w-20 h-20 rounded-lg object-cover">

            <div class="flex-1">
              <p class="font-semibold text-[#3e5648]">
                <?= htmlspecialchars($r['nama_barang']); ?>
              </p>

              <p class="text-sm text-gray-600">
                Diminta oleh <b><?= htmlspecialchars($r['username']); ?></b>
              </p>

              <p class="text-sm mt-2">
                <b>Tujuan:</b> <?= htmlspecialchars($r['purpose']); ?><br>
                <b>Alasan:</b> <?= nl2br(htmlspecialchars($r['alasan'])); ?>
              </p>

              <p class="text-xs text-gray-400 mt-1">
                <?= date('d M Y H:i', strtotime($r['created_at'])); ?>
              </p>
            </div>

            <div class="flex flex-col gap-2">
              <form action="../backend/items/acc_req.php" method="POST">
                <input type="hidden" name="request_id" value="<?= $r['request_id']; ?>">
                <button
                  class="w-full px-4 py-1.5
                        bg-[#3e5648] text-[#fafaf7]
                        rounded-full text-sm font-medium
                        hover:opacity-90 transition">
                  Setujui
                </button>
              </form>

              <form action="../backend/items/reject_req.php" method="POST">
                <input type="hidden" name="request_id" value="<?= $r['request_id']; ?>">
                <button
                  class="w-full px-4 py-1.5
                        border border-[#3e5648]
                        text-[#3e5648]
                        rounded-full text-sm font-medium
                        hover:bg-[#3e5648]/5 transition">
                  Tolak
                </button>
              </form>
            </div>

          </div>
        <?php endforeach; ?>
      <?php endif; ?>
  </div>

  </div>
  </div>
  </div>

  <?php
  $defaultTab = !empty($requests) ? 'permintaan' : 'donasi';
  ?>

<script>
  const tabDonasi = document.getElementById('tabDonasi');
  const tabAmbil = document.getElementById('tabAmbil');
  const tabPermintaan = document.getElementById('tabPermintaan');

<<<<<<< HEAD
  const contentDonasi = document.getElementById('contentDonasi');
  const contentAmbil = document.getElementById('contentAmbil');
  const contentPermintaan = document.getElementById('contentPermintaan');

  const titleDonasi = document.getElementById('titleDonasi');
  const titleAmbil = document.getElementById('titleAmbil');
  const titlePermintaan = document.getElementById('titlePermintaan');

  const ACTIVE = ['bg-[#fafaf7]', 'text-[#3e5648]'];
  const INACTIVE = ['bg-[#3e5648]', 'text-[#fafaf7]'];

  function setActive(active, others = []) {
    active.classList.remove(...INACTIVE);
    active.classList.add(...ACTIVE);
    others.forEach(btn => {
      btn.classList.remove(...ACTIVE);
      btn.classList.add(...INACTIVE);
    });
  }

  tabDonasi.onclick = () => {
    setActive(tabDonasi, [tabAmbil, tabPermintaan]);
    contentDonasi.classList.remove('hidden');
    contentAmbil.classList.add('hidden');
    contentPermintaan.classList.add('hidden');
    titleDonasi.classList.remove('hidden');
    titleAmbil.classList.add('hidden');
    titlePermintaan.classList.add('hidden');
  };

  tabAmbil.onclick = () => {
    setActive(tabAmbil, [tabDonasi, tabPermintaan]);
    contentAmbil.classList.remove('hidden');
    contentDonasi.classList.add('hidden');
    contentPermintaan.classList.add('hidden');
    titleAmbil.classList.remove('hidden');
    titleDonasi.classList.add('hidden');
    titlePermintaan.classList.add('hidden');
  };

  tabPermintaan.onclick = () => {
    setActive(tabPermintaan, [tabDonasi, tabAmbil]);
    contentPermintaan.classList.remove('hidden');
    contentDonasi.classList.add('hidden');
    contentAmbil.classList.add('hidden');
    titlePermintaan.classList.remove('hidden');
    titleDonasi.classList.add('hidden');
    titleAmbil.classList.add('hidden');
  };

  <?php if ($defaultTab === 'permintaan'): ?>
    tabPermintaan.click();
  <?php else: ?>
    tabDonasi.click();
  <?php endif; ?>

=======
tabDonasi.onclick=()=>{
 tabDonasi.classList.add('bg-[#fafaf7]');
 tabAmbil.classList.remove('bg-[#fafaf7]');
 contentDonasi.classList.remove('hidden');
 contentAmbil.classList.add('hidden');
 titleDonasi.classList.remove('hidden');
 titleAmbil.classList.add('hidden');
};

tabAmbil.onclick=()=>{
 tabAmbil.classList.add('bg-[#fafaf7]');
 tabDonasi.classList.remove('bg-[#fafaf7]');
 contentAmbil.classList.remove('hidden');
 contentDonasi.classList.add('hidden');
 titleAmbil.classList.remove('hidden');
 titleDonasi.classList.add('hidden');
};
>>>>>>> 6fbd84a8c10b694aa94a8ccb81385a8fb0d20970
</script>

  </body>
  </html>
