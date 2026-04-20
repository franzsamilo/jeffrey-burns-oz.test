<?php
/**
 * Title: Page Sub-Hero
 * Slug: dreamsmile/page-sub-hero
 * Categories: dreamsmile
 *
 * Reuses the .ds-hero structure from the homepage so every page hero
 * looks visually consistent — dark gradient overlay, left-aligned
 * white Playfair headline, watermark, and consistent CTA row.
 */
defined( 'ABSPATH' ) || exit;

$slug = ( is_page() && ( $p = get_post() ) ) ? $p->post_name : '';
$base = get_stylesheet_directory_uri() . '/assets/arrange';

$variants = [
  'dental-implants' => [
    'label'    => 'DENTAL IMPLANTS',
    'title'    => 'Dental Implants That Look, Feel &amp; Function Like <em>Natural Teeth</em>.',
    'subtitle' => 'A permanent solution for missing or damaged teeth &mdash; placed personally by Dr. Burns.',
    'cta1'     => [ 'label' => 'Take the Implant Quiz', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Free Consultation',     'href' => '/#quiz' ],
    'bg'       => $base . '/dental-implants-hero.jpg',
    'alt'      => 'Dr. Burns reviewing a dental implant case',
  ],
  'locations' => [
    'label'    => 'LOCATIONS',
    'title'    => 'Dental Implants Near <em>Harrisonburg, VA</em> &mdash; Expert Results You Can Trust.',
    'subtitle' => 'Eight convenient locations, one team of specialists &mdash; led by Dr. Burns himself.',
    'cta1'     => [ 'label' => 'Take the Implant Quiz', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Free Consultation',     'href' => '/#quiz' ],
    'bg'       => $base . '/Harrison-Hero.jpg',
    'alt'      => 'The Harrisonburg, VA office',
  ],
  'new-patients' => [
    'label'    => 'NEW PATIENTS',
    'title'    => 'Welcome to <em>DreamSmile</em>. We&rsquo;ve Been Expecting You.',
    'subtitle' => 'Your first visit, your forms, your free consultation &mdash; everything you need to get started.',
    'cta1'     => [ 'label' => 'Schedule Your Visit', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Call (540) 740-8937', 'href' => 'tel:+15407408937' ],
    'bg'       => $base . '/new-patients-hero.jpg',
    'alt'      => 'Dr. Burns greeting a new patient',
  ],
];

$variant = isset( $variants[ $slug ] ) ? $slug : 'dental-implants';
$v       = $variants[ $variant ];
?>
<!-- wp:html -->
<section class="ds-hero ds-hero--sub" id="hero">
  <div class="ds-hero__bg" role="img" aria-label="<?php echo esc_attr( $v['alt'] ); ?>"
       style="background-image: linear-gradient(135deg, rgba(58,58,58,0.92) 0%, rgba(58,58,58,0.7) 50%, rgba(58,58,58,0.5) 100%), url('<?php echo esc_url( $v['bg'] ); ?>'); background-size: cover; background-position: center;">
  </div>

  <div class="ds-hero__inner">
    <div class="ds-hero__content ds-reveal">
      <span class="ds-hero__label"><?php echo esc_html( $v['label'] ); ?></span>
      <h1 class="ds-hero__title"><?php echo $v['title']; ?></h1>
      <p class="ds-hero__sub"><?php echo $v['subtitle']; ?></p>
      <div class="ds-hero__ctas">
        <a href="<?php echo esc_url( $v['cta1']['href'] ); ?>" class="ds-btn ds-btn--solid"><?php echo esc_html( $v['cta1']['label'] ); ?></a>
        <a href="<?php echo esc_url( $v['cta2']['href'] ); ?>" class="ds-btn ds-btn--outlined-white"><?php echo esc_html( $v['cta2']['label'] ); ?></a>
      </div>
    </div>
  </div>

  <div class="ds-hero__watermark" aria-hidden="true">DreamSmile</div>
</section>
<!-- /wp:html -->
