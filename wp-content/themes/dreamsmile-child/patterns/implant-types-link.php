<?php
/**
 * Title: Implant Types Link
 * Slug: dreamsmile/implant-types-link
 * Categories: dreamsmile
 *
 * Brief description block + 5 cards on the /dental-implants/ hub linking
 * to each implant deep-dive subpage. Reuses .ds-implants-nav components
 * for visual consistency. Per the 2026-05-07 client docs spec: "Brief
 * description of Full Mouth Dental Implants and Implant Supported
 * Dentures and Link to these two dental implant pages".
 */
defined( 'ABSPATH' ) || exit;
$office = ds_office_data();

$cards = [
  [
    'href'  => '/single-dental-implants/',
    'label' => 'Single Implants',
    'desc'  => 'Replace one missing tooth without compromising the healthy ones around it.',
    'icon'  => 'tooth',
  ],
  [
    'href'  => '/implant-supported-bridges/',
    'label' => 'Implant-Supported Bridges',
    'desc'  => 'Two implants anchor a bridge for several missing teeth in a row &mdash; no grinding healthy teeth.',
    'icon'  => 'bridge',
  ],
  [
    'href'  => '/full-mouth-dental-implants/',
    'label' => 'Full Mouth Implants',
    'desc'  => 'A full arch of permanent teeth supported by 4&ndash;6 implants &mdash; the All-on-4 / All-on-6 approach.',
    'icon'  => 'gem',
  ],
  [
    'href'  => '/implant-supported-dentures/',
    'label' => 'Implant-Supported Dentures',
    'desc'  => 'Snap-in dentures anchored to 2&ndash;4 implants &mdash; no slipping, no adhesive.',
    'icon'  => 'magnet',
  ],
  [
    'href'  => '/how-dental-implants-work/',
    'label' => 'How Implants Work',
    'desc'  => 'A plain-English explanation of the science behind a smile that lasts a lifetime.',
    'icon'  => 'book',
  ],
];

$svg = [
  'tooth'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/></svg>',
  'bridge' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 14h18M5 14v6M19 14v6M9 14v-2a3 3 0 0 1 6 0v2"/><path d="M9 14v-2a3 3 0 0 0-3-3H5v5"/><path d="M15 14v-2a3 3 0 0 1 3-3h1v5"/></svg>',
  'gem'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3l6 18 6-18M3 9l9 12 9-12M3 9h18"/></svg>',
  'magnet' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 14V6a6 6 0 0 1 12 0v8"/><path d="M6 14v3a6 6 0 0 0 12 0v-3"/><path d="M6 14h4M14 14h4"/></svg>',
  'book'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
];
?>
<!-- wp:html -->
<section class="ds-implants-nav ds-implants-nav--wide">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <span class="ds-label">EXPLORE BY TYPE</span>
      <h2 class="ds-implants-nav__title">Different cases, different implant approaches.</h2>
      <p class="ds-implants-nav__sub">Single tooth missing, multiple in a row, or a full arch &mdash; the right kind of implant depends on your case. Below is a quick map of the deep-dive pages for each.</p>
    </div>
    <div class="ds-implants-nav__grid">
      <?php foreach ( $cards as $c ) : ?>
        <a href="<?php echo esc_url( $c['href'] ); ?>" class="ds-implants-nav-card ds-reveal">
          <span class="ds-implants-nav-card__icon"><?php echo $svg[ $c['icon'] ]; ?></span>
          <h3 class="ds-implants-nav-card__title"><?php echo $c['label']; ?></h3>
          <p class="ds-implants-nav-card__desc"><?php echo $c['desc']; ?></p>
          <span class="ds-implants-nav-card__cta">
            Learn More
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
