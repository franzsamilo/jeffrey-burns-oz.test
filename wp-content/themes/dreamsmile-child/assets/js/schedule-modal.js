(function () {
  'use strict';

  function init() {
    var modal = document.querySelector('[data-ds-modal]');
    if (!modal) return;

    var panel   = modal.querySelector('.ds-modal__panel');
    var form    = modal.querySelector('[data-ds-modal-form]');
    var success = modal.querySelector('[data-ds-modal-success]');

    function open() {
      modal.removeAttribute('hidden');
      requestAnimationFrame(function () { modal.classList.add('is-open'); });
      document.documentElement.style.overflow = 'hidden';
      var firstField = form && form.querySelector('input, select, textarea');
      if (firstField) setTimeout(function () { firstField.focus(); }, 120);
    }

    function close() {
      modal.classList.remove('is-open');
      document.documentElement.style.overflow = '';
      setTimeout(function () {
        modal.setAttribute('hidden', '');
        resetState();
      }, 260);
    }

    function resetState() {
      if (form)    form.hidden = false;
      if (success) success.hidden = true;
      if (form)    form.reset();
    }

    function showSuccess() {
      if (form)    form.hidden = true;
      if (success) success.hidden = false;
    }

    // Hijack every Schedule-style link across the site
    var triggers = [
      'a[href="#quiz"]',
      'a[href="/#quiz"]',
      'a[href$="#quiz"]',
      '[data-ds-schedule]'
    ].join(',');

    document.addEventListener('click', function (e) {
      var trigger = e.target.closest(triggers);
      if (!trigger) return;
      // Still allow the quiz card on the homepage to anchor-scroll to itself
      // only when we're already on the homepage AND the click target is inside the quiz card itself.
      if (trigger.closest('[data-ds-quiz]')) return;
      e.preventDefault();
      open();
    }, true);

    // Close via X, backdrop, ESC
    modal.addEventListener('click', function (e) {
      if (e.target.closest('[data-ds-modal-close]') || e.target === modal.querySelector('.ds-modal__backdrop')) {
        e.preventDefault();
        close();
      }
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal.classList.contains('is-open')) close();
    });

    // Form submission (simulated)
    if (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var btn = form.querySelector('button[type="submit"]');
        if (btn) { btn.disabled = true; btn.textContent = 'Sending…'; }
        setTimeout(showSuccess, 650);
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
