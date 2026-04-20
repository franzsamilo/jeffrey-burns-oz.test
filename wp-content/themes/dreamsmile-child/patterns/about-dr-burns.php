<?php
/**
 * Title: About Dr. Burns
 * Slug: dreamsmile/about-dr-burns
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$casual = get_stylesheet_directory_uri() . '/assets/arrange/casual-photo-burns.png';

/**
 * Uniform custom icons for credentials — same stroke language as the frustrations set.
 */
$icons = [
  'flag' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M4 21V4"/><path d="M4 4h12l-2.5 4L16 12H4"/></svg>',

  'ribbon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <circle cx="12" cy="9" r="5"/><path d="M8.4 13.3L6.5 21l5.5-3 5.5 3-1.9-7.7"/></svg>',

  'trophy' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M7 4h10v4a5 5 0 01-10 0V4Z"/>
    <path d="M7 6H4a1 1 0 00-1 1v1a4 4 0 004 4"/>
    <path d="M17 6h3a1 1 0 011 1v1a4 4 0 01-4 4"/>
    <path d="M12 13v4"/><path d="M9 21h6"/></svg>',

  'book' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M4 5.5A2.5 2.5 0 016.5 3H19a1 1 0 011 1v16a1 1 0 01-1 1H6.5A2.5 2.5 0 014 18.5z"/>
    <path d="M4 18.5A2.5 2.5 0 016.5 16H20"/></svg>',
];

$credentials = [
  [ 'flag',   'Nationally Recognized' ],
  [ 'ribbon', 'Top Free Cosmetic Fellowship' ],
  [ 'trophy', 'AACD Award Recipient' ],
  [ 'book',   'Published Author' ],
];
?>
<!-- wp:html -->
<section class="ds-about" id="about">
  <div class="ds-wrap">
    <div class="ds-about__head ds-reveal">
      <span class="ds-label">MEET THE SPECIALIST</span>
      <h2 class="ds-about__title">Dr. Jeffrey S. Burns</h2>
    </div>

    <div class="ds-about__grid">
      <div class="ds-reveal">
        <p class="ds-about__bio">
          Dr. Jeffrey S. Burns is a nationally recognized leader in dental implant dentistry with over 30 years of experience transforming smiles. As the creator of the Burns Protocol, he has developed a proprietary approach to dental implants that prioritizes patient safety, comfort, and exceptional results. Dr. Burns has taught dentists nationwide and is known for giving every patient his personal cell phone number &mdash; because he believes your care doesn&rsquo;t end when you leave the office.
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

      <div class="ds-reveal">
        <img class="ds-about__photo" src="<?php echo esc_url( $casual ); ?>" alt="Dr. Jeffrey S. Burns" loading="lazy" />
      </div>
    </div>

    <div class="ds-about__quote ds-reveal">
      <span class="ds-about__quote-mark" aria-hidden="true">&ldquo;</span>
      <blockquote class="ds-about__quote-body">
        <p class="ds-about__quote-text">
          Dr. Burns didn&rsquo;t just give me a new smile &mdash; he gave me my confidence back. I can&rsquo;t recommend him enough.
        </p>
        <cite class="ds-about__quote-cite">&mdash; Margaret T., DreamSmile Patient</cite>
      </blockquote>
    </div>
  </div>
</section>
<!-- /wp:html -->
