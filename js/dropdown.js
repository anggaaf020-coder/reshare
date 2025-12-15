document.addEventListener("DOMContentLoaded", () => {
  const toggles = document.querySelectorAll("[data-toggle='dropdown']");

  toggles.forEach(toggle => {
    const targetId = toggle.dataset.target;
    const menu = document.getElementById(targetId);

    if (!menu) return;

    toggle.addEventListener("click", (e) => {
      e.stopPropagation();

      const isClosed = menu.classList.contains("opacity-0");

      // Tutup dropdown lain
      document.querySelectorAll(".dropdown-menu").forEach(d => {
        if (d !== menu) {
          d.classList.add("opacity-0","scale-95","-translate-y-2","pointer-events-none");
        }
      });

      // Toggle current
      menu.classList.toggle("opacity-0", !isClosed);
      menu.classList.toggle("scale-95", !isClosed);
      menu.classList.toggle("-translate-y-2", !isClosed);
      menu.classList.toggle("pointer-events-none", !isClosed);
    });
  });

  document.addEventListener("click", () => {
    document.querySelectorAll(".dropdown-menu").forEach(menu => {
      menu.classList.add("opacity-0","scale-95","-translate-y-2","pointer-events-none");
    });
  });
});