<?php if (empty($topDonatur)): ?>
<div class="w-[580px] h-[580px] rounded-2xl border border-[#3e5648]/20 bg-[#fafaf7]
            flex items-center justify-center">
  <p class="text-[#3e5648] font-semibold">Belum ada data donatur</p>
</div>

<?php else: ?>

<div class="w-[580px] min-h-[580px] rounded-2xl overflow-hidden
            border border-[#3e5648]/50 bg-[#fafaf7]">

  <!-- ================= HERO ================= -->
<div class="relative h-[360px]">

    <!-- background -->
    <img src="../assets/images/background/bg6.jpg"
        class="absolute inset-0 w-full h-full object-cover object-center" alt="bg">
    <div class="absolute inset-0 bg-black/35"></div>

    <!-- title -->
    <h3 class="absolute top-4 left-0 right-0 z-10
              text-white text-[34px] font-bold text-center">
      Leaderboard Donatur
    </h3>

    <!-- TOP 1–3 -->
    <div class="absolute bottom-6 left-0 right-0 z-10
                flex items-end justify-center gap-6 px-6">

      <!-- TOP 2 -->
      <?php if (isset($topDonatur[1])): ?>
      <div class="flex flex-col items-center w-[150px]">
        <span class="w-full text-center text-[#fafaf7] text-[20px] font-bold mb-2">
          <?= htmlspecialchars($topDonatur[1]['username']) ?>
        </span>

        <div class="h-[170px] w-full bg-[#2f4b42] rounded-2xl
                    border-2 border-[#7fb7a4]
                    flex flex-col justify-end items-center pb-4 gap-2">

          <!-- badge -->
          <div class="flex flex-col items-center gap-1 bg-[#fafaf7]
                      px-4 py-2 rounded-xl text-[#2f4b42] font-semibold text-[20px]">
            <img src="../assets/icons/crown2.svg" class="w-8 h-8">
            Top 2
          </div>

          <span class="text-white font-semibold">
            Donasi <?= $topDonatur[1]['total'] ?>
          </span>
        </div>
      </div>
      <?php endif; ?>

      <!-- TOP 1 -->
      <?php if (isset($topDonatur[0])): ?>
      <div class="flex flex-col items-center w-[150px]">
        <span class="w-full text-center text-[#fafaf7] text-[20px] font-bold mb-2">
          <?= htmlspecialchars($topDonatur[0]['username']) ?>
        </span>

        <div class="h-[185px] w-full bg-[#2f4b42] rounded-2xl
                    border-2 border-[#7fb7a4]
                    flex flex-col justify-end items-center pb-4 gap-2 shadow-xl">

          <div class="flex flex-col items-center gap-1 bg-[#fafaf7]
                      px-4 py-2 rounded-xl text-[#2f4b42] font-semibold text-[20px]">
            <img src="../assets/icons/crown1.svg" class="w-8 h-8">
            Top 1
          </div>

          <span class="text-white font-bold">
            Donasi <?= $topDonatur[0]['total'] ?>
          </span>
        </div>
      </div>
      <?php endif; ?>

      <!-- TOP 3 -->
      <?php if (isset($topDonatur[2])): ?>
      <div class="flex flex-col items-center w-[150px]">
        <span class="w-full text-center text-[#fafaf7] text-[20px] font-bold mb-2">
          <?= htmlspecialchars($topDonatur[2]['username']) ?>
        </span>

        <div class="h-[150px] w-full bg-[#2f4b42] rounded-2xl
                    border-2 border-[#7fb7a4]
                    flex flex-col justify-end items-center pb-4 gap-2">

          <div class="flex flex-col items-center gap-1 bg-[#fafaf7]
                      px-4 py-2 rounded-xl text-[#2f4b42] font-semibold text-[20px]">
            <img src="../assets/icons/crown3.svg" class="w-8 h-8">
            Top 3
          </div>

          <span class="text-white font-semibold">
            Donasi <?= $topDonatur[2]['total'] ?>
          </span>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>

  <!-- ================= LIST 4–5 ================= -->
  <div class="px-6 py-6">

    <div class="flex justify-between items-center
                bg-[#2f4b42] text-white
                rounded-full px-6 py-3 font-semibold mb-4">
      <span>Nama</span>
      <span>Donasi</span>
    </div>

    <?php for ($i = 3; $i <= 4; $i++): ?>
      <?php if (isset($topDonatur[$i])): ?>
      <div class="flex justify-between items-center
                  bg-white border border-[#e5ebe7]
                  rounded-full px-6 py-4 mb-3 shadow-sm">
        <span class="text-[#2f4b42] font-medium">
          <?= ($i + 1) ?>. <?= htmlspecialchars($topDonatur[$i]['username']) ?>
        </span>
        <span class="text-[#2f4b42] font-semibold">
          <?= $topDonatur[$i]['total'] ?>
        </span>
      </div>
      <?php endif; ?>
    <?php endfor; ?>

  </div>
</div>

<?php endif; ?>
