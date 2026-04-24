<?php
/**
 * Plugin Name: DreamSmile Asset Uploader
 * Description: Admin page to drag-drop theme assets directly into
 *              wp-content/themes/dreamsmile-child/assets/arrange/ — plus a
 *              download button for the preview-deployment bundle zip.
 *
 * Lives in /wordpress/wp-content/mu-plugins/ on the Playground. A copy is kept
 * here in preview/ as the canonical source so it survives a fresh blueprint boot.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'admin_menu', function () {
    add_menu_page(
        'DreamSmile Assets',
        'DreamSmile Assets',
        'manage_options',
        'ds-asset-uploader',
        'ds_asset_uploader_page',
        'dashicons-upload',
        3
    );
} );

function ds_asset_uploader_target_dir() {
    return '/wordpress/wp-content/themes/dreamsmile-child/assets/arrange';
}

function ds_asset_uploader_bundle_zip() {
    return '/wordpress/wp-content/uploads/dreamsmile-bundle/dreamsmile-child.zip';
}

add_action( 'admin_post_ds_upload_assets', function () {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Forbidden' );
    }
    check_admin_referer( 'ds_upload_assets' );

    $target = ds_asset_uploader_target_dir();
    if ( ! is_dir( $target ) ) {
        wp_mkdir_p( $target );
    }

    $count  = 0;
    $errors = [];

    if ( ! empty( $_FILES['ds_assets']['name'] ) && is_array( $_FILES['ds_assets']['name'] ) ) {
        $files = $_FILES['ds_assets'];
        $n = count( $files['name'] );
        for ( $i = 0; $i < $n; $i++ ) {
            if ( $files['error'][ $i ] !== UPLOAD_ERR_OK ) {
                $errors[] = 'Error ' . $files['error'][ $i ] . ' for ' . $files['name'][ $i ];
                continue;
            }
            $safe = sanitize_file_name( $files['name'][ $i ] );
            $dest = $target . '/' . $safe;
            if ( move_uploaded_file( $files['tmp_name'][ $i ], $dest ) ) {
                $count++;
            } else {
                $errors[] = 'Move failed: ' . $safe;
            }
        }
    }

    $url = add_query_arg( [
        'page'   => 'ds-asset-uploader',
        'count'  => $count,
        'errors' => implode( '|', $errors ),
    ], admin_url( 'admin.php' ) );
    wp_safe_redirect( $url );
    exit;
} );

// Rebuild the preview bundle zip on demand.
add_action( 'admin_post_ds_rebuild_bundle', function () {
    if ( ! current_user_can( 'manage_options' ) ) { wp_die( 'Forbidden' ); }
    check_admin_referer( 'ds_rebuild_bundle' );

    $theme = get_stylesheet_directory();
    $out   = ds_asset_uploader_bundle_zip();
    if ( file_exists( $out ) ) { unlink( $out ); }
    wp_mkdir_p( dirname( $out ) );

    $zip = new ZipArchive();
    $zip->open( $out, ZipArchive::CREATE );
    $base = strlen( dirname( $theme ) ) + 1;
    $count = 0;
    foreach ( new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $theme, RecursiveDirectoryIterator::SKIP_DOTS ) ) as $f ) {
        if ( $f->isFile() ) {
            $zip->addFile( $f->getPathname(), substr( $f->getPathname(), $base ) );
            $count++;
        }
    }
    $zip->close();

    $url = add_query_arg( [
        'page'      => 'ds-asset-uploader',
        'rebuilt'   => 1,
        'zip_files' => $count,
        'zip_bytes' => filesize( $out ),
    ], admin_url( 'admin.php' ) );
    wp_safe_redirect( $url );
    exit;
} );

// Stream the preview bundle zip as a direct download.
add_action( 'admin_post_ds_download_bundle', function () {
    if ( ! current_user_can( 'manage_options' ) ) { wp_die( 'Forbidden' ); }
    check_admin_referer( 'ds_download_bundle' );

    $zip = ds_asset_uploader_bundle_zip();
    if ( ! file_exists( $zip ) ) {
        wp_die( 'Bundle zip not found. Click "Rebuild bundle" first.' );
    }

    nocache_headers();
    header( 'Content-Type: application/zip' );
    header( 'Content-Disposition: attachment; filename="dreamsmile-child.zip"' );
    header( 'Content-Length: ' . filesize( $zip ) );
    header( 'X-Content-Type-Options: nosniff' );

    readfile( $zip );
    exit;
} );

function ds_asset_uploader_page() {
    $target = ds_asset_uploader_target_dir();
    $exists = is_dir( $target );
    $files  = $exists ? array_values( array_diff( scandir( $target ), [ '.', '..' ] ) ) : [];

    $zip_path    = ds_asset_uploader_bundle_zip();
    $zip_exists  = file_exists( $zip_path );
    $zip_size    = $zip_exists ? size_format( filesize( $zip_path ) ) : '—';

    $count       = isset( $_GET['count'] ) ? (int) $_GET['count'] : 0;
    $err_list    = isset( $_GET['errors'] ) && $_GET['errors'] ? explode( '|', wp_unslash( $_GET['errors'] ) ) : [];
    $rebuilt     = ! empty( $_GET['rebuilt'] );
    $zip_files   = isset( $_GET['zip_files'] ) ? (int) $_GET['zip_files'] : 0;
    ?>
    <div class="wrap">
        <h1>DreamSmile Assets</h1>

        <?php if ( $count ) : ?>
            <div class="notice notice-success is-dismissible"><p><?php echo (int) $count; ?> file(s) uploaded.</p></div>
        <?php endif; ?>
        <?php foreach ( $err_list as $e ) : ?>
            <div class="notice notice-error is-dismissible"><p><?php echo esc_html( $e ); ?></p></div>
        <?php endforeach; ?>
        <?php if ( $rebuilt ) : ?>
            <div class="notice notice-success is-dismissible"><p>Bundle rebuilt with <?php echo (int) $zip_files; ?> files.</p></div>
        <?php endif; ?>

        <h2>Upload theme assets</h2>
        <p>Target: <code><?php echo esc_html( $target ); ?></code></p>

        <form method="post" enctype="multipart/form-data" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" style="background:#fff;padding:24px;border:1px solid #ccd0d4;max-width:860px;">
            <input type="hidden" name="action" value="ds_upload_assets">
            <?php wp_nonce_field( 'ds_upload_assets' ); ?>

            <p style="font-size:14px;">
                <strong>Instructions:</strong> Click the field below or drag-drop files. Images and videos both supported.
            </p>

            <input
                type="file"
                name="ds_assets[]"
                multiple
                accept=".png,.jpg,.jpeg,.webp,.svg,.avif,.gif,.mp4,.mov,.webm,.m4v"
                style="display:block;width:100%;padding:40px;border:2px dashed #7FB5B0;background:#fafcfc;font-size:16px;cursor:pointer;"
                required
            />

            <p style="margin-top:12px;font-size:12.5px;color:#6b6b6b;">
                Accepts images (<code>.png .jpg .jpeg .webp .svg .avif .gif</code>)
                and videos (<code>.mp4 .mov .webm .m4v</code>).
                <br>Heads-up: <code>.mov</code> won't play in Chrome/Firefox.
                Convert to <code>.mp4</code> (H.264) for web playback.
            </p>

            <p style="margin-top:16px;">
                <button type="submit" class="button button-primary button-hero">Upload to arrange/</button>
            </p>
        </form>

        <h2 style="margin-top:40px;">Preview bundle (for v2 GitHub release)</h2>
        <p>
            Bundle path: <code><?php echo esc_html( $zip_path ); ?></code><br>
            Status: <strong><?php echo $zip_exists ? 'exists · ' . esc_html( $zip_size ) : 'not built yet'; ?></strong>
        </p>

        <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:8px;">
            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <input type="hidden" name="action" value="ds_rebuild_bundle">
                <?php wp_nonce_field( 'ds_rebuild_bundle' ); ?>
                <button type="submit" class="button">Rebuild bundle</button>
            </form>

            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <input type="hidden" name="action" value="ds_download_bundle">
                <?php wp_nonce_field( 'ds_download_bundle' ); ?>
                <button type="submit" class="button button-primary" <?php disabled( ! $zip_exists ); ?>>
                    Download dreamsmile-child.zip
                </button>
            </form>
        </div>

        <h2 style="margin-top:40px;">Currently in arrange/</h2>
        <?php if ( $exists && $files ) : ?>
            <ol>
                <?php foreach ( $files as $f ) :
                    $fpath = $target . '/' . $f;
                    $size  = is_file( $fpath ) ? size_format( filesize( $fpath ) ) : '—'; ?>
                    <li><code><?php echo esc_html( $f ); ?></code> &mdash; <?php echo esc_html( $size ); ?></li>
                <?php endforeach; ?>
            </ol>
            <p><strong>Total: <?php echo count( $files ); ?> file(s)</strong></p>
        <?php else : ?>
            <p><em>No files yet.</em></p>
        <?php endif; ?>

        <p style="margin-top:30px;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button" target="_top">View front page &rarr;</a>
        </p>
    </div>
    <?php
}
