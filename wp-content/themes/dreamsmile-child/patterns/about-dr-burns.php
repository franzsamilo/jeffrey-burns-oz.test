<?php
/**
 * Title: About Dr. Burns
 * Slug: dreamsmile/about-dr-burns
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$casual = get_stylesheet_directory_uri() . '/assets/arrange/casual-photo-burns.png';

$icons = [
  'flag' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M5 13l4 4L19 7"/></svg>',

  'teach' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M5 13l4 4L19 7"/></svg>',

  'trophy' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M5 13l4 4L19 7"/></svg>',

  'book' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M5 13l4 4L19 7"/></svg>',
];

$credentials = [
  [ 'flag',   'Nationally Recognized' ],
  [ 'teach',  'Teaches Doctors Nationwide' ],
  [ 'trophy', 'AACD Award Recipient' ],
  [ 'book',   'Published Author' ],
];
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
