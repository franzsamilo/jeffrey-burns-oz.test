<?php
/**
 * Title: Quiz & Guide
 * Slug: dreamsmile/quiz-and-guide
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$book = get_stylesheet_directory_uri() . '/assets/arrange/quiz-component-image.png';
?>
<!-- wp:html -->
<section class="ds-quiz-section" id="quiz">
  <div class="ds-quiz-section__bg" aria-hidden="true"></div>
  <div class="ds-wrap">
    <div class="ds-quiz-grid">

      <!-- LEFT — Book -->
      <aside class="ds-quiz-book ds-reveal">
        <div class="ds-quiz-book__chip">
          <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v14"/><path d="M5 10l7 7 7-7"/><path d="M5 21h14"/></svg>
          <span>FREE DOWNLOAD · 64 PAGES</span>
        </div>

        <span class="ds-quiz-book__label">THE COMPLETE HANDBOOK</span>
        <h3 class="ds-quiz-book__title">Everything You Need to Know About Dental Implants</h3>

        <div class="ds-quiz-book__media">
          <img src="<?php echo esc_url( $book ); ?>" alt="The Complete Handbook on Dental Implants — DreamSmile" loading="lazy" />
          <span class="ds-quiz-book__ribbon" aria-hidden="true">FREE</span>
        </div>

        <ul class="ds-quiz-book__bullets">
          <li>
            <span class="ds-quiz-book__tick" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
            </span>
            <span>Are <em>you</em> a candidate for implants?</span>
          </li>
          <li>
            <span class="ds-quiz-book__tick" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
            </span>
            <span>Real, turnkey pricing &mdash; no hidden fees</span>
          </li>
          <li>
            <span class="ds-quiz-book__tick" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
            </span>
            <span>The Burns Protocol, step by step</span>
          </li>
        </ul>

        <p class="ds-quiz-book__sub"><strong>30 years of Dr. Burns&rsquo; expertise</strong>, distilled into one reference &mdash; free to every DreamSmile patient.</p>
      </aside>

      <!-- CENTER — Quiz -->
      <div class="ds-quiz-card-wrap">
        <div class="ds-quiz-card ds-reveal" data-ds-quiz>
          <div class="ds-quiz-card__meta">
            <ol class="ds-quiz-card__steps" aria-label="Quiz progress">
              <li class="is-active"><span class="ds-sr-only">Step 1 of 4</span></li>
              <li aria-hidden="true"></li>
              <li aria-hidden="true"></li>
              <li aria-hidden="true"></li>
            </ol>
            <span class="ds-quiz-card__step-count">STEP 1 <span aria-hidden="true">/</span> 4</span>
          </div>

          <span class="ds-quiz-card__label">FIND OUT IF YOU&rsquo;RE A</span>
          <h3 class="ds-quiz-card__title">CANDIDATE FOR DENTAL IMPLANTS</h3>
          <p class="ds-quiz-card__subtitle">30-second quiz &middot; reviewed personally by Dr. Burns</p>
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
            <span class="ds-quiz-card__trust">
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
              <span>Private &middot; no email required</span>
            </span>
            <button type="button" class="ds-btn ds-btn--solid ds-btn--sm" data-ds-quiz-next>Next &rarr;</button>
          </div>
        </div>
      </div>

      <!-- RIGHT — Guide -->
      <aside class="ds-guide-card ds-reveal">
        <span class="ds-guide-card__badge">FREE GUIDE</span>

        <h3 class="ds-guide-card__heading">Pricing &amp; Information Guide</h3>
        <p class="ds-guide-card__sub">A transparent look at what a DreamSmile really costs &mdash; no sales pitch, no surprises.</p>

        <ul class="ds-guide-card__list">
          <li>
            <span class="ds-guide-card__tick" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
            </span>
            <span>Turnkey pricing for every treatment</span>
          </li>
          <li>
            <span class="ds-guide-card__tick" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
            </span>
            <span>Financing options explained</span>
          </li>
          <li>
            <span class="ds-guide-card__tick" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
            </span>
            <span>Silver / Gold / Platinum warranty tiers</span>
          </li>
          <li>
            <span class="ds-guide-card__tick" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
            </span>
            <span>What to expect on consult day</span>
          </li>
        </ul>

        <form class="ds-guide-card__form" action="#" method="post" data-ds-guide-form novalidate>
          <label for="ds-guide-email" class="ds-sr-only">Your email address</label>
          <input id="ds-guide-email" type="email" name="email" placeholder="you@email.com" autocomplete="email" required />
          <button type="submit" class="ds-btn ds-btn--solid ds-btn--sm">Get the Guide</button>
        </form>

        <ul class="ds-guide-card__trust" aria-label="Guide delivery assurance">
          <li>
            <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg>
            <span>Instant PDF</span>
          </li>
          <li>
            <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <span>No spam, ever</span>
          </li>
          <li>
            <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
            <span>Unsubscribe anytime</span>
          </li>
        </ul>
      </aside>

    </div>
  </div>
</section>
<style>.ds-sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}</style>
<!-- /wp:html -->
