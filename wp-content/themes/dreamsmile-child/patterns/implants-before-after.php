<?php
/**
 * Title: Before / After Carousel
 * Slug: dreamsmile/implants-before-after
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';

$shots = [
  [ 'before-after-1.jpg', 'DreamSmile transformation — patient 1', 'Michael R.', 'Full Upper Restoration' ],
  [ 'before-after-2.jpg', 'DreamSmile transformation — patient 2', 'Sarah B.',   'Full Arch Dental Implants' ],
  [ 'before-after-3.jpg', 'DreamSmile transformation — patient 3', 'James D.',   'Implant-Supported Smile' ],
];
$count = count( $shots );
?>
<!-- wp:html -->
<section class="ds-before-after">
  <div class="ds-wrap">
    <div class="ds-before-after__head ds-reveal">
      <span class="ds-label">REAL RESULTS</span>
      <h2 class="ds-before-after__title">Real Patients. Real Transformations.</h2>
      <p class="ds-before-after__sub">Scroll through a few of our favorite DreamSmile transformations.</p>
    </div>

    <div class="ds-ba" data-ds-carousel data-count="<?php echo (int) $count; ?>" aria-roledescription="carousel">
      <div class="ds-ba__stage">
        <div class="ds-ba__track" data-ds-carousel-track>
          <?php foreach ( $shots as $i => $s ) : ?>
            <figure class="ds-ba__slide<?php echo $i === 0 ? ' is-active' : ''; ?>" data-index="<?php echo (int) $i; ?>" aria-roledescription="slide" aria-label="<?php echo (int) ( $i + 1 ); ?> of <?php echo (int) $count; ?>">
              <img src="<?php echo esc_url( $base . '/' . $s[0] ); ?>" alt="<?php echo esc_attr( $s[1] ); ?>" loading="lazy" />
              <figcaption class="ds-ba__cap">
                <span class="ds-ba__name"><?php echo esc_html( $s[2] ); ?></span>
                <span class="ds-ba__proc"><?php echo esc_html( $s[3] ); ?></span>
              </figcaption>
            </figure>
          <?php endforeach; ?>
        </div>

        <button type="button" class="ds-ba__nav ds-ba__nav--prev" data-ds-carousel-prev aria-label="Previous">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 6l-6 6 6 6"/></svg>
        </button>
        <button type="button" class="ds-ba__nav ds-ba__nav--next" data-ds-carousel-next aria-label="Next">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
        </button>

        <span class="ds-ba__counter" aria-live="polite" data-ds-carousel-counter>
          <span data-ds-carousel-current>1</span>
          <span class="ds-ba__counter-sep" aria-hidden="true">/</span>
          <span><?php echo (int) $count; ?></span>
        </span>
      </div>

      <div class="ds-ba__dots" data-ds-carousel-dots aria-hidden="true">
        <?php foreach ( $shots as $i => $s ) : ?>
          <button type="button" class="<?php echo $i === 0 ? 'is-active' : ''; ?>" data-ds-carousel-dot="<?php echo (int) $i; ?>" aria-label="Go to slide <?php echo (int) ( $i + 1 ); ?>"></button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
