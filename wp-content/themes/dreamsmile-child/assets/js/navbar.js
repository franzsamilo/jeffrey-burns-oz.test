(function () {
  'use strict';

  var nav = document.querySelector('[data-ds-nav]');
  if (!nav) { return; }

  var scrollThreshold = 50;
  var onScroll = function () {
    if (window.scrollY > scrollThreshold) {
      nav.classList.add('is-scrolled');
    } else {
      nav.classList.remove('is-scrolled');
    }
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  var toggle = nav.querySelector('[data-ds-nav-toggle]');
  var mobile = nav.querySelector('[data-ds-nav-mobile]');
  if (toggle && mobile) {
    toggle.addEventListener('click', function () {
      var open = mobile.classList.toggle('is-open');
      mobile.hidden = !open;
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }
})();
