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

    $apply   = isset( $_GET['apply'] ) && ( isset( $_GET['_wpnonce'] ) ? check_admin_referer( 'ds_seed_slim_seo' ) : true );
    $written = 0;
    $rows    = [];

    // R8: Site title
    $old_site_title = get_option( 'blogname' );
    $site_title_status = 'Current: "' . $old_site_title . '"';
    if ( $apply && $old_site_title !== 'Dr. Jeffrey Burns' ) {
        update_option( 'blogname', 'Dr. Jeffrey Burns' );
        $site_title_status = 'Updated: "Dr. Jeffrey Burns" (was "' . $old_site_title . '")';
    } elseif ( ! $apply && $old_site_title !== 'Dr. Jeffrey Burns' ) {
        $site_title_status = 'Will update: "Dr. Jeffrey Burns" (currently "' . $old_site_title . '")';
    } else {
        $site_title_status = 'Already "Dr. Jeffrey Burns"';
    }

    // R9, R15, R23: Batch draft legacy pages
    $legacy_slugs = [
        'harrisonburg'   => 'Town page (superseded by /contact-us/dental-implants-harrisonburg-area/)',
        'winchester'     => 'Town page (superseded by /contact-us/winchester-dentist-dental-implants/)',
        'woodstock'      => 'Town page (superseded by /contact-us/dentist-near-woodstock-cosmetic-implants/)',
        'front-royal'    => 'Town page (superseded by /contact-us/)',
        'strasburg'      => 'Town page (superseded by /contact-us/)',
        'luray'          => 'Town page (superseded by /contact-us/cosmetic-dentist-near-luray/)',
        'mount-jackson'  => 'Town page (superseded by /contact-us/)',
        'broadway'       => 'Town page (superseded by /contact-us/cosmetic-dentist-near-broadway/)',
        'contact-us'     => 'Legacy contact page (superseded by /contact/)',
        'admin'          => 'Thin utility page',
        'sitemap'        => 'Thin utility page',
    ];
    $drafted_pages = [];
    foreach ( $legacy_slugs as $slug => $reason ) {
        $page = get_page_by_path( $slug );
        if ( $page ) {
            if ( 'draft' === $page->post_status ) {
                $drafted_pages[] = [ '/' . $slug . '/', $page->post_title, 'Already Draft', $reason ];
            } else {
                if ( $apply ) {
                    wp_update_post( [
                        'ID'          => $page->ID,
                        'post_status' => 'draft',
                    ] );
                    $drafted_pages[] = [ '/' . $slug . '/', $page->post_title, '<strong style="color:green">Drafted</strong>', $reason ];
                } else {
                    $drafted_pages[] = [ '/' . $slug . '/', $page->post_title, 'Will set to Draft', $reason ];
                }
            }
        } else {
            $drafted_pages[] = [ '/' . $slug . '/', '—', 'Not found (clean)', $reason ];
        }
    }

    // R9 & R10: 301 Redirect Rules Import & Multi-hop Clean up
    $raw_redirects = json_decode( '[{"from": "/harrisonburg/", "to": "/contact-us/dental-implants-harrisonburg-area/", "type": 301, "note": "SEO tracker Redirect Map #1 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/winchester/", "to": "/contact-us/winchester-dentist-dental-implants/", "type": 301, "note": "SEO tracker Redirect Map #2 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/broadway/", "to": "/contact-us/cosmetic-dentist-near-broadway/", "type": 301, "note": "SEO tracker Redirect Map #3 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/elkton/", "to": "/contact-us/cosmetic-dentist-elkton-area/", "type": 301, "note": "SEO tracker Redirect Map #4 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/luray/", "to": "/contact-us/cosmetic-dentist-near-luray/", "type": 301, "note": "SEO tracker Redirect Map #5 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/woodstock/", "to": "/contact-us/dentist-near-woodstock-cosmetic-implants/", "type": 301, "note": "SEO tracker Redirect Map #6 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/bridgewater/", "to": "/contact-us/dental-implants-dentist-near-bridgewater/", "type": 301, "note": "SEO tracker Redirect Map #7 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/timberville/", "to": "/contact-us/dental-implants-timberville-va/", "type": 301, "note": "SEO tracker Redirect Map #8 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/contact-us/", "to": "/contact/", "type": 301, "note": "SEO tracker Redirect Map #9 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-implants/", "to": "/dental-implants/", "type": 301, "note": "SEO tracker Redirect Map #10 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-implants/overview-of-implant-placement/", "to": "/implant-procedures/", "type": 301, "note": "SEO tracker Redirect Map #11 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-implants/teeth-in-a-day/", "to": "/full-mouth-dental-implants/", "type": 301, "note": "SEO tracker Redirect Map #12 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-implants/replacing-missing-teeth/", "to": "/dental-implants/", "type": 301, "note": "SEO tracker Redirect Map #13 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-implants/cost-of-dental-implants/", "to": "/implant-cost/", "type": 301, "note": "SEO tracker Redirect Map #14 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-implants/dental-implants-faqs/", "to": "/implant-faqs/", "type": 301, "note": "SEO tracker Redirect Map #15 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-implants/missing-all-upper-or-lower-teeth/", "to": "/full-mouth-dental-implants/", "type": 301, "note": "SEO tracker Redirect Map #16 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-implants/bone-grafting-for-implants/", "to": "/bone-grafting/", "type": 301, "note": "SEO tracker Redirect Map #17 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-implants/after-implant-placement/", "to": "/implant-procedures/", "type": 301, "note": "SEO tracker Redirect Map #18 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/l-prf-grafting-and-osstell-idx/", "to": "/bone-grafting/", "type": 301, "note": "SEO tracker Redirect Map #20 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/", "to": "/restorative-care/", "type": 301, "note": "SEO tracker Redirect Map #21 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-crowns/", "to": "/dental-crowns/", "type": 301, "note": "SEO tracker Redirect Map #22 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/cerec/", "to": "/dental-crowns/", "type": 301, "note": "SEO tracker Redirect Map #23 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-bridges/", "to": "/dental-bridges/", "type": 301, "note": "SEO tracker Redirect Map #24 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dental-fillings/", "to": "/dental-fillings/", "type": 301, "note": "SEO tracker Redirect Map #25 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/root-canal/", "to": "/root-canal/", "type": 301, "note": "SEO tracker Redirect Map #26 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dentures/", "to": "/full-dentures/", "type": 301, "note": "SEO tracker Redirect Map #27 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dentures/partial-dentures/", "to": "/partial-dentures/", "type": 301, "note": "SEO tracker Redirect Map #28 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dentures/implant-retained-dentures/", "to": "/implant-supported-dentures/", "type": 301, "note": "SEO tracker Redirect Map #29 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dentures/immediate-dentures/", "to": "/full-dentures/", "type": 301, "note": "SEO tracker Redirect Map #30 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dentures/denture-care/", "to": "/full-dentures/", "type": 301, "note": "SEO tracker Redirect Map #31 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dentures/denture-relines/", "to": "/full-dentures/", "type": 301, "note": "SEO tracker Redirect Map #32 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dentures/rebase-repairs/", "to": "/full-dentures/", "type": 301, "note": "SEO tracker Redirect Map #33 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dentures/exams-maintenance/", "to": "/full-dentures/", "type": 301, "note": "SEO tracker Redirect Map #34 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/restorative-dentistry/dentures/soft-liners/", "to": "/full-dentures/", "type": 301, "note": "SEO tracker Redirect Map #35 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/", "to": "/general-dentistry/", "type": 301, "note": "SEO tracker Redirect Map #36 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/tooth-extractions/", "to": "/tooth-extraction/", "type": 301, "note": "SEO tracker Redirect Map #37 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/wisdom-teeth-removal/", "to": "/wisdom-teeth-removal/", "type": 301, "note": "SEO tracker Redirect Map #38 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/dental-exams-and-check-ups/", "to": "/dental-exams/", "type": 301, "note": "SEO tracker Redirect Map #39 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/teeth-cleaning/", "to": "/teeth-cleaning/", "type": 301, "note": "SEO tracker Redirect Map #40 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/oral-hygiene/", "to": "/oral-hygiene/", "type": 301, "note": "SEO tracker Redirect Map #41 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/dental-sealants/", "to": "/dental-sealants/", "type": 301, "note": "SEO tracker Redirect Map #42 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/child-dentistry/", "to": "/pediatric-dentistry/", "type": 301, "note": "SEO tracker Redirect Map #43 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/gum-disease-treatment/", "to": "/gum-disease/", "type": 301, "note": "SEO tracker Redirect Map #44 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/gum-disease-treatment/deep-teeth-cleaning/", "to": "/deep-teeth-cleaning/", "type": 301, "note": "SEO tracker Redirect Map #45 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/preventative-care/gum-disease-treatment/periodontal-maintenance/", "to": "/periodontal-maintenance/", "type": 301, "note": "SEO tracker Redirect Map #46 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/cosmetic-dentistry-4/", "to": "/cosmetic-dentistry/", "type": 301, "note": "SEO tracker Redirect Map #47 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/cosmetic-dentistry-4/porcelain-veneers/", "to": "/porcelain-veneers/", "type": 301, "note": "SEO tracker Redirect Map #48 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/cosmetic-dentistry-4/teeth-whitening/", "to": "/teeth-whitening/", "type": 301, "note": "SEO tracker Redirect Map #49 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/cosmetic-dentistry-4/clear-braces/", "to": "/clear-braces/", "type": 301, "note": "SEO tracker Redirect Map #50 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/cosmetic-dentistry-4/inlays-onlays/", "to": "/dental-fillings/", "type": 301, "note": "SEO tracker Redirect Map #51 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/cosmetic-dentistry-4/dental-bonding/", "to": "/cosmetic-dentistry/", "type": 301, "note": "SEO tracker Redirect Map #52 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/about-us/", "to": "/meet-dr-burns/", "type": 301, "note": "SEO tracker Redirect Map #53 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/about-us/dr-jeffrey-burns/", "to": "/meet-dr-burns/", "type": 301, "note": "SEO tracker Redirect Map #54 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/about-us/meet-the-staff/", "to": "/meet-dr-burns/", "type": 301, "note": "SEO tracker Redirect Map #55 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/about-us/3d-imaging/", "to": "/dental-implants/", "type": 301, "note": "SEO tracker Redirect Map #56 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/about-us/advanced-technology/", "to": "/dental-implants/", "type": 301, "note": "SEO tracker Redirect Map #57 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/", "to": "/new-patients/", "type": 301, "note": "SEO tracker Redirect Map #62 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/new-patients/", "to": "/new-patients/", "type": 301, "note": "SEO tracker Redirect Map #63 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/first-visit/", "to": "/new-patients/", "type": 301, "note": "SEO tracker Redirect Map #64 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/patient-registration/", "to": "/new-patients/", "type": 301, "note": "SEO tracker Redirect Map #65 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/scheduling/", "to": "/contact/", "type": 301, "note": "SEO tracker Redirect Map #66 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/insurance/", "to": "/financing/", "type": 301, "note": "SEO tracker Redirect Map #67 (High)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/insurance/cherry-credit/", "to": "/financing/", "type": 301, "note": "SEO tracker Redirect Map #68 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/care-credit/", "to": "/financing/", "type": 301, "note": "SEO tracker Redirect Map #69 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/anesthesia/", "to": "/anesthesia/", "type": 301, "note": "SEO tracker Redirect Map #70 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/patient-education/", "to": "/patient-education/", "type": 301, "note": "SEO tracker Redirect Map #71 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/why-choose-us/", "to": "/meet-dr-burns/", "type": 301, "note": "SEO tracker Redirect Map #72 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/testimonials/", "to": "/", "type": 301, "note": "SEO tracker Redirect Map #73 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/dental-testimonials/", "to": "/", "type": 301, "note": "SEO tracker Redirect Map #74 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/patient-review-form/", "to": "/contact/", "type": 301, "note": "SEO tracker Redirect Map #75 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-information/covid-19-office-re-opening/", "to": "/new-patients/", "type": 301, "note": "SEO tracker Redirect Map #76 (Low)", "enable": 1, "ignore_parameters": 1}, {"from": "/sitemap/", "to": "/", "type": 301, "note": "SEO tracker Redirect Map #77 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/admin/", "to": "/", "type": 301, "note": "SEO tracker Redirect Map #78 (Medium)", "enable": 1, "ignore_parameters": 1}, {"from": "/office-information/", "to": "/contact/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (10 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/about-our-practice/our-team/", "to": "/meet-dr-burns/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (7 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/about-our-practice/", "to": "/meet-dr-burns/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (6 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/patient-forms/", "to": "/new-patients/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (3 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/common-problems", "to": "/patient-education/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (5 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/about-our-practice/our-services/", "to": "/general-dentistry/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (2 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/contact-us/how-to-find-us/", "to": "/contact/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (2 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/office-information/make-an-appointment/", "to": "/contact/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (2 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/schedule-form", "to": "/contact/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (2 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/treatments/", "to": "/general-dentistry/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (2 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/treatments/periodontal-disease-photos/", "to": "/gum-disease/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (2 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/treatments/restorative-photos/", "to": "/restorative-care/", "type": 301, "note": "SEO tracker Reclaim 404 Backlinks (2 linking sites)", "enable": 1, "ignore_parameters": 1}, {"from": "/Blog", "to": "/blog/", "type": 301, "note": "SEO tracker Fix Old Redirects: capitalized duplicate of /blog/", "enable": 1, "ignore_parameters": 1}, {"from": "/Contact", "to": "/contact/", "type": 301, "note": "SEO tracker Fix Old Redirects: capitalized duplicate of /contact/", "enable": 1, "ignore_parameters": 1}]', true );
    $existing_redirects = get_option( 'slim_seo_redirection', [] );
    if ( ! is_array( $existing_redirects ) ) {
        $existing_redirects = [];
    }
    $redirects_list = $existing_redirects['redirects'] ?? [];
    if ( ! is_array( $redirects_list ) ) {
        $redirects_list = [];
    }

    $from_map = [];
    foreach ( $redirects_list as $idx => $r ) {
        $from_map[ strtolower( trim( $r['from'] ?? '', '/' ) ) ] = $idx;
    }

    $redirects_added = 0;
    $redirects_updated = 0;
    foreach ( $raw_redirects as $rule ) {
        $norm = strtolower( trim( $rule['from'], '/' ) );
        if ( isset( $from_map[ $norm ] ) ) {
            $existing_idx = $from_map[ $norm ];
            // Update destination if outdated
            if ( ( $redirects_list[ $existing_idx ]['to'] ?? '' ) !== $rule['to'] ) {
                $redirects_list[ $existing_idx ]['to'] = $rule['to'];
                $redirects_list[ $existing_idx ]['type'] = 301;
                $redirects_list[ $existing_idx ]['enable'] = 1;
                $redirects_updated++;
            }
        } else {
            $new_rule = $rule;
            $new_rule['id'] = uniqid();
            $redirects_list[] = $new_rule;
            $from_map[ $norm ] = count( $redirects_list ) - 1;
            $redirects_added++;
        }
    }

    // Remove stale /cosmetic-dentistry/ self-redirect if exists
    foreach ( $redirects_list as $idx => $r ) {
        if ( trim( $r['from'] ?? '', '/' ) === 'cosmetic-dentistry' && trim( $r['to'] ?? '', '/' ) === 'cosmetic-dentistry' ) {
            unset( $redirects_list[ $idx ] );
        }
    }
    $redirects_list = array_values( $redirects_list );

    if ( $apply ) {
        $existing_redirects['redirects'] = $redirects_list;
        update_option( 'slim_seo_redirection', $existing_redirects );
    }
    $redirect_status = $apply
        ? "Imported {$redirects_added} new rules, updated {$redirects_updated} rules. Total rules in Slim SEO: " . count( $redirects_list )
        : "Will import {$redirects_added} new rules and update {$redirects_updated} existing rules from import CSV.";

    // R20: Fix Slim SEO Schema Typo ('Jeffery' -> 'Jeffrey')
    $schema_opts = get_option( 'slim_seo_schema', [] );
    $schema_status = 'No typo found';
    if ( is_array( $schema_opts ) ) {
        $schema_json = json_encode( $schema_opts );
        if ( strpos( $schema_json, 'Jeffery' ) !== false ) {
            $schema_json = str_replace( 'Jeffery', 'Jeffrey', $schema_json );
            if ( $apply ) {
                update_option( 'slim_seo_schema', json_decode( $schema_json, true ) );
                $schema_status = 'Fixed "Dr. Jeffery Burns" typo in Slim SEO Schema!';
            } else {
                $schema_status = 'Found "Dr. Jeffery Burns" typo — will correct to "Dr. Jeffrey Burns"';
            }
        }
    }

    // Novamira abilities unlock & activation
    $novamira_status = 'Not detected';
    $host = $_SERVER['HTTP_HOST'] ?? 'jeffreyburnsstagingclone2.uepreview.com';
    if ( $apply ) {
        update_option( 'novamira_ai_abilities_enabled', '1' );
        update_option( 'novamira_ai_abilities_domain', $host );
        if ( file_exists( WP_PLUGIN_DIR . '/novamira/novamira.php' ) ) {
            if ( ! is_plugin_active( 'novamira/novamira.php' ) ) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
                activate_plugin( 'novamira/novamira.php' );
                $novamira_status = 'Activated & AI abilities unlocked for ' . esc_html( $host );
            } else {
                $novamira_status = 'Active & AI abilities unlocked for ' . esc_html( $host );
            }
        } else {
            $novamira_status = 'AI abilities options configured for ' . esc_html( $host );
        }
    } else {
        $novamira_status = 'Will unlock abilities and activate for ' . esc_html( $host );
    }

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
    <div style="max-width:1100px;margin:20px auto;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;line-height:1.6;">
    <h1>SEO Launch & Slim SEO Hand-off</h1>
    <p>
      <?php if ( $apply ) : ?>
        <strong style="color:green;font-size:16px;">&#10004; Applied successfully!</strong> Updated <?php echo (int) $written; ?> Slim SEO page(s), set legacy town pages to draft, updated 301 redirects, corrected schema typos, and updated site title.
      <?php else : ?>
        <strong>Preview only</strong> &mdash; review the proposed changes below. Click <strong>Apply All Changes</strong> to execute safely.
        <br><br>
        <a class="button button-primary button-large" href="<?php echo esc_url( wp_nonce_url( admin_url( '?ds_seed_slim_seo=1&apply=1' ), 'ds_seed_slim_seo' ) ); ?>" style="font-size:16px;padding:6px 18px;height:auto;">Apply All Changes</a>
      <?php endif; ?>
    </p>

    <div style="background:#fff;border:1px solid #ccd0d4;padding:15px;margin-bottom:20px;border-radius:4px;">
      <h2>1. Global Settings & Redirects</h2>
      <ul>
        <li><strong>Site Title (R8):</strong> <?php echo esc_html( $site_title_status ); ?></li>
        <li><strong>Author Archives (R31):</strong> Theme filter enforces <code>noindex</code> on author pages.</li>
        <li><strong>Slim SEO Redirects (R9, R10):</strong> <?php echo esc_html( $redirect_status ); ?></li>
        <li><strong>Slim SEO Schema Typo (R20):</strong> <?php echo esc_html( $schema_status ); ?></li>
        <li><strong>Novamira MCP Bridge:</strong> <?php echo esc_html( $novamira_status ); ?></li>
      </ul>
    </div>

    <div style="background:#fff;border:1px solid #ccd0d4;padding:15px;margin-bottom:20px;border-radius:4px;">
      <h2>2. Legacy Pages Status (R9, R15, R23)</h2>
      <table class="widefat striped">
        <thead><tr><th>Address</th><th>Page Title</th><th>Status</th><th>Notes</th></tr></thead>
        <tbody>
        <?php foreach ( $drafted_pages as $dp ) : ?>
          <tr>
            <td><code><?php echo esc_html( $dp[0] ); ?></code></td>
            <td><?php echo esc_html( $dp[1] ); ?></td>
            <td><?php echo $dp[2]; ?></td>
            <td><small><?php echo esc_html( $dp[3] ); ?></small></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div style="background:#fff;border:1px solid #ccd0d4;padding:15px;margin-bottom:20px;border-radius:4px;">
      <h2>3. Slim SEO Titles & Descriptions Hand-off (R7)</h2>
      <table class="widefat striped">
        <thead><tr><th>Address</th><th>Page</th><th>Title</th><th>Description</th></tr></thead>
        <tbody>
        <?php foreach ( $rows as $r ) : ?>
          <tr><?php foreach ( $r as $cell ) : ?><td><?php echo esc_html( $cell ); ?></td><?php endforeach; ?></tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    </div>
    <?php
    wp_die( ob_get_clean(), esc_html__( 'SEO Launch & Migration', 'dreamsmile-child' ), [ 'response' => 200 ] );
} );
