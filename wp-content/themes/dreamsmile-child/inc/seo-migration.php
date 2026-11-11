<?php
/**
 * One-time hand-off of page titles and meta descriptions to Slim SEO.
 *
 * Until 2026-10 the theme hard-coded a title and description for every page
 * it built and printed them itself, alongside Slim SEO's own. The SEO team
 * asked for Slim SEO to be the only source (tracker R7) and to own the text so
 * they can edit it in wp-admin. This copies the text across once. After that,
 * Slim SEO is where titles and descriptions are edited; nothing here is read
 * on the front end.
 *
 * Run it logged in as an administrator:
 *   /wp-admin/?ds_seed_slim_seo=1   preview of what would be written, with an
 *                                   "Apply" button that does the writing.
 *
 * It only ever fills a Slim SEO title or description that is EMPTY. Anything
 * already typed into Slim SEO is left exactly as it is, so it is safe to run
 * more than once. Pages that do not exist on the site are listed and skipped.
 *
 * The text was rewritten from the theme's old copy to the tracker's limits
 * (titles at most 60 characters, descriptions at most 155, ending
 * " | Dr. Jeffrey Burns"). The second group is the tracker's own suggested
 * text from its Metadata Issues tab, verbatim. The 8 /contact-us/ town pages
 * are deliberately absent: the SEO team is finalising their text by hand.
 */
defined( 'ABSPATH' ) || exit;

/**
 * @return array<string,array{0:string,1:string}> path => [ title, description ]. '' leaves that field alone.
 */
function ds_slim_seo_seed() {
    return [
        // Pages the theme builds — the theme's old titles/descriptions, trimmed.
        '/' => [ 'DreamSmile Dental Implants in New Market, VA | Dr. Burns', 'Dental implants in New Market, VA with Dr. Jeffrey Burns. Full-arch All-on-4, IV sedation, and 3D-guided care, all under one roof. Free assessment.' ],
        '/dental-implants/' => [ 'Dental Implants in New Market, VA | Dr. Jeffrey Burns', 'Permanent dental implants placed personally by Dr. Jeffrey Burns in New Market, VA, a short drive from Harrisonburg and Winchester. Free assessment.' ],
        '/implant-cost/' => [ 'Dental Implant Cost & Financing | Dr. Jeffrey Burns', 'Clear, all-inclusive dental implant pricing in New Market, VA. No hidden fees, plus flexible financing for single, multi-tooth, and full-arch implants.' ],
        '/implant-procedures/' => [ 'Dental Implant Procedures Explained | Dr. Jeffrey Burns', 'Every step of the dental implant process, from assessment and 3D planning to placement and your final teeth, with the 6-step Burns Protocol.' ],
        '/implant-faqs/' => [ 'Dental Implant FAQs | Dr. Jeffrey Burns', 'Answers to common dental implant questions on pain, recovery, longevity, cost, and candidacy, from Dr. Burns and his 30+ years of implant experience.' ],
        '/locations/' => [ 'Areas We Serve in the Shenandoah Valley | Dr. Jeffrey Burns', 'One office in New Market, VA, serving patients from Harrisonburg, Winchester, Woodstock, Luray, and across the Shenandoah Valley. Free assessment.' ],
        '/new-patients/' => [ 'New Patient Information | Dr. Jeffrey Burns', 'Getting started with Dr. Jeffrey Burns in New Market, VA: your free assessment, new patient forms, and what to expect at your first visit.' ],
        '/contact/' => [ 'Contact Our New Market, VA Office | Dr. Jeffrey Burns', 'Visit Dr. Burns at 9626 South Congress St, New Market, VA. Call (540) 740-8937 or book a free assessment. Office hours Mon–Thu, 8 AM to 3 PM.' ],
        '/general-dentistry/' => [ 'General Dentistry in New Market, VA | Dr. Jeffrey Burns', 'General dentistry from Dr. Jeffrey Burns in New Market, VA: crowns, bridges, extractions, root canals, dentures, and more, all in one office.' ],
        '/cosmetic-dentistry/' => [ 'Cosmetic Dentistry in New Market, VA | Dr. Jeffrey Burns', 'Cosmetic dentistry from an AACD award-winning dentist: porcelain veneers, teeth whitening, and clear aligners designed around the smile you want.' ],
        '/meet-dr-burns/' => [ 'Meet Dr. Jeffrey Burns, DDS | Dental Implant Expert', '30+ years placing dental implants, AACD award recipient, and creator of the Burns Protocol. Every implant patient gets his personal cell number.' ],
        '/restorative-care/' => [ 'Restorative Dentistry in New Market, VA | Dr. Jeffrey Burns', 'Fillings, crowns, bridges, root canals, extractions, and implants, every restorative option planned and performed by the same doctor in New Market, VA.' ],
        '/gum-disease/' => [ 'Gum Disease Treatment in New Market, VA | Dr. Jeffrey Burns', 'Catch gum disease early and stay ahead of it. Deep teeth cleaning and periodontal maintenance at Dr. Jeffrey Burns\'s New Market, VA office.' ],
        '/resources/' => [ 'Patient Resources | Dr. Jeffrey Burns', 'New patient forms, financing and insurance, online bill pay, and patient education articles from Dr. Jeffrey Burns\'s office in New Market, VA.' ],
        '/patient-education/' => [ 'Patient Education | Dr. Jeffrey Burns', 'Plain-English articles on dental procedures, recovery, and what to expect, reviewed by Dr. Jeffrey Burns\'s office in New Market, VA.' ],
        '/financing/' => [ 'Financing & Insurance | Dr. Jeffrey Burns', 'Most major insurance accepted, plus flexible financing through Cherry, CareCredit, and Sunbit. Turnkey pricing with no surprise bills. New Market, VA.' ],
        '/make-a-payment/' => [ 'Make a Payment | Dr. Jeffrey Burns, New Market, VA', 'Pay your dental bill online quickly and securely. Use our secure payment link or scan the QR code with your phone to pay Dr. Jeffrey Burns DDS.' ],
        '/single-dental-implants/' => [ 'Single Dental Implants in New Market, VA | Dr. Jeffrey Burns', 'Replace one missing tooth with a permanent dental implant that looks and works like your own, placed personally by Dr. Burns. Free assessment.' ],
        '/implant-supported-bridges/' => [ 'Implant-Supported Bridges | Dr. Jeffrey Burns', 'Replace several missing teeth in a row without grinding down healthy ones. Fixed implant bridges by Dr. Burns in New Market, VA. Free assessment.' ],
        '/how-dental-implants-work/' => [ 'How Dental Implants Work | Dr. Jeffrey Burns', 'A plain-English guide to how dental implants work, why they last, and how Dr. Burns makes the procedure predictable. Free assessment in New Market, VA.' ],
        '/full-mouth-dental-implants/' => [ 'Full Mouth Implants & Teeth in a Day | Dr. Jeffrey Burns', 'All-on-4 full-arch implants and Teeth-in-a-Day for patients from Harrisonburg, Winchester, and the Shenandoah Valley. Placed by Dr. Burns in New Market.' ],
        '/implant-supported-dentures/' => [ 'Implant-Supported Dentures | Dr. Jeffrey Burns', 'Snap-in implant-supported dentures end slipping, sore spots, and adhesive. Anchored to 2–4 implants. Free assessment with Dr. Burns in New Market, VA.' ],
        '/dental-bridges/' => [ 'Dental Bridges in New Market, VA | Dr. Jeffrey Burns', 'Traditional and implant-supported dental bridges in New Market, VA, with an honest comparison of both and a recommendation for your case.' ],
        '/tooth-extraction/' => [ 'Tooth Extraction in New Market, VA | Dr. Jeffrey Burns', 'Comfortable tooth extractions with an on-staff anesthesiologist, and implant-ready extraction sites whenever possible. Free assessment in New Market.' ],
        '/bone-grafting/' => [ 'Bone Grafting for Implants | Dr. Jeffrey Burns', 'Bone grafting rebuilds the jawbone after tooth loss and can open up implant options ruled out elsewhere. Free assessment with Dr. Burns, New Market, VA.' ],
        '/full-dentures/' => [ 'Full Dentures in New Market, VA | Dr. Jeffrey Burns', 'Comfortable, well-fitted full dentures, with the option to upgrade to implant-stabilized dentures that do not slip. Free assessment in New Market, VA.' ],
        '/partial-dentures/' => [ 'Partial Dentures in New Market, VA | Dr. Jeffrey Burns', 'Discreet, well-fitted partial dentures that fill the gaps without compromising your healthy teeth. Free assessment with Dr. Burns in New Market, VA.' ],
        '/pediatric-dentistry/' => [ 'Pediatric Dentistry in New Market, VA | Dr. Jeffrey Burns', 'Warm, gentle dental care for kids in New Market and the Shenandoah Valley: cavity prevention, sealants, exams, and friendly first visits.' ],
        '/dental-crowns/' => [ 'Same-Day Dental Crowns in New Market, VA | Dr. Jeffrey Burns', 'Same-day CEREC crowns designed, milled, and placed in one visit, plus custom porcelain crowns. A short drive from Harrisonburg, in New Market, VA.' ],
        '/root-canal/' => [ 'Root Canal Therapy in New Market, VA | Dr. Jeffrey Burns', 'Modern, virtually painless root canal therapy that saves the tooth and ends the pain. Free assessment with Dr. Burns in New Market, VA.' ],
        '/wisdom-teeth-removal/' => [ 'Wisdom Teeth Removal in New Market, VA | Dr. Jeffrey Burns', 'Carefully planned wisdom teeth removal with an on-staff anesthesiologist and a recovery plan that fits your week. Free assessment in New Market, VA.' ],
        '/porcelain-veneers/' => [ 'Porcelain Veneers in New Market, VA | Dr. Jeffrey Burns', 'Custom porcelain veneers from an AACD award-winning dentist. Reshape, brighten, and rebuild your smile in a few visits. Free assessment in New Market.' ],
        '/teeth-whitening/' => [ 'Teeth Whitening in New Market, VA | Dr. Jeffrey Burns', 'In-office and take-home teeth whitening tailored to your enamel: safer, brighter, and gentler on sensitive teeth than store kits. New Market, VA.' ],
        '/clear-braces/' => [ 'Clear Braces & Aligners | Dr. Jeffrey Burns', 'Discreet clear aligners for crooked teeth, gaps, or bite issues, planned and supervised by Dr. Burns. Free assessment in New Market, VA.' ],
        '/anesthesia/' => [ 'Sedation Dentistry in New Market, VA | Dr. Jeffrey Burns', 'Local numbing, nitrous oxide, oral sedation, and IV sedation, with a board-certified physician anesthesiologist on staff. New Market, VA.' ],
        '/dental-exams/' => [ 'Dental Exams & Check-Ups | Dr. Jeffrey Burns', 'Thorough dental exams in New Market, VA: oral cancer screening, bite analysis, gum health, and a real conversation about what we see.' ],
        '/oral-hygiene/' => [ 'Oral Hygiene Tips | Dr. Jeffrey Burns', 'Practical, personalized oral hygiene coaching: the daily habits that prevent cavities, gum disease, and bigger problems. New Market, VA.' ],
        '/teeth-cleaning/' => [ 'Teeth Cleaning in New Market, VA | Dr. Jeffrey Burns', 'Routine professional teeth cleanings in New Market, VA that remove the plaque and tartar brushing cannot reach. Schedule your cleaning today.' ],
        '/dental-sealants/' => [ 'Dental Sealants in New Market, VA | Dr. Jeffrey Burns', 'Dental sealants prevent cavities in the deep grooves of molars, especially for kids and teens. Painless, fast, and highly effective. New Market, VA.' ],
        '/deep-teeth-cleaning/' => [ 'Deep Teeth Cleaning in New Market, VA | Dr. Jeffrey Burns', 'Deep cleaning (scaling and root planing) for early gum disease, the right step when a routine cleaning is not enough. Free assessment in New Market, VA.' ],
        '/periodontal-maintenance/' => [ 'Periodontal Maintenance | Dr. Jeffrey Burns', 'Periodontal maintenance cleanings every 3–4 months for patients who have had gum disease: the long-term plan to stay healthy. New Market, VA.' ],
        '/dental-fillings/' => [ 'Tooth-Colored Fillings in New Market, VA | Dr. Jeffrey Burns', 'Modern tooth-colored composite fillings that match your natural enamel, so there are no silver flashes when you laugh. Free assessment in New Market.' ],

        // The SEO tracker's Metadata Issues tab, verbatim (blog posts, /blog/, /disclaimer/).
        '/confidentdreamsmile/' => [ 'DreamSmile Transformation: From Self-Conscious to Confident', '' ],
        '/implant-tooth/' => [ 'Dental Implant vs. Natural Tooth: Key Differences', '' ],
        '/dreamsmilewalloffame/' => [ 'DreamSmile Wall of Fame | Dr. Jeffrey Burns', '' ],
        '/when-temporary-looks-this-good-inside-a-dreamsmile-transformation/' => [ 'Temporary Teeth in a DreamSmile Transformation', '' ],
        '/what-makes-a-dreamsmile-commercial-so-powerful/' => [ 'What Makes a DreamSmile Commercial So Powerful?', '' ],
        '/take-a-tour-of-our-dental-office-home-of-the-dreamsmile/' => [ 'Tour Our New Market Dental Office | Dr. Jeffrey Burns', '' ],
        '/implant-supported-bridges-or-dentures-which-is-right-for-your-dreamsmile/' => [ 'Implant Bridges vs. Implant Dentures: Which Is Right?', '' ],
        '/its-more-than-just-a-dental-chair/' => [ 'More Than a Dental Chair | Dr. Jeffrey Burns', '' ],
        '/patient-testimonial-a-life-changing-full-mouth-restoration-with-crowns/' => [ 'Full Mouth Restoration With Crowns: A Patient Story', '' ],
        '/what-is-a-dreamsmile/' => [ 'What Is a DreamSmile? | Dr. Jeffrey Burns', '' ],
        '/implantsandgumdisease/' => [ 'Can You Get Dental Implants With Gum Disease?', '' ],
        '/told-you-dont-have-enough-bone-for-dental-implants-you-can-still-get-your-dreamsmile-with-zygomatic-implants/' => [ 'Not Enough Bone for Implants? Zygomatic Implants Can Help', '' ],
        '/areyouthinkingaboutdentalimplants/' => [ 'Are Dental Implants Worth It? | Dr. Jeffrey Burns', '' ],
        '/theburnsprotocol/' => [ 'The Burns Protocol for Dental Implants | Dr. Burns', '' ],
        '/blog/' => [ 'Dental Implant & Oral Health Blog | Dr. Jeffrey Burns', 'Tips and answers on dental implants, cosmetic care, and oral health from Dr. Jeffrey Burns in New Market, VA.' ],
        '/disclaimer/' => [ 'Website Disclaimer | Dr. Jeffrey Burns', '' ],
        '/privacy-policy/' => [ 'Privacy Policy | Dr. Jeffrey Burns', 'Privacy Policy for the dental practice of Dr. Jeffrey Burns DDS in New Market, VA. How we handle patient inquiries, scheduling, and information.' ],

        // The SEO tracker's Area Pages tab (Rows 7–14), verbatim headlines and blurbs.
        '/contact-us/dental-implants-harrisonburg-area/' => [ 'Dental Implants Near Harrisonburg, VA | Dr. Jeffrey Burns', 'Full-arch implants and Teeth in a Day for Harrisonburg patients from Dr. Jeffrey Burns, 25 minutes north in New Market. Call 540-740-8937.' ],
        '/contact-us/winchester-dentist-dental-implants/' => [ 'Dental Implants Near Winchester, VA | Dr. Jeffrey Burns', "Winchester patients drive to New Market for Dr. Jeffrey Burns' DreamSmile implants: fewer visits and up to lifetime warranty coverage. Call 540-740-8937." ],
        '/contact-us/cosmetic-dentist-elkton-area/' => [ 'Dental Implants Near Elkton, VA | Dr. Jeffrey Burns', 'Failing or broken tooth? Elkton patients get extractions, bone grafting, and dental implants with Dr. Jeffrey Burns in New Market. Call 540-740-8937.' ],
        '/contact-us/dental-implants-dentist-near-bridgewater/' => [ 'Dental Implants Near Bridgewater, VA | Dr. Jeffrey Burns', 'Bridgewater patients: see what affects dental implant cost, what insurance covers, and financing options with Dr. Jeffrey Burns. Call 540-740-8937.' ],
        '/contact-us/dentist-near-woodstock-cosmetic-implants/' => [ 'Dental Implants Near Woodstock, VA | Dr. Jeffrey Burns', 'Missing a tooth? Woodstock patients get single-tooth dental implants from Dr. Jeffrey Burns, about 15 minutes away in New Market. Call 540-740-8937.' ],
        '/contact-us/cosmetic-dentist-near-luray/' => [ 'Dental Implants Near Luray, VA | Dr. Jeffrey Burns', "Nervous about implants? Luray patients get IV sedation with on-site anesthesiologists at Dr. Jeffrey Burns' New Market office. Call 540-740-8937." ],
        '/contact-us/cosmetic-dentist-near-broadway/' => [ 'Dental Implants Near Broadway, VA | Dr. Jeffrey Burns', 'Broadway patients get dental implants planned with 3D cone beam scans and 3D-printed surgical guides by Dr. Jeffrey Burns in New Market. Call 540-740-8937.' ],
        '/contact-us/dental-implants-timberville-va/' => [ 'Dental Implants Near Timberville, VA | Dr. Jeffrey Burns', 'Tired of loose dentures? Timberville patients get implant-supported dentures from Dr. Jeffrey Burns, 20 minutes away in New Market. Call 540-740-8937.' ],
    ];
}

add_action( 'admin_init', function () {
    if ( ! isset( $_GET['ds_seed_slim_seo'] ) ) {
        return;
    }
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'Administrator access required.', 'dreamsmile-child' ), 403 );
    }
    if ( ! defined( 'SLIM_SEO_VER' ) ) {
        wp_die( esc_html__( 'Slim SEO is not active on this site, so there is nothing to hand the titles to.', 'dreamsmile-child' ) );
    }

    $apply   = isset( $_GET['apply'] ) && check_admin_referer( 'ds_seed_slim_seo' );
    $written = 0;
    $rows    = [];

    foreach ( ds_slim_seo_seed() as $path => $seed ) {
        $id = '/' === $path ? (int) get_option( 'page_on_front' ) : url_to_postid( home_url( $path ) );
        if ( ! $id ) {
            $rows[] = [ $path, '', 'Not on this site, skipped', '' ];
            continue;
        }

        $meta   = get_post_meta( $id, 'slim_seo', true );
        $meta   = is_array( $meta ) ? $meta : [];
        $status = [];
        $dirty  = false;
        foreach ( [ 'title' => $seed[0], 'description' => $seed[1] ] as $field => $value ) {
            if ( '' === $value ) {
                continue;
            }
            if ( ! empty( $meta[ $field ] ) ) {
                $status[ $field ] = 'kept: ' . $meta[ $field ];
                continue;
            }
            $meta[ $field ]   = sanitize_text_field( $value );
            $status[ $field ] = ( $apply ? 'written: ' : 'will write: ' ) . $value;
            $dirty            = true;
        }
        if ( $apply && $dirty ) {
            update_post_meta( $id, 'slim_seo', $meta );
            $written++;
        }
        $rows[] = [ $path, get_the_title( $id ), $status['title'] ?? '', $status['description'] ?? '' ];
    }

    ob_start();
    ?>
    <h1>Slim SEO hand-off</h1>
    <p>
      <?php if ( $apply ) : ?>
        Done. Updated <?php echo (int) $written; ?> page(s). Titles and descriptions are now edited in each page's Slim SEO box.
      <?php else : ?>
        Preview only &mdash; nothing has been written yet. Existing Slim SEO text is never overwritten.
        <a class="button button-primary" href="<?php echo esc_url( wp_nonce_url( admin_url( '?ds_seed_slim_seo=1&apply=1' ), 'ds_seed_slim_seo' ) ); ?>">Apply</a>
      <?php endif; ?>
    </p>
    <table class="widefat striped">
      <thead><tr><th>Address</th><th>Page</th><th>Title</th><th>Description</th></tr></thead>
      <tbody>
      <?php foreach ( $rows as $r ) : ?>
        <tr><?php foreach ( $r as $cell ) : ?><td><?php echo esc_html( $cell ); ?></td><?php endforeach; ?></tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php
    wp_die( ob_get_clean(), esc_html__( 'Slim SEO hand-off', 'dreamsmile-child' ), [ 'response' => 200 ] );
} );


/**
 * Import the 3 missing October 2026 blog posts from inc/missing-blog-posts-2026-11.xml
 * if they are not yet published on the site (Launch Checklist Rows 12 & 16).
 */
function ds_import_missing_blog_posts() {
    $xml_file = trailingslashit( get_stylesheet_directory() ) . 'inc/missing-blog-posts-2026-11.xml';
    if ( ! file_exists( $xml_file ) || ! function_exists( 'simplexml_load_file' ) ) {
        return 0;
    }

    $xml = @simplexml_load_file( $xml_file );
    if ( ! $xml || empty( $xml->channel->item ) ) {
        return 0;
    }

    $author_user = get_user_by( 'login', 'upwardengine' );
    $author_id   = $author_user ? (int) $author_user->ID : 1;

    // Ensure categories 'Blog' and 'Dental Implant' exist
    $cat_ids = [];
    foreach ( [ 'blog' => 'Blog', 'dental-implant' => 'Dental Implant' ] as $slug => $name ) {
        $term = get_term_by( 'slug', $slug, 'category' );
        if ( ! $term ) {
            $res = wp_insert_term( $name, 'category', [ 'slug' => $slug ] );
            if ( ! is_wp_error( $res ) && ! empty( $res['term_id'] ) ) {
                $cat_ids[] = (int) $res['term_id'];
            }
        } else {
            $cat_ids[] = (int) $term->term_id;
        }
    }

    // First pass: collect attachment metadata by old post_id
    $attachments = [];
    foreach ( $xml->channel->item as $item ) {
        $wp = $item->children( 'http://wordpress.org/export/1.2/' );
        if ( 'attachment' === (string) $wp->post_type ) {
            $old_id = (int) $wp->post_id;
            $alt    = '';
            foreach ( $wp->postmeta as $pm ) {
                if ( '_wp_attachment_image_alt' === (string) $pm->meta_key ) {
                    $alt = (string) $pm->meta_value;
                }
            }
            $attachments[ $old_id ] = [
                'url'   => (string) $wp->attachment_url,
                'title' => (string) $item->title,
                'name'  => (string) $wp->post_name,
                'alt'   => $alt,
            ];
        }
    }

    $imported = 0;
    foreach ( $xml->channel->item as $item ) {
        $wp      = $item->children( 'http://wordpress.org/export/1.2/' );
        $content = $item->children( 'http://purl.org/rss/1.0/modules/content/' );
        if ( 'post' !== (string) $wp->post_type ) {
            continue;
        }

        $slug     = (string) $wp->post_name;
        $existing = get_page_by_path( $slug, OBJECT, 'post' );
        if ( $existing && 'publish' === $existing->post_status ) {
            continue;
        }

        $post_data = [
            'post_title'    => (string) $item->title,
            'post_name'     => $slug,
            'post_content'  => (string) $content->encoded,
            'post_status'   => 'publish',
            'post_type'     => 'post',
            'post_author'   => $author_id,
            'post_date'     => (string) $wp->post_date,
            'post_date_gmt' => (string) $wp->post_date_gmt,
            'comment_status'=> 'closed',
            'ping_status'   => 'closed',
            'post_category' => $cat_ids,
        ];
        if ( $existing ) {
            $post_data['ID'] = $existing->ID;
            $post_id         = wp_update_post( wp_slash( $post_data ) );
        } else {
            $post_id = wp_insert_post( wp_slash( $post_data ) );
        }

        if ( ! $post_id || is_wp_error( $post_id ) ) {
            continue;
        }

        $thumb_old_id = 0;
        foreach ( $wp->postmeta as $pm ) {
            $mkey = (string) $pm->meta_key;
            $mval = (string) $pm->meta_value;
            if ( 'slim_seo' === $mkey ) {
                $unser = maybe_unserialize( $mval );
                if ( is_array( $unser ) ) {
                    update_post_meta( $post_id, 'slim_seo', $unser );
                }
            } elseif ( '_thumbnail_id' === $mkey ) {
                $thumb_old_id = (int) $mval;
            }
        }

        if ( $thumb_old_id && isset( $attachments[ $thumb_old_id ] ) && ! has_post_thumbnail( $post_id ) ) {
            $att_info = $attachments[ $thumb_old_id ];
            if ( ! function_exists( 'media_sideload_image' ) ) {
                require_once ABSPATH . 'wp-admin/includes/media.php';
                require_once ABSPATH . 'wp-admin/includes/file.php';
                require_once ABSPATH . 'wp-admin/includes/image.php';
            }
            $att_id = @media_sideload_image( $att_info['url'], $post_id, $att_info['title'], 'id' );
            if ( ! is_wp_error( $att_id ) && is_numeric( $att_id ) ) {
                set_post_thumbnail( $post_id, (int) $att_id );
                if ( '' !== $att_info['alt'] ) {
                    update_post_meta( (int) $att_id, '_wp_attachment_image_alt', $att_info['alt'] );
                }
            }
        }

        $imported++;
    }

    return $imported;
}

/**
 * One-time automatic execution of v1.8.2 SEO tracker database tasks on `init`:
 * 1. Seeds all ds_slim_seo_seed() titles & descriptions, force-updating the 8 town pages
 *    (Area Pages Rows 7–14) and the 147-char homepage blurb (Metadata Issues Row 22).
 * 2. Imports the 3 missing October 2026 blog posts (Launch Checklist Rows 12 & 16).
 * 3. Rewrites all 97 old internal links in blog posts and pages (Launch Checklist Row 22).
 * 4. Sets author archives to noindex in Slim SEO and cleans exposed author slugs
 *    (upwardengine -> dr-jeffrey-burns, meganjburnsdds-com -> megan) (Launch Checklist Row 25).
 */
add_action( 'init', function () {
    if ( get_option( 'ds_v190_auto_migrate_done' ) === '1' ) {
        return;
    }

    // 1. Seed Slim SEO titles & descriptions (force-updating '/' description and the 8 town pages)
    $force_paths = [
        '/',
        '/contact-us/dental-implants-harrisonburg-area/',
        '/contact-us/winchester-dentist-dental-implants/',
        '/contact-us/cosmetic-dentist-elkton-area/',
        '/contact-us/dental-implants-dentist-near-bridgewater/',
        '/contact-us/dentist-near-woodstock-cosmetic-implants/',
        '/contact-us/cosmetic-dentist-near-luray/',
        '/contact-us/cosmetic-dentist-near-broadway/',
        '/contact-us/dental-implants-timberville-va/',
    ];

    foreach ( ds_slim_seo_seed() as $path => $seed ) {
        $id = '/' === $path ? (int) get_option( 'page_on_front' ) : url_to_postid( home_url( $path ) );
        if ( ! $id ) {
            $trimmed = trim( $path, '/' );
            if ( '' !== $trimmed ) {
                $p = get_page_by_path( $trimmed, OBJECT, [ 'page', 'post' ] );
                if ( $p ) {
                    $id = (int) $p->ID;
                }
            }
        }
        if ( ! $id ) {
            continue;
        }
        $meta  = get_post_meta( $id, 'slim_seo', true );
        $meta  = is_array( $meta ) ? $meta : [];
        $dirty = false;
        $force = in_array( $path, $force_paths, true );

        foreach ( [ 'title' => $seed[0], 'description' => $seed[1] ] as $field => $value ) {
            if ( '' === $value ) {
                continue;
            }
            if ( '/' === $path && 'title' === $field && ! empty( $meta['title'] ) ) {
                continue;
            }
            if ( ! $force && ! empty( $meta[ $field ] ) ) {
                continue;
            }
            if ( ( $meta[ $field ] ?? '' ) !== $value ) {
                $meta[ $field ] = sanitize_text_field( $value );
                $dirty          = true;
            }
        }
        if ( $dirty ) {
            update_post_meta( $id, 'slim_seo', $meta );
        }
    }

    // 2. Import the 3 missing October 2026 blog posts
    ds_import_missing_blog_posts();

    // 2b. Ensure /privacy-policy/ is published and linked (Launch Checklist Row 24)
    ds_ensure_privacy_policy_page();

    // 3. Rewrite the 97 old internal links across posts and pages
    if ( function_exists( 'ds_post_links_rules' ) && function_exists( 'ds_post_links_scan' ) ) {
        $rules = ds_post_links_rules();
        if ( ! empty( $rules ) ) {
            $posts = get_posts( [
                'post_type'        => [ 'post', 'page' ],
                'post_status'      => [ 'publish', 'future', 'draft', 'pending', 'private' ],
                'posts_per_page'   => -1,
                'no_found_rows'    => true,
                'suppress_filters' => true,
            ] );
            $kses = (bool) has_filter( 'content_save_pre', 'wp_filter_post_kses' );
            if ( $kses ) {
                kses_remove_filters();
            }
            foreach ( $posts as $p ) {
                if ( false === stripos( $p->post_content, 'href' ) ) {
                    continue;
                }
                $scan = ds_post_links_scan( $p->post_content, $rules );
                if ( ! empty( $scan['changes'] ) ) {
                    wp_update_post( wp_slash( [ 'ID' => $p->ID, 'post_content' => $scan['content'] ] ) );
                }
            }
            if ( $kses ) {
                kses_init_filters();
            }
        }
    }

    // 4. Author archive noindex in Slim SEO option + clean user_nicename slugs
    $slim_opt = get_option( 'slim_seo', [] );
    if ( is_array( $slim_opt ) ) {
        if ( empty( $slim_opt['author'] ) || ! is_array( $slim_opt['author'] ) ) {
            $slim_opt['author'] = [];
        }
        $slim_opt['author']['noindex'] = 1;
        update_option( 'slim_seo', $slim_opt );
    }

    global $wpdb;
    $nicename_map = [
        'upwardengine'       => [ 'nicename' => 'dr-jeffrey-burns', 'display' => 'Dr. Jeffrey S. Burns, DDS' ],
        'meganjburnsdds-com' => [ 'nicename' => 'megan',            'display' => 'Megan' ],
    ];
    foreach ( $nicename_map as $login => $info ) {
        $u = get_user_by( 'login', $login );
        if ( $u ) {
            $wpdb->update(
                $wpdb->users,
                [
                    'user_nicename' => $info['nicename'],
                    'display_name'  => $info['display'],
                ],
                [ 'ID' => $u->ID ]
            );
            clean_user_cache( $u->ID );
        }
    }

    update_option( 'ds_v190_auto_migrate_done', '1' );
}, 25 );


/**
 * Launch Checklist Row 24:
 * Ensure the /privacy-policy/ page exists and is set in wp_page_for_privacy_policy.
 */
function ds_ensure_privacy_policy_page() {
    $page = get_page_by_path( 'privacy-policy' );
    $content = <<<HTML
<!-- wp:paragraph -->
<p><em>Last updated: November 2026</em></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>1. Introduction & Overview</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>At the dental practice of <strong>Dr. Jeffrey S. Burns, DDS (Jeffrey S. Burns DDS, PC)</strong> ("we," "our," or "us"), we are committed to safeguarding the privacy and confidential personal information of our patients and website visitors. This Privacy Policy explains how we collect, use, and protect your information when you visit <a href="/">www.jeffreyburns.com</a> or use our online appointment scheduling and patient inquiry tools.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>2. Information We Collect</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We only collect personal information that you voluntarily submit to us, which may include:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul>
  <li><strong>Contact Details:</strong> Your name, email address, telephone number, and preferred contact method.</li>
  <li><strong>Appointment & Care Notes:</strong> Preferred consultation times, service interests (e.g., dental implants, DreamSmile&trade; assessment, cosmetic dentistry, dentures), and optional notes you provide regarding your dental needs.</li>
  <li><strong>New Patient Inquiries:</strong> Requests for new patient registration paperwork or digital resources.</li>
  <li><strong>Technical & Usage Data:</strong> Non-personally identifiable information collected automatically via cookies and tracking tools (e.g., Google Tag Manager, Google Analytics), such as device type, browser, approximate geographic location, and pages visited.</li>
</ul>
<!-- /wp:list -->

<!-- wp:heading {"level":2} -->
<h2>3. How We Use Your Information</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The information we collect is strictly used to:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul>
  <li>Schedule and confirm dental consultations, assessments, and follow-up appointments.</li>
  <li>Communicate directly with you regarding your dental care and inquiries.</li>
  <li>Provide requested patient educational materials and guides.</li>
  <li>Operate, maintain, and optimize the functionality and speed of our website.</li>
</ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p><strong>We do not sell, rent, trade, or share your personal contact details with third parties for commercial or promotional marketing purposes under any circumstances.</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>4. SMS and Phone Communication Disclosure</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>If you provide your telephone number through our contact forms or scheduling tool, you may receive phone calls or SMS text messages regarding your appointment requests and care reminders from our New Market office. <strong>No mobile information will be shared with third parties or affiliates for marketing or promotional purposes.</strong> Message and data rates may apply. You may opt out of SMS communications at any time by replying STOP.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>5. Health Information (HIPAA)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our website is designed for general informational and scheduling purposes. Protected Health Information (PHI) provided during in-office visits or via secure patient intake systems is governed by the Health Insurance Portability and Accountability Act (HIPAA) and our practice Notice of Privacy Practices.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>6. Contact Us</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>If you have any questions about this Privacy Policy or our privacy practices, please contact us:</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Dr. Jeffrey Burns DDS</strong><br/>
9626 South Congress St<br/>
New Market, VA 22844<br/>
Phone: <a href="tel:+15407408937">(540) 740-8937</a><br/>
Website: <a href="/">www.jeffreyburns.com</a></p>
<!-- /wp:paragraph -->
HTML;

    if ( ! $page ) {
        $page_id = wp_insert_post( [
            'post_title'   => 'Privacy Policy',
            'post_name'    => 'privacy-policy',
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_content' => $content,
        ] );
    } else {
        $page_id = $page->ID;
        if ( 'publish' !== $page->post_status || empty( trim( $page->post_content ) ) ) {
            wp_update_post( [
                'ID'           => $page_id,
                'post_status'  => 'publish',
                'post_content' => $content,
            ] );
        }
    }

    if ( $page_id && ! is_wp_error( $page_id ) ) {
        update_option( 'wp_page_for_privacy_policy', (int) $page_id );
        $meta = get_post_meta( $page_id, 'slim_seo', true );
        $meta = is_array( $meta ) ? $meta : [];
        $meta['title']       = 'Privacy Policy | Dr. Jeffrey Burns';
        $meta['description'] = 'Privacy Policy for the dental practice of Dr. Jeffrey Burns DDS in New Market, VA. How we handle patient inquiries, scheduling, and information.';
        update_post_meta( $page_id, 'slim_seo', $meta );
    }
}
