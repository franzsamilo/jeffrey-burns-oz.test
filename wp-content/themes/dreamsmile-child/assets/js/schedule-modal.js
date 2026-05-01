(function () {
  'use strict';

  function init() {
    var modal = document.querySelector('[data-ds-modal]');

    // Always expose the API so callers (quiz.js etc.) can rely on it; the
    // methods no-op when the modal markup isn't on the page.
    window.DSScheduleModal = { open: open, close: close };

    if (!modal) return;

    var form    = modal.querySelector('[data-ds-modal-form]');
    var success = modal.querySelector('[data-ds-modal-success]');

    function open() {
      if (!modal) return;
      modal.removeAttribute('hidden');
      requestAnimationFrame(function () { modal.classList.add('is-open'); });
      document.documentElement.style.overflow = 'hidden';
      var firstField = form && form.querySelector('input, select, textarea');
      if (firstField) setTimeout(function () { firstField.focus(); }, 120);
    }

    function close() {
      if (!modal) return;
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
      // Clicks inside the quiz card belong to the quiz flow (quiz.js), which
      // calls DSScheduleModal.open() itself after validating an answer.
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
