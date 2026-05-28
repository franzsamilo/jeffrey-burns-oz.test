<?php
/**
 * Title: Gum Disease Treatment
 * Slug: dreamsmile/gum-disease-hub
 * Categories: dreamsmile
 *
 * Hub page for /gum-disease/. Links to deep-teeth-cleaning and
 * periodontal-maintenance child pages. Reuses existing components
 * (.ds-np-welcome + .ds-implants-nav + .ds-subpage-cta).
 */
defined( 'ABSPATH' ) || exit;
$office = ds_office_data();

$services = [
  [
    'href'  => '/deep-teeth-cleaning/',
    'label' => 'Deep Teeth Cleaning',
    'desc'  => 'Scaling and root planing for early gum disease &mdash; the right step before things get worse.',
    'icon'  => 'shield',
  ],
  [
    'href'  => '/periodontal-maintenance/',
    'label' => 'Periodontal Maintenance',
    'desc'  => 'Specialized 3&ndash;4 month cleanings for patients who&rsquo;ve had gum disease &mdash; the long-term prevention plan.',
    'icon'  => 'check',
  ],
];

$svg = [
  'shield' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
  'check'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>',
];
?>
<!-- wp:html -->
<section class="ds-np-welcome">
  <div class="ds-wrap">
    <div class="ds-np-welcome__head ds-reveal">
      <span class="ds-label">GUM DISEASE TREATMENT</span>
      <h2 class="ds-np-welcome__title">Catch it early. <span class="ds-italic">Stay ahead of it.</span></h2>
      <p class="ds-np-welcome__sub">Gum disease is the leading cause of tooth loss in adults &mdash; and it&rsquo;s almost always reversible when caught in time. Bleeding gums, receding gum line, persistent bad breath, loose teeth: these are signs to address now, not next year.</p>
    </div>
    <div class="ds-np-welcome__pillars ds-reveal">
      <div class="ds-np-pillar"><strong>Reversible Early</strong><span>treat before it becomes bone loss</span></div>
      <div class="ds-np-pillar"><strong>Comfort Options</strong><span>numbing or sedation if you want it</span></div>
      <div class="ds-np-pillar"><strong>Long-Term Plan</strong><span>maintenance prevents recurrence</span></div>
    </div>
  </div>
</section>

<section class="ds-implants-nav">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <span class="ds-label">GUM DISEASE TREATMENTS</span>
      <h2 class="ds-implants-nav__title">Two stages of care &mdash; we&rsquo;ll know which fits.</h2>
      <p class="ds-implants-nav__sub">Most patients start with a deep cleaning, then move to ongoing maintenance to keep gum disease from coming back.</p>
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
      <span class="ds-label">SEEING THE WARNING SIGNS?</span>
      <h2 class="ds-subpage-cta__title">Schedule a gum-health assessment.</h2>
      <p class="ds-subpage-cta__sub">Free consultation. Honest assessment of where your gums are and what level of care &mdash; if any &mdash; is the right next step.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="#quiz" data-ds-schedule class="ds-btn ds-btn--solid">Schedule a Free Consult</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
