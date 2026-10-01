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

// Home: animated grid dots and cursor interaction.
const homeSection = document.querySelector("#home");
const homeBackground = homeSection?.querySelector(".home-background");

if (homeSection && homeBackground) {
  const cursorRadius = 120;
  const dotSpacing = 3;

  let dots = [];
  let pointer = null;
  let frame = null;

  function updateDots() {
    const rect = homeBackground.getBoundingClientRect();

    homeBackground.classList.toggle("has-pointer", pointer !== null);
    dots.forEach(({ element, x, y }) => {
      const nearby =
        pointer !== null &&
        Math.hypot(
          rect.left + x - pointer.x,
          rect.top + y - pointer.y
        ) < cursorRadius;

      element.classList.toggle("is-off", nearby);
    });
  }

  function scheduleUpdate() {
    if (frame !== null) return;

    frame = requestAnimationFrame(() => {
      frame = null;
      updateDots();
    });
  }

  function createDots() {
    const gridSize = parseFloat(
      getComputedStyle(homeBackground).getPropertyValue("--grid-size")
    );

    if (!Number.isFinite(gridSize) || gridSize <= 0) return;

    const width = homeBackground.clientWidth;
    const height = homeBackground.clientHeight;
    const fragment = document.createDocumentFragment();

    dots = [];

    for (let row = 1; row * gridSize < height; row++) {
      for (let column = 1; column * gridSize < width; column++) {
        // Spread dots across alternating grid intersections.
        if ((column + row) % dotSpacing !== 0) continue;

        const element = document.createElement("span");
        const x = column * gridSize;
        const y = row * gridSize;

        element.className = "home-grid-dot";
        element.style.left = `${x}px`;
        element.style.top = `${y}px`;
        element.style.setProperty(
          "--duration",
          `${5 + Math.random() * 4}s`
        );
        element.style.setProperty("--delay", `${-Math.random() * 9}s`);

        fragment.append(element);
        dots.push({ element, x, y });
      }
    }

    homeBackground.replaceChildren(fragment);
    updateDots();
  }

  homeSection.addEventListener("pointermove", (event) => {
    if (event.pointerType === "touch") return;

    pointer = { x: event.clientX, y: event.clientY };
    scheduleUpdate();
  });

  function resetPointer() {
    pointer = null;
    scheduleUpdate();
  }

  homeSection.addEventListener("pointerleave", resetPointer);
  homeSection.addEventListener("pointercancel", resetPointer);
  window.addEventListener("blur", resetPointer);

  // Keep cursor distances accurate when the page scrolls.
  window.addEventListener("scroll", scheduleUpdate, { passive: true });

  const backgroundObserver = new ResizeObserver(createDots);
  backgroundObserver.observe(homeBackground);
}