<?php
/**
 * Title: Locations Grid
 * Slug: dreamsmile/locations-grid
 * Categories: dreamsmile
 *
 * Index of communities Dr. Burns serves. There is ONE physical practice
 * (see ds_office_data() in functions.php). Each card links to a city-targeted
 * SEO landing page that uses "Dental Implants Near [City]" framing.
 */
defined( 'ABSPATH' ) || exit;
$base     = get_stylesheet_directory_uri() . '/assets/arrange';
$base_dir = trailingslashit( get_stylesheet_directory() ) . 'assets/arrange/';
$office   = ds_office_data();

// Per-card image fallback: cities that don't have a real photo on disk yet
// drop back to the hero image so the grid never shows broken-image icons.
$ds_locations_fallback = $base . '/hero-image.png';

/**
 * Per-city cards. `name` is the community served, `image` is a city-flavor
 * photo (visual context, NOT "our office in X"), `slug` routes to the
 * matching SEO landing page.
 */
$locations = [
  [ 'Harrisonburg', 'Serving Harrisonburg &amp; Rockingham County',  'Harrisonburg-8locations.jpg', 'harrisonburg', false ],
  [ 'Winchester',   'Serving Winchester &amp; Frederick County',     'Winchester-8locations.jpg',   'winchester',   false ],
  [ 'Broadway',     'Serving Broadway &amp; the central valley',     'Broadway-8locations.jpg',     'broadway',     false ],
  [ 'Bridgewater',  'Serving Bridgewater &amp; the College',         'Bridgewater-8locations.jpg',  'bridgewater',  false ],
  [ 'Luray',        'Serving Luray &amp; Page County',               'Luray-8locations.jpg',        'luray',        false ],
  [ 'Woodstock',    'Serving Woodstock &amp; Shenandoah County',     'Woodstock-8locations.jpg',    'woodstock',    false ],
  [ 'Elkton',       'Serving Elkton &amp; east Rockingham',          'Elkton-8locations.jpg',       'elkton',       false ],
  [ 'Timberville',  'Serving Timberville &amp; the orchard country', 'Timberville-8locations.jpg', 'timberville', false ],
];
?>
<!-- wp:html -->
<section class="ds-locations">
  <div class="ds-wrap">
    <div class="ds-locations__head ds-reveal">
      <span class="ds-label">COMMUNITIES WE SERVE</span>
      <h2 class="ds-locations__title">One Office. The Whole Shenandoah Valley.</h2>
      <p class="ds-locations__sub">Dr. Burns&rsquo;s dental implant practice is based at <strong>9626 South Congress St, <?php echo esc_html( $office['home_city'] ); ?>, <?php echo esc_html( $office['home_state'] ); ?></strong> &mdash; centrally located on I-81, serving patients across the valley with the same premium care, regardless of where you call home.</p>
    </div>

    <div class="ds-locations__grid">
      <?php foreach ( $locations as $loc ) :
        $img_url = file_exists( $base_dir . $loc[2] )
          ? $base . '/' . $loc[2]
          : $ds_locations_fallback;
      ?>
        <article class="ds-location-card ds-reveal">
          <div class="ds-location-card__media">
            <img src="<?php echo esc_url( $img_url ); ?>"
                 alt="DreamSmile dental implants &mdash; serving <?php echo esc_attr( $loc[0] ); ?>"
                 loading="lazy"
                 onerror="this.onerror=null; this.src='<?php echo esc_url( $ds_locations_fallback ); ?>'" />
            <?php if ( $loc[4] ) : ?>
              <span class="ds-location-card__pin">Office Location</span>
            <?php endif; ?>
          </div>
          <div class="ds-location-card__body">
            <h3 class="ds-location-card__name">Dental Implants <?php echo $loc[4] ? 'in' : 'Near'; ?> <?php echo esc_html( $loc[0] ); ?></h3>
            <p class="ds-location-card__addr"><?php echo $loc[1]; ?></p>
            <a href="/<?php echo esc_attr( $loc[3] ); ?>/" class="ds-btn ds-btn--outlined ds-btn--sm">Learn More &rarr;</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
