<?php
/**
 * Title: Implants Benefits
 * Slug: dreamsmile/implants-benefits
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;

$icons = [
  'eat' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M6 3v6a2 2 0 002 2v10"/>
    <path d="M9 3v6"/>
    <path d="M11 3v6"/>
    <path d="M17 3v18"/>
    <path d="M17 3c-2 0-3.5 2-3.5 5s1.5 4 3.5 4"/></svg>',

  'smile' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <circle cx="12" cy="12" r="9"/>
    <path d="M8 14c1 1.5 2.4 2.5 4 2.5s3-.9 4-2.5"/>
    <circle cx="9" cy="10" r="0.6" fill="currentColor"/>
    <circle cx="15" cy="10" r="0.6" fill="currentColor"/></svg>',

  'bone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M17 10.5c.7-.5 1-1.3 1-2 0-1.4-1.1-2.5-2.5-2.5-.9 0-1.7.5-2.1 1.2l-6.9 7C6 14.7 5 15.4 5 16.5 5 17.9 6.1 19 7.5 19c.9 0 1.7-.5 2.1-1.2"/>
    <path d="M9.6 17.8l6.8-6.8"/>
    <path d="M7 5c-1.4 0-2.5 1.1-2.5 2.5 0 .9.5 1.7 1.2 2.1"/>
    <path d="M19 15c1.4 0 2.5 1.1 2.5 2.5S20.4 20 19 20c-.9 0-1.7-.5-2.1-1.2"/></svg>',

  'shield' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M12 3l8 3v5c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-3z"/>
    <path d="M9 12l2 2 4-4"/></svg>',
];

$items = [
  [ 'eat',    'Eat Your Favorite Foods', 'Steak, apples, corn on the cob &mdash; anything you love. Implants restore near-natural bite force with none of the wobble of dentures.',       '90%+ bite force restored' ],
  [ 'smile',  'Smile With Confidence',   'Dental implants look, feel, and function like the teeth you were born with &mdash; indistinguishable, even up close.',                               'Natural look &amp; feel' ],
  [ 'bone',   'Prevent Bone Loss',       'Unlike bridges or dentures, implants fuse with your jawbone. They preserve bone structure and keep your face looking youthful.',                       'Stops jawbone resorption' ],
  [ 'shield', 'Long-Term Durability',    'Properly cared-for implants are designed to last a lifetime. Every DreamSmile is backed by our Silver, Gold, or Platinum warranty.',                   'Lifetime Warranty available' ],
];
?>
<!-- wp:html -->
<section class="ds-benefits">
  <div class="ds-wrap">
    <div class="ds-benefits__head ds-reveal">
      <span class="ds-label">WHY DENTAL IMPLANTS</span>
      <h2 class="ds-benefits__title">The Gold Standard <span class="ds-italic">for Tooth Replacement.</span></h2>
      <p class="ds-benefits__sub">Four reasons dental implants have quietly become the way patients get their lives &mdash; and their smiles &mdash; back.</p>
    </div>

    <div class="ds-benefits__grid">
      <?php foreach ( $items as $i => $item ) : ?>
        <div class="ds-benefit-card ds-reveal" style="animation-delay: <?php echo ( $i * 70 ); ?>ms">
          <div class="ds-benefit-card__top">
            <div class="ds-benefit-card__icon"><?php echo $icons[ $item[0] ]; ?></div>
            <span class="ds-benefit-card__index">0<?php echo ( $i + 1 ); ?></span>
          </div>
          <h3 class="ds-benefit-card__title"><?php echo $item[1]; ?></h3>
          <p class="ds-benefit-card__desc"><?php echo $item[2]; ?></p>
          <div class="ds-benefit-card__stat">
            <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            <span><?php echo $item[3]; ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
