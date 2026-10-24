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
