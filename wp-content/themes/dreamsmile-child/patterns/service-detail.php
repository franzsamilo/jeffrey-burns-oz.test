<?php
/**
 * Title: Service Detail (universal)
 * Slug: dreamsmile/service-detail
 * Categories: dreamsmile
 *
 * Universal renderer for all single-service pages. Reads the current
 * page slug, looks it up in ds_service_pages(), and renders a
 * consistent layout reusing the established theme components:
 *   - .ds-np-welcome + .ds-np-pillar  (intro + 3 pillars)
 *   - .ds-np-steps + .ds-np-step      (numbered "how it works")
 *   - .ds-implants-nav-card           (why-Dr.-Burns differentiators)
 *   - .ds-subpage-cta                 (dark final CTA)
 *
 * Renders nothing if the current slug is not a registered service page,
 * so this pattern is safe to include from page.html (the universal
 * fallback template).
 */
defined( 'ABSPATH' ) || exit;

$slug   = '';
if ( is_page() && ( $p = get_post() ) ) { $slug = $p->post_name; }
$svc = ds_service_pages()[ $slug ] ?? null;
if ( ! $svc ) { return; }

$office = ds_office_data();

// Centralised SVG icon library used across all service pages.
$ICONS = [
  'doctor'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="7" r="4"/><path d="M5 21c0-3.5 3-6 7-6s7 2.5 7 6"/><path d="M9 14v2l3 1.5L15 16v-2"/></svg>',
  'cpu'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 14h3M1 9h3M1 14h3"/></svg>',
  'safety'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
  'phone'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.1 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.72 2z"/></svg>',
  'house'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-7 9 7v9a2 2 0 0 1-2 2h-4v-7H10v7H6a2 2 0 0 1-2-2v-9z"/></svg>',
  'tooth'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/></svg>',
  'crown'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18h18M3 18l2-9 4 4 3-6 3 6 4-4 2 9"/></svg>',
  'bridge'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 14h18M5 14v6M19 14v6M9 14v-2a3 3 0 0 1 6 0v2"/><path d="M9 14v-2a3 3 0 0 0-3-3H5v5"/><path d="M15 14v-2a3 3 0 0 1 3-3h1v5"/></svg>',
  'denture' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9c0-2 2-4 4-4h8c2 0 4 2 4 4v3c0 4-3 8-8 8s-8-4-8-8V9z"/><path d="M8 11v2M12 11v2M16 11v2"/></svg>',
  'partial' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="9" width="4" height="6" rx="1"/><rect x="10" y="9" width="4" height="6" rx="1"/><rect x="16" y="9" width="4" height="6" rx="1"/><path d="M2 17h20"/></svg>',
  'extract' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/><path d="M16 6l4 4M20 6l-4 4"/></svg>',
  'canal'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/><path d="M12 8v8"/></svg>',
  'wisdom'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.5 0 4.5 1 6 2 1.5 1 2 3 1.5 5l-1 5c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3.5c-.2-1.5-1.5-1.5-1.7 0L9.5 19c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 17.5 3.8 16 3.5 14.5l-1-5c-.5-2 0-4 1.5-5 1.5-1 3.5-2 6-2z"/><circle cx="12" cy="11" r="2.5"/></svg>',
  'kid'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="9" r="4"/><path d="M5 21c0-3.5 3-6 7-6s7 2.5 7 6"/><circle cx="10" cy="8" r="0.5" fill="currentColor"/><circle cx="14" cy="8" r="0.5" fill="currentColor"/><path d="M10 11c0.5 0.5 1.2 1 2 1s1.5-0.5 2-1"/></svg>',
  'sparkle' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3z"/><path d="M19 16l.7 2.1L22 19l-2.3.9L19 22l-.7-2.1L16 19l2.3-.9L19 16z"/></svg>',
  'veneer'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 6c2.5-2 4.5-3 7-3s4.5 1 7 3c1 1 1.5 2.5 1 4l-1 6c-.3 1.5-.8 3-1.5 4.5-.5 1-1.5 1.5-2.5 1.5-1 0-1.5-.5-2-1.5l-.5-3c-.2-1.5-1.5-1.5-1.7 0L9.5 21c-.5 1-1 1.5-2 1.5-1 0-2-.5-2.5-1.5C4.3 19.5 3.8 18 3.5 16.5l-1-6c-.5-1.5 0-3 1-4z"/><path d="M9 9l3 3 3-3"/></svg>',
  'aligner' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8c0-2 1-4 4-4h8c3 0 4 2 4 4v4c0 4-3 8-8 8s-8-4-8-8V8z"/><rect x="7" y="9" width="2" height="4" rx="0.5"/><rect x="11" y="9" width="2" height="4" rx="0.5"/><rect x="15" y="9" width="2" height="4" rx="0.5"/></svg>',
  'bone'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 19a2.5 2.5 0 0 1-2.5-2.5 2.5 2.5 0 0 1 2-2.45L9 10l4.45-4.45A2.5 2.5 0 0 1 16 3a2.5 2.5 0 0 1 2.45 2 2.5 2.5 0 0 1 2 2.45A2.5 2.5 0 0 1 18.5 10l-4.5 4.5L9.55 19A2.5 2.5 0 0 1 7 21a2.5 2.5 0 0 1-2-2z"/></svg>',
  'shield'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
  'sleep'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"/></svg>',
  'check'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>',
  'clock'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
  'gem'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3l6 18 6-18M3 9l9 12 9-12M3 9h18"/></svg>',
  'leaf'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10z"/><path d="M2 21c0-3 1.85-5.36 5.08-6"/></svg>',
  'wallet'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"/><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"/><path d="M18 12a2 2 0 0 0 0 4h4v-4Z"/></svg>',
  'book'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
  'magnet'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 14V6a6 6 0 0 1 12 0v8"/><path d="M6 14v3a6 6 0 0 0 12 0v-3"/><path d="M6 14h4M14 14h4"/></svg>',
];

$intro = $svc['intro']      ?? null;
$steps = $svc['steps']      ?? null;
$why   = $svc['why']        ?? null;
$refs  = $svc['references'] ?? null;
$cta   = $svc['cta']        ?? null;

// Per-category visual differentiation. Each category gets a distinct accent
// theme + a "context strip" that shows where this page lives in the IA.
$category    = $svc['category'] ?? 'general';
$category_meta = [
  'implants' => [ 'label' => 'DENTAL IMPLANTS',     'tagline' => 'precision implant dentistry', 'hub' => '/dental-implants/',  'hub_label' => 'All Implant Procedures' ],
  'general'  => [ 'label' => 'GENERAL DENTISTRY',   'tagline' => 'comprehensive everyday care',  'hub' => '/general-dentistry/', 'hub_label' => 'All General Dentistry' ],
  'cosmetic' => [ 'label' => 'COSMETIC DENTISTRY',  'tagline' => 'aesthetic smile design',       'hub' => '/cosmetic-dentistry/','hub_label' => 'All Cosmetic Dentistry' ],
  'restore'  => [ 'label' => 'RESTORATIVE CARE',    'tagline' => 'rebuilding tooth structure',   'hub' => '/restorative-care/',  'hub_label' => 'All Restorative Care' ],
  'prevent'  => [ 'label' => 'PREVENTATIVE CARE',   'tagline' => 'gentle ongoing oral health',   'hub' => '/new-patients/',      'hub_label' => 'New Patient Info' ],
  'resource' => [ 'label' => 'PATIENT RESOURCES',   'tagline' => 'forms, financing & education', 'hub' => '/resources/',         'hub_label' => 'All Resources' ],
];
$cm = $category_meta[ $category ] ?? $category_meta['general'];

// Article mode: patient-ed slugs (8) get a blog-style breadcrumb back to
// /patient-education/, a read-time meta strip, and a related-articles
// footer instead of the standard service-category aside.
$is_article  = function_exists( 'ds_pated_is_article' ) && ds_pated_is_article( $slug );
$read_min    = ( $is_article && function_exists( 'ds_pated_read_minutes' ) ) ? ds_pated_read_minutes( $svc ) : 0;
$article_title = $svc['sub_hero']['label'] ?? '';
?>
<!-- wp:html -->
<div class="ds-service ds-service--<?php echo esc_attr( $category ); ?><?php echo $is_article ? ' ds-service--article' : ''; ?>" data-ds-category="<?php echo esc_attr( $category ); ?>">

<?php if ( $is_article ) :
  $article_lede = $svc['intro']['sub'] ?? ( $svc['sub_hero']['subtitle'] ?? '' );
?>
<header class="ds-article-hero" aria-label="Article header">
  <div class="ds-wrap">
    <nav class="ds-article-hero__crumbs ds-reveal" aria-label="Breadcrumb">
      <a href="/patient-education/" class="ds-article-hero__crumb">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
        <span>Patient Education</span>
      </a>
    </nav>
    <span class="ds-label ds-article-hero__cat ds-reveal"><?php echo esc_html( $cm['label'] ); ?></span>
    <h1 class="ds-article-hero__title ds-reveal"><?php echo esc_html( ucwords( strtolower( $article_title ) ) ); ?></h1>
    <?php if ( $article_lede ) : ?>
      <p class="ds-article-hero__lede ds-reveal"><?php echo wp_strip_all_tags( $article_lede ); ?></p>
    <?php endif; ?>
    <div class="ds-article-hero__meta ds-reveal">
      <span class="ds-article-hero__byline">By Dr.&nbsp;Burns&rsquo;s office</span>
      <span class="ds-article-hero__dot" aria-hidden="true">·</span>
      <span class="ds-article-hero__time">
        <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        <?php echo (int) $read_min; ?>&nbsp;min&nbsp;read
      </span>
      <span class="ds-article-hero__dot" aria-hidden="true">·</span>
      <span class="ds-article-hero__reviewed">Plain&#8209;English, clinically reviewed</span>
    </div>
  </div>
</header>

<?php if ( ! empty( $svc['sub_hero']['bg'] ) ) :
    $fig_src = get_stylesheet_directory_uri() . '/assets/arrange/' . $svc['sub_hero']['bg'];
    $fig_alt = $svc['sub_hero']['alt'] ?? '';
?>
<figure class="ds-article-figure ds-reveal">
  <img src="<?php echo esc_url( $fig_src ); ?>" alt="<?php echo esc_attr( $fig_alt ); ?>" loading="lazy" />
</figure>
<?php endif; ?>
<?php else : ?>
<aside class="ds-service__context ds-reveal" aria-label="Service category">
  <div class="ds-wrap">
    <a href="<?php echo esc_url( $cm['hub'] ); ?>" class="ds-service__context-link">
      <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
      <span><?php echo esc_html( $cm['hub_label'] ); ?></span>
    </a>
    <span class="ds-service__context-meta">
      <span class="ds-service__context-label"><?php echo esc_html( $cm['label'] ); ?></span>
      <span class="ds-service__context-tag"><?php echo esc_html( $cm['tagline'] ); ?></span>
    </span>
  </div>
</aside>
<?php endif; ?>

<?php if ( $intro && ! $is_article ) : ?>
<section class="ds-np-welcome">
  <div class="ds-wrap">
    <div class="ds-np-welcome__head ds-reveal">
      <?php if ( ! empty( $intro['label'] ) ) : ?><span class="ds-label"><?php echo esc_html( $intro['label'] ); ?></span><?php endif; ?>
      <h2 class="ds-np-welcome__title"><?php echo $intro['title']; ?></h2>
      <?php if ( ! empty( $intro['sub'] ) ) : ?><p class="ds-np-welcome__sub"><?php echo $intro['sub']; ?></p><?php endif; ?>
    </div>
    <?php if ( ! empty( $intro['pillars'] ) ) : ?>
      <div class="ds-np-welcome__pillars ds-reveal">
        <?php foreach ( $intro['pillars'] as $p ) : ?>
          <div class="ds-np-pillar">
            <strong><?php echo $p['strong']; ?></strong>
            <span><?php echo $p['span']; ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<?php if ( $steps && ! empty( $steps['list'] ) ) : ?>
<section class="ds-np-steps">
  <div class="ds-wrap">
    <div class="ds-np-steps__head ds-reveal">
      <?php if ( ! empty( $steps['label'] ) ) : ?><span class="ds-label"><?php echo esc_html( $steps['label'] ); ?></span><?php endif; ?>
      <h2 class="ds-np-steps__title"><?php echo $steps['title'] ?? 'How it works'; ?></h2>
      <?php if ( ! empty( $steps['sub'] ) ) : ?><p class="ds-np-steps__sub"><?php echo $steps['sub']; ?></p><?php endif; ?>
    </div>
    <ol class="ds-np-steps__list">
      <?php foreach ( $steps['list'] as $s ) : ?>
        <li class="ds-np-step ds-reveal">
          <span class="ds-np-step__num" aria-hidden="true"><?php echo esc_html( $s['num'] ); ?></span>
          <div class="ds-np-step__body">
            <h3><?php echo $s['title']; ?></h3>
            <p><?php echo $s['desc']; ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>
<?php endif; ?>

<?php if ( $why && ! empty( $why['cards'] ) && ! $is_article ) :
    $count = count( $why['cards'] );
    $grid_mod = ( $count === 4 ) ? ' ds-implants-nav--quad' : ( ( $count >= 5 ) ? ' ds-implants-nav--wide' : '' );
?>
<section class="ds-implants-nav<?php echo $grid_mod; ?>">
  <div class="ds-wrap">
    <div class="ds-implants-nav__head ds-reveal">
      <?php if ( ! empty( $why['label'] ) ) : ?><span class="ds-label"><?php echo esc_html( $why['label'] ); ?></span><?php endif; ?>
      <h2 class="ds-implants-nav__title"><?php echo $why['title'] ?? 'Why Dr. Burns'; ?></h2>
      <?php if ( ! empty( $why['sub'] ) ) : ?><p class="ds-implants-nav__sub"><?php echo $why['sub']; ?></p><?php endif; ?>
    </div>
    <div class="ds-implants-nav__grid">
      <?php foreach ( $why['cards'] as $c ) :
          $icon = $ICONS[ $c['icon'] ?? 'tooth' ] ?? $ICONS['tooth'];
      ?>
        <article class="ds-implants-nav-card ds-reveal" style="cursor:default;">
          <span class="ds-implants-nav-card__icon"><?php echo $icon; ?></span>
          <h3 class="ds-implants-nav-card__title"><?php echo $c['title']; ?></h3>
          <p class="ds-implants-nav-card__desc"><?php echo $c['desc']; ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( $refs && ! empty( $refs['sources'] ) ) : ?>
<section class="ds-np-refs">
  <div class="ds-wrap">
    <div class="ds-np-refs__head ds-reveal">
      <?php if ( ! empty( $refs['label'] ) ) : ?><span class="ds-label"><?php echo esc_html( $refs['label'] ); ?></span><?php endif; ?>
      <?php if ( ! empty( $refs['title'] ) ) : ?><h2 class="ds-np-refs__title"><?php echo $refs['title']; ?></h2><?php endif; ?>
      <?php if ( ! empty( $refs['sub'] ) ) : ?><p class="ds-np-refs__sub"><?php echo $refs['sub']; ?></p><?php endif; ?>
    </div>
    <ul class="ds-np-refs__list ds-reveal">
      <?php foreach ( $refs['sources'] as $src ) : ?>
        <li class="ds-np-refs__item">
          <a href="<?php echo esc_url( $src['url'] ); ?>" target="_blank" rel="nofollow noopener noreferrer">
            <span class="ds-np-refs__src-title"><?php echo $src['title']; ?></span>
            <?php if ( ! empty( $src['org'] ) ) : ?><span class="ds-np-refs__src-org"><?php echo esc_html( $src['org'] ); ?></span><?php endif; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <p class="ds-np-refs__disclaimer">External sources are provided for further reading. They are not endorsements of Dr.&nbsp;Burns&rsquo;s practice and do not replace a personal consultation.</p>
  </div>
</section>
<?php endif; ?>

<?php
// Related articles (article mode only). Shows up to 3 sibling articles
// from the same patient-ed group, falls back to other articles when the
// group is sparse (e.g., dental-fillings has no other "restorative" siblings).
if ( $is_article && function_exists( 'ds_pated_group_for_slug' ) ) :
    $svc_all_local = function_exists( 'ds_service_pages' ) ? ds_service_pages() : [];
    $current_group = ds_pated_group_for_slug( $slug );
    $siblings      = [];
    if ( $current_group ) {
        $g = ds_pated_groups();
        foreach ( $g[ $current_group ] as $s ) {
            if ( $s !== $slug ) { $siblings[] = $s; }
        }
    }
    // Top up from other article slugs if we have fewer than 3 siblings
    if ( count( $siblings ) < 3 ) {
        foreach ( ds_pated_article_slugs() as $s ) {
            if ( $s === $slug || in_array( $s, $siblings, true ) ) { continue; }
            $siblings[] = $s;
            if ( count( $siblings ) >= 3 ) { break; }
        }
    }
    $siblings = array_slice( $siblings, 0, 3 );
?>
<section class="ds-article-related">
  <div class="ds-wrap">
    <div class="ds-article-related__head ds-reveal">
      <span class="ds-label">KEEP READING</span>
      <h2 class="ds-article-related__title">More patient-education articles.</h2>
    </div>
    <div class="ds-article-related__grid">
      <?php foreach ( $siblings as $i => $rs ) :
        $rsvc = $svc_all_local[ $rs ] ?? null;
        if ( ! $rsvc ) { continue; }
        $rtitle = $rsvc['sub_hero']['label'] ?? strtoupper( str_replace( '-', ' ', $rs ) );
        $rprev  = $rsvc['intro']['sub']      ?? ( $rsvc['sub_hero']['subtitle'] ?? '' );
        $rmin   = ds_pated_read_minutes( $rsvc );
      ?>
        <a href="<?php echo esc_url( '/' . $rs . '/' ); ?>"
           class="ds-pated-card ds-reveal"
           style="animation-delay: <?php echo ( $i * 50 ); ?>ms">
          <div class="ds-pated-card__meta">
            <span class="ds-pated-card__cat"><?php echo esc_html( $cm['label'] ); ?></span>
            <span class="ds-pated-card__dot" aria-hidden="true"></span>
            <span class="ds-pated-card__time">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              <?php echo (int) $rmin; ?>&nbsp;min&nbsp;read
            </span>
          </div>
          <h3 class="ds-pated-card__title"><?php echo esc_html( ucwords( strtolower( $rtitle ) ) ); ?></h3>
          <?php if ( $rprev ) : ?>
            <p class="ds-pated-card__preview"><?php echo wp_strip_all_tags( $rprev ); ?></p>
          <?php endif; ?>
          <span class="ds-pated-card__cta">
            Read article
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
    <div class="ds-article-related__index ds-reveal">
      <a href="/patient-education/" class="ds-btn ds-btn--outlined">Browse all patient-education articles</a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( $cta ) : ?>
<section class="ds-subpage-cta">
  <div class="ds-wrap">
    <div class="ds-subpage-cta__inner ds-reveal">
      <?php if ( ! empty( $cta['label'] ) ) : ?><span class="ds-label"><?php echo esc_html( $cta['label'] ); ?></span><?php endif; ?>
      <h2 class="ds-subpage-cta__title"><?php echo $cta['title'] ?? 'Schedule your free consultation.'; ?></h2>
      <?php if ( ! empty( $cta['sub'] ) ) : ?><p class="ds-subpage-cta__sub"><?php echo $cta['sub']; ?></p><?php endif; ?>
      <div class="ds-subpage-cta__ctas">
        <a href="#quiz" data-ds-schedule class="ds-btn ds-btn--solid">Schedule a Free Consult</a>
        <a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>" class="ds-btn ds-btn--outlined">Call <?php echo esc_html( $office['phone'] ); ?></a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

</div><!-- /.ds-service -->
<!-- /wp:html -->
