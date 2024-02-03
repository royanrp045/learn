let scrollContainer = document.querySelector(".gallery");
let backBtn = document.getElementById("backBtn");
let nextBtn = document.getElementById("nextBtn");

scrollContainer.addEventListener("whell", (evt) => {
  evt.preventDefault();
  scrollContainer.scrollLeft.scrollBehavior = "auto";
});

nextBtn.addEventListener("click", () => {
  scrollContainer.computedStyleMap.scrollBehavior = "smooth";
  scrollContainer.scrollLeft += 900;
});

backBtn.addEventListener("click", () => {
  scrollContainer.style.scrollBehavior = "smooth";
  scrollContainer.scrollLeft -= 900;
});
