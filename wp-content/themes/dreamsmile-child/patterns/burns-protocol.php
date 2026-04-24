<?php
/**
 * Title: Burns Protocol
 * Slug: dreamsmile/burns-protocol
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
$surgical = get_stylesheet_directory_uri() . '/assets/arrange/surgical-photo-burns.png';

$steps = [
  [ 1, 'DreamSmile Assessment',         'A comprehensive evaluation of your oral health, goals, and candidacy for dental implants. We take advanced 3D imaging and develop your personalized treatment plan.' ],
  [ 2, 'DreamSmile Design Day',         'Using digital smile design technology, we create a preview of your new smile. You&rsquo;ll see your results before treatment even begins.' ],
  [ 3, 'DreamSmile Creation Day',       'The day your new smile begins to take shape. With our on-staff anesthesiologist, you&rsquo;ll be comfortable and safe throughout the entire procedure.' ],
  [ 4, 'DreamSmile Refinement',         'Fine-tuning every detail to ensure your smile looks and feels perfect. We don&rsquo;t settle for &ldquo;good enough&rdquo; &mdash; we aim for exceptional.' ],
  [ 5, 'DreamSmile Reveal',             'The moment you&rsquo;ve been waiting for. See your brand-new, permanent smile for the first time. This is the day that changes everything.' ],
  [ 6, 'Lifetime Care &amp; Maintenance', 'Your DreamSmile journey doesn&rsquo;t end at the reveal. We provide ongoing care and maintenance to ensure your smile lasts a lifetime.' ],
];
?>
<!-- wp:html -->
<section class="ds-protocol">
  <div class="ds-wrap">
    <div class="ds-protocol__head ds-reveal">
      <span class="ds-label">YOUR JOURNEY</span>
      <h2 class="ds-protocol__title">The Burns Protocol</h2>
      <p class="ds-protocol__lede">
        Dr. Burns&rsquo; proprietary 6-step process for consistently creating healthy, beautiful, and natural-looking Dream Smiles. Developed over 30+ years and now taught to doctors across the United States.
      </p>
      <span class="ds-protocol__pill">NATIONALLY RECOGNIZED PROTOCOL</span>
    </div>

    <div class="ds-protocol__grid">
      <div class="ds-protocol__photo ds-reveal">
        <img src="<?php echo esc_url( $surgical ); ?>" alt="Dr. Burns in surgical loupes" loading="lazy" />
      </div>

      <div class="ds-steps">
        <?php foreach ( $steps as $step ) : ?>
          <div class="ds-step ds-reveal">
            <div class="ds-step__num"><?php echo (int) $step[0]; ?></div>
            <div class="ds-step__body">
              <h3><?php echo $step[1]; ?></h3>
              <p><?php echo $step[2]; ?></p>
              <a href="#quiz" class="ds-step__link">SCHEDULE YOUR FREE ASSESSMENT &rarr;</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
