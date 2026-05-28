<?php
/**
 * Title: Primary Services
 * Slug: dreamsmile/primary-services
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';
?>
<!-- wp:html -->
<section class="ds-services" id="services">
  <div class="ds-wrap">
    <h2 class="ds-services__title ds-reveal">Our Primary Services</h2>

    <div class="ds-services__grid">
      <div class="ds-service-card ds-reveal">
        <div class="ds-service-card__media"><img src="<?php echo esc_url( $base ); ?>/dental-implants.png" alt="Dental implants" loading="lazy" /></div>
        <h3 class="ds-service-card__title">Dental Implants</h3>
        <p class="ds-service-card__desc">Restore your smile with permanent, natural-looking dental implants. Dr. Burns personally handles every case from start to finish.</p>
        <a href="/dental-implants/" class="ds-btn ds-btn--solid ds-btn--sm">GET YOUR DREAMSMILE</a>
      </div>

      <div class="ds-service-card ds-reveal">
        <div class="ds-service-card__media"><img src="<?php echo esc_url( $base ); ?>/general-dentistry.png" alt="General dentistry" loading="lazy" /></div>
        <h3 class="ds-service-card__title">General Dentistry</h3>
        <p class="ds-service-card__desc">Comprehensive dental care for your entire family. From routine cleanings to advanced treatments, all under one roof.</p>
        <a href="/general-dentistry/" class="ds-btn ds-btn--solid ds-btn--sm">CHOOSE YOUR SERVICE</a>
      </div>

      <div class="ds-service-card ds-reveal">
        <div class="ds-service-card__media"><img src="<?php echo esc_url( $base ); ?>/cosmetic-dentistry.png" alt="Cosmetic dentistry" loading="lazy" /></div>
        <h3 class="ds-service-card__title">Cosmetic Dentistry</h3>
        <p class="ds-service-card__desc">Transform your smile with veneers, whitening, and cosmetic treatments designed to give you the confidence you deserve.</p>
        <a href="/cosmetic-dentistry/" class="ds-btn ds-btn--solid ds-btn--sm">LEARN MORE</a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
