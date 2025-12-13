<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F3EFD8] p-6">

  <!-- Header -->
  <div class="flex items-center gap-2 mb-6">
    <span class="text-xl cursor-pointer">&lt;</span>
    <h1 class="text-xl font-semibold">Donasi</h1>
  </div>

  <!-- WRAPPER UNTUK MEMBUAT TENGAH -->
  <div class="max-w-5xl mx-auto">

    <!-- Main Container -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

      <!-- LEFT FORM -->
      <div class="space-y-5">

        <!-- Nama Produk -->
        <div>
          <label class="text-sm">Nama Produk :</label>
          <div class="border-b border-black w-[70%]"></div>
          <input type="text" class="w-[70%] mt-1 rounded-full py-2 px-4 text-sm outline-none shadow" />
        </div>

        <!-- Nama Donatur -->
        <div>
          <label class="text-sm">Nama Donatur :</label>
          <div class="border-b border-black w-[70%]"></div>
          <input type="text" class="w-[70%] mt-1 rounded-full py-2 px-4 text-sm outline-none shadow" />
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="text-sm">Deskripsi</label>
          <div class="border-b border-black w-[70%]"></div>
          <textarea class="w-[70%] mt-1 rounded-2xl h-28 p-4 text-sm outline-none shadow"></textarea>
        </div>

        <!-- Alamat -->
        <div>
          <label class="text-sm">Alamat:</label>
          <div class="border-b border-black w-[70%]"></div>
          <input type="text" class="w-[70%] mt-1 rounded-full py-2 px-4 text-sm outline-none shadow" />
        </div>

        <!-- No HP -->
        <div>
          <label class="text-sm">No Handphone:</label>
          <div class="border-b border-black w-[70%]"></div>
          <input type="text" class="w-[70%] mt-1 rounded-full py-2 px-4 text-sm outline-none shadow" />
        </div>

      </div>

      <!-- RIGHT: FOTO + DROPDOWN + SUBMIT -->
      <div class="flex flex-col items-center">

        <!-- Upload Box -->
        <div class="bg-[#FAF7F2] w-64 h-80 rounded-xl shadow-lg flex flex-col items-center justify-center relative border">
          <input type="file" accept="image/*" onchange="previewImage(event)" class="absolute w-full h-full opacity-0 cursor-pointer">
          <img id="preview" class="hidden w-full h-full object-cover rounded-xl" />
          <div id="uploadLabel" class="text-center text-sm opacity-70">
            <div class="text-xl">📤</div>
            Upload Foto
          </div>
        </div>

        <!-- Dropdown area -->
        <div class="flex gap-4 mt-5">

          <!-- Dropdown kategori -->
          <div class="relative">
            <button onclick="toggleDropdown('kategori')" 
              class="border px-4 py-2 rounded-full text-sm flex items-center gap-1 shadow bg-white">
              <span>⚙️</span> kategori
            </button>
            <div id="dropdown-kategori" class="hidden absolute mt-2 left-0 bg-white rounded-lg shadow p-2 text-sm w-40">
              <p class="cursor-pointer hover:bg-gray-100 px-2 py-1">Elektronik</p>
              <p class="cursor-pointer hover:bg-gray-100 px-2 py-1">Barang Rumah Tangga</p>
              <p class="cursor-pointer hover:bg-gray-100 px-2 py-1">Buku</p>
              <p class="cursor-pointer hover:bg-gray-100 px-2 py-1">Pakaian</p>
            </div>
          </div>

          <!-- Dropdown kondisi -->
          <div class="relative">
            <button onclick="toggleDropdown('kondisi')" 
              class="border px-4 py-2 rounded-full text-sm flex items-center gap-1 shadow bg-white">
              <span>📦</span> kondisi
            </button>
            <div id="dropdown-kondisi" class="hidden absolute mt-2 left-0 bg-white rounded-lg shadow p-2 text-sm w-40">
              <p class="cursor-pointer hover:bg-gray-100 px-2 py-1">Seperti Baru</p>
              <p class="cursor-pointer hover:bg-gray-100 px-2 py-1">Bagus</p>
              <p class="cursor-pointer hover:bg-gray-100 px-2 py-1">Layak Pakai</p>
            </div>
          </div>

        </div>

        <!-- Tombol kirim di pojok kanan bawah column kanan -->
        <div class="w-full flex justify-end mt-10">
          <button class="px-10 py-2 bg-white rounded-full shadow text-sm hover:bg-gray-100">
            kirim
          </button>
        </div>

      </div>

    </div>

  </div>


  <script>
    function toggleDropdown(name) {
      document.getElementById('dropdown-' + name).classList.toggle('hidden');
    }

    function previewImage(event) {
      const img = document.getElementById('preview');
      const label = document.getElementById('uploadLabel');
      img.src = URL.createObjectURL(event.target.files[0]);
      img.classList.remove('hidden');
      label.classList.add('hidden');
    }
  </script>

</body>
</html>
