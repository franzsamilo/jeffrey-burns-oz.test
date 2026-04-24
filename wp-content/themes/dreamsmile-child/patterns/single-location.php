<?php
/**
 * Title: Single Location Page (adaptive to slug)
 * Slug: dreamsmile/single-location
 * Categories: dreamsmile
 *
 * Renders a complete city-specific dental implants page. Detects the current
 * page slug via WP and pulls city-specific data from $LOCATIONS below.
 * Used by all 8 location pages (Harrisonburg, Winchester, Broadway, etc.).
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';

/**
 * Per-city data. `local_why` + `parking` customize 2 of the 4 "why" cards so
 * each city feels local instead of template. `maps_q` is the Google Maps query.
 */
$LOCATIONS = [
  'harrisonburg' => [
    'name'      => 'Harrisonburg',
    'state'     => 'VA',
    'address'   => '1234 Main St, Harrisonburg, VA 22801',
    'years'     => '30',
    'reviews'   => '130',
    'landmark'  => 'JMU and downtown Harrisonburg',
    'image'     => 'Harrisonburg-8locations.jpg',
    'hero_bg'   => 'Harrison-Hero.jpg',
    'local_why' => 'Five minutes from JMU campus and the Court Square &mdash; easy from any direction.',
    'parking'   => 'Free on-site parking, wheelchair-accessible entry from Main St.',
    'maps_q'    => '1234 Main St, Harrisonburg, VA 22801',
  ],
  'winchester' => [
    'name'      => 'Winchester',
    'state'     => 'VA',
    'address'   => '555 Valley Ave, Winchester, VA 22601',
    'years'     => '25',
    'reviews'   => '95',
    'landmark'  => 'Old Town Winchester',
    'image'     => 'Winchester-8locations.jpg',
    'hero_bg'   => 'Winchester-8locations.jpg',
    'local_why' => 'Minutes from Old Town Winchester and the walking mall &mdash; convenient from anywhere in the valley.',
    'parking'   => 'Free on-site parking, accessible entry from Valley Avenue.',
    'maps_q'    => '555 Valley Ave, Winchester, VA 22601',
  ],
  'broadway' => [
    'name'      => 'Broadway',
    'state'     => 'VA',
    'address'   => '22 Center St, Broadway, VA 22815',
    'years'     => '20',
    'reviews'   => '60',
    'landmark'  => 'downtown Broadway',
    'image'     => 'Broadway-8locations.jpg',
    'hero_bg'   => 'Broadway-8locations.jpg',
    'local_why' => 'Right off Rt. 259 in the heart of Broadway &mdash; serving Timberville, Linville, and the north valley.',
    'parking'   => 'Free on-site lot, street-level entry.',
    'maps_q'    => '22 Center St, Broadway, VA 22815',
  ],
  'bridgewater' => [
    'name'      => 'Bridgewater',
    'state'     => 'VA',
    'address'   => '101 College Dr, Bridgewater, VA 22812',
    'years'     => '20',
    'reviews'   => '50',
    'landmark'  => 'Bridgewater College',
    'image'     => 'Bridgewater-8locations.jpg',
    'hero_bg'   => 'Bridgewater-8locations.jpg',
    'local_why' => 'A short walk from Bridgewater College &mdash; welcoming students, faculty, and families alike.',
    'parking'   => 'Free on-site parking, step-free access.',
    'maps_q'    => '101 College Dr, Bridgewater, VA 22812',
  ],
  'luray' => [
    'name'      => 'Luray',
    'state'     => 'VA',
    'address'   => '44 Cave Rd, Luray, VA 22835',
    'years'     => '20',
    'reviews'   => '45',
    'landmark'  => 'Luray Caverns',
    'image'     => 'Luray-8locations.jpg',
    'hero_bg'   => 'Luray-8locations.jpg',
    'local_why' => 'Right off Rt. 211 near Luray Caverns &mdash; serving the Page County community.',
    'parking'   => 'Free on-site parking, ground-floor entry.',
    'maps_q'    => '44 Cave Rd, Luray, VA 22835',
  ],
  'woodstock' => [
    'name'      => 'Woodstock',
    'state'     => 'VA',
    'address'   => '77 Court St, Woodstock, VA 22664',
    'years'     => '20',
    'reviews'   => '55',
    'landmark'  => 'historic Woodstock',
    'image'     => 'Woodstock-8locations.jpg',
    'hero_bg'   => 'Woodstock-8locations.jpg',
    'local_why' => 'Steps from Main Street and the Shenandoah County Courthouse &mdash; easy parking and access.',
    'parking'   => 'Free on-site parking, accessible entry.',
    'maps_q'    => '77 Court St, Woodstock, VA 22664',
  ],
  'elkton' => [
    'name'      => 'Elkton',
    'state'     => 'VA',
    'address'   => '88 Route 33, Elkton, VA 22827',
    'years'     => '20',
    'reviews'   => '40',
    'landmark'  => 'Shenandoah National Park',
    'image'     => 'Elkton-8locations.jpg',
    'hero_bg'   => 'Elkton-8locations.jpg',
    'local_why' => 'Right on Rt. 33 near the entrance to Shenandoah National Park &mdash; serving Rockingham County.',
    'parking'   => 'Free on-site parking, step-free entry.',
    'maps_q'    => '88 Route 33, Elkton, VA 22827',
  ],
  'timberville' => [
    'name'      => 'Timberville',
    'state'     => 'VA',
    'address'   => '12 Orchard Ln, Timberville, VA 22853',
    'years'     => '20',
    'reviews'   => '42',
    'landmark'  => 'the heart of the Shenandoah Valley',
    'image'     => 'Timberville-8locations.jpg',
    'hero_bg'   => 'Timberville-8locations.jpg',
    'local_why' => 'In the heart of the valley &mdash; serving Timberville, Broadway, and the surrounding orchards.',
    'parking'   => 'Free on-site parking, accessible entry.',
    'maps_q'    => '12 Orchard Ln, Timberville, VA 22853',
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

// Graceful fallback if per-city image is missing on disk
$loc_image_path = trailingslashit( get_stylesheet_directory() ) . 'assets/arrange/' . $loc['image'];
$loc_image_url  = file_exists( $loc_image_path )
  ? $base . '/' . $loc['image']
  : $base . '/hero-image.png'; // fallback to existing hero-image.png

$why_cards = [
  [ 'pin',    'Close to ' . $loc['name'],      esc_html( $loc['local_why'] ), false ],
  [ 'car',    'Easy Parking &amp; Access',       esc_html( $loc['parking'] ),   false ],
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
$maps_embed    = 'https://www.google.com/maps?q=' . rawurlencode( $loc['maps_q'] ) . '&output=embed';
$maps_dir      = 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode( $loc['maps_q'] );
?>
<!-- wp:html -->
<section class="ds-loc-hero">
  <div class="ds-wrap">
    <div class="ds-loc-hero__grid">
      <div class="ds-loc-hero__copy ds-reveal">
        <div class="ds-loc-hero__badge">
          <?php echo $svg['star']; ?>
          <span><strong>5.0</strong> &middot; <?php echo esc_html( $loc['reviews'] ); ?>+ reviews in <?php echo esc_html( $loc['name'] ); ?></span>
        </div>
        <h1 class="ds-loc-hero__title">Dental Implants in <?php echo esc_html( $loc['name'] ); ?>, <?php echo esc_html( $loc['state'] ); ?> &mdash; <span class="ds-italic">Expert Results You Can Trust.</span></h1>
        <p class="ds-loc-hero__sub">Serving patients from <?php echo esc_html( $loc['name'] ); ?> for over <?php echo esc_html( $loc['years'] ); ?> years. Dr. Burns personally handles every case.</p>
        <div class="ds-loc-hero__meta">
          <span class="ds-loc-hero__meta-item">
            <?php echo $svg['pin']; ?>
            <span><?php echo esc_html( $loc['address'] ); ?></span>
          </span>
          <span class="ds-loc-hero__meta-item">
            <?php echo $svg['phone']; ?>
            <a href="tel:+15407408937">(540) 740-8937</a>
          </span>
        </div>
        <div class="ds-loc-hero__ctas">
          <a href="#schedule" class="ds-btn ds-btn--solid"<?php echo $schedule_attr; ?>>Schedule Free Consult</a>
          <a href="tel:+15407408937" class="ds-btn ds-btn--outlined">Call Now</a>
        </div>
      </div>
      <div class="ds-loc-hero__media ds-reveal">
        <img src="<?php echo esc_url( $loc_image_url ); ?>"
             alt="DreamSmile <?php echo esc_attr( $loc['name'] ); ?> dental office"
             loading="lazy"
             onerror="this.onerror=null; this.src='<?php echo esc_url( $base . '/hero-image.png' ); ?>'" />
      </div>
    </div>
  </div>
</section>

<section class="ds-loc-why">
  <div class="ds-wrap">
    <div class="ds-loc-why__head ds-reveal">
      <span class="ds-label">WHY CHOOSE THIS LOCATION</span>
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
    <h2 class="ds-loc-testimonials__title ds-reveal">Patients from <?php echo esc_html( $loc['name'] ); ?>, in their own words.</h2>
    <p class="ds-loc-testimonials__sub ds-reveal">Shared testimonial &mdash; city-specific stories coming soon.</p>
    <div class="ds-loc-testimonials__media ds-reveal">
      <video
        class="ds-loc-testimonials__video"
        src="<?php echo esc_url( $base . '/Danny-Spain-BA-TikTok.mp4' ); ?>"
        preload="metadata"
        playsinline
        muted
        controls
        aria-label="DreamSmile patient testimonial"
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
      <h2 class="ds-loc-map__title">Visit us in <?php echo esc_html( $loc['name'] ); ?>.</h2>
    </div>
    <div class="ds-loc-map__grid">
      <div class="ds-loc-map__info ds-reveal">
        <h3 class="ds-loc-map__city"><?php echo esc_html( $loc['name'] ); ?>, <?php echo esc_html( $loc['state'] ); ?></h3>
        <p class="ds-loc-map__addr"><?php echo esc_html( $loc['address'] ); ?></p>
        <p class="ds-loc-map__hours">Mon&ndash;Fri &middot; 8 am &ndash; 5 pm</p>
        <div class="ds-loc-map__ctas">
          <a href="<?php echo esc_url( $maps_dir ); ?>" target="_blank" rel="noopener" class="ds-btn ds-btn--solid ds-btn--sm">
            <?php echo $svg['dir']; ?>
            <span>Get Directions</span>
          </a>
          <a href="tel:+15407408937" class="ds-btn ds-btn--outlined-white ds-btn--sm">
            <?php echo $svg['phone']; ?>
            <span>Call Office</span>
          </a>
        </div>
      </div>
      <div class="ds-loc-map__embed ds-reveal">
        <iframe
          src="<?php echo esc_url( $maps_embed ); ?>"
          title="Map of <?php echo esc_attr( $loc['name'] ); ?>, <?php echo esc_attr( $loc['state'] ); ?>"
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
        <a href="#" class="ds-btn ds-btn--solid"<?php echo $schedule_attr; ?>>Schedule</a>
        <a href="tel:+15407408937" class="ds-btn ds-btn--outlined">Call (540) 740-8937</a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
