/**
 * Dingo's front-end behaviour.
 *
 * Replaces the jQuery version: Owl Carousel, Slick, Magnific Popup and
 * Nice Select are gone, and the shared ColorlibUI module provides the same
 * behaviour against the same markup.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  var lightbox = UI.Lightbox();

  function ready(fn) {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', fn);
    } else {
      fn();
    }
  }

  /**
   * The two single-item carousels: the player strip and the review slider.
   */
  function initCarousels() {
    var players = document.querySelector('.player_info_item');
    if (players) {
      UI.Carousel(players, {
        perView: 1,
        loop: true,
        autoplay: 5000,
        arrows: true,
        gap: window.innerWidth >= 600 ? 10 : 15
      });
    }

    var reviews = document.querySelector('.client_review_part');
    if (reviews) {
      UI.Carousel(reviews, { perView: 1, loop: true, autoplay: 5000, dots: true });
    }
  }

  /**
   * The gallery slider and its thumbnail strip.
   *
   * The thumbnails drive the main slider and follow it, and the captions
   * keyed by data-id are swapped to match — the behaviour Slick's asNavFor
   * and afterChange provided.
   */
  function initGallerySlider() {
    var main = document.querySelector('.slider');
    var thumbs = document.querySelector('.slider-nav-thumbnails');
    if (!main) return;

    var mainCarousel = UI.Carousel(main, { perView: 1, loop: true, dots: true });
    var thumbCarousel = thumbs
      ? UI.Carousel(thumbs, { perView: { 0: 1, 480: 3 }, loop: true, gap: 10 })
      : null;

    function showCaption(index) {
      var captions = document.querySelectorAll('.content[data-id]');
      if (captions.length === 0) return;
      Array.prototype.forEach.call(captions, function (el) {
        el.hidden = el.dataset.id !== String(index + 1);
      });
    }

    function markThumb(index) {
      if (!thumbs) return;
      Array.prototype.forEach.call(thumbs.querySelectorAll('.cl-carousel__slide'), function (slide, i) {
        slide.classList.toggle('slick-active', i === index);
      });
    }

    main.addEventListener('cl:change', function (e) {
      markThumb(e.detail.index);
      showCaption(e.detail.index);
      if (thumbCarousel) thumbCarousel.go(e.detail.index, true);
    });

    if (thumbs) {
      Array.prototype.forEach.call(thumbs.querySelectorAll('.cl-carousel__slide'), function (slide, i) {
        slide.addEventListener('click', function () { mainCarousel.go(i); });
      });
    }

    markThumb(0);
    showCaption(0);
  }

  /**
   * Images and video embeds, opened in the theme's own lightbox.
   */
  function initLightbox() {
    var videos = document.querySelectorAll('.popup-youtube, .popup-vimeo');
    Array.prototype.forEach.call(videos, function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        lightbox.open([{ type: 'iframe', src: UI.videoSource(link.href), title: link.title }], 0);
      });
    });

    var gallery = document.querySelectorAll('.gallery_img');
    if (gallery.length === 0) return;

    var items = Array.prototype.map.call(gallery, function (link) {
      return {
        type: 'image',
        src: link.getAttribute('href') || link.dataset.src,
        title: link.title || (link.querySelector('img') || {}).alt
      };
    });

    Array.prototype.forEach.call(gallery, function (link, i) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        lightbox.open(items, i);
      });
    });
  }

  /**
   * The header pins itself once the page has scrolled past it.
   */
  function initStickyMenu() {
    var menu = document.querySelector('.main_menu');
    if (!menu) return;

    var pinned = false;
    function onScroll() {
      var should = window.pageYOffset > 50;
      if (should === pinned) return;
      pinned = should;
      menu.classList.toggle('menu_fixed', should);
      menu.classList.toggle('animated', should);
      menu.classList.toggle('fadeInDown', should);
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  function initSelects() {
    Array.prototype.forEach.call(document.querySelectorAll('select'), UI.enhanceSelect);
  }

  ready(function () {
    initCarousels();
    initGallerySlider();
    initLightbox();
    initStickyMenu();
    initSelects();
  });
}());
