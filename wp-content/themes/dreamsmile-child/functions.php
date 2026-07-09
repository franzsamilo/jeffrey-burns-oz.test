<?php
/**
 * DreamSmile Child Theme — functions
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// Inline explanatory SVG diagrams (ds_diagram_svg) used by service-detail.php.
require_once trailingslashit( get_stylesheet_directory() ) . 'inc/diagrams.php';

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'twentytwentyfive-style', get_template_directory_uri() . '/style.css', [], wp_get_theme( 'twentytwentyfive' )->get( 'Version' ) );
    wp_enqueue_style( 'dreamsmile-style', get_stylesheet_uri(), [ 'twentytwentyfive-style' ], wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dreamsmile-sections', get_stylesheet_directory_uri() . '/assets/css/sections.css', [ 'dreamsmile-style' ], wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dreamsmile-pages', get_stylesheet_directory_uri() . '/assets/css/pages.css', [ 'dreamsmile-sections' ], wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dreamsmile-fonts', 'https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Dancing+Script:wght@400;700&family=Montserrat:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,700&display=swap', [], null );
}, 20 );

add_action( 'wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get( 'Version' );
    foreach ( [ 'navbar', 'animations', 'quiz', 'before-after', 'schedule-modal', 'faq-cats', 'testimonials' ] as $h ) {
        wp_enqueue_script( 'dreamsmile-' . $h, get_stylesheet_directory_uri() . '/assets/js/' . $h . '.js', [], $ver, true );
    }
} );

add_action( 'init', function () {
    register_block_pattern_category( 'dreamsmile', [ 'label' => __( 'DreamSmile', 'dreamsmile-child' ) ] );
} );

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', [ 'search-form', 'gallery', 'caption', 'style', 'script' ] );
} );

/**
 * Keep the WP admin bar off the public-facing pages so the fixed
 * .ds-navbar sits flush at the top of the viewport (the bar's 46px
 * mobile height was creating a gap above the nav in the Playground
 * preview, which auto-logs the viewer in).
 */
add_filter( 'show_admin_bar', '__return_false' );

/** ────────────────────────────────────────────────────────────────────────
 *  ONE-SHOT PAGE SEEDER — mirrors preview/blueprint.json runPHP.
 *  When the OPFS Playground site receives an updated theme zip, this
 *  ensures the 30+ new WP pages from the 2026-05-07 IA expansion exist
 *  without re-installing from the blueprint. Idempotent (uses
 *  get_page_by_path() to skip existing pages), gated by a versioned
 *  option so it only runs once per release.
 *  ──────────────────────────────────────────────────────────────────────── */

add_action( 'init', function () {
    $version = 'ds_pages_seeded_2026_05_10';
    if ( get_option( $version ) ) { return; }
    if ( ! function_exists( 'wp_insert_post' ) ) { return; }

    $pages = [
        'Home', 'Dental Implants', 'Locations', 'New Patients', 'Contact',
        'General Dentistry', 'Cosmetic Dentistry', 'Meet Dr. Burns',
        'Restorative Care', 'Gum Disease Treatment', 'Resources',
        'Implant Cost & Financing', 'Implant Procedures Overview', 'Implant FAQs',
        'Single Dental Implants', 'Implant Supported Bridges', 'How Dental Implants Work',
        'Full Mouth Dental Implants', 'Implant Supported Dentures',
        'Dental Bridges', 'Tooth Extraction', 'Bone Grafting', 'Full Dentures',
        'Partial Dentures', 'Pediatric Dentistry', 'Dental Crowns', 'Root Canal',
        'Wisdom Teeth Removal',
        'Porcelain Veneers', 'Teeth Whitening', 'Clear Braces',
        'Anesthesia & Sedation', 'Dental Exams', 'Oral Hygiene', 'Teeth Cleaning',
        'Dental Sealants', 'Deep Teeth Cleaning', 'Periodontal Maintenance',
        'Dental Fillings', 'Financing & Insurance', 'Patient Education',
        'Harrisonburg', 'Winchester', 'Broadway', 'Bridgewater',
        'Luray', 'Woodstock', 'Elkton', 'Timberville',
    ];

    $slug_overrides = [
        'Implant Cost & Financing'    => 'implant-cost',
        'Implant Procedures Overview' => 'implant-procedures',
        'Implant FAQs'                => 'implant-faqs',
        'Meet Dr. Burns'              => 'meet-dr-burns',
        'Anesthesia & Sedation'       => 'anesthesia',
        'Financing & Insurance'       => 'financing',
        'Gum Disease Treatment'       => 'gum-disease',
    ];

    $content_overrides = [
        'implant-cost'         => '<!-- wp:pattern {"slug":"dreamsmile/implant-cost"} /-->',
        'implant-procedures'   => '<!-- wp:pattern {"slug":"dreamsmile/implant-procedures"} /-->',
        'implant-faqs'         => '<!-- wp:pattern {"slug":"dreamsmile/implant-faqs"} /-->',
        'harrisonburg'         => '<!-- wp:pattern {"slug":"dreamsmile/single-location"} /-->',
        'winchester'           => '<!-- wp:pattern {"slug":"dreamsmile/single-location"} /-->',
        'broadway'             => '<!-- wp:pattern {"slug":"dreamsmile/single-location"} /-->',
        'bridgewater'          => '<!-- wp:pattern {"slug":"dreamsmile/single-location"} /-->',
        'luray'                => '<!-- wp:pattern {"slug":"dreamsmile/single-location"} /-->',
        'woodstock'            => '<!-- wp:pattern {"slug":"dreamsmile/single-location"} /-->',
        'elkton'               => '<!-- wp:pattern {"slug":"dreamsmile/single-location"} /-->',
        'timberville'          => '<!-- wp:pattern {"slug":"dreamsmile/single-location"} /-->',
    ];

    $home_id = 0;
    foreach ( $pages as $title ) {
        $slug = $slug_overrides[ $title ] ?? sanitize_title( $title );
        $existing = get_page_by_path( $slug );
        if ( $existing ) {
            $id = $existing->ID;
            // Refresh content for pages that need a specific pattern;
            // leave service-detail pages (which intentionally have empty
            // content) alone so a re-seed doesn't clobber any wp-admin edits.
            if ( isset( $content_overrides[ $slug ] ) && trim( $existing->post_content ) === '' ) {
                wp_update_post( [ 'ID' => $id, 'post_content' => $content_overrides[ $slug ] ] );
            }
        } else {
            $id = wp_insert_post( [
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_type'    => 'page',
                'post_status'  => 'publish',
                'post_content' => $content_overrides[ $slug ] ?? '',
            ] );
        }
        if ( 'Home' === $title && $id ) { $home_id = $id; }
    }

    if ( $home_id && ! get_option( 'page_on_front' ) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home_id );
    }

    update_option( $version, time() );
    flush_rewrite_rules();
}, 5 );

/** ────────────────────────────────────────────────────────────────────────
 *  SEO INFRASTRUCTURE — per-page meta + JSON-LD, single-Dentist schema with
 *  areaServed for the 8 SEO communities. Location subpages do NOT declare
 *  their own LocalBusiness entities (that would read as multiple practices).
 *  ──────────────────────────────────────────────────────────────────────── */

function ds_current_slug() {
    if ( is_front_page() || is_home() ) { return 'home'; }
    if ( is_page() ) {
        $p = get_post();
        if ( $p && ! empty( $p->post_name ) ) { return $p->post_name; }
    }
    return '';
}

function ds_seo_data( $slug = null ) {
    if ( null === $slug ) { $slug = ds_current_slug(); }
    $office = ds_office_data();
    $brand  = 'Dr. Jeffrey S. Burns, DDS';
    $base   = get_stylesheet_directory_uri() . '/assets/arrange';

    $cities = [
        'harrisonburg' => [ 'name' => 'Harrisonburg', 'prefix' => 'Near', 'preview' => 'Harrisonburg dental implant patients trust Dr. Burns. A short drive north on I-81 to our New Market, VA office &mdash; 30+ years of experience, the Burns Protocol, and a free consultation.', 'image' => 'Harrison-Hero.jpg' ],
        'winchester'   => [ 'name' => 'Winchester',   'prefix' => 'Near', 'preview' => 'Dental implant patients from Winchester, VA trust Dr. Burns for the Burns Protocol. A scenic drive south on I-81 to our New Market office &mdash; free consultation.', 'image' => 'Winchester-8locations.jpg' ],
        'broadway'     => [ 'name' => 'Broadway',     'prefix' => 'Near', 'preview' => 'Dental implant patients from Broadway and the central Shenandoah Valley &mdash; a quick drive up Rt. 11 to Dr. Burns&rsquo;s New Market office. Free consultation.', 'image' => 'Broadway-8locations.jpg' ],
        'bridgewater'  => [ 'name' => 'Bridgewater',  'prefix' => 'Near', 'preview' => 'Bridgewater, VA dental implant patients &mdash; Dr. Burns&rsquo;s practice is a short drive north on I-81 in New Market. 30+ years of experience, free consultation.', 'image' => 'Bridgewater-8locations.jpg' ],
        'luray'        => [ 'name' => 'Luray',        'prefix' => 'Near', 'preview' => 'Page County dental implant patients trust Dr. Burns. A short drive across the valley to our New Market, VA practice. Free consultation.', 'image' => 'Luray-8locations.jpg' ],
        'woodstock'    => [ 'name' => 'Woodstock',    'prefix' => 'Near', 'preview' => 'Shenandoah County dental implant patients &mdash; Dr. Burns&rsquo;s practice is a quick drive south on I-81 from Woodstock to New Market. Free consultation.', 'image' => 'Woodstock-8locations.jpg' ],
        'elkton'       => [ 'name' => 'Elkton',       'prefix' => 'Near', 'preview' => 'Elkton and east Rockingham County dental implant patients &mdash; Dr. Burns&rsquo;s practice is a short trip up I-81 in New Market, VA.', 'image' => 'Elkton-8locations.jpg' ],
        'timberville'  => [ 'name' => 'Timberville',  'prefix' => 'Near', 'preview' => 'Timberville and orchard-country dental implant patients &mdash; quick drive east to Dr. Burns&rsquo;s New Market, VA practice. Free consultation.', 'image' => 'Timberville-8locations.jpg' ],
    ];

    if ( isset( $cities[ $slug ] ) ) {
        $c = $cities[ $slug ];
        return [
            'title'       => 'Dental Implants ' . $c['prefix'] . ' ' . $c['name'] . ', VA | ' . $brand,
            'description' => wp_strip_all_tags( $c['preview'] ),
            'og_image'    => $base . '/' . $c['image'],
            'og_type'     => 'website',
            'robots'      => 'index, follow',
            'page_type'   => 'location',
            'page_city'   => $c['name'],
        ];
    }

    $map = [
        'home' => [
            'title' => 'DreamSmile Dental Implants in New Market, VA | ' . $brand,
            'description' => 'Permanent dental implant solutions from a nationally recognized specialist with 30+ years of experience. Serving the Shenandoah Valley from our New Market, VA office. Schedule your free consultation with Dr. Jeffrey S. Burns, DDS.',
            'og_image' => $base . '/home-hero.jpg', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'home',
        ],
        'dental-implants' => [
            'title' => 'Dental Implants in New Market, VA &mdash; The Burns Protocol | ' . $brand,
            'description' => 'Permanent, natural-looking dental implants placed personally by Dr. Burns. Single, multi-tooth, and full-arch implants &mdash; all under one roof in New Market, VA.',
            'og_image' => $base . '/dental-implants-hero.jpg', 'og_type' => 'article', 'robots' => 'index, follow', 'page_type' => 'service',
        ],
        'implant-cost' => [
            'title' => 'Dental Implant Cost & Financing | ' . $brand . ' New Market, VA',
            'description' => 'Transparent, all-inclusive dental implant pricing in New Market, VA. No hidden fees. Flexible financing for single, multi-tooth, and full-arch implants.',
            'og_image' => $base . '/dental-implants-hero.jpg', 'og_type' => 'article', 'robots' => 'index, follow', 'page_type' => 'service',
        ],
        'implant-procedures' => [
            'title' => 'Dental Implant Procedures Explained | ' . $brand,
            'description' => 'Walk through every step of the dental implant process &mdash; consultation, placement, restoration. The Burns Protocol: a nationally recognized 6-step system.',
            'og_image' => $base . '/dental-implants-hero.jpg', 'og_type' => 'article', 'robots' => 'index, follow', 'page_type' => 'service',
        ],
        'implant-faqs' => [
            'title' => 'Dental Implant FAQs | ' . $brand . ' New Market, VA',
            'description' => 'Answers to the most common dental implant questions &mdash; pain, recovery, longevity, cost, candidacy. Direct from Dr. Burns and his 30+ years of experience.',
            'og_image' => $base . '/new-patients-hero.jpg', 'og_type' => 'article', 'robots' => 'index, follow', 'page_type' => 'faq',
        ],
        'locations' => [
            'title' => 'Dental Implants Across the Shenandoah Valley &mdash; Communities We Serve | ' . $brand,
            'description' => 'Dr. Burns&rsquo;s dental implant practice serves patients across the Shenandoah Valley from his New Market, VA office. See the communities we serve.',
            'og_image' => $base . '/Harrison-Hero.jpg', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'locations-index',
        ],
        'new-patients' => [
            'title' => 'New Patients | DreamSmile Dental Implants &mdash; ' . $brand,
            'description' => 'Welcome to DreamSmile. Get started with your free consultation, new patient forms, and what to expect on your first visit with Dr. Burns in New Market, VA.',
            'og_image' => $base . '/new-patients-hero.jpg', 'og_type' => 'article', 'robots' => 'index, follow', 'page_type' => 'page',
        ],
        'contact' => [
            'title' => 'Contact &mdash; DreamSmile by Dr. Jeffrey S. Burns, DDS &middot; New Market, VA',
            'description' => 'Visit Dr. Burns at 9626 South Congress St, New Market, VA. Call (540) 740-8937 or schedule your free consultation. Office hours Mon&ndash;Thu, 8&nbsp;AM&nbsp;&ndash;&nbsp;3&nbsp;PM.',
            'og_image' => $base . '/hero-image.png', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'contact',
        ],
        'general-dentistry' => [
            'title' => 'General Dentistry in New Market, VA | ' . $brand,
            'description' => 'Comprehensive general dentistry from Dr. Jeffrey S. Burns, DDS &mdash; serving New Market, Harrisonburg, and the Shenandoah Valley. Bridges, crowns, extractions, root canals, and more, all in one office.',
            'og_image' => $base . '/service-general.jpg', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'service',
        ],
        'cosmetic-dentistry' => [
            'title' => 'Cosmetic Dentistry in New Market, VA | ' . $brand,
            'description' => 'Cosmetic dentistry by a nationally recognized AACD-award-winning specialist &mdash; veneers, whitening, and clear braces designed to give you the smile you actually want.',
            'og_image' => $base . '/service-cosmetic.jpg', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'service',
        ],
        'meet-dr-burns' => [
            'title' => 'Meet Dr. Jeffrey S. Burns, DDS &mdash; Nationally Recognized Implant Specialist',
            'description' => '30+ years placing dental implants. AACD award recipient. Creator of the Burns Protocol. Teaches dentists nationwide. Gives every implant patient his personal cell number. Meet the specialist behind DreamSmile.',
            'og_image' => $base . '/casual-photo-burns.png', 'og_type' => 'profile', 'robots' => 'index, follow', 'page_type' => 'about',
        ],
        'restorative-care' => [
            'title' => 'Restorative Care in New Market, VA | ' . $brand,
            'description' => 'Fillings, crowns, bridges, root canals, extractions, and implants &mdash; every restorative option you might need, planned and performed by the same doctor.',
            'og_image' => $base . '/restorative-care-hero.jpg', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'service',
        ],
        'gum-disease' => [
            'title' => 'Gum Disease Treatment in New Market, VA | ' . $brand,
            'description' => 'Catch gum disease early and stay ahead of it. Deep teeth cleaning and periodontal maintenance from Dr. Burns&rsquo;s New Market, VA practice.',
            'og_image' => $base . '/gum-disease-hero.jpg', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'service',
        ],
        'resources' => [
            'title' => 'Patient Resources | ' . $brand,
            'description' => 'Forms, financing, and patient-education articles &mdash; everything you need before, during, and after your visit.',
            'og_image' => $base . '/resources-hero.jpg', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'page',
        ],
        'patient-education' => [
            'title' => 'Patient Education | ' . $brand . ' &middot; New Market, VA',
            'description' => 'Plain-English articles on dental procedures, recovery, and what to expect &mdash; reviewed by Dr. Burns&rsquo;s office.',
            'og_image' => $base . '/resources-hero.jpg', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'page',
        ],
    ];

    if ( isset( $map[ $slug ] ) ) { return $map[ $slug ]; }

    // Fallback: service-detail pages (5 implant deep-dives, GD/Cosmetic
    // children, preventative-care subpages, financing, etc.) — single
    // source of truth in inc/service-pages.php.
    $services = ds_service_pages();
    if ( isset( $services[ $slug ] ) ) {
        $svc = $services[ $slug ];
        return [
            'title'       => $svc['seo']['title']       ?? ( $svc['sub_hero']['label'] . ' | ' . $brand ),
            'description' => $svc['seo']['description'] ?? wp_strip_all_tags( $svc['sub_hero']['subtitle'] ?? '' ),
            'og_image'    => $base . '/' . ( $svc['sub_hero']['bg'] ?? 'hero-image.png' ),
            'og_type'     => 'article',
            'robots'      => 'index, follow',
            'page_type'   => 'service',
        ];
    }

    // Final default — must NOT call wp_get_document_title() since this fn
    // is itself wired into the document_title_parts filter. That recursion
    // exhausts memory on any unmapped slug (e.g., new pages added post-deploy).
    return [
        'title' => get_bloginfo( 'name' ),
        'description' => 'A DreamSmile You Never Have to Hide. 30+ years of dental implant experience with ' . $brand . ' in New Market, VA.',
        'og_image' => $base . '/hero-image.png', 'og_type' => 'website', 'robots' => 'index, follow', 'page_type' => 'page',
    ];
}

add_filter( 'document_title_parts', function ( $parts ) {
    $seo = ds_seo_data();
    if ( ! empty( $seo['title'] ) ) {
        $parts['title']   = wp_strip_all_tags( html_entity_decode( $seo['title'] ) );
        $parts['tagline'] = '';
        $parts['site']    = '';
    }
    return $parts;
} );

add_action( 'wp_head', function () {
    $seo      = ds_seo_data();
    $office   = ds_office_data();
    $favicon  = get_stylesheet_directory_uri() . '/assets/images/favicon.svg';
    $site_url = trailingslashit( home_url() );
    $req_path = isset( $_SERVER['REQUEST_URI'] ) ? strtok( $_SERVER['REQUEST_URI'], '?' ) : '/';
    $canonical = home_url( $req_path );
    $description = wp_strip_all_tags( html_entity_decode( $seo['description'] ) );
    $title       = wp_strip_all_tags( html_entity_decode( $seo['title'] ) );
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo esc_attr( $description ); ?>">
    <meta name="robots" content="<?php echo esc_attr( $seo['robots'] ); ?>">
    <meta name="author" content="Dr. Jeffrey S. Burns, DDS">
    <meta name="theme-color" content="#7FB5B0">
    <link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( $favicon ); ?>">
    <meta property="og:site_name" content="DreamSmile by Dr. Jeffrey S. Burns, DDS">
    <meta property="og:type" content="<?php echo esc_attr( $seo['og_type'] ); ?>">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $canonical ); ?>">
    <meta property="og:image" content="<?php echo esc_url( $seo['og_image'] ); ?>">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $seo['og_image'] ); ?>">
    <?php
    $address_parts = ds_parse_address_for_schema( $office['address'] );
    $dentist_id    = $site_url . '#dentist';
    $person_id     = $site_url . '#dr-burns';
    $area_served = [];
    foreach ( [ 'Harrisonburg', 'Winchester', 'Broadway', 'Bridgewater', 'Luray', 'Woodstock', 'Elkton', 'Timberville' ] as $city ) {
        $area_served[] = [ '@type' => 'City', 'name' => $city . ', VA' ];
    }
    $dentist_schema = [
        '@context' => 'https://schema.org', '@type' => 'Dentist', '@id' => $dentist_id,
        'name' => 'DreamSmile by Dr. Jeffrey S. Burns, DDS', 'alternateName' => 'Dr. Burns Dental Implants',
        'url' => $site_url, 'logo' => get_stylesheet_directory_uri() . '/assets/images/favicon.svg',
        'image' => get_stylesheet_directory_uri() . '/assets/arrange/casual-photo-burns.png',
        'description' => 'Nationally recognized dental implant practice led by Dr. Jeffrey S. Burns, DDS, with 30+ years of experience. Home of the Burns Protocol.',
        'telephone' => $office['phone_tel'], 'priceRange' => '$$$',
        'address' => array_merge( [ '@type' => 'PostalAddress' ], $address_parts ),
        'areaServed' => $area_served,
        'openingHoursSpecification' => [ [ '@type' => 'OpeningHoursSpecification', 'dayOfWeek' => [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ], 'opens' => '08:00', 'closes' => '17:00' ] ],
        'medicalSpecialty' => 'Dentistry',
        'knowsAbout' => [ 'Dental Implants', 'Cosmetic Dentistry', 'Restorative Dentistry', 'Full-Arch Implants', 'Burns Protocol' ],
        'founder' => [ '@id' => $person_id ], 'employee' => [ [ '@id' => $person_id ] ],
        'aggregateRating' => [ '@type' => 'AggregateRating', 'ratingValue' => '5.0', 'reviewCount' => $office['reviews'] ],
    ];
    $person_schema = [
        '@context' => 'https://schema.org', '@type' => 'Person', '@id' => $person_id,
        'name' => 'Dr. Jeffrey S. Burns', 'givenName' => 'Jeffrey', 'familyName' => 'Burns',
        'honorificSuffix' => 'DDS', 'jobTitle' => 'Doctor of Dental Surgery',
        'description' => 'Nationally recognized leader in dental implantology and smile design with over 30 years of hands-on implant experience. Creator of the Burns Protocol.',
        'image' => get_stylesheet_directory_uri() . '/assets/arrange/casual-photo-burns.png',
        'url' => $site_url, 'worksFor' => [ '@id' => $dentist_id ],
        'knowsAbout' => [ 'Dental Implants', 'Cosmetic Dentistry', 'Burns Protocol', 'Smile Design' ],
        'hasCredential' => [
            [ '@type' => 'EducationalOccupationalCredential', 'credentialCategory' => 'AACD Award Recipient' ],
            [ '@type' => 'EducationalOccupationalCredential', 'credentialCategory' => 'Published Author' ],
            [ '@type' => 'EducationalOccupationalCredential', 'credentialCategory' => 'Teaches Doctors Nationwide' ],
        ],
    ];
    echo "\n" . '<script type="application/ld+json">' . wp_json_encode( $dentist_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
    echo "\n" . '<script type="application/ld+json">' . wp_json_encode( $person_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
    if ( 'faq' === ( $seo['page_type'] ?? '' ) ) {
        $faqs = ds_faq_data();
        $main_entity = [];
        foreach ( $faqs as $f ) {
            // Brand convention: DreamSmile&trade; on visible UI only — strip the mark from schema text.
            $main_entity[] = [ '@type' => 'Question', 'name' => str_replace( '™', '', wp_strip_all_tags( html_entity_decode( $f[1] ) ) ), 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => str_replace( '™', '', wp_strip_all_tags( html_entity_decode( $f[2] ) ) ) ] ];
        }
        echo "\n" . '<script type="application/ld+json">' . wp_json_encode( [ '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $main_entity ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
    }
    if ( 'home' !== ( $seo['page_type'] ?? '' ) && ! empty( $seo['title'] ) ) {
        $bc = [ [ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $site_url ] ];
        if ( 'location' === $seo['page_type'] ) {
            $bc[] = [ '@type' => 'ListItem', 'position' => 2, 'name' => 'Locations', 'item' => $site_url . 'locations/' ];
            $bc[] = [ '@type' => 'ListItem', 'position' => 3, 'name' => $seo['page_city'], 'item' => $canonical ];
        } else {
            $bc[] = [ '@type' => 'ListItem', 'position' => 2, 'name' => wp_strip_all_tags( html_entity_decode( get_the_title() ?: $title ) ), 'item' => $canonical ];
        }
        echo "\n" . '<script type="application/ld+json">' . wp_json_encode( [ '@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $bc ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
    }
    if ( 'home' === ( $seo['page_type'] ?? '' ) ) {
        echo "\n" . '<script type="application/ld+json">' . wp_json_encode( [ '@context' => 'https://schema.org', '@type' => 'WebSite', 'url' => $site_url, 'name' => 'DreamSmile by Dr. Jeffrey S. Burns, DDS', 'publisher' => [ '@id' => $dentist_id ] ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
    }
    echo "\n";
}, 5 );

add_filter( 'robots_txt', function ( $output, $public ) {
    if ( '0' === (string) $public ) { return $output; }
    return $output . "\nSitemap: " . home_url( '/wp-sitemap.xml' ) . "\n";
}, 10, 2 );

function ds_parse_address_for_schema( $address ) {
    $parts = array_map( 'trim', explode( ',', (string) $address ) );
    $street = $parts[0] ?? '';
    $city   = $parts[1] ?? 'New Market';
    $rest   = $parts[2] ?? 'VA';
    $tokens = preg_split( '/\s+/', trim( $rest ) ) ?: [];
    $region = $tokens[0] ?? 'VA';
    $postal = $tokens[1] ?? '';
    $out = [ 'streetAddress' => $street, 'addressLocality' => $city, 'addressRegion' => $region, 'addressCountry' => 'US' ];
    if ( $postal !== '' ) { $out['postalCode'] = $postal; }
    return $out;
}

function ds_faq_data() {
    return [
        [ 'pain',      'Is the procedure painful?',       'Most patients are surprised at how comfortable the procedure is. With our on-staff anesthesiologist and modern techniques, you&rsquo;ll be relaxed and pain-free throughout. Mild soreness in the days after is normal and easily managed.' ],
        [ 'timing',    'How long do implants last?',      'With proper care, dental implants are designed to last a lifetime. Our DreamSmile&trade; implants come with industry-leading warranties &mdash; up to lifetime coverage on the implant itself.', 'FAQ-Implant-Lifespan.mp4' ],
        [ 'timing',    'Can I get permanent teeth in one day?', 'For many qualifying patients, yes. With the Burns Protocol, DreamSmile&trade; Creation Day can deliver a fixed, permanent-style smile the same day &mdash; no waiting weeks or months for a final restoration.', 'FAQ-Permanent-Teeth-One-Day.mp4' ],
        [ 'timing',    'What is the healing time?',       'Initial healing takes 1&ndash;2 weeks for soft tissue, with full integration of the implant into the bone taking 3&ndash;6 months. We&rsquo;ll provide a temporary smile so you&rsquo;re never without teeth during healing.' ],
        [ 'candidacy', 'What if I smoke?',                'Smoking can affect implant success and healing. We&rsquo;ll discuss this with you in your consultation and may recommend stopping for a period before and after surgery to ensure the best outcome.' ],
        [ 'candidacy', 'Do implants look natural?',       'Absolutely. Each DreamSmile&trade; is custom-designed to match your face, smile, and personality. Most people can&rsquo;t tell the difference between an implant and a natural tooth.' ],
        [ 'candidacy', 'What is the success rate for dental implants?', 'Dental implants are considered one of the most predictable, successful treatments in modern dentistry. Dr. Burns walks through the real numbers &mdash; and how the Burns Protocol&rsquo;s precision planning keeps DreamSmile&trade; outcomes at the top of that range.', 'FAQ-Implant-Success-Rate.mp4' ],
        [ 'cost',      'Does insurance help with cost?',  'Many insurance plans cover part of the cost. We work directly with most major providers and offer flexible financing through Cherry Credit and Care Credit to make your DreamSmile&trade; affordable.' ],
        [ 'candidacy', 'Am I a candidate with bone loss?','Most patients are candidates. Dr. Burns&rsquo; 3D imaging and bone-grafting techniques open up options many other offices can&rsquo;t offer &mdash; even for patients who&rsquo;ve been told &ldquo;no&rdquo; elsewhere.' ],
        [ 'cost',      'Is there a warranty?',            'Yes &mdash; every DreamSmile&trade; is backed by our Silver, Gold, or Platinum warranty. The Platinum tier covers your teeth for life.' ],
    ];
}

/**
 * Shared real-practice data — single physical practice in New Market, VA.
 * The 8 location subpages all reference this same address. TODO: replace
 * placeholder address + review count with real values.
 */
/**
 * Master config for all single-service pages (5 implant deep-dives, 9
 * General Dentistry children, 3 Cosmetic children, Restorative Care
 * children, Preventative-care subpages, Financing, Patient Education).
 *
 * Each entry powers:
 *   - Hero metadata (page-sub-hero.php fallback when slug not in $variants)
 *   - SEO meta (ds_seo_data() fallback when slug not in $map)
 *   - Body content (patterns/service-detail.php universal renderer)
 *
 * Adding a new service page = add an entry here + create the WP page.
 * No new pattern, template, or per-slug code required.
 */
function ds_service_pages() {
    static $cache = null;
    if ( null === $cache ) {
        $cache = require trailingslashit( get_stylesheet_directory() ) . 'inc/service-pages.php';
    }
    return $cache;
}

function ds_office_data() {
    return [
        'address'    => '9626 South Congress St, New Market, VA 22844',
        'maps_q'     => '9626 South Congress St, New Market, VA 22844',
        'hours'      => 'Mon&ndash;Thu &middot; 8 am &ndash; 3 pm',
        'reviews'    => '200', // TODO: verified site-wide review count
        'years'      => '30',
        'parking'    => 'Free on-site parking with step-free, ADA-accessible entry.',
        'home_city'  => 'New Market',
        'home_state' => 'VA',
        'phone'      => '(540) 740-8937',
        'phone_tel'  => '+15407408937',
    ];
}

/**
 * Split-panel sub-hero — a solid charcoal text panel beside a clean image
 * (no full scrim over the photo). Shared by page-sub-hero.php and the implant
 * deep-dive patterns so every sub-page hero stays consistent. Only a short top
 * gradient sits over the image, to keep the fixed navbar legible without
 * greying the whole photo.
 *
 * @param array $a label, title, sub, alt, bg (full URL), ctas[ [label,href,variant] ]
 */
function ds_render_split_hero( array $a ) {
    $label = $a['label'] ?? '';
    $title = $a['title'] ?? '';
    $sub   = $a['sub']   ?? '';
    $alt   = $a['alt']   ?? 'DreamSmile by Dr. Jeffrey S. Burns';
    $bg    = $a['bg']    ?? ( get_stylesheet_directory_uri() . '/assets/arrange/hero-image.png' );
    $ctas  = $a['ctas']  ?? [];
    ?>
    <section class="ds-hero ds-hero--sub ds-hero--split" id="hero">
      <div class="ds-hero-split">
        <div class="ds-hero-split__panel">
          <div class="ds-hero__content ds-reveal">
            <?php if ( '' !== $label ) : ?><span class="ds-hero__label"><?php echo wp_kses_post( $label ); ?></span><?php endif; ?>
            <h1 class="ds-hero__title"><?php echo wp_kses_post( $title ); ?></h1>
            <?php if ( '' !== $sub ) : ?><p class="ds-hero__sub"><?php echo wp_kses_post( $sub ); ?></p><?php endif; ?>
            <?php if ( ! empty( $ctas ) ) : ?>
            <div class="ds-hero__ctas">
              <?php foreach ( $ctas as $i => $c ) :
                  $variant = $c['variant'] ?? ( 0 === $i ? 'solid' : 'outlined-white' );
              ?>
                <a href="<?php echo esc_url( $c['href'] ?? '#' ); ?>" class="ds-btn ds-btn--<?php echo esc_attr( $variant ); ?>"><?php echo esc_html( $c['label'] ?? '' ); ?></a>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="ds-hero-split__media" role="img" aria-label="<?php echo esc_attr( $alt ); ?>"
             style="background-image: url('<?php echo esc_url( $bg ); ?>'); background-position: center;">
          <span class="ds-hero-split__watermark" aria-hidden="true">DreamSmile<sup>&trade;</sup></span>
        </div>
      </div>
    </section>
    <?php
}

/**
 * Shared "Meet the Specialist" section used by every sub-page.
 */
function ds_render_about_section() {
    $casual = get_stylesheet_directory_uri() . '/assets/arrange/casual-photo-burns.png';
    $check  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 13l4 4L19 7"/></svg>';
    $credentials = [ 'Nationally Recognized', 'Teaches Doctors Nationwide', 'AACD Award Recipient', 'Published Author' ];
    ?>
    <section class="ds-about" id="about">
      <div class="ds-wrap">
        <div class="ds-about__grid">
          <div class="ds-reveal ds-about__photo-col">
            <img class="ds-about__photo" src="<?php echo esc_url( $casual ); ?>" alt="Dr. Jeffrey S. Burns" loading="lazy" />
          </div>
          <div class="ds-reveal ds-about__text-col">
            <span class="ds-label">MEET THE SPECIALIST</span>
            <h2 class="ds-about__title">Dr. Jeffrey S. Burns</h2>
            <p class="ds-about__bio">Dr. Jeffrey S. Burns is a nationally recognized leader in dental implantology and smile design with over 30 years of hands-on implant experience. He is the creator of the Burns Protocol, a proven multi-step system with a proven 98%+ success rate that he has taught to dentists across the United States to consistently deliver beautiful, aesthetically pleasing, healthy, long-lasting DreamSmiles&trade;.</p>
            <p class="ds-about__bio">Dr. Burns combines elite expertise with genuine care&mdash;so much so that every DreamSmile&trade; patient receives his personal cell phone number, ensuring direct access, confidence, and peace of mind throughout their transformation.</p>
            <div class="ds-about__credentials">
              <?php foreach ( $credentials as $c ) : ?>
                <span class="ds-about__credential">
                  <span class="ds-about__credential-icon"><?php echo $check; ?></span>
                  <?php echo esc_html( $c ); ?>
                </span>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="ds-about__quote ds-reveal">
          <span class="ds-about__quote-mark" aria-hidden="true">&ldquo;</span>
          <blockquote class="ds-about__quote-body">
            <p class="ds-about__quote-text">Dr. Burns was very receptive to all of my concerns, kind and very professional. Very patient oriented. Excellent at explaining every detail of this journey towards getting the results I desire. I feel very comfortable saying that this office rates second to none.</p>
            <cite class="ds-about__quote-cite">&mdash; Gene Tucker</cite>
          </blockquote>
        </div>
      </div>
    </section>
    <?php
}

/**
 * The 8 service-detail slugs that are treated as blog articles under
 * /patient-education/. service-detail.php renders extra article-style
 * chrome (breadcrumb, read-time, related-articles) when the current
 * slug is in this list. The two parent hubs (gum-disease, restorative-care)
 * are intentionally excluded — they have their own hub layouts.
 */
function ds_pated_article_slugs() {
    return [
        'anesthesia',
        'dental-exams',
        'oral-hygiene',
        'teeth-cleaning',
        'dental-sealants',
        'deep-teeth-cleaning',
        'periodontal-maintenance',
        'dental-fillings',
    ];
}

function ds_pated_is_article( $slug ) {
    return in_array( $slug, ds_pated_article_slugs(), true );
}

/**
 * Estimate read-time in whole minutes for a service-pages entry, used
 * by both the /patient-education/ index card and the article-header
 * meta strip. 200 wpm baseline, floored at 2 min so short pieces don't
 * read as "0 min".
 */
function ds_pated_read_minutes( array $svc ) {
    $words = 0;
    if ( ! empty( $svc['intro']['sub'] ) )   { $words += str_word_count( wp_strip_all_tags( $svc['intro']['sub'] ) ); }
    if ( ! empty( $svc['intro']['title'] ) ) { $words += str_word_count( wp_strip_all_tags( $svc['intro']['title'] ) ); }
    if ( ! empty( $svc['steps']['list'] ) ) {
        foreach ( $svc['steps']['list'] as $s ) {
            $words += str_word_count( wp_strip_all_tags( $s['desc']  ?? '' ) );
            $words += str_word_count( wp_strip_all_tags( $s['title'] ?? '' ) );
        }
    }
    if ( ! empty( $svc['why']['cards'] ) ) {
        foreach ( $svc['why']['cards'] as $c ) {
            $words += str_word_count( wp_strip_all_tags( $c['desc'] ?? '' ) );
        }
    }
    return max( 2, (int) ceil( $words / 200 ) );
}

/**
 * Group → list of article slugs, mirroring the /patient-education/
 * index. Drives the "Related articles" footer on each article page.
 */
function ds_pated_groups() {
    return [
        'preventive'  => [ 'anesthesia', 'dental-exams', 'oral-hygiene', 'teeth-cleaning', 'dental-sealants' ],
        'gum-health'  => [ 'deep-teeth-cleaning', 'periodontal-maintenance' ],
        'restorative' => [ 'dental-fillings' ],
    ];
}

function ds_pated_group_for_slug( $slug ) {
    foreach ( ds_pated_groups() as $gid => $slugs ) {
        if ( in_array( $slug, $slugs, true ) ) { return $gid; }
    }
    return null;
}

/**
 * Helper to get video url from the GitHub Releases CDN
 */
function ds_get_video_url( $video_name ) {
    return 'https://github.com/franzsamilo/jeffrey-burns-oz.test/releases/latest/download/' . $video_name;
}
