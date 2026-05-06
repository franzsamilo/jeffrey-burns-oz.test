<?php
/**
 * Title: Coming Soon
 * Slug: dreamsmile/coming-soon
 * Categories: dreamsmile
 *
 * Placeholder section for pages that are wired into the nav but not yet designed.
 */
defined( 'ABSPATH' ) || exit;
$title = get_the_title() ?: 'Coming Soon';
?>
<!-- wp:html -->
<section class="ds-coming">
  <div class="ds-wrap ds-coming__inner ds-reveal">
    <span class="ds-label">IN PROGRESS</span>
    <h2 class="ds-coming__title"><?php echo esc_html( $title ); ?></h2>
    <p class="ds-coming__sub">This page is being prepared. In the meantime, take the 60-second eligibility quiz or give us a call &mdash; Dr. Burns would love to hear from you.</p>
    <div class="ds-coming__ctas">
      <a href="/#quiz" class="ds-btn ds-btn--solid">Take the Quiz</a>
      <a href="tel:+15407408937" class="ds-btn ds-btn--outlined">Call (540) 740-8937</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
