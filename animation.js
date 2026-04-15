document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(".fade-in-up");

  if (!elements.length) return;

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
          obs.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.15,
      rootMargin: "0px 0px -50px 0px",
    },
  );

  elements.forEach((el) => {
    observer.observe(el);

    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 50) {
      el.classList.add("show");
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const boxElements = document.querySelectorAll(".box-reveal");
  if (!boxElements.length) return;

  const boxObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
          observer.unobserve(entry.target); // animate once
        }
      });
    },
    {
      threshold: 0.3,
      rootMargin: "0px 0px -40px 0px",
    },
  );

  boxElements.forEach((box) => {
    boxObserver.observe(box);

    const rect = box.getBoundingClientRect();
    if (rect.top < window.innerHeight - 40) {
      box.classList.add("show");
    }
  });
});

//    FLOW BOX ANIMATION

document.addEventListener("DOMContentLoaded", () => {
  const flowBoxes = document.querySelectorAll(".flow-box");

  if (flowBoxes.length) {
    const flowObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry, index) => {
          if (entry.isIntersecting) {
            // stagger effect
            setTimeout(() => {
              entry.target.classList.add("show");
            }, index * 100);

            observer.unobserve(entry.target);
          }
        });
      },
      {
        root: null,
        rootMargin: "0px 0px -120px 0px",
        threshold: 0.1,
      },
    );

    flowBoxes.forEach((box) => {
      flowObserver.observe(box);

      const rect = box.getBoundingClientRect();
      if (rect.top < window.innerHeight - 50) {
        box.classList.add("show");
      }
    });
  }
});
