<?php
/**
 * Title: Meet Dr. James Whitney
 * Slug: dreamsmile/dr-james-whitney
 * Categories: dreamsmile
 * Inserter: no
 *
 * Body of /about-us/whitney-oral-surgery/dr-james-whitney/ (templates/page-dr-james-whitney.html).
 * Consolidates the live biography (#59), services & referral contact (#60), and
 * Oral Surgery hours (#61) into a single DreamSmile page.
 */
defined( 'ABSPATH' ) || exit;

$base   = get_stylesheet_directory_uri() . '/assets/arrange';
$office = ds_office_data();
?>
<!-- wp:html -->
<section class="ds-np-before" id="whitney-bio">
  <div class="ds-wrap">
    <div class="ds-np-before__grid ds-np-before__grid--with-media">
      <figure class="ds-np-before__media ds-reveal">
        <img src="<?php echo esc_url( $base . '/dr-james-whitney.webp' ); ?>"
             alt="Dr. James Whitney, oral surgeon in New Market, VA"
             width="640" height="800" loading="lazy" decoding="async" />
      </figure>
      <div class="ds-np-before__content">
        <div class="ds-np-before__copy ds-reveal">
          <span class="ds-label">ORAL &amp; MAXILLOFACIAL SURGERY</span>
          <h2 class="ds-np-before__title">Oral Surgeon in <span class="ds-italic">New Market, VA</span>.</h2>
          <p>Dr. James Whitney was born and raised in Richmond, Virginia. He graduated from Hampden-Sydney College and the Medical College of Virginia School of Dentistry, then completed the four-year Oral and Maxillofacial Surgery Residency program at the Medical College of Georgia in Augusta, Georgia. After residency, he moved to Harrisonburg, Virginia, obtained staff privileges at Rockingham Memorial Hospital, completed a Fellowship Program in Facial Cosmetic Surgery, and began practicing Oral Surgery.</p>
          <p style="margin-top:14px;">Dr. Whitney&rsquo;s Oral Surgery is located within the dental office of Jeffrey S. Burns D.D.S. in New Market, Virginia.</p>
        </div>

        <ul class="ds-np-before__list ds-reveal">
          <li>
            <strong>Procedures in our office</strong>
            <span><a href="/tooth-extraction/">Dental extractions</a> and <a href="/wisdom-teeth-removal/">wisdom tooth removal</a> right here in New Market, with <a href="/anesthesia/">IV sedation and general anesthesia</a> available</span>
          </li>
          <li id="hours">
            <strong>Oral Surgery hours</strong>
            <span>Monday &ndash; Wednesday, 9:00 AM &ndash; 3:00 PM at <?php echo esc_html( $office['address'] ); ?></span>
          </li>
          <li>
            <strong>Contact &amp; scheduling</strong>
            <span>Call <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a> or email <a href="mailto:info@whitneyoralsurgery.com">info@whitneyoralsurgery.com</a> &mdash; <a href="/meet-the-team/">Tara Weaver</a> is the patient coordinator for Dr. Whitney&rsquo;s patients</span>
          </li>
          <li>
            <strong>Referring dental offices</strong>
            <span>Email patient images and referrals to <a href="mailto:info@whitneyoralsurgery.com">info@whitneyoralsurgery.com</a></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="ds-subpage-cta">
  <div class="ds-wrap">
    <div class="ds-subpage-cta__inner ds-reveal">
      <span class="ds-label">WHITNEY ORAL SURGERY</span>
      <h2 class="ds-subpage-cta__title">Oral Surgery Care Right Here in <em>New Market, VA</em></h2>
      <p class="ds-subpage-cta__sub">Office hours Mon&ndash;Wed, 9:00 AM &ndash; 3:00 PM at <?php echo esc_html( $office['address'] ); ?>.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--solid">Call <?php echo esc_html( $office['phone'] ); ?></a>
        <a href="mailto:info@whitneyoralsurgery.com" class="ds-btn ds-btn--outlined">Email info@whitneyoralsurgery.com</a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
