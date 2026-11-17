<?php
/**
 * /about-us/whitney-oral-surgery/dr-james-whitney/: consolidates Dr. James Whitney's
 * bio, Oral Surgery hours, and referral/contact details onto his main page (#59),
 * drafts the 3 thin/placeholder sibling pages (#58, #60, #61), and 301-redirects them.
 *
 * Also cleans up the accidental /meet-the-team-2/ duplicate if present on staging.
 */
defined( 'ABSPATH' ) || exit;

/**
 * Google headline and blurb for /about-us/whitney-oral-surgery/dr-james-whitney/.
 *
 * @return array{0:string,1:string}
 */
function ds_whitney_seo() {
    return [
        'Dr. James Whitney, Oral Surgeon in New Market | Dr. Burns',
        'Oral surgeon Dr. James Whitney offers dental extractions and wisdom teeth removal in Dr. Jeffrey Burns\' New Market, VA office. Mon–Wed 9 AM–3 PM.',
    ];
}

// WordPress skips page-{pagename}.php for child pages (pagename contains slashes).
add_filter( 'page_template_hierarchy', function ( $templates ) {
    $page = get_queried_object();
    if ( $page instanceof WP_Post && 'dr-james-whitney' === $page->post_name ) {
        array_unshift( $templates, 'page-dr-james-whitney.php' );
    }
    return $templates;
} );

// Guard #58, #60, and #61 at template_redirect (priority 1) while Dr. Whitney's page is live.
add_action( 'template_redirect', function () {
    $target = function_exists( 'ds_whitney_url' ) ? ds_whitney_url() : '';
    if ( '' === $target ) {
        return;
    }
    $req_path = strtolower( trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' ) );
    $legacy   = [
        'about-us/whitney-oral-surgery',
        'about-us/whitney-oral-surgery/information',
        'about-us/whitney-oral-surgery/oral-surgery-hours',
    ];
    if ( in_array( $req_path, $legacy, true ) ) {
        wp_safe_redirect( $target, 301 );
        exit;
    }
}, 1 );

/**
 * One-time setup (theme 1.9.2):
 *  1. Seeds Slim SEO title & description on #59 if empty.
 *  2. Drafts #58, #60, and #61 (never trashing, so #59 keeps its parent URL) and
 *     points Slim SEO 301 redirects from them to #59.
 *  3. Trashes an accidental /meet-the-team-2/ duplicate if /meet-the-team/ is live.
 */
add_action( 'init', function () {
    if ( get_option( 'ds_whitney_192_done' ) === '1' ) {
        return;
    }

    $page = get_page_by_path( 'about-us/whitney-oral-surgery/dr-james-whitney' );
    update_option( 'ds_whitney_192_done', '1' );

    if ( $page && 'publish' === $page->post_status ) {
        $meta = get_post_meta( $page->ID, 'slim_seo', true );
        $meta = is_array( $meta ) ? $meta : [];
        [ $title, $description ] = ds_whitney_seo();
        $dirty = false;
        foreach ( [ 'title' => $title, 'description' => $description ] as $field => $value ) {
            if ( empty( $meta[ $field ] ) ) {
                $meta[ $field ] = sanitize_text_field( $value );
                $dirty          = true;
            }
        }
        if ( $dirty ) {
            update_post_meta( $page->ID, 'slim_seo', $meta );
        }

        $siblings = [
            'about-us/whitney-oral-surgery'                    => 'SEO tracker Redirect Map #58 (Medium): consolidated into Dr. Whitney page',
            'about-us/whitney-oral-surgery/information'        => 'SEO tracker Redirect Map #60 (Low): consolidated into Dr. Whitney page',
            'about-us/whitney-oral-surgery/oral-surgery-hours' => 'SEO tracker Redirect Map #61 (Low): consolidated into Dr. Whitney page',
        ];
        foreach ( array_keys( $siblings ) as $path ) {
            $p = get_page_by_path( $path );
            if ( $p && 'publish' === $p->post_status ) {
                wp_update_post( [
                    'ID'          => $p->ID,
                    'post_status' => 'draft',
                ] );
            }
        }

        $opt_name  = defined( 'SLIM_SEO_REDIRECTS' ) ? SLIM_SEO_REDIRECTS : 'ss_redirects';
        $redirects = get_option( $opt_name, [] );
        if ( is_array( $redirects ) ) {
            $target_url = home_url( '/about-us/whitney-oral-surgery/dr-james-whitney/' );
            $found      = [];
            foreach ( $redirects as $k => $r ) {
                if ( ! is_array( $r ) ) {
                    continue;
                }
                $from = strtolower( trim( (string) ( $r['from'] ?? '' ), '/' ) );
                if ( ! isset( $siblings[ $from ] ) ) {
                    continue;
                }
                $found[ $from ]                   = true;
                $redirects[ $k ]['type']             = 301;
                $redirects[ $k ]['condition']        = 'exact-match';
                $redirects[ $k ]['to']               = $target_url;
                $redirects[ $k ]['note']             = $siblings[ $from ];
                $redirects[ $k ]['enable']           = 1;
                $redirects[ $k ]['ignoreParameters'] = 1;
            }
            foreach ( $siblings as $from => $note ) {
                if ( empty( $found[ $from ] ) ) {
                    $redirects[ uniqid() ] = [
                        'type'             => 301,
                        'condition'        => 'exact-match',
                        'from'             => '/' . $from . '/',
                        'to'               => $target_url,
                        'note'             => $note,
                        'enable'           => 1,
                        'ignoreParameters' => 1,
                    ];
                }
            }
            update_option( $opt_name, $redirects );
        }
    }

    $team = get_page_by_path( 'meet-the-team' );
    $dup  = get_page_by_path( 'meet-the-team-2' );
    if ( $team && 'publish' === $team->post_status && $dup && $dup->ID !== $team->ID ) {
        wp_trash_post( $dup->ID );
    }
}, 32 );
