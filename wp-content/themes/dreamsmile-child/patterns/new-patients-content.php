<?php
/**
 * Title: New Patients Content
 * Slug: dreamsmile/new-patients-content
 * Categories: dreamsmile
 *
 * Full New Patients page body. SEO: clean H2/H3 hierarchy under the
 * page-sub-hero H1, semantic sectioning, internal links to /implant-cost/,
 * /implant-faqs/, /#quiz. Includes graceful image fallbacks so the page
 * renders cleanly until per-section photos are sourced.
 */
defined( 'ABSPATH' ) || exit;
$office   = ds_office_data();
$base     = get_stylesheet_directory_uri() . '/assets/arrange';
$base_dir = trailingslashit( get_stylesheet_directory() ) . 'assets/arrange/';

/**
 * Per-section image slots. Drop in `np-welcome-banner.jpg` and
 * `np-first-visit.jpg` (recommended dimensions in the comments above each
 * fallback) — until then, sensible existing photos stand in.
 */
$np_welcome_banner = file_exists( $base_dir . 'np-welcome-banner.jpg' )
  ? $base . '/np-welcome-banner.jpg'
  : $base . '/Harrison-Hero.jpg'; // 1920×720 banner — replace with office/welcome photo

$np_first_visit_img = file_exists( $base_dir . 'np-first-visit.jpg' )
  ? $base . '/np-first-visit.jpg'
  : $base . '/casual-photo-burns.png';

$np_extra_img = file_exists( $base_dir . 'extra.jpg' )
  ? $base . '/extra.jpg'
  : ''; // 600×800 portrait — Dr. Burns + patient consultation

$icon_safety = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>';
$icon_calm   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"/></svg>';
$icon_phone  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>';
?>
<!-- wp:html -->

<nav class="ds-np-nav" aria-label="New patients page sections">
  <div class="ds-wrap">
    <span class="ds-np-nav__label">Jump to</span>
    <ul class="ds-np-nav__list">
      <li><a href="#first-visit"><span class="ds-np-nav__dot" aria-hidden="true"></span>Your First Visit</a></li>
      <li><a href="#before-visit"><span class="ds-np-nav__dot" aria-hidden="true"></span>What to Bring</a></li>
      <li><a href="#forms"><span class="ds-np-nav__dot" aria-hidden="true"></span>Patient Forms</a></li>
      <li><a href="#comfort"><span class="ds-np-nav__dot" aria-hidden="true"></span>Comfort &amp; Sedation</a></li>
      <li><a href="#payment"><span class="ds-np-nav__dot" aria-hidden="true"></span>Insurance &amp; Financing</a></li>
      <li><a href="#np-faqs"><span class="ds-np-nav__dot" aria-hidden="true"></span>FAQs</a></li>
    </ul>
  </div>
</nav>

<section class="ds-np-welcome">
  <div class="ds-wrap">
    <div class="ds-np-welcome__head ds-reveal">
      <span class="ds-label">WELCOME</span>
      <h2 class="ds-np-welcome__title">Welcome to <span class="ds-italic">DreamSmile&trade; Dentistry.</span></h2>
      <p class="ds-np-welcome__sub">If this is your first time visiting Dr. Burns&rsquo;s practice in New Market, VA, you&rsquo;re already in good hands. Here&rsquo;s exactly what to expect &mdash; no surprises, no hidden steps, no high-pressure sales pitch.</p>
    </div>
    <div class="ds-np-welcome__pillars ds-reveal">
      <div class="ds-np-pillar">
        <strong>30+ Years</strong>
        <span>of dental implant experience</span>
      </div>
      <div class="ds-np-pillar">
        <strong>Direct cell line</strong>
        <span>to Dr. Burns himself</span>
      </div>
      <div class="ds-np-pillar">
        <strong>One office</strong>
        <span>everything in-house, no referrals</span>
      </div>
    </div>
    <figure class="ds-np-welcome__banner ds-reveal">
      <img src="<?php echo esc_url( $np_welcome_banner ); ?>"
           alt="DreamSmile Dentistry &mdash; Dr. Burns&rsquo;s practice in New Market, VA"
           loading="lazy"
           onerror="this.style.display='none'" />
    </figure>
  </div>
</section>

<section class="ds-np-steps" id="first-visit">
  <div class="ds-wrap">
    <div class="ds-np-steps__head ds-reveal">
      <span class="ds-label">YOUR FIRST VISIT</span>
      <h2 class="ds-np-steps__title">Your first visit &mdash; <span class="ds-italic">a friendly, no-pressure walkthrough.</span></h2>
      <p class="ds-np-steps__sub">Most first visits run about 60&ndash;90 minutes. You&rsquo;ll leave with a clear understanding of your options and a written treatment plan if you want one.</p>
    </div>
    <div class="ds-np-steps__body">
      <figure class="ds-np-steps__media ds-reveal">
        <img src="<?php echo esc_url( $np_first_visit_img ); ?>"
             alt="Dr. Jeffrey S. Burns in consultation with a new patient"
             loading="lazy"
             onerror="this.parentElement.classList.add('ds-np-steps__media--missing')" />
      </figure>
      <ol class="ds-np-steps__list">
        <li class="ds-np-step ds-reveal">
          <span class="ds-np-step__num" aria-hidden="true">01</span>
          <div class="ds-np-step__body">
            <h3>Warm welcome</h3>
            <p>You&rsquo;ll be greeted by name and shown around the office. Coffee, tea, water &mdash; whatever helps you feel comfortable. We don&rsquo;t run on a stopwatch.</p>
          </div>
        </li>
        <li class="ds-np-step ds-reveal">
          <span class="ds-np-step__num" aria-hidden="true">02</span>
          <div class="ds-np-step__body">
            <h3>Conversation, not interrogation</h3>
            <p>Dr. Burns sits down with you to understand what brought you here &mdash; the discomfort, the photos you avoid, the meals you skip. No checklist, no rushing.</p>
          </div>
        </li>
        <li class="ds-np-step ds-reveal">
          <span class="ds-np-step__num" aria-hidden="true">03</span>
          <div class="ds-np-step__body">
            <h3>3D imaging &amp; smile preview</h3>
            <p>Modern in-house imaging &mdash; no shipping you to a separate facility. We capture the bone, soft tissue, and bite, then preview your potential smile right in the room.</p>
          </div>
        </li>
        <li class="ds-np-step ds-reveal">
          <span class="ds-np-step__num" aria-hidden="true">04</span>
          <div class="ds-np-step__body">
            <h3>Your written plan</h3>
            <p>Before you leave, you get a clear, itemized treatment plan with turnkey pricing. Take it home. No high-pressure decisions.</p>
          </div>
        </li>
      </ol>
    </div>
  </div>
</section>

<section class="ds-np-before" id="before-visit">
  <div class="ds-wrap">
    <div class="ds-np-before__grid<?php echo $np_extra_img ? ' ds-np-before__grid--with-media' : ''; ?>">
      <?php if ( $np_extra_img ) : ?>
        <figure class="ds-np-before__media ds-reveal">
          <img src="<?php echo esc_url( $np_extra_img ); ?>"
               alt="DreamSmile patient checklist"
               loading="lazy" />
        </figure>
      <?php endif; ?>
      <div class="ds-np-before__content">
        <div class="ds-np-before__copy ds-reveal">
          <span class="ds-label">BEFORE YOU COME</span>
          <h2 class="ds-np-before__title">A short checklist to make your visit smooth.</h2>
          <p>Want to save 10&ndash;15 minutes at check-in? Bring or send these in advance &mdash; but if you forget, no stress, we&rsquo;ll handle everything in the office.</p>
        </div>
        <ul class="ds-np-before__list ds-reveal">
          <li><strong>Photo ID</strong><span>Driver&rsquo;s license or any state ID</span></li>
          <li><strong>Insurance card</strong><span>Even if you&rsquo;re not sure it covers implants &mdash; we&rsquo;ll verify your coverage</span></li>
          <li><strong>Medication list</strong><span>Including supplements, dosages, and anything OTC you take regularly</span></li>
          <li><strong>Recent imaging</strong><span>If another office took X-rays in the last 2 years, we can request them</span></li>
          <li><strong>Your concerns, written down</strong><span>Easier than remembering in the chair</span></li>
          <li><strong>Someone you trust</strong><span>A friend or family member is welcome to sit in for the consultation</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="ds-np-forms" id="forms">
  <div class="ds-wrap">
    <div class="ds-np-forms__head ds-reveal">
      <span class="ds-label">NEW PATIENT FORMS</span>
      <h2 class="ds-np-forms__title">Save 10&ndash;15 minutes at check-in &mdash; <span class="ds-italic">fill the forms in advance</span>.</h2>
      <p class="ds-np-forms__sub">Most new patients prefer to send their forms in before the visit. You can either download and print, or fill out the short request form below and we&rsquo;ll email you a secure online version.</p>
    </div>

    <div class="ds-np-forms__grid">

      <article class="ds-np-forms-card ds-reveal">
        <span class="ds-np-forms-card__icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
        </span>
        <h3 class="ds-np-forms-card__title">Download &amp; Print</h3>
        <p class="ds-np-forms-card__desc">Print, fill out by hand, and bring to your visit (or email back to us). PDF format, opens in any browser.</p>
        <ul class="ds-np-forms-card__list">
          <li><a href="#" data-ds-form-pdf="patient-info"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg> Patient Information</a></li>
          <li><a href="#" data-ds-form-pdf="medical-history"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg> Medical History</a></li>
          <li><a href="#" data-ds-form-pdf="insurance"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg> Insurance Authorization</a></li>
          <li><a href="#" data-ds-form-pdf="hipaa"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg> HIPAA Acknowledgement</a></li>
        </ul>
        <p class="ds-np-forms-card__hint"><em>PDF links go live once forms are uploaded by the office. In the meantime, request a digital version on the right.</em></p>
      </article>

      <article class="ds-np-forms-card ds-reveal">
        <span class="ds-np-forms-card__icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>
        </span>
        <h3 class="ds-np-forms-card__title">Request Digital Forms</h3>
        <p class="ds-np-forms-card__desc">Send us your name and email and we&rsquo;ll email you secure online versions to fill out from any device. Faster than printing.</p>
        <form class="ds-np-forms-form" data-ds-forms-request
              data-ds-access-key="" data-ds-endpoint="">
          <!--
            Same one-step setup as the consultation modal (parts/footer.html):
            paste the Web3Forms Access Key (https://web3forms.com) into
            data-ds-access-key, OR a full Formspree/Getform URL into
            data-ds-endpoint. Until one is set, this shows the confirmation
            without sending (demo mode). See open-questions memory entry #1.
          -->
          <label class="ds-np-forms-field">
            <span>Full Name</span>
            <input type="text" name="name" autocomplete="name" required />
          </label>
          <label class="ds-np-forms-field">
            <span>Email</span>
            <input type="email" name="email" autocomplete="email" required />
          </label>
          <label class="ds-np-forms-field">
            <span>Phone <em>(optional)</em></span>
            <input type="tel" name="phone" autocomplete="tel" />
          </label>
          <input type="hidden" name="subject" value="DreamSmile &mdash; New Patient Forms Request" />
          <input type="hidden" name="_subject" value="DreamSmile &mdash; New Patient Forms Request" />
          <input type="hidden" name="from_name" value="DreamSmile Website" />
          <input type="hidden" name="source_page" data-ds-source value="/new-patients/" />
          <input type="checkbox" name="botcheck" tabindex="-1" autocomplete="off" aria-hidden="true" style="display:none !important" />
          <button type="submit" class="ds-btn ds-btn--solid ds-btn--block">Email Me the Forms</button>
          <p class="ds-np-forms-form__error" data-ds-forms-error hidden role="alert">
            Something went wrong. Please call
            <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a>
            and we&rsquo;ll email your forms.
          </p>
          <p class="ds-np-forms-form__note">We&rsquo;ll send the secure form link within one business day. Your info is never sold or shared.</p>
          <div class="ds-np-forms-form__success" data-ds-forms-success hidden>
            <strong>Thank you!</strong> We&rsquo;ll email your secure forms within one business day.
          </div>
        </form>
      </article>

    </div>

    <div class="ds-np-forms__assist ds-reveal">
      <p>
        Prefer to do everything in the office? That&rsquo;s fine too &mdash; arrive 15 minutes early and we&rsquo;ll have a tablet ready. Questions about the forms?
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>">Call <?php echo esc_html( $office['phone'] ); ?></a>
        or
        <a href="/contact/">visit our contact page</a>.
      </p>
    </div>
  </div>
</section>

<section class="ds-np-comfort" id="comfort">
  <div class="ds-wrap">
    <div class="ds-np-comfort__head ds-reveal">
      <span class="ds-label">COMFORT &amp; SEDATION</span>
      <h2 class="ds-np-comfort__title">Anxious? <span class="ds-italic">Most of our patients were too.</span></h2>
      <p>Dr. Burns has spent 30 years building a practice around the patients other offices missed &mdash; the people who put off care because the chair felt scary. You won&rsquo;t be the exception.</p>
    </div>
    <div class="ds-np-comfort__grid">
      <article class="ds-np-comfort-card ds-reveal">
        <span class="ds-np-comfort-card__icon"><?php echo $icon_safety; ?></span>
        <h3>On-staff anesthesiologist</h3>
        <p>Board-certified, in the room for every implant procedure. Not a CRNA, not a contractor &mdash; a full physician anesthesiologist watching your vitals start to finish.</p>
      </article>
      <article class="ds-np-comfort-card ds-reveal">
        <span class="ds-np-comfort-card__icon"><?php echo $icon_calm; ?></span>
        <h3>Sedation that fits you</h3>
        <p>From simple local numbing to nitrous oxide to full IV sedation. We&rsquo;ll match your treatment, your medical history, and your comfort level &mdash; your call.</p>
      </article>
      <article class="ds-np-comfort-card ds-reveal">
        <span class="ds-np-comfort-card__icon"><?php echo $icon_phone; ?></span>
        <h3>Direct line to Dr. Burns</h3>
        <p>Before, during, and after &mdash; every implant patient gets Dr. Burns&rsquo;s personal cell number. Pain or worry at 9 PM? Call him.</p>
      </article>
    </div>
  </div>
</section>

<section class="ds-np-payment" id="payment">
  <div class="ds-wrap">
    <div class="ds-np-payment__head ds-reveal">
      <span class="ds-label">INSURANCE &amp; FINANCING</span>
      <h2 class="ds-np-payment__title">Most plans accepted. Flexible financing for the rest.</h2>
      <p>We work with most major dental insurance plans and verify your coverage before treatment so you know what you owe &mdash; no surprise bills.</p>
    </div>
    <div class="ds-np-payment__grid">
      <article class="ds-np-payment-card ds-reveal">
        <h3>Insurance</h3>
        <p>We file claims directly with most major providers &mdash; Delta Dental, MetLife, Cigna, Aetna, Anthem, and others. Bring your card, we&rsquo;ll handle the paperwork.</p>
      </article>
      <article class="ds-np-payment-card ds-reveal">
        <h3>Financing</h3>
        <p>For procedures insurance won&rsquo;t cover, we offer flexible financing through <strong>Cherry Credit</strong> and <strong>CareCredit</strong> &mdash; including 0% APR plans for qualifying patients.</p>
      </article>
      <article class="ds-np-payment-card ds-reveal">
        <h3>Turnkey pricing</h3>
        <p>One number covers everything &mdash; surgery, anesthesia, lab work, restoration, follow-ups, and the lifetime warranty. No itemized surprises.</p>
      </article>
    </div>
    <div class="ds-np-payment__cta ds-reveal">
      <a href="/implant-cost/" class="ds-btn ds-btn--outlined">See full cost &amp; financing details</a>
    </div>
  </div>
</section>

<section class="ds-np-faqs" id="np-faqs">
  <div class="ds-wrap">
    <div class="ds-np-faqs__head ds-reveal">
      <span class="ds-label">NEW PATIENT FAQS</span>
      <h2 class="ds-np-faqs__title">Common first-visit questions.</h2>
    </div>
    <div class="ds-np-faqs__list">
      <details class="ds-np-faq ds-reveal">
        <summary><span>Do I need a referral to see Dr. Burns?</span></summary>
        <div class="ds-np-faq__a">No &mdash; Dr. Burns sees patients directly. Many actually find us after another dentist told them their case was &ldquo;too complex.&rdquo; You can book directly.</div>
      </details>
      <details class="ds-np-faq ds-reveal">
        <summary><span>Is the consultation really free?</span></summary>
        <div class="ds-np-faq__a">Yes. Your first consultation &mdash; including 3D imaging and a written treatment plan &mdash; is on us. No obligation to move forward, ever.</div>
      </details>
      <details class="ds-np-faq ds-reveal">
        <summary><span>What if I haven&rsquo;t been to a dentist in years?</span></summary>
        <div class="ds-np-faq__a">Honestly, that&rsquo;s the most common patient we see. No judgment, no lecture. We just want to know where you are now and figure out the right next step together.</div>
      </details>
      <details class="ds-np-faq ds-reveal">
        <summary><span>Can a family member come with me?</span></summary>
        <div class="ds-np-faq__a">Absolutely. Bring whoever helps you feel comfortable &mdash; they&rsquo;re welcome to sit in for the consultation and ask questions alongside you.</div>
      </details>
      <details class="ds-np-faq ds-reveal">
        <summary><span>What happens if I decide implants aren&rsquo;t right for me?</span></summary>
        <div class="ds-np-faq__a">You walk out with the same warm welcome you walked in with. No pressure. Sometimes the right answer is timing, sometimes it&rsquo;s a different procedure &mdash; we&rsquo;ll tell you straight, even if that means we&rsquo;re not the answer.</div>
      </details>
      <details class="ds-np-faq ds-reveal">
        <summary><span>How do I prepare emotionally if I&rsquo;m nervous?</span></summary>
        <div class="ds-np-faq__a">Tell us. Seriously &mdash; mention it when you book. We&rsquo;ll plan extra time, walk you through everything, and you can stop the visit at any moment. No question is too small.</div>
      </details>
    </div>
    <div class="ds-np-faqs__cta ds-reveal">
      <a href="/implant-faqs/" class="ds-btn ds-btn--outlined">See all dental implant FAQs &rarr;</a>
    </div>
  </div>
</section>

<section class="ds-np-cta">
  <div class="ds-wrap">
    <div class="ds-np-cta__inner ds-reveal">
      <span class="ds-label">READY WHEN YOU ARE</span>
      <h2 class="ds-np-cta__title">Book your free first visit.</h2>
      <p class="ds-np-cta__sub">Pick a time that works for you. <?php echo esc_html( $office['phone'] ); ?> rings to a real person, every time &mdash; never a call center.</p>
      <div class="ds-np-cta__ctas">
        <a href="/#quiz" class="ds-btn ds-btn--solid">Schedule My First Visit</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>

<!-- /wp:html -->
