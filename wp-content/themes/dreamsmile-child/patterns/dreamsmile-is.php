<?php
/**
 * Title: DreamSmile Is
 * Slug: dreamsmile/dreamsmile-is
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';
?>
<!-- wp:html -->
<section class="ds-is-section">
  <div class="ds-wrap">
    <div class="ds-is-section__head ds-reveal">
      <h2 class="ds-is-section__title">The DreamSmile is...</h2>
      <p class="ds-is-section__lede">
        A healthy, beautiful, natural functioning and looking smile using dental implants.
      </p>
      <p class="ds-is-section__lede">
        Say goodbye to <span class="ds-is-section__strike">hiding your mouth</span> and say <span class="ds-is-section__hello">hello to...</span>
      </p>
    </div>

    <div class="ds-is-rows">
      <div class="ds-is-row ds-reveal">
        <div class="ds-is-row__media"><img src="<?php echo esc_url( $base ); ?>/getting-out-of-pain.png" alt="Relief from dental pain" loading="lazy" /></div>
        <div class="ds-is-row__text"><div class="ds-is-row__bar"></div><h3>...getting out of pain</h3></div>
      </div>

      <div class="ds-is-row ds-is-row--right ds-reveal">
        <div class="ds-is-row__media"><img src="<?php echo esc_url( $base ); ?>/eating-the-foods-you-love.png" alt="Enjoying meals freely" loading="lazy" /></div>
        <div class="ds-is-row__text"><div class="ds-is-row__bar"></div><h3>...eating the foods that you love</h3></div>
      </div>

      <div class="ds-is-row ds-reveal">
        <div class="ds-is-row__media"><img src="<?php echo esc_url( $base ); ?>/speaking-naturally.png" alt="Speaking naturally" loading="lazy" /></div>
        <div class="ds-is-row__text"><div class="ds-is-row__bar"></div><h3>...speaking naturally</h3></div>
      </div>

      <div class="ds-is-row ds-is-row--right ds-reveal">
        <div class="ds-is-row__media"><img src="<?php echo esc_url( $base ); ?>/confidently-smiling-again.png" alt="Confident smile" loading="lazy" /></div>
        <div class="ds-is-row__text"><div class="ds-is-row__bar"></div><h3>...confidently smiling again</h3></div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
