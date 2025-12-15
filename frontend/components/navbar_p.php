<header class="fixed top-3 inset-x-10 z-50 bg-transparent"
        id="navbar">
  <div class="max-w-7xl mx-auto px-10 py-4 flex items-center justify-between">

    <!-- LOGO -->
    <div class="flex items-center gap-3">
      <img src="../assets/images/logo/ReShare.png" class="h-16 w-auto">
    </div>

    <!-- MENU -->
    <nav class="hidden md:flex gap-10 text-[#fafaf7] text-lg">
      <a href="home.php" class="hover:opacity-80">Home</a>
      <a href="upload_barang.php" class="hover:opacity-80">Donasi</a>
      <a href="katalog.php" class="hover:opacity-80">Katalog</a>
      <a href="event.php" class="hover:opacity-80">Event</a>
    </nav>

    <!-- PENGATURAN -->
    <div class="relative">
      <button data-toggle="dropdown" data-target="settingMenu"
        class="flex items-center gap-3 bg-[#fafaf7] hover:opacity-80 px-6 py-2 rounded-full text-[#3e5648] shadow">
        <img src="../assets/icons/pengaturan.svg" class="w-8 h-8">
        Pengaturan
      </button>

      <?php include 'components/dropdown_setting.php'; ?>
    </div>

  </div>
  <script src="/js/dropdown .js"></script>
</header>
