<?php
/**
 * Title: Warranty
 * Slug: dreamsmile/warranty
 * Categories: dreamsmile
 *
 * Background photo + coded tier cards + working schedule CTA. Visual
 * matches the original `dream-smile-warranty.jpg` backdrop, but every
 * element is real markup so the button actually opens the schedule modal.
 */
defined( 'ABSPATH' ) || exit;
$base = get_stylesheet_directory_uri() . '/assets/arrange';
$bg   = $base . '/dream-smile-warranty.jpg';

$tiers = [
  // [ key, name, implants_value, teeth_value, recommended ]
  [ 'silver',   'Silver',   '5 Years', '2 Years',  false ],
  [ 'platinum', 'Platinum', '5 Years', 'Lifetime', true  ],
  [ 'gold',     'Gold',     '5 Years', '5 Years',  false ],
];
?>
<!-- wp:html -->
<section class="ds-warranty" id="warranty">
  <div class="ds-warranty__bg" style="background-image: url('<?php echo esc_url( $bg ); ?>');" aria-hidden="true"></div>
  <div class="ds-warranty__scrim" aria-hidden="true"></div>

  <div class="ds-wrap ds-warranty__inner">
    <div class="ds-warranty__head ds-reveal">
      <h2 class="ds-warranty__title">The DreamSmile Warranty</h2>
      <p class="ds-warranty__sub">Every Dream Smile is backed by our exclusive warranty.</p>
    </div>

    <div class="ds-warranty__grid">
      <?php foreach ( $tiers as $i => $t ) :
        list( $key, $name, $implants, $teeth, $rec ) = $t;
        $cls = 'ds-warranty-card ds-warranty-card--' . esc_attr( $key );
        if ( $rec ) { $cls .= ' ds-warranty-card--recommended'; }
      ?>
        <article class="<?php echo $cls; ?> ds-reveal" style="animation-delay: <?php echo ( $i * 80 ); ?>ms">
          <?php if ( $rec ) : ?>
            <span class="ds-warranty-card__badge">RECOMMENDED</span>
          <?php endif; ?>
          <h3 class="ds-warranty-card__tier"><?php echo esc_html( $name ); ?></h3>
          <dl class="ds-warranty-card__terms">
            <div class="ds-warranty-term">
              <dt class="ds-warranty-term__label">Implants</dt>
              <dd class="ds-warranty-term__value"><?php echo esc_html( $implants ); ?></dd>
            </div>
            <div class="ds-warranty-term">
              <dt class="ds-warranty-term__label">Teeth</dt>
              <dd class="ds-warranty-term__value"><?php echo esc_html( $teeth ); ?></dd>
            </div>
          </dl>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="ds-warranty__cta ds-reveal">
      <a href="#quiz" class="ds-btn ds-btn--solid" data-ds-schedule-location="Warranty">Schedule Free DreamSmile Assessment</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
