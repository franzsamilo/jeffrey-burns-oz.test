<?php
/**
 * Title: Quiz & Guide
 * Slug: dreamsmile/quiz-and-guide
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$quiz_card_img = get_stylesheet_directory_uri() . '/assets/arrange/quiz-card.png';
?>
<!-- wp:html -->
<section class="ds-quiz-section" id="quiz">
  <div class="ds-quiz-section__bg" aria-hidden="true"></div>
  <div class="ds-wrap">
    <div class="ds-quiz-grid">

      <!-- LEFT — Quiz card -->
      <div class="ds-quiz-card-wrap">
        <div class="ds-quiz-card ds-reveal" data-ds-quiz>
          <span class="ds-quiz-card__label">FIND OUT IF YOU&rsquo;RE A</span>
          <h3 class="ds-quiz-card__title">CANDIDATE FOR DENTAL IMPLANTS</h3>
          <p class="ds-quiz-card__subtitle">Take this 30 second quiz</p>
          <p class="ds-quiz-card__question">What best describes your current condition?</p>

          <fieldset class="ds-quiz-card__options">
            <legend class="ds-sr-only">What best describes your current condition?</legend>
            <label class="ds-quiz-card__option">
              <input type="radio" name="ds-quiz" value="all" class="ds-quiz-radio" />
              <span class="ds-quiz-card__option-label">I have all of my teeth</span>
            </label>
            <label class="ds-quiz-card__option">
              <input type="radio" name="ds-quiz" value="one" class="ds-quiz-radio" />
              <span class="ds-quiz-card__option-label">I&rsquo;m missing one tooth</span>
            </label>
            <label class="ds-quiz-card__option">
              <input type="radio" name="ds-quiz" value="multiple" class="ds-quiz-radio" />
              <span class="ds-quiz-card__option-label">I&rsquo;m missing multiple teeth</span>
            </label>
            <label class="ds-quiz-card__option">
              <input type="radio" name="ds-quiz" value="all-missing" class="ds-quiz-radio" />
              <span class="ds-quiz-card__option-label">I&rsquo;m missing all of my teeth</span>
            </label>
          </fieldset>

          <div class="ds-quiz-card__next-wrap">
            <span class="ds-quiz-card__rule" aria-hidden="true"></span>
            <button type="button" class="ds-btn ds-btn--solid ds-btn--sm" data-ds-quiz-next>Next &rarr;</button>
          </div>
        </div>
      </div>

      <!-- CENTER — iPad / book preview -->
      <figure class="ds-quiz-ipad ds-reveal" aria-hidden="false">
        <img src="<?php echo esc_url( $quiz_card_img ); ?>" alt="The Complete Handbook on Dental Implants &mdash; free downloadable guide" loading="lazy" />
      </figure>

      <!-- RIGHT — Guide CTA -->
      <aside class="ds-guide-card ds-reveal">
        <span class="ds-guide-card__label">WANT TO LEARN MORE ABOUT DENTAL IMPLANTS?</span>
        <p class="ds-guide-card__heading">Download the FREE Pricing &amp; Information Guide</p>
        <a href="#guide" class="ds-btn ds-btn--outlined ds-btn--sm ds-guide-card__cta">GET THE FREE GUIDE</a>
      </aside>

    </div>
  </div>
</section>
<style>.ds-sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}</style>
<!-- /wp:html -->
