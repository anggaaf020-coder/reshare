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

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">

    <!-- ================= LEFT : UPLOAD FOTO ================= -->
<!-- ================= LEFT : UPLOAD FOTO ================= -->
<div class="fade-up">
  <div class="relative bg-[#FFFDF7]/90 rounded-[2.25rem] p-10
    shadow-[0_40px_120px_rgba(0,0,0,0.15)]
    min-h-[40rem] flex flex-col items-center justify-center">

    <!-- INPUT FILE -->
    <input id="imageInput"
      type="file"
      accept="image/*"
      class="absolute inset-0 opacity-0 cursor-pointer"
      onchange="previewImage(event)">

    <!-- PREVIEW IMAGE -->
    <img id="preview"
      class="hidden absolute inset-0 w-full h-full object-cover rounded-[2.25rem]">

    <!-- REMOVE BUTTON -->
        <button
          id="removeImageBtn"
          type="button"
          onclick="removeImage()"
          class="hidden absolute top-5 right-5
                bg-white/90 backdrop-blur
                rounded-full p-2 shadow
                hover:bg-red-50 transition">

          <!-- TRASH SVG -->
          <svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
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

    
    <!-- ================= RIGHT : FORM ================= -->
    <div class="fade-up" style="animation-delay:.1s">
    <div class="bg-[#FFFDF7]/90 rounded-[2.25rem] p-10
    shadow-[0_40px_120px_rgba(0,0,0,0.15)]
    min-h-[40rem] flex flex-col justify-between">

    <div class="space-y-7">

    <!-- NAMA BARANG -->
    <div>
      <label class="text-xs uppercase tracking-wider text-slate-500">Nama Barang</label>
      <input
        class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50 outline-none focus:ring-2 focus:ring-[#CFE0D3]"
        placeholder="Contoh: Laptop Lenovo">
    </div>

    <!-- KATEGORI & KONDISI -->
    <div class="grid grid-cols-2 gap-5">

    <!-- KATEGORI -->
    <div class="relative">
    <label class="text-xs uppercase tracking-wider text-slate-500">Kategori</label>

    <button id="kategoriBtn"
    class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50 flex justify-between items-center">
      <span id="kategoriValue" class="flex gap-2 items-center">
        <img src="/reshare/assets/icons/elektronik.svg" class="w-5">
        Elektronik
      </span>
      <span><img src="../assets/icons/back.svg" alt="" class="flex justify-start w-7 h7 rotate-[270deg]"></span>
    </button>

    <div id="kategoriMenu"
        class="absolute z-20 mt-2 w-full bg-[#FAFAF7]
        rounded-2xl shadow-xl p-3 hidden space-y-2">

        <button onclick="setKategori('Elektronik','elektronik.svg')"
          class="flex gap-3 items-center w-full px-4 py-3 rounded-xl bg-[#3e5648] text-[#fafaf7]">
          <img src="/reshare/assets/icons/elektronik.svg" class="w-5"> Elektronik
        </button>

       <button onclick="setKategori('Pakaian','pakaian.svg')"
          class="flex gap-3 items-center w-full px-4 py-3 rounded-xl bg-[#3e5648] text-[#fafaf7]">
         <img src="/reshare/assets/icons/pakaian.svg" class="w-5"> Pakaian
        </button>

        <button onclick="setKategori('Rumah Tangga','rumahtangga.svg')"
          class="flex gap-3 items-center w-full px-4 py-3 rounded-xl bg-[#3e5648] text-[#fafaf7]">
         <img src="/reshare/assets/icons/rumahtangga.svg" class="w-5"> Rumah Tangga
       </button>

        <button onclick="setKategori('Buku','buku.svg')"
          class="flex gap-3 items-center w-full px-4 py-3 rounded-xl bg-[#3e5648] text-[#fafaf7]">
          <img src="/reshare/assets/icons/buku.svg" class="w-5"> Buku
        </button>
      </div>
    </div>

    <!-- KONDISI -->
    <div class="relative">
    <label class="text-xs uppercase tracking-wider text-slate-500">Kondisi</label>

    <button id="kondisiBtn"
    class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50 flex justify-between items-center">
    <span id="kondisiValue" class="badge-baru">Seperti Baru</span>
    <span><img src="../assets/icons/back.svg" alt="" class="flex justify-start w-7 h7 rotate-[270deg]"></span>
    </button>

    <div id="kondisiMenu"
    class="absolute z-20 mt-2 w-full bg-white rounded-2xl shadow-lg p-3 hidden space-y-2">

    <button onclick="setKondisi('Seperti Baru','badge-baru')" class="badge-baru w-full">
    Seperti Baru
    </button>
    <button onclick="setKondisi('Bagus','badge-bagus')" class="badge-bagus w-full">
    Bagus
    </button>
    <button onclick="setKondisi('Layak Pakai','badge-layak')" class="badge-layak w-full">
    Layak Pakai
    </button>
    </div>
    </div>

    </div>

    <!-- DESKRIPSI -->
    <div>
    <label class="text-xs uppercase tracking-wider text-slate-500">Deskripsi Barang</label>
    <textarea rows="4"
    class="w-full mt-2 rounded-2xl px-5 py-4 bg-slate-50 outline-none focus:ring-2 focus:ring-[#CFE0D3]"
    placeholder="Ceritakan kondisi, ukuran, atau catatan penting"></textarea>
    </div>

    </div>

    <!-- BUTTON -->
    <button
    class="mt-10 py-4 rounded-full bg-[#3e5648] text-white flex justify-center gap-4 font-medium hover:opacity-90 transition">
    <img src="../assets/icons/upload.svg" alt="" class="flex justify-start w-6 h-6">
    Unggah & Kirim Donasi
    </button>

    </div>
    </div>
    </div>
</section>

<!-- ================= SCRIPT ================= -->
<script src="../js/dropdown.js"></script>
<script>
  /* PREVIEW FOTO */
  function previewImage(e){
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = () => {
      document.getElementById('preview').src = reader.result;
      document.getElementById('preview').classList.remove('hidden');
      document.getElementById('uploadLabel').classList.add('hidden');
      document.getElementById('removeImageBtn').classList.remove('hidden');
    };
    reader.readAsDataURL(file);
  }

    function removeImage(){
    const preview = document.getElementById('preview');
    const label = document.getElementById('uploadLabel');
    const removeBtn = document.getElementById('removeImageBtn');
    const input = document.getElementById('imageInput');

    // Reset input file
    input.value = '';

    // Reset UI
    preview.src = '';
    preview.classList.add('hidden');
    label.classList.remove('hidden');
    removeBtn.classList.add('hidden');
  }

  /* DROPDOWN */
  const kategoriBtn = document.getElementById('kategoriBtn');
  const kategoriMenu = document.getElementById('kategoriMenu');
  const kategoriValue = document.getElementById('kategoriValue');

  const kondisiBtn = document.getElementById('kondisiBtn');
  const kondisiMenu = document.getElementById('kondisiMenu');
  const kondisiValue = document.getElementById('kondisiValue');

  kategoriBtn.onclick = () => kategoriMenu.classList.toggle('hidden');
  kondisiBtn.onclick = () => kondisiMenu.classList.toggle('hidden');

  function setKategori(text, icon){
    kategoriValue.innerHTML =
    `<img src="/reshare/assets/icons/${icon}" class="w-5"> ${text}`;
    kategoriMenu.classList.add('hidden');
  }

  function setKondisi(text, badge){
    kondisiValue.textContent = text;
    kondisiValue.className = badge;
    kondisiMenu.classList.add('hidden');
  }

  /* CLICK OUTSIDE */
  document.addEventListener('click', e=>{
  if(!kategoriBtn.contains(e.target) && !kategoriMenu.contains(e.target))
    kategoriMenu.classList.add('hidden');
  if(!kondisiBtn.contains(e.target) && !kondisiMenu.contains(e.target))
    kondisiMenu.classList.add('hidden');
  });
</script>
<?php include 'components/footer.php'; ?>
</body>
</html>
