<?php
/**
 * Title: General Dentistry Hub
 * Slug: dreamsmile/general-dentistry-hub
 * Categories: dreamsmile
 *
 * Hub page for /general-dentistry/. Reuses the established theme
 * components: .ds-implants-nav (3-card grid styling extended to 9
 * cards via a custom modifier), .ds-np-pillar (trust pillars), and
 * .ds-subpage-cta (dark final CTA).
 *
 * Children that should exist as separate WP pages (built as stubs in
 * Phase A; full content in Phase C):
 *   /dental-bridges/  /tooth-extraction/  /bone-grafting/  /full-dentures/
 *   /partial-dentures/  /pediatric-dentistry/  /dental-crowns/
 *   /wisdom-teeth-removal/  /root-canal/
 */
defined( 'ABSPATH' ) || exit;
$office = ds_office_data();

$services = [
  [
    'href'  => '/dental-bridges/',
    'label' => 'Dental Bridges',
    'desc'  => 'Traditional and implant-supported bridges to fill the gap left by missing teeth &mdash; restore your bite and your smile.',
    'icon'  => 'bridge',
  ],
  [
    'href'  => '/tooth-extraction/',
    'label' => 'Tooth Extraction',
    'desc'  => 'Comfortable, anxiety-aware extractions when a tooth can&rsquo;t be saved &mdash; with thoughtful next-step planning.',
    'icon'  => 'extract',
  ],
  [
    'href'  => '/bone-grafting/',
    'label' => 'Bone Grafting',
    'desc'  => 'Rebuilds the jaw foundation when bone loss has left implants out of reach. Often the &ldquo;yes&rdquo; when other offices said no.',
    'icon'  => 'bone',
  ],
  [
    'href'  => '/full-dentures/',
    'label' => 'Full Dentures',
    'desc'  => 'Conventional and implant-stabilized full dentures &mdash; a confident smile, comfortable chewing, no slipping.',
    'icon'  => 'denture',
  ],
  [
    'href'  => '/partial-dentures/',
    'label' => 'Partial Dentures',
    'desc'  => 'Discreet, well-fitted partials that fill gaps without compromising your existing healthy teeth.',
    'icon'  => 'partial',
  ],
  [
    'href'  => '/dental-crowns/',
    'label' => 'Dental Crowns',
    'desc'  => 'Tooth-colored crowns that protect cracked, weakened, or restored teeth &mdash; built to look and feel natural.',
    'icon'  => 'crown',
  ],
  [
    'href'  => '/root-canal/',
    'label' => 'Root Canal',
    'desc'  => 'Modern, virtually painless root canal therapy that saves the tooth &mdash; and ends the pain that brought you in.',
    'icon'  => 'canal',
  ],
  [
    'href'  => '/wisdom-teeth-removal/',
    'label' => 'Wisdom Teeth Removal',
    'desc'  => 'Safe, expertly planned wisdom-teeth removal with our on-staff anesthesiologist &mdash; comfort first, every time.',
    'icon'  => 'wisdom',
  ],
  [
    'href'  => '/pediatric-dentistry/',
    'label' => 'Pediatric Dental Care',
    'desc'  => 'A warm welcome for our youngest patients &mdash; cavity prevention, sealants, and gentle first visits that build lifelong habits.',
    'icon'  => 'kid',
  ],
];

$svg = [
  'bridge'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 14h18M5 14v6M19 14v6M9 14v-2a3 3 0 0 1 6 0v2"/><path d="M9 14v-2a3 3 0 0 0-3-3H5v5"/><path d="M15 14v-2a3 3 0 0 1 3-3h1v5"/></svg>',
  'extract' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/><path d="M16 6l4 4M20 6l-4 4"/></svg>',
  'bone'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 19a2.5 2.5 0 0 1-2.5-2.5 2.5 2.5 0 0 1 2-2.45L9 10l4.45-4.45A2.5 2.5 0 0 1 16 3a2.5 2.5 0 0 1 2.45 2 2.5 2.5 0 0 1 2 2.45A2.5 2.5 0 0 1 18.5 10l-4.5 4.5L9.55 19A2.5 2.5 0 0 1 7 21a2.5 2.5 0 0 1-2-2z"/></svg>',
  'denture' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9c0-2 2-4 4-4h8c2 0 4 2 4 4v3c0 4-3 8-8 8s-8-4-8-8V9z"/><path d="M8 11v2M12 11v2M16 11v2"/></svg>',
  'partial' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="9" width="4" height="6" rx="1"/><rect x="10" y="9" width="4" height="6" rx="1"/><rect x="16" y="9" width="4" height="6" rx="1"/><path d="M2 17h20"/></svg>',
  'crown'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18h18M3 18l2-9 4 4 3-6 3 6 4-4 2 9"/></svg>',
  'canal'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/><path d="M12 8v8"/></svg>',
  'wisdom'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/><circle cx="12" cy="11" r="2.5"/></svg>',
  'kid'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="9" r="4"/><path d="M5 21c0-3.5 3-6 7-6s7 2.5 7 6"/><circle cx="10" cy="8" r="0.5" fill="currentColor"/><circle cx="14" cy="8" r="0.5" fill="currentColor"/><path d="M10 11c0.5 0.5 1.2 1 2 1s1.5-0.5 2-1"/></svg>',
];
?>
<!-- wp:html -->
<section class="ds-np-welcome">
  <div class="ds-wrap">
    <div class="ds-np-welcome__head ds-reveal">
      <span class="ds-label">EVERYTHING UNDER ONE ROOF</span>
      <h2 class="ds-np-welcome__title">A complete dental practice &mdash; <span class="ds-italic">in one office, with one trusted doctor.</span></h2>
      <p class="ds-np-welcome__sub">Dr. Burns trained as a general dentist before specializing in implants. That foundation means every restorative, preventive, and reconstructive option you might need is handled here &mdash; no patchwork referrals, no relearning your story at three different offices.</p>
    </div>
    <div class="ds-np-welcome__pillars ds-reveal">
      <div class="ds-np-pillar">
        <strong>30+ Years</strong>
        <span>practicing comprehensive dentistry</span>
      </div>
      <div class="ds-np-pillar">
        <strong>One Doctor</strong>
        <span>same hands, every visit, every procedure</span>
      </div>
      <div class="ds-np-pillar">
        <strong>In-House Anesthesiology</strong>
        <span>comfort and safety on every complex case</span>
      </div>
    </div>
  </div>
</section>

<section class="ds-implants-nav ds-implants-nav--wide">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <span class="ds-label">EXPLORE OUR SERVICES</span>
      <h2 class="ds-implants-nav__title">What we do, all in one place.</h2>
      <p class="ds-implants-nav__sub">Click through to learn more, or call <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a> to talk it through.</p>
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
      <h2 class="ds-subpage-cta__title">Free consult. Honest answers.</h2>
      <p class="ds-subpage-cta__sub">Schedule a free consultation. We&rsquo;ll examine, listen, and walk you through every realistic option &mdash; with no pressure, ever.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="#quiz" data-ds-schedule class="ds-btn ds-btn--solid">Schedule a Free Consult</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
