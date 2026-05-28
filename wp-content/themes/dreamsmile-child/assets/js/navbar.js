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

  // Services dropdown — keyboard + touch support (CSS handles hover)
  var dropdowns = nav.querySelectorAll('[data-ds-dropdown]');
  Array.prototype.forEach.call(dropdowns, function (dd) {
    var trigger = dd.querySelector('[data-ds-dropdown-trigger]');
    if (!trigger) { return; }

    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      var open = dd.getAttribute('data-open') === 'true';
      dd.setAttribute('data-open', open ? 'false' : 'true');
      trigger.setAttribute('aria-expanded', open ? 'false' : 'true');
    });
  });

  // Close any open dropdown when clicking outside
  document.addEventListener('click', function (e) {
    Array.prototype.forEach.call(dropdowns, function (dd) {
      if (!dd.contains(e.target)) {
        dd.setAttribute('data-open', 'false');
        var t = dd.querySelector('[data-ds-dropdown-trigger]');
        if (t) { t.setAttribute('aria-expanded', 'false'); }
      }
    });
  });

  // ESC closes the dropdown
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') { return; }
    Array.prototype.forEach.call(dropdowns, function (dd) {
      dd.setAttribute('data-open', 'false');
      var t = dd.querySelector('[data-ds-dropdown-trigger]');
      if (t) { t.setAttribute('aria-expanded', 'false'); t.focus(); }
    });
  });

  // Mobile accordion (Services / Resources groups inside the mobile drawer)
  var mobileAccs = nav.querySelectorAll('[data-ds-mobile-acc]');
  Array.prototype.forEach.call(mobileAccs, function (acc) {
    var trigger = acc.querySelector('[data-ds-mobile-acc-trigger]');
    var panel = acc.querySelector('[data-ds-mobile-acc-panel]');
    if (!trigger || !panel) { return; }
    trigger.addEventListener('click', function () {
      var open = trigger.getAttribute('aria-expanded') === 'true';
      trigger.setAttribute('aria-expanded', open ? 'false' : 'true');
      panel.hidden = open;
    });
  });
})();
