<?php
/**
 * Title: Implants Financing
 * Slug: dreamsmile/implants-financing
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;

$options = [
  [
    'name'    => 'Cherry',
    'accent'  => '#E96B8D',
    'desc'    => 'Simple monthly payments for eligible patients with fast online approval.',
    'chip'    => 'Apply in 60 seconds',
    'svg'     => '<svg viewBox="0 0 64 28" width="100" height="44" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><text x="0" y="22" font-family="Playfair Display, serif" font-size="24" font-weight="700" font-style="italic" fill="#E96B8D">cherry</text><circle cx="56" cy="8" r="3" fill="#E96B8D"/><path d="M56 11v3" stroke="#5A9A93" stroke-width="1.5" fill="none"/></svg>',
  ],
  [
    'name'    => 'CareCredit',
    'accent'  => '#2D7D9B',
    'desc'    => 'Special financing terms with no interest if paid in full within promotional period.',
    'chip'    => '0% if paid in full',
    'svg'     => '<svg viewBox="0 0 110 28" width="110" height="44" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><text x="0" y="22" font-family="Montserrat, sans-serif" font-size="18" font-weight="700" fill="#2D7D9B" letter-spacing="-0.5">Care</text><text x="42" y="22" font-family="Montserrat, sans-serif" font-size="18" font-weight="700" fill="#E4A53A" letter-spacing="-0.5">Credit</text></svg>',
  ],
  [
    'name'    => 'Sunbit',
    'accent'  => '#F2B24B',
    'desc'    => 'Pay over time with a soft credit check &mdash; no impact on your credit score.',
    'chip'    => 'Soft credit pull',
    'svg'     => '<svg viewBox="0 0 100 28" width="100" height="44" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><circle cx="10" cy="14" r="6" fill="#F2B24B"/><text x="22" y="22" font-family="Montserrat, sans-serif" font-size="18" font-weight="800" fill="#3A3A3A" letter-spacing="-0.3">sunbit</text></svg>',
  ],
];
?>
<!-- wp:html -->
<section class="ds-financing">
  <div class="ds-wrap">
    <div class="ds-financing__head ds-reveal">
      <span class="ds-label">PAYMENT OPTIONS</span>
      <h2 class="ds-financing__title">Implants cost <span class="ds-italic">less</span> than you think.</h2>
      <p class="ds-financing__sub">Flexible monthly plans through the partners we trust &mdash; pick what works for you, or mix-and-match.</p>
    </div>

    <div class="ds-financing__grid">
      <?php foreach ( $options as $i => $o ) : ?>
        <article class="ds-financing-card ds-reveal" style="animation-delay: <?php echo ( $i * 80 ); ?>ms">
          <div class="ds-financing-card__logo">
            <?php echo $o['svg']; ?>
          </div>
          <h3 class="ds-financing-card__name"><?php echo esc_html( $o['name'] ); ?></h3>
          <p class="ds-financing-card__desc"><?php echo $o['desc']; ?></p>
          <span class="ds-financing-card__chip" style="--chip-accent: <?php echo esc_attr( $o['accent'] ); ?>">
            <svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            <span><?php echo esc_html( $o['chip'] ); ?></span>
          </span>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="ds-financing__trust ds-reveal">
      <div class="ds-financing__trust-item">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l8 3v5c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-3z"/><path d="M9 12l2 2 4-4"/></svg>
        <div>
          <strong>Turnkey pricing, always</strong>
          <span>What we quote is what you pay. No hidden fees, ever.</span>
        </div>
      </div>
      <div class="ds-financing__trust-item">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></svg>
        <div>
          <strong>Most insurance accepted</strong>
          <span>We&rsquo;ll verify coverage and maximize every benefit for you.</span>
        </div>
      </div>
      <div class="ds-financing__trust-item">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M9 12l2 2 4-4"/></svg>
        <div>
          <strong>Lifetime Warranty available</strong>
          <span>Protect your investment with our Platinum tier.</span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
