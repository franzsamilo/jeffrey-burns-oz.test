<?php
/**
 * Title: Testimonials
 * Slug: dreamsmile/testimonials
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';

$testimonials = [
  [ '02_01_MIKE_15_V1.mp4',   'Mike',   'DreamSmile Patient' ],
  [ '02_02_DANNY_15_V1.mp4',  'Danny',  'DreamSmile Patient' ],
  [ '02_03_KELLY_15_V1.mp4',  'Kelly',  'DreamSmile Patient' ],
  [ '02_04_ANGELA_15_V1.mp4', 'Angela', 'DreamSmile Patient' ],
  [ '02_05_RON_15_V1.mp4',    'Ron',    'DreamSmile Patient' ],
];

$star = '<svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
?>
<!-- wp:html -->
<section class="ds-testimonials">
  <div class="ds-wrap">
    <div class="ds-testimonials__head ds-reveal">
      <h2 class="ds-testimonials__title">Real Results. Real Patients.</h2>
      <p class="ds-testimonials__sub">Real results from real patients who trusted Dr. Burns with their DreamSmile.</p>
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
                  src="<?php echo esc_url( $base . '/' . $t[0] ); ?>"
                  preload="metadata"
                  playsinline
                  muted
                  aria-label="<?php echo esc_attr( $t[1] ); ?> &mdash; DreamSmile testimonial"
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
