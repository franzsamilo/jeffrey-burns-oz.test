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
    'title'    => 'Dental Implants Across the <em>Shenandoah Valley</em> &mdash; Expert Results You Can Trust.',
    'subtitle' => 'One office in New Market, VA &mdash; serving patients from across the valley, led personally by Dr. Burns.',
    'cta1'     => [ 'label' => 'Take the Implant Quiz', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Free Consultation',     'href' => '/#quiz' ],
    'bg'       => $base . '/Harrison-Hero.jpg',
    'alt'      => 'Dr. Burns&rsquo;s dental implant office in New Market, VA',
  ],
  'contact' => [
    'label'    => 'CONTACT',
    'title'    => 'Visit <em>DreamSmile</em> in New Market, VA.',
    'subtitle' => '9626 South Congress St &middot; (540) 740-8937 &middot; Mon&ndash;Thu, 8 AM &ndash; 3 PM.',
    'cta1'     => [ 'label' => 'Schedule a Visit', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Call (540) 740-8937', 'href' => 'tel:+15407408937' ],
    'bg'       => $base . '/contact-hero.jpg',
    'alt'      => 'DreamSmile Dentistry &mdash; New Market, VA',
  ],
  'general-dentistry' => [
    'label'    => 'GENERAL DENTISTRY',
    'title'    => 'Comprehensive General Dentistry &mdash; <em>All Under One Roof</em>.',
    'subtitle' => 'Bridges, crowns, extractions, root canals, dentures, and more &mdash; from a nationally recognized doctor with 30+ years of experience.',
    'cta1'     => [ 'label' => 'Schedule a Visit', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Call (540) 740-8937', 'href' => 'tel:+15407408937' ],
    'bg'       => $base . '/general-dentistry-hero.jpg',
    'alt'      => 'General dentistry care at DreamSmile',
  ],
  'cosmetic-dentistry' => [
    'label'    => 'COSMETIC DENTISTRY',
    'title'    => 'Cosmetic Dentistry by an <em>AACD-Award-Winning Specialist</em>.',
    'subtitle' => 'Veneers, whitening, and clear braces designed around your face, your smile, and the result you actually want.',
    'cta1'     => [ 'label' => 'Schedule a Visit', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Call (540) 740-8937', 'href' => 'tel:+15407408937' ],
    'bg'       => $base . '/cosmetic-dentistry-hero.jpg',
    'alt'      => 'Cosmetic dentistry at DreamSmile',
  ],
  'meet-dr-burns' => [
    'label'    => 'MEET THE SPECIALIST',
    'title'    => 'Dr. Jeffrey S. Burns, <em>DDS</em>.',
    'subtitle' => 'Nationally recognized implant specialist. Creator of the Burns Protocol. AACD award recipient. Teaches dentists across the United States.',
    'cta1'     => [ 'label' => 'Schedule a Consultation', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Call (540) 740-8937', 'href' => 'tel:+15407408937' ],
    'bg'       => $base . '/surgical-photo-burns.png',
    'alt'      => 'Dr. Jeffrey S. Burns, DDS &mdash; in surgical loupes',
  ],
  'restorative-care' => [
    'label'    => 'RESTORATIVE CARE',
    'title'    => 'Restorative Dentistry &mdash; <em>All Under One Roof</em>.',
    'subtitle' => 'Fillings, crowns, bridges, root canals, extractions, and implants &mdash; every restorative option you might need, planned and performed by the same doctor.',
    'cta1'     => [ 'label' => 'Schedule a Consultation', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Call (540) 740-8937', 'href' => 'tel:+15407408937' ],
    'bg'       => $base . '/restorative-care-hero.jpg',
    'alt'      => 'Restorative dentistry at DreamSmile',
  ],
  'gum-disease' => [
    'label'    => 'GUM DISEASE TREATMENT',
    'title'    => 'Healthy Gums &mdash; <em>The Foundation of a Lasting Smile</em>.',
    'subtitle' => 'Gum disease is the leading cause of tooth loss in adults &mdash; and it&rsquo;s almost always reversible when caught in time. Deep cleaning + maintenance, planned for the long haul.',
    'cta1'     => [ 'label' => 'Schedule a Consultation', 'href' => '/#quiz' ],
    'cta2'     => [ 'label' => 'Call (540) 740-8937', 'href' => 'tel:+15407408937' ],
    'bg'       => $base . '/gum-disease-hero.jpg',
    'alt'      => 'Gum disease treatment',
  ],
  'resources' => [
    'label'    => 'RESOURCES',
    'title'    => 'Forms, Financing &amp; Patient Education &mdash; <em>All in One Place</em>.',
    'subtitle' => 'Helpful info before, during, and after your visit &mdash; new patient forms, financing options, and patient-friendly articles.',
    'cta1'     => [ 'label' => 'Call (540) 740-8937', 'href' => 'tel:+15407408937' ],
    'cta2'     => [ 'label' => 'Visit Contact Page', 'href' => '/contact/' ],
    'bg'       => $base . '/resources-hero.jpg',
    'alt'      => 'Patient resources at DreamSmile',
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

// Fallback: if not in $variants but registered in ds_service_pages(),
// build the variant from the service-pages config (single source of truth
// for all 25+ slug-driven service detail pages).
if ( ! isset( $variants[ $slug ] ) ) {
    $services = function_exists( 'ds_service_pages' ) ? ds_service_pages() : [];
    if ( isset( $services[ $slug ]['sub_hero'] ) ) {
        $sh = $services[ $slug ]['sub_hero'];
        $variants[ $slug ] = [
            'label'    => $sh['label']    ?? '',
            'title'    => $sh['title']    ?? '',
            'subtitle' => $sh['subtitle'] ?? '',
            'cta1'     => $sh['cta1']     ?? [ 'label' => 'Schedule Free Consult', 'href' => '#quiz' ],
            'cta2'     => $sh['cta2']     ?? [ 'label' => 'Call (540) 740-8937',   'href' => 'tel:+15407408937' ],
            'bg'       => $base . '/' . ( $sh['bg'] ?? 'hero-image.png' ),
            'alt'      => $sh['alt']      ?? 'DreamSmile by Dr. Jeffrey S. Burns',
        ];
    }
}

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
