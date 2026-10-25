<?php
/**
 * Title: Make a Payment
 * Slug: dreamsmile/make-a-payment
 * Categories: dreamsmile
 * Inserter: no
 *
 * Body of /make-a-payment/ (templates/page-make-a-payment.html). Dr. Burns
 * asked for a way for patients to pay online, with the link and QR code from
 * the practice's billing provider, Balance Collect. The copy is the old
 * site's page of the same name, word for word (client request, 2026-10-24);
 * its heading, intro and "Pay Your Bill Online" button are in the sub-hero
 * (page-sub-hero.php).
 *
 * Reuses:
 *   - .ds-loc-map (two-column block, as on the contact and town pages), in its
 *     light variant because the sub-hero above is already dark, with the map
 *     slot swapped for the QR code (.ds-loc-map__embed--qr)
 *   - .ds-loc-doctor__bullets (teal-dot list)
 *   - .ds-loc-cta (white final CTA)
 *
 * The QR code is the practice's own (assets/arrange/payment-qr.png): the same
 * code as on the old page, at twice its resolution, checked to open
 * ds_payment_url(). It is for people reading on a computer: they scan it and
 * finish on their phone. On a phone, the button is the way in, so the QR card
 * is hidden below 720px.
 */
defined( 'ABSPATH' ) || exit;

$office = ds_office_data();
$pay    = ds_payment_url();
$qr     = get_stylesheet_directory_uri() . '/assets/arrange/payment-qr.png';
$email  = antispambot( 'info@jburnsdds.com' );
$svg_card  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></svg>';
$needs = [
    'Your credit or debit card, including the security code (CVV)',
    'Your first and last name',
    'Your billing address',
    'Your email address',
    'The amount you&rsquo;d like to pay',
];
?>
<!-- wp:html -->
<section class="ds-loc-map ds-loc-map--light" id="pay">
  <div class="ds-wrap">
    <div class="ds-loc-map__head ds-reveal">
      <span class="ds-label">BEFORE YOU PAY</span>
      <h2 class="ds-loc-map__title">What You&rsquo;ll Need</h2>
    </div>
    <div class="ds-loc-map__grid">
      <div class="ds-loc-map__info ds-reveal">
        <p class="ds-loc-map__addr">Please have the following ready before you pay:</p>
        <ul class="ds-loc-doctor__bullets">
          <?php foreach ( $needs as $item ) : ?>
            <li><?php echo $item; ?></li>
          <?php endforeach; ?>
        </ul>
        <div class="ds-loc-map__ctas">
          <a href="<?php echo esc_url( $pay ); ?>" class="ds-btn ds-btn--solid" target="_blank" rel="noopener">
            <?php echo $svg_card; ?>
            <span>Pay Your Bill Online</span>
          </a>
        </div>
      </div>
      <figure class="ds-loc-map__embed ds-loc-map__embed--qr ds-reveal">
        <figcaption>
          <strong>Prefer to Use Your Phone?</strong>
          Point your phone&rsquo;s camera at the QR code below and tap the link that appears.
        </figcaption>
        <img src="<?php echo esc_url( $qr ); ?>" width="220" height="220" loading="lazy"
             alt="QR code to pay your Dr. Jeffrey Burns DDS bill online" />
      </figure>
    </div>
  </div>
</section>

<section class="ds-loc-cta">
  <div class="ds-wrap">
    <div class="ds-loc-cta__inner ds-reveal">
      <h2 class="ds-loc-cta__title">Questions About Your Bill?</h2>
      <p class="ds-loc-cta__body">If you have questions about your balance, insurance or payment options, call our office at <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a> or email <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>. Our team is happy to help.</p>
      <div class="ds-loc-cta__ctas">
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--solid">Call <?php echo esc_html( $office['phone'] ); ?></a>
        <a href="mailto:<?php echo $email; ?>" class="ds-btn ds-btn--outlined">Email the Office</a>
      </div>
      <p class="ds-loc-cta__body ds-loc-cta__body--note">Looking for insurance or financing information? Visit our <a href="/financing/">Insurance and Financial Information</a> page.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->
