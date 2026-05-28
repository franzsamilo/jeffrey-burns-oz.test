<?php
/**
 * Title: Restorative Care Hub
 * Slug: dreamsmile/restorative-care-hub
 * Categories: dreamsmile
 *
 * Hub page for /restorative-care/. Links to the restorative procedures
 * already covered by service-detail pages (bridges, crowns, fillings,
 * root canal, tooth extraction). Reuses the General Dentistry hub
 * structure: .ds-np-welcome + .ds-implants-nav + .ds-subpage-cta.
 */
defined( 'ABSPATH' ) || exit;
$office = ds_office_data();

$services = [
  [
    'href'  => '/dental-fillings/',
    'label' => 'Dental Fillings',
    'desc'  => 'Tooth-colored composite fillings that restore decayed teeth and disappear into your smile.',
    'icon'  => 'sparkle',
  ],
  [
    'href'  => '/dental-crowns/',
    'label' => 'Dental Crowns',
    'desc'  => 'Custom porcelain crowns that protect cracked, weakened, or restored teeth &mdash; built to last.',
    'icon'  => 'crown',
  ],
  [
    'href'  => '/dental-bridges/',
    'label' => 'Dental Bridges',
    'desc'  => 'Traditional and implant-supported bridges to replace one or more missing teeth.',
    'icon'  => 'bridge',
  ],
  [
    'href'  => '/root-canal/',
    'label' => 'Root Canal',
    'desc'  => 'Modern, virtually painless root canal therapy that saves the tooth and ends the pain.',
    'icon'  => 'canal',
  ],
  [
    'href'  => '/tooth-extraction/',
    'label' => 'Tooth Extraction',
    'desc'  => 'Comfortable, anxiety-aware extractions when a tooth can&rsquo;t be saved.',
    'icon'  => 'extract',
  ],
  [
    'href'  => '/dental-implants/',
    'label' => 'Dental Implants',
    'desc'  => 'Permanent tooth replacement &mdash; the most modern option for restoring a complete smile.',
    'icon'  => 'tooth',
  ],
];

$svg = [
  'sparkle' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3z"/><path d="M19 16l.7 2.1L22 19l-2.3.9L19 22l-.7-2.1L16 19l2.3-.9L19 16z"/></svg>',
  'crown'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18h18M3 18l2-9 4 4 3-6 3 6 4-4 2 9"/></svg>',
  'bridge'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 14h18M5 14v6M19 14v6M9 14v-2a3 3 0 0 1 6 0v2"/><path d="M9 14v-2a3 3 0 0 0-3-3H5v5"/><path d="M15 14v-2a3 3 0 0 1 3-3h1v5"/></svg>',
  'canal'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/><path d="M12 8v8"/></svg>',
  'extract' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/><path d="M16 6l4 4M20 6l-4 4"/></svg>',
  'tooth'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/></svg>',
];
?>
<!-- wp:html -->
<section class="ds-np-welcome">
  <div class="ds-wrap">
    <div class="ds-np-welcome__head ds-reveal">
      <span class="ds-label">RESTORATIVE CARE</span>
      <h2 class="ds-np-welcome__title">When a tooth needs more than a check-up &mdash; <span class="ds-italic">we restore it</span>.</h2>
      <p class="ds-np-welcome__sub">Restorative dentistry is what we do after decay, damage, or tooth loss has happened. Fillings, crowns, bridges, root canals, extractions, and implants &mdash; all the ways we put your bite back together. All under one roof, planned by one doctor.</p>
    </div>
    <div class="ds-np-welcome__pillars ds-reveal">
      <div class="ds-np-pillar"><strong>30+ Years</strong><span>of restorative dentistry experience</span></div>
      <div class="ds-np-pillar"><strong>One Office</strong><span>everything coordinated, nothing referred out</span></div>
      <div class="ds-np-pillar"><strong>Implant-Aware</strong><span>every restoration done with future options in mind</span></div>
    </div>
  </div>
</section>

<section class="ds-implants-nav ds-implants-nav--wide">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <span class="ds-label">EXPLORE OUR RESTORATIVE SERVICES</span>
      <h2 class="ds-implants-nav__title">From a single filling to a full-arch restoration.</h2>
      <p class="ds-implants-nav__sub">Click through to learn more, or call <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a> to talk through your specific case.</p>
    </div>
    <div class="ds-implants-nav__grid">
      <?php foreach ( $services as $s ) : ?>
        <a href="<?php echo esc_url( $s['href'] ); ?>" class="ds-implants-nav-card ds-reveal">
          <span class="ds-implants-nav-card__icon"><?php echo $svg[ $s['icon'] ]; ?></span>
          <h3 class="ds-implants-nav-card__title"><?php echo esc_html( $s['label'] ); ?></h3>
          <p class="ds-implants-nav-card__desc"><?php echo $s['desc']; ?></p>
          <span class="ds-implants-nav-card__cta">
            Learn More
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="ds-subpage-cta">
  <div class="ds-wrap">
    <div class="ds-subpage-cta__inner ds-reveal">
      <span class="ds-label">NOT SURE WHAT YOU NEED?</span>
      <h2 class="ds-subpage-cta__title">Schedule a restorative consultation.</h2>
      <p class="ds-subpage-cta__sub">Free consultation with full assessment. We&rsquo;ll walk through every realistic option for your case &mdash; with no pressure to commit.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="#quiz" data-ds-schedule class="ds-btn ds-btn--solid">Schedule a Free Consult</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
