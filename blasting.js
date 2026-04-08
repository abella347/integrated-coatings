// PAGE ELEMENTS
const page1 = document.getElementById("page1");
const page2 = document.getElementById("page2");

// PAGINATION BUTTONS
const btnPage1 = document.getElementById("btnPage1");
const btnPage2 = document.getElementById("btnPage2");
const btnNext = document.getElementById("btnNext");

// ARROW ICON
const pageArrow = document.getElementById("pageArrow");


// ===== SHOW PAGE 1 =====

function showPage1() {
    // Switch visibility
    page1.classList.add("page-active");
    page1.classList.remove("page-hidden");

    page2.classList.add("page-hidden");
    page2.classList.remove("page-active");

    // Update indicator styling
    btnPage1.classList.add("initial");
    btnPage2.classList.remove("initial");

    // Arrow points RIGHT →
    pageArrow.classList.remove("fa-arrow-left");
    pageArrow.classList.add("fa-arrow-right");

    window.scrollTo({ top: 20, behavior: "smooth" });
}


// ===== SHOW PAGE 2 =====
function showPage2() {
    // Switch visibility
    page2.classList.add("page-active");
    page2.classList.remove("page-hidden");

    page1.classList.add("page-hidden");
    page1.classList.remove("page-active");

    // Update indicator styling
    btnPage1.classList.remove("initial");
    btnPage2.classList.add("initial");

    // Arrow points LEFT ←
    pageArrow.classList.remove("fa-arrow-right");
    pageArrow.classList.add("fa-arrow-left");

    window.scrollTo({ top: 0, behavior: "smooth" });

}


//  ARROW BUTTON BEHAVIOR
btnNext.addEventListener("click", () => {
    if (page1.classList.contains("page-active")) {
        showPage2();
    } else {
        showPage1();
    }
});


// ===== PAGE NUMBER BUTTONS =====
btnPage1.addEventListener("click", showPage1);
btnPage2.addEventListener("click", showPage2);


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

const nav = document.querySelector("nav");
const background = document.querySelector(".background");
const section2 = document.querySelector(".hide");

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
        rootMargin: "-70% 0px 0px 0px",
    }
);

//  HIDE EFFECT (triggered by section1)
const hideObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {

                nav.classList.add("hide");
            } else {
                // scrolling back up → show nav again
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