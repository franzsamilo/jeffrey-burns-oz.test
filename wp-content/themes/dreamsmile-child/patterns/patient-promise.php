<?php
/**
 * Title: Patient Promise
 * Slug: dreamsmile/patient-promise
 * Categories: dreamsmile
 *
 * Background photo + coded promise list + working schedule CTA. Visual
 * matches the original `the-patient-promise.jpg` backdrop with a dark
 * scrim, but every promise + the button is real markup.
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';
$bg   = $base . '/the-patient-promise.jpg';

$promises = [
  'We promise to always put you and your healthcare first',
  'We promise you&rsquo;ll never feel like a number here',
  'We promise to provide you with nationally recognized, premium dental care',
  'We promise that everything we do is based on your safety, comfort, and outcome',
  'We promise to provide you with a world-class beautiful smile',
];
?>
<!-- wp:html -->
<section class="ds-promise" id="promise">
  <div class="ds-promise__bg" style="background-image: url('<?php echo esc_url( $bg ); ?>');" aria-hidden="true"></div>
  <div class="ds-promise__scrim" aria-hidden="true"></div>

  <div class="ds-wrap ds-promise__inner">
    <h2 class="ds-promise__title ds-reveal">The Patient Promise</h2>
    <ul class="ds-promise__list">
      <?php foreach ( $promises as $i => $text ) : ?>
        <li class="ds-promise__item ds-reveal" style="animation-delay: <?php echo ( $i * 60 ); ?>ms">
          <span class="ds-promise__check" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
          </span>
          <span class="ds-promise__text"><?php echo $text; ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="ds-promise__cta ds-reveal">
      <a href="#quiz" class="ds-btn ds-btn--solid" data-ds-schedule-location="Patient Promise">Schedule Free DreamSmile&trade; Assessment</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
