<?php
/**
 * Title: Town Page (old-site copy)
 * Slug: dreamsmile/town-page
 * Categories: dreamsmile
 * Inserter: no
 *
 * Body of the /contact-us/ town pages (ds_town_pages()) whose copy is in
 * inc/town-pages.php: the SEO team's Rev 2 text (Nov 2026), in the theme's
 * location-page components. Like single-location.php, it is a local-SEO page:
 * the address, hours, map and patient stories are the one New Market office's.
 *
 * The blocks run in the order the Rev 2 docs place them:
 *   H1 + intro            → .ds-loc-hero
 *   the eligibility survey → inline GHL survey on a charcoal band, at the old
 *                            #see-if-you-qualify anchor
 *   section 1             → .ds-loc-intro (heading beside its text)
 *   sections 2–4          → .ds-loc-points (three cards on grey)
 *   details               → .ds-loc-intro--wide: full-width sections with a
 *                            table, steps, or both
 *   Meet Dr. Jeffrey Burns → .ds-loc-doctor (dark)
 *   the DreamSmile blurb   → .ds-loc-dreamsmile, beside the patient-stories video
 *   travel + service area → .ds-loc-map, "Visit us" (dark)
 *   faq                   → .ds-faq accordion (+ FAQPage schema, functions.php)
 *   section 5             → .ds-loc-cta, the closing call to action
 * Light and dark bands alternate, with never more than three light sections
 * in a row (client review notes: "needs more greys").
 *
 * Every heading stays an H2, even where a card styles it small, and FAQ
 * questions are H3s, as in the docs. The two shared blurbs carry the
 * DreamSmile™ mark and fix two typos in the old text ("taught to Dentists",
 * "long-lasting DreamSmile"). Renders nothing for a page without copy.
 *
 * Text pasted into the page in wp-admin replaces the theme's copy once it no
 * longer repeats the theme's headings (ds_town_render_copy(), SEO tracker
 * Nov 2026). It fills the same slots: H1 + intro, first H2 section, middle
 * H2 sections, last H2 section. Three middle sections keep the three columns;
 * any other number stacks as heading-beside-text rows on alternating bands.
 * Its lists and H3s keep their tags. The theme's details and FAQ belong to
 * the theme's copy, so pasted text shows without them.
 */
defined( 'ABSPATH' ) || exit;

$town = ( is_page() && ( $p = get_post() ) ) ? ds_town_render_copy( $p ) : null;
if ( ! $town ) { return; }

$base     = get_stylesheet_directory_uri() . '/assets/arrange';
$office   = ds_office_data();
$img_dims = wp_getimagesize( get_stylesheet_directory() . '/assets/arrange/' . $town['image'] );

$points  = $town['sections'];
$lead    = array_shift( $points );
$closing = array_pop( $points );
// The theme's cards name their own icon. The fallback order is the old
// pages' benefits, technology and comfort.
$icons = [ 'tooth', 'cpu', 'shield' ];
// Pasted text can put anything in between, so its icons follow the heading.
$icon_for = function ( $pt, $i ) use ( $town, $icons ) {
  $heading = $pt[0];
  if ( 'editor' !== $town['source'] && ! empty( $pt[2] ) ) {
    return $pt[2];
  }
  if ( 'editor' === $town['source'] ) {
    $h = strtolower( wp_strip_all_tags( $heading ) );
    foreach ( [
      'sparkle' => [ 'cosmetic', 'veneer', 'whiten', 'bonding', 'makeover', 'aesthetic' ],
      'cpu'     => [ 'technolog', '3d', 'scan', 'imaging', 'digital' ],
      'shield'  => [ 'comfort', 'sedation', 'anxi', 'why', 'choose', 'trust', 'care', 'safe' ],
      'tooth'   => [ 'implant', 'restor', 'crown', 'bridge', 'denture', 'filling', 'extraction', 'tooth', 'teeth' ],
    ] as $icon => $words ) {
      foreach ( $words as $w ) {
        if ( false !== strpos( $h, $w ) ) { return $icon; }
      }
    }
  }
  return $icons[ $i % 3 ];
};
// A comparison table from inc/town-pages.php. The first cell of each row is
// its header. Under 640px each row becomes a card, so every cell carries its
// column name (data-label); the ARIA roles keep it a table for screen readers
// once CSS changes its display. 'em' tints the column or row the copy argues for.
$table = function ( array $t ) {
  $head   = $t['head'] ?? [];
  $em_col = $t['em']['col'] ?? null;
  $em_row = $t['em']['row'] ?? null;
  $html   = '<div class="ds-loc-table-wrap"><table class="ds-loc-table" role="table">';
  if ( $head ) {
    $html .= '<thead role="rowgroup"><tr role="row">';
    foreach ( $head as $c => $h ) {
      $em    = $c === $em_col ? ' class="is-em"' : '';
      $html .= '' === $h ? '<td role="cell"></td>' : '<th scope="col" role="columnheader"' . $em . '>' . $h . '</th>';
    }
    $html .= '</tr></thead>';
  }
  $html .= '<tbody role="rowgroup">';
  foreach ( $t['rows'] as $r => $row ) {
    $html .= '<tr role="row"' . ( $r === $em_row ? ' class="is-em"' : '' ) . '>';
    foreach ( $row as $c => $cell ) {
      if ( 0 === $c ) {
        $html .= '<th scope="row" role="rowheader">' . $cell . '</th>';
        continue;
      }
      $label = isset( $head[ $c ] ) ? trim( wp_strip_all_tags( $head[ $c ] ) ) : '';
      $html .= '<td role="cell"' . ( '' !== $label ? ' data-label="' . esc_attr( $label ) . '"' : '' ) . ( $c === $em_col ? ' class="is-em"' : '' ) . '>' . $cell . '</td>';
    }
    $html .= '</tr>';
  }
  return $html . '</tbody></table></div>';
};
// One block of copy: a paragraph (string), a list or subheading ([ 'ul'|'ol'|'h3'
// => inner HTML ], from inc/town-pages.php or ds_town_editor_copy()), or a table.
$block = function ( $b, $p_class = '' ) use ( $table ) {
  if ( is_string( $b ) ) {
    return '<p' . ( $p_class ? ' class="' . esc_attr( $p_class ) . '"' : '' ) . '>' . $b . '</p>';
  }
  $tag = key( $b );
  if ( 'table' === $tag ) {
    return $table( current( $b ) );
  }
  return '<' . $tag . ' class="' . ( 'h3' === $tag ? 'ds-loc-subhead' : 'ds-loc-list' ) . '">' . current( $b ) . '</' . $tag . '>';
};
// "Proudly serving…" from the live site's town pages, which the Rev 2 docs
// restore under the "Visit us" text. The same on all eight.
$areas = 'Proudly serving Shenandoah County, Page County, Rockingham County, and the communities of Timberville, Broadway, Mount Jackson, Stanley, Luray, Harrisonburg, Quicksburg, Woodstock, Basye, Edinburg, Elkton, and Bridgewater.';

$svg = [
  'pin'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
  'phone'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>',
  'star'   => '<svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M12 2l2.9 6.3 6.8.7-5.1 4.7 1.5 6.7L12 17l-6.1 3.4 1.5-6.7L2.3 9l6.8-.7L12 2z"/></svg>',
  'dir'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l18-7-7 18-2.5-7.5L3 11z"/></svg>',
  'tooth'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/></svg>',
  'cpu'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 14h3M1 9h3M1 14h3"/></svg>',
  'shield' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
  'sparkle'=> '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3z"/><path d="M19 15l.8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8L19 15z"/></svg>',
  'check'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8 12.5l2.7 2.7L16.2 9.6"/></svg>',
  'clock'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.2 2"/></svg>',
  'award'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="9" r="6"/><path d="M8.6 14.1L7 22l5-3 5 3-1.6-7.9"/></svg>',
  'dollar' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 6H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
  'card'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20M6 15h4"/></svg>',
];

$schedule_attr = ' data-ds-schedule-location="' . esc_attr( $town['town'] ) . '"';
$maps_embed    = 'https://www.google.com/maps?q=' . rawurlencode( $office['maps_q'] ) . '&output=embed';
$maps_dir      = 'https://www.google.com/maps/dir/?api=1&origin=' . rawurlencode( $town['town'] . ', ' . $town['state'] ) . '&destination=' . rawurlencode( $office['maps_q'] );
?>
<!-- wp:html -->
<section class="ds-loc-hero ds-loc-hero--town">
  <div class="ds-wrap">
    <div class="ds-loc-hero__grid">
      <div class="ds-loc-hero__copy ds-reveal">
        <div class="ds-loc-hero__badge">
          <?php echo $svg['star']; ?>
          <span><strong>5.0</strong> &middot; Google rating</span>
        </div>
        <h1 class="ds-loc-hero__title"><?php echo esc_html( $town['h1'] ); ?></h1>
        <?php foreach ( $town['intro'] as $line ) { echo $block( $line, 'ds-loc-hero__sub' ); } ?>
        <div class="ds-loc-hero__meta">
          <span class="ds-loc-hero__meta-item">
            <?php echo $svg['pin']; ?>
            <span><?php echo esc_html( $office['address'] ); ?></span>
          </span>
          <span class="ds-loc-hero__meta-item">
            <?php echo $svg['phone']; ?>
            <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a>
          </span>
        </div>
        <div class="ds-loc-hero__ctas">
          <a href="#quiz" class="ds-btn ds-btn--solid"<?php echo $schedule_attr; ?>>Schedule Your DreamSmile<sup class="ds-tm">&trade;</sup> Assessment</a>
          <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call Now</a>
        </div>
      </div>
      <div class="ds-loc-hero__media ds-reveal">
        <img src="<?php echo esc_url( $base . '/' . $town['image'] ); ?>" alt="<?php echo esc_attr( $town['image_alt'] ); ?>" fetchpriority="high"<?php echo $img_dims ? ' width="' . (int) $img_dims[0] . '" height="' . (int) $img_dims[1] . '"' : ''; ?> />
      </div>
    </div>
  </div>
</section>

<section class="ds-loc-survey" id="see-if-you-qualify">
  <div class="ds-wrap">
    <div class="ds-loc-why__head ds-reveal">
      <span class="ds-label">30-SECOND ELIGIBILITY QUIZ</span>
      <h2 class="ds-loc-why__title">See How Dental Implants Can <span class="ds-italic">Change Your Life!</span></h2>
    </div>
    <div class="ds-loc-survey__card">
      <?php // lead-embeds.js puts the survey iframe here; every survey CTA on the page then scrolls to it. ?>
      <div class="ds-survey__frame" data-ds-survey-inline></div>
    </div>
    <p class="ds-loc-survey__note">Prefer to talk it through? Call <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a>.</p>
  </div>
</section>

<section class="ds-loc-intro">
  <div class="ds-wrap ds-loc-intro__grid">
    <div class="ds-loc-intro__head ds-reveal">
      <span class="ds-label">DENTAL IMPLANTS NEAR <?php echo esc_html( strtoupper( $town['town'] ) ); ?></span>
      <h2 class="ds-loc-intro__title"><?php echo $lead[0]; ?></h2>
    </div>
    <div class="ds-loc-intro__body ds-reveal">
      <?php foreach ( $lead[1] as $para ) { echo $block( $para ); } ?>
    </div>
  </div>
</section>

<?php if ( 3 === count( $points ) ) : ?>
<section class="ds-loc-points">
  <div class="ds-wrap ds-loc-points__grid">
    <?php foreach ( $points as $i => $pt ) : ?>
      <div class="ds-loc-point ds-reveal">
        <span class="ds-loc-point__icon"><?php echo $svg[ $icon_for( $pt, $i ) ] ?? $svg['tooth']; ?></span>
        <h2 class="ds-loc-point__title"><?php echo $pt[0]; ?></h2>
        <?php foreach ( $pt[1] as $para ) { echo $block( $para, 'ds-loc-point__text' ); } ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php else : ?>
  <?php foreach ( $points as $i => $pt ) : ?>
<section class="ds-loc-intro<?php echo 0 === $i % 2 ? ' ds-loc-intro--grey' : ''; ?>">
  <div class="ds-wrap ds-loc-intro__grid">
    <div class="ds-loc-intro__head ds-reveal">
      <h2 class="ds-loc-intro__title"><?php echo $pt[0]; ?></h2>
    </div>
    <div class="ds-loc-intro__body ds-reveal">
      <?php foreach ( $pt[1] as $para ) { echo $block( $para ); } ?>
    </div>
  </div>
</section>
  <?php endforeach; ?>
<?php endif; ?>

<?php if ( ! empty( $town['details'] ) ) : ?>
<section class="ds-loc-intro ds-loc-intro--wide">
  <div class="ds-wrap ds-loc-details">
    <?php foreach ( $town['details'] as $d ) : ?>
      <div class="ds-loc-detail ds-reveal">
        <h2 class="ds-loc-intro__title"><?php echo $d[0]; ?></h2>
        <div class="ds-loc-intro__body ds-loc-detail__body">
          <?php foreach ( $d[1] as $b ) { echo $block( $b ); } ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<section class="ds-loc-doctor">
  <div class="ds-wrap">
    <div class="ds-loc-doctor__grid">
      <div class="ds-loc-doctor__media ds-reveal">
        <img src="<?php echo esc_url( $base . '/dr-burns-portrait.webp' ); ?>" alt="Dr. Jeffrey S. Burns, DDS" width="571" height="800" loading="lazy" />
      </div>
      <div class="ds-reveal">
        <span class="ds-label">MEET THE DOCTOR</span>
        <h2 class="ds-loc-doctor__name">Meet Dr. Jeffrey Burns</h2>
        <p class="ds-loc-doctor__bio">Dr. Jeffrey S. Burns is a nationally recognized leader in dental implantology and smile design with over 30 years of hands-on implant experience. He is the creator of the Burns Protocol, a proven multi-step system he has taught to dentists across the United States to consistently deliver healthy, long-lasting DreamSmiles<sup class="ds-tm">&trade;</sup>. Dr. Burns combines elite expertise with genuine care&mdash;so much so that every DreamSmile<sup class="ds-tm">&trade;</sup> patient receives his personal cell phone number, ensuring direct access, confidence, and peace of mind throughout their transformation.</p>
        <a href="/meet-dr-burns/" class="ds-btn ds-btn--outlined-white ds-btn--sm">Learn More<span class="ds-sr-only"> about Dr. Burns</span></a>
      </div>
    </div>
  </div>
</section>

<section class="ds-loc-dreamsmile">
  <div class="ds-wrap ds-loc-dreamsmile__grid">
    <div class="ds-loc-dreamsmile__copy ds-reveal">
      <img class="ds-loc-dreamsmile__logo" src="<?php echo esc_url( $base . '/dreamsmile-banner-logo.png' ); ?>" alt="DreamSmile by Jeffrey S. Burns DDS" width="700" height="268" loading="lazy" />
      <p class="ds-loc-dreamsmile__text">A DreamSmile<sup class="ds-tm">&trade;</sup> is more than a beautiful smile&mdash;it&rsquo;s a lifetime investment in confidence, health, and quality. Designed by nationally recognized implant expert Dr. Jeffrey S. Burns, each DreamSmile<sup class="ds-tm">&trade;</sup> is crafted using his proprietary Burns Protocol, a precise 6-step process that delivers consistently stunning, natural-looking results. Built with the finest, strongest materials available and protected by a DreamSmile<sup class="ds-tm">&trade;</sup> Warranty&mdash;up to lifetime coverage&mdash;every detail is engineered for peace of mind. Patients also receive a DreamSmile<sup class="ds-tm">&trade;</sup> Care Kit to protect their smile and enjoy it fully from day one.</p>
      <a href="#see-if-you-qualify" class="ds-btn ds-btn--solid">See If You Qualify for the DreamSmile<sup class="ds-tm">&trade;</sup></a>
    </div>
    <figure class="ds-loc-dreamsmile__media ds-reveal">
      <div class="ds-loc-testimonials__media">
        <video
          class="ds-loc-testimonials__video"
          src="<?php echo esc_url( ds_get_video_url( 'Hall-of-Fame-Patients.mp4' ) ); ?>"
          <?php echo ds_video_load_attrs( 'Hall-of-Fame-Patients.mp4' ); ?>
          playsinline
          muted
          controls
          aria-label="Dr. Burns Hall of Fame &mdash; DreamSmile patient stories"
        ></video>
      </div>
      <figcaption>Real DreamSmile<sup class="ds-tm">&trade;</sup> patients, in their own words.</figcaption>
    </figure>
  </div>
</section>

<section class="ds-loc-map">
  <div class="ds-wrap">
    <div class="ds-loc-map__head ds-reveal">
      <span class="ds-label">MAP &amp; DIRECTIONS</span>
      <h2 class="ds-loc-map__title">Visit us &mdash; a short drive from <?php echo esc_html( $town['town'] ); ?>.</h2>
      <?php foreach ( (array) $town['travel'] as $line ) : ?>
        <p class="ds-loc-map__travel ds-loc-map__travel--long"><?php echo $line; ?></p>
      <?php endforeach; ?>
      <p class="ds-loc-map__areas"><?php echo esc_html( $areas ); ?></p>
    </div>
    <div class="ds-loc-map__grid">
      <div class="ds-loc-map__info ds-reveal">
        <h3 class="ds-loc-map__city"><?php echo esc_html( $office['home_city'] ); ?>, <?php echo esc_html( $office['home_state'] ); ?></h3>
        <p class="ds-loc-map__addr"><?php echo esc_html( $office['address'] ); ?></p>
        <p class="ds-loc-map__hours"><?php echo $office['hours']; ?></p>
        <div class="ds-loc-map__ctas">
          <a href="<?php echo esc_url( $maps_dir ); ?>" target="_blank" rel="noopener" class="ds-btn ds-btn--solid ds-btn--sm">
            <?php echo $svg['dir']; ?>
            <span>Directions from <?php echo esc_html( $town['town'] ); ?></span>
          </a>
          <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined-white ds-btn--sm">
            <?php echo $svg['phone']; ?>
            <span>Call Office</span>
          </a>
        </div>
      </div>
      <div class="ds-loc-map__embed ds-reveal">
        <iframe
          src="<?php echo esc_url( $maps_embed ); ?>"
          title="Map of Dr. Burns&rsquo;s dental implant office in <?php echo esc_attr( $office['home_city'] ); ?>, <?php echo esc_attr( $office['home_state'] ); ?>"
          loading="lazy"
          allowfullscreen
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>

<?php if ( ! empty( $town['faq'] ) ) : ?>
<section class="ds-faq ds-loc-faq">
  <div class="ds-wrap">
    <div class="ds-faq__head ds-reveal">
      <span class="ds-label">FREQUENTLY ASKED</span>
      <h2 class="ds-faq__title"><?php echo esc_html( $town['town'] ); ?> Dental Implant FAQ</h2>
    </div>
    <div class="ds-faq__list">
      <?php foreach ( $town['faq'] as $i => $f ) : ?>
        <details class="ds-faq-item ds-reveal"<?php echo 0 === $i ? ' open' : ''; ?>>
          <summary class="ds-faq-item__q">
            <h3 class="ds-faq-item__h"><?php echo $f[0]; ?></h3>
            <span class="ds-faq-item__chev" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="ds-faq-item__a"><?php echo $f[1]; ?></div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="ds-loc-cta" id="schedule">
  <div class="ds-wrap">
    <div class="ds-loc-cta__inner ds-reveal">
      <h2 class="ds-loc-cta__title"><?php echo $closing[0]; ?></h2>
      <?php foreach ( $closing[1] as $para ) { echo $block( $para, 'ds-loc-cta__body' ); } ?>
      <div class="ds-loc-cta__ctas">
        <a href="#quiz" class="ds-btn ds-btn--solid"<?php echo $schedule_attr; ?>>Schedule Your DreamSmile<sup class="ds-tm">&trade;</sup> Assessment</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
