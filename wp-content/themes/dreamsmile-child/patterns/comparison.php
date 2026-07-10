<?php
/**
 * Title: Comparison
 * Slug: dreamsmile/comparison
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;

$dreamsmile_rows = [
  [ 'Dr. Burns Personally Handles Every Case',        'From consultation to final reveal, Dr. Burns is with you every step of the way.' ],
  [ 'On-Staff Anesthesiologist',                       'Board-certified anesthesiologist ensures your safety and comfort throughout.' ],
  [ 'The Burns Protocol',                              'Our proprietary 6-step process ensures predictable, beautiful results every time.' ],
  [ 'Dr. Burns&rsquo;s Personal Cell Phone',           'Direct access to your doctor &mdash; because your care doesn&rsquo;t end when you leave the office.' ],
  [ 'Turnkey Pricing + Lifetime Warranty',             'One transparent price covers everything. No surprises, no hidden fees.' ],
  [ 'One-Stop Shop',                                   'Everything done in-house. No referrals, no traveling between offices.' ],
  [ 'You Leave With a Full Smile Today',               'Same-day temporary teeth &mdash; you never walk out with a gap or a wait.' ],
];

$chain_rows = [
  [ 'Rotating Providers',         'You may see a different doctor every visit with no continuity of care.' ],
  [ 'CRNA Sedation',              'Nurse anesthetists instead of board-certified anesthesiologists.' ],
  [ 'Cookie-Cutter Protocols',    'One-size-fits-all approaches that don&rsquo;t account for your unique needs.' ],
  [ 'Call Center Support',        'Good luck reaching your actual doctor when you have a question.' ],
  [ 'Hidden Fees and Limited or No Warranty',  'Surprise additional costs and uncertainty if you need additional support.' ],
  [ 'Multiple Locations Required','Referred out for imaging, surgery, and follow-ups at different offices.' ],
  [ 'Weeks or Months of Waiting', 'Temporary gaps and repeat visits before your final teeth are ready.' ],
];
?>
<!-- wp:html -->
<section class="ds-comparison">
  <div class="ds-wrap">
    <div class="ds-comparison__head ds-reveal">
      <span class="ds-label">SEE THE DIFFERENCE</span>
      <h2 class="ds-comparison__title" style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap; gap: 8px;">
        The <img class="ds-comparison__logo-img" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/arrange/nav-logo.png' ); ?>" alt="DreamSmile Logo" style="height: 36px; width: auto;" /> vs. Traditional Dental Implants
      </h2>
      <div class="ds-comparison__divider" aria-hidden="true"><span></span><svg viewBox="0 0 12 12" width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="6" cy="6" r="2.5"/></svg><span></span></div>
      <p class="ds-comparison__subtitle">Not all dental implant smiles are created equal.</p>
    </div>

    <div class="ds-comparison__grid">
      <div class="ds-vs ds-vs--desktop" aria-hidden="true">VS</div>

      <div class="ds-compare-card ds-compare-card--primary ds-reveal">
        <span class="ds-compare-card__badge">RECOMMENDED</span>
        <h3 class="ds-compare-card__title ds-compare-card__title--brand" style="display: flex; justify-content: center; align-items: center; min-height: 40px;">
          <img class="ds-compare-card__logo-img" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/arrange/nav-logo.png' ); ?>" alt="DreamSmile Logo" style="height: 32px; width: auto;" />
        </h3>
        <p class="ds-compare-card__kicker">THE DR. BURNS EXPERIENCE</p>
        <div class="ds-compare-list">
          <?php foreach ( $dreamsmile_rows as $row ) : ?>
            <div class="ds-compare-item">
              <span class="ds-compare-item__icon ds-compare-item__icon--check">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
              </span>
              <div>
                <p class="ds-compare-item__title"><?php echo $row[0]; ?></p>
                <p class="ds-compare-item__desc"><?php echo $row[1]; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="ds-vs ds-vs--mobile" aria-hidden="true">VS</div>

      <div class="ds-compare-card ds-compare-card--muted ds-reveal">
        <h3 class="ds-compare-card__title ds-compare-card__title--muted">Traditional Dental Implants</h3>
        <p class="ds-compare-card__kicker">THE TRADITIONAL EXPERIENCE</p>
        <div class="ds-compare-list">
          <?php foreach ( $chain_rows as $row ) : ?>
            <div class="ds-compare-item">
              <span class="ds-compare-item__icon ds-compare-item__icon--x">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
              </span>
              <div>
                <p class="ds-compare-item__title"><?php echo $row[0]; ?></p>
                <p class="ds-compare-item__desc"><?php echo $row[1]; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="ds-comparison__cta ds-reveal">
      <a href="#quiz" class="ds-btn ds-btn--solid">SEE IF YOU&rsquo;RE ELIGIBLE FOR DENTAL IMPLANTS</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
