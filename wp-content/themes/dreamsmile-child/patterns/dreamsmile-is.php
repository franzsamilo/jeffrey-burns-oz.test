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
      <h2 class="ds-is-section__title">The DreamSmile&trade; is...</h2>
      <p class="ds-is-section__lede">
        A healthy, beautiful, natural functioning and looking smile using dental implants.
      </p>
      <p class="ds-is-section__lede ds-is-section__lede--tagline">
        <strong>Say goodbye to</strong> <span class="ds-is-section__strike">hiding your mouth</span> <strong>and say</strong> <span class="ds-is-section__hello">hello to...</span>
      </p>
    </div>

    <?php
    // Compact bullets + one watermarked patient photo — replaces the 4-row
    // zigzag (client: "I don't like that we have to scroll so much").
    $benefits = [
      'getting out of <strong>pain</strong>',
      'eating the <strong>foods that you love</strong>',
      '<strong>speaking</strong> naturally',
      'confidently <strong>smiling again</strong>',
    ];
    // TODO: replace with a single real patient-smiling photo when supplied.
    $is_photo = esc_url( $base ) . '/confidently-smiling-again.png';
    ?>
    <div class="ds-is-compact">
      <ul class="ds-is-benefits ds-reveal">
        <?php foreach ( $benefits as $b ) : ?>
          <li class="ds-is-benefit">
            <span class="ds-is-benefit__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
            <span class="ds-is-benefit__text">...<?php echo $b; ?></span>
          </li>
        <?php endforeach; ?>
      </ul>

      <figure class="ds-is-figure ds-reveal">
        <img src="<?php echo $is_photo; ?>" alt="A real patient smiling confidently with their DreamSmile" loading="lazy" />
        <span class="ds-is-figure__watermark" aria-hidden="true">DreamSmile<sup>&trade;</sup></span>
      </figure>
    </div>

    <div class="ds-is-section__foot ds-reveal">
      <h2 class="ds-see-yourself__title">Can You See Yourself with Your DreamSmile&trade;?</h2>
    </div>
  </div>
</section>
<!-- /wp:html -->
