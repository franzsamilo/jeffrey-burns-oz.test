<?php
/**
 * Title: Patient Promise
 * Slug: dreamsmile/patient-promise
 * Categories: dreamsmile
 *
 * The image has heading + all 5 promises baked in. No layered button.
 */
defined( 'ABSPATH' ) || exit;
$img = get_stylesheet_directory_uri() . '/assets/arrange/patient-promise-section.png';
?>
<!-- wp:html -->
<section class="ds-promise-image">
  <img class="ds-promise-image__bg" src="<?php echo esc_url( $img ); ?>" alt="The Patient Promise — commitments from Dr. Burns and team" />
</section>
<!-- /wp:html -->
