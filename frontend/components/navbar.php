<nav class="fixed top-0 left-0 w-full z-50 px-10 py-4 flex justify-between items-center bg-transparent text-white">
    
    <!-- LOGO -->
    <a href="home.php" class="text-2xl font-semibold tracking-wide">
        ReShare
    </a>

    <!-- MENU DESKTOP -->
    <div class="hidden md:flex gap-10 font-medium">
        <a href="home.php" class="hover:opacity-70">Home</a>
        <a href="upload_barang.php" class="hover:opacity-70">Donasi</a>
        <a href="katalog.php" class="hover:opacity-70">Katalog</a>
        <a href="event.php" class="hover:opacity-70">Event</a>
    </div>

    <!-- DROPDOWN PROFILE -->
    <div class="relative">
        <button id="dropdownToggle" class="bg-white text-[#4A5D49] px-4 py-1 rounded-full text-sm shadow">
            Akun
        </button>

        <div id="dropdownMenu"
             class="hidden absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-lg p-4 text-[#4A5D49] space-y-3">

            <!-- Header User -->
            <div class="text-sm border-b pb-3">
                <p class="font-semibold">&lt;username&gt;</p>
                <p class="text-gray-500 text-xs">&lt;email pengguna&gt;</p>
                <p class="text-gray-500 text-xs">&lt;no handphone&gt;</p>
            </div>

            <a href="settings/rename.php" class="block hover:text-black">Ganti Username</a>
            <a href="settings/ganti_password.php" class="block hover:text-black">Ganti Password</a>
            <a href="settings/ganti_email.php" class="block hover:text-black">Ganti Email</a>
            <a href="settings/ganti_nomor.php" class="block hover:text-black">Ganti No Handphone</a>

            <a href="#" class="block hover:text-black">Dark Mode</a>

            <hr>

            <a href="../backend/auth/logout.php" class="block text-red-500 hover:text-red-600">
                Logout
            </a>
        </div>
    </div>
</nav>

<script>
// Dropdown Toggle
document.getElementById("dropdownToggle").onclick = () => {
    document.getElementById("dropdownMenu").classList.toggle("hidden");
};
</script>
