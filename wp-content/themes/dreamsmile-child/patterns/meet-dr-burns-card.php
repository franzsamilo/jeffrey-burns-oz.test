<?php
/**
 * Title: Meet Dr. Burns — Card (canonical)
 * Slug: dreamsmile/meet-dr-burns-card
 * Categories: dreamsmile
 *
 * The single "Meet the Specialist" component used on every page so the
 * narrative, photo, credentials, and tone stay consistent site-wide.
 */
defined( 'ABSPATH' ) || exit;
$casual = get_stylesheet_directory_uri() . '/assets/arrange/casual-photo-burns.png';

$bullets = [
  'Personal cell number given to every patient',
  'The proprietary Burns Protocol, taught nationwide',
  'Board-certified anesthesiologist on-staff for every case',
  'Lifetime warranty on every DreamSmile&trade;',
];

$icons = [
  'flag'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 21V4"/><path d="M4 4h12l-2.5 4L16 12H4"/></svg>',
  'ribbon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="9" r="5"/><path d="M8.4 13.3L6.5 21l5.5-3 5.5 3-1.9-7.7"/></svg>',
  'trophy' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 4h10v4a5 5 0 01-10 0V4Z"/><path d="M7 6H4a1 1 0 00-1 1v1a4 4 0 004 4"/><path d="M17 6h3a1 1 0 011 1v1a4 4 0 01-4 4"/><path d="M12 13v4"/><path d="M9 21h6"/></svg>',
  'book'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 016.5 3H19a1 1 0 011 1v16a1 1 0 01-1 1H6.5A2.5 2.5 0 014 18.5z"/><path d="M4 18.5A2.5 2.5 0 016.5 16H20"/></svg>',
];

$credentials = [
  [ 'flag',   'Nationally Recognized' ],
  [ 'ribbon', 'Top Cosmetic Fellowship' ],
  [ 'trophy', 'AACD Award Recipient' ],
  [ 'book',   'Published Author' ],
];
?>
<!-- wp:html -->
<section class="ds-meet-card" id="about">
  <div class="ds-meet-card__bg" aria-hidden="true"></div>

  <div class="ds-wrap">
    <div class="ds-meet-card__head ds-reveal">
      <span class="ds-label">MEET THE SPECIALIST</span>
      <h2 class="ds-meet-card__heading">A Dentist Who Treats You Like <em>Family</em>.</h2>
      <p class="ds-meet-card__sub">Three decades of changing lives, one DreamSmile&trade; at a time.</p>
    </div>

    <div class="ds-meet-card__body ds-reveal">
      <div class="ds-meet-card__media">
        <div class="ds-meet-card__frame" aria-hidden="true"></div>
        <img src="<?php echo esc_url( $casual ); ?>" alt="Dr. Jeffrey S. Burns, DDS" loading="lazy" />
        <div class="ds-meet-card__badge" aria-hidden="true">
          <span class="ds-meet-card__badge-num">30<sup>+</sup></span>
          <span class="ds-meet-card__badge-label">YEARS</span>
        </div>
      </div>

      <div class="ds-meet-card__text">
        <p class="ds-meet-card__kicker">DDS &middot; AACD Award Recipient &middot; Published Author</p>
        <h3 class="ds-meet-card__name">Dr. Jeffrey <span class="ds-meet-card__name-accent">Burns</span></h3>

        <p class="ds-meet-card__bio">
          Dr. Burns is a nationally recognized leader in dental implant dentistry. As the creator of <strong>The Burns Protocol</strong>, he&rsquo;s taught dentists across the country and gives every patient his personal cell number &mdash; because real care doesn&rsquo;t end when you leave the office.
        </p>

        <ul class="ds-meet-card__bullets">
          <?php foreach ( $bullets as $b ) : ?>
            <li><?php echo $b; ?></li>
          <?php endforeach; ?>
        </ul>

        <div class="ds-meet-card__creds">
          <?php foreach ( $credentials as $c ) : ?>
            <span class="ds-meet-card__cred">
              <span class="ds-meet-card__cred-icon"><?php echo $icons[ $c[0] ]; ?></span>
              <span><?php echo esc_html( $c[1] ); ?></span>
            </span>
          <?php endforeach; ?>
        </div>

        <div class="ds-meet-card__signature-row">
          <span class="ds-meet-card__signature">Dr. J. Burns</span>
          <a href="/#quiz" class="ds-btn ds-btn--solid ds-btn--sm">Schedule with Dr. Burns &rarr;</a>
        </div>
      </div>
    </div>

    <figure class="ds-meet-card__quote ds-reveal">
      <span class="ds-meet-card__quote-mark" aria-hidden="true">&ldquo;</span>
      <blockquote class="ds-meet-card__quote-body">
        Dr. Burns didn&rsquo;t just give me a new smile &mdash; he gave me my <em>confidence</em> back. I can&rsquo;t recommend him enough.
      </blockquote>
      <figcaption class="ds-meet-card__quote-cite">&mdash; Margaret T., DreamSmile&trade; Patient</figcaption>
    </figure>
  </div>
</section>
<!-- /wp:html -->
