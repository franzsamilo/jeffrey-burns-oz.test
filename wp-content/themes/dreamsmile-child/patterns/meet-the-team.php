<?php
/**
 * Title: Meet the Team
 * Slug: dreamsmile/meet-the-team
 * Categories: dreamsmile
 *
 * /meet-the-team/ body (templates/page-meet-the-team.html). The H1 is the
 * page-sub-hero above it. Sections:
 *   - .ds-np-before   a short intro and the three kinds of role (same
 *                     component as /new-patients/). The group photo is the
 *                     sub-hero's, so it isn't repeated here.
 *   - .ds-team        one card per person, from ds_team_members() (inc/team.php)
 *   - .ds-team-whitney Dr. Whitney, while his page is published
 *   - .ds-subpage-cta  the dark closing call to action
 * The shared about-dr-burns block follows, from the template.
 */
defined( 'ABSPATH' ) || exit;
$base    = get_stylesheet_directory_uri() . '/assets/arrange';
$office  = ds_office_data();
$whitney = ds_whitney_url();
$tm      = 'DreamSmile<sup class="ds-tm">&trade;</sup>';
?>
<!-- wp:html -->
<section class="ds-np-before" id="team-intro">
  <div class="ds-wrap">
    <div class="ds-np-before__grid">
      <div class="ds-np-before__copy ds-reveal">
        <span class="ds-label">ONE OFFICE, ONE TEAM</span>
        <h2 class="ds-np-before__title">Caring for New Market patients <span class="ds-italic">since 1995</span>.</h2>
        <p>Dr. Jeffrey Burns opened his New Market, VA practice in 1995. Today his team includes registered dental hygienists, licensed expanded function dental assistants, and the coordinators who handle your scheduling, treatment plan, insurance, and financing. Laurie has been with him since that first year, and Teresa since 2004.</p>
      </div>
      <ul class="ds-np-before__list ds-reveal">
        <li><strong>Registered dental hygienists</strong><span>Your cleanings, hygiene visits, and the care that keeps implants healthy</span></li>
        <li><strong>Licensed dental assistants</strong><span>Board-certified and expanded-function assistants at the chair with Dr. Burns, including a certified dental anesthesia assistant</span></li>
        <li><strong>Patient, treatment, and financial coordinators</strong><span>Scheduling, your questions, your treatment plan, and the most from your insurance</span></li>
      </ul>
    </div>
  </div>
</section>

<section class="ds-team" id="team">
  <div class="ds-wrap">
    <div class="ds-team__head ds-reveal">
      <span class="ds-label">MEET THE TEAM</span>
      <h2 class="ds-team__title">The people you&rsquo;ll see <span class="ds-italic">at every visit</span>.</h2>
      <p>From your first call to your final crown, these are the faces in our office at <?php echo esc_html( $office['address'] ); ?>.</p>
    </div>

    <ul class="ds-team__grid">
      <?php foreach ( ds_team_members() as $m ) :
        $full = $m['name'] . ( $m['cred'] ? ', ' . $m['cred'] : '' );
        ?>
      <li class="ds-team-card ds-reveal">
        <img class="ds-team-card__photo"
             src="<?php echo esc_url( $base . '/team/' . $m['photo'] ); ?>"
             alt="<?php echo esc_attr( $full . ', ' . wp_specialchars_decode( $m['role'] ) . ' at Dr. Jeffrey Burns&#8217; office' ); ?>"
             width="450" height="600" loading="lazy" decoding="async" />
        <div class="ds-team-card__body">
          <h3 class="ds-team-card__name"><?php echo esc_html( $m['name'] ); ?><?php if ( $m['cred'] ) : ?><span class="ds-team-card__cred">, <?php echo esc_html( $m['cred'] ); ?></span><?php endif; ?></h3>
          <p class="ds-team-card__role"><?php echo $m['role']; // phpcs:ignore -- theme-owned copy with entities. ?></p>
          <p class="ds-team-card__bio"><?php echo $m['bio']; // phpcs:ignore -- theme-owned copy with entities. ?></p>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>

    <?php if ( $whitney ) : ?>
    <aside class="ds-team-whitney ds-reveal" aria-labelledby="ds-team-whitney-title">
      <div>
        <span class="ds-label">ORAL SURGERY IN OUR OFFICE</span>
        <h3 class="ds-team-whitney__title" id="ds-team-whitney-title">Dr. James Whitney, oral surgeon</h3>
        <p>Dr. Whitney&rsquo;s Oral Surgery is located within our New Market office, so extractions and wisdom teeth removal happen right here. Tara coordinates his patients&rsquo; visits.</p>
      </div>
      <a href="<?php echo esc_url( $whitney ); ?>" class="ds-btn ds-btn--outlined ds-btn--sm">Meet Dr. Whitney</a>
    </aside>
    <?php endif; ?>
  </div>
</section>

<section class="ds-subpage-cta">
  <div class="ds-wrap">
    <div class="ds-subpage-cta__inner ds-reveal">
      <span class="ds-label">COME MEET US</span>
      <h2 class="ds-subpage-cta__title">Schedule Your <?php echo $tm; // phpcs:ignore ?> Assessment</h2>
      <p class="ds-subpage-cta__sub">Meet Dr. Burns and the team in New Market, VA. Call <?php echo esc_html( $office['phone'] ); ?> or book online.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="#quiz" data-ds-schedule class="ds-btn ds-btn--solid">Schedule Your <?php echo $tm; // phpcs:ignore ?> Assessment</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
