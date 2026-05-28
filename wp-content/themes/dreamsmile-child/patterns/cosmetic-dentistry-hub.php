<?php
/**
 * Title: Cosmetic Dentistry
 * Slug: dreamsmile/cosmetic-dentistry-hub
 * Categories: dreamsmile
 *
 * Hub page for /cosmetic-dentistry/. Shares visual language with the
 * General Dentistry hub: .ds-np-welcome trust strip, .ds-implants-nav
 * 3-card grid, .ds-subpage-cta dark final CTA. The "MOST REQUESTED"
 * tag is the only bespoke styling (.ds-implants-nav-card__tag).
 *
 * Children that should exist as separate WP pages:
 *   /porcelain-veneers/  /teeth-whitening/  /clear-braces/
 */
defined( 'ABSPATH' ) || exit;
$office = ds_office_data();

$services = [
  [
    'href'  => '/porcelain-veneers/',
    'label' => 'Porcelain Veneers',
    'desc'  => 'Custom-crafted, ultra-thin porcelain shells designed around your face and your bite. Reshape, brighten, and rebuild a smile in just a few visits.',
    'icon'  => 'veneer',
    'tag'   => 'MOST REQUESTED',
  ],
  [
    'href'  => '/teeth-whitening/',
    'label' => 'Teeth Whitening',
    'desc'  => 'Professional in-office and take-home whitening &mdash; safe, dramatic, and tailored to your enamel, not a one-size-fits-all kit.',
    'icon'  => 'sparkle',
    'tag'   => '',
  ],
  [
    'href'  => '/clear-braces/',
    'label' => 'Clear Braces',
    'desc'  => 'Discreet, removable clear-aligner treatment for crooked teeth, gaps, or bite issues &mdash; planned and supervised by Dr. Burns.',
    'icon'  => 'aligner',
    'tag'   => '',
  ],
];

$svg = [
  'veneer'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 6c2.5-2 4.5-3 7-3s4.5 1 7 3c1 1 1.5 2.5 1 4l-1 6c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3c-.2-1.5-1.5-1.5-1.7 0L9.5 21c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 19.5 3.8 18 3.5 16.5l-1-6c-.5-1.5 0-3 1-4z"/><path d="M9 9l3 3 3-3"/></svg>',
  'sparkle' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3z"/><path d="M19 16l.7 2.1L22 19l-2.3.9L19 22l-.7-2.1L16 19l2.3-.9L19 16z"/><path d="M5 16l.7 2.1L8 19l-2.3.9L5 22l-.7-2.1L2 19l2.3-.9L5 16z"/></svg>',
  'aligner' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8c0-2 1-4 4-4h8c3 0 4 2 4 4v4c0 4-3 8-8 8s-8-4-8-8V8z"/><rect x="7" y="9" width="2" height="4" rx="0.5"/><rect x="11" y="9" width="2" height="4" rx="0.5"/><rect x="15" y="9" width="2" height="4" rx="0.5"/></svg>',
];
?>
<!-- wp:html -->
<section class="ds-np-welcome">
  <div class="ds-wrap">
    <div class="ds-np-welcome__head ds-reveal">
      <span class="ds-label">DESIGNED AROUND YOU</span>
      <h2 class="ds-np-welcome__title">A smile that looks like <span class="ds-italic">you on a great day</span> &mdash; not a stranger&rsquo;s catalog.</h2>
      <p class="ds-np-welcome__sub">Cosmetic dentistry done well doesn&rsquo;t announce itself. It looks like the smile you&rsquo;d have if everything had gone perfectly &mdash; brighter teeth, a more even line, the proportions that match your face. Dr. Burns is an AACD-award-winning specialist whose work has been recognized nationally for getting that exact balance right.</p>
    </div>
    <div class="ds-np-welcome__pillars ds-reveal">
      <div class="ds-np-pillar">
        <strong>AACD Award</strong>
        <span>for excellence in cosmetic dentistry</span>
      </div>
      <div class="ds-np-pillar">
        <strong>Digital Smile Design</strong>
        <span>preview your result before any work begins</span>
      </div>
      <div class="ds-np-pillar">
        <strong>30+ Years</strong>
        <span>of facial-aesthetic restoration experience</span>
      </div>
    </div>
  </div>
</section>

<section class="ds-implants-nav">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <span class="ds-label">EXPLORE OUR COSMETIC SERVICES</span>
      <h2 class="ds-implants-nav__title">Three paths to a smile you&rsquo;ll want to share.</h2>
    </div>
    <div class="ds-implants-nav__grid">
      <?php foreach ( $services as $s ) : ?>
        <a href="<?php echo esc_url( $s['href'] ); ?>" class="ds-implants-nav-card ds-reveal">
          <?php if ( ! empty( $s['tag'] ) ) : ?>
            <span class="ds-implants-nav-card__tag"><?php echo esc_html( $s['tag'] ); ?></span>
          <?php endif; ?>
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
      <span class="ds-label">CURIOUS WHAT&rsquo;S POSSIBLE?</span>
      <h2 class="ds-subpage-cta__title">Preview your smile before any treatment begins.</h2>
      <p class="ds-subpage-cta__sub">Book a free cosmetic consultation. Dr. Burns will preview your result with digital smile design &mdash; you&rsquo;ll see the &ldquo;after&rdquo; before any treatment begins.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="#quiz" data-ds-schedule class="ds-btn ds-btn--solid">Schedule a Free Consult</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
