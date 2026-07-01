<?php
/**
 * Title: Frustrations
 * Slug: dreamsmile/frustrations
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;

/**
 * Uniform custom SVG icons — 24x24, stroke 1.5, rounded caps, teal via currentColor.
 * Visual weight and geometry kept consistent across the set.
 */
$icons = [
  'denture' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M4 9c0 6 3.5 10 8 10s8-4 8-10c0-1.1-.9-2-2-2H6c-1.1 0-2 .9-2 2Z"/>
    <path d="M8 9v4M12 9v5M16 9v4"/>
  </svg>',

  'tooth' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M12 3c-4 0-7 2.5-7 6 0 2 .6 3.6 1.5 5.7.7 1.6 1 3.3 1.2 5 .1.8.8 1.3 1.6 1.2.7-.1 1.2-.7 1.2-1.4l.2-3.5c.1-1 .7-1.5 1.3-1.5s1.2.5 1.3 1.5l.2 3.5c0 .7.5 1.3 1.2 1.4.8.1 1.5-.4 1.6-1.2.2-1.7.5-3.4 1.2-5 .9-2.1 1.5-3.7 1.5-5.7 0-3.5-3-6-7-6Z"/>
  </svg>',

  'bridge' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M3 9v9a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-5"/>
    <path d="M21 9v9a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-5"/>
    <path d="M8 13h8"/>
    <path d="M10 13v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-5"/>
    <path d="M3 9c2-1.5 4-2 9-2s7 .5 9 2"/>
  </svg>',

  'chain' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M10 14a4 4 0 0 1 0-5.6l1.6-1.6a4 4 0 0 1 5.6 5.6L16 13.6"/>
    <path d="M14 10a4 4 0 0 1 0 5.6l-1.6 1.6a4 4 0 0 1-5.6-5.6L8 10.4"/>
  </svg>',

  'eye' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
    <circle cx="12" cy="12" r="3"/>
  </svg>',

  'dollar' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <circle cx="12" cy="12" r="9"/>
    <path d="M15 9c-.7-.9-1.9-1.4-3-1.4-1.8 0-3 1-3 2.4 0 1.5 1.3 2 3 2.3 1.7.3 3 .8 3 2.3 0 1.4-1.2 2.4-3 2.4-1.1 0-2.3-.5-3-1.4"/>
    <path d="M12 6v12"/>
  </svg>',
];

$items = [
  [ 'denture', 'Dentures That Slip',   'Tired of dentures that shift, slip, and make eating a daily struggle? You deserve a permanent solution.' ],
  [ 'tooth',   'Missing Teeth',        'Living with gaps in your smile affects more than your appearance &mdash; it impacts your health and confidence.' ],
  [ 'bridge',  'Bridges That Fail',    'Dental bridges wear out, damage adjacent teeth, and require replacement. There&rsquo;s a better way.' ],
  [ 'chain',   'Dental Chains',        'Impersonal care, rotating doctors, and cookie-cutter treatments. You&rsquo;re more than just a number.' ],
  [ 'eye',     'Fear of Being Awake',  'Our on-staff anesthesiologist ensures you&rsquo;re completely comfortable. Many patients don&rsquo;t remember a thing.' ],
  [ 'dollar',  'Hidden Fees',          'No surprise charges. Our turnkey pricing means the price we quote is the price you pay. Period.' ],
];
?>
<!-- wp:html -->
<section class="ds-frustrations">
  <div class="ds-wrap">
    <div class="ds-frustrations__head ds-reveal">
      <span class="ds-label">SOUND FAMILIAR?</span>
      <h2 class="ds-frustrations__title">You Deserve Better Than Another Band-Aid Solution</h2>
      <p class="ds-frustrations__sub">If you&rsquo;re reading this, you&rsquo;ve probably experienced one or more of these frustrations.</p>
    </div>

    <div class="ds-frustrations__grid">
      <?php foreach ( $items as $item ) : ?>
        <div class="ds-frustration-card ds-reveal">
          <div class="ds-frustration-card__icon"><?php echo $icons[ $item[0] ]; ?></div>
          <h3 class="ds-frustration-card__title"><?php echo $item[1]; ?></h3>
          <p class="ds-frustration-card__desc"><?php echo $item[2]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="ds-frustrations__bridge ds-reveal">
      <p>Dr. Burns&rsquo;s <strong>Burns Protocol</strong> is the permanent answer to every one of these &mdash; same-day teeth, a lifetime warranty, and care from a doctor who actually listens.</p>
    </div>

    <div class="ds-frustrations__cta ds-reveal">
      <a href="#quiz" class="ds-btn ds-btn--solid">SCHEDULE FREE DREAMSMILE&trade; ASSESSMENT</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
