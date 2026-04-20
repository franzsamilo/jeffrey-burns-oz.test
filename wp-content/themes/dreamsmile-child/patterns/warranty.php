<?php
/**
 * Title: Warranty
 * Slug: dreamsmile/warranty
 * Categories: dreamsmile
 *
 * The image has the heading, 3 tier cards, and CTA baked in. No extra layered button.
 */
defined( 'ABSPATH' ) || exit;
$img = get_stylesheet_directory_uri() . '/assets/arrange/dream-smile-warranty-section.png';
?>
<!-- wp:html -->
<section class="ds-warranty-image">
  <img class="ds-warranty-image__bg" src="<?php echo esc_url( $img ); ?>" alt="The DreamSmile Warranty — Silver, Platinum, Gold tiers" />
</section>
<!-- /wp:html -->
