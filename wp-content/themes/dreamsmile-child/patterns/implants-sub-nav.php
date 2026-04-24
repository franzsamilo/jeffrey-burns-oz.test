<?php
/**
 * Title: Implants Sub-Navigation
 * Slug: dreamsmile/implants-sub-nav
 * Categories: dreamsmile
 *
 * 3-card hub on /dental-implants/ linking to Cost, Procedures, FAQs pages.
 */
defined( 'ABSPATH' ) || exit;

$cards = [
  [
    'href'  => '/implant-cost/',
    'label' => 'Cost & Financing',
    'desc'  => 'Transparent pricing, flexible financing, and the factors that shape your total.',
    'cta'   => 'Explore Costs',
    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9 8.5h4.5a2 2 0 0 1 0 4H9.5a2 2 0 0 0 0 4H14M12 6.5v11"/></svg>',
  ],
  [
    'href'  => '/implant-procedures/',
    'label' => 'Procedures',
    'desc'  => 'Single implants, All-on-4, bridges, dentures, and more &mdash; find the right fit.',
    'cta'   => 'See Procedures',
    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/></svg>',
  ],
  [
    'href'  => '/implant-faqs/',
    'label' => 'FAQs',
    'desc'  => 'Answers to pain, healing time, longevity, insurance, and everything else.',
    'cta'   => 'Read FAQs',
    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9.5 9.5a2.5 2.5 0 0 1 5 0c0 1.5-2.5 2-2.5 3.5M12 17.5v0"/></svg>',
  ],
];
?>
<!-- wp:html -->
<section class="ds-implants-nav">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <span class="ds-label">LEARN MORE</span>
      <h2 class="ds-implants-nav__title">Explore Dental Implants</h2>
      <p class="ds-implants-nav__sub">Deep-dive pages with everything you need to decide with confidence.</p>
    </div>
    <div class="ds-implants-nav__grid">
      <?php foreach ( $cards as $c ) : ?>
        <a href="<?php echo esc_url( $c['href'] ); ?>" class="ds-implants-nav-card ds-reveal">
          <span class="ds-implants-nav-card__icon"><?php echo $c['icon']; ?></span>
          <h3 class="ds-implants-nav-card__title"><?php echo $c['label']; ?></h3>
          <p class="ds-implants-nav-card__desc"><?php echo $c['desc']; ?></p>
          <span class="ds-implants-nav-card__cta">
            <?php echo $c['cta']; ?>
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
