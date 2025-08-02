// main.js

AOS.init();

window.addEventListener("load", () => {
  typeHero();
});

function typeHero() {
  const text = "Hi, I'm James";
  const heading = document.getElementById("hero-heading");
  if (!heading) return;

  let i = 0;
  function type() {
    if (i < text.length) {
      heading.textContent += text.charAt(i);
      heading.classList.add("opacity-100");
      i++;
      setTimeout(type, 75);
    }
  }
  type();
}

const goTopBtn = document.getElementById("goTopBtn");
window.addEventListener("scroll", () => {
  if (goTopBtn) {
    goTopBtn.classList.toggle("hidden", window.scrollY <= 300);
  }

  const navbar = document.getElementById("navbar");
  if (!navbar) return;

  const currentScroll = window.pageYOffset;
  if (!window.lastScroll) window.lastScroll = 0;

  navbar.style.transform = currentScroll > window.lastScroll ? "translateY(-100%)" : "translateY(0)";
  window.lastScroll = currentScroll;
});

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
window.scrollToTop = scrollToTop;
