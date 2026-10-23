/**
 * Eligibility survey modal (GoHighLevel).
 *
 * Opened by the homepage quiz card's Next button and by every quiz-style CTA
 * ([data-ds-survey]: "Take the Quiz", "See if you're eligible", ...). The
 * "Schedule" CTAs keep the schedule modal.
 *
 * The survey iframe is only created on first open, so the agency's widget
 * and its tracking load for visitors who start the quiz, not on every page
 * view. GHL's form_embed.js (iframe resizing, UTM pass-through, cookie
 * consent) looks for survey iframes once, when it runs, so it is loaded
 * straight after the iframe is added.
 */
(function () {
  'use strict';

  // The survey's query key for its first question. GHL pre-selects the option
  // whose text matches the value exactly, so the quiz card's values must stay
  // word-for-word copies of the survey's options.
  var ANSWER_KEY = 'describes_current_condition';

  function init() {
    var modal = document.querySelector('[data-ds-survey-modal]');

    window.DSSurvey = { open: open, close: close };

    if (!modal) return;

    var slot = modal.querySelector('[data-ds-survey-frame]');
    var iframe = null;
    var returnFocus = null;

    function surveyUrl(answer) {
      var url = modal.getAttribute('data-ds-survey-src');
      return answer ? url + '?' + ANSWER_KEY + '=' + encodeURIComponent(answer) : url;
    }

    function mount(answer) {
      if (iframe) {
        // A new answer from the quiz card restarts the survey with it selected;
        // reopening without one keeps the visitor's place.
        if (answer && iframe.getAttribute('src') !== surveyUrl(answer)) {
          iframe.setAttribute('src', surveyUrl(answer));
        }
        return;
      }

      // Same attributes as the agency's embed code.
      iframe = document.createElement('iframe');
      iframe.id = modal.getAttribute('data-ds-survey-id');
      iframe.src = surveyUrl(answer);
      iframe.title = 'Dental implant eligibility quiz';
      iframe.setAttribute('scrolling', 'no');
      iframe.setAttribute('data-cookie-consent', 'true');
      iframe.setAttribute('data-cookie-consent-provider', 'auto');
      iframe.addEventListener('load', function () { slot.classList.add('is-loaded'); });
      slot.appendChild(iframe);

      var script = document.createElement('script');
      script.src = modal.getAttribute('data-ds-survey-js');
      document.body.appendChild(script);
    }

    function open(answer) {
      mount(typeof answer === 'string' ? answer : '');
      returnFocus = document.activeElement;
      modal.removeAttribute('hidden');
      requestAnimationFrame(function () { modal.classList.add('is-open'); });
      document.documentElement.style.overflow = 'hidden';
      var closeBtn = modal.querySelector('.ds-modal__close');
      if (closeBtn) setTimeout(function () { closeBtn.focus(); }, 120);
    }

    function close() {
      modal.classList.remove('is-open');
      document.documentElement.style.overflow = '';
      setTimeout(function () { modal.setAttribute('hidden', ''); }, 260);
      if (returnFocus && typeof returnFocus.focus === 'function') returnFocus.focus();
    }

    document.addEventListener('click', function (e) {
      var trigger = e.target.closest('[data-ds-survey]');
      if (!trigger) return;
      e.preventDefault();
      open();
    }, true);

    modal.addEventListener('click', function (e) {
      if (e.target.closest('[data-ds-survey-close]')) {
        e.preventDefault();
        close();
      }
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal.classList.contains('is-open')) close();
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

/*
 * Smile Reveal (AI smile preview) — the vendor's own embed script. Copies
 * name / email / phone from this page's URL into the embed, so a visitor who
 * arrives from a campaign link doesn't have to type them again.
 */
(function () {
  var parentParams = new URLSearchParams(window.location.search);
  document.querySelectorAll('iframe[data-sr-embed]').forEach(function (iframe) {
    try {
      var url = new URL(iframe.src);
      ['name', 'email', 'phone'].forEach(function (key) {
        var v = parentParams.get(key);
        if (v && !/[{}]/.test(v)) url.searchParams.set(key, v);
      });
      var next = url.toString();
      if (next !== iframe.src) iframe.src = next;
    } catch (e) {}
  });
})();
