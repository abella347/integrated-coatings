var swiper = new Swiper(".swiper.intlSwiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  
  loop: true,
  loopedSlides: 2,
  loopAdditionalSlides: 2,
 
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 50,
    },
  },
});
