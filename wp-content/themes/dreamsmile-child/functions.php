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
    foreach ( [ 'navbar', 'animations', 'quiz', 'before-after', 'schedule-modal', 'lead-embeds', 'faq-cats', 'testimonials' ] as $h ) {
        wp_enqueue_script( 'dreamsmile-' . $h, get_stylesheet_directory_uri() . '/assets/js/' . $h . '.js', [], $ver, true );
    }
} );

/*
 * Speed (SEO tracker, Launch Checklist "Speed", Nov 2026 recheck).
 *
 * Hero photos are CSS backgrounds, which the browser only discovers after the
 * stylesheets arrive; Lighthouse put the homepage's main paint at ~8 s on a
 * phone. A block theme renders the whole template before wp_head() runs, so
 * the hero pattern names its photo via ds_preload_hero() and <head> asks for
 * it first, at high priority.
 */
function ds_preload_hero( $url = null ) {
    static $hero = '';
    if ( null !== $url && '' === $hero ) {
        $hero = (string) $url;
    }
    return $hero;
}
add_action( 'wp_head', function () {
    $hero = ds_preload_hero();
    if ( '' !== $hero ) {
        echo '<link rel="preload" as="image" href="' . esc_url( $hero ) . '" fetchpriority="high">' . "\n";
    }
}, 1 );

// Open the Google Fonts connections while the HTML is still arriving.
add_filter( 'wp_resource_hints', function ( $urls, $relation ) {
    if ( 'preconnect' === $relation ) {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = [ 'href' => 'https://fonts.gstatic.com', 'crossorigin' ];
    }
    return $urls;
}, 10, 2 );

// WordPress's emoji script (~20 KB) only adds colour emoji to old browsers.
// Every browser this site targets draws them natively.
add_action( 'init', function () {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
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

/** ────────────────────────────────────────────────────────────────────────
 *  LEAD DELIVERY ENGINE — captures leads from the existing schedule modal
 *  and forms, records them into Gravity Forms Form 1, and sends email alerts
 *  via FluentSMTP SendGrid. Preserves 100% of existing UI elements.
 *  ──────────────────────────────────────────────────────────────────────── */
function ds_handle_lead_submission() {
    $params = $_POST;
    if ( empty( $params ) ) {
        $json = file_get_contents( 'php://input' );
        $params = json_decode( $json, true ) ?: [];
    }

    // Spam honeypot guard
    if ( ! empty( $params['botcheck'] ) ) {
        wp_send_json_success( [ 'received' => true ] );
    }

    $name    = sanitize_text_field( $params['name'] ?? '' );
    $phone   = sanitize_text_field( $params['phone'] ?? '' );
    $email   = sanitize_email( $params['email'] ?? '' );
    $time    = sanitize_text_field( $params['time'] ?? '' );
    $message = sanitize_textarea_field( $params['message'] ?? '' );
    $subject = sanitize_text_field( $params['subject'] ?? 'New DreamSmile Assessment Request' );
    $source  = sanitize_text_field( $params['source_page'] ?? '' );
    $forms_req = sanitize_text_field( $params['forms_requested'] ?? '' );

    if ( empty( $name ) || ( empty( $email ) && empty( $phone ) ) ) {
        wp_send_json_error( [ 'message' => 'Missing required fields' ], 400 );
    }

    $notes = "Subject: {$subject}\n";
    if ( ! empty( $time ) )      { $notes .= "Preferred Time: {$time}\n"; }
    if ( ! empty( $forms_req ) )  { $notes .= "Forms Requested: {$forms_req}\n"; }
    if ( ! empty( $source ) )    { $notes .= "Source Page: {$source}\n"; }
    if ( ! empty( $message ) )   { $notes .= "\nPatient Notes:\n{$message}"; }

    $entry_id = null;
    if ( class_exists( 'GFAPI' ) ) {
        $entry = [
            'form_id'    => 1,
            '2'          => $name,
            '3'          => $email,
            '4'          => $phone,
            '5'          => 'Website Schedule Modal',
            '6'          => $notes,
            'source_url' => home_url( $source ),
        ];
        $entry_id = GFAPI::add_entry( $entry );

        if ( ! is_wp_error( $entry_id ) ) {
            $form = GFAPI::get_form( 1 );
            if ( $form ) {
                GFAPI::send_notifications( $form, GFAPI::get_entry( $entry_id ) );
            }
        }
    }

    // Direct email fail-safe (routes through FluentSMTP SendGrid)
    if ( ! $entry_id || is_wp_error( $entry_id ) ) {
        $to = 'info@jburnsdds.com';
        $email_subject = "Website Lead: {$name} - {$subject}";
        $email_body = "New lead submitted via website:\n\n"
                    . "Name: {$name}\n"
                    . "Phone: {$phone}\n"
                    . "Email: {$email}\n"
                    . "Preferred Time: {$time}\n"
                    . "Notes: {$message}\n"
                    . "Page: {$source}\n\n"
                    . "Date: " . current_time( 'mysql' ) . "\n";
        $headers = [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>" ];
        wp_mail( $to, $email_subject, $email_body, $headers );
    }

    wp_send_json_success( [
        'entry_id' => is_numeric( $entry_id ) ? (int) $entry_id : null,
    ] );
}
add_action( 'wp_ajax_nopriv_ds_schedule_submit', 'ds_handle_lead_submission' );
add_action( 'wp_ajax_ds_schedule_submit', 'ds_handle_lead_submission' );

/**
 * Keep the WP admin bar off the public-facing pages so the fixed
 * .ds-navbar sits flush at the top of the viewport (the bar's 46px
 * mobile height was creating a gap above the nav in the Playground
 * preview, which auto-logs the viewer in).
 */
add_filter( 'show_admin_bar', function ( $show ) {
    return current_user_can( 'edit_posts' );
} );

/** ────────────────────────────────────────────────────────────────────────
 *  ONE-SHOT PAGE SEEDER — guarded for manual execution.
 *  Only executes if explicitly requested by a logged-in Administrator
 *  via ?ds_run_page_seeder=1 (and ?force=1 to re-seed).
 *  ──────────────────────────────────────────────────────────────────────── */

add_action( 'init', function () {
    // Only execute if explicitly requested by a logged-in Administrator
    if ( ! isset( $_GET['ds_run_page_seeder'] ) ) {
        return;
    }
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Unauthorized: Administrator access required to seed pages.' );
    }

    $version = 'ds_pages_seeded_2026_05_10';
    if ( get_option( $version ) && ! isset( $_GET['force'] ) ) {
        return;
    }
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
        'Make a Payment',
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
 *  SEO — Slim SEO is the single source.
 *
 *  Titles, meta descriptions, canonicals, robots, Open Graph, the sitemap and
 *  the business schema all come from the Slim SEO plugin (plus Slim SEO
 *  Schema). The theme used to print its own copy of every one of those, and
 *  the SEO team's 2026-10-14 audit found the two copies disagreeing on every
 *  page: an http:// and an https:// canonical, two descriptions, two Open
 *  Graph sets, and a second Dentist entity with the wrong hours and a
 *  hard-coded "5.0 from 200 reviews" rating. The theme now prints none of it.
 *
 *  The per-page titles and descriptions the theme used to hard-code live on in
 *  inc/seo-migration.php, which copies them into Slim SEO once so the SEO
 *  team can edit them in wp-admin.
 *  ──────────────────────────────────────────────────────────────────────── */

// Any page without its own Slim SEO title falls back to WordPress's default
// "Page Title - Site Name". The SEO team's convention is a pipe. Slim SEO's
// {{ sep }} variable reads this same filter, so its templates follow suit.
add_filter( 'document_title_separator', function () { return '|'; } );

add_action( 'wp_head', function () {
    // A site icon set in Settings > General wins; this is only the fallback.
    if ( ! has_site_icon() ) {
        echo '<link rel="icon" type="image/svg+xml" href="' . esc_url( get_stylesheet_directory_uri() . '/assets/images/favicon.svg' ) . '">' . "\n";
    }
    echo '<meta name="theme-color" content="#7FB5B0">' . "\n";

    // FAQPage mirrors the questions a page shows, so it is built from the same
    // data: ds_faq_data() on /implant-faqs/, the town copy's 'faq' list on the
    // town pages (Rev 2 docs: "add an FAQ accordion with FAQPage schema").
    // Slim SEO prints no FAQPage, so neither is a second copy.
    if ( is_page( 'implant-faqs' ) ) {
        echo ds_faq_schema( array_map( function ( $f ) { return [ $f[1], $f[2] ]; }, ds_faq_data() ) );
    } elseif ( is_page() && ( $page = get_queried_object() ) instanceof WP_Post && isset( ds_town_copy()[ $page->post_name ] ) ) {
        $town = ds_town_render_copy( $page );
        if ( ! empty( $town['faq'] ) ) {
            echo ds_faq_schema( $town['faq'] );
        }
    }
}, 5 );

/**
 * FAQPage JSON-LD for [ question, answer ] pairs written as page HTML.
 * Brand convention: DreamSmile™ on visible UI only, so the mark is stripped.
 */
function ds_faq_schema( array $pairs ) {
    $text = function ( $html ) {
        return trim( str_replace( '™', '', wp_strip_all_tags( html_entity_decode( $html, ENT_QUOTES | ENT_HTML5, 'UTF-8' ) ) ) );
    };
    $main_entity = [];
    foreach ( $pairs as $f ) {
        $main_entity[] = [ '@type' => 'Question', 'name' => $text( $f[0] ), 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $text( $f[1] ) ] ];
    }
    return '<script type="application/ld+json">' . wp_json_encode( [ '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $main_entity ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}

// One-time hand-off of the theme's old titles/descriptions into Slim SEO.
require_once trailingslashit( get_stylesheet_directory() ) . 'inc/seo-migration.php';

// One-click fix for old internal links in posts and pages: /wp-admin/?ds_fix_post_links=1
require_once trailingslashit( get_stylesheet_directory() ) . 'inc/post-links.php';

// /meet-the-team/: the team list, and the one-time setup that creates the page.
require_once trailingslashit( get_stylesheet_directory() ) . 'inc/team.php';

function ds_faq_data() {
    return [
        [ 'pain',      'Is the procedure painful?',       'Most patients are surprised at how comfortable the procedure is. With our on-staff anesthesiologist and modern techniques, you&rsquo;ll be relaxed and pain-free throughout. Mild soreness in the days after is normal and easily managed.' ],
        [ 'timing',    'How long do implants last?',      'With proper care, dental implants are designed to last a lifetime. Our DreamSmile<sup class="ds-tm">&trade;</sup> implants come with industry-leading warranties &mdash; up to lifetime coverage on the implant itself.', 'FAQ-Implant-Lifespan.mp4' ],
        [ 'timing',    'Can I get permanent teeth in one day?', 'For many qualifying patients, yes. With the Burns Protocol, DreamSmile<sup class="ds-tm">&trade;</sup> Creation Day can deliver a fixed, permanent-style smile the same day &mdash; no waiting weeks or months for a final restoration.', 'FAQ-Permanent-Teeth-One-Day.mp4' ],
        [ 'timing',    'What is the healing time?',       'Initial healing takes 1&ndash;2 weeks for soft tissue, with full integration of the implant into the bone taking 3&ndash;6 months. We&rsquo;ll provide a temporary smile so you&rsquo;re never without teeth during healing.' ],
        [ 'candidacy', 'What if I smoke?',                'Smoking can affect implant success and healing. We&rsquo;ll discuss this with you in your assessment and may recommend stopping for a period before and after surgery to ensure the best outcome.' ],
        [ 'candidacy', 'Do implants look natural?',       'Absolutely. Each DreamSmile<sup class="ds-tm">&trade;</sup> is custom-designed to match your face, smile, and personality. Most people can&rsquo;t tell the difference between an implant and a natural tooth.' ],
        [ 'candidacy', 'What is the success rate for dental implants?', 'Dental implants are considered one of the most predictable, successful treatments in modern dentistry. Dr. Burns walks through the real numbers &mdash; and how the Burns Protocol&rsquo;s precision planning keeps DreamSmile<sup class="ds-tm">&trade;</sup> outcomes at the top of that range.', 'FAQ-Implant-Success-Rate.mp4' ],
        [ 'cost',      'Does insurance help with cost?',  'Many insurance plans cover part of the cost. We work directly with most major providers and offer flexible financing through Cherry Credit and Care Credit to make your DreamSmile<sup class="ds-tm">&trade;</sup> affordable.' ],
        [ 'candidacy', 'Am I a candidate with bone loss?','Most patients are candidates. Dr. Burns&rsquo; 3D imaging and bone-grafting techniques open up options many other offices can&rsquo;t offer &mdash; even for patients who&rsquo;ve been told &ldquo;no&rdquo; elsewhere.' ],
        [ 'cost',      'Is there a warranty?',            'Yes &mdash; every DreamSmile<sup class="ds-tm">&trade;</sup> is backed by our Silver, Gold, or Platinum warranty. The Platinum tier covers your teeth for life.' ],
    ];
}

/**
 * Master config for all single-service pages (5 implant deep-dives, 9
 * General Dentistry children, 3 Cosmetic children, Restorative Care
 * children, Preventative-care subpages, Financing, Patient Education).
 *
 * Each entry powers:
 *   - Hero metadata (page-sub-hero.php fallback when slug not in $variants)
 *   - Body content (patterns/service-detail.php universal renderer)
 *
 * Page titles and meta descriptions are NOT set here — they live in Slim SEO.
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

/**
 * Shared real-practice data — single physical practice in New Market, VA.
 * Address and hours confirmed against the client's own site 2026-05-09.
 *
 * `reviews` is the visible "180+" Google review count (/dental-implants/ and
 * the theme's retiring town pages). On 2026-11-08 the live site's Google
 * reviews widget read "5.0, based on 188 reviews"; "180+" stays true as more
 * come in. It reaches no schema (the theme prints none).
 */
function ds_office_data() {
    return [
        'address'    => '9626 South Congress St, New Market, VA 22844',
        'maps_q'     => '9626 South Congress St, New Market, VA 22844',
        'hours'      => 'Mon&ndash;Thu &middot; 8 am &ndash; 3 pm',
        'reviews'    => '180', // Google: 188 on 2026-11-08.
        'years'      => '30',
        'parking'    => 'Free on-site parking with step-free, ADA-accessible entry.',
        'home_city'  => 'New Market',
        'home_state' => 'VA',
        'phone'      => '(540) 740-8937',
        'phone_tel'  => '+15407408937',
    ];
}

/**
 * Dr. James Whitney's page (oral surgeon working inside the office), or ''.
 *
 * SEO tracker, Nov 5 recheck: his 4 old pages stay live, and the new site
 * should link to them. The live site (Nov 2026) says his oral surgery runs
 * inside Dr. Burns's office. Every mention of him reads this, so if his
 * pages are ever drafted, the mentions disappear with them.
 */
function ds_whitney_url() {
    static $url = null;
    if ( null === $url ) {
        $page = get_page_by_path( 'about-us/whitney-oral-surgery/dr-james-whitney' );
        $url  = ( $page && 'publish' === $page->post_status ) ? (string) get_permalink( $page ) : '';
    }
    return $url;
}

/**
 * The 8 town (area) pages, in the order the SEO team ranks them.
 *
 * These are the long-standing /contact-us/ pages, not the theme's own
 * /harrisonburg/-style pages. The /contact-us/ addresses hold the rankings and
 * the outside links, so the SEO team is restoring their original text and
 * 301-redirecting the theme's versions to them (SEO tracker, 2026-10-15). Every
 * town link the theme prints — the /locations/ grid, the contact page, the
 * footer, the implant pages — reads from this one list.
 *
 * @return array<string,string> Town name => site-relative path.
 */
function ds_town_pages() {
    return [
        'Harrisonburg' => '/contact-us/dental-implants-harrisonburg-area/',
        'Winchester'   => '/contact-us/winchester-dentist-dental-implants/',
        'Elkton'       => '/contact-us/cosmetic-dentist-elkton-area/',
        'Bridgewater'  => '/contact-us/dental-implants-dentist-near-bridgewater/',
        'Woodstock'    => '/contact-us/dentist-near-woodstock-cosmetic-implants/',
        'Luray'        => '/contact-us/cosmetic-dentist-near-luray/',
        'Broadway'     => '/contact-us/cosmetic-dentist-near-broadway/',
        'Timberville'  => '/contact-us/dental-implants-timberville-va/',
    ];
}

/**
 * The copy for the town pages above, keyed by page slug (inc/town-pages.php):
 * the SEO team's Rev 2 text since theme 1.9.0, the old site's January text
 * before that. Pages read it through ds_town_render_copy(), which prefers new
 * text pasted in wp-admin.
 */
function ds_town_copy() {
    static $cache = null;
    if ( null === $cache ) {
        $cache = require trailingslashit( get_stylesheet_directory() ) . 'inc/town-pages.php';
    }
    return $cache;
}

// A town page with copy in ds_town_copy() is drawn by templates/page-town.html.
// The others keep the default page template and their wp-admin text.
add_filter( 'page_template_hierarchy', function ( $templates ) {
    $page = get_queried_object();
    if ( $page instanceof WP_Post && isset( ds_town_copy()[ $page->post_name ] ) ) {
        array_unshift( $templates, 'page-town.php' );
    }
    return $templates;
} );

/**
 * The copy a town page shows: the text in its WordPress editor once someone
 * has replaced the January text there, otherwise the theme's copy.
 *
 * SEO tracker, Nov 5 2026 recheck: the SEO team planned to paste each town
 * page's original text into WordPress. They sent the Rev 2 rewrite for the
 * theme instead (2026-11-11), and every editor on staging still holds the
 * January text, so the theme's copy shows. ds_town_editor_copy() tells pasted
 * text from the January text (and from the Rev 2 text, if that is pasted).
 *
 * Same shape as a ds_town_copy() entry, plus 'source' => 'editor'|'theme'.
 * Pasted text has no details or FAQ: those belong to the theme's copy.
 *
 * @param WP_Post $post A page listed in ds_town_copy().
 * @return array|null
 */
function ds_town_render_copy( WP_Post $post ) {
    $theme = ds_town_copy()[ $post->post_name ] ?? null;
    if ( ! $theme ) {
        return null;
    }
    $editor = ds_town_editor_copy( $post );
    if ( ! $editor ) {
        return $theme + [ 'source' => 'theme' ];
    }
    return array_merge( $theme, [
        'h1'       => '' !== $editor['h1'] ? $editor['h1'] : $theme['h1'],
        'intro'    => $editor['intro'],
        'sections' => $editor['sections'],
        'details'  => [],
        'faq'      => [],
        'source'   => 'editor',
    ] );
}

/**
 * Reads a town page's WordPress text into ds_town_copy()'s shape: the first H1,
 * the paragraphs before the first H2 (intro), then one [ heading, blocks ]
 * section per H2. Blocks are paragraph HTML strings, or [ 'ul'|'ol'|'h3' =>
 * inner HTML ] for lists and subheadings. Everything else (shortcodes, widgets,
 * buttons, images, embeds) is dropped, and empty bold marks are removed.
 *
 * Returns null while the text still has two or more of the headings the theme
 * already carries a version of (the January ones in 'january', or the theme
 * copy's own), so saving only the Slim SEO title never swaps the text, or
 * when it has fewer than two sections.
 *
 * @param WP_Post $post A page listed in ds_town_copy().
 * @return array|null
 */
function ds_town_editor_copy( WP_Post $post ) {
    static $cache = [];
    if ( array_key_exists( $post->ID, $cache ) ) {
        return $cache[ $post->ID ];
    }
    $cache[ $post->ID ] = null;

    $theme = ds_town_copy()[ $post->post_name ] ?? null;
    $html  = strip_shortcodes( (string) $post->post_content );
    // strip_shortcodes() only knows the shortcodes of active plugins; drop the rest too.
    $html = preg_replace( '/\[\/?[a-z][a-z0-9_-]*(?:\s[^\[\]]*)?\]/i', '', $html );
    if ( ! $theme || '' === trim( $html ) || ! class_exists( 'DOMDocument' ) ) {
        return null;
    }
    if ( ! has_blocks( $html ) ) {
        $html = wpautop( $html );
    }

    $doc  = new DOMDocument();
    $prev = libxml_use_internal_errors( true );
    $doc->loadHTML( '<?xml encoding="utf-8"?><body>' . $html . '</body>' );
    libxml_clear_errors();
    libxml_use_internal_errors( $prev );

    $kept    = [ 'h1', 'h2', 'h3', 'h4', 'p', 'ul', 'ol' ];
    $allowed = [
        'a'      => [ 'href' => true, 'title' => true, 'target' => true, 'rel' => true ],
        'strong' => [], 'b' => [], 'em' => [], 'i' => [], 'br' => [], 'sup' => [], 'li' => [],
    ];
    $plain = function ( $s ) {
        return trim( html_entity_decode( wp_strip_all_tags( $s ), ENT_QUOTES, 'UTF-8' ), " \t\n\r\0\x0B\xC2\xA0" );
    };

    $copy = [ 'h1' => '', 'intro' => [], 'sections' => [] ];
    foreach ( ( new DOMXPath( $doc ) )->query( '//h1|//h2|//h3|//h4|//p|//ul|//ol' ) as $node ) {
        // A <p> inside a list item belongs to the list.
        for ( $up = $node->parentNode; $up instanceof DOMElement; $up = $up->parentNode ) {
            if ( in_array( $up->nodeName, $kept, true ) ) {
                continue 2;
            }
        }
        $inner = '';
        foreach ( $node->childNodes as $child ) {
            $inner .= $doc->saveHTML( $child );
        }
        $inner = wp_kses( $inner, $allowed );
        $inner = trim( preg_replace( '#<(strong|b|em|i)>(\s|&nbsp;|\xC2\xA0)*</\1>#u', ' ', $inner ) );
        if ( '' === $plain( $inner ) ) {
            continue;
        }

        $tag = $node->nodeName;
        if ( 'h1' === $tag && '' === $copy['h1'] ) {
            $copy['h1'] = $plain( $inner );
        } elseif ( 'h1' === $tag || 'h2' === $tag ) {
            $copy['sections'][] = [ $inner, [] ];
        } else {
            $block = 'p' === $tag ? $inner : [ ( 'h4' === $tag ? 'h3' : $tag ) => $inner ];
            if ( $copy['sections'] ) {
                $copy['sections'][ count( $copy['sections'] ) - 1 ][1][] = $block;
            } else {
                $copy['intro'][] = $block;
            }
        }
    }
    // A heading whose section held only a widget or a button has nothing left.
    $copy['sections'] = array_values( array_filter( $copy['sections'], function ( $s ) {
        return ! empty( $s[1] );
    } ) );

    $key = function ( $s ) use ( $plain ) {
        return preg_replace( '/[^a-z0-9]+/', '', strtolower( $plain( $s ) ) );
    };
    $editor_heads = array_map( $key, array_column( $copy['sections'], 0 ) );
    $known_heads  = array_unique( array_map( $key, array_merge( $theme['january'] ?? [], array_column( $theme['sections'], 0 ) ) ) );
    if ( count( $copy['sections'] ) < 2 || count( array_intersect( $known_heads, $editor_heads ) ) >= 2 ) {
        return null;
    }
    return $cache[ $post->ID ] = $copy;
}

// Tells whoever edits a town page in wp-admin which text the page shows.
add_action( 'add_meta_boxes_page', function ( $post ) {
    if ( ! isset( ds_town_copy()[ $post->post_name ] ) ) {
        return;
    }
    add_meta_box( 'ds-town-text', __( 'Town page text', 'dreamsmile-child' ), function ( $post ) {
        if ( ds_town_editor_copy( $post ) ) {
            echo '<p><strong>The page shows the text in this editor.</strong></p>';
            echo '<p>Layout: the H1 and the paragraphs above the first H2 open the page. The first H2 section comes after the eligibility quiz. The H2 sections between the first and the last follow (three sit side by side; any other number stack). The last H2 section closes the page, above the call buttons. Lists and H3 subheadings are kept. Images, buttons, shortcodes and widgets are left out; the page adds its own.</p>';
        } else {
            echo '<p><strong>The page shows the theme&rsquo;s copy, not the text in this editor.</strong></p>';
            $town = ds_town_copy()[ $post->post_name ];
            echo '<p>To use your own text, replace the text in this editor: an H1, a short intro, then one H2 heading per section. Update the page and it switches over, once the January headings (&ldquo;' . wp_kses_post( $town['january'][0] ?? $town['sections'][0][0] ) . '&rdquo; and the rest) are gone and it doesn&rsquo;t reuse the theme&rsquo;s own (&ldquo;' . wp_kses_post( $town['sections'][0][0] ) . '&rdquo; and the rest). Your text replaces the theme&rsquo;s comparison section and FAQ too.</p>';
        }
        echo '<p>The Google headline and blurb are set in the Slim SEO box, as on every page.</p>';
    }, 'page', 'side', 'high' );
} );

/**
 * Page addresses follow the site's https (SEO tracker blocker, Nov 5 recheck).
 *
 * On staging every page (all 57, old and new) came out as http:// in its
 * canonical, its Open Graph URL, the sitemap and the REST API, while posts and
 * categories were https://. That is a page_link filter outside this theme;
 * staging still runs the old vendor's pbhs-common-plugin and pbhsthemehelper.
 * The live site, same plugins, is fine. Running last, this puts https back on
 * any page link whenever the site is served over https.
 */
add_filter( 'page_link', function ( $link ) {
    if ( is_ssl() || 'https' === wp_parse_url( (string) get_option( 'home' ), PHP_URL_SCHEME ) ) {
        $link = set_url_scheme( $link, 'https' );
    }
    return $link;
}, PHP_INT_MAX );

/**
 * Online bill payment (Balance Collect), requested by Dr. Burns 2026-10.
 * The site links to /make-a-payment/ (navbar Resources menu, footer, the
 * /resources/ hub), the old site's address for the same page, which shows the
 * payment button and the QR code.
 */
function ds_payment_url() {
    return 'https://pay.balancecollect.com/m/jeffreysburnsddspc';
}

// Until a /make-a-payment/ page is published (page seeder, or by hand with
// that slug), send anyone who follows a payment link straight to the payment
// portal instead of a 404. /pay-your-bill/ was this page's address in theme
// 1.3; it never went live, but a stale link may still point there.
add_action( 'template_redirect', function () {
    if ( ! is_404() ) {
        return;
    }
    $path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    if ( in_array( $path, [ 'make-a-payment', 'pay-your-bill' ], true ) ) {
        wp_redirect( ds_payment_url(), 302 );
        exit;
    }
} );

/**
 * Lead tools run by the practice's marketing agency in GoHighLevel, embed
 * codes sent by the client 2026-10-24. All three live on the agency's
 * domains; the theme only frames or links them.
 *
 *   survey — the 9-step eligibility quiz. The homepage quiz card is its first
 *            question, so the card's answer is handed over (see lead-embeds.js).
 *   smile  — Smile Reveal, the AI smile preview (homepage, under the quiz row).
 *   ebook  — the funnel page that delivers "The Ultimate Guide to Dental
 *            Implants" (GET THE FREE GUIDE, and the guide section).
 */
function ds_lead_tools() {
    return [
        'survey_id'  => 'uOZSrX8gMOfmQJAmCmNu',
        'survey_url' => 'https://schedule.jeffrey-burns.implant-services.com/widget/survey/uOZSrX8gMOfmQJAmCmNu',
        'survey_js'  => 'https://schedule.jeffrey-burns.implant-services.com/js/form_embed.js',
        'smile_url'  => 'https://app.smilereveal.io/embed?token=a16fb209402e11416aaa731568e6078d28f2bff01605aded53bd2e0d1a722a67',
        'ebook_url'  => 'https://jeffrey-burns.implant-services.com/get-e-book',
    ];
}

/**
 * Whether the Smile Reveal embed works right now. When the practice's Smile
 * Reveal account runs out of credits (it did in October 2026), the embed shows
 * visitors an error box instead of the tool, so the homepage leaves the
 * section out until the vendor's own check passes again. The answer is kept
 * for 30 minutes. If the check can't be reached, the section shows as before.
 */
function ds_smile_reveal_ready() {
    $cached = get_transient( 'ds_smile_reveal_ready' );
    if ( false !== $cached ) {
        return 'yes' === $cached;
    }
    parse_str( (string) wp_parse_url( ds_lead_tools()['smile_url'], PHP_URL_QUERY ), $query );
    $home   = wp_parse_url( home_url() );
    $origin = $home['scheme'] . '://' . $home['host'] . ( isset( $home['port'] ) ? ':' . $home['port'] : '' );
    $res    = wp_remote_post( 'https://app.smilereveal.io/api/embed/validate', [
        'timeout' => 3,
        'headers' => [ 'Content-Type' => 'application/json' ],
        'body'    => wp_json_encode( [ 'token' => $query['token'] ?? '', 'embeddingOrigin' => $origin ] ),
    ] );
    // 403 ("out of credits") and 401 ("invalid token") are the vendor saying
    // no. A timeout or a server error says nothing either way.
    $code  = (int) wp_remote_retrieve_response_code( $res );
    $ready = $code < 400 || $code >= 500;
    set_transient( 'ds_smile_reveal_ready', $ready ? 'yes' : 'no', 30 * MINUTE_IN_SECONDS );
    return $ready;
}

// The survey modal. Rendered here rather than in parts/footer.html because it
// needs the URL above, and an editor-customised footer part would hide any
// markup added to the file. The iframe itself is only created on first open.
add_action( 'wp_footer', function () {
    $tools = ds_lead_tools();
    ?>
<div class="ds-modal ds-modal--survey" data-ds-survey-modal hidden
     data-ds-survey-id="<?php echo esc_attr( $tools['survey_id'] ); ?>"
     data-ds-survey-src="<?php echo esc_url( $tools['survey_url'] ); ?>"
     data-ds-survey-js="<?php echo esc_url( $tools['survey_js'] ); ?>">
  <div class="ds-modal__backdrop" data-ds-survey-close></div>

  <div class="ds-modal__panel" role="dialog" aria-modal="true" aria-labelledby="ds-survey-title">
    <button type="button" class="ds-modal__close" data-ds-survey-close aria-label="Close">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>
    </button>

    <div class="ds-survey">
      <span class="ds-label">30-SECOND ELIGIBILITY QUIZ</span>
      <h2 class="ds-modal__title" id="ds-survey-title">Are You a Candidate for a <span class="ds-modal__title-accent">DreamSmile<sup class="ds-tm">&trade;</sup></span>?</h2>
      <div class="ds-survey__frame" data-ds-survey-frame></div>
      <p class="ds-modal__note">Prefer to talk it through? <a href="tel:+15407408937">(540) 740-8937</a></p>
    </div>
  </div>
</div>
    <?php
} );

/**
 * Split-panel sub-hero — a solid charcoal text panel beside a clean image
 * (no full scrim over the photo). Shared by page-sub-hero.php and the implant
 * deep-dive patterns so every sub-page hero stays consistent. Only a short top
 * gradient sits over the image, to keep the fixed navbar legible without
 * greying the whole photo.
 *
 * @param array $a label, title, sub, alt, bg (full URL), ctas[ [label,href,variant,survey] ]
 *                 A CTA with 'survey' => true opens the eligibility survey.
 */
function ds_render_split_hero( array $a ) {
    $label = $a['label'] ?? '';
    $title = $a['title'] ?? '';
    $sub   = $a['sub']   ?? '';
    $alt   = $a['alt']   ?? 'DreamSmile by Dr. Jeffrey S. Burns';
    $bg    = $a['bg']    ?? ( get_stylesheet_directory_uri() . '/assets/arrange/hero-image.webp' );
    $ctas  = $a['ctas']  ?? [];
    ds_preload_hero( $bg );
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
                <a href="<?php echo esc_url( $c['href'] ?? '#' ); ?>" class="ds-btn ds-btn--<?php echo esc_attr( $variant ); ?>"<?php echo empty( $c['survey'] ) ? '' : ' data-ds-survey'; ?>><?php echo esc_html( $c['label'] ?? '' ); ?></a>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="ds-hero-split__media" role="img" aria-label="<?php echo esc_attr( $alt ); ?>"
             style="background-image: url('<?php echo esc_url( $bg ); ?>'); background-position: center;">
        </div>
      </div>
    </section>
    <?php
}

/*
 * ds_render_about_section() was removed on 2026-08-07.
 *
 * It was a second, near-identical implementation of the doctor block that
 * four content patterns (single-location, implant-cost, implant-faqs,
 * implant-procedures) called mid-flow. Because every template ALSO appends
 * the canonical dreamsmile/about-dr-burns pattern after post-content, those
 * 11 pages rendered Dr. Burns twice — the duplicate the client caught on a
 * location page during the 2026-08-04 review.
 *
 * The pattern at patterns/about-dr-burns.php is now the single source for
 * this block. Do not reintroduce a PHP-side copy.
 */

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
 * Resolve a video file name to a URL.
 *
 * build_zip.py excludes *.mp4 (the footage runs to hundreds of MB), so every
 * video slot on the site resolves through here. In order:
 *
 *   1. The site's own Media Library. Upload the .mp4 with the same file name
 *      and every slot that uses it switches over, no code change. This is
 *      how the videos move off the developer's GitHub account, which the SEO
 *      team flagged (tracker R26): the client does not own that account.
 *   2. A copy dropped into the theme's assets/arrange/ folder.
 *   3. The jeffrey-burns-oz.test v2 GitHub release (the long-standing
 *      fallback). Pinned to v2, not /releases/latest/, because the footage is
 *      not re-uploaded to later releases.
 */
function ds_get_video_url( $video_name ) {
    $library = ds_media_library_videos();
    $key     = strtolower( $video_name );
    if ( isset( $library[ $key ] ) ) {
        return $library[ $key ];
    }

    $local_path = get_stylesheet_directory() . '/assets/arrange/' . $video_name;
    if ( file_exists( $local_path ) ) {
        return get_stylesheet_directory_uri() . '/assets/arrange/' . $video_name;
    }
    return 'https://github.com/franzsamilo/jeffrey-burns-oz.test/releases/download/v2/' . $video_name;
}

/**
 * Poster frame for a video, from assets/arrange/posters/<video name>.webp.
 * Empty string when there is none.
 *
 * With a poster the video can wait for the play button (preload="none")
 * instead of fetching part of the file on page load: the homepage's two
 * videos alone cost about 600 KB that way (Lighthouse, Nov 2026).
 */
function ds_video_poster( $video_name ) {
    $rel = '/assets/arrange/posters/' . preg_replace( '/\.mp4$/i', '', $video_name ) . '.webp';
    return file_exists( get_stylesheet_directory() . $rel ) ? get_stylesheet_directory_uri() . $rel : '';
}

/**
 * The poster and preload attributes for a <video> tag, already escaped.
 * Pass $poster to use a poster from elsewhere (e.g. a before/after still).
 */
function ds_video_load_attrs( $video_name, $poster = '' ) {
    $poster = $poster ? $poster : ds_video_poster( $video_name );
    return $poster
        ? 'poster="' . esc_url( $poster ) . '" preload="none"'
        : 'preload="metadata"';
}

/**
 * Every video in the Media Library, keyed by lower-cased file name.
 * One query per request, and only on pages that actually render a video.
 *
 * When two uploads share a file name (a smaller re-encode uploaded in a
 * later month's folder, say), the newest one wins, so replacing a video
 * never needs the old attachment deleted first.
 *
 * @return array<string,string> file name => URL.
 */
function ds_media_library_videos() {
    static $map = null;
    if ( null !== $map ) {
        return $map;
    }
    $map = [];
    $ids = get_posts( [
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'post_mime_type' => 'video',
        'posts_per_page' => 200,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ] );
    if ( $ids ) {
        update_meta_cache( 'post', $ids );
    }
    foreach ( $ids as $id ) {
        $file = get_post_meta( $id, '_wp_attached_file', true );
        $url  = wp_get_attachment_url( $id );
        $key  = $file ? strtolower( wp_basename( $file ) ) : '';
        if ( $key && $url && ! isset( $map[ $key ] ) ) {
            $map[ $key ] = $url;
        }
    }
    return $map;
}


/**
 * R31 / Launch Checklist Row 25 / Metadata Issues Row 23:
 * Hide author archive pages from Google (noindex).
 */
add_filter( 'slim_seo_robots_index', function ( $value, $object_id = 0 ) {
    if ( is_author() ) {
        return false;
    }
    return $value;
}, 10, 2 );

/**
 * Launch Checklist Rows 8, 13 & 18:
 * Enrich Slim SEO's single Organization schema entity into a full Dentist
 * entity with street address, hours (Mon–Thu 8 AM – 3 PM), phone, geo
 * coordinates, map link, and https URLs across the graph.
 */
add_filter( 'slim_seo_schema_graph', function ( $graph ) {
    if ( ! is_array( $graph ) ) {
        return $graph;
    }
    foreach ( $graph as $k => $node ) {
        if ( ! is_array( $node ) ) {
            continue;
        }
        foreach ( [ '@id', 'url', 'target' ] as $url_field ) {
            if ( isset( $node[ $url_field ] ) && is_string( $node[ $url_field ] ) && 0 === strpos( $node[ $url_field ], 'http://' ) ) {
                $graph[ $k ][ $url_field ] = set_url_scheme( $node[ $url_field ], 'https' );
            }
        }
        $type = $node['@type'] ?? '';
        $id   = $node['@id'] ?? '';
        if ( 'Organization' === $type || 'Dentist' === $type || false !== strpos( (string) $id, '#organization' ) ) {
            $graph[ $k ]['@type']     = 'Dentist';
            $graph[ $k ]['name']      = 'Dr. Jeffrey Burns';
            $graph[ $k ]['telephone'] = '+1-540-740-8937';
            $graph[ $k ]['address']   = [
                '@type'           => 'PostalAddress',
                'streetAddress'   => '9626 South Congress St',
                'addressLocality' => 'New Market',
                'addressRegion'   => 'VA',
                'postalCode'      => '22844',
                'addressCountry'  => 'US',
            ];
            $graph[ $k ]['geo'] = [
                '@type'     => 'GeoCoordinates',
                'latitude'  => 38.6473,
                'longitude' => -78.6711,
            ];
            $graph[ $k ]['hasMap'] = 'https://www.google.com/maps?q=9626+South+Congress+St,+New+Market,+VA+22844';
            $graph[ $k ]['openingHoursSpecification'] = [
                [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday' ],
                    'opens'     => '08:00',
                    'closes'    => '15:00',
                ],
            ];
            $same_as = isset( $graph[ $k ]['sameAs'] ) && is_array( $graph[ $k ]['sameAs'] ) ? $graph[ $k ]['sameAs'] : [];
            foreach ( [
                'https://www.facebook.com/JeffreySBurnsDDS/',
                'https://www.instagram.com/jeffreys.burnsdds/',
                'https://www.google.com/maps?q=Jeffrey+S.+Burns+DDS+9626+South+Congress+St+New+Market+VA+22844',
            ] as $profile ) {
                if ( ! in_array( $profile, $same_as, true ) ) {
                    $same_as[] = $profile;
                }
            }
            $graph[ $k ]['sameAs'] = array_values( $same_as );
        }
    }
    return $graph;
}, 999 );

/**
 * Fix Old Redirects Tab (Rows 4–12) & Legacy Snippet Cleanup:
 * Prevents case-insensitive self-redirect loops (/Blog -> /blog/, /Contact -> /contact/)
 * in ss_redirects, handles case-sensitive /Blog and /Contact + the 6 manual rules at
 * priority 1 on template_redirect, and strips legacy placeSmileReveal() footer injections.
 */
add_action( 'init', function () {
    if ( get_option( 'ds_v162_cleanup_done' ) === '1' ) {
        return;
    }

    $opt_name  = defined( 'SLIM_SEO_REDIRECTS' ) ? SLIM_SEO_REDIRECTS : 'ss_redirects';
    $redirects = get_option( $opt_name, [] );
    if ( is_array( $redirects ) ) {
        $manual_fixes = [
            'cosmetic-dentistry/clear-braces'      => '/clear-braces/',
            'cosmetic-dentistry/porcelain-veneers' => '/porcelain-veneers/',
            'cosmetic-dentistry/teeth-whitening'   => '/teeth-whitening/',
            'cosmetic-dentistry/dental-bonding'    => '/cosmetic-dentistry/',
            'cosmetic-dentistry/inlays-onlays'     => '/dental-fillings/',
            'about'                                => '/meet-dr-burns/',
            'About'                                => '/meet-dr-burns/',
        ];
        $found_keys = [];
        foreach ( $redirects as $k => $r ) {
            if ( ! is_array( $r ) ) {
                continue;
            }
            $from_norm = trim( $r['from'] ?? '', '/' );
            $to_path   = trim( (string) wp_parse_url( $r['to'] ?? '', PHP_URL_PATH ), '/' );
            if ( strtolower( $from_norm ) === strtolower( $to_path ) ) {
                unset( $redirects[ $k ] );
                continue;
            }
            foreach ( $manual_fixes as $mf_from => $mf_to ) {
                if ( strcasecmp( $from_norm, $mf_from ) === 0 ) {
                    $redirects[ $k ]['to']               = home_url( $mf_to );
                    $redirects[ $k ]['type']             = 301;
                    $redirects[ $k ]['condition']        = 'exact-match';
                    $redirects[ $k ]['enable']           = 1;
                    $redirects[ $k ]['ignoreParameters'] = 1;
                    $found_keys[ strtolower( $mf_from ) ] = true;
                }
            }
            if ( isset( $redirects[ $k ]['to'] ) && strpos( $redirects[ $k ]['to'], 'http://' ) === 0 ) {
                $redirects[ $k ]['to'] = set_url_scheme( $redirects[ $k ]['to'], 'https' );
            }
        }
        foreach ( $manual_fixes as $mf_from => $mf_to ) {
            if ( empty( $found_keys[ strtolower( $mf_from ) ] ) ) {
                $redirects[ uniqid() ] = [
                    'type'             => 301,
                    'condition'        => 'exact-match',
                    'from'             => $mf_from,
                    'to'               => home_url( $mf_to ),
                    'note'             => 'SEO tracker Section 3 manual rule',
                    'enable'           => 1,
                    'ignoreParameters' => 1,
                ];
                $found_keys[ strtolower( $mf_from ) ] = true;
            }
        }
        update_option( $opt_name, $redirects );
    }

    $snippets = get_posts( [
        'post_type'      => 'wpcode',
        'post_status'    => [ 'publish', 'draft', 'any' ],
        'posts_per_page' => 50,
    ] );
    foreach ( $snippets as $snip ) {
        if ( strpos( $snip->post_content, 'placeSmileReveal' ) !== false || strpos( $snip->post_content, 'smile-reveal-funnel.js' ) !== false ) {
            wp_update_post( [
                'ID'          => $snip->ID,
                'post_status' => 'draft',
            ] );
        }
    }
    foreach ( [ 'ihaf_insert_footer', 'ihaf_insert_header', 'ihaf_insert_body' ] as $ihaf_key ) {
        $val = get_option( $ihaf_key, '' );
        if ( is_string( $val ) && ( strpos( $val, 'placeSmileReveal' ) !== false || strpos( $val, 'smile-reveal-funnel.js' ) !== false ) ) {
            $val = preg_replace( '#<script[^>]*smile-reveal-funnel\.js[^>]*>\s*</script>#i', '', $val );
            $val = preg_replace( '#<script[^>]*>[^<]*placeSmileReveal[\s\S]*?</script>#i', '', $val );
            update_option( $ihaf_key, trim( $val ) );
        }
    }
    delete_transient( 'wpcode_snippets' );
    delete_option( 'wpcode_snippets' );

    update_option( 'ds_v162_cleanup_done', '1' );
}, 20 );

add_action( 'template_redirect', function () {
    $req_path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    if ( 'Blog' === $req_path ) {
        wp_safe_redirect( home_url( '/blog/' ), 301 );
        exit;
    }
    if ( 'Contact' === $req_path ) {
        wp_safe_redirect( home_url( '/contact/' ), 301 );
        exit;
    }
    $legacy_map = [
        'cosmetic-dentistry/clear-braces'      => '/clear-braces/',
        'cosmetic-dentistry/porcelain-veneers' => '/porcelain-veneers/',
        'cosmetic-dentistry/teeth-whitening'   => '/teeth-whitening/',
        'cosmetic-dentistry/dental-bonding'    => '/cosmetic-dentistry/',
        'cosmetic-dentistry/inlays-onlays'     => '/dental-fillings/',
        'about'                                => '/meet-dr-burns/',
    ];
    $key = strtolower( $req_path );
    if ( isset( $legacy_map[ $key ] ) ) {
        wp_safe_redirect( home_url( $legacy_map[ $key ] ), 301 );
        exit;
    }
}, 1 );

add_action( 'wp_footer', function () {
    ob_start();
}, 0 );

add_action( 'wp_footer', function () {
    $footer_html = ob_get_clean();
    if ( false === $footer_html ) {
        return;
    }
    if ( strpos( $footer_html, 'placeSmileReveal' ) !== false || strpos( $footer_html, 'smile-reveal-funnel.js' ) !== false ) {
        $footer_html = preg_replace( '#<script[^>]*smile-reveal-funnel\.js[^>]*>\s*</script>#i', '', $footer_html );
        $footer_html = preg_replace( '#<script[^>]*>[^<]*placeSmileReveal[\s\S]*?</script>#i', '', $footer_html );
    }
    echo $footer_html;
}, 99999 );
