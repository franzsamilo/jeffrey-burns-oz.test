<?php
/**
 * Title: Implant FAQs
 * Slug: dreamsmile/implant-faqs
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;

$cats = [
  'all'       => 'All',
  'pain'      => 'Pain &amp; Comfort',
  'timing'    => 'Timing &amp; Healing',
  'cost'      => 'Cost &amp; Insurance',
  'candidacy' => 'Am I a Candidate?',
];

// FAQ data is shared with the FAQPage JSON-LD schema in functions.php.
$faqs = ds_faq_data();
?>
<!-- wp:html -->
<?php
ds_render_split_hero( [
  'label' => 'DENTAL IMPLANTS &middot; FAQS',
  'title' => 'Everything You Need to Know, <em>Answered.</em>',
  'sub'   => 'Real answers to the questions patients ask before choosing DreamSmile&trade; &mdash; pain, healing, cost, and more.',
  'alt'   => 'Dental implant FAQs — Dr. Burns answering patient questions',
  'bg'    => get_stylesheet_directory_uri() . '/assets/arrange/implant-faqs-hero.jpg',
  'ctas'  => [
    [ 'label' => 'Take the Implant Quiz', 'href' => '/#quiz' ],
    [ 'label' => 'Call (540) 740-8937',   'href' => 'tel:+15407408937', 'variant' => 'outlined-white' ],
  ],
] );
?>

<section class="ds-faq">
  <div class="ds-wrap">
    <div class="ds-faq__head ds-reveal">
      <span class="ds-label">FREQUENTLY ASKED</span>
      <h2 class="ds-faq__title">Questions, <span class="ds-italic">Answered.</span></h2>
    </div>

    <div class="ds-faq-cats ds-reveal" role="tablist">
      <?php foreach ( $cats as $key => $label ) : ?>
        <button type="button"
          class="ds-faq-cat<?php echo 'all' === $key ? ' is-active' : ''; ?>"
          data-ds-faq-cat="<?php echo esc_attr( $key ); ?>"
          aria-pressed="<?php echo 'all' === $key ? 'true' : 'false'; ?>">
          <?php echo $label; ?>
        </button>
      <?php endforeach; ?>
    </div>

    <div class="ds-faq__list">
      <?php foreach ( $faqs as $i => $f ) : ?>
        <details class="ds-faq-item ds-reveal" data-ds-faq-item="<?php echo esc_attr( $f[0] ); ?>"<?php echo $i === 0 ? ' open' : ''; ?>>
          <summary class="ds-faq-item__q">
            <span><?php echo $f[1]; ?></span>
            <span class="ds-faq-item__chev" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
            </span>
          </summary>
          <div class="ds-faq-item__a">
            <?php echo $f[2]; ?>
            <?php if ( ! empty( $f[3] ) ) : ?>
              <video
                class="ds-faq-item__video"
                src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/arrange/' . $f[3] ); ?>"
                preload="metadata"
                playsinline
                muted
                controls
                aria-label="<?php echo esc_attr( wp_strip_all_tags( $f[1] ) ); ?> — Dr. Burns explains"
              ></video>
            <?php endif; ?>
          </div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="ds-faq-help">
  <div class="ds-wrap">
    <div class="ds-faq-help__inner ds-reveal">
      <span class="ds-label">STILL HAVE QUESTIONS?</span>
      <h2 class="ds-faq-help__title">Call Dr. Burns directly.</h2>
      <p class="ds-faq-help__sub">Every DreamSmile&trade; patient gets Dr. Burns&rsquo; personal cell. Ask him anything &mdash; before, during, or after treatment.</p>
      <div class="ds-faq-help__ctas">
        <a href="tel:+15407408937" class="ds-btn ds-btn--solid">Call (540) 740-8937</a>
        <a href="/#quiz" class="ds-btn ds-btn--outlined-white">Take the Quiz</a>
      </div>
    </div>
  </div>
</section>

<?php ds_render_about_section(); ?>

<section class="ds-subpage-cta">
  <div class="ds-wrap">
    <div class="ds-subpage-cta__inner ds-reveal">
      <span class="ds-label">NEXT STEP</span>
      <h2 class="ds-subpage-cta__title">Ready to find out if you&rsquo;re a candidate?</h2>
      <p class="ds-subpage-cta__sub">Take the 30-second quiz &mdash; reviewed personally by Dr. Burns.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="/#quiz" class="ds-btn ds-btn--solid">Take the Implant Quiz</a>
        <a href="/implant-cost/" class="ds-btn ds-btn--outlined">See the Cost</a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
