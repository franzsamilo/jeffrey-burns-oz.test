<?php
/**
 * Title: Implants How It Works
 * Slug: dreamsmile/implants-how-it-works
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;

$icons = [
  'consult'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 10a7 7 0 1114 0v4.6l1.5 2.5a.5.5 0 01-.4.9H4.9a.5.5 0 01-.4-.9L6 14.6V10z"/><circle cx="11" cy="10" r="1.2" fill="currentColor"/><circle cx="14" cy="10" r="1.2" fill="currentColor"/></svg>',
  'scan'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7V5a1 1 0 011-1h2"/><path d="M17 4h2a1 1 0 011 1v2"/><path d="M20 17v2a1 1 0 01-1 1h-2"/><path d="M7 20H5a1 1 0 01-1-1v-2"/><circle cx="12" cy="12" r="4"/><path d="M12 8v8"/></svg>',
  'place'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M10 14a4 4 0 010-5.6l1.6-1.6a4 4 0 015.6 5.6L16 13.6"/><path d="M14 10a4 4 0 010 5.6l-1.6 1.6a4 4 0 01-5.6-5.6L8 10.4"/></svg>',
  'healing'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20.8 8.6a5 5 0 00-8.8-3.2 5 5 0 00-8.8 3.2c0 5.2 8.8 10.4 8.8 10.4s8.8-5.2 8.8-10.4z"/></svg>',
  'reveal'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v3M12 19v3M3 12h3M18 12h3M5.5 5.5l2 2M16.5 16.5l2 2M18.5 5.5l-2 2M7.5 16.5l-2 2"/><circle cx="12" cy="12" r="4"/></svg>',
];

$steps = [
  [ 'consult', 'Consultation', '~45 min',     'A no-pressure sit-down with Dr. Burns. We review your goals, answer every question, and map your path &mdash; you leave with clarity, not a sales pitch.' ],
  [ 'scan',    '3D Scanning',  '~15 min',     'Low-radiation 3D imaging and digital models give us a precision blueprint of your jaw and bite structure. No messy impressions.' ],
  [ 'place',   'Placement',    'Same day',    'Dr. Burns personally places your implants with on-staff anesthesia for total comfort. Most patients say it was easier than expected.' ],
  [ 'healing', 'Healing',      '3&ndash;6 mo.', 'Your implants fuse with your jawbone &mdash; acting as the root of the tooth, which preserves bone and keeps your facial structure youthful, something bridges and dentures can&rsquo;t do. You walk out with temporary teeth and check in on a schedule that works for you.' ],
  [ 'reveal',  'Reveal',       '~2 hours',    'Your final DreamSmile&trade; is fitted, fine-tuned, and polished. You walk out smiling &mdash; and never have to hide your mouth again.' ],
];
$total = count( $steps );
?>
<!-- wp:html -->
<section class="ds-how">
  <div class="ds-wrap">
    <div class="ds-how__head ds-reveal">
      <span class="ds-label">THE JOURNEY</span>
      <h2 class="ds-how__title">How It Works.</h2>
      <p class="ds-how__sub">Five thoughtful, unhurried phases &mdash; designed around your comfort and your timeline.</p>
    </div>

    <ol class="ds-how__steps" data-ds-how-count="<?php echo (int) $total; ?>">
      <?php foreach ( $steps as $i => $s ) : ?>
        <li class="ds-how-step ds-reveal" style="animation-delay: <?php echo ( $i * 80 ); ?>ms">
          <div class="ds-how-step__rail" aria-hidden="true"></div>
          <div class="ds-how-step__icon"><?php echo $icons[ $s[0] ]; ?></div>
          <span class="ds-how-step__num">Step 0<?php echo ( $i + 1 ); ?></span>
          <h3 class="ds-how-step__label"><?php echo $s[1]; ?></h3>
          <span class="ds-how-step__chip">
            <svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
            <span><?php echo $s[2]; ?></span>
          </span>
          <p class="ds-how-step__desc"><?php echo $s[3]; ?></p>
        </li>
      <?php endforeach; ?>
    </ol>

    <div class="ds-how__foot ds-reveal">
      <div class="ds-how__foot-stat">
        <strong>Most patients</strong> complete the full DreamSmile&trade; journey in <em>4&ndash;6 months</em>.
      </div>
      <a href="/#quiz" class="ds-btn ds-btn--solid">Start with a free consult</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
