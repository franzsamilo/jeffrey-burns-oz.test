(function () {
  'use strict';

  function init() {
    document.querySelectorAll('[data-ds-testi-rail]').forEach(function (root) {
      var track    = root.querySelector('[data-ds-testi-track]');
      var viewport = root.querySelector('[data-ds-testi-viewport]');
      var cards    = Array.prototype.slice.call(root.querySelectorAll('[data-ds-testi-card]'));
      var prev     = root.querySelector('[data-ds-testi-prev]');
      var next     = root.querySelector('[data-ds-testi-next]');
      var dotsWrap = root.querySelector('[data-ds-testi-dots]');
      if (!track || !cards.length) return;

      var index = 0;

      function visible() {
        var v = getComputedStyle(root).getPropertyValue('--visible').trim();
        v = parseInt(v, 10);
        return isNaN(v) || v < 1 ? 1 : v;
      }

      function maxIndex() {
        return Math.max(0, cards.length - visible());
      }

      function pauseAllExcept(keepIdx) {
        cards.forEach(function (card, i) {
          var v = card.querySelector('video');
          if (!v) return;
          if (i !== keepIdx) {
            try { v.pause(); } catch (e) {}
            card.classList.remove('is-playing');
            v.removeAttribute('controls');
          }
        });
      }

      function positionNavs() {
        if (window.innerWidth <= 699) return; // mobile uses bottom-pinned nav
        var frame = cards[0] && cards[0].querySelector('.ds-testi-card__frame');
        if (!frame) return;
        var rootRect = root.getBoundingClientRect();
        var frameRect = frame.getBoundingClientRect();
        var centerY = (frameRect.top - rootRect.top) + frameRect.height / 2;
        if (prev) prev.style.top = centerY + 'px';
        if (next) next.style.top = centerY + 'px';
      }

      function render() {
        if (index < 0) index = 0;
        if (index > maxIndex()) index = maxIndex();
        var cardWidth = cards[0].getBoundingClientRect().width;
        var gap = parseFloat(getComputedStyle(track).gap || '0') || 0;
        var offset = -(index * (cardWidth + gap));
        track.style.transform = 'translateX(' + offset + 'px)';

        if (dotsWrap) {
          var dots = dotsWrap.querySelectorAll('button');
          dots.forEach(function (d, i) { d.classList.toggle('is-active', i === index); });
        }

        if (prev) prev.toggleAttribute('disabled', index === 0);
        if (next) next.toggleAttribute('disabled', index >= maxIndex());
      }

      function rebuildDots() {
        if (!dotsWrap) return;
        dotsWrap.innerHTML = '';
        var total = maxIndex() + 1;
        for (var i = 0; i < total; i++) {
          (function (n) {
            var b = document.createElement('button');
            b.type = 'button';
            b.setAttribute('aria-label', 'Go to testimonial group ' + (n + 1));
            if (n === index) b.classList.add('is-active');
            b.addEventListener('click', function (e) { e.preventDefault(); index = n; render(); });
            dotsWrap.appendChild(b);
          })(i);
        }
      }

      if (prev) {
        prev.addEventListener('click', function (e) {
          e.preventDefault();
          index = Math.max(0, index - 1);
          render();
        });
      }
      if (next) {
        next.addEventListener('click', function (e) {
          e.preventDefault();
          index = Math.min(maxIndex(), index + 1);
          render();
        });
      }

      cards.forEach(function (card, i) {
        var video = card.querySelector('video');
        var btn   = card.querySelector('[data-ds-testi-play]');
        if (!video) return;

        function startPlayback() {
          pauseAllExcept(i);
          card.classList.add('is-playing');
          video.setAttribute('controls', '');
          video.muted = false;
          var p = video.play();
          if (p && typeof p.catch === 'function') p.catch(function () {});
        }

        if (btn) btn.addEventListener('click', function (e) { e.preventDefault(); e.stopPropagation(); startPlayback(); });

        video.addEventListener('ended', function () {
          card.classList.remove('is-playing');
          video.removeAttribute('controls');
          try { video.currentTime = 0; } catch (e) {}
        });
      });

      var startX = null;
      if (viewport) {
        viewport.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; }, { passive: true });
        viewport.addEventListener('touchend', function (e) {
          if (startX === null) return;
          var dx = e.changedTouches[0].clientX - startX;
          if (Math.abs(dx) > 40) {
            index = Math.max(0, Math.min(maxIndex(), index + (dx < 0 ? 1 : -1)));
            render();
          }
          startX = null;
        });
      }

      root.tabIndex = 0;
      root.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowLeft')  { e.preventDefault(); index = Math.max(0, index - 1); render(); }
        if (e.key === 'ArrowRight') { e.preventDefault(); index = Math.min(maxIndex(), index + 1); render(); }
      });

      var resizeTimer;
      window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () { rebuildDots(); render(); positionNavs(); }, 100);
      });

      // Recompute nav positions once the first video's metadata loads (frame height stabilizes).
      var firstVideo = cards[0].querySelector('video');
      if (firstVideo) firstVideo.addEventListener('loadedmetadata', positionNavs);

      rebuildDots();
      render();
      requestAnimationFrame(positionNavs);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
