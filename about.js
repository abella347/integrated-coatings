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


const nav = document.querySelector("nav");
const background = document.querySelector(".background");
const section2 = document.querySelector(".about-section3");

//  BLUR EFFECT (inside hero/background)
const blurObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {

                nav.classList.add("blur");
            } else {
                nav.classList.remove("blur");
            }
        });
    },
    {
        root: null,
        threshold: 0,
        rootMargin: "-50% 0px 0px 0px",
    }
);

//  HIDE EFFECT (triggered by section1)
const hideObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {

                nav.classList.add("hide");
            } else {
                nav.classList.remove("hide");
            }
        });
    },
    {
        root: null,
        threshold: 0.05,
        rootMargin: "-150px 0px 0px 0px",
    }
);

// start observing both sections
blurObserver.observe(background);
hideObserver.observe(section2);


const primaryNav = document.querySelector('.navlist')
const navToggle = document.querySelector('.mobile-nav')
const closeNav = document.querySelector('.close-nav');

navToggle.addEventListener('click', () => {
    const visibility = primaryNav.getAttribute('data-visible')
    // console.log(visibility)

    if (visibility === "false") {
        primaryNav.setAttribute("data-visible", true)
        // navToggle.setAttribute("aria-expanded", true)

    } else if (visibility === "true") {
        primaryNav.setAttribute("data-visible", false)
        // navToggle.setAttribute("aria-expanded", false)
    }

    closeNav.addEventListener('click', () => {
        primaryNav.setAttribute('data-visible', false);
    })

})


// DROPDOWN

const productLink = document.getElementById("product-link");
const productDropdown = document.getElementById("product-dropdown");
const paintsItem = document.getElementById("paints-item");
const coatingsItem = document.getElementById("coatings-item");


productLink.addEventListener('click', () => {
    // console.log('enter')
    productDropdown.classList.toggle("active");

})

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
