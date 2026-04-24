<?php
/**
 * Title: Implant Cost & Financing
 * Slug: dreamsmile/implant-cost
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$base       = get_stylesheet_directory_uri() . '/assets/arrange';
$visual_img = $base . '/dental-implants.png';

$factors = [
  [ 'tooth',    'Number of Implants Needed',  'Single, multiple, or full-arch &mdash; count drives cost.' ],
  [ 'crown',    'Type of Restoration',         'Crown, bridge, full-arch &mdash; material and design matter.' ],
  [ 'bone',     'Bone Grafting Needed',        'Some patients need a graft to support the implant.' ],
  [ 'sedation', 'Sedation Required',           'Local, IV, or general anesthesia changes the case fee.' ],
  [ 'complex',  'Complexity of the Case',      'Each case is unique &mdash; complex cases take more chair time.' ],
];

$offer = [
  [ 'cherry',     'Cherry Credit',          '0% APR financing options available for qualified patients.' ],
  [ 'carecredit', 'Care Credit',            'Flexible monthly payment plans to fit your budget.' ],
  [ 'insurance',  'Insurance Coordination', 'We work with most major insurance providers.' ],
];

$svg = [
  'tooth'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/></svg>',
  'crown'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18h18M3 18l2-9 4 4 3-6 3 6 4-4 2 9"/></svg>',
  'bone'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 3a2 2 0 0 1 2 2v1.5a1.5 1.5 0 0 0 3 0V5h4v1.5a1.5 1.5 0 0 0 3 0V5a2 2 0 1 1 2 2v3l-3.5 3.5L19 17a2 2 0 1 1-2 2v-1.5a1.5 1.5 0 0 0-3 0V19h-4v-1.5a1.5 1.5 0 0 0-3 0V19a2 2 0 1 1-2-2l3.5-3.5L5 10V7a2 2 0 0 1 0-4z"/></svg>',
  'sedation'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8 12h8M12 8v8"/></svg>',
  'complex'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M3 12h18M3 18h12"/></svg>',
  'cherry'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="17" r="4"/><circle cx="16" cy="17" r="4"/><path d="M8 13c0-4 4-8 8-9"/></svg>',
  'carecredit' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8.5c0-2.5-2-4.5-4.5-4.5C15 4 13.5 4.7 12 6c-1.5-1.3-3-2-4.5-2C5 4 3 6 3 8.5c0 7 9 12 9 12s9-5 9-12z"/></svg>',
  'insurance'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
  'arrow'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>',
];
?>
<!-- wp:html -->
<section class="ds-subhero ds-subhero--compact">
  <div class="ds-wrap ds-subhero__inner">
    <span class="ds-label">DENTAL IMPLANTS &middot; COST</span>
    <h1 class="ds-subhero__title">Dental Implant Costs, <span class="ds-italic">Made Clear.</span></h1>
    <p class="ds-subhero__sub">Transparent pricing, flexible financing, and the factors that shape your total &mdash; no surprises.</p>
    <div class="ds-subhero__ctas">
      <a href="/#quiz" class="ds-btn ds-btn--solid">Take the Implant Quiz</a>
      <a href="tel:+15407408937" class="ds-btn ds-btn--outlined">Call (540) 740-8937</a>
    </div>
  </div>
</section>

<section class="ds-cost-factors">
  <div class="ds-wrap">
    <div class="ds-cost-factors__head ds-reveal">
      <span class="ds-label">WHAT DETERMINES COST</span>
      <h2 class="ds-cost-factors__title">Five factors shape your <span class="ds-italic">total.</span></h2>
      <p class="ds-cost-factors__sub">Every implant plan is different. Here&rsquo;s what drives the number &mdash; so you know what you&rsquo;re paying for.</p>
    </div>
    <div class="ds-cost-factors__grid">
      <div class="ds-cost-factors__list">
        <?php foreach ( $factors as $i => $f ) : ?>
          <div class="ds-cost-factor-card ds-reveal" style="animation-delay: <?php echo ( $i * 60 ); ?>ms">
            <span class="ds-cost-factor-card__icon"><?php echo $svg[ $f[0] ]; ?></span>
            <div class="ds-cost-factor-card__body">
              <h3 class="ds-cost-factor-card__title"><?php echo $f[1]; ?></h3>
              <p class="ds-cost-factor-card__desc"><?php echo $f[2]; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="ds-cost-factors__media ds-reveal">
        <img src="<?php echo esc_url( $visual_img ); ?>" alt="Close-up of a dental implant&mdash;the components that factor into your total cost" loading="lazy" />
        <div class="ds-cost-factors__inline-cta">
          <h3>Want a personalized estimate?</h3>
          <p>Take the 30-second quiz for a realistic range based on your unique case.</p>
          <a href="/#quiz" class="ds-btn ds-btn--solid ds-btn--sm">
            <span>Take the Quiz</span>
            <?php echo $svg['arrow']; ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ds-cost-financing">
  <div class="ds-wrap">
    <div class="ds-cost-financing__head ds-reveal">
      <span class="ds-label">PAYMENT OPTIONS</span>
      <h2 class="ds-cost-financing__title">Implants cost <span class="ds-italic">less</span> than you think.</h2>
      <p class="ds-cost-financing__sub">We proudly offer flexible financing through the partners we trust &mdash; pick what works for you.</p>
    </div>
    <div class="ds-cost-financing__grid">
      <?php foreach ( $offer as $i => $o ) : ?>
        <div class="ds-cost-financing-card ds-reveal" style="animation-delay: <?php echo ( $i * 80 ); ?>ms">
          <span class="ds-cost-financing-card__icon"><?php echo $svg[ $o[0] ]; ?></span>
          <h3 class="ds-cost-financing-card__title"><?php echo $o[1]; ?></h3>
          <p class="ds-cost-financing-card__desc"><?php echo $o[2]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="ds-cost-financing__foot ds-reveal">
      <a href="tel:+15407408937" class="ds-btn ds-btn--solid">Call to Discuss Payment</a>
    </div>
  </div>
</section>

<?php ds_render_about_section(); ?>

<section class="ds-subpage-cta">
  <div class="ds-wrap">
    <div class="ds-subpage-cta__inner ds-reveal">
      <span class="ds-label">NEXT STEP</span>
      <h2 class="ds-subpage-cta__title">Not sure which procedure fits you?</h2>
      <p class="ds-subpage-cta__sub">See which implant option is right for your case &mdash; single, multiple, or full-arch.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="/implant-procedures/" class="ds-btn ds-btn--solid">See Procedures</a>
        <a href="/implant-faqs/" class="ds-btn ds-btn--outlined">Read FAQs</a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
