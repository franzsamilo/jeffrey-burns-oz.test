<?php
/**
 * Title: Implants — Options Compare
 * Slug: dreamsmile/implants-options-compare
 * Categories: dreamsmile
 *
 * Flipper vs. Traditional Bridge vs. Dental Implant, side by side.
 * Reuses the existing .ds-np-compare component (see service-detail.php) so it
 * inherits the same styling/responsive grid — no new namespace.
 */
defined( 'ABSPATH' ) || exit;

$cols = [
  [
    'title'   => 'Removable Flipper',
    'tagline' => 'A temporary plastic tooth on a removable retainer.',
    'points'  => [
      [ 'con', 'Sits on the gums &mdash; can slip while eating or speaking' ],
      [ 'con', 'Does nothing to stop the jawbone from shrinking' ],
      [ 'con', 'A short-term stopgap, not a lasting fix' ],
    ],
  ],
  [
    'title'   => 'Traditional Bridge',
    'tagline' => 'A fixed row anchored to the teeth on either side.',
    'points'  => [
      [ 'pro', 'Fixed in place &mdash; nothing to remove at night' ],
      [ 'con', 'Requires grinding down healthy neighboring teeth' ],
      [ 'con', 'Bone still shrinks beneath the gap over time' ],
    ],
  ],
  [
    'title'   => 'Dental Implant',
    'tagline' => 'A titanium root fused into the jaw, topped with a natural crown.',
    'best'    => true,
    'points'  => [
      [ 'pro', 'Acts as the tooth&rsquo;s root &mdash; preserves bone and facial structure' ],
      [ 'pro', 'Never touches the healthy teeth beside it' ],
      [ 'pro', 'Designed to last a lifetime, backed by the DreamSmile&trade; Warranty' ],
    ],
  ],
];
?>
<!-- wp:html -->
<section class="ds-np-compare">
  <div class="ds-wrap">
    <div class="ds-np-compare__head ds-reveal">
      <span class="ds-label">WEIGH YOUR OPTIONS</span>
      <h2 class="ds-np-compare__title">Flipper vs. Bridge vs. Implant</h2>
      <p class="ds-np-compare__sub">If you&rsquo;re missing a tooth, you have three real choices. Here&rsquo;s how they compare &mdash; side by side.</p>
    </div>
    <div class="ds-np-compare__grid">
      <?php foreach ( $cols as $col ) :
        $best = ! empty( $col['best'] );
      ?>
        <article class="ds-np-compare__card<?php echo $best ? ' is-best' : ''; ?> ds-reveal">
          <?php if ( $best ) : ?><span class="ds-np-compare__badge">BEST OPTION</span><?php endif; ?>
          <h3 class="ds-np-compare__card-title"><?php echo $col['title']; ?></h3>
          <?php if ( ! empty( $col['tagline'] ) ) : ?><p class="ds-np-compare__tagline"><?php echo $col['tagline']; ?></p><?php endif; ?>
          <ul class="ds-np-compare__points">
            <?php foreach ( $col['points'] as $pt ) :
              $kind = $pt[0];
            ?>
              <li class="ds-np-compare__point ds-np-compare__point--<?php echo esc_attr( $kind ); ?>">
                <span class="ds-np-compare__mark" aria-hidden="true"><?php echo $kind === 'pro'
                  ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>'
                  : '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>'; ?></span>
                <span><?php echo $pt[1]; ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
