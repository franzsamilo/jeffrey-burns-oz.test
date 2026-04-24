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
