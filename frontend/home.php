<?php
  require_once __DIR__ . '/../backend/config/connection.php';

  /* ================= REKOMENDASI BARANG RANDOM ================= */
  $itemQuery = "
    SELECT id, nama_barang, kondisi, foto
    FROM items
    WHERE status = 'available'
    ORDER BY RAND()
    LIMIT 8
  ";
  $itemResult = $conn->query($itemQuery);
  $items = $itemResult->fetch_all(MYSQLI_ASSOC);

  /* ================= KATEGORI ================= */
  $kategori = ['Elektronik','Pakaian','Rumah Tangga','Buku'];

  /* ================= EVENT RANDOM ================= */
  $eventQuery = "
    SELECT id, title, poster
    FROM events
    ORDER BY RAND()
    LIMIT 6
  ";
  $eventResult = $conn->query($eventQuery);
  $events = $eventResult->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Home | ReShare</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="main.css">
</head>


<body class="font-['DM_Sans'] bg-white overflow-x-hidden">

<!-- ================= NAVBAR GLOBAL ================= -->
<?php include 'components/navbar_p.php'; ?>
<!-- ================= HERO SECTION ================= -->
<section class="relative h-[95vh] w-full overflow-visible">

        <!-- BACKGROUND SLIDER -->
        <div class="absolute inset-0">
            <img id="bg1" src="../assets/images/background/slide1.jpg"
                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-[1500ms]">
            <img id="bg2" src="../assets/images/background/slide2.jpg"
                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-[1500ms]">
            <img id="b32" src="../assets/images/background/slide3.jpg"
                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-[1500ms]">
            <img id="bg4" src="../assets/images/background/slide4.jpg"
                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-[1500ms]">
        </div>

  <!-- OVERLAY -->
  <div class="absolute inset-0 bg-black/40"></div>

  <!-- CONTENT -->
  <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-6 pb-24 pt-50">

    <img src="../assets/images/logo/reshare.png" class="h-40 w-auto mb-4">

    <!-- SEARCH -->
    <form action="katalog.php" method="GET"
          class="w-full max-w-xl flex items-center bg-white px-6 py-3
                border-[#3e5648] rounded-full shadow-lg">

      <input
        type="text"
        name="q"
        placeholder="cari apa hari ini?"
        class="flex-1 outline-none text-sm bg-transparent"
        required
      >

      <button type="submit">
        <img src="../assets/icons/cari.svg" class="w-6">
      </button>

    </form>

    <!-- BUTTONS -->
    <div class="mt-8 flex gap-20 relative">

      <!-- KATEGORI -->
      <button data-toggle="dropdown" data-target="kategoridropdown"
        class="bg-[#fafaf7] px-10 py-2 h-10 rounded-full flex items-center gap-3 shadow-md hover:shadow-lg transition">
        <img src="../assets/icons/kategori.svg" class="w-5 h-5">
        <span class="text-[20px] text-[#3e5648] font-medium">Kategori</span>
      </button>

      <!-- EVENT-->
      <a href="event.php"
        class="bg-white px-12 py-2 h-10 rounded-full flex items-center gap-3 shadow-md hover:shadow-lg transition">
        <img src="../assets/icons/event.svg" class="w-5">
        <span class="text-[20px] text-[#3e5648] font-medium">Event</span>
      </a>

      <!-- DROPDOWN KATEGORI -->
      <div id="kategoridropdown" class="dropdown-menu absolute left-1/2 -translate-x-1/2 mt-5 w-72 bg-[#fafaf7] rounded-2xl shadow-xl p-3 space-y-2
        opacity-0 scale-95 -translate-y-2 pointer-events-none transition-all duration-200 ease-out origin-top">
        <?php
        $kategoridropdown = [
            ['Elektronik', 'elektronik.svg'],
            ['Pakaian', 'pakaian.svg'],
            ['Rumah Tangga', 'rumahtangga.svg'],
            ['Buku', 'buku.svg']
        ];
        foreach ($kategoridropdown as $k):
        ?>
        <a href="katalog.php?kategori=<?= $k[0]; ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#3e5648] text-[#fafaf7] hover:opacity-70 hover:translate-x-1 border border-[#3e5648] transition-all">
            <img src="../assets/icons/<?= $k[1]; ?>" class="w-6 h-6">
            <span class="text-lg"><?= $k[0]; ?></span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- Overlay gelap tipis (opsional, sangat ringan) -->
  <div class="absolute inset-0 bg-black/10"></div>

  <!-- Overlay putih menyebar -->
  <div class="absolute bottom-0 left-0 w-full h-[45%] pointer-events-none
  [background:radial-gradient(120%_80%_at_50%_100%,rgba(250,250,247,0.85)_0%,rgba(250,250,247,0.55)_30%,rgba(250,250,247,0.25)_50%,transparent_75%)]">
    </div>

    <!-- TRANSISI HERO → SECTION BAWAH -->
    <div class="absolute bottom-0 left-0 w-full h-24 pointer-events-none
        bg-gradient-to-t
        from-[#fafaf7]
        via-[#fafaf7]/30
        to-transparent">
    </div>
</section>

<<!-- ================= REKOMENDASI BARANG ================= -->
<section class="py-16">
  <h2 class="text-[35px] font-bold mb-6 px-10 text-[#3e5648]">
    Rekomendasi
  </h2>

  <div class="relative bg-[#3e5648] rounded-3xl mx-10 p-8 overflow-hidden">

    <!-- PREV -->
    <button id="prevRec"
      class="absolute left-4 top-1/2 -translate-y-1/2 
             bg-white w-12 h-12 rounded-full 
             flex items-center justify-center
             shadow-md transition z-10">
      <img src="../assets/icons/back.svg" class="w-7 h-7">
    </button>

    <!-- NEXT -->
    <button id="nextRec"
      class="absolute right-4 top-1/2 -translate-y-1/2 
             bg-white w-12 h-12 rounded-full 
             flex items-center justify-center
             shadow-md transition z-10">
      <img src="../assets/icons/back.svg" class="w-7 h-7 rotate-180">
    </button>

    <!-- SLIDER -->
    <div class="overflow-hidden">
      <div id="recSlider" class="flex gap-6 transition-transform duration-500 ease-out">

        <?php foreach($items as $i): 
          $badge = match($i['kondisi']) {
            'Seperti Baru' => 'bg-[#3e5648]',
            'Bagus' => 'bg-[#657b6e]',
            default => 'bg-[#7fb7a4]'
          };
        ?>
          <a href="detail_barang.php?id=<?= $i['id'] ?>"
            class="relative w-64 h-40 shrink-0 rounded-xl overflow-hidden group
                    transition-transform duration-300 ease-out
                    hover:scale-[1.06] hover:shadow-xl">

            <img src="../<?= $i['foto'] ?>"
                class="w-full h-full object-cover group-hover:scale-105 transition">

            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

            <?php
              $badge = match($i['kondisi']) {
                'Seperti Baru' => 'bg-[#3e5648]',
                'Bagus' => 'bg-[#657b6e]',
                default => 'bg-[#7fb7a4]'
              };
            ?>

            <span class="absolute bottom-3 left-3 px-3 py-1 rounded-full text-[13px] text-[#fafaf7] <?= $badge ?>">
              <?= $i['kondisi'] ?>
            </span>

            <p class="absolute bottom-10 left-3 right-3 text-white font-semibold text-[18px]">
              <?= $i['nama_barang'] ?>
            </p>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ================= PILIH FAVORITMU ================= -->
<section class="px-10 py-12">
  <h2 class="text-[35px] font-semibold mb-4">Pilih Favoritmu</h2>

    <div class="grid grid-cols-4 gap-6">
        <?php foreach($kategori as $k): ?>
        <a href="katalog.php?kategori=<?= $k ?>" class="relative group transition-transform duration-300
          hover:scale-[1.04] hover:shadow-2xl">
        <img src="../assets/images/category/<?= strtolower(str_replace(' ','',$k)) ?>.jpg"
            class="h-60 w-full object-cover rounded-xl border border-[#E5E7EB] shadow-md
                 transition-all duration-300 group-hover:shadow-xl group-hover:scale-105">
        <span class="absolute inset-0 flex items-end p-4 text-[#fafaf7] text-[32px] font-bold
             bg-gradient-to-t from-black/60 via-transparent to-transparent
             rounded-xl transition-opacity duration-300
             group-hover:opacity-90">
            <?= $k ?>
        </span>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- ================= EVENT ================= -->
<section class="py-16">
  <h2 class="text-[35px] font-semibold mb-6 px-10 text-[#3e5648]">
    Spesial Untuk Kamu
  </h2>

    <div class="relative bg-[#3e5648] rounded-3xl mx-10 p-8 overflow-hidden">

        <button onclick="prevSlide('eventSlider')"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white w-12 h-12 rounded-full flex items-center justify-center shadow-md z-10">
        <img src="../assets/icons/back.svg" class="w-7 h-7">
        </button>

        <button id="nextBtn-eventSlider" onclick="nextSlide('eventSlider')"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white w-12 h-12 rounded-full flex items-center justify-center shadow-md z-10">
        <img src="../assets/icons/back.svg" class="w-7 h-7 rotate-180">
        </button>

        <div id="sliderWrapper" class="overflow-hidden">
        <div id="eventSlider" class="flex gap-6 transition-transform duration-500 ease-out">

            <?php foreach($events as $e): ?>
            <a href="detail_event.php?id=<?= $e['id'] ?>"
              class="w-72 h-80 shrink-0 overflow-hidden relative group
                      transition-transform duration-300 ease-out
                      hover:scale-[1.05] hover:shadow-2xl">

              <img src="../assets/images/events/<?= $e['poster'] ?>"
                  class="w-full h-full object-cover group-hover:scale-105 transition">

              <div class="absolute inset-0 bg-black/40 transition-opacity duration-300 group-hover:bg-black/30"></div>

              <p class="absolute bottom-4 left-4 right-4 text-white font-semibold text-lg">
                <?= $e['title'] ?>
              </p>
            </a>
            <?php endforeach; ?>
        </div>
        </div>
    </div>
</section>


<!-- ================= FOOTER ================= -->
<div class="mt-24">
  <?php include 'components/footer.php'; ?>
</div>

<!-- ================= HERO SLIDER SCRIPT ================= -->
 <script>
    const images = [
    "../assets/images/background/slide1.jpg",
    "../assets/images/background/slide2.jpg",
    "../assets/images/background/slide3.jpg",
    "../assets/images/background/slide4.jpg"
    ];

    let index = 0;

    const bg1 = document.getElementById("bg1");
    const bg2 = document.getElementById("bg2");

    setInterval(() => {
    index = (index + 1) % images.length;

        bg2.src = images[index];
        bg2.classList.remove("opacity-0");
        setTimeout(() => {
            bg1.src = bg2.src;
            bg2.classList.add("opacity-0");
             }, 1500); 
         }, 5000);
        </script>

<script>
  const sliderState = {};

  function nextSlide(sliderId) {
    const slider = document.getElementById(sliderId);
    const wrapper = slider.parentElement;
    const nextBtn = document.getElementById(`nextBtn-${sliderId}`);

    if (!sliderState[sliderId]) sliderState[sliderId] = 0;

    const sliderWidth = slider.scrollWidth;
    const wrapperWidth = wrapper.offsetWidth;
    const maxTranslate = sliderWidth - wrapperWidth;

    sliderState[sliderId] += 300; // jarak geser

    if (sliderState[sliderId] >= maxTranslate) {
      sliderState[sliderId] = maxTranslate;

      // STOP geser + disable tombol
      nextBtn.classList.add("opacity-40", "pointer-events-none");
    }

    slider.style.transform = `translateX(-${sliderState[sliderId]}px)`;
  }

  function prevSlide(sliderId) {
    const slider = document.getElementById(sliderId);
    const nextBtn = document.getElementById(`nextBtn-${sliderId}`);

    sliderState[sliderId] -= 300;
    if (sliderState[sliderId] < 0) sliderState[sliderId] = 0;

    nextBtn.classList.remove("opacity-40", "pointer-events-none");

    slider.style.transform = `translateX(-${sliderState[sliderId]}px)`;
  }
</script>

 <script src="../js/dropdown.js"></script>
</body>
</html>
