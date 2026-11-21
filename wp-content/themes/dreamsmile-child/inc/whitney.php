<?php
/**
 * Retires the 4 Dr. James Whitney / Whitney Oral Surgery pages (#58–#61):
 * drafts them out of the sitemap and 301-redirects them to /wisdom-teeth-removal/
 * (#58–#60) and /contact/ (#61) per Redirect Map gid=169489043.
 *
 * Also cleans up the accidental /meet-the-team-2/ duplicate if present on staging.
 */
defined( 'ABSPATH' ) || exit;

// Enforce #58–#61 redirects at template_redirect (priority 1).
add_action( 'template_redirect', function () {
    $req_path = strtolower( trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' ) );
    $targets  = [
        'about-us/whitney-oral-surgery'                    => '/wisdom-teeth-removal/',
        'about-us/whitney-oral-surgery/dr-james-whitney'   => '/wisdom-teeth-removal/',
        'about-us/whitney-oral-surgery/information'        => '/wisdom-teeth-removal/',
        'about-us/whitney-oral-surgery/oral-surgery-hours' => '/contact/',
    ];
    if ( isset( $targets[ $req_path ] ) ) {
        wp_safe_redirect( home_url( $targets[ $req_path ] ), 301 );
        exit;
    }
}, 1 );

/**
 * One-time migration (theme 1.9.3):
 *  1. Drafts all 4 Whitney Oral Surgery pages (#58–#61) so they leave the sitemap.
 *  2. Sets Slim SEO 301 redirects for #58–#60 -> /wisdom-teeth-removal/ and #61 -> /contact/.
 *  3. Trashes an accidental /meet-the-team-2/ duplicate if /meet-the-team/ is live.
 */
add_action( 'init', function () {
    if ( get_option( 'ds_whitney_193_done' ) === '1' ) {
        return;
    }

    update_option( 'ds_whitney_193_done', '1' );

    $rules = [
        'about-us/whitney-oral-surgery/dr-james-whitney' => [
            'to'   => '/wisdom-teeth-removal/',
            'note' => 'SEO tracker Redirect Map #59 (Medium)',
        ],
        'about-us/whitney-oral-surgery/information' => [
            'to'   => '/wisdom-teeth-removal/',
            'note' => 'SEO tracker Redirect Map #60 (Low)',
        ],
        'about-us/whitney-oral-surgery/oral-surgery-hours' => [
            'to'   => '/contact/',
            'note' => 'SEO tracker Redirect Map #61 (Low)',
        ],
        'about-us/whitney-oral-surgery' => [
            'to'   => '/wisdom-teeth-removal/',
            'note' => 'SEO tracker Redirect Map #58 (Medium)',
        ],
    ];

    foreach ( array_keys( $rules ) as $path ) {
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
        $found = [];
        foreach ( $redirects as $k => $r ) {
            if ( ! is_array( $r ) ) {
                continue;
            }
            $from = strtolower( trim( (string) ( $r['from'] ?? '' ), '/' ) );
            if ( ! isset( $rules[ $from ] ) ) {
                continue;
            }
            $found[ $from ]                      = true;
            $redirects[ $k ]['type']             = 301;
            $redirects[ $k ]['condition']        = 'exact-match';
            $redirects[ $k ]['to']               = home_url( $rules[ $from ]['to'] );
            $redirects[ $k ]['note']             = $rules[ $from ]['note'];
            $redirects[ $k ]['enable']           = 1;
            $redirects[ $k ]['ignoreParameters'] = 1;
        }
        foreach ( $rules as $from => $cfg ) {
            if ( empty( $found[ $from ] ) ) {
                $redirects[ uniqid() ] = [
                    'type'             => 301,
                    'condition'        => 'exact-match',
                    'from'             => '/' . $from . '/',
                    'to'               => home_url( $cfg['to'] ),
                    'note'             => $cfg['note'],
                    'enable'           => 1,
                    'ignoreParameters' => 1,
                ];
            }
        }
        update_option( $opt_name, $redirects );
    }

    $team = get_page_by_path( 'meet-the-team' );
    $dup  = get_page_by_path( 'meet-the-team-2' );
    if ( $team && 'publish' === $team->post_status && $dup && $dup->ID !== $team->ID ) {
        wp_trash_post( $dup->ID );
    }
}, 32 );
