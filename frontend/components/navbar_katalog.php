<nav class="fixed top-0 left-0 w-full z-50 px-10 py-4 flex justify-between items-center bg-transparent text-white">

    <!-- LOGO -->
    <div class="flex items-center gap-3 px-5 py-4">
        <a href="home.php" class="text-xl">&#8592;</a>
        <h2 class="text-lg font-semibold text-[#4A5D49]">
            <?php echo isset($_GET['kategori']) ? $_GET['kategori'] : 'Home'; ?>
        </h2>
    </div>

    <!-- SEARCH BAR DI TENGAH -->
    <form action="katalog.php" method="GET" class="flex-1 flex justify-center px-10">
        <div class="w-[60%] flex items-center bg-white text-[#4A5D49] px-4 py-1 rounded-full shadow">
            <input type="text" name="search" placeholder="Cari barang..."
                   class="flex-1 outline-none px-2 text-sm bg-transparent">
            <button type="submit" class="text-lg">&#128269;</button>
        </div>
    </form>

    <!-- KATEGORI BUTTON (GARIS TIGA) -->
    <div class="relative">
        <button id="kategoriToggle"
                class="bg-white text-[#4A5D49] px-4 py-1 rounded-full text-sm shadow flex items-center gap-2">
            <span class="text-xl">&#9776;</span> <!-- ikon garis tiga -->
            <span>Kategori</span>
        </button>

        <!-- DROPDOWN -->
        <div id="kategoriMenu"
             class="hidden absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg p-3 text-[#4A5D49] space-y-2">

            <form action="katalog.php" method="GET" class="space-y-2">
                <button name="kategori" value="Pakaian"
                        class="w-full py-2 rounded-full border hover:bg-gray-100">Pakaian</button>

                <button name="kategori" value="Elektronik"
                        class="w-full py-2 rounded-full border hover:bg-gray-100">Elektronik</button>

                <button name="kategori" value="Rumah Tangga"
                        class="w-full py-2 rounded-full border hover:bg-gray-100">Rumah Tangga</button>

                <button name="kategori" value="Buku"
                        class="w-full py-2 rounded-full border hover:bg-gray-100">Buku</button>
            </form>

        </div>
    </div>

</nav>

<script>
// Toggle kategori dropdown
document.getElementById("kategoriToggle").onclick = () => {
    document.getElementById("kategoriMenu").classList.toggle("hidden");
};

// Close dropdown when clicking outside
document.addEventListener("click", function(e){
    const dropdown = document.getElementById("kategoriMenu");
    const toggle = document.getElementById("kategoriToggle");

    if (!dropdown.contains(e.target) && !toggle.contains(e.target)) {
        dropdown.classList.add("hidden");
    }
});
</script>