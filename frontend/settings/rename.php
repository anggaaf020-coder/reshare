<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Username | ReShare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="h-screen bg-[#F4F1E3]">
  <div class="relative h-full overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 -z-10 bg-cover bg-center"
         style="background-image: url('/reshare/assets/images/background/bg3.jpg');">
    <div class="absolute inset-0 bg-[#fafaf7]/40"></div>
    </div>

    <!-- CARD -->
    <div class="h-[80%] flex mt-20 mx-20 rounded-[40px] bg-[#fafaf7] overflow-hidden shadow-xl">
    
    <!-- LEFT PANEL -->
      <div class="w-1/2 bg-[#3e5648] px-16 py-12 flex flex-col items-center justify-center">

    <!-- BACK BUTTON -->
    <a href="javascript:history.back()"
       class="absolute top-6 left-6 flex items-center gap-1
              text-[#fafaf7] font-medium hover:opacity-80 transition">

        <img src="/reshare/assets/icons/back.svg" class="w-10 h-10" alt="Back">
        <span class="text-[25px] font-semibold text-[#3e5648]">Kembali</span>
    </a>

        <!-- HEADER -->
        <div class="flex flex-col items-center text-center">
        <div class="flex items-center gap-4">
            <img src="/reshare/assets/icons/user.svg"
                class="w-12 h-12"
                alt="User Icon">
            <h1 class="text-5xl font-semibold text-[#fafaf7]">
            Ganti Username
            </h1>
        </div>

          <div class="max-w-lg w-full mt-7 border-b-[3px] border-[#fafaf7]/80"></div>
        </div>

        <!-- FORM -->
        <form id="renameForm"
              action="../../backend/user/update_name.php"
              method="POST"
              class="mt-10 space-y-3 w-full max-w-md">

          <div>
            <label class="block text-sm font-semibold text-[#fafaf7] mb-2">
              USERNAME LAMA
            </label>
            <input type="text"
                   value="<?= htmlspecialchars($_SESSION['username']) ?>"
                   disabled
                   class="w-full rounded-full px-5 py-3 text-gray-700 text-sm focus:outline-none shadow-sm">
          </div>

          <div>
            <label class="block text-sm font-semibold text-[#fafaf7] mb-2">
              USERNAME BARU
            </label>
            <input type="text"
                   id="usernameBaru"
                   name="new_username"
                   required
                   class="w-full rounded-full px-5 py-3 text-gray-700 text-sm focus:outline-none shadow-sm"
                   placeholder="Masukkan Username baru">
          </div>

          <!-- BUTTONS -->
          <div class="grid grid-cols-2 gap-4 pt-10 max-w-lg w-full">

            <button type="button"
                onclick="cekUsername()"
                class="w-full py-3 rounded-full bg-[#fafaf7] border-2 border-[#fafaf7] 
                       text-[#3e5648] font-bold hover:opacity-80 transition">
                CEK KETERSEDIAAN
            </button>

            <button id="submitBtn"
                type="submit"
                disabled
                class="w-full py-3 rounded-full bg-[#8bbfa9] 
                       text-white font-semibold
                       opacity-50 cursor-not-allowed
                       hover:opacity-90 transition">
                UBAH
            </button>

          </div>

        </form>
      </div>

      <!-- RIGHT PANEL -->
      <div class="w-1/2 bg-cover bg-center flex items-center justify-center"
           style="background-image: url('/reshare/assets/images/background/bg3.jpg');">
        <div class="text-center">
          <img src="/reshare/assets/images/logo/login.png"
               class="w-96 relative flex item-center justify-center"
               alt="ReShare Logo">
        </div>
      </div>

    </div>
  </div>

<script>
function cekUsername() {
    const username = document.getElementById('usernameBaru').value.trim();
    const submitBtn = document.getElementById('submitBtn');

    if (username.length < 3) {
        alert('Username minimal 3 karakter');
        return;
    }

    fetch('../../backend/user/check_username.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'username=' + encodeURIComponent(username)
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'available') {
            alert('Username tersedia');
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50','cursor-not-allowed');
        } else {
            alert(data.message);
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50','cursor-not-allowed');
        }
    });
}
</script>

</body>
</html>
