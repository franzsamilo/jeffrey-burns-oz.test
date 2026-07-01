<?php
/**
 * Title: Implants FAQ
 * Slug: dreamsmile/implants-faq
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;

$faqs = [
  [ 'Is the procedure painful?', 'No. Our on-staff anesthesiologist ensures complete comfort throughout. Most patients say it was far easier than they expected.' ],
  [ 'How long do implants last?', 'Properly cared for dental implants are designed to last a lifetime, and they&rsquo;re backed by the DreamSmile&trade; Warranty.' ],
  [ 'Am I a candidate if I have bone loss?', 'Most patients are candidates. Dr. Burns&rsquo; 3D imaging and bone-grafting techniques open up options many other offices can&rsquo;t offer.' ],
  [ 'How long will treatment take?', 'Timelines vary by case. Many of our patients walk out the same day with a brand-new smile.' ],
];
?>
<!-- wp:html -->
<section class="ds-faq">
  <div class="ds-wrap">
    <div class="ds-faq__head ds-reveal">
      <span class="ds-label">FREQUENTLY ASKED</span>
      <h2 class="ds-faq__title">Questions, Answered.</h2>
    </div>

    <div class="ds-faq__list">
      <?php foreach ( $faqs as $i => $f ) : ?>
        <details class="ds-faq-item ds-reveal" <?php echo $i === 0 ? 'open' : ''; ?>>
          <summary class="ds-faq-item__q">
            <span><?php echo $f[0]; ?></span>
            <span class="ds-faq-item__chev" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="ds-faq-item__a"><?php echo $f[1]; ?></div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
