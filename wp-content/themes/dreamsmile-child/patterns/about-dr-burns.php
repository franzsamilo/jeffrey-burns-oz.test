<?php
/**
 * Title: About Dr. Burns
 * Slug: dreamsmile/about-dr-burns
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$casual = get_stylesheet_directory_uri() . '/assets/arrange/casual-photo-burns.png';

$icons = [
  'flag'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 21V4"/><path d="M4 4h12l-2.5 4L16 12H4"/></svg>',
  'teach'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 10L12 4 2 10l10 6 10-6z"/><path d="M6 12v5c2 2 4 3 6 3s4-1 6-3v-5"/></svg>',
  'trophy' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 4h10v4a5 5 0 01-10 0V4Z"/><path d="M7 6H4a1 1 0 00-1 1v1a4 4 0 004 4"/><path d="M17 6h3a1 1 0 011 1v1a4 4 0 01-4 4"/><path d="M12 13v4"/><path d="M9 21h6"/></svg>',
  'book'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 016.5 3H19a1 1 0 011 1v16a1 1 0 01-1 1H6.5A2.5 2.5 0 014 18.5z"/><path d="M4 18.5A2.5 2.5 0 016.5 16H20"/></svg>',
];

$credentials = [
  [ 'flag',   'Nationally Recognized' ],
  [ 'teach',  'Teaches Doctors Nationwide' ],
  [ 'trophy', 'AACD Award Recipient' ],
  [ 'book',   'Published Author' ],
];

// Hide the deep-dive CTA when we're already on /meet-dr-burns/ — pointing
// to the page you're on is noise.
$current_slug = ( is_page() && ( $cp = get_post() ) ) ? $cp->post_name : '';
$show_more    = $current_slug !== 'meet-dr-burns';
?>
<!-- wp:html -->
<section class="ds-about" id="about">
  <div class="ds-wrap">
    <div class="ds-about__grid">
      <div class="ds-reveal ds-about__photo-col">
        <img class="ds-about__photo" src="<?php echo esc_url( $casual ); ?>" alt="Dr. Jeffrey S. Burns" loading="lazy" />
      </div>

      <div class="ds-reveal ds-about__text-col">
        <span class="ds-label">MEET THE SPECIALIST</span>
        <h2 class="ds-about__title">Dr. Jeffrey S. Burns</h2>

        <p class="ds-about__bio">
          Dr. Jeffrey S. Burns is a nationally recognized leader in dental implantology and smile design with over 30 years of hands-on implant experience. He is the creator of the Burns Protocol, a proven multi-step system he has taught to Dentists across the United States to consistently deliver healthy, long-lasting DreamSmile.
        </p>
        <p class="ds-about__bio">
          Dr. Burns combines elite expertise with genuine care&mdash;so much so that every DreamSmile patient receives his personal cell phone number, ensuring direct access, confidence, and peace of mind throughout their transformation.
        </p>

        <div class="ds-about__credentials">
          <?php foreach ( $credentials as $c ) : ?>
            <span class="ds-about__credential">
              <span class="ds-about__credential-icon"><?php echo $icons[ $c[0] ]; ?></span>
              <?php echo $c[1]; ?>
            </span>
          <?php endforeach; ?>
        </div>

        <?php if ( $show_more ) : ?>
        <a href="/meet-dr-burns/" class="ds-about__more">
          Learn more about Dr.&nbsp;Burns
          <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="13 6 19 12 13 18"/></svg>
        </a>
        <?php endif; ?>
      </div>
    </div>

    <div class="ds-about__quote ds-reveal">
      <span class="ds-about__quote-mark" aria-hidden="true">&ldquo;</span>
      <blockquote class="ds-about__quote-body">
        <p class="ds-about__quote-text">
          Dr. Burns was very receptive to all of my concerns, kind and very professional. Very patient oriented. Excellent at explaining every detail of this journey towards getting the results I desire. I feel very comfortable saying that this office rates second to none.
        </p>
        <cite class="ds-about__quote-cite">&mdash; Gene Tucker</cite>
      </blockquote>
    </div>
  </div>
</section>
<!-- /wp:html -->
