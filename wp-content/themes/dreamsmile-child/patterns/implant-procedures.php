<?php
/**
 * Title: Implant Procedures Overview
 * Slug: dreamsmile/implant-procedures
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$base     = get_stylesheet_directory_uri() . '/assets/arrange';
$surgical = $base . '/surgical-photo-burns.png';

$types = [
  [ 'tooth',    'Single Tooth Implant',      'Missing one tooth',            'Replace one missing tooth without affecting neighbors. Most common, least invasive.' ],
  [ 'multiple', 'Multiple Implants',         'Missing 2&ndash;4 teeth',       'Restore several missing teeth with individual implants &mdash; no bridges needed.' ],
  [ 'arch',     'All-on-4 / Full Arch',      'Missing all teeth',            'A full set of permanent teeth supported by 4&ndash;6 implants. Life-changing.', true ],
  [ 'bridge',   'Implant-Supported Bridge',  'Missing a row',                 'Replace a row of teeth without compromising healthy ones on either side.' ],
  [ 'denture',  'Implant-Supported Denture', 'Loose dentures',                'Stabilize loose dentures with implants &mdash; no more slipping, no adhesives.' ],
  [ 'mini',     'Mini Dental Implants',      'Limited bone',                  'A less-invasive option for patients with limited bone. Quicker recovery.' ],
];

$svg = [
  'tooth'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/></svg>',
  'multiple' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3c1.2 0 2 .6 2.5 1.4.5.8.6 1.9.3 2.8L8 10.5c-.15.65-.4 1.3-.7 1.95M18 3c1.2 0 2 .6 2.5 1.4.5.8.6 1.9.3 2.8l-.8 3.3c-.15.65-.4 1.3-.7 1.95M12 12c1.2 0 2 .6 2.5 1.4.5.8.6 1.9.3 2.8l-.8 3.3c-.15.65-.4 1.3-.7 1.95"/></svg>',
  'arch'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12c0-5 4-9 9-9s9 4 9 9"/><path d="M6 14v2M10 14v2M14 14v2M18 14v2"/></svg>',
  'bridge'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18h18M3 18l2-9 4 4 3-6 3 6 4-4 2 9"/></svg>',
  'denture'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9c0-3 4-5 9-5s9 2 9 5v3c0 5-4 9-9 9s-9-4-9-9V9z"/><path d="M7 11v2M11 11v2M13 11v2M17 11v2"/></svg>',
  'mini'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M12 12v9M9 18l3 3 3-3"/></svg>',
  'arrow'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>',
];
?>
<!-- wp:html -->
<section class="ds-subhero ds-subhero--compact">
  <div class="ds-wrap ds-subhero__inner">
    <span class="ds-label">DENTAL IMPLANTS &middot; PROCEDURES</span>
    <h1 class="ds-subhero__title">The Right Implant Solution <span class="ds-italic">for Every Smile.</span></h1>
    <p class="ds-subhero__sub">Six proven procedures &mdash; from a single tooth to a full-arch rebuild. Find the one that fits.</p>
    <div class="ds-subhero__ctas">
      <a href="/#quiz" class="ds-btn ds-btn--solid">Take the Implant Quiz</a>
      <a href="tel:+15407408937" class="ds-btn ds-btn--outlined">Call (540) 740-8937</a>
    </div>
  </div>
</section>

<section class="ds-proc-types">
  <div class="ds-wrap">
    <div class="ds-proc-types__head ds-reveal">
      <span class="ds-label">TYPES OF IMPLANT SOLUTIONS</span>
      <h2 class="ds-proc-types__title">Six procedures. <span class="ds-italic">One right fit.</span></h2>
      <p class="ds-proc-types__sub">Every case is different. Dr. Burns personally reviews your scans to recommend the procedure that delivers the best outcome for your situation.</p>
    </div>
    <div class="ds-proc-types__grid">
      <?php foreach ( $types as $i => $t ) :
        $is_featured = isset( $t[4] ) && $t[4];
        $classes     = 'ds-proc-type-card ds-reveal' . ( $is_featured ? ' is-featured' : '' );
      ?>
        <div class="<?php echo esc_attr( $classes ); ?>" style="animation-delay: <?php echo ( $i * 60 ); ?>ms">
          <?php if ( $is_featured ) : ?>
            <span class="ds-proc-type-card__badge">Most Popular</span>
          <?php endif; ?>
          <span class="ds-proc-type-card__icon"><?php echo $svg[ $t[0] ]; ?></span>
          <span class="ds-proc-type-card__tag"><?php echo $t[2]; ?></span>
          <h3 class="ds-proc-type-card__title"><?php echo $t[1]; ?></h3>
          <p class="ds-proc-type-card__desc"><?php echo $t[3]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="ds-proc-types__foot ds-reveal">
      <p class="ds-proc-types__note">You&rsquo;re not just replacing teeth &mdash; you&rsquo;re rebuilding your confidence.</p>
      <div class="ds-proc-types__ctas">
        <a href="/#quiz" class="ds-btn ds-btn--solid">See which procedure fits you</a>
        <a href="tel:+15407408937" class="ds-btn ds-btn--outlined">Call Us Now</a>
      </div>
    </div>
  </div>
</section>

<section class="ds-proc-why">
  <div class="ds-wrap">
    <div class="ds-proc-why__grid">
      <div class="ds-proc-why__media ds-reveal">
        <img src="<?php echo esc_url( $surgical ); ?>" alt="Dr. Jeffrey S. Burns performing an implant procedure" loading="lazy" />
      </div>
      <div class="ds-proc-why__copy ds-reveal">
        <span class="ds-label">WHY DR. BURNS</span>
        <h2 class="ds-proc-why__title">Dr. Burns personally places <span class="ds-italic">every implant.</span></h2>
        <ul class="ds-proc-why__bullets">
          <li><strong>On-staff anesthesiologist</strong> &mdash; board-certified, not a CRNA.</li>
          <li><strong>3D imaging &amp; digital planning</strong> &mdash; precision placement before day one.</li>
          <li><strong>One-stop shop</strong> &mdash; everything in-house, no referrals across town.</li>
          <li><strong>Lifetime warranty available</strong> &mdash; the Platinum tier protects your investment.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php ds_render_about_section(); ?>

<section class="ds-subpage-cta">
  <div class="ds-wrap">
    <div class="ds-subpage-cta__inner ds-reveal">
      <span class="ds-label">NEXT STEP</span>
      <h2 class="ds-subpage-cta__title">Curious what it costs?</h2>
      <p class="ds-subpage-cta__sub">See the factors that shape your total &mdash; plus financing that fits every budget.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="/implant-cost/" class="ds-btn ds-btn--solid">See Cost &amp; Financing</a>
        <a href="/implant-faqs/" class="ds-btn ds-btn--outlined">Read FAQs</a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
