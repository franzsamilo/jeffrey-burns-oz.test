<?php
/**
 * Title: Free Guide (Ebook)
 * Slug: dreamsmile/ebook-cta
 * Categories: dreamsmile
 *
 * The agency's "Ebook Code Template" (sent 2026-10-24), rebuilt in the theme's
 * own styles. Its copy is kept, except "free consultation" → "free assessment"
 * (client rule, Aug 4 meeting). The button goes to the agency's funnel page,
 * which delivers the guide. The agency places this block straight after Services.
 */
defined( 'ABSPATH' ) || exit;
$tools = ds_lead_tools();
$img   = get_stylesheet_directory_uri() . '/assets/arrange/guide-spread.webp';
$items = [
    'The difference between implants, bridges &amp; dentures',
    'Why All-on-X is the gold standard',
    'What treatment really costs (and how people afford it)',
    'How to claim your free assessment',
];
?>
<!-- wp:html -->
<section class="ds-ebook" id="free-guide">
  <div class="ds-wrap ds-ebook__grid">
    <figure class="ds-ebook__media ds-reveal">
      <img src="<?php echo esc_url( $img ); ?>" alt="The Ultimate Guide to Dental Implants by Dr. Jeffrey S. Burns &mdash; cover and inside pages" width="806" height="860" loading="lazy" />
    </figure>

    <div class="ds-ebook__copy ds-reveal">
      <span class="ds-label">FREE DENTAL IMPLANT GUIDE</span>
      <h2 class="ds-ebook__title">Ready to <span class="ds-italic">Restore</span> Your Smile?</h2>
      <p class="ds-ebook__sub">Grab our free Dental Implant Guide to learn:</p>
      <ol class="ds-ebook__list">
        <?php foreach ( $items as $i => $item ) : ?>
          <li><span class="ds-ebook__num" aria-hidden="true"><?php echo (int) $i + 1; ?></span><span><?php echo $item; ?></span></li>
        <?php endforeach; ?>
      </ol>
      <a href="<?php echo esc_url( $tools['ebook_url'] ); ?>" target="_blank" rel="noopener" class="ds-btn ds-btn--solid ds-ebook__cta">Download the Free Guide</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
