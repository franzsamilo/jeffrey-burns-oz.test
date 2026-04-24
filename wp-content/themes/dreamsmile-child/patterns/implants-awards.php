<?php
/**
 * Title: Implants Awards + Video
 * Slug: dreamsmile/implants-awards
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- wp:html -->
<section class="ds-awards">
  <div class="ds-wrap ds-awards__grid">
    <div class="ds-awards__left ds-reveal">
      <span class="ds-label">AWARDS &amp; RECOGNITION</span>
      <h2 class="ds-awards__title">Three Decades of <span class="ds-italic">Trusted Care.</span></h2>
      <p class="ds-awards__sub">Dr. Burns has spent his career turning dental implants into an art form &mdash; and teaching it to dentists across the country.</p>

      <div class="ds-awards__badges">
        <div class="ds-award-badge">
          <div class="ds-award-badge__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 4h10v4a5 5 0 01-10 0V4Z"/><path d="M7 6H4a1 1 0 00-1 1v1a4 4 0 004 4"/><path d="M17 6h3a1 1 0 011 1v1a4 4 0 01-4 4"/><path d="M12 13v4"/><path d="M9 21h6"/></svg>
          </div>
          <p class="ds-award-badge__title">30+ Years</p>
          <p class="ds-award-badge__sub">Of Experience</p>
        </div>

        <div class="ds-award-badge">
          <div class="ds-award-badge__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="9" r="5"/><path d="M8.4 13.3L6.5 21l5.5-3 5.5 3-1.9-7.7"/></svg>
          </div>
          <p class="ds-award-badge__title">People&rsquo;s</p>
          <p class="ds-award-badge__sub">Choice Award</p>
        </div>

        <div class="ds-award-badge">
          <div class="ds-award-badge__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3c-4 0-7 2.5-7 6 0 2 .6 3.6 1.5 5.7.7 1.6 1 3.3 1.2 5 .1.8.8 1.3 1.6 1.2.7-.1 1.2-.7 1.2-1.4l.2-3.5c.1-1 .7-1.5 1.3-1.5s1.2.5 1.3 1.5l.2 3.5c0 .7.5 1.3 1.2 1.4.8.1 1.5-.4 1.6-1.2.2-1.7.5-3.4 1.2-5 .9-2.1 1.5-3.7 1.5-5.7 0-3.5-3-6-7-6Z"/></svg>
          </div>
          <p class="ds-award-badge__title">AACD</p>
          <p class="ds-award-badge__sub">Award Recipient</p>
        </div>

        <div class="ds-award-badge">
          <div class="ds-award-badge__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v5c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-3z"/><path d="M9 12l2 2 4-4"/></svg>
          </div>
          <p class="ds-award-badge__title">Nationally</p>
          <p class="ds-award-badge__sub">Recognized</p>
        </div>
      </div>

      <div class="ds-awards__rating">
        <div class="ds-awards__stars" aria-label="5.0 out of 5 stars">
          <?php for ( $i = 0; $i < 5; $i++ ) : ?>
            <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M12 2l3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg>
          <?php endfor; ?>
        </div>
        <strong>5.0</strong>
        <span>from 200+ Google reviews</span>
      </div>
    </div>

    <div class="ds-awards__right ds-reveal">
      <div class="ds-awards__video ds-awards__video--has-clip">
        <span class="ds-awards__tv-chip">
          <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14v7M3 9v6l9 5 9-5V9"/></svg>
          <span>DR. BURNS LECTURES NATIONWIDE</span>
        </span>
        <video
          class="ds-awards__video-el"
          src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/arrange/Dr.-Burns-Lecture-10-25-25-TikTok.mp4' ); ?>"
          preload="metadata"
          playsinline
          muted
          controls
          aria-label="Dr. Burns lecture clip"
        ></video>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
