<?php
/**
 * Title: Introducing DreamSmile
 * Slug: dreamsmile/introducing-dreamsmile
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';
?>
<!-- wp:html -->
<section class="ds-intro-section">
  <div class="ds-wrap">
    <div class="ds-intro-section__head ds-reveal">
      <h2 class="ds-intro-section__title">
        Introducing The <span class="ds-intro-section__script">DreamSmile</span>
      </h2>
      <p class="ds-intro-section__by">by Jeffrey S. Burns DDS</p>
    </div>

    <div class="ds-intro-grid">
      <img class="ds-intro-card ds-reveal" src="<?php echo esc_url( $base ); ?>/introducing-card-1.png" alt="Smiling DreamSmile patient" loading="lazy" />
      <img class="ds-intro-card ds-reveal" src="<?php echo esc_url( $base ); ?>/introducing-card-2.png" alt="Smiling DreamSmile patient" loading="lazy" />
      <img class="ds-intro-card ds-reveal" src="<?php echo esc_url( $base ); ?>/introducing-card-3.png" alt="Smiling DreamSmile patient" loading="lazy" />
      <img class="ds-intro-card ds-reveal" src="<?php echo esc_url( $base ); ?>/introducing-card-4.png" alt="Smiling DreamSmile patient" loading="lazy" />
    </div>
  </div>
</section>
<!-- /wp:html -->
