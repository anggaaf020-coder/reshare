<?php include 'components/navbar_h.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Barang Donasi | ReShare</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../style/main.css">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="relative min-h-screen text-slate-700 overflow-x-hidden">

<!-- ================= BACKGROUND ================= -->
<div class="fixed inset-0 -z-10 bg-cover bg-center"
     style="background-image:url('/reshare/assets/images/background/bg1.jpg');">
  <div class="absolute inset-0 bg-white/70 backdrop-blur-sm"></div>
</div>

<!-- ================= CONTENT ================= -->
<section class="max-w-7xl mx-auto px-6 pt-32 pb-24">

  <!-- HEADER -->
  <div class="text-center mb-16 fade-up">
    <h1 class="text-4xl font-semibold text-slate-800">Upload Barang Donasi</h1>
    <p class="mt-3 text-slate-500">
      Unggah foto dan lengkapi detail barang yang ingin Anda donasikan
    </p>
  </div>

  <!-- FORM: membungkus kedua kolom (kiri preview + kanan form) -->

  <?php if (!empty($_SESSION['error'])): ?>
    <div class="mb-6 px-6 py-3 rounded-xl bg-red-100 text-red-700 font-medium">
      <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>

  <form action="/reshare/backend/items/add_item.php"
        method="POST"
        enctype="multipart/form-data"
        class="grid grid-cols-1 lg:grid-cols-2 gap-20">

    <!-- ================= LEFT : UPLOAD FOTO ================= -->
    <div class="fade-up">
      <div class="relative bg-[#FFFDF7]/90 rounded-[2.25rem] p-10
                  shadow-[0_40px_120px_rgba(0,0,0,0.15)]
                  min-h-[40rem] flex flex-col items-center justify-center">

        <!-- INPUT FILE (sekarang berada di dalam form) -->
        <input id="fotoInput"
               type="file"
               name="foto"
               accept="image/*"
               required
               class="absolute inset-0 opacity-0 cursor-pointer"
               onchange="previewImage(event)">

        <!-- PREVIEW IMAGE -->
        <img id="previewFoto"
             class="hidden absolute inset-0 w-full h-full object-cover rounded-[2.25rem]"
             alt="Preview Foto">

        <!-- REMOVE BUTTON -->
        <button id="hapusFoto"
                type="button"
                onclick="removeImage()"
                class="hidden absolute top-5 right-5
                       bg-white/90 backdrop-blur
                       rounded-full p-2 shadow
                       hover:bg-red-50 transition">
          <!-- TRASH SVG -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round"
               class="w-5 h-5 text-red-600">
            <polyline points="3 6 5 6 21 6"/>
            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
            <path d="M10 11v6"/>
            <path d="M14 11v6"/>
            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
          </svg>
        </button>

        <!-- LABEL -->
        <div id="uploadLabel" class="text-center text-slate-500">
          <div class="text-6xl mb-6">📸</div>
          <p class="font-medium">Upload foto barang</p>
          <p class="text-sm mt-1">Gunakan foto yang jelas & terang</p>
        </div>
      </div>
    </div>

    <!-- ================= RIGHT : FORM FIELDS ================= -->
    <div class="fade-up" style="animation-delay:.1s">
      <div class="bg-[#FFFDF7]/90 rounded-[2.25rem] p-10
                  shadow-[0_40px_120px_rgba(0,0,0,0.15)]
                  min-h-[40rem] flex flex-col justify-between">

        <div class="space-y-7">

          <!-- NAMA BARANG -->
          <div>
            <label class="text-xs uppercase tracking-wider text-slate-500">Nama Barang</label>
            <input name="nama_barang"
                   class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50 outline-none focus:ring-2 focus:ring-[#CFE0D3]"
                   placeholder="Contoh: Laptop Lenovo">
          </div>

          <!-- KATEGORI & KONDISI -->
          <div class="grid grid-cols-2 gap-5">

            <!-- KATEGORI -->
            <div class="relative">
              <label class="text-xs uppercase tracking-wider text-slate-500">Kategori</label>

          <button type="button" data-toggle="dropdown" data-target="kategoriMenu"
            class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50 flex justify-between items-center transition shadow-sm hover:shadow-md">

                <span id="kategoriValue" class="flex gap-2 items-center">
                  <img src="/reshare/assets/icons/elektronik_h.svg" class="w-5" alt="">
                  Elektronik
                </span>
                <span><img src="../assets/icons/back.svg" alt="" class="flex justify-start w-7 h7 rotate-[270deg]"></span>
              </button>

            <div id="kategoriMenu"
              class="dropdown-menu absolute z-20 mt-2 w-full bg-[#FAFAF7] rounded-2xl shadow-xl p-3 space-y-2
                    opacity-0 scale-95 -translate-y-2 pointer-events-none transition-all duration-200 ease-out origin-top">


                <button type="button" onclick="setKategori('Elektronik','elektronik_h.svg')"
                        class="flex gap-3 items-center w-full px-4 py-3 rounded-xl bg-[#3e5648] text-[#fafaf7]">
                  <img src="/reshare/assets/icons/elektronik.svg" class="w-5" alt=""> Elektronik
                </button>

                <button type="button" onclick="setKategori('Pakaian','pakaian_h.svg')"
                        class="flex gap-3 items-center w-full px-4 py-3 rounded-xl bg-[#3e5648] text-[#fafaf7]">
                  <img src="/reshare/assets/icons/pakaian.svg" class="w-5" alt=""> Pakaian
                </button>

                <button type="button" onclick="setKategori('Rumah Tangga','rumahtangga_h.svg')"
                        class="flex gap-3 items-center w-full px-4 py-3 rounded-xl bg-[#3e5648] text-[#fafaf7]">
                  <img src="/reshare/assets/icons/rumahtangga.svg" class="w-5" alt=""> Rumah Tangga
                </button>

                <button type="button" onclick="setKategori('Buku','buku_h.svg')"
                        class="flex gap-3 items-center w-full px-4 py-3 rounded-xl bg-[#3e5648] text-[#fafaf7]">
                  <img src="/reshare/assets/icons/buku.svg" class="w-5" alt=""> Buku
                </button>

              </div>
            </div>

            <!-- KONDISI -->
            <div class="relative">
              <label class="text-xs uppercase tracking-wider text-slate-500">Kondisi</label>

              <button type="button" data-toggle="dropdown" data-target="kondisiMenu"
                class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50 flex justify-between items-center transition shadow-sm hover:shadow-md">

                <span id="kondisiValue" class="badge-baru">Seperti Baru</span>
                <span><img src="../assets/icons/back.svg" alt="" class="flex justify-start w-7 h7 rotate-[270deg]"></span>
              </button>

              <div id="kondisiMenu" class="dropdown-menu absolute z-20 mt-2 w-full bg-white rounded-2xl shadow-lg p-3 space-y-2
                      opacity-0 scale-95 -translate-y-2 pointer-events-none transition-all duration-200 ease-out origin-top">


                <button type="button" onclick="setKondisi('Seperti Baru','badge-baru')" class="badge-baru w-full">
                  Seperti Baru
                </button>
                <button type="button" onclick="setKondisi('Bagus','badge-bagus')" class="badge-bagus w-full">
                  Bagus
                </button>
                <button type="button" onclick="setKondisi('Layak Pakai','badge-layak')" class="badge-layak w-full">
                  Layak Pakai
                </button>

              </div>
            </div>

          </div>

          <!-- HIDDEN FIELDS untuk dikirim -->
          <input type="hidden" name="kategori" id="kategoriInput" value="Elektronik">
          <input type="hidden" name="kondisi" id="kondisiInput" value="Seperti Baru">

          <!-- ALAMAT -->
          <div>
            <label class="text-xs uppercase tracking-wider text-slate-500">Alamat</label>
            <input type="text" name="alamat"
                   class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50 outline-none focus:ring-2 focus:ring-[#CFE0D3]"
                   placeholder="Contoh: Jl. Ketintang madya No.XX">
          </div>

          <!-- DESKRIPSI -->
          <div>
            <label class="text-xs uppercase tracking-wider text-slate-500">Deskripsi Barang</label>
            <textarea rows="4" name="deskripsi"
                      class="w-full mt-2 rounded-2xl px-5 py-4 bg-slate-50 outline-none focus:ring-2 focus:ring-[#CFE0D3]"
                      placeholder="Ceritakan kondisi, ukuran, atau catatan penting"></textarea>
          </div>

        </div>

        <!-- BUTTON SUBMIT -->
        <div class="mt-10">
          <button type="submit"
                  class="w-full py-4 rounded-full bg-[#3e5648] text-white flex justify-center gap-4 font-medium hover:opacity-90 transition">
            <img src="../assets/icons/upload.svg" alt="" class="flex justify-start w-6 h-6">
            Unggah & Kirim Donasi
          </button>
        </div>

      </div>
    </div>

  </form>
</section>

<script>

const fotoInput   = document.getElementById('fotoInput');
const previewFoto = document.getElementById('previewFoto');
const uploadLabel = document.getElementById('uploadLabel');
const hapusFotoBtn = document.getElementById('hapusFoto');

const MAX_SIZE = 2 * 1024 * 1024; // 2MB

function previewImage(e) {
  const file = e.target.files[0];
  if (!file) return;

  if (file.size > MAX_SIZE) {
    alert('Ukuran foto maksimal 2MB');
    removeImage();
    return;
  }

  const reader = new FileReader();
  reader.onload = () => {
    previewFoto.src = reader.result;
    previewFoto.classList.remove('hidden');
    uploadLabel.classList.add('hidden');
    hapusFotoBtn.classList.remove('hidden');
  };
  reader.readAsDataURL(file);
}

function removeImage() {
  fotoInput.value = '';
  previewFoto.src = '';
  previewFoto.classList.add('hidden');
  uploadLabel.classList.remove('hidden');
  hapusFotoBtn.classList.add('hidden');
}

/* ================= DROPDOWN (FINAL FIXED) ================= */
document.addEventListener("DOMContentLoaded", () => {

  const toggles = document.querySelectorAll("[data-toggle='dropdown']");

  toggles.forEach(toggle => {
    const targetId = toggle.dataset.target;
    const menu = document.getElementById(targetId);
    if (!menu) return;

    toggle.addEventListener("click", (e) => {
      e.stopPropagation();

      const isClosed = menu.classList.contains("opacity-0");

      // Tutup semua dropdown lain
      document.querySelectorAll(".dropdown-menu").forEach(d => {
        if (d !== menu) {
          d.classList.add(
            "opacity-0",
            "scale-95",
            "-translate-y-2",
            "pointer-events-none"
          );
        }
      });

      // Toggle dropdown ini
      if (isClosed) {
        menu.classList.remove(
          "opacity-0",
          "scale-95",
          "-translate-y-2",
          "pointer-events-none"
        );
      } else {
        menu.classList.add(
          "opacity-0",
          "scale-95",
          "-translate-y-2",
          "pointer-events-none"
        );
      }
    });
  });

  // Klik di luar → tutup semua dropdown
  document.addEventListener("click", () => {
    document.querySelectorAll(".dropdown-menu").forEach(menu => {
      menu.classList.add(
        "opacity-0",
        "scale-95",
        "-translate-y-2",
        "pointer-events-none"
      );
    });
  });
});

/* ================= SET VALUE ================= */
function setKategori(text, icon) {
  const value = document.getElementById('kategoriValue');
  const menu  = document.getElementById('kategoriMenu');

  value.innerHTML = `<img src="/reshare/assets/icons/${icon}" class="w-5" alt=""> ${text}`;
  document.getElementById('kategoriInput').value = text;

  menu.classList.add(
    "opacity-0",
    "scale-95",
    "-translate-y-2",
    "pointer-events-none"
  );
}

function setKondisi(text, badge) {
  const value = document.getElementById('kondisiValue');
  const menu  = document.getElementById('kondisiMenu');

  value.textContent = text;
  value.className = badge;
  document.getElementById('kondisiInput').value = text;

  menu.classList.add(
    "opacity-0",
    "scale-95",
    "-translate-y-2",
    "pointer-events-none"
  );
}
</script>

<?php include 'components/footer.php'; ?>
</body>
</html>
