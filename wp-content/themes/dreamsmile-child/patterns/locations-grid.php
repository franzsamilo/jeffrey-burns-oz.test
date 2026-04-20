<?php
/**
 * Title: Locations Grid
 * Slug: dreamsmile/locations-grid
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';

$locations = [
  [ 'Harrisonburg', '1234 Main St, Harrisonburg, VA', 'Harrisonburg-8locations.jpg' ],
  [ 'Winchester',   '555 Valley Ave, Winchester, VA',  'Winchester-8locations.jpg'   ],
  [ 'Broadway',     '22 Center St, Broadway, VA',      'Broadway-8locations.jpg'     ],
  [ 'Bridgewater',  '101 College Dr, Bridgewater, VA', 'Bridgewater-8locations.jpg'  ],
  [ 'Luray',        '44 Cave Rd, Luray, VA',           'Luray-8locations.jpg'        ],
  [ 'Woodstock',    '77 Court St, Woodstock, VA',      'Woodstock-8locations.jpg'    ],
  [ 'Elkton',       '88 Route 33, Elkton, VA',         'Elkton-8locations.jpg'       ],
  [ 'Timberville',  '12 Orchard Ln, Timberville, VA',  'Timberville-8locations.jpg'  ],
];
?>
<!-- wp:html -->
<section class="ds-locations">
  <div class="ds-wrap">
    <div class="ds-locations__head ds-reveal">
      <span class="ds-label">LOCATIONS</span>
      <h2 class="ds-locations__title">8 Locations Serving You</h2>
      <p class="ds-locations__sub">Same premium care, closer to home &mdash; find the DreamSmile office nearest you.</p>
    </div>

    <div class="ds-locations__grid">
      <?php foreach ( $locations as $loc ) : ?>
        <article class="ds-location-card ds-reveal">
          <div class="ds-location-card__media">
            <img src="<?php echo esc_url( $base . '/' . $loc[2] ); ?>" alt="DreamSmile &mdash; <?php echo esc_attr( $loc[0] ); ?>" loading="lazy" />
          </div>
          <div class="ds-location-card__body">
            <h3 class="ds-location-card__name"><?php echo esc_html( $loc[0] ); ?></h3>
            <p class="ds-location-card__addr"><?php echo esc_html( $loc[1] ); ?></p>
            <a href="#" class="ds-btn ds-btn--outlined ds-btn--sm">Learn More &rarr;</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
