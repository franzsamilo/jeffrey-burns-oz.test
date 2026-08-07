<?php
/**
 * Title: Hero
 * Slug: dreamsmile/hero
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$hero_bg = get_stylesheet_directory_uri() . '/assets/arrange/hero-screenshot147.png';
$office  = function_exists( 'ds_office_data' ) ? ds_office_data() : [ 'phone' => '(540) 740-8937', 'phone_tel' => '+15407408937' ];
?>
<!-- wp:html -->
<section class="ds-hero" id="hero">
  <div class="ds-hero__bg" role="img" aria-label="Dr. Burns with a patient"
       style="background-image: url('<?php echo esc_url( $hero_bg ); ?>'); background-size: cover; background-position: center 25%;">
  </div>
  <div class="ds-hero__watermark" aria-hidden="true">DreamSmile<span class="ds-hero__watermark-tm">&trade;</span></div>
</section>
<!-- /wp:html -->
