/**
 * Lead signal for Google Tag Manager (SEO tracker R14).
 *
 * The old site's form tool told GTM about every lead; these custom forms did
 * not, so form leads would have vanished from the practice's reports at
 * launch. Pushes a GA4-style `generate_lead` event once the server has
 * confirmed the lead was received. It carries which form and which page —
 * never anything the patient typed (this is a medical site).
 *
 * In GTM: Custom Event trigger on `generate_lead`, read `form_name` from the
 * data layer.
 */
window.dsTrackLead = function (formName) {
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push({
    event: 'generate_lead',
    form_name: formName,
    page_path: window.location.pathname
  });
};

/*
 * Every "Schedule" CTA opens the eligibility survey (lead-embeds.js).
 *
 * Until Nov 2026 these opened the theme's own "Book Your DreamSmile Visit"
 * form. The practice asked for every "Schedule Your Free Assessment" button to
 * lead to the agency's survey instead (embed code in ds_lead_tools()), so this
 * keeps catching the same buttons and links and hands them to window.DSSurvey.
 * On a town page, where the survey is shown inline, that scrolls to it.
 */
(function () {
  'use strict';

  function openSurvey() {
    if (window.DSSurvey && typeof window.DSSurvey.open === 'function') {
      window.DSSurvey.open();
      return true;
    }
    return false;
  }

  // Kept so older callers (quiz.js's fallback, inline scripts) still work.
  window.DSScheduleModal = {
    open: openSurvey,
    close: function () {
      if (window.DSSurvey && typeof window.DSSurvey.close === 'function') window.DSSurvey.close();
    }
  };

  // Every Schedule-style link across the site, including the old site's
  // gform=1 links and editor content that still links to #quiz.
  var triggers = [
    'a[href="#quiz"]',
    'a[href="/#quiz"]',
    'a[href$="#quiz"]',
    'a[href*="gform=1"]',
    '[data-ds-schedule]',
    '[data-modal-form]'
  ].join(',');

  document.addEventListener('click', function (e) {
    var trigger = e.target.closest(triggers);
    if (!trigger) return;
    // Clicks inside the quiz card belong to the quiz flow (quiz.js), and
    // [data-ds-survey] CTAs are already handled by lead-embeds.js.
    if (trigger.closest('[data-ds-quiz]') || trigger.closest('[data-ds-survey]')) return;
    if (openSurvey()) e.preventDefault();
  }, true);

  // Direct legacy links like /?gform=1&modal open the survey on arrival.
  function openFromUrl() {
    var q = window.location.search;
    if (q && (q.indexOf('gform=1') !== -1 || q.indexOf('modal') !== -1)) {
      setTimeout(openSurvey, 350);
    }
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', openFromUrl);
  } else {
    openFromUrl();
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
    return { url: '/wp-admin/admin-ajax.php', key: '' };
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

        var data = new FormData(form);
        if (target.key && !data.get('access_key')) data.append('access_key', target.key);
        if (!data.get('action')) data.append('action', 'ds_schedule_submit');

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
          if (r.ok && !explicitFail) {
            done();
            window.dsTrackLead(form.getAttribute('data-ds-form-name') || 'inline_form');
          } else {
            fail();
          }
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

/**
 * New Patient Forms picker.
 *
 * The four form names used to be <a href="#"> links pointing at PDFs the
 * office has never supplied — they scrolled the page to the top and did
 * nothing else. They are buttons now: picking one jumps to the request form
 * beside them, focuses it, and records which form was asked for so the
 * office knows what to send.
 */
(function () {
  function initFormPicker() {
    var picks = document.querySelectorAll('[data-ds-form-pick]');
    if (!picks.length) return;

    var form = document.querySelector('[data-ds-forms-request]');
    if (!form) return;

    var hidden = form.querySelector('[data-ds-forms-requested]');
    var firstField = form.querySelector('input[name="name"]');

    Array.prototype.forEach.call(picks, function (btn) {
      btn.addEventListener('click', function () {
        var label = btn.getAttribute('data-ds-form-label') || btn.textContent.trim();

        Array.prototype.forEach.call(picks, function (b) {
          b.classList.toggle('is-picked', b === btn);
        });
        if (hidden) hidden.value = label;

        form.scrollIntoView({ behavior: 'smooth', block: 'center' });
        if (firstField) {
          // Focus after the smooth scroll settles, or the browser jump-cuts it.
          setTimeout(function () { firstField.focus({ preventScroll: true }); }, 350);
        }
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFormPicker);
  } else {
    initFormPicker();
  }
})();
