<?php
/**
 * Title: Expertise
 * Slug: dreamsmile/expertise
 * Categories: dreamsmile
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- wp:html -->
<section class="ds-expertise">
  <div class="ds-wrap">
    <div class="ds-expertise__head ds-reveal">
      <h2 class="ds-expertise__title">Nationally Recognized Expertise you can Trust</h2>
      <div><span class="ds-pill">AS SEEN ON</span></div>
      <!-- Placeholder media badges — swap the icon chips below for the real TV station + radio station logos (see texassedationdental.com for the layout reference). -->
      <div class="ds-expertise__media" aria-label="Featured in the media">
        <span class="ds-expertise__media-logo">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="13" rx="2"/><path d="M8 7l4-4 4 4"/><path d="M7 20h10"/></svg>
          <span class="ds-expertise__media-name">TV&nbsp;Station<br><small>Logo</small></span>
        </span>
        <span class="ds-expertise__media-logo">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 8a4 4 0 0 1 0 8"/><path d="M19 5a8 8 0 0 1 0 14"/><circle cx="7" cy="12" r="3"/><path d="M7 15v5"/></svg>
          <span class="ds-expertise__media-name">Radio&nbsp;Station<br><small>Logo</small></span>
        </span>
      </div>
      <p class="ds-expertise__media-note">Recognized nationally for the Burns Protocol &mdash; Dr. Burns&rsquo;s proprietary approach to same-day dental implants.</p>
    </div>

    <div class="ds-expertise__video ds-reveal">
      <div class="ds-expertise__video-frame">
        <video
          class="ds-expertise__video-el"
          src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/arrange/Showcase-Burns-Protocol-TV.mp4' ); ?>"
          preload="metadata"
          playsinline
          muted
          controls
          aria-label="The Showcase of the Burns Protocol — Dr. Burns TV interview"
        ></video>
      </div>
    </div>

    <div class="ds-expertise__doctor ds-reveal">
      <h3>Dr. Jeffrey S. Burns, DDS</h3>
      <p>Changing lives, one <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/arrange/dreamsmile-wordmark-small.png' ); ?>" alt="DreamSmile" class="ds-wordmark-inline" /><sup class="ds-tm">&trade;</sup> at a time</p>
    </div>

    <div class="ds-expertise__rating ds-reveal">
      <span class="ds-rating-label">Google Rating</span>
      <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 01-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z"/>
        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
      </svg>
      <span class="ds-rating-value">5.0</span>
      <span class="ds-stars" aria-hidden="true">
        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
      </span>
    </div>

    <div class="ds-stats">
      <div class="ds-stat ds-reveal">
        <div class="ds-stat__number">30+</div>
        <div class="ds-stat__label">Years</div>
        <div class="ds-stat__subtitle">Trusted Experience</div>
        <div class="ds-stat__icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
        </div>
      </div>
      <div class="ds-stat ds-reveal">
        <div class="ds-stat__number">AACD</div>
        <div class="ds-stat__label">Award</div>
        <div class="ds-stat__subtitle">For Pioneering the Burns Protocol</div>
        <div class="ds-stat__icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M18.75 4.236c.982.143 1.954.317 2.916.52A6.003 6.003 0 0016.27 9.728M18.75 4.236V4.5c0 2.108-.966 3.99-2.48 5.228m0 0a6.003 6.003 0 01-5.54 0"/></svg>
        </div>
      </div>
      <div class="ds-stat ds-reveal">
        <div class="ds-stat__number">100+</div>
        <div class="ds-stat__label">Smiles</div>
        <div class="ds-stat__subtitle">Transformed Lives</div>
        <div class="ds-stat__icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75z"/></svg>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
