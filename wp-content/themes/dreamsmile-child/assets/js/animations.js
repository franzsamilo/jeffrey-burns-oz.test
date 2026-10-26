(function () {
  'use strict';

  var prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var targets = document.querySelectorAll('.ds-reveal');

  if (prefersReduced || !('IntersectionObserver' in window)) {
    targets.forEach(function (el) { el.classList.add('is-visible'); });
  } else {
    // Below 900px .ds-intro-grid is a sideways-scrolling rail. Its off-screen
    // cards never intersect until swiped, so they'd sit blank mid-swipe.
    // When one card in the rail shows, show the whole rail.
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) { return; }
        var rail = entry.target.closest('.ds-intro-grid');
        var group = rail ? rail.querySelectorAll('.ds-reveal') : [entry.target];
        Array.prototype.forEach.call(group, function (el) {
          el.classList.add('is-visible');
          observer.unobserve(el);
        });
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    targets.forEach(function (el) { observer.observe(el); });
  }

  var yearNodes = document.querySelectorAll('[data-ds-year]');
  if (yearNodes.length) {
    var year = new Date().getFullYear();
    yearNodes.forEach(function (n) { n.textContent = String(year); });
  }
})();
