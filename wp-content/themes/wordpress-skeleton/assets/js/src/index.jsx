// -- Menu logic -- //
const hamburger = document.querySelector("[data-action='toggle-menu']");

hamburger.addEventListener("click", (e) => {
  e.preventDefault();
  const nav = document.querySelector(".header__nav");
  nav.classList.toggle("header__nav--open");
});

// -- Nav -- //
const subNavTriggers = document.querySelectorAll(
  "[data-action='subnav-toggle']"
);

subNavTriggers.forEach((e) => {
  e.addEventListener("click", () => {
    const activeSubMenu = document.querySelectorAll(".nav__sub-list--active");

    if (!e.nextSibling.classList.contains("nav__sub-list--active")) {
      activeSubMenu.forEach((f) => {
        f.previousSibling.firstChild.classList.remove("icon--active");

        f.classList.remove("nav__sub-list--active");
      });
    }

    e.children[0].classList.toggle("icon--active");
    e.nextSibling.classList.toggle("nav__sub-list--active");
  });
});
