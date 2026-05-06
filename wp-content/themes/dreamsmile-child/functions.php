<?php
/**
 * DreamSmile Child Theme — functions
 *
 * Patterns in patterns/ are auto-registered by WordPress from their header comments.
 * This file handles: asset enqueueing, pattern-category registration, theme support, SEO meta.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'twentytwentyfive-style',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme( 'twentytwentyfive' )->get( 'Version' )
    );

    wp_enqueue_style(
        'dreamsmile-style',
        get_stylesheet_uri(),
        [ 'twentytwentyfive-style' ],
        wp_get_theme()->get( 'Version' )
    );

    wp_enqueue_style(
        'dreamsmile-sections',
        get_stylesheet_directory_uri() . '/assets/css/sections.css',
        [ 'dreamsmile-style' ],
        wp_get_theme()->get( 'Version' )
    );

    wp_enqueue_style(
        'dreamsmile-pages',
        get_stylesheet_directory_uri() . '/assets/css/pages.css',
        [ 'dreamsmile-sections' ],
        wp_get_theme()->get( 'Version' )
    );

    wp_enqueue_style(
        'dreamsmile-fonts',
        'https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Dancing+Script:wght@400;700&family=Montserrat:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,700&display=swap',
        [],
        null
    );
}, 20 );

add_action( 'wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'dreamsmile-navbar',
        get_stylesheet_directory_uri() . '/assets/js/navbar.js',
        [],
        $ver,
        true
    );

    wp_enqueue_script(
        'dreamsmile-animations',
        get_stylesheet_directory_uri() . '/assets/js/animations.js',
        [],
        $ver,
        true
    );

    wp_enqueue_script(
        'dreamsmile-quiz',
        get_stylesheet_directory_uri() . '/assets/js/quiz.js',
        [],
        $ver,
        true
    );

    wp_enqueue_script(
        'dreamsmile-before-after',
        get_stylesheet_directory_uri() . '/assets/js/before-after.js',
        [],
        $ver,
        true
    );

    wp_enqueue_script(
        'dreamsmile-schedule-modal',
        get_stylesheet_directory_uri() . '/assets/js/schedule-modal.js',
        [],
        $ver,
        true
    );

    wp_enqueue_script(
        'dreamsmile-faq-cats',
        get_stylesheet_directory_uri() . '/assets/js/faq-cats.js',
        [],
        $ver,
        true
    );

    wp_enqueue_script(
        'dreamsmile-testimonials',
        get_stylesheet_directory_uri() . '/assets/js/testimonials.js',
        [],
        $ver,
        true
    );
} );

add_action( 'init', function () {
    register_block_pattern_category( 'dreamsmile', [
        'label' => __( 'DreamSmile', 'dreamsmile-child' ),
    ] );
} );

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', [ 'search-form', 'gallery', 'caption', 'style', 'script' ] );
} );

/** ──────────────────────────────────────────────────────────────────────
 *  SEO INFRASTRUCTURE
 *  ──────────────────────────────────────────────────────────────────────
 *  Per-page metadata + JSON-LD structured data, keyed off page slug.
 *
 *  - ds_current_slug()    — normalized slug for the current request
 *  - ds_seo_data( $slug ) — title / description / OG image / robots
 *  - The wp_head action below renders all meta tags, canonical, OG,
 *    Twitter, and JSON-LD structured data for that slug.
 *
 *  Schema model: ONE Dentist (single physical practice in Harrisonburg, VA)
 *  with `areaServed` covering the 8 SEO communities. Location subpages do
 *  NOT declare their own LocalBusiness entities — that would (correctly)
 *  read to Google as multiple practices, which is not the case.
 *  ────────────────────────────────────────────────────────────────────── */

function ds_current_slug() {
    if ( is_front_page() || is_home() ) {
        return 'home';
    }
    if ( is_page() ) {
        $p = get_post();
        if ( $p && ! empty( $p->post_name ) ) {
            return $p->post_name;
        }
    }
    return '';
}

/**
 * Returns SEO metadata for a given slug. Each page has a unique title,
 * description, OG image, and robots directive.
 */
function ds_seo_data( $slug = null ) {
    if ( null === $slug ) {
        $slug = ds_current_slug();
    }
    $office = ds_office_data();
    $brand  = 'Dr. Jeffrey S. Burns, DDS';
    $base   = get_stylesheet_directory_uri() . '/assets/arrange';

    // City-specific data for the 8 SEO landing pages.
    $cities = [
        'harrisonburg' => [
            'name'    => 'Harrisonburg',
            'prefix'  => 'in',
            'preview' => 'Dr. Burns&rsquo;s dental implant practice in the heart of Harrisonburg, VA. 30+ years of experience, the Burns Protocol, and a free consultation.',
            'image'   => 'Harrison-Hero.jpg',
        ],
        'winchester'  => [
            'name'    => 'Winchester',
            'prefix'  => 'Near',
            'preview' => 'Dental implant patients from Winchester, VA trust Dr. Burns for the Burns Protocol. A scenic drive south to our Harrisonburg office &mdash; free consultation.',
            'image'   => 'Winchester-8locations.jpg',
        ],
        'broadway'    => [
            'name'    => 'Broadway',
            'prefix'  => 'Near',
            'preview' => 'Dental implant patients from Broadway and the north Shenandoah Valley &mdash; short drive to Dr. Burns&rsquo;s Harrisonburg practice. Free consultation.',
            'image'   => 'Broadway-8locations.jpg',
        ],
        'bridgewater' => [
            'name'    => 'Bridgewater',
            'prefix'  => 'Near',
            'preview' => 'Bridgewater, VA dental implant patients &mdash; Dr. Burns&rsquo;s practice is just up the road in Harrisonburg. 30+ years of experience, free consultation.',
            'image'   => 'Bridgewater-8locations.jpg',
        ],
        'luray'       => [
            'name'    => 'Luray',
            'prefix'  => 'Near',
            'preview' => 'Page County dental implant patients trust Dr. Burns. Across the mountain on Rt. 211 to our Harrisonburg, VA practice. Free consultation.',
            'image'   => 'Luray-8locations.jpg',
        ],
        'woodstock'   => [
            'name'    => 'Woodstock',
            'prefix'  => 'Near',
            'preview' => 'Shenandoah County dental implant patients &mdash; Dr. Burns&rsquo;s practice is a half-hour south on I-81 from Woodstock. Free consultation.',
            'image'   => 'Woodstock-8locations.jpg',
        ],
        'elkton'      => [
            'name'    => 'Elkton',
            'prefix'  => 'Near',
            'preview' => 'Elkton and Rockingham County dental implant patients &mdash; Dr. Burns&rsquo;s practice is a short trip west on Rt. 33 in Harrisonburg, VA.',
            'image'   => 'Elkton-8locations.jpg',
        ],
        'timberville' => [
            'name'    => 'Timberville',
            'prefix'  => 'Near',
            'preview' => 'Timberville and orchard-country dental implant patients &mdash; quick drive south to Dr. Burns&rsquo;s Harrisonburg, VA practice. Free consultation.',
            'image'   => 'Timberville-8locations.jpg',
        ],
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
            'title'       => 'DreamSmile Dental Implants in Harrisonburg, VA | ' . $brand,
            'description' => 'Permanent dental implant solutions from a nationally recognized specialist with 30+ years of experience. Schedule your free consultation with Dr. Jeffrey S. Burns, DDS.',
            'og_image'    => $base . '/hero-image.png',
            'og_type'     => 'website',
            'robots'      => 'index, follow',
            'page_type'   => 'home',
        ],
        'dental-implants' => [
            'title'       => 'Dental Implants in Harrisonburg, VA &mdash; The Burns Protocol | ' . $brand,
            'description' => 'Permanent, natural-looking dental implants placed personally by Dr. Burns. Single, multi-tooth, and full-arch implants &mdash; all under one roof in Harrisonburg, VA.',
            'og_image'    => $base . '/dental-implants-hero.jpg',
            'og_type'     => 'article',
            'robots'      => 'index, follow',
            'page_type'   => 'service',
        ],
        'implant-cost' => [
            'title'       => 'Dental Implant Cost & Financing | ' . $brand . ' Harrisonburg, VA',
            'description' => 'Transparent, all-inclusive dental implant pricing in Harrisonburg, VA. No hidden fees. Flexible financing for single, multi-tooth, and full-arch implants.',
            'og_image'    => $base . '/dental-implants-hero.jpg',
            'og_type'     => 'article',
            'robots'      => 'index, follow',
            'page_type'   => 'service',
        ],
        'implant-procedures' => [
            'title'       => 'Dental Implant Procedures Explained | ' . $brand,
            'description' => 'Walk through every step of the dental implant process &mdash; consultation, placement, restoration. The Burns Protocol: a nationally recognized 6-step system.',
            'og_image'    => $base . '/dental-implants-hero.jpg',
            'og_type'     => 'article',
            'robots'      => 'index, follow',
            'page_type'   => 'service',
        ],
        'implant-faqs' => [
            'title'       => 'Dental Implant FAQs | ' . $brand . ' Harrisonburg, VA',
            'description' => 'Answers to the most common dental implant questions &mdash; pain, recovery, longevity, cost, candidacy. Direct from Dr. Burns and his 30+ years of experience.',
            'og_image'    => $base . '/new-patients-hero.jpg',
            'og_type'     => 'article',
            'robots'      => 'index, follow',
            'page_type'   => 'faq',
        ],
        'locations' => [
            'title'       => 'Dental Implants Near Harrisonburg, VA &mdash; Communities We Serve | ' . $brand,
            'description' => 'Dr. Burns&rsquo;s dental implant practice serves patients across the Shenandoah Valley from his Harrisonburg, VA office. See the communities we serve.',
            'og_image'    => $base . '/Harrison-Hero.jpg',
            'og_type'     => 'website',
            'robots'      => 'index, follow',
            'page_type'   => 'locations-index',
        ],
        'new-patients' => [
            'title'       => 'New Patients | DreamSmile Dental Implants &mdash; ' . $brand,
            'description' => 'Welcome to DreamSmile. Get started with your free consultation, new patient forms, and what to expect on your first visit with Dr. Burns in Harrisonburg, VA.',
            'og_image'    => $base . '/new-patients-hero.jpg',
            'og_type'     => 'article',
            'robots'      => 'index, follow',
            'page_type'   => 'page',
        ],
    ];

    if ( isset( $map[ $slug ] ) ) {
        return $map[ $slug ];
    }

    // Fallback for any unmapped page — safe defaults.
    return [
        'title'       => wp_get_document_title(),
        'description' => 'A Dream Smile You Never Have to Hide. 30+ years of dental implant experience with ' . $brand . ' in Harrisonburg, VA.',
        'og_image'    => $base . '/hero-image.png',
        'og_type'     => 'website',
        'robots'      => 'index, follow',
        'page_type'   => 'page',
    ];
}

/**
 * Per-page <title> via WP's title-tag system.
 */
add_filter( 'document_title_parts', function ( $parts ) {
    $seo = ds_seo_data();
    if ( ! empty( $seo['title'] ) ) {
        // Use full title as the title; clear the tagline so WP doesn't append blogname.
        $parts['title']   = wp_strip_all_tags( html_entity_decode( $seo['title'] ) );
        $parts['tagline'] = '';
        $parts['site']    = '';
    }
    return $parts;
} );

/**
 * Per-page head: meta description, robots, Open Graph, Twitter, canonical, favicon, JSON-LD.
 */
add_action( 'wp_head', function () {
    $seo      = ds_seo_data();
    $office   = ds_office_data();
    $favicon  = get_stylesheet_directory_uri() . '/assets/images/favicon.svg';
    $site_url = trailingslashit( home_url() );

    // Canonical: home_url() + the current request URI (without query string).
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
    // ─── JSON-LD: Dentist (single LocalBusiness, served on every page) ───
    $address_parts = ds_parse_address_for_schema( $office['address'] );
    $dentist_id    = $site_url . '#dentist';
    $person_id     = $site_url . '#dr-burns';

    $area_served = [];
    foreach ( [ 'Harrisonburg', 'Winchester', 'Broadway', 'Bridgewater', 'Luray', 'Woodstock', 'Elkton', 'Timberville' ] as $city ) {
        $area_served[] = [
            '@type' => 'City',
            'name'  => $city . ', VA',
        ];
    }

    $dentist_schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'Dentist',
        '@id'         => $dentist_id,
        'name'        => 'DreamSmile by Dr. Jeffrey S. Burns, DDS',
        'alternateName' => 'Dr. Burns Dental Implants',
        'url'         => $site_url,
        'logo'        => get_stylesheet_directory_uri() . '/assets/images/favicon.svg',
        'image'       => get_stylesheet_directory_uri() . '/assets/arrange/casual-photo-burns.png',
        'description' => 'Nationally recognized dental implant practice led by Dr. Jeffrey S. Burns, DDS, with 30+ years of experience. Home of the Burns Protocol.',
        'telephone'   => $office['phone_tel'],
        'priceRange'  => '$$$',
        'address'     => array_merge( [ '@type' => 'PostalAddress' ], $address_parts ),
        'areaServed'  => $area_served,
        'openingHoursSpecification' => [ [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ],
            'opens'     => '08:00',
            'closes'    => '17:00',
        ] ],
        'medicalSpecialty' => 'Dentistry',
        'knowsAbout'       => [ 'Dental Implants', 'Cosmetic Dentistry', 'Restorative Dentistry', 'Full-Arch Implants', 'Burns Protocol' ],
        'founder'          => [ '@id' => $person_id ],
        'employee'         => [ [ '@id' => $person_id ] ],
        'aggregateRating'  => [
            '@type'       => 'AggregateRating',
            'ratingValue' => '5.0',
            'reviewCount' => $office['reviews'],
        ],
    ];

    $person_schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'Person',
        '@id'             => $person_id,
        'name'            => 'Dr. Jeffrey S. Burns',
        'givenName'       => 'Jeffrey',
        'familyName'      => 'Burns',
        'honorificSuffix' => 'DDS',
        'jobTitle'        => 'Doctor of Dental Surgery',
        'description'     => 'Nationally recognized leader in dental implantology and smile design with over 30 years of hands-on implant experience. Creator of the Burns Protocol.',
        'image'           => get_stylesheet_directory_uri() . '/assets/arrange/casual-photo-burns.png',
        'url'             => $site_url,
        'worksFor'        => [ '@id' => $dentist_id ],
        'knowsAbout'      => [ 'Dental Implants', 'Cosmetic Dentistry', 'Burns Protocol', 'Smile Design' ],
        'hasCredential'   => [
            [ '@type' => 'EducationalOccupationalCredential', 'credentialCategory' => 'AACD Award Recipient' ],
            [ '@type' => 'EducationalOccupationalCredential', 'credentialCategory' => 'Published Author' ],
            [ '@type' => 'EducationalOccupationalCredential', 'credentialCategory' => 'Teaches Doctors Nationwide' ],
        ],
    ];

    // Print Dentist + Person schemas on every page.
    echo "\n" . '<script type="application/ld+json">' . wp_json_encode( $dentist_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
    echo "\n" . '<script type="application/ld+json">' . wp_json_encode( $person_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';

    // FAQPage schema only on the FAQ page.
    if ( 'faq' === ( $seo['page_type'] ?? '' ) ) {
        $faqs = ds_faq_data();
        $main_entity = [];
        foreach ( $faqs as $f ) {
            $main_entity[] = [
                '@type'          => 'Question',
                'name'           => wp_strip_all_tags( html_entity_decode( $f[1] ) ),
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => wp_strip_all_tags( html_entity_decode( $f[2] ) ),
                ],
            ];
        }
        $faq_schema = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => $main_entity,
        ];
        echo "\n" . '<script type="application/ld+json">' . wp_json_encode( $faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
    }

    // BreadcrumbList for non-home pages — improves search appearance.
    if ( 'home' !== ( $seo['page_type'] ?? '' ) && ! empty( $seo['title'] ) ) {
        $breadcrumb_items = [ [
            '@type'    => 'ListItem',
            'position' => 1,
            'name'     => 'Home',
            'item'     => $site_url,
        ] ];
        if ( 'location' === $seo['page_type'] ) {
            $breadcrumb_items[] = [
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => 'Locations',
                'item'     => $site_url . 'locations/',
            ];
            $breadcrumb_items[] = [
                '@type'    => 'ListItem',
                'position' => 3,
                'name'     => $seo['page_city'],
                'item'     => $canonical,
            ];
        } else {
            $breadcrumb_items[] = [
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => wp_strip_all_tags( html_entity_decode( get_the_title() ?: $title ) ),
                'item'     => $canonical,
            ];
        }
        $breadcrumb_schema = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $breadcrumb_items,
        ];
        echo "\n" . '<script type="application/ld+json">' . wp_json_encode( $breadcrumb_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
    }

    // WebSite schema on home — enables Google sitelinks search box.
    if ( 'home' === ( $seo['page_type'] ?? '' ) ) {
        $website_schema = [
            '@context' => 'https://schema.org',
            '@type'    => 'WebSite',
            'url'      => $site_url,
            'name'     => 'DreamSmile by Dr. Jeffrey S. Burns, DDS',
            'publisher' => [ '@id' => $dentist_id ],
        ];
        echo "\n" . '<script type="application/ld+json">' . wp_json_encode( $website_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
    }

    echo "\n";
}, 5 );

/**
 * Append the WP-generated sitemap to the virtual robots.txt so crawlers
 * can discover all pages without us having to ship a static robots.txt.
 */
add_filter( 'robots_txt', function ( $output, $public ) {
    if ( '0' === (string) $public ) {
        return $output;
    }
    $sitemap = home_url( '/wp-sitemap.xml' );
    return $output . "\nSitemap: " . $sitemap . "\n";
}, 10, 2 );

/**
 * Splits a "1234 Main St, City, ST 22801" string into Schema.org PostalAddress fields.
 * Tolerant to placeholder/incomplete addresses.
 */
function ds_parse_address_for_schema( $address ) {
    $parts = array_map( 'trim', explode( ',', (string) $address ) );
    $street = $parts[0] ?? '';
    $city   = $parts[1] ?? 'Harrisonburg';
    $rest   = $parts[2] ?? 'VA';

    // "VA 22801" → ["VA", "22801"]
    $tokens  = preg_split( '/\s+/', trim( $rest ) ) ?: [];
    $region  = $tokens[0] ?? 'VA';
    $postal  = $tokens[1] ?? '';

    $out = [
        'streetAddress'   => $street,
        'addressLocality' => $city,
        'addressRegion'   => $region,
        'addressCountry'  => 'US',
    ];
    if ( $postal !== '' ) {
        $out['postalCode'] = $postal;
    }
    return $out;
}

/**
 * Shared FAQ data — used by both the implant-faqs pattern and the
 * FAQPage JSON-LD output. [category, question, answer] tuples.
 */
function ds_faq_data() {
    return [
        [ 'pain',      'Is the procedure painful?',       'Most patients are surprised at how comfortable the procedure is. With our on-staff anesthesiologist and modern techniques, you&rsquo;ll be relaxed and pain-free throughout. Mild soreness in the days after is normal and easily managed.' ],
        [ 'timing',    'How long do implants last?',      'With proper care, dental implants are designed to last a lifetime. Our DreamSmile implants come with industry-leading warranties &mdash; up to lifetime coverage on the implant itself.' ],
        [ 'timing',    'What is the healing time?',       'Initial healing takes 1&ndash;2 weeks for soft tissue, with full integration of the implant into the bone taking 3&ndash;6 months. We&rsquo;ll provide a temporary smile so you&rsquo;re never without teeth during healing.' ],
        [ 'candidacy', 'What if I smoke?',                'Smoking can affect implant success and healing. We&rsquo;ll discuss this with you in your consultation and may recommend stopping for a period before and after surgery to ensure the best outcome.' ],
        [ 'candidacy', 'Do implants look natural?',       'Absolutely. Each DreamSmile is custom-designed to match your face, smile, and personality. Most people can&rsquo;t tell the difference between an implant and a natural tooth.' ],
        [ 'cost',      'Does insurance help with cost?',  'Many insurance plans cover part of the cost. We work directly with most major providers and offer flexible financing through Cherry Credit and Care Credit to make your DreamSmile affordable.' ],
        [ 'candidacy', 'Am I a candidate with bone loss?','Most patients are candidates. Dr. Burns&rsquo; 3D imaging and bone-grafting techniques open up options many other offices can&rsquo;t offer &mdash; even for patients who&rsquo;ve been told &ldquo;no&rdquo; elsewhere.' ],
        [ 'cost',      'Is there a warranty?',            'Yes &mdash; every DreamSmile is backed by our Silver, Gold, or Platinum warranty. The Platinum tier covers your teeth for life.' ],
    ];
}

/**
 * Shared real-practice data — used on every location landing page.
 *
 * Dr. Burns operates ONE physical practice. The 8 location subpages
 * (Harrisonburg, Winchester, Broadway, Bridgewater, Luray, Woodstock,
 * Elkton, Timberville) are local-SEO landing pages using "Near [City]"
 * framing. Address, hours, phone, and review count are SHARED across all
 * of them and reflect the single real practice.
 *
 * TODO: replace placeholder address + review count with the real values.
 */
function ds_office_data() {
    return [
        'address'    => '1234 Main St, Harrisonburg, VA 22801', // TODO: real address
        'maps_q'     => '1234 Main St, Harrisonburg, VA 22801', // TODO: real address
        'hours'      => 'Mon&ndash;Fri &middot; 8 am &ndash; 5 pm',
        'reviews'    => '200', // TODO: verified site-wide review count
        'years'      => '30',
        'parking'    => 'Free on-site parking with step-free, ADA-accessible entry.',
        'home_city'  => 'Harrisonburg',
        'home_state' => 'VA',
        'phone'      => '(540) 740-8937',
        'phone_tel'  => '+15407408937',
    ];
}

/**
 * Shared "Meet the Specialist" section. Mirrors the homepage's dreamsmile/about-dr-burns
 * pattern so every sub-page shows the exact same Meet Dr. Burns design.
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

            <p class="ds-about__bio">
              Dr. Jeffrey S. Burns is a nationally recognized leader in dental implantology and smile design with over 30 years of hands-on implant experience. He is the creator of the Burns Protocol, a proven multi-step system he has taught to Dentists across the United States to consistently deliver healthy, long-lasting DreamSmile.
            </p>
            <p class="ds-about__bio">
              Dr. Burns combines elite expertise with genuine care&mdash;so much so that every DreamSmile patient receives his personal cell phone number, ensuring direct access, confidence, and peace of mind throughout their transformation.
            </p>

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
            <p class="ds-about__quote-text">
              Dr. Burns was very receptive to all of my concerns, kind and very professional. Very patient oriented. Excellent at explaining every detail of this journey towards getting the results I desire. I feel very comfortable saying that this office rates second to none.
            </p>
            <cite class="ds-about__quote-cite">&mdash; Gene Tucker</cite>
          </blockquote>
        </div>
      </div>
    </section>
    <?php
}
