<?php
/**
 * Title: Pay Your Bill
 * Slug: dreamsmile/pay-your-bill
 * Categories: dreamsmile
 * Inserter: no
 *
 * Body of /pay-your-bill/ (templates/page-pay-your-bill.html). Dr. Burns asked
 * for a way for patients to pay online, with the link and QR code from the
 * practice's billing provider, Balance Collect.
 *
 * Reuses:
 *   - .ds-loc-map (dark two-column block, as on the contact and town pages),
 *     with the map slot swapped for the QR code (.ds-loc-map__embed--qr)
 *   - .ds-loc-cta (white final CTA)
 *
 * The QR code is the practice's own (assets/arrange/payment-qr.png, decoded
 * and checked against ds_payment_url() when it was added). It is for people
 * reading on a computer: they scan it and finish on their phone. On a phone,
 * the button is the way in, so the QR card is hidden below 720px.
 */
defined( 'ABSPATH' ) || exit;

$office = ds_office_data();
$pay    = ds_payment_url();
$qr     = get_stylesheet_directory_uri() . '/assets/arrange/payment-qr.png';
$svg_card  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></svg>';
$svg_phone = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>';
?>
<!-- wp:html -->
<section class="ds-loc-map" id="pay">
  <div class="ds-wrap">
    <div class="ds-loc-map__head ds-reveal">
      <span class="ds-label">SECURE ONLINE PAYMENT</span>
      <h2 class="ds-loc-map__title">Pay your balance in a minute &middot; <span class="ds-italic">from any device.</span></h2>
      <p class="ds-loc-map__travel">Payments go through Balance Collect, our billing partner&rsquo;s secure portal. Your payment details are entered there and never pass through this website.</p>
    </div>
    <div class="ds-loc-map__grid">
      <div class="ds-loc-map__info ds-reveal">
        <h3 class="ds-loc-map__city">Pay online</h3>
        <p class="ds-loc-map__addr">Have your statement handy, then open the payment portal. It is open around the clock, including weekends when the office is closed.</p>
        <p class="ds-loc-map__phone-label">Questions about a balance?</p>
        <p class="ds-loc-map__hours">
          Call <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-pay__tel"><?php echo esc_html( $office['phone'] ); ?></a>, Mon&ndash;Thu &middot; 8 AM &ndash; 3 PM.
        </p>
        <div class="ds-loc-map__ctas">
          <a href="<?php echo esc_url( $pay ); ?>" class="ds-btn ds-btn--solid" target="_blank" rel="noopener">
            <?php echo $svg_card; ?>
            <span>Pay Online Now</span>
          </a>
          <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined-white">
            <?php echo $svg_phone; ?>
            <span>Call the Office</span>
          </a>
        </div>
      </div>
      <figure class="ds-loc-map__embed ds-loc-map__embed--qr ds-reveal">
        <img src="<?php echo esc_url( $qr ); ?>" width="220" height="220" loading="lazy"
             alt="QR code that opens Dr. Jeffrey S. Burns, DDS's secure online payment page" />
        <figcaption>
          <strong>On a computer?</strong>
          Point your phone&rsquo;s camera at this code to pay from your phone.
        </figcaption>
      </figure>
    </div>
  </div>
</section>

<section class="ds-loc-cta">
  <div class="ds-wrap">
    <div class="ds-loc-cta__inner ds-reveal">
      <h2 class="ds-loc-cta__title">Paying for new treatment?</h2>
      <p class="ds-loc-cta__sub">Insurance, Cherry, CareCredit &amp; Sunbit financing &middot; Turnkey pricing with no surprise bills</p>
      <div class="ds-loc-cta__ctas">
        <a href="/financing/" class="ds-btn ds-btn--solid">Financing &amp; Insurance</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
