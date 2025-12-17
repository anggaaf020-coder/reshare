<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>ReShare</title>
  <meta name="viewport" content="width=1280">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="../style/main.css" rel="stylesheet">

  
</head>

<body class="relative h-screen w-screen overflow-hidden text-[#FAFAF7]">

  <!-- ================= BACKGROUND SLIDER ================= -->
  <div class="absolute inset-0 -z-10">
    <div class="bg-slide active" style="background-image:url('/reshare/assets/images/background/slide1.jpg')"></div>
    <div class="bg-slide" style="background-image:url('/reshare/assets/images/background/slide2.jpg')"></div>
    <div class="bg-slide" style="background-image:url('/reshare/assets/images/background/slide3.jpg')"></div>
  </div>

  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/45"></div>

  <!-- ================= HERO CONTENT ================= -->
  <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-20">

    <!-- LOGO -->
    <img id="heroLogo"
         src="/reshare/assets/images/logo/ReShare.png"
         class="h-40 w-auto mb-4 drop-shadow-[0_20px_40px_rgba(0,0,0,0.4)]"
         alt="ReShare Logo">

    <!-- TITLE -->
    <h1 id="heroTitle"
        class="text-5xl font-semibold tracking-wide mb-6 cursor">
    </h1>

    <!-- DESCRIPTION -->
    <p id="heroDesc"
       class="text-lg max-w-2xl text-white/85 leading-relaxed cursor">
    </p>

    <!-- BUTTON -->
    <a id="ctaBtn"
       href="login.php"
       class="mt-14 px-14 py-4 rounded-full
              bg-[#FAFAF7] text-[#3e5648]
              text-lg font-bold tracking-wide
              opacity-0 translate-y-6
              transition-all duration-700 ease-out
              hover:scale-105 hover:shadow-2xl">
      Get Started
    </a>

  </div>

  <!-- ================= SCRIPT ================= -->
  <script>
    /* BACKGROUND SLIDER */
    const slides = document.querySelectorAll('.bg-slide');
    let slideIndex = 0;

    setInterval(() => {
      slides[slideIndex].classList.remove('active');
      slideIndex = (slideIndex + 1) % slides.length;
      slides[slideIndex].classList.add('active');
    }, 6000);

    /* TYPING EFFECT PER HURUF */
    function typeText(el, delay, speed, callback) {
      const text = el.dataset.text;
      let i = 0;
      setTimeout(() => {
        const interval = setInterval(() => {
          el.textContent += text[i];
          i++;
          if (i >= text.length) {
            clearInterval(interval);
            el.classList.remove("cursor");
            if (callback) callback();
          }
        }, speed);
      }, delay);
    }

    /* INIT */
    const title = document.getElementById("heroTitle");
    const desc  = document.getElementById("heroDesc");
    const btn   = document.getElementById("ctaBtn");
    const logo  = document.getElementById("heroLogo");

    title.dataset.text = "Berbagi Lebih Bermakna";
    desc.dataset.text  = "Platform donasi barang layak pakai untuk mengurangi limbah dan membantu sesama secara berkelanjutan.";

    // Show logo
    setTimeout(() => {
      logo.classList.add("show");
    }, 300);

    // Start typing
    setTimeout(() => {
      typeText(title, 0, 60, () => {
        typeText(desc, 200, 22, () => {
          btn.classList.remove("opacity-0", "translate-y-6");
        });
      });
    }, 900);
  </script>

</body>
</html>
