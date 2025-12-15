<?php include 'components/navbar_h.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Event | ReShare</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../style/main.css">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="relative min-h-screen text-slate-700 overflow-x-hidden font-['DM_Sans']">

<!-- ================= BACKGROUND ================= -->
<div class="fixed inset-0 -z-10 bg-cover bg-center"
     style="background-image:url('/reshare/assets/images/background/bg1.jpg');">
  <div class="absolute inset-0 bg-white/70 backdrop-blur-sm"></div>
</div>

<!-- ================= CONTENT ================= -->
<section class="max-w-7xl mx-auto px-6 pt-32 pb-24">

  <!-- HEADER -->
  <div class="text-center mb-16 fade-up">
    <h1 class="text-4xl font-semibold text-slate-800">Upload Event</h1>
    <p class="mt-3 text-slate-500">
      Buat dan publikasikan event donasi atau kegiatan sosial
    </p>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">

    <!-- ================= LEFT : POSTER EVENT ================= -->
    <div class="fade-up">
      <div class="relative bg-[#FFFDF7]/90 rounded-[2.25rem] p-10
        shadow-[0_40px_120px_rgba(0,0,0,0.15)]
        min-h-[40rem] flex items-center justify-center">

        <!-- INPUT FILE -->
        <input id="imageInput"
          type="file"
          accept="image/*"
          class="absolute inset-0 opacity-0 cursor-pointer"
          onchange="previewImage(event)">

        <!-- PREVIEW -->
        <img id="preview"
          class="hidden absolute inset-0 w-full h-full object-cover rounded-[2.25rem]">

        <!-- REMOVE IMAGE -->
        <button id="removeImageBtn"
          type="button"
          onclick="removeImage()"
          class="hidden absolute top-5 right-5
                 bg-white/90 rounded-full p-2 shadow
                 hover:bg-red-50 transition">

          <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2"
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
          <div class="text-6xl mb-6">🗓️</div>
          <p class="font-medium">Upload Poster Event</p>
          <p class="text-sm mt-1">Gunakan poster dengan resolusi baik</p>
        </div>
      </div>
    </div>

    <!-- ================= RIGHT : FORM EVENT ================= -->
    <div class="fade-up" style="animation-delay:.1s">
      <div class="bg-[#FFFDF7]/90 rounded-[2.25rem] p-10
        shadow-[0_40px_120px_rgba(0,0,0,0.15)]
        min-h-[40rem] flex flex-col justify-between">

        <div class="space-y-7">

          <!-- NAMA EVENT -->
          <div>
            <label class="text-xs uppercase tracking-wider text-slate-500">
              Nama Event
            </label>
            <input type="text"
              class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50
                     outline-none focus:ring-2 focus:ring-[#CFE0D3]"
              placeholder="Contoh: Donasi Banjir Jakarta">
          </div>

          <!-- NAMA PENYELENGGARA -->
          <div>
            <label class="text-xs uppercase tracking-wider text-slate-500">
              Nama Penyelenggara
            </label>
            <input type="text"
              class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50
                     outline-none focus:ring-2 focus:ring-[#CFE0D3]"
              placeholder="Contoh: Komunitas Peduli Bumi">
          </div>

          <!-- NOMOR TELEPON -->
          <div>
            <label class="text-xs uppercase tracking-wider text-slate-500">
              Nomor Telepon Penyelenggara
            </label>
            <input type="tel"
              class="w-full mt-2 rounded-2xl px-5 py-3 bg-slate-50
                     outline-none focus:ring-2 focus:ring-[#CFE0D3]"
              placeholder="Contoh: 08xxxxxxxxxx">
          </div>

          <!-- DESKRIPSI EVENT -->
          <div>
            <label class="text-xs uppercase tracking-wider text-slate-500">
              Deskripsi Event
            </label>
            <textarea rows="5"
              class="w-full mt-2 rounded-2xl px-5 py-4 bg-slate-50
                     outline-none focus:ring-2 focus:ring-[#CFE0D3]"
              placeholder="Jelaskan tujuan event, waktu, lokasi, dan cara berpartisipasi"></textarea>
          </div>

        </div>

        <!-- BUTTON -->
        <button
          class="mt-10 py-4 rounded-full bg-[#3e5648]
                 text-white font-medium
                 hover:opacity-90 transition">
          Publikasikan Event
        </button>

      </div>
    </div>

  </div>
</section>

<!-- ================= SCRIPT ================= -->
 <script src="../js/dropdown.js"></script>
<script>
function previewImage(e){
  const file = e.target.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = () => {
    preview.src = reader.result;
    preview.classList.remove('hidden');
    uploadLabel.classList.add('hidden');
    removeImageBtn.classList.remove('hidden');
  };
  reader.readAsDataURL(file);
}

function removeImage(){
  imageInput.value = '';
  preview.src = '';
  preview.classList.add('hidden');
  uploadLabel.classList.remove('hidden');
  removeImageBtn.classList.add('hidden');
}
</script>

<?php include 'components/footer.php'; ?>
</body>
</html>
