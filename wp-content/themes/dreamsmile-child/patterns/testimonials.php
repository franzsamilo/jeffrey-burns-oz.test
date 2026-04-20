<?php
/**
 * Title: Testimonials
 * Slug: dreamsmile/testimonials
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;

$testimonials = [
  [ 'Sarah M.', 'DreamSmile Patient' ],
  [ 'James R.', 'DreamSmile Patient' ],
  [ 'Linda K.', 'DreamSmile Patient' ],
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

    <div class="ds-testimonials__grid">
      <?php foreach ( $testimonials as $t ) : ?>
        <div class="ds-testimonial ds-reveal">
          <div class="ds-testimonial__photo">Photo</div>
          <div class="ds-stars" aria-label="5 out of 5 stars">
            <?php echo str_repeat( $star, 5 ); ?>
          </div>
          <p class="ds-testimonial__name"><?php echo $t[0]; ?></p>
          <p class="ds-testimonial__title"><?php echo $t[1]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="ds-testimonials__cta ds-reveal">
      <a href="#quiz" class="ds-btn ds-btn--outlined">FIND OUT IF YOU&rsquo;RE A CANDIDATE FOR DENTAL IMPLANTS</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
