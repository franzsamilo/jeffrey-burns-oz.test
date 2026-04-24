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

$faqs = [
  [ 'pain',      'Is the procedure painful?',       'Most patients are surprised at how comfortable the procedure is. With our on-staff anesthesiologist and modern techniques, you&rsquo;ll be relaxed and pain-free throughout. Mild soreness in the days after is normal and easily managed.' ],
  [ 'timing',    'How long do implants last?',      'With proper care, dental implants are designed to last a lifetime. Our DreamSmile implants come with industry-leading warranties &mdash; up to lifetime coverage on the implant itself.' ],
  [ 'timing',    'What is the healing time?',       'Initial healing takes 1&ndash;2 weeks for soft tissue, with full integration of the implant into the bone taking 3&ndash;6 months. We&rsquo;ll provide a temporary smile so you&rsquo;re never without teeth during healing.' ],
  [ 'candidacy', 'What if I smoke?',                'Smoking can affect implant success and healing. We&rsquo;ll discuss this with you in your consultation and may recommend stopping for a period before and after surgery to ensure the best outcome.' ],
  [ 'candidacy', 'Do implants look natural?',       'Absolutely. Each DreamSmile is custom-designed to match your face, smile, and personality. Most people can&rsquo;t tell the difference between an implant and a natural tooth.' ],
  [ 'cost',      'Does insurance help with cost?',  'Many insurance plans cover part of the cost. We work directly with most major providers and offer flexible financing through Cherry Credit and Care Credit to make your DreamSmile affordable.' ],
  [ 'candidacy', 'Am I a candidate with bone loss?','Most patients are candidates. Dr. Burns&rsquo; 3D imaging and bone-grafting techniques open up options many other offices can&rsquo;t offer &mdash; even for patients who&rsquo;ve been told &ldquo;no&rdquo; elsewhere.' ],
  [ 'cost',      'Is there a warranty?',            'Yes &mdash; every DreamSmile is backed by our Silver, Gold, or Platinum warranty. The Platinum tier covers your teeth for life.' ],
];
?>
<!-- wp:html -->
<section class="ds-subhero ds-subhero--compact">
  <div class="ds-wrap ds-subhero__inner">
    <span class="ds-label">DENTAL IMPLANTS &middot; FAQS</span>
    <h1 class="ds-subhero__title">Everything You Need to Know, <span class="ds-italic">Answered.</span></h1>
    <p class="ds-subhero__sub">Real answers to the questions patients ask before choosing DreamSmile &mdash; pain, healing, cost, and more.</p>
    <div class="ds-subhero__ctas">
      <a href="/#quiz" class="ds-btn ds-btn--solid">Take the Implant Quiz</a>
      <a href="tel:+15407408937" class="ds-btn ds-btn--outlined">Call (540) 740-8937</a>
    </div>
  </div>
</section>

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
          <div class="ds-faq-item__a"><?php echo $f[2]; ?></div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="ds-faq-help">
  <div class="ds-wrap">
    <div class="ds-faq-help__inner ds-reveal">
      <span class="ds-label">STILL HAVE QUESTIONS?</span>
      <h2 class="ds-faq-help__title">Text Dr. Burns directly.</h2>
      <p class="ds-faq-help__sub">Every DreamSmile patient gets Dr. Burns&rsquo; personal cell. Ask him anything &mdash; before, during, or after treatment.</p>
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
