<?php
require_once __DIR__ . '/../backend/items/get_detail.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Barang | ReShare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'DM Sans', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { scrollbar-width: none; }
    </style>
</head>
    
<body class="relative min-h-screen bg-[#fafaf7]">

<!-- ================= BACKGROUND ================= -->
<div class="absolute inset-0 -z-10 bg-cover bg-center"
     style="background-image:url('../assets/images/background/bg2.jpg');">
    <div class="absolute inset-0 bg-[#fafaf7]/30"></div>
</div>

<!-- ================= CONTENT ================= -->
<div class="max-w-6xl mx-auto pt-36 px-10">

    <a href="javascript:history.back()"
       class="absolute top-6 left-6 flex items-center gap-1
              text-[#fafaf7] font-medium hover:opacity-80 transition">
        <img src="/reshare/assets/icons/back.svg" class="w-10 h-10" alt="Back">
        <span class="text-[30px] font-semibold text-[#3e5648]">Kembali</span>
    </a>

    <div class="grid grid-cols-2 gap-12 items-stretch">

        <!-- ================= LEFT : IMAGE ================= -->
        <div class="bg-white rounded-3xl p-10 shadow-xl flex items-center justify-center h-[480px] w-full">
            <img src="/reshare/<?= htmlspecialchars($item['foto']); ?>"
                 class="w-full h-full rounded-3xl object-cover shadow">
        </div>

        <!-- ================= RIGHT : DETAIL ================= -->
        <div class="bg-white rounded-3xl p-10 shadow-xl flex flex-col justify-between min-h-[480px]">

            <div>

                <!-- KATEGORI -->
                <p class="text-[#3e5648] font-medium">
                    <?= htmlspecialchars($item['kategori']); ?>
                </p>

                <!-- NAMA BARANG -->
                <h1 class="text-3xl font-semibold text-[#3e5648] mt-2">
                    <?= htmlspecialchars($item['nama_barang']); ?>
                </h1>

                <!-- DONATUR -->
                <p class="text-sm text-gray-600 mt-3">
                    <?= htmlspecialchars($item['username']); ?> |
                    <?= htmlspecialchars($item['alamat']); ?> |
                    <?= htmlspecialchars($item['phone']); ?>
                </p>

                <div class="border-b border-[#7fb7a4] my-6"></div>

                <!-- KONDISI -->
                <p class="font-semibold text-[#3e5648] mb-2">Kondisi Barang</p>
                <span class="inline-block px-6 py-1 rounded-full
                             bg-[#6B7F72] text-white text-sm">
                    <?= htmlspecialchars($item['kondisi']); ?>
                </span>

                <div class="border-b border-[#7fb7a4] my-6"></div>

                <!-- DESKRIPSI -->
                <p class="font-semibold text-[#3e5648] mb-2">Deskripsi</p>
                <p class="text-sm text-gray-700 leading-relaxed">
                    <?= nl2br(htmlspecialchars($item['deskripsi'])); ?>
                </p>
            </div>

            <!-- ================= BUTTON ================= -->
            <div class="mt-10 flex justify-end gap-4">

                <!-- HUBUNGI -->
                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $item['phone']); ?>"
                   target="_blank"
                   class="inline-flex items-center gap-2 bg-[#7fb7a4] text-white
                          px-4 py-1 rounded-full font-semibold shadow-sm
                          hover:opacity-90 transition">
                    <img src="../assets/icons/kontak.svg" class="w-4 h-4" alt="">
                    Hubungi
                </a>

                <!-- AMBIL -->
                    <?php if ($isRequested): ?>

                    <button
                    class="bg-gray-300 text-gray-500 px-8 py-2 rounded-full cursor-not-allowed"
                    disabled>
                    Ambil
                    </button>

                    <?php else: ?>

                    <button
                    id="ambilBtn"
                    type="button"
                    onclick="openRequestModal()"
                    class="bg-[#3e5648] text-white px-8 py-2 rounded-full hover:opacity-90 transition">
                    Ambil
                    </button>

                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- FORM REQUEST -->
<div id="requestModal"
  class="fixed inset-0 bg-black/40 z-50 hidden"
  onclick="closeRequestModal()">

    <!-- MODAL -->
    <div
        onclick="event.stopPropagation()"
        class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2
            bg-[#fafaf7] w-[420px] rounded-[25px] p-6 border-2 border-[#3e5648]">

        <!-- CLOSE -->
        <button type="button"
        onclick="closeRequestModal()"
        class="absolute top-4 right-4 opacity-70 hover:opacity-100">
        ✕
        </button>

        <h2 class="text-xl font-semibold text-[#3e5648] text-center">
        Ajukan permintaan<br>pengambilan barang
        </h2>

        <hr class="my-4 border-[#3e5648]/30">

            <!-- FORM -->
            <form id="requestForm" class="space-y-4 mt-6">
            <input type="hidden" name="item_id" value="<?= $item['id'] ?>">

            <!-- DROPDOWN -->
            <div class="relative">
            <label class="text-sm text-[#3e5648] mb-2 block">
                Barang ini digunakan untuk
            </label>

            <button type="button"
                onclick="togglePurposeDropdown()"
                id="purposeToggle"
                class="w-full flex items-center justify-between px-4 py-3
                    rounded-xl border border-[#3e5648]
                    bg-white text-[#3e5648]">

                <div class="flex items-center gap-3">
                <img id="purposeIcon"
                    src="../assets/icons/elektronik.svg"
                    class="w-6 h-6">
                <span id="purposeText">Pilih tujuan</span>
                </div>

                <img src="../assets/icons/back.svg"
                    class="w-8 rotate-[270deg]">
            </button>

            <input type="hidden" name="purpose" id="purposeInput" required>

            <!-- DROPDOWN AlASAN -->
            <div id="purposeDropdown"
            class="dropdown-menu absolute left-1/2 -translate-x-1/2 mt-3 w-72 bg-[#fafaf7] rounded-2xl shadow-xl p-3 space-y-2 opacity-0 scale-95 -translate-y-2
                    pointer-events-none transition-all duration-200 ease-out origin-top">

            <?php
            $purposes = [
                ['Pekerjaan', 'elektronik'],
                ['Pendidikan', 'buku'],
                ['Rumah Tangga', 'rumahtangga'],
                ['Lainnya', 'kategori']
            ];
            foreach ($purposes as $p):
            ?>
            <button type="button"
                onclick="selectPurpose('<?= $p[0]; ?>','<?= $p[1]; ?>')"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl
                    bg-[#3e5648] text-[#fafaf7]
                    hover:opacity-70 hover:translate-x-1
                    border border-[#3e5648] transition-all">

                <img src="../assets/icons/<?= $p[1]; ?>.svg" class="w-6 h-6">
                <span class="text-lg"><?= $p[0]; ?></span>
            </button>
            <?php endforeach; ?>

            </div>
            </div>

            <!-- ALASAN -->
            <div>
                <label class="text-sm text-[#3e5648]">
                Alasan permintaan
                </label>
                <textarea name="alasan" rows="3" required
                placeholder="Contoh: Saya membutuhkan laptop ini karena saya anak informatika tetapi belum memiliki laptop pribadi"
                class="w-full mt-1 px-4 py-2 rounded-xl border border-[#3e5648]/40 text-[#3e5648] placeholder:text-[13px]
                focus:outline-none focus:ring-2 focus:ring-[#3e5648]"></textarea>

            </div>

            <button type="submit"
                class="w-full h-10 bg-[#3e5648] text-[#fafaf7]
                    rounded-full font-semibold hover:opacity-80 transition">
                Ajukan Permintaan
            </button>
            </form>
    </div>
</div>

<div id="toast"
  class="fixed top-6 left-1/2 -translate-x-1/2
         bg-[#3e5648] text-[#fafaf7]
         px-6 py-3 rounded-xl shadow-lg hidden z-50">
</div>

<script>
    function openRequestModal() {
    document.getElementById('requestModal').classList.remove('hidden');
    }

    function closeRequestModal() {
    document.getElementById('requestModal').classList.add('hidden');
    }

    function showToast(msg) {
    const toast = document.getElementById('toast');
    toast.textContent = msg;
    toast.classList.remove('hidden');

    setTimeout(() => {
        toast.classList.add('hidden');
    }, 3000);
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('requestForm');
  const ambilBtn = document.getElementById('ambilBtn');

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch('/reshare/backend/items/req_item.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      console.log(data);

      if (data.status === 'success') {
        closeRequestModal();
        showToast('Permintaan berhasil dikirim');

        setTimeout(() => {
        window.location.reload();
        }, 800);
      }

      if (data.status === 'exists') {
        showToast('Kamu sudah mengajukan permintaan untuk barang ini');
      }

      if (data.status === 'taken') {
        showToast('Barang sudah diambil oleh orang lain');
        }

    })
    .catch(err => {
      console.error(err);
      showToast('Gagal mengirim permintaan');
    });
  });
});
</script>

<script>
    function togglePurposeDropdown() {
    const dd = document.getElementById('purposeDropdown');
    if (!dd) return;

    dd.classList.toggle('opacity-0');
    dd.classList.toggle('scale-95');
    dd.classList.toggle('-translate-y-2');
    dd.classList.toggle('pointer-events-none');
    }

    function selectPurpose(text, icon) {
    document.getElementById('purposeText').textContent = text;
    document.getElementById('purposeIcon').src =
        `../assets/icons/${icon}_h.svg`;

    document.getElementById('purposeInput').value = text;
    togglePurposeDropdown();
    }
</script>

</body>
</html>
