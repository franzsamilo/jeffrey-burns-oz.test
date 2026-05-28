<?php
/**
 * Title: Resources Hub
 * Slug: dreamsmile/resources-hub
 * Categories: dreamsmile
 *
 * Hub page for /resources/. Drop-down landing for patient-facing
 * resources (forms, financing, education). Reuses .ds-np-welcome,
 * .ds-implants-nav, .ds-subpage-cta.
 */
defined( 'ABSPATH' ) || exit;
$office = ds_office_data();

$services = [
  [
    'href'  => '/new-patients/',
    'label' => 'New Patient Forms',
    'desc'  => 'Everything you need to fill out before your first visit &mdash; or send in advance to save time at check-in.',
    'icon'  => 'book',
  ],
  [
    'href'  => '/financing/',
    'label' => 'Financing &amp; Insurance',
    'desc'  => 'Most major insurance accepted. Cherry, CareCredit, and Sunbit financing available. Turnkey pricing &mdash; no surprises.',
    'icon'  => 'wallet',
  ],
  [
    'href'  => '/patient-education/',
    'label' => 'Patient Education',
    'desc'  => 'Plain-English articles on dental procedures, recovery, and what to expect &mdash; written for patients.',
    'icon'  => 'leaf',
  ],
];

$svg = [
  'book'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
  'wallet' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"/><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"/><path d="M18 12a2 2 0 0 0 0 4h4v-4Z"/></svg>',
  'leaf'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10z"/><path d="M2 21c0-3 1.85-5.36 5.08-6"/></svg>',
];
?>
<!-- wp:html -->
<section class="ds-np-welcome">
  <div class="ds-wrap">
    <div class="ds-np-welcome__head ds-reveal">
      <span class="ds-label">RESOURCES</span>
      <h2 class="ds-np-welcome__title">Helpful info <span class="ds-italic">before, during, and after</span> your visit.</h2>
      <p class="ds-np-welcome__sub">Forms, financing details, and patient-friendly articles &mdash; everything that doesn&rsquo;t fit on a treatment page but helps you make decisions confidently.</p>
    </div>
  </div>
</section>

<section class="ds-implants-nav">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <span class="ds-label">PATIENT RESOURCES</span>
      <h2 class="ds-implants-nav__title">Three places to start.</h2>
    </div>
    <div class="ds-implants-nav__grid">
      <?php foreach ( $services as $s ) : ?>
        <a href="<?php echo esc_url( $s['href'] ); ?>" class="ds-implants-nav-card ds-reveal">
          <span class="ds-implants-nav-card__icon"><?php echo $svg[ $s['icon'] ]; ?></span>
          <h3 class="ds-implants-nav-card__title"><?php echo $s['label']; ?></h3>
          <p class="ds-implants-nav-card__desc"><?php echo $s['desc']; ?></p>
          <span class="ds-implants-nav-card__cta">
            Open
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
      <span class="ds-label">CAN&rsquo;T FIND WHAT YOU NEED?</span>
      <h2 class="ds-subpage-cta__title">Call us &mdash; we&rsquo;ll help.</h2>
      <p class="ds-subpage-cta__sub">A real receptionist answers every call &mdash; never a call center. We can email forms, walk through financing, or just answer questions.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--solid">Call <?php echo esc_html( $office['phone'] ); ?></a>
        <a href="/contact/" class="ds-btn ds-btn--outlined">Visit Contact Page</a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
