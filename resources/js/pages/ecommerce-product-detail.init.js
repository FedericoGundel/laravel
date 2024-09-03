/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************************!*\
  !*** ./resources/js/pages/ecommerce-product-detail.init.js ***!
  \*************************************************************/
/******/(function () {
  // webpackBootstrap
  var __webpack_exports__ = {};
  /*!*************************************************************!*\
    !*** ./resources/js/pages/ecommerce-product-detail.init.js ***!
    \*************************************************************/
  /*
  Template Name: Vusey - Admin & Dashboard Template
  Author: Themesdesign
  Website: https://themesdesign.in/
  Contact: themesdesign.in@gmail.com
  File: Ecommerce product detail Js File
  */

  var productNavSlider = new Swiper(".product-nav-slider", {
    loop: false,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true
  });
  var productThubnailSlider = new Swiper(".product-thumbnail-slider", {
    loop: false,
    spaceBetween: 24,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    thumbs: {
      swiper: productNavSlider
    }
  });
  /******/
})();
/******/ })()
;