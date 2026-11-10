<?php
/**
 * Point old internal links in posts and pages straight at their new address.
 *
 * Nov 2026 SEO recheck, Links tab row 22: 47 blog posts still had about 97 links
 * to the old site's addresses (/contact-us/, /restorative-dentistry/dental-implants/,
 * /preventative-care/... ). Each one works through a Slim SEO 301, but costs a
 * redirect hop. This rewrites every such link to where its redirect lands, so
 * readers and Google go there directly.
 *
 * The redirects themselves are the source: Slim SEO's own list (Slim SEO →
 * Redirects), matched the way Slim SEO matches a request and followed through
 * chains to the last stop. Nothing is hard-coded here, so it stays right when
 * the SEO team edits that list.
 *
 * Run it logged in as an administrator:
 *   /wp-admin/?ds_fix_post_links=1   preview of every link that would change,
 *                                    with an "Apply" button that does it.
 *
 * Only the address inside href="..." changes. Link text and everything else
 * stays as it is, a relative link stays relative and a #section part is kept.
 * Each changed post is saved normally, so its Revisions screen can put it back.
 * Links already at their new address are left alone, so it is safe to run
 * again (after the town-page text is restored, say). A link is also left alone,
 * and listed, when its redirect ends at a 410, loops, or lands on an address
 * with no published page.
 */
defined( 'ABSPATH' ) || exit;

/** Slim SEO's home URL, through the same filter Slim SEO's redirects use. */
function ds_post_links_home( $path = '' ) {
    return (string) apply_filters( 'slim_seo_redirection_home_url', home_url( $path ), $path );
}

/** Same test as Slim SEO's Helper::url_valid(). */
function ds_post_links_url_valid( $url ) {
    return filter_var( $url, FILTER_VALIDATE_URL ) || 0 === strpos( $url, 'http://' ) || 0 === strpos( $url, 'https://' );
}

/** Same as Slim SEO's Helper::normalize_url( $url, false ): home stripped, slashes trimmed. */
function ds_post_links_normalize( $url ) {
    $url = (string) $url;
    if ( ds_post_links_url_valid( $url ) ) {
        $url = sanitize_url( $url );
    }
    $url = html_entity_decode( $url, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8' );
    $url = str_replace( ds_post_links_home(), '', $url );
    $url = trim( $url, '/' );
    return '' === $url ? '/' : $url;
}

/** Slim SEO's enabled redirect rules, in the order Slim SEO checks them. */
function ds_post_links_rules() {
    $rules = get_option( 'ss_redirects' );
    if ( ! is_array( $rules ) ) {
        return [];
    }
    return array_values( array_filter( $rules, function ( $r ) {
        return is_array( $r ) && ! empty( $r['enable'] ) && isset( $r['from'], $r['to'] );
    } ) );
}

/**
 * The first rule that matches a normalized request URL, as Slim SEO's
 * Redirection::redirect() decides it.
 *
 * @return array{to:string,type:int}|null
 */
function ds_post_links_match( $request, array $rules ) {
    foreach ( $rules as $r ) {
        $current = $request;
        if ( ! empty( $r['ignoreParameters'] ) ) {
            $parts   = explode( '?', $current );
            $current = rtrim( $parts[0], '/' );
        }
        $from = ds_post_links_normalize( $r['from'] );
        $to   = (string) $r['to'];
        $hit  = false;

        switch ( $r['condition'] ?? '' ) {
            case 'regex':
                $pattern = '/' . str_replace( '/', '\/', str_replace( '\/', '/', $from ) ) . '/i';
                if ( @preg_match( $pattern, $current ) ) { // phpcs:ignore -- a broken pattern simply never matches.
                    $to  = (string) preg_replace( $pattern, $to, $current );
                    $hit = true;
                }
                break;
            case 'contain':
                $hit = false !== stripos( $current, $from );
                break;
            case 'start-with':
                $hit = 0 === stripos( $current, $from );
                break;
            case 'end-with':
                $hit = ( strlen( $current ) - strlen( $from ) ) === stripos( $current, $from );
                break;
            default:
                $hit = $current === $from;
        }

        if ( $hit ) {
            return [ 'to' => $to, 'type' => (int) ( $r['type'] ?? 301 ) ];
        }
    }
    return null;
}

/** Whether a URL is on this site (either with or without www). */
function ds_post_links_is_internal( $url ) {
    $host = wp_parse_url( $url, PHP_URL_HOST );
    if ( ! $host ) {
        return false;
    }
    $site = wp_parse_url( home_url(), PHP_URL_HOST );
    $bare = function ( $h ) {
        return preg_replace( '/^www\./i', '', strtolower( (string) $h ) );
    };
    return $bare( $host ) === $bare( $site );
}

/**
 * Where a visitor following an internal address ends up after every redirect.
 *
 * @param string $path_query Decoded path plus "?query" if any, e.g. "/contact-us/".
 * @return array{url?:string,error?:string,hops:int}
 */
function ds_post_links_resolve( $path_query, array $rules ) {
    static $cache = [];
    if ( isset( $cache[ $path_query ] ) ) {
        return $cache[ $path_query ];
    }

    $url  = ds_post_links_home( $path_query );
    $seen = [];
    $hops = 0;
    $out  = null;

    while ( null === $out ) {
        $key = ds_post_links_normalize( $url );
        if ( isset( $seen[ $key ] ) ) {
            $out = [ 'error' => 'its redirects go round in a loop', 'hops' => $hops ];
            break;
        }
        $seen[ $key ] = true;

        $match = ds_post_links_match( $key, $rules );
        if ( ! $match ) {
            $out = [ 'url' => $url, 'hops' => $hops ];
            break;
        }
        if ( 410 === $match['type'] ) {
            $out = [ 'error' => 'its redirect marks the page as gone (410)', 'hops' => $hops ];
            break;
        }

        $url = ds_post_links_url_valid( $match['to'] ) ? $match['to'] : ds_post_links_home( $match['to'] );
        $hops++;

        if ( ! ds_post_links_is_internal( $url ) ) {
            $out = [ 'url' => $url, 'hops' => $hops ];
        } elseif ( $hops >= 10 ) {
            $out = [ 'error' => 'it goes through more than 10 redirects', 'hops' => $hops ];
        }
    }

    return $cache[ $path_query ] = $out;
}

/**
 * The address to write in place of an old internal link, or a reason to leave it.
 *
 * @return array{new?:string,skip?:string}|null null when the link needs nothing.
 */
function ds_post_links_new_href( $href, array $rules ) {
    $raw = trim( html_entity_decode( $href, ENT_QUOTES | ENT_HTML5, 'UTF-8' ) );
    if ( '' === $raw || preg_match( '/^(#|mailto:|tel:|sms:|javascript:|data:)/i', $raw ) ) {
        return null;
    }

    $parts = wp_parse_url( $raw );
    if ( false === $parts ) {
        return null;
    }

    $relative = ! isset( $parts['host'] );
    if ( $relative ) {
        // Only root-relative links ("/contact-us/"); "page.html" or "../x" are left alone.
        if ( 0 !== strpos( $raw, '/' ) || 0 === strpos( $raw, '//' ) ) {
            return null;
        }
    } elseif ( ! ds_post_links_is_internal( $raw ) || ( isset( $parts['scheme'] ) && ! in_array( strtolower( $parts['scheme'] ), [ 'http', 'https' ], true ) ) ) {
        return null;
    }

    $path = $parts['path'] ?? '/';
    if ( preg_match( '#^/wp-(content|admin|includes)/#i', $path ) ) {
        return null;
    }

    $path_query = rawurldecode( $path . ( isset( $parts['query'] ) ? '?' . $parts['query'] : '' ) );
    $resolved   = ds_post_links_resolve( $path_query, $rules );
    if ( isset( $resolved['error'] ) ) {
        return [ 'skip' => 'Left alone: ' . $resolved['error'] . '.' ]; // A 410 hits with no hop at all.
    }
    if ( 0 === $resolved['hops'] ) {
        return null; // Not redirected: already a current address.
    }

    $target = $resolved['url'];
    if ( ds_post_links_is_internal( $target ) ) {
        // Write the page's own address, so no trailing-slash or http hop is left.
        $front = untrailingslashit( ds_post_links_home() );
        $id    = untrailingslashit( $target ) === $front ? -1 : url_to_postid( $target );
        if ( -1 === $id ) {
            $target = home_url( '/' );
        } elseif ( $id && 'publish' === get_post_status( $id ) ) {
            $target = get_permalink( $id );
        } else {
            return [ 'skip' => 'Left alone: its redirect lands on ' . wp_make_link_relative( $target ) . ', which has no published page.' ];
        }
        // Page links on staging came out http:// (Nov 2026); never write that back in.
        $target = set_url_scheme( $target, (string) wp_parse_url( home_url(), PHP_URL_SCHEME ) );
        if ( $relative ) {
            $target = wp_make_link_relative( $target );
        }
    }

    if ( isset( $parts['fragment'] ) && false === strpos( $target, '#' ) ) {
        $target .= '#' . $parts['fragment'];
    }

    return $target === $raw ? null : [ 'new' => $target ];
}

/**
 * Every link change one post's content needs.
 *
 * @return array{content:string,changes:array<int,array{0:string,1:string}>,skips:array<int,array{0:string,1:string}>}
 */
function ds_post_links_scan( $content, array $rules ) {
    $changes = [];
    $skips   = [];
    $content = preg_replace_callback(
        '/(\bhref\s*=\s*)(["\'])(.*?)\2/is',
        function ( $m ) use ( $rules, &$changes, &$skips ) {
            $result = ds_post_links_new_href( $m[3], $rules );
            if ( ! $result ) {
                return $m[0];
            }
            if ( isset( $result['skip'] ) ) {
                $skips[] = [ $m[3], $result['skip'] ];
                return $m[0];
            }
            $changes[] = [ $m[3], $result['new'] ];
            return $m[1] . $m[2] . esc_url( $result['new'] ) . $m[2];
        },
        (string) $content
    );
    return [ 'content' => $content, 'changes' => $changes, 'skips' => $skips ];
}

add_action( 'admin_init', function () {
    if ( ! isset( $_GET['ds_fix_post_links'] ) ) {
        return;
    }
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'Administrator access required.', 'dreamsmile-child' ), 403 );
    }
    if ( ! defined( 'SLIM_SEO_VER' ) ) {
        wp_die( esc_html__( 'Slim SEO is not active on this site, so there are no redirects to follow.', 'dreamsmile-child' ) );
    }

    $apply = isset( $_GET['apply'] ) && check_admin_referer( 'ds_fix_post_links' );
    $rules = ds_post_links_rules();

    $posts = get_posts( [
        'post_type'        => [ 'post', 'page' ],
        'post_status'      => [ 'publish', 'future', 'draft', 'pending', 'private' ],
        'posts_per_page'   => -1,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'no_found_rows'    => true,
        'suppress_filters' => true,
    ] );

    $rows    = [];
    $links   = 0;
    $saved   = 0;
    $failed  = 0;
    $skipped = 0;

    foreach ( $posts as $post ) {
        if ( false === stripos( $post->post_content, 'href' ) ) {
            continue;
        }
        $scan = ds_post_links_scan( $post->post_content, $rules );
        if ( ! $scan['changes'] && ! $scan['skips'] ) {
            continue;
        }

        $status = '';
        if ( $scan['changes'] ) {
            $links += count( $scan['changes'] );
            if ( $apply ) {
                // Only hrefs change, so don't let kses re-filter markup that is already saved.
                $kses = (bool) has_filter( 'content_save_pre', 'wp_filter_post_kses' );
                if ( $kses ) {
                    kses_remove_filters();
                }
                $result = wp_update_post( wp_slash( [ 'ID' => $post->ID, 'post_content' => $scan['content'] ] ), true );
                if ( $kses ) {
                    kses_init_filters();
                }
                if ( is_wp_error( $result ) ) {
                    $failed++;
                    $status = 'Not saved: ' . $result->get_error_message();
                } else {
                    $saved++;
                    $status = 'Changed';
                }
            } else {
                $status = 'Will change';
            }
        }
        $skipped += count( $scan['skips'] );

        $rows[] = [
            'post'    => $post,
            'status'  => $status,
            'changes' => $scan['changes'],
            'skips'   => $scan['skips'],
        ];
    }

    $posts_with_changes = count( array_filter( $rows, function ( $r ) {
        return (bool) $r['changes'];
    } ) );

    ob_start();
    ?>
    <h1>Old links in posts and pages</h1>
    <p>
      Follows Slim SEO's <?php echo (int) count( $rules ); ?> active redirects and points each old link
      straight at where its redirect lands. Only the link address changes.
    </p>
    <p>
      <?php if ( $apply ) : ?>
        <strong>Done.</strong> Changed <?php echo (int) $links; ?> link(s) in <?php echo (int) $saved; ?> post(s) and page(s).
        <?php if ( $failed ) : ?><strong><?php echo (int) $failed; ?> could not be saved, see below.</strong><?php endif; ?>
        Each changed post's Revisions screen can put it back.
      <?php elseif ( $links ) : ?>
        <strong>Preview only</strong>: nothing has been changed yet.
        <?php echo (int) $links; ?> link(s) in <?php echo (int) $posts_with_changes; ?> post(s) and page(s) will change.
        <a class="button button-primary" href="<?php echo esc_url( wp_nonce_url( admin_url( '?ds_fix_post_links=1&apply=1' ), 'ds_fix_post_links' ) ); ?>">Apply</a>
      <?php else : ?>
        Nothing to change: every internal link already points at its current address.
      <?php endif; ?>
      <?php if ( $skipped ) : ?>
        <br><?php echo (int) $skipped; ?> link(s) are left alone and need a look by hand (reasons below).
      <?php endif; ?>
    </p>
    <?php if ( $rows ) : ?>
    <table class="widefat striped">
      <thead><tr><th>Post or page</th><th>Old link</th><th>New link</th></tr></thead>
      <tbody>
      <?php foreach ( $rows as $r ) : ?>
        <?php
        $title = get_the_title( $r['post'] );
        $title = '' === $title ? '(no title)' : $title;
        $first = true;
        $lines = array_merge(
            array_map( function ( $c ) { return [ $c[0], $c[1], '' ]; }, $r['changes'] ),
            array_map( function ( $s ) { return [ $s[0], '', $s[1] ]; }, $r['skips'] )
        );
        foreach ( $lines as $line ) :
            ?>
          <tr>
            <td>
              <?php if ( $first ) : ?>
                <a href="<?php echo esc_url( (string) get_edit_post_link( $r['post']->ID, 'url' ) ); ?>"><?php echo esc_html( $title ); ?></a>
                <br><small><?php echo esc_html( $r['post']->post_type . ', ' . $r['post']->post_status . ( $r['status'] ? ' — ' . $r['status'] : '' ) ); ?></small>
              <?php endif; ?>
            </td>
            <td><code><?php echo esc_html( html_entity_decode( $line[0], ENT_QUOTES | ENT_HTML5, 'UTF-8' ) ); ?></code></td>
            <td><?php echo '' !== $line[1] ? '<code>' . esc_html( $line[1] ) . '</code>' : esc_html( $line[2] ); ?></td>
          </tr>
            <?php
            $first = false;
        endforeach;
        ?>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
    <?php
    wp_die( ob_get_clean(), esc_html__( 'Old links in posts and pages', 'dreamsmile-child' ), [ 'response' => 200 ] );
} );
