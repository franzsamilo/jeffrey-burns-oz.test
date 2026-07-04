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
      // Stamp which page the lead came from so the practice knows the context.
      var src = form && form.querySelector('[data-ds-source]');
      if (src) src.value = window.location.pathname + window.location.search;
      var firstField = form && form.querySelector('input:not([type="hidden"]):not([type="checkbox"]), select, textarea');
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

    // Form submission — POSTs to a configured endpoint (Web3Forms / Formspree /
    // Getform). Any provider that accepts multipart FormData and returns JSON or
    // a 2xx works. Until an endpoint is configured it falls back to a simulated
    // confirmation so the preview keeps working. Setup lives in parts/footer.html.
    if (form) {
      var errorEl = modal.querySelector('[data-ds-modal-error]');

      function resolveEndpoint() {
        var key = (form.getAttribute('data-ds-access-key') || '').trim();
        var url = (form.getAttribute('data-ds-endpoint') || '').trim();
        if (url) return { url: url, key: key };            // explicit endpoint (Formspree/Getform/custom)
        if (key) return { url: 'https://api.web3forms.com/submit', key: key }; // Web3Forms via key only
        return null;                                        // nothing configured → demo mode
      }

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        if (errorEl) errorEl.hidden = true;

        var btn   = form.querySelector('button[type="submit"]');
        var label = btn ? btn.textContent : '';
        if (btn) { btn.disabled = true; btn.textContent = 'Sending…'; }

        function fail() {
          if (btn) { btn.disabled = false; btn.textContent = label; }
          if (errorEl) errorEl.hidden = false;
        }

        var target = resolveEndpoint();

        // Demo mode: no lead endpoint configured yet — show confirmation without sending.
        if (!target) {
          if (window.console && console.info) {
            console.info('[DSScheduleModal] Demo mode — no lead endpoint configured. ' +
              'Add data-ds-access-key (Web3Forms) or data-ds-endpoint on the form to deliver leads.');
          }
          setTimeout(showSuccess, 650);
          return;
        }

        var data = new FormData(form);
        if (target.key && !data.get('access_key')) data.append('access_key', target.key);

        fetch(target.url, {
          method: 'POST',
          headers: { 'Accept': 'application/json' },
          body: data
        }).then(function (res) {
          var ok = res.ok;
          return res.json().then(
            function (json) { return { ok: ok, json: json }; },
            function ()     { return { ok: ok, json: null }; }
          );
        }).then(function (r) {
          // Success = HTTP 2xx and the provider didn't explicitly report failure.
          var explicitFail = r.json && r.json.success === false;
          if (r.ok && !explicitFail) showSuccess();
          else fail();
        }).catch(fail);
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

/*
 * Generic AJAX handler for lightweight inline lead forms marked with
 * [data-ds-forms-request] (e.g. the New Patient Forms request). Uses the same
 * provider-agnostic contract as the modal: data-ds-access-key (Web3Forms) or
 * data-ds-endpoint (Formspree/Getform). Demo mode (confirm without sending)
 * until one is configured. Reveals [data-ds-forms-success] on success and
 * [data-ds-forms-error] on failure — both live inside the form.
 */
(function () {
  'use strict';

  function endpointFor(form) {
    var key = (form.getAttribute('data-ds-access-key') || '').trim();
    var url = (form.getAttribute('data-ds-endpoint') || '').trim();
    if (url) return { url: url, key: key };
    if (key) return { url: 'https://api.web3forms.com/submit', key: key };
    return null;
  }

  function initForms() {
    var forms = document.querySelectorAll('[data-ds-forms-request]');
    Array.prototype.forEach.call(forms, function (form) {
      var errorEl   = form.querySelector('[data-ds-forms-error]');
      var successEl = form.querySelector('[data-ds-forms-success]');

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        if (errorEl) errorEl.hidden = true;

        var btn   = form.querySelector('button[type="submit"]');
        var label = btn ? btn.textContent : '';
        if (btn) { btn.disabled = true; btn.textContent = 'Sending…'; }

        var src = form.querySelector('[data-ds-source]');
        if (src && !src.value) src.value = window.location.pathname + window.location.search;

        function done() {
          Array.prototype.forEach.call(form.children, function (child) {
            if (child !== successEl) child.hidden = true;
          });
          if (successEl) successEl.hidden = false;
        }
        function fail() {
          if (btn) { btn.disabled = false; btn.textContent = label; }
          if (errorEl) errorEl.hidden = false;
        }

        var target = endpointFor(form);
        if (!target) { setTimeout(done, 500); return; } // demo mode

        var data = new FormData(form);
        if (target.key && !data.get('access_key')) data.append('access_key', target.key);

        fetch(target.url, {
          method: 'POST',
          headers: { 'Accept': 'application/json' },
          body: data
        }).then(function (res) {
          var ok = res.ok;
          return res.json().then(
            function (json) { return { ok: ok, json: json }; },
            function ()     { return { ok: ok, json: null }; }
          );
        }).then(function (r) {
          var explicitFail = r.json && r.json.success === false;
          if (r.ok && !explicitFail) done();
          else fail();
        }).catch(fail);
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initForms);
  } else {
    initForms();
  }
})();
