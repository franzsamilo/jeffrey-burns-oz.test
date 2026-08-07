<?php
/**
 * Title: Testimonials
 * Slug: dreamsmile/testimonials
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';

// Poster frames come from the client's "Before and After Testimonial" set —
// each one is the patient holding a framed photo of their old smile, so the
// card reads as a before/after even before anyone presses play. Without a
// poster these videos render as an empty black frame.
$testimonials = [
  [ 'testi-angela.mp4', 'Angela Burker', 'DreamSmile™ Patient', 'testimonial-ba-angela.jpg' ],
  [ 'testi-danny.mp4',  'Danny',          'DreamSmile™ Patient', 'testimonial-ba-danny.jpg'  ],
  [ 'testi-kelly.mp4',  'Kelly',          'DreamSmile™ Patient', 'testimonial-ba-kelly.jpg'  ],
  [ 'testi-mike.mp4',   'Mike Woolard',   'DreamSmile™ Patient', 'testimonial-ba-mike.jpg'   ],
  [ 'testi-ron.mp4',    'Ron',            'DreamSmile™ Patient', 'testimonial-ba-ron.jpg'    ],
];

$star = '<svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
?>
<!-- wp:html -->
<section class="ds-testimonials">
  <div class="ds-wrap">
    <div class="ds-testimonials__head ds-reveal">
      <h2 class="ds-testimonials__title">Real Results. Real Patients.</h2>
      <p class="ds-testimonials__sub">Real results from real patients who trusted Dr. Burns with their DreamSmile<sup class="ds-tm">&trade;</sup>.</p>
    </div>

    <div class="ds-testi-rail ds-reveal" data-ds-testi-rail aria-roledescription="carousel" aria-label="Patient testimonials">
      <button type="button" class="ds-testi-rail__nav ds-testi-rail__nav--prev" data-ds-testi-prev aria-label="Previous testimonials">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 6l-6 6 6 6"/></svg>
      </button>

      <div class="ds-testi-rail__viewport" data-ds-testi-viewport>
        <div class="ds-testi-rail__track" data-ds-testi-track>
          <?php foreach ( $testimonials as $i => $t ) : ?>
            <article class="ds-testi-card" data-ds-testi-card="<?php echo (int) $i; ?>" aria-roledescription="slide">
              <div class="ds-testi-card__frame">
                <video
                  class="ds-testi-card__video"
                  src="<?php echo esc_url( ds_get_video_url( $t[0] ) ); ?>"
                  poster="<?php echo esc_url( $base . '/' . $t[3] ); ?>"
                  preload="metadata"
                  playsinline
                  muted
                  aria-label="<?php echo esc_attr( $t[1] ); ?> &mdash; DreamSmile testimonial, before and after"
                ></video>
                <button type="button" class="ds-testi-card__play" data-ds-testi-play aria-label="Play <?php echo esc_attr( $t[1] ); ?>&rsquo;s testimonial">
                  <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7L8 5z"/></svg>
                </button>
              </div>
              <div class="ds-testi-card__meta">
                <div class="ds-stars" aria-label="5 out of 5 stars">
                  <?php echo str_repeat( $star, 5 ); ?>
                </div>
                <p class="ds-testi-card__name"><?php echo esc_html( $t[1] ); ?></p>
                <p class="ds-testi-card__role"><?php echo esc_html( $t[2] ); ?></p>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>

      <button type="button" class="ds-testi-rail__nav ds-testi-rail__nav--next" data-ds-testi-next aria-label="Next testimonials">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
      </button>

      <div class="ds-testi-rail__dots" data-ds-testi-dots aria-hidden="true"></div>
    </div>

    <div class="ds-testimonials__cta ds-reveal">
      <a href="#quiz" class="ds-btn ds-btn--solid">FIND OUT IF YOU&rsquo;RE A CANDIDATE FOR DENTAL IMPLANTS</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
