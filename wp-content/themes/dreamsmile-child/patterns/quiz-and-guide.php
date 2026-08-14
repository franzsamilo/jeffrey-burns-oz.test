<?php
/**
 * Title: Quiz & Guide
 * Slug: dreamsmile/quiz-and-guide
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$quiz_card_img = get_stylesheet_directory_uri() . '/assets/arrange/guide-cover.webp';
?>
<!-- wp:html -->
<section class="ds-quiz-section" id="quiz">
  <div class="ds-quiz-section__bg" aria-hidden="true"></div>
  <div class="ds-wrap">
    <div class="ds-quiz-grid">

      <!-- LEFT — Quiz card -->
      <div class="ds-quiz-card-wrap">
        <!-- Deliberately no ds-reveal here, nor on the iPad/guide siblings below:
             this row is the peek device — it is pulled up into the hero so part of
             it sits above the fold on load. Any entrance animation hides the very
             thing that is supposed to pull the visitor down. It paints as-is. -->
        <div class="ds-quiz-card" data-ds-quiz>
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
              <input type="radio" name="ds-quiz" value="some" class="ds-quiz-radio" />
              <span class="ds-quiz-card__option-label">I&rsquo;m missing one or more teeth</span>
            </label>
            <label class="ds-quiz-card__option">
              <input type="radio" name="ds-quiz" value="most" class="ds-quiz-radio" />
              <span class="ds-quiz-card__option-label">I&rsquo;m missing most of my teeth</span>
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

      <!-- CENTER — iPad / book preview.
           Resolved 2026-08-07: this is the real guide ("The Ultimate Guide to Dental
           Implants", Dr. Burns's own patient) from the client's Drive, not a stock
           placeholder. Swapped off quiz-card.png, which had a "Download Now" button
           baked into the artwork — an image that reads as a button but isn't. The
           GET THE FREE GUIDE control in the aside is the only real CTA here. -->
      <figure class="ds-quiz-ipad" aria-hidden="false">
        <img src="<?php echo esc_url( $quiz_card_img ); ?>" alt="The Ultimate Guide to Dental Implants &mdash; free pricing and information guide from Dr. Jeffrey S. Burns" loading="lazy" />
      </figure>

      <!-- RIGHT — Guide CTA -->
      <aside class="ds-guide-card">
        <span class="ds-guide-card__label">WANT TO LEARN MORE &mdash; INCLUDING SAME-DAY TEETH?</span>
        <p class="ds-guide-card__heading">Download the FREE Pricing &amp; Information Guide</p>
        <a href="#" data-ds-schedule class="ds-btn ds-btn--outlined ds-btn--sm ds-guide-card__cta">GET THE FREE GUIDE</a>
      </aside>

    </div>
  </div>
</section>
<style>.ds-sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}</style>
<!-- /wp:html -->
