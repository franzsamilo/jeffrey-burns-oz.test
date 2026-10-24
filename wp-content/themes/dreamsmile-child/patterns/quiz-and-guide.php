<?php
/**
 * Title: Quiz & Guide
 * Slug: dreamsmile/quiz-and-guide
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$quiz_card_img = get_stylesheet_directory_uri() . '/assets/arrange/guide-cover.webp';
$tools         = ds_lead_tools();
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

          <?php // This card is the first question of the agency's eligibility survey
                // (ds_lead_tools()). Next opens the survey with the answer
                // pre-selected, which only works while each value is the survey
                // option's exact text — straight apostrophes included. ?>
          <fieldset class="ds-quiz-card__options">
            <legend class="ds-sr-only">What best describes your current condition?</legend>
            <label class="ds-quiz-card__option">
              <input type="radio" name="ds-quiz" value="I have all of my teeth" class="ds-quiz-radio" />
              <span class="ds-quiz-card__option-label">I have all of my teeth</span>
            </label>
            <label class="ds-quiz-card__option">
              <input type="radio" name="ds-quiz" value="I'm missing one tooth" class="ds-quiz-radio" />
              <span class="ds-quiz-card__option-label">I&rsquo;m missing one tooth</span>
            </label>
            <label class="ds-quiz-card__option">
              <input type="radio" name="ds-quiz" value="I'm missing multiple teeth" class="ds-quiz-radio" />
              <span class="ds-quiz-card__option-label">I&rsquo;m missing multiple teeth</span>
            </label>
            <label class="ds-quiz-card__option">
              <input type="radio" name="ds-quiz" value="I'm missing all of my teeth" class="ds-quiz-radio" />
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
           placeholder. Swapped off quiz-card.webp, which had a "Download Now" button
           baked into the artwork — an image that reads as a button but isn't. The
           GET THE FREE GUIDE control in the aside is the only real CTA here. -->
      <figure class="ds-quiz-ipad" aria-hidden="false">
        <img src="<?php echo esc_url( $quiz_card_img ); ?>" alt="The Ultimate Guide to Dental Implants &mdash; free pricing and information guide from Dr. Jeffrey S. Burns" loading="lazy" />
      </figure>

      <!-- RIGHT — Guide CTA -->
      <aside class="ds-guide-card">
        <span class="ds-guide-card__label">WANT TO LEARN MORE &mdash; INCLUDING SAME-DAY TEETH?</span>
        <p class="ds-guide-card__heading">Get the FREE Pricing &amp; Information Guide</p>
        <?php // The agency's funnel page delivers the guide. New tab, so the
              // visitor still has the site when they come back. ?>
        <a href="<?php echo esc_url( $tools['ebook_url'] ); ?>" target="_blank" rel="noopener" class="ds-btn ds-btn--outlined ds-btn--sm ds-guide-card__cta">GET THE FREE GUIDE</a>
        <p class="ds-guide-card__note">Free download &mdash; no cost, no obligation.</p>
      </aside>

    </div>
  </div>
</section>
<style>.ds-sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}</style>
<!-- /wp:html -->
