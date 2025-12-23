<nav class="fixed top-3 inset-x-10 z-[999] bg-transparent">
    <div class="flex items-center justify-between px-6 py-4">

        <!-- BACK -->
        <div class="flex items-center gap-1">
            <a href="home.php" class="flex items-center gap-0 hover:opacity-80 transition">
                <img src="../assets/icons/back.svg" class="w-10 h-10">
                <span class="text-[30px] font-medium text-[#3e5648]">
                    <?= isset($_GET['kategori']) ? htmlspecialchars($_GET['kategori']) : 'Katalog'; ?>
                </span>
            </a>
        </div>

        <!-- CENTER -->
        <div class="flex-1 flex justify-center">
            <form action="katalog.php" method="GET"
                class="w-[55%] flex items-center bg-white px-6 py-3 rounded-full
                       shadow-md border border-[#3e5648]/30">

                <!-- PERTAHANKAN KATEGORI -->
                <?php if (!empty($_GET['kategori'])): ?>
                    <input type="hidden" name="kategori"
                           value="<?= htmlspecialchars($_GET['kategori']); ?>">
                <?php endif; ?>

                <input
                    type="text"
                    name="q"
                    value="<?= htmlspecialchars($_GET['q'] ?? ''); ?>"
                    placeholder="cari barang"
                    class="flex-1 bg-transparent outline-none text-sm"
                    required
                >

                <button type="submit">
                    <img src="../assets/icons/cari.svg" class="w-6 h-6">
                </button>
            </form>
        </div>

    <!-- KATEGORI -->
    <div class="relative">
        <button id="kategoriToggle"
            class="flex items-center gap-2 px-6 py-2 rounded-full text-white bg-[#7fb7a4] hover:opacity-90 hover:text-[#fafaf7] transition">
            <img src="../assets/icons/kategori.svg" class="w-6 h-6">
            Kategori
        </button>

        <!-- DROPDOWN -->
        <div id="kategoriMenu"
            class="absolute right-0 mt-4 w-72 bg-[#fafaf7] rounded-2xl shadow-xl p-3 space-y-2 opacity-0 scale-95 -translate-y-2 pointer-events-none
            transition-all duration-200 ease-out">


            <?php
            $kategori = [
                ['Elektronik', 'elektronik.svg'],
                ['Pakaian', 'pakaian.svg'],
                ['Rumah Tangga', 'rumahtangga.svg'],
                ['Buku', 'buku.svg']
            ];
            foreach ($kategori as $k):
            ?>
            <a href="katalog.php?kategori=<?= $k[0]; ?>"
               class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#3e5648] text-white hover:opacity-70 hover:translate-x-1 border border-[#3e5648] transition-all duration-200">
                <img src="../assets/icons/<?= $k[1]; ?>" class="w-6 h-6">
                <span class="text-lg"><?= $k[0]; ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("kategoriToggle");
    const menu   = document.getElementById("kategoriMenu");

    if (!toggle || !menu) return;

    toggle.addEventListener("click", function (e) {
        e.stopPropagation();

        menu.classList.toggle("opacity-0");
        menu.classList.toggle("scale-95");
        menu.classList.toggle("-translate-y-2");
        menu.classList.toggle("pointer-events-none");
    });

    document.addEventListener("click", function (e) {
        if (!menu.contains(e.target) && !toggle.contains(e.target)) {
            menu.classList.add("opacity-0", "scale-95", "-translate-y-2", "pointer-events-none");
        }
    });
});
</script>
