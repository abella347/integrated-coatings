let nav = document.querySelector("nav");
const background = document.querySelector(".background");
const section2 = document.querySelector(".section2");

const primaryNav = document.querySelector(".navlist");
const navToggle = document.querySelector(".mobile-nav");
const closeNav = document.querySelector(".close-nav");

const productLink = document.getElementById("product-link");
const productDropdown = document.getElementById("product-dropdown");
const paintsItem = document.getElementById("paints-item");
const coatingsItem = document.getElementById("coatings-item");

const counters = document.querySelectorAll(".counter");
const statsSection = document.querySelector("#stats-section");

const overlay = document.querySelector(".overlay");

const fadeElements = document.querySelectorAll(".fade-in-up");
const boxElements = document.querySelectorAll(".box-reveal");
const flowBoxes = document.querySelectorAll(".flow-box");

// let menuOpen = false;

// navToggle.addEventListener("click", () => {
//   menuOpen = !menuOpen;

//   primaryNav.setAttribute("data-visible", menuOpen);
//   nav.classList.toggle("menu-open", menuOpen);
// });

// closeNav.addEventListener("click", () => {
//   menuOpen = false;
//   primaryNav.setAttribute("data-visible", false);
//   nav.classList.remove("menu-open");
// });

navToggle.addEventListener("click", () => {
  const visibility = primaryNav.getAttribute("data-visible");

  if (visibility === "false") {
    primaryNav.setAttribute("data-visible", "true");
  } else {
    primaryNav.setAttribute("data-visible", "false");
  }
});

closeNav.addEventListener("click", () => {
  primaryNav.setAttribute("data-visible", "false");
});

// DROPDOWN

productLink.addEventListener("click", () => {
  // console.log('enter')
  productDropdown.classList.toggle("active");
});

document.addEventListener("click", (e) => {
  if (!productDropdown.contains(e.target) && !productLink.contains(e.target)) {
    productDropdown.classList.remove("active");
    paintsItem.querySelector(".inner-dropdown").classList.remove("active");
    coatingsItem.querySelector(".inner-dropdown").classList.remove("active");
  }
});

paintsItem.querySelector("h3").onclick = () => {
  const paintsDropdown = paintsItem.querySelector(".inner-dropdown");
  const coatingsDropdown = coatingsItem.querySelector(".inner-dropdown");
  const paintsArrow = paintsItem.querySelector("i");
  const coatingsArrow = coatingsItem.querySelector("i");

  // Close coatings if open
  coatingsDropdown.classList.remove("active");
  coatingsArrow.classList.remove("rotate");

  paintsDropdown.classList.toggle("active");
  paintsArrow.classList.toggle("rotate");
};

coatingsItem.querySelector("h3").onclick = () => {
  const coatingsDropdown = coatingsItem.querySelector(".inner-dropdown");
  const paintsDropdown = paintsItem.querySelector(".inner-dropdown");
  const coatingsArrow = coatingsItem.querySelector("i");
  const paintsArrow = paintsItem.querySelector("i");

  // Close paints if open
  paintsDropdown.classList.remove("active");
  paintsArrow.classList.remove("rotate");

  coatingsDropdown.classList.toggle("active");
  coatingsArrow.classList.toggle("rotate");
};

// nav scroll

//  BLUR EFFECT (inside hero/background)
const blurObserver = new IntersectionObserver(
  ([entry]) => {
    if (!entry.isIntersecting) {
      nav.classList.add("blur");
    } else {
      nav.classList.remove("blur");
    }
  },
  {
    threshold: 0.5,
    // rootMargin: "-180px 0px 0px 0px",
  },
);

blurObserver.observe(background);

//  HIDE EFFECT (triggered by section1)
const hideObserver = new IntersectionObserver(
  ([entry]) => {
    if (primaryNav.getAttribute("data-visible") === "true") return;
    nav.classList.toggle("hide", entry.isIntersecting);
  },
  {
    threshold: 0.1,
  },
);

hideObserver.observe(section2);

// SWIPER CODE

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 4,
  spaceBetween: 10,
  loop: true,
  allowTouchMove: false,
  speed: 4000,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 15,
    },
  },
});

const countUp = (counter) => {
  const target = Number(counter.dataset.target);
  const duration = 2000; // total animation time (ms)
  const startTime = performance.now();

  const update = (currentTime) => {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const value = Math.floor(progress * target);

    counter.textContent = value;

    if (progress < 1) {
      requestAnimationFrame(update);
    } else {
      counter.textContent = target;
    }
  };

  requestAnimationFrame(update);
};

const observer = new IntersectionObserver(
  (entries, observer) => {
    if (entries[0].isIntersecting) {
      counters.forEach((counter) => countUp(counter));
      observer.unobserve(statsSection); // run once
    }
  },
  {
    threshold: 0.4,
  },
);

observer.observe(statsSection);

// backToTop

const backToTop = document.getElementById("backToTop");

window.addEventListener("scroll", () => {
  if (window.scrollY > 1800) {
    backToTop.classList.add("show");
  } else {
    backToTop.classList.remove("show");
  }
});

backToTop.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

const fadeObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
      }
    });
  },
  {
    threshold: 0.2,
  },
);

fadeElements.forEach((el) => fadeObserver.observe(el));

const boxObserver = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
        observer.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.5 },
);

boxElements.forEach((box) => boxObserver.observe(box));

// const flowObserver = new IntersectionObserver(
//   (entries) => {
//     entries.forEach((entry) => {
//       if (entry.isIntersecting) {
//         flowBoxes.forEach((box, index) => {
//           setTimeout(() => {
//             box.classList.add("show");
//           }, index * 100);
//         });
//       }
//     });
//   },
//   {
//     root: null,
//     rootMargin: "0px 0px -150px 0px", // 🔥 triggers earlier
//   },
// );

// if (flowBoxes.length > 0) {
//   flowObserver.observe(flowBoxes[0]);
// }

// flowObserver.observe(flowBoxes[0]);

const flowObserver = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add("show");
        }, index * 100);

        observer.unobserve(entry.target);
      }
    });
  },
  {
    root: null,
    rootMargin: "0px 0px -150px 0px",
  },
);

flowBoxes.forEach((box) => flowObserver.observe(box));
