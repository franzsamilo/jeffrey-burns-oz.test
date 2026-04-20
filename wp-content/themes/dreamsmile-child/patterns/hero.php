<?php
/**
 * Title: Hero
 * Slug: dreamsmile/hero
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$hero_bg = get_stylesheet_directory_uri() . '/assets/arrange/hero-image.png';
?>
<!-- wp:html -->
<section class="ds-hero" id="hero">
  <div class="ds-hero__bg" role="img" aria-label="Dr. Burns with a patient"
       style="background-image: linear-gradient(135deg, rgba(58,58,58,0.92) 0%, rgba(58,58,58,0.7) 50%, rgba(58,58,58,0.5) 100%), url('<?php echo esc_url( $hero_bg ); ?>'); background-size: cover; background-position: center;">
  </div>

  <div class="ds-hero__inner">
    <div class="ds-hero__content ds-reveal">
      <h1 class="ds-hero__title">
        A Dream Smile You Never Have to <em>Hide</em>
      </h1>

      <div class="ds-hero__bullets">
        <div class="ds-check ds-check--on-dark">
          <span class="ds-check__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
          <span class="ds-check__text">A doctor who truly cares &mdash; gives you his personal cell number</span>
        </div>
        <div class="ds-check ds-check--on-dark">
          <span class="ds-check__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
          <span class="ds-check__text">30 years of dental implant service and experience</span>
        </div>
        <div class="ds-check ds-check--on-dark">
          <span class="ds-check__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
          <span class="ds-check__text">No 3rd-parties. A one-stop shop. Everything in-house.</span>
        </div>
      </div>

      <a href="#quiz" class="ds-btn ds-btn--solid">Schedule Your Free Consultation</a>
    </div>
  </div>

  <div class="ds-hero__watermark" aria-hidden="true">DreamSmile</div>
</section>
<!-- /wp:html -->
