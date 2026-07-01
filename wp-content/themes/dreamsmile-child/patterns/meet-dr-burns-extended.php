<?php
/**
 * Title: Meet Dr. Burns — Extended Bio
 * Slug: dreamsmile/meet-dr-burns-extended
 * Categories: dreamsmile
 *
 * Standalone Meet Dr. Burns page body. Reuses existing theme components
 * for visual consistency with the rest of the site:
 *   - .ds-np-before  (story: image-left + copy-right grid)
 *   - .ds-np-steps   (career timeline as a numbered list)
 *   - .ds-implants-nav-card (4 differentiation pillars; --quad grid)
 *   - .ds-subpage-cta (dark final CTA)
 *
 * The shared about-dr-burns pattern still renders below this content
 * via page-meet-dr-burns.html for the canonical "Meet the Specialist"
 * block + Gene Tucker quote.
 */
defined( 'ABSPATH' ) || exit;
$base   = get_stylesheet_directory_uri() . '/assets/arrange';
$office = ds_office_data();

$timeline = [
  [
    'num'   => '01',
    'year'  => '1990s',
    'label' => 'General practice foundations',
    'desc'  => 'Dr. Burns earned his DDS and built a comprehensive general dentistry practice &mdash; the years of restorative, surgical, and cosmetic work that became the foundation for everything to come.',
  ],
  [
    'num'   => '02',
    'year'  => '2000s',
    'label' => 'Specialization in implants',
    'desc'  => 'After encountering the limits of bridges and dentures for his patients, Dr. Burns pursued advanced implant training and gradually focused his practice on implant dentistry &mdash; placing thousands of implants over the years.',
  ],
  [
    'num'   => '03',
    'year'  => '2010s',
    'label' => 'The Burns Protocol takes shape',
    'desc'  => 'Frustrated by the inconsistency of implant outcomes across the industry, Dr. Burns codified his methodology into the Burns Protocol &mdash; a repeatable, multi-step system designed to deliver predictable long-term results.',
  ],
  [
    'num'   => '04',
    'year'  => 'Today',
    'label' => 'Teaching the protocol nationwide',
    'desc'  => 'Dr. Burns now teaches the Burns Protocol to dentists across the United States while continuing to personally place every implant at his New Market practice. AACD-award-recognized for cosmetic excellence.',
  ],
];

$pillars = [
  [
    'icon'  => 'phone',
    'title' => 'His personal cell number',
    'desc'  => 'Every DreamSmile&trade; implant patient receives Dr. Burns&rsquo;s direct cell. Pain at 9 PM? Worry on a Saturday? Call him. This is not a marketing line &mdash; it is how Dr. Burns has practiced for decades.',
  ],
  [
    'icon'  => 'doctor',
    'title' => 'He places every implant himself',
    'desc'  => 'No rotating providers, no rookie associates handling your case. Dr. Burns personally performs the surgery, designs the smile, and supervises every restoration step.',
  ],
  [
    'icon'  => 'safety',
    'title' => 'On-staff anesthesiologist',
    'desc'  => 'A board-certified physician anesthesiologist (not a CRNA) is in the room for every implant procedure. Comfort and safety, never an afterthought.',
  ],
  [
    'icon'  => 'house',
    'title' => 'Everything in-house',
    'desc'  => 'Imaging, surgery, lab work, restoration, and follow-up all happen at the New Market office &mdash; often the same day. Most patients get beautiful temporary teeth immediately, so you leave smiling, not gap-toothed. No referrals, no shipping you out.',
  ],
];

$svg = [
  'phone'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>',
  'doctor' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="7" r="4"/><path d="M5 21c0-3.5 3-6 7-6s7 2.5 7 6"/><path d="M9 14v2l3 1.5L15 16v-2"/></svg>',
  'safety' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
  'house'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-7 9 7v9a2 2 0 0 1-2 2h-4v-7H10v7H6a2 2 0 0 1-2-2v-9z"/></svg>',
];
?>
<!-- wp:html -->

<!-- Story: copy-only block. The canonical Dr. Burns photo lives in the
     about-dr-burns pattern rendered below, so this section stays text-driven
     to avoid double-Burns redundancy on the same page. -->
<section class="ds-np-before ds-np-before--copy-only">
  <div class="ds-wrap">
    <div class="ds-np-before__copy ds-reveal" style="max-width:780px; margin:0 auto; text-align:left;">
      <span class="ds-label">THE STORY</span>
      <h2 class="ds-np-before__title">A specialist who stayed <span class="ds-italic">a family doctor.</span></h2>
      <p>Most implant specialists pick a path: become a high-volume operator, or stay a general dentist who refers complex cases out. Dr. Burns rejected both. He built a practice deep enough to handle the most complex full-arch cases and warm enough that patients still feel known by name.</p>
      <p style="margin-top:14px;">Over 30 years of focused implant work shaped a single conviction &mdash; that getting an implant right is not just a clinical exercise. It is an emotional one. Patients arrive embarrassed, anxious, sometimes after years of being told &ldquo;there&rsquo;s nothing we can do.&rdquo; The Burns Protocol exists because that conversation deserves a better answer.</p>
      <p style="margin-top:14px;">Today, Dr. Burns continues to personally place every implant at his New Market, VA office &mdash; and teaches the same protocol to dentists across the United States who want to deliver the same standard of care.</p>
    </div>
  </div>
</section>

<!-- Career timeline: numbered list (reuses .ds-np-steps) -->
<section class="ds-np-steps">
  <div class="ds-wrap">
    <div class="ds-np-steps__head ds-reveal">
      <span class="ds-label">A CAREER IN DENTISTRY</span>
      <h2 class="ds-np-steps__title">Decades of focus &mdash; <span class="ds-italic">not headlines.</span></h2>
      <p class="ds-np-steps__sub">A linear story is the most honest one to tell. Here&rsquo;s how Dr. Burns&rsquo;s practice grew from a general dentist&rsquo;s chair to a nationally recognized implant teaching practice.</p>
    </div>
    <ol class="ds-np-steps__list">
      <?php foreach ( $timeline as $t ) : ?>
        <li class="ds-np-step ds-reveal">
          <span class="ds-np-step__num" aria-hidden="true"><?php echo esc_html( $t['num'] ); ?></span>
          <div class="ds-np-step__body">
            <h3><?php echo esc_html( $t['year'] ); ?> &middot; <?php echo esc_html( $t['label'] ); ?></h3>
            <p><?php echo $t['desc']; ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- 4 differentiation pillars: reuses .ds-implants-nav-card grid in --quad layout -->
<section class="ds-implants-nav ds-implants-nav--quad">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <span class="ds-label">WHAT MAKES THIS PRACTICE DIFFERENT</span>
      <h2 class="ds-implants-nav__title">Four things you won&rsquo;t find at a dental chain.</h2>
    </div>
    <div class="ds-implants-nav__grid">
      <?php foreach ( $pillars as $p ) : ?>
        <article class="ds-implants-nav-card ds-reveal" style="cursor:default;">
          <span class="ds-implants-nav-card__icon"><?php echo $svg[ $p['icon'] ]; ?></span>
          <h3 class="ds-implants-nav-card__title"><?php echo esc_html( $p['title'] ); ?></h3>
          <p class="ds-implants-nav-card__desc"><?php echo $p['desc']; ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Final CTA (dark charcoal, .ds-subpage-cta — same as implant subpages) -->
<section class="ds-subpage-cta">
  <div class="ds-wrap">
    <div class="ds-subpage-cta__inner ds-reveal">
      <span class="ds-label">SCHEDULE WITH DR. BURNS HIMSELF</span>
      <h2 class="ds-subpage-cta__title">Direct conversation with the doctor &mdash; not an associate.</h2>
      <p class="ds-subpage-cta__sub">Free consultation. Just Dr. Burns and your case &mdash; no coordinator, no upsell, no pressure.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="#quiz" data-ds-schedule class="ds-btn ds-btn--solid">Schedule a Free Consult</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
