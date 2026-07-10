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
      <p class="ds-intro-section__kicker">Introducing The</p>
      <h2 class="ds-intro-section__title">
        <img class="ds-intro-section__logo-img" src="<?php echo esc_url( $base ); ?>/nav-logo.png" alt="DreamSmile Logo" style="height: 60px; width: auto; margin-inline: auto; display: block;" /><sup class="ds-intro-section__tm">&trade;</sup>
      </h2>
      <p class="ds-intro-section__by">by Jeffrey S. Burns, DDS &middot; 30+ Years &middot; AACD Award Winner</p>
      <p class="ds-intro-section__valueprop">The Burns Protocol for same-day, confident smiles.</p>
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
