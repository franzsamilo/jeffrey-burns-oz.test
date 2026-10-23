<?php
/**
 * Title: Smile Reveal
 * Slug: dreamsmile/smile-reveal
 * Categories: dreamsmile
 *
 * Smile Reveal, the AI smile preview the practice's marketing agency runs
 * (ds_lead_tools()). The agency places it straight after the hero; on this
 * homepage the quiz row is part of the hero's fold, so it follows that row.
 * The iframe attributes are the vendor's embed code; lead-embeds.js carries
 * its URL-parameter script.
 */
defined( 'ABSPATH' ) || exit;
$tools = ds_lead_tools();
?>
<!-- wp:html -->
<section class="ds-smile-reveal" id="smile-preview">
  <div class="ds-wrap ds-smile-reveal__grid">
    <div class="ds-smile-reveal__copy ds-reveal">
      <span class="ds-label">FREE AI SMILE PREVIEW</span>
      <h2 class="ds-smile-reveal__title">See Your New Smile <span class="ds-italic">Before You Begin</span></h2>
      <p class="ds-smile-reveal__sub">Take a selfie or upload a photo, and see a preview of what your smile could look like after treatment.</p>
      <ol class="ds-smile-reveal__steps">
        <li><span class="ds-smile-reveal__num" aria-hidden="true">1</span><span>Take or upload a smiling photo</span></li>
        <li><span class="ds-smile-reveal__num" aria-hidden="true">2</span><span>See an AI preview of your new smile</span></li>
        <li><span class="ds-smile-reveal__num" aria-hidden="true">3</span><span>Plan the real thing with Dr. Burns at your free DreamSmile<sup class="ds-tm">&trade;</sup> assessment</span></li>
      </ol>
      <p class="ds-smile-reveal__note">A preview, not a promise &mdash; your actual result is planned with you, in person.</p>
    </div>

    <div class="ds-smile-reveal__embed ds-reveal">
      <iframe data-sr-embed src="<?php echo esc_url( $tools['smile_url'] ); ?>" title="AI smile preview" width="100%" height="650" frameborder="0" referrerpolicy="origin" allow="camera *; microphone *" loading="lazy"></iframe>
    </div>
  </div>
</section>
<!-- /wp:html -->
