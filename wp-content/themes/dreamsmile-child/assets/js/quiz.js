(function () {
  'use strict';

  var quiz = document.querySelector('[data-ds-quiz]');
  if (!quiz) { return; }

  var radios = quiz.querySelectorAll('input[type="radio"]');
  var options = quiz.querySelectorAll('.ds-quiz-card__option');
  var nextBtn = quiz.querySelector('[data-ds-quiz-next]');

  radios.forEach(function (radio) {
    radio.addEventListener('change', function () {
      options.forEach(function (opt) { opt.classList.remove('ds-quiz-card__option--checked'); });
      var parent = radio.closest('.ds-quiz-card__option');
      if (parent) { parent.classList.add('ds-quiz-card__option--checked'); }
    });
  });

  if (nextBtn) {
    nextBtn.addEventListener('click', function () {
      var selected = quiz.querySelector('input[type="radio"]:checked');
      if (!selected) {
        var firstLabel = quiz.querySelector('.ds-quiz-card__option');
        if (firstLabel) {
          firstLabel.animate(
            [{ transform: 'translateX(-4px)' }, { transform: 'translateX(4px)' }, { transform: 'translateX(0)' }],
            { duration: 220, iterations: 2 }
          );
        }
        return;
      }
      window.location.href = '#guide';
    });
  }
})();
