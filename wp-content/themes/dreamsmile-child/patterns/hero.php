<?php
/**
 * Title: Hero
 * Slug: dreamsmile/hero
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$hero_bg = get_stylesheet_directory_uri() . '/assets/arrange/home-hero.jpg';
$office  = function_exists( 'ds_office_data' ) ? ds_office_data() : [ 'phone' => '(540) 740-8937', 'phone_tel' => '+15407408937' ];
?>
<!-- wp:html -->
<section class="ds-hero" id="hero">
  <div class="ds-hero__bg" role="img" aria-label="Dr. Burns with a patient"
       style="background-image: linear-gradient(100deg, rgba(58,58,58,0.92) 0%, rgba(58,58,58,0.72) 46%, rgba(58,58,58,0.34) 100%), url('<?php echo esc_url( $hero_bg ); ?>'); background-size: cover; background-position: center;">
  </div>

  <div class="ds-hero__inner">
    <div class="ds-hero__content ds-reveal">
      <h1 class="ds-hero__title">
        A DreamSmile&trade; You&rsquo;ll Never Have to <em>Hide</em>
      </h1>

      <div class="ds-hero__bullets">
        <div class="ds-check ds-check--on-dark">
          <span class="ds-check__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
          <span class="ds-check__text">A beautiful smile designed to be healthier &amp; longer-lasting</span>
        </div>
        <div class="ds-check ds-check--on-dark">
          <span class="ds-check__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
          <span class="ds-check__text">Proprietary procedure with a 98%+ success rate</span>
        </div>
        <div class="ds-check ds-check--on-dark">
          <span class="ds-check__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
          <span class="ds-check__text">A doctor who truly cares &mdash; gives you his personal cell number</span>
        </div>
        <div class="ds-check ds-check--on-dark">
          <span class="ds-check__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
          <span class="ds-check__text">Backed by the DreamSmile&trade; Lifetime Warranty<sup class="ds-hero__asterisk">*</sup></span>
        </div>
        <div class="ds-check ds-check--on-dark">
          <span class="ds-check__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
          <span class="ds-check__text">Same-Day Teeth &mdash; walk out with a beautiful temporary smile the day of surgery</span>
        </div>
      </div>

      <div class="ds-hero__cta-group">
        <a href="#quiz" class="ds-btn ds-btn--solid">Schedule Your Free Consultation</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-hero__phone">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>
          <span>Or call <strong><?php echo esc_html( $office['phone'] ); ?></strong></span>
        </a>
      </div>
    </div>
  </div>

  <div class="ds-hero__watermark" aria-hidden="true">DreamSmile<span class="ds-hero__watermark-tm">&trade;</span></div>
</section>
<!-- /wp:html -->
