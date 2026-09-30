const certificatesSection = document.querySelector("#certificates");

if (certificatesSection) {
  const filters = certificatesSection.querySelectorAll(
    ".certificate-filter"
  );
  const cards = certificatesSection.querySelectorAll(
    ".certificate-card"
  );

  filters.forEach((button) => {
    button.addEventListener("click", () => {
      const category = button.dataset.filter;

      filters.forEach((filter) => {
        filter.setAttribute(
          "aria-pressed",
          String(filter === button)
        );
      });

      cards.forEach((card) => {
        card.hidden =  
            category !== "all" && card.dataset.category !== category;
      });
    });
  });
}