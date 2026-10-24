<?php
/**
 * Title: Town Page (old-site copy)
 * Slug: dreamsmile/town-page
 * Categories: dreamsmile
 * Inserter: no
 *
 * Body of the /contact-us/ town pages (ds_town_pages()) whose copy is in
 * inc/town-pages.php: the old site's text, word for word, in the theme's
 * location-page components. Like single-location.php, it is a local-SEO page:
 * the address, hours, map and patient stories are the one New Market office's.
 *
 * The old town pages all share one shape, and the layout follows it:
 *   H1 + intro            → .ds-loc-hero
 *   the eligibility survey → inline GHL survey, at the old #see-if-you-qualify anchor
 *   sections 1–4          → .ds-loc-why: section 1 as the head, 2–4 as cards
 *   Meet Dr. Jeffrey Burns → .ds-loc-doctor (dark)
 *   the DreamSmile blurb   → .ds-loc-dreamsmile, beside the patient-stories video
 *   section 5             → .ds-loc-cta, the closing call to action
 * plus the office map (.ds-loc-map), as on every location page.
 *
 * Old headings stay H2s, even where a card styles them small. The two shared
 * blurbs carry the DreamSmile™ mark and fix two typos in the old text
 * ("taught to Dentists", "long-lasting DreamSmile"). Renders nothing for a
 * page without copy.
 */
defined( 'ABSPATH' ) || exit;

$slug = '';
if ( is_page() && ( $p = get_post() ) ) { $slug = $p->post_name; }
$town = ds_town_copy()[ $slug ] ?? null;
if ( ! $town ) { return; }

$base   = get_stylesheet_directory_uri() . '/assets/arrange';
$office = ds_office_data();

list( $lead, $card_a, $card_b, $card_c, $closing ) = $town['sections'];
$cards = [ [ 'tooth', $card_a ], [ 'cpu', $card_b ], [ 'shield', $card_c ] ];

$svg = [
  'pin'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
  'phone'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>',
  'star'   => '<svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M12 2l2.9 6.3 6.8.7-5.1 4.7 1.5 6.7L12 17l-6.1 3.4 1.5-6.7L2.3 9l6.8-.7L12 2z"/></svg>',
  'dir'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l18-7-7 18-2.5-7.5L3 11z"/></svg>',
  'tooth'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/></svg>',
  'cpu'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 14h3M1 9h3M1 14h3"/></svg>',
  'shield' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
];

$schedule_attr = ' data-ds-schedule-location="' . esc_attr( $town['town'] ) . '"';
$maps_embed    = 'https://www.google.com/maps?q=' . rawurlencode( $office['maps_q'] ) . '&output=embed';
$maps_dir      = 'https://www.google.com/maps/dir/?api=1&origin=' . rawurlencode( $town['town'] . ', ' . $town['state'] ) . '&destination=' . rawurlencode( $office['maps_q'] );
?>
<!-- wp:html -->
<section class="ds-loc-hero">
  <div class="ds-wrap">
    <div class="ds-loc-hero__grid">
      <div class="ds-loc-hero__copy ds-reveal">
        <div class="ds-loc-hero__badge">
          <?php echo $svg['star']; ?>
          <span><strong>5.0</strong> &middot; Google rating</span>
        </div>
        <h1 class="ds-loc-hero__title"><?php echo esc_html( $town['h1'] ); ?></h1>
        <?php foreach ( $town['intro'] as $line ) : ?>
          <p class="ds-loc-hero__sub"><?php echo $line; ?></p>
        <?php endforeach; ?>
        <div class="ds-loc-hero__meta">
          <span class="ds-loc-hero__meta-item">
            <?php echo $svg['pin']; ?>
            <span><?php echo esc_html( $office['address'] ); ?></span>
          </span>
          <span class="ds-loc-hero__meta-item">
            <?php echo $svg['phone']; ?>
            <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a>
          </span>
        </div>
        <div class="ds-loc-hero__ctas">
          <a href="#quiz" class="ds-btn ds-btn--solid"<?php echo $schedule_attr; ?>>Schedule Your DreamSmile<sup class="ds-tm">&trade;</sup> Assessment</a>
          <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call Now</a>
        </div>
      </div>
      <div class="ds-loc-hero__media ds-reveal">
        <img src="<?php echo esc_url( $base . '/' . $town['image'] ); ?>" alt="<?php echo esc_attr( $town['image_alt'] ); ?>" width="1280" height="960" />
      </div>
    </div>
  </div>
</section>

<section class="ds-loc-survey" id="see-if-you-qualify">
  <div class="ds-wrap">
    <div class="ds-loc-why__head ds-reveal">
      <span class="ds-label">30-SECOND ELIGIBILITY QUIZ</span>
      <h2 class="ds-loc-why__title">See How Dental Implants Can <span class="ds-italic">Change Your Life!</span></h2>
    </div>
    <div class="ds-loc-survey__card">
      <?php // lead-embeds.js puts the survey iframe here; every survey CTA on the page then scrolls to it. ?>
      <div class="ds-survey__frame" data-ds-survey-inline></div>
    </div>
    <p class="ds-loc-survey__note">Prefer to talk it through? Call <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a>.</p>
  </div>
</section>

<section class="ds-loc-why">
  <div class="ds-wrap">
    <div class="ds-loc-why__head ds-reveal">
      <span class="ds-label">DENTAL IMPLANTS NEAR <?php echo esc_html( strtoupper( $town['town'] ) ); ?></span>
      <h2 class="ds-loc-why__title"><?php echo $lead[0]; ?></h2>
      <?php foreach ( $lead[1] as $para ) : ?>
        <p class="ds-loc-why__lead"><?php echo $para; ?></p>
      <?php endforeach; ?>
    </div>
    <div class="ds-loc-why__grid ds-loc-why__grid--3">
      <?php foreach ( $cards as $i => $c ) : ?>
        <div class="ds-loc-why-card ds-reveal" style="animation-delay: <?php echo ( $i * 60 ); ?>ms">
          <span class="ds-loc-why-card__icon"><?php echo $svg[ $c[0] ]; ?></span>
          <h2 class="ds-loc-why-card__title"><?php echo $c[1][0]; ?></h2>
          <?php foreach ( $c[1][1] as $para ) : ?>
            <p class="ds-loc-why-card__desc"><?php echo $para; ?></p>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="ds-loc-doctor">
  <div class="ds-wrap">
    <div class="ds-loc-doctor__grid">
      <div class="ds-loc-doctor__media ds-reveal">
        <img src="<?php echo esc_url( $base . '/dr-burns-portrait.jpg' ); ?>" alt="Dr. Jeffrey S. Burns, DDS" width="571" height="800" loading="lazy" />
      </div>
      <div class="ds-reveal">
        <span class="ds-label">MEET THE DOCTOR</span>
        <h2 class="ds-loc-doctor__name">Meet Dr. Jeffrey Burns</h2>
        <p class="ds-loc-doctor__bio">Dr. Jeffrey S. Burns is a nationally recognized leader in dental implantology and smile design with over 30 years of hands-on implant experience. He is the creator of the Burns Protocol, a proven multi-step system he has taught to dentists across the United States to consistently deliver healthy, long-lasting DreamSmiles<sup class="ds-tm">&trade;</sup>. Dr. Burns combines elite expertise with genuine care&mdash;so much so that every DreamSmile<sup class="ds-tm">&trade;</sup> patient receives his personal cell phone number, ensuring direct access, confidence, and peace of mind throughout their transformation.</p>
        <a href="/meet-dr-burns/" class="ds-btn ds-btn--outlined-white ds-btn--sm">Learn More</a>
      </div>
    </div>
  </div>
</section>

<section class="ds-loc-dreamsmile">
  <div class="ds-wrap ds-loc-dreamsmile__grid">
    <div class="ds-loc-dreamsmile__copy ds-reveal">
      <img class="ds-loc-dreamsmile__logo" src="<?php echo esc_url( $base . '/dreamsmile-banner-logo.png' ); ?>" alt="DreamSmile by Jeffrey S. Burns DDS" width="700" height="268" loading="lazy" />
      <p class="ds-loc-dreamsmile__text">A DreamSmile<sup class="ds-tm">&trade;</sup> is more than a beautiful smile&mdash;it&rsquo;s a lifetime investment in confidence, health, and quality. Designed by nationally recognized implant expert Dr. Jeffrey S. Burns, each DreamSmile<sup class="ds-tm">&trade;</sup> is crafted using his proprietary Burns Protocol, a precise 6-step process that delivers consistently stunning, natural-looking results. Built with the finest, strongest materials available and protected by a DreamSmile<sup class="ds-tm">&trade;</sup> Warranty&mdash;up to lifetime coverage&mdash;every detail is engineered for peace of mind. Patients also receive a DreamSmile<sup class="ds-tm">&trade;</sup> Care Kit to protect their smile and enjoy it fully from day one.</p>
      <a href="#see-if-you-qualify" class="ds-btn ds-btn--solid">See If You Qualify for the DreamSmile<sup class="ds-tm">&trade;</sup></a>
    </div>
    <figure class="ds-loc-dreamsmile__media ds-reveal">
      <div class="ds-loc-testimonials__media">
        <video
          class="ds-loc-testimonials__video"
          src="<?php echo esc_url( ds_get_video_url( 'Hall-of-Fame-Patients.mp4' ) ); ?>"
          preload="metadata"
          playsinline
          muted
          controls
          aria-label="Dr. Burns Hall of Fame &mdash; DreamSmile patient stories"
        ></video>
      </div>
      <figcaption>Real DreamSmile<sup class="ds-tm">&trade;</sup> patients, in their own words.</figcaption>
    </figure>
  </div>
</section>

<section class="ds-loc-map">
  <div class="ds-wrap">
    <div class="ds-loc-map__head ds-reveal">
      <span class="ds-label">MAP &amp; DIRECTIONS</span>
      <h2 class="ds-loc-map__title">Visit us &mdash; a short drive from <?php echo esc_html( $town['town'] ); ?>.</h2>
      <p class="ds-loc-map__travel"><?php echo $town['travel']; ?></p>
    </div>
    <div class="ds-loc-map__grid">
      <div class="ds-loc-map__info ds-reveal">
        <h3 class="ds-loc-map__city"><?php echo esc_html( $office['home_city'] ); ?>, <?php echo esc_html( $office['home_state'] ); ?></h3>
        <p class="ds-loc-map__addr"><?php echo esc_html( $office['address'] ); ?></p>
        <p class="ds-loc-map__hours"><?php echo $office['hours']; ?></p>
        <div class="ds-loc-map__ctas">
          <a href="<?php echo esc_url( $maps_dir ); ?>" target="_blank" rel="noopener" class="ds-btn ds-btn--solid ds-btn--sm">
            <?php echo $svg['dir']; ?>
            <span>Directions from <?php echo esc_html( $town['town'] ); ?></span>
          </a>
          <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined-white ds-btn--sm">
            <?php echo $svg['phone']; ?>
            <span>Call Office</span>
          </a>
        </div>
      </div>
      <div class="ds-loc-map__embed ds-reveal">
        <iframe
          src="<?php echo esc_url( $maps_embed ); ?>"
          title="Map of Dr. Burns&rsquo;s dental implant office in <?php echo esc_attr( $office['home_city'] ); ?>, <?php echo esc_attr( $office['home_state'] ); ?>"
          loading="lazy"
          allowfullscreen
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>

<section class="ds-loc-cta" id="schedule">
  <div class="ds-wrap">
    <div class="ds-loc-cta__inner ds-reveal">
      <h2 class="ds-loc-cta__title"><?php echo $closing[0]; ?></h2>
      <?php foreach ( $closing[1] as $para ) : ?>
        <p class="ds-loc-cta__body"><?php echo $para; ?></p>
      <?php endforeach; ?>
      <div class="ds-loc-cta__ctas">
        <a href="#quiz" class="ds-btn ds-btn--solid"<?php echo $schedule_attr; ?>>Schedule Your DreamSmile<sup class="ds-tm">&trade;</sup> Assessment</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
