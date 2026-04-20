(function () {
  'use strict';

  function init() {
    var carousels = document.querySelectorAll('[data-ds-carousel]');
    if (!carousels.length) return;

    carousels.forEach(function (root) {
      var track     = root.querySelector('[data-ds-carousel-track]');
      var slides    = Array.prototype.slice.call(root.querySelectorAll('.ds-ba__slide'));
      var dots      = Array.prototype.slice.call(root.querySelectorAll('[data-ds-carousel-dot]'));
      var prevBtn   = root.querySelector('[data-ds-carousel-prev]');
      var nextBtn   = root.querySelector('[data-ds-carousel-next]');
      var counterEl = root.querySelector('[data-ds-carousel-current]');
      var total     = slides.length;
      if (!total) return;

      var index     = 0;
      var autoTimer = null;
      var paused    = false;

      function render(next) {
        slides.forEach(function (s, idx) { s.classList.toggle('is-active', idx === next); });
        dots.forEach(function (d, idx)   { d.classList.toggle('is-active', idx === next); });
        if (counterEl) counterEl.textContent = String(next + 1);
        index = next;
      }

      function go(delta) {
        var next = ((index + delta) % total + total) % total;
        render(next);
        restartAuto();
      }

      function setTo(i) {
        render(((i % total) + total) % total);
        restartAuto();
      }

      function restartAuto() {
        if (autoTimer) clearInterval(autoTimer);
        if (paused) return;
        autoTimer = setInterval(function () {
          var next = (index + 1) % total;
          render(next);
        }, 6000);
      }

      if (prevBtn) prevBtn.addEventListener('click', function (e) { e.preventDefault(); e.stopPropagation(); go(-1); });
      if (nextBtn) nextBtn.addEventListener('click', function (e) { e.preventDefault(); e.stopPropagation(); go(1);  });

      dots.forEach(function (d, i) {
        d.addEventListener('click', function (e) { e.preventDefault(); e.stopPropagation(); setTo(i); });
      });

      root.tabIndex = 0;
      root.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowLeft')  { e.preventDefault(); go(-1); }
        if (e.key === 'ArrowRight') { e.preventDefault(); go(1);  }
      });

      root.addEventListener('mouseenter', function () { paused = true;  if (autoTimer) clearInterval(autoTimer); });
      root.addEventListener('mouseleave', function () { paused = false; restartAuto(); });

      var touchStart = null;
      if (track) {
        track.addEventListener('touchstart', function (e) { touchStart = e.touches[0].clientX; }, { passive: true });
        track.addEventListener('touchend', function (e) {
          if (touchStart === null) return;
          var dx = e.changedTouches[0].clientX - touchStart;
          if (Math.abs(dx) > 40) go(dx < 0 ? 1 : -1);
          touchStart = null;
        });
      }

      render(0);
      restartAuto();
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
