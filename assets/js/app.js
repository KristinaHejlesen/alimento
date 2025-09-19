  /*burgermenu */
  const burger = document.querySelector("#burgerMenu");
  const mobileMenu = document.querySelector(".globalNavBottom");

  burger.addEventListener("click", () => {
    mobileMenu.classList.toggle("active");
  });

  /*filter function */
  