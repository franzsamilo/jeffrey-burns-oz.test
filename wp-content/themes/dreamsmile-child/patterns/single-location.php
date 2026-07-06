<?php
/**
 * Title: Single Location Page (adaptive to slug)
 * Slug: dreamsmile/single-location
 * Categories: dreamsmile
 *
 * Renders an SEO-targeted city landing page for Dr. Burns' dental implant
 * practice.
 *
 * IMPORTANT: Dr. Burns has ONE physical office at 9626 South Congress St,
 * New Market, VA 22844. These 8 city subpages (Harrisonburg, Winchester,
 * Broadway, Bridgewater, Luray, Woodstock, Elkton, Timberville) are
 * LOCAL-SEO LANDING PAGES using "Near [City]" framing. The address, hours,
 * phone, review count, and testimonial content are SHARED across every
 * page and reflect the single real practice (see ds_office_data() in
 * functions.php).
 *
 * Per-city data only carries SEO-relevant context: city name, a city-flavor
 * image, a brief "why patients from [City] choose us" line, and a
 * driving-context line for the directions/map section.
 */
defined( 'ABSPATH' ) || exit;
$base   = get_stylesheet_directory_uri() . '/assets/arrange';
$office = ds_office_data();

/** Per-city SEO landing-page content. All cities point to the same real office. */
$LOCATIONS = [
  'harrisonburg' => [
    'name'      => 'Harrisonburg',
    'state'     => 'VA',
    'image'     => 'Harrisonburg-8locations.jpg',
    'hero_bg'   => 'Harrison-Hero.jpg',
    'local_why' => 'Patients from Harrisonburg, JMU, and Rockingham County trust Dr. Burns for the Burns Protocol &mdash; just a quick trip up I-81 to our New Market office.',
    'travel'    => 'A short drive north on I-81 from Harrisonburg &mdash; easy highway access the whole way to our New Market office.',
  ],
  'winchester' => [
    'name'      => 'Winchester',
    'state'     => 'VA',
    'image'     => 'Winchester-8locations.jpg',
    'hero_bg'   => 'Winchester-8locations.jpg',
    'local_why' => 'Patients from Winchester regularly make the drive south for Dr. Burns&rsquo;s implant expertise &mdash; the level of specialized care is hard to find anywhere else in the valley.',
    'travel'    => 'A scenic drive south on I-81 from Winchester to our New Market office &mdash; easy highway access the whole way.',
  ],
  'broadway' => [
    'name'      => 'Broadway',
    'state'     => 'VA',
    'image'     => 'Broadway-8locations.jpg',
    'hero_bg'   => 'Broadway-8locations.jpg',
    'local_why' => 'A short drive from Broadway and the central valley &mdash; close enough to keep follow-ups simple.',
    'travel'    => 'Quick trip up Rt. 11 from Broadway to our New Market office.',
  ],
  'bridgewater' => [
    'name'      => 'Bridgewater',
    'state'     => 'VA',
    'image'     => 'Bridgewater-8locations.jpg',
    'hero_bg'   => 'Bridgewater-8locations.jpg',
    'local_why' => 'A straightforward drive north on I-81 from Bridgewater &mdash; we welcome students, faculty, and families from the College and the surrounding community.',
    'travel'    => 'A quick drive north on I-81 from Bridgewater to our New Market office.',
  ],
  'luray' => [
    'name'      => 'Luray',
    'state'     => 'VA',
    'image'     => 'Luray-8locations.jpg',
    'hero_bg'   => 'Luray-8locations.jpg',
    'local_why' => 'Patients from Luray and Page County make the trip for the Burns Protocol &mdash; the same trusted process from consult through final reveal.',
    'travel'    => 'Across the valley from Luray to our New Market office &mdash; a beautiful drive on Rt. 211 W and Rt. 11.',
  ],
  'woodstock' => [
    'name'      => 'Woodstock',
    'state'     => 'VA',
    'image'     => 'Woodstock-8locations.jpg',
    'hero_bg'   => 'Woodstock-8locations.jpg',
    'local_why' => 'A simple drive from Woodstock and Shenandoah County &mdash; same office, same doctor, every visit.',
    'travel'    => 'A quick drive south on I-81 from Woodstock to our New Market office &mdash; about 15 minutes.',
  ],
  'elkton' => [
    'name'      => 'Elkton',
    'state'     => 'VA',
    'image'     => 'Elkton-8locations.jpg',
    'hero_bg'   => 'Elkton-8locations.jpg',
    'local_why' => 'A scenic drive from Elkton and east Rockingham County &mdash; close enough that even multi-step implant treatment fits easily into your week.',
    'travel'    => 'A short trip up Rt. 33 to I-81 north from Elkton to our New Market office.',
  ],
  'timberville' => [
    'name'      => 'Timberville',
    'state'     => 'VA',
    'image'     => 'Timberville-8locations.jpg',
    'hero_bg'   => 'Timberville-8locations.jpg',
    'local_why' => 'Patients from Timberville and the orchard country travel over for the level of implant care Dr. Burns provides &mdash; well worth the short drive.',
    'travel'    => 'A quick drive east from Timberville to our New Market office &mdash; minutes away.',
  ],
];

// Detect the current location from page slug
$slug = '';
if ( is_page() ) {
  $post = get_queried_object();
  if ( $post && isset( $post->post_name ) ) {
    $slug = $post->post_name;
  }
}
$loc = isset( $LOCATIONS[ $slug ] ) ? $LOCATIONS[ $slug ] : reset( $LOCATIONS );
$is_home_city = ! empty( $loc['is_home'] );

// Graceful fallback if per-city image is missing on disk
$loc_image_path = trailingslashit( get_stylesheet_directory() ) . 'assets/arrange/' . $loc['image'];
$loc_image_url  = file_exists( $loc_image_path )
  ? $base . '/' . $loc['image']
  : $base . '/hero-image.png'; // fallback to existing hero-image.png

$why_cards = [
  [
    'pin',
    $is_home_city ? 'In ' . $loc['name'] : 'Easy Drive from ' . $loc['name'],
    esc_html( $loc['local_why'] ),
    false,
  ],
  [ 'car',    'Easy Parking &amp; Access',       esc_html( $office['parking'] ), false ],
  [ 'cpu',    'Modern In-House Technology',      '3D imaging, digital smile design, and the latest implant tech &mdash; all under one roof.', false ],
  [ 'tooth',  'Specialized Implant Care',        'Decades of focused implant experience. This is what we do, every day.', false ],
];

$service_cards = [
  [ 'tooth',  'Dental Implants',   'Single, multiple, or full-arch dental implants with the Burns Protocol.' ],
  [ 'crown',  'Restorative Care',  'Crowns, bridges, and restorations to bring back full function.' ],
  [ 'sparkle','Cosmetic Dentistry','Veneers, whitening, and cosmetic care for a confident smile.' ],
  [ 'shield', 'Preventive Care',   'Cleanings, exams, and proactive care to keep your smile healthy.' ],
];

$svg = [
  'pin'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
  'car'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l2-6a2 2 0 0 1 2-1.5h10A2 2 0 0 1 19 7l2 6M3 13h18v5a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-1H7v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-5z"/><circle cx="7.5" cy="16" r="1" fill="currentColor"/><circle cx="16.5" cy="16" r="1" fill="currentColor"/></svg>',
  'cpu'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 14h3M1 9h3M1 14h3"/></svg>',
  'tooth'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/></svg>',
  'crown'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18h18M3 18l2-9 4 4 3-6 3 6 4-4 2 9"/></svg>',
  'sparkle' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3z"/><path d="M19 16l.7 2.1L22 19l-2.3.9L19 22l-.7-2.1L16 19l2.3-.9L19 16z"/></svg>',
  'shield'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
  'phone'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>',
  'play'    => '<svg viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M8 5v14l11-7L8 5z"/></svg>',
  'star'    => '<svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M12 2l2.9 6.3 6.8.7-5.1 4.7 1.5 6.7L12 17l-6.1 3.4 1.5-6.7L2.3 9l6.8-.7L12 2z"/></svg>',
  'dir'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l18-7-7 18-2.5-7.5L3 11z"/></svg>',
];

$schedule_attr = ' data-ds-schedule-location="' . esc_attr( $loc['name'] ) . '"';

// Map embed: always shows the real office. Directions link is FROM the city TO the office,
// so visitors get a true picture of the drive.
$maps_embed = 'https://www.google.com/maps?q=' . rawurlencode( $office['maps_q'] ) . '&output=embed';
$maps_dir   = $is_home_city
  ? 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode( $office['maps_q'] )
  : 'https://www.google.com/maps/dir/?api=1&origin=' . rawurlencode( $loc['name'] . ', ' . $loc['state'] ) . '&destination=' . rawurlencode( $office['maps_q'] );

// SEO H1: "in [City]" only when the office is actually in that city; otherwise "Near [City]".
$hero_prefix = $is_home_city ? 'in' : 'Near';
?>
<!-- wp:html -->
<section class="ds-loc-hero">
  <div class="ds-wrap">
    <div class="ds-loc-hero__grid">
      <div class="ds-loc-hero__copy ds-reveal">
        <div class="ds-loc-hero__badge">
          <?php echo $svg['star']; ?>
          <span><strong>5.0</strong> &middot; <?php echo esc_html( $office['reviews'] ); ?>+ verified patient reviews</span>
        </div>
        <h1 class="ds-loc-hero__title">Dental Implants <?php echo esc_html( $hero_prefix ); ?> <?php echo esc_html( $loc['name'] ); ?>, <?php echo esc_html( $loc['state'] ); ?> &mdash; <span class="ds-italic">Expert Results You Can Trust.</span></h1>
        <p class="ds-loc-hero__sub">Serving patients from <?php echo esc_html( $loc['name'] ); ?> and surrounding areas for over <?php echo esc_html( $office['years'] ); ?> years. Dr. Burns personally handles every case at our New Market, VA office.</p>
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
          <a href="#quiz" class="ds-btn ds-btn--solid"<?php echo $schedule_attr; ?>>Schedule Free Consult</a>
          <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call Now</a>
        </div>
      </div>
      <div class="ds-loc-hero__media ds-reveal">
        <img src="<?php echo esc_url( $loc_image_url ); ?>"
             alt="DreamSmile dental implants &mdash; serving <?php echo esc_attr( $loc['name'] ); ?>, <?php echo esc_attr( $loc['state'] ); ?>"
             loading="lazy"
             onerror="this.onerror=null; this.src='<?php echo esc_url( $base . '/hero-image.png' ); ?>'" />
      </div>
    </div>
  </div>
</section>

<section class="ds-loc-why">
  <div class="ds-wrap">
    <div class="ds-loc-why__head ds-reveal">
      <span class="ds-label">WHY PATIENTS FROM <?php echo esc_html( strtoupper( $loc['name'] ) ); ?> CHOOSE DR. BURNS</span>
      <h2 class="ds-loc-why__title">Close to home. <span class="ds-italic">Built for your comfort.</span></h2>
    </div>
    <div class="ds-loc-why__grid">
      <?php foreach ( $why_cards as $i => $c ) : ?>
        <div class="ds-loc-why-card ds-reveal" style="animation-delay: <?php echo ( $i * 60 ); ?>ms">
          <span class="ds-loc-why-card__icon"><?php echo $svg[ $c[0] ]; ?></span>
          <h3 class="ds-loc-why-card__title"><?php echo $c[1]; ?></h3>
          <p class="ds-loc-why-card__desc"><?php echo $c[2]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php ds_render_about_section(); ?>

<section class="ds-loc-testimonials">
  <div class="ds-wrap">
    <span class="ds-label">PATIENT STORIES</span>
    <h2 class="ds-loc-testimonials__title ds-reveal">Real patients. <span class="ds-italic">Real DreamSmiles&trade;.</span></h2>
    <p class="ds-loc-testimonials__sub ds-reveal">Hear directly from a DreamSmile&trade; patient about their experience with Dr. Burns.</p>
    <div class="ds-loc-testimonials__media ds-reveal">
      <video
        class="ds-loc-testimonials__video"
        src="<?php echo esc_url( $base . '/Hall-of-Fame-Patients.mp4' ); ?>"
        preload="metadata"
        playsinline
        muted
        controls
        aria-label="Dr. Burns Hall of Fame — DreamSmile patient stories"
      ></video>
    </div>
  </div>
</section>

<section class="ds-loc-services">
  <div class="ds-wrap">
    <div class="ds-loc-services__head ds-reveal">
      <span class="ds-label">SERVICES OFFERED HERE</span>
      <h2 class="ds-loc-services__title">Everything your smile needs, <span class="ds-italic">under one roof.</span></h2>
    </div>
    <div class="ds-loc-services__grid">
      <?php foreach ( $service_cards as $i => $s ) : ?>
        <div class="ds-loc-service-card ds-reveal" style="animation-delay: <?php echo ( $i * 60 ); ?>ms">
          <span class="ds-loc-service-card__icon"><?php echo $svg[ $s[0] ]; ?></span>
          <h3 class="ds-loc-service-card__title"><?php echo $s[1]; ?></h3>
          <p class="ds-loc-service-card__desc"><?php echo $s[2]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="ds-loc-map">
  <div class="ds-wrap">
    <div class="ds-loc-map__head ds-reveal">
      <span class="ds-label">MAP &amp; DIRECTIONS</span>
      <h2 class="ds-loc-map__title">
        <?php if ( $is_home_city ) : ?>
          Visit us in <?php echo esc_html( $loc['name'] ); ?>.
        <?php else : ?>
          Visit us &mdash; a short drive from <?php echo esc_html( $loc['name'] ); ?>.
        <?php endif; ?>
      </h2>
      <?php if ( ! empty( $loc['travel'] ) ) : ?>
        <p class="ds-loc-map__travel"><?php echo $loc['travel']; ?></p>
      <?php endif; ?>
    </div>
    <div class="ds-loc-map__grid">
      <div class="ds-loc-map__info ds-reveal">
        <h3 class="ds-loc-map__city"><?php echo esc_html( $office['home_city'] ); ?>, <?php echo esc_html( $office['home_state'] ); ?></h3>
        <p class="ds-loc-map__addr"><?php echo esc_html( $office['address'] ); ?></p>
        <p class="ds-loc-map__hours"><?php echo $office['hours']; ?></p>
        <div class="ds-loc-map__ctas">
          <a href="<?php echo esc_url( $maps_dir ); ?>" target="_blank" rel="noopener" class="ds-btn ds-btn--solid ds-btn--sm">
            <?php echo $svg['dir']; ?>
            <span><?php echo $is_home_city ? 'Get Directions' : 'Directions from ' . esc_html( $loc['name'] ); ?></span>
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
      <h2 class="ds-loc-cta__title">Your New Smile Starts Here.</h2>
      <p class="ds-loc-cta__sub">Free consultation &middot; No obligations &middot; Direct line to Dr. Burns</p>
      <div class="ds-loc-cta__ctas">
        <a href="#quiz" class="ds-btn ds-btn--solid"<?php echo $schedule_attr; ?>>Schedule</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
