<?php
/* include '../components/navbar.php'; */
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="h-screen bg-[#F4F1E3]">
  <div class="relative h-full overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 -z-10 bg-cover bg-center"
         style="background-image: url('/reshare/assets/images/background/bg5.jpg');">
    <div class="absolute inset-0 bg-[#fafaf7]/40"></div>
    </div>
    

    <!-- CARD -->
    <div class="h-[80%] flex mt-20 mx-20 rounded-[40px] bg-[#fafaf7] overflow-hidden shadow-xl">

    <!-- LEFT PANEL -->
    <!-- BACK BUTTON -->
    <a href="javascript:history.back()"
    class="absolute top-6 left-6 flex items-center gap-1
          text-[#fafaf7] font-medium hover:opacity-80 transition">

    <img src="/reshare/assets/icons/back.svg" class="w-8 h-8" alt="Back">
    <span class="text-xl font-semibold text-[#3e5648]">Kembali</span>
    </a>

      <div class="w-1/2 bg-[#3e5648] px-16 py-12 flex flex-col items-center justify-center">

        <!-- HEADER -->
        <div class="flex flex-col items-center text-center">
        <div class="flex items-center gap-4">
            <img src="/reshare/assets/icons/email.svg"
                class="w-12 h-12 "
                alt="User Icon">
            <h1 class="text-5xl font-semibold text-[#fafaf7]">
            Ganti Email
            </h1>
        </div>



        </div>
         
        <!-- FORM -->
        <div class=" space-y-3 w-full max-w-md">
        <!-- Divider -->
        <div class="max-w-xl w-full mt-7 border-b-[3px] border-[#fafaf7]/80 mb-10"></div>

          <div>
            <label class="block text-sm font-semibold text-[#fafaf7] mb-2">
            EMAIL LAMA
            </label>
            <input type="email"
                   class="w-full rounded-full px-5 py-3 text-gray-700 text-sm focus:outline-none shadow-sm" placeholder="Masukkan Email lama" required>
          </div>

          <div>
            <label class="block text-sm font-semibold text-[#fafaf7] mb-2">
            EMAIL BARU
            </label>
            <input type="email"
                   class="w-full rounded-full px-5 py-3 text-gray-700 text-sm focus:outline-none shadow-sm" placeholder="Masukkan Email baru" required>
          </div>

          <!-- BUTTONS -->
        <div class="grid grid-cols-1 gap-4 pt-10 max-w-lg w-1/2 mx-auto">
        <button
                class="w-full py-3 rounded-full bg-[#8bbfa9]
                    text-white font-semibold
                    hover:opacity-90 transition">
                UBAH
        </button>
        </div>

        </div>
      </div>

      <!-- RIGHT PANEL -->
      <div class="w-1/2 bg-cover bg-center flex items-center justify-center"
           style="background-image: url('/reshare/assets/images/background/bg5.jpg');">
        <div class="text-center">
          <img src="/reshare/assets/images/logo/login.png"
               class="w-96 relative flex item-center justify-center"
               alt="ReShare Logo">
        </div>
      </div>

    </div>
  </div>

  <script src="/js/back.js"></script>

</body>
</html>
