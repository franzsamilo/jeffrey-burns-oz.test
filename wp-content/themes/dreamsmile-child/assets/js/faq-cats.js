/**
 * DreamSmile — FAQ category tabs.
 * Filters .ds-faq-item elements by data-ds-faq-item, toggled by .ds-faq-cat chips.
 */
(function () {
  'use strict';

  var cats = document.querySelectorAll('.ds-faq-cat');
  var items = document.querySelectorAll('.ds-faq-item[data-ds-faq-item]');
  if (!cats.length || !items.length) return;

  function activate(cat) {
    cats.forEach(function (c) {
      var on = c === cat;
      c.classList.toggle('is-active', on);
      c.setAttribute('aria-pressed', on ? 'true' : 'false');
    });

    var key = cat.getAttribute('data-ds-faq-cat');
    var first = null;

    items.forEach(function (item) {
      var match = key === 'all' || item.getAttribute('data-ds-faq-item') === key;
      item.classList.toggle('is-hidden', !match);
      item.removeAttribute('open');
      if (match && !first) first = item;
    });

    if (first) first.setAttribute('open', '');
  }

  cats.forEach(function (c) {
    c.addEventListener('click', function () { activate(c); });
  });
})();
