<?php
/**
 * Title: Contact Content
 * Slug: dreamsmile/contact-content
 * Categories: dreamsmile
 *
 * Contact page body. Reuses existing theme components for visual
 * consistency with the rest of the site:
 *   - .ds-loc-map  (dark charcoal address + embedded Google Maps —
 *                   the same block every city page already uses)
 *   - .ds-cities-bar (compact bespoke city-links bar — the only
 *                     component unique to this page; preserves the
 *                     legacy live-site UX from the contact-image-from-doc
 *                     screenshot)
 *   - .ds-implants-nav-card (3 "Planning your visit" tip cards)
 *   - .ds-subpage-cta (dark final CTA)
 */
defined( 'ABSPATH' ) || exit;
$office     = ds_office_data();
$maps_embed = 'https://www.google.com/maps?q=' . rawurlencode( $office['maps_q'] ) . '&output=embed';
$maps_dir   = 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode( $office['maps_q'] );

$cities = [
  [ 'Harrisonburg', 'harrisonburg' ],
  [ 'Winchester',   'winchester'   ],
  [ 'Bridgewater',  'bridgewater'  ],
  [ 'Woodstock',    'woodstock'    ],
  [ 'Luray',        'luray'        ],
  [ 'Elkton',       'elkton'       ],
  [ 'Timberville',  'timberville'  ],
  [ 'Broadway',     'broadway'     ],
];

$svg_dir   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l18-7-7 18-2.5-7.5L3 11z"/></svg>';
$svg_phone = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>';
$svg_park  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l2-6a2 2 0 0 1 2-1.5h10A2 2 0 0 1 19 7l2 6M3 13h18v5a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-1H7v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-5z"/><circle cx="7.5" cy="16" r="1" fill="currentColor"/><circle cx="16.5" cy="16" r="1" fill="currentColor"/></svg>';
$svg_visit = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>';
$svg_route = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="2"/><circle cx="18" cy="18" r="2"/><path d="M8 6h6a4 4 0 0 1 0 8h-4a4 4 0 0 0 0 8h2"/></svg>';
?>
<!-- wp:html -->

<!-- Address + map: reuses .ds-loc-map (dark charcoal block, same as every city page) -->
<section class="ds-loc-map">
  <div class="ds-wrap">
    <div class="ds-loc-map__head ds-reveal">
      <span class="ds-label">VISIT US</span>
      <h2 class="ds-loc-map__title">9626 South Congress St &middot; <span class="ds-italic">New Market, VA.</span></h2>
      <p class="ds-loc-map__travel">Right off I-81 at exit 264. Free on-site parking, ADA-accessible entry, and a real receptionist on every call &mdash; never a call center.</p>
    </div>
    <div class="ds-loc-map__grid">
      <div class="ds-loc-map__info ds-reveal">
        <h3 class="ds-loc-map__city"><?php echo esc_html( $office['home_city'] ); ?>, <?php echo esc_html( $office['home_state'] ); ?></h3>
        <p class="ds-loc-map__addr">Jeffrey S. Burns DDS<br/>9626 South Congress St<br/>New Market, VA 22844</p>
        <p class="ds-loc-map__hours">Mon&ndash;Thu &middot; 8:00 AM &ndash; 3:00 PM<br/>Fri&ndash;Sun &middot; <em>Closed</em></p>
        <p class="ds-loc-map__phone-label">Direct line to Dr. Burns</p>
        <p class="ds-loc-map__hours" style="margin-top:-12px;">
          <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" style="color:#fff;font-weight:700;font-size:18px;letter-spacing:0.02em;text-decoration:none;">
            <?php echo esc_html( $office['phone'] ); ?>
          </a>
        </p>
        <div class="ds-loc-map__ctas">
          <a href="<?php echo esc_url( $maps_dir ); ?>" target="_blank" rel="noopener" class="ds-btn ds-btn--solid ds-btn--sm">
            <?php echo $svg_dir; ?>
            <span>Get Directions</span>
          </a>
          <a href="#quiz" data-ds-schedule class="ds-btn ds-btn--outlined-white ds-btn--sm">
            <?php echo $svg_phone; ?>
            <span>Schedule a Visit</span>
          </a>
        </div>
      </div>
      <div class="ds-loc-map__embed ds-reveal">
        <iframe
          src="<?php echo esc_url( $maps_embed ); ?>"
          title="DreamSmile by Dr. Jeffrey S. Burns &mdash; 9626 South Congress St, New Market, VA"
          loading="lazy"
          allowfullscreen
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>

<!-- City links bar: compact, preserves the legacy live-site UX while staying on-brand -->
<section class="ds-cities-bar">
  <div class="ds-wrap">
    <div class="ds-cities-bar__head ds-reveal">
      <span class="ds-label">DRIVING IN FROM</span>
      <h2 class="ds-cities-bar__title">Communities we serve across the Shenandoah Valley.</h2>
      <p class="ds-cities-bar__sub">Pick your town for directions tailored to your route.</p>
    </div>
    <ul class="ds-cities-bar__list ds-reveal">
      <?php foreach ( $cities as $c ) : ?>
        <li>
          <a href="/<?php echo esc_attr( $c[1] ); ?>/">
            <span class="ds-cities-bar__pin"><?php echo $svg_visit; ?></span>
            <?php echo esc_html( $c[0] ); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- Planning your visit: 3 tips, reuses .ds-implants-nav grid -->
<section class="ds-implants-nav">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <span class="ds-label">PLANNING YOUR VISIT</span>
      <h2 class="ds-implants-nav__title">A few things to know before you come.</h2>
    </div>
    <div class="ds-implants-nav__grid">

      <article class="ds-implants-nav-card ds-reveal" style="cursor:default;">
        <span class="ds-implants-nav-card__icon"><?php echo $svg_park; ?></span>
        <h3 class="ds-implants-nav-card__title">Parking &amp; Access</h3>
        <p class="ds-implants-nav-card__desc">Free on-site parking with step-free, ADA-accessible entry. No metered street parking to worry about.</p>
      </article>

      <a href="/new-patients/" class="ds-implants-nav-card ds-reveal">
        <span class="ds-implants-nav-card__icon"><?php echo $svg_visit; ?></span>
        <h3 class="ds-implants-nav-card__title">First-time visitor</h3>
        <p class="ds-implants-nav-card__desc">Most first visits run 60&ndash;90 minutes. See exactly what to expect on your first appointment.</p>
        <span class="ds-implants-nav-card__cta">
          See What to Expect
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
        </span>
      </a>

      <a href="/locations/" class="ds-implants-nav-card ds-reveal">
        <span class="ds-implants-nav-card__icon"><?php echo $svg_route; ?></span>
        <h3 class="ds-implants-nav-card__title">Driving in?</h3>
        <p class="ds-implants-nav-card__desc">We&rsquo;re right off I-81 at exit 264. Browse driving routes from your community.</p>
        <span class="ds-implants-nav-card__cta">
          See Driving Routes
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
        </span>
      </a>

    </div>
  </div>
</section>

<!-- Final CTA (dark charcoal, .ds-subpage-cta — matches every other subpage) -->
<section class="ds-subpage-cta">
  <div class="ds-wrap">
    <div class="ds-subpage-cta__inner ds-reveal">
      <span class="ds-label">READY WHEN YOU ARE</span>
      <h2 class="ds-subpage-cta__title">Start your <span class="ds-italic">DreamSmile&trade;</span> today.</h2>
      <p class="ds-subpage-cta__sub">Free consultation. No obligations. Direct line to Dr. Burns.</p>
      <div class="ds-subpage-cta__ctas">
        <a href="#quiz" data-ds-schedule class="ds-btn ds-btn--solid">Schedule Free Consultation</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>

<!-- /wp:html -->
