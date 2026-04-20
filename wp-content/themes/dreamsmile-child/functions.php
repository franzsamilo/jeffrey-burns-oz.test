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
        'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Montserrat:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,700&display=swap',
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

add_action( 'wp_head', function () {
    $title       = 'DreamSmile by Dr. Jeffrey S. Burns, DDS — Dental Implants';
    $description = 'A Dream Smile You Never Have to Hide. 30+ years of dental implant experience. Schedule your free consultation with Dr. Burns today.';
    $site_url    = home_url( '/' );
    $favicon     = get_stylesheet_directory_uri() . '/assets/images/favicon.svg';
    ?>
    <meta name="description" content="<?php echo esc_attr( $description ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $site_url ); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( $favicon ); ?>">
    <?php
}, 5 );

add_filter( 'document_title_parts', function ( $parts ) {
    if ( is_front_page() || is_home() ) {
        $parts['title']   = 'DreamSmile by Dr. Jeffrey S. Burns, DDS';
        $parts['tagline'] = 'Dental Implants';
    }
    return $parts;
} );
