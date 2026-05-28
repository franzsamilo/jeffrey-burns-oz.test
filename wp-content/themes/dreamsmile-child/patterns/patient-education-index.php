<?php
/**
 * Title: Patient Education Index
 * Slug: dreamsmile/patient-education-index
 * Categories: dreamsmile
 *
 * Blog-style article index for /patient-education/. Per the May-13
 * client checklist, "Patient Education" is what we're calling the blog.
 *
 * Pulls the 10 patient-ed/blog topics from ds_service_pages() and groups
 * them into three reader-friendly clusters:
 *   • Preventive Care  — anesthesia, dental-exams, oral-hygiene,
 *                         teeth-cleaning, dental-sealants
 *   • Gum Health       — deep-teeth-cleaning, periodontal-maintenance
 *                         (+ link to the /gum-disease/ topic guide)
 *   • Restorative      — dental-fillings
 *                         (+ link to the /restorative-care/ topic guide)
 *
 * Each card shows category, estimated read-time, title, preview, and
 * a "Read article" link. Read-time is auto-estimated from the article's
 * intro + steps content (≈ 200 wpm), bucketed to whole minutes.
 */
defined( 'ABSPATH' ) || exit;

$svc_all = function_exists( 'ds_service_pages' ) ? ds_service_pages() : [];
$office  = ds_office_data();

/**
 * Article slugs grouped by reader-friendly cluster.
 * Order within a group = display order on the index.
 */
$groups = [
  'preventive' => [
    'label'    => 'PREVENTIVE CARE',
    'title'    => 'Keeping problems small.',
    'sub'      => 'Honest articles about the everyday care that keeps your mouth healthy — and what to actually expect at each visit.',
    'slugs'    => [ 'anesthesia', 'dental-exams', 'oral-hygiene', 'teeth-cleaning', 'dental-sealants' ],
  ],
  'gum-health' => [
    'label'    => 'GUM HEALTH',
    'title'    => 'Catching gum disease early.',
    'sub'      => 'Two stages of care, written plainly. If you have bleeding gums or persistent bad breath, start here.',
    'slugs'    => [ 'deep-teeth-cleaning', 'periodontal-maintenance' ],
    'guide'    => [ 'href' => '/gum-disease/', 'label' => 'Topic guide: Gum Disease Treatment' ],
  ],
  'restorative' => [
    'label'    => 'RESTORATIVE',
    'title'    => 'When a tooth needs fixing.',
    'sub'      => 'What to expect from common restorative work — and how Dr. Burns thinks through your options.',
    'slugs'    => [ 'dental-fillings' ],
    'guide'    => [ 'href' => '/restorative-care/', 'label' => 'Topic guide: Restorative Care' ],
  ],
];

/**
 * Friendly category label per service.category (for the card badge).
 */
$cat_labels = [
  'implants' => 'Implants',
  'general'  => 'General',
  'cosmetic' => 'Cosmetic',
  'restore'  => 'Restorative',
  'prevent'  => 'Preventive',
  'resource' => 'Resource',
];
?>
<!-- wp:html -->

<section class="ds-pated-intro">
  <div class="ds-wrap">
    <div class="ds-pated-intro__head ds-reveal">
      <span class="ds-label">WHY THIS PAGE EXISTS</span>
      <h2 class="ds-pated-intro__title">Dental information you can <span class="ds-italic">actually use</span>.</h2>
      <p class="ds-pated-intro__sub">Most dental writing online falls into two camps: thinly disguised marketing, or technical articles written for other dentists. Neither helps a patient trying to understand what&rsquo;s happening in their mouth. The articles below are written by &mdash; and reviewed by &mdash; Dr.&nbsp;Burns&rsquo;s office, in plain English, for the people we actually treat.</p>
    </div>
    <div class="ds-pated-intro__meta ds-reveal" role="list">
      <span class="ds-pated-intro__meta-item" role="listitem">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        <span>2&ndash;6 min reads</span>
      </span>
      <span class="ds-pated-intro__meta-item" role="listitem">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
        <span>Clinically reviewed</span>
      </span>
      <span class="ds-pated-intro__meta-item" role="listitem">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
        <span>No jargon</span>
      </span>
    </div>
  </div>
</section>

<?php foreach ( $groups as $gid => $g ) : ?>
<section class="ds-pated-group" id="<?php echo esc_attr( $gid ); ?>">
  <div class="ds-wrap">
    <div class="ds-pated-group__head ds-reveal">
      <span class="ds-label"><?php echo esc_html( $g['label'] ); ?></span>
      <h2 class="ds-pated-group__title"><?php echo esc_html( $g['title'] ); ?></h2>
      <?php if ( ! empty( $g['sub'] ) ) : ?>
        <p class="ds-pated-group__sub"><?php echo $g['sub']; ?></p>
      <?php endif; ?>
    </div>

    <div class="ds-pated-group__grid">
      <?php
      foreach ( $g['slugs'] as $i => $slug ) :
        $svc = $svc_all[ $slug ] ?? null;
        if ( ! $svc ) { continue; }
        $title    = $svc['sub_hero']['label']    ?? strtoupper( str_replace( '-', ' ', $slug ) );
        $preview  = $svc['intro']['sub']         ?? ( $svc['sub_hero']['subtitle'] ?? '' );
        $minutes  = ds_pated_read_minutes( $svc );
        $cat_key  = $svc['category']             ?? 'general';
        $cat_lbl  = $cat_labels[ $cat_key ]      ?? ucfirst( $cat_key );
      ?>
        <a href="<?php echo esc_url( '/' . $slug . '/' ); ?>"
           class="ds-pated-card ds-reveal"
           style="animation-delay: <?php echo ( $i * 50 ); ?>ms"
           data-ds-category="<?php echo esc_attr( $cat_key ); ?>">
          <div class="ds-pated-card__meta">
            <span class="ds-pated-card__cat"><?php echo esc_html( $cat_lbl ); ?></span>
            <span class="ds-pated-card__dot" aria-hidden="true"></span>
            <span class="ds-pated-card__time">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              <?php echo (int) $minutes; ?>&nbsp;min&nbsp;read
            </span>
          </div>
          <h3 class="ds-pated-card__title"><?php echo esc_html( ucwords( strtolower( $title ) ) ); ?></h3>
          <?php if ( $preview ) : ?>
            <p class="ds-pated-card__preview"><?php echo wp_strip_all_tags( $preview ); ?></p>
          <?php endif; ?>
          <span class="ds-pated-card__cta">
            Read article
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </span>
        </a>
      <?php endforeach; ?>

      <?php if ( ! empty( $g['guide'] ) ) : ?>
        <a href="<?php echo esc_url( $g['guide']['href'] ); ?>"
           class="ds-pated-card ds-pated-card--guide ds-reveal"
           style="animation-delay: <?php echo ( count( $g['slugs'] ) * 50 ); ?>ms">
          <div class="ds-pated-card__meta">
            <span class="ds-pated-card__cat ds-pated-card__cat--guide">TOPIC GUIDE</span>
          </div>
          <h3 class="ds-pated-card__title"><?php echo esc_html( $g['guide']['label'] ); ?></h3>
          <p class="ds-pated-card__preview">A short orientation page covering the whole topic &mdash; what it is, who needs it, and how Dr.&nbsp;Burns approaches it.</p>
          <span class="ds-pated-card__cta">
            Open topic guide
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </span>
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endforeach; ?>

<section class="ds-pated-ask">
  <div class="ds-wrap">
    <div class="ds-pated-ask__inner ds-reveal">
      <span class="ds-label">WANT A SPECIFIC TOPIC COVERED?</span>
      <h2 class="ds-pated-ask__title">Patient questions drive what we write next.</h2>
      <p class="ds-pated-ask__sub">If you&rsquo;re looking for something we haven&rsquo;t covered yet, tell us. Patient questions are what shape the next article &mdash; if you&rsquo;re wondering about it, other patients are too.</p>
      <div class="ds-pated-ask__ctas">
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--solid">Call <?php echo esc_html( $office['phone'] ); ?></a>
        <a href="/contact/" class="ds-btn ds-btn--outlined">Send a topic suggestion</a>
      </div>
    </div>
  </div>
</section>

<!-- /wp:html -->
