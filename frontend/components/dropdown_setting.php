<div id="settingMenu" class=" dropdown-menu absolute right-0 mt-4 w-[380px] bg-[#FAFAF7] rounded-3xl shadow-xl 
        opacity-0 scale-95 -translate-y-2 pointer-events-none transition-all duration-200 ease-out origin-top-right overflow-hidden">

  <!-- PROFILE -->
  <div class="relative h-44 bg-cover bg-center"
       style="background-image:url('../assets/images/background/bg3.jpg')">

    <div class="absolute inset-0 bg-black/30"></div>

    <div class="relative z-10 p-6 text-white">
      <p class="text-lg">Halo,</p>

      <a href="inbox.php" class="text-2xl font-semibold hover:underline">
        USERNAME
      </a>

      <p class="text-sm mt-2">user@gmail.com</p>
      <p class="text-sm">08XXXXXXXX</p>
    </div>
  </div>

  <!-- SETTINGS -->
  <div class="p-5 space-y-4">

    <?php
        $settings = [
        ['Ganti Username','user.svg','/reshare/frontend/settings/rename.php'],
        ['Ganti Password','password.svg','/reshare/frontend/settings/ganti_password.php'],
        ['Ganti Email','email.svg','/reshare/frontend/settings/ganti_email.php'],
        ['Ganti Nomor','kontak.svg','/reshare/frontend/settings/ganti_nomor.php'],
        ];

    foreach($settings as $s):
    ?>
    <a href="<?= $s[2]; ?>"
       class="flex items-center gap-4 px-6 py-4 rounded-xl bg-[#7fb7a4] text-white hover:opacity-90">
      <img src="../assets/icons/<?= $s[1]; ?>" class="w-7 h-7">
      <span class="text-lg"><?= $s[0]; ?></span>
    </a>
    <?php endforeach; ?>

    <hr class="border-[#3e5648]/30 my-4">

    <!-- LOGOUT -->
    <a href="../backend/auth/logout.php"
       class="flex items-center justify-center gap-3 py-4 rounded-xl bg-[#3e5648] text-white text-lg">
      <img src="../assets/icons/logout.svg" class="w-6 h-6">
      Log Out
    </a>
  </div>
</div>