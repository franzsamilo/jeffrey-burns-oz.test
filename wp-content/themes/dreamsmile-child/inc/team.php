<?php
/**
 * /meet-the-team/: the team list, and the one-time setup that creates the page.
 *
 * Asked for by the SEO team (Nov 12 2026): a "Meet the Team" page of its own,
 * with "About Us" in the menu over "Dr. Jeffrey Burns" (/meet-dr-burns/) and
 * "Meet the Team". "Meet the Team", not "Meet the Staff".
 *
 * The people, roles and bios are the live site's Meet the Staff page
 * (www.jeffreyburns.com/about-us/meet-the-staff/), which the practice updated
 * in Nov 2026 with new headshots. Each bio keeps the professional part of the
 * live text, lightly tightened; the family details are left to the live page.
 * The headshots are copies of the live page's photos, cropped to 3:4, in
 * assets/arrange/team/. Staging was cloned before the Nov 2026 uploads, so they
 * ship with the theme rather than coming from the media library.
 *
 * Drawn by patterns/meet-the-team.php (templates/page-meet-the-team.html).
 */
defined( 'ABSPATH' ) || exit;

/**
 * The team, in the live page's order.
 *
 * @return array<int,array{name:string,cred:string,role:string,photo:string,bio:string}>
 */
function ds_team_members() {
    return [
        [
            'name'  => 'Laurie',
            'cred'  => 'RDH',
            'role'  => 'Hygiene Coordinator',
            'photo' => 'laurie.webp',
            'bio'   => 'Laurie earned her Bachelor of Science in Dental Hygiene from West Virginia University in 1995 and joined Dr. Burns&rsquo; practice the year it opened. The care of her patients is of the utmost importance to her, and it shows in the compassion and gentleness she brings to every visit.',
        ],
        [
            'name'  => 'Megan',
            'cred'  => 'RDH',
            'role'  => 'Dental Hygienist',
            'photo' => 'megan.webp',
            'bio'   => 'Megan earned her Associate of Applied Science in Dental Hygiene from Virginia Western Community College in 2014. Her favorite part of the job is meeting new people and building a relationship with each of her patients. Born and raised in Page County, she does her best to make every visit comfortable and positive.',
        ],
        [
            'name'  => 'Ginger',
            'cred'  => 'CDA, DA II',
            'role'  => 'Clinical Coordinator',
            'photo' => 'ginger.webp',
            'bio'   => 'Ginger has been a dental assistant since 1995. In 2017 she graduated from Germanna College with her Expanded Function Dental Assistant license, and she keeps her CPR certification current. She has a true passion for patient care and deep expertise in sterilization, so every patient is kept safe.',
        ],
        [
            'name'  => 'Sara',
            'cred'  => 'CDA, DA II',
            'role'  => 'Lab Coordinator',
            'photo' => 'sara.webp',
            'bio'   => 'Sara completed the dental assisting program at Massanutten Technical Center in 2001. A board-certified dental assistant, she graduated from Germanna Community College in 2017 as a licensed expanded function dental assistant, and in 2020 earned her dental anesthesia assistant certification through the American Association of Oral and Maxillofacial Surgeons (AAOMS).',
        ],
        [
            'name'  => 'Teri',
            'cred'  => '',
            'role'  => 'Financial, Insurance &amp; Treatment Coordinator',
            'photo' => 'teri.webp',
            'bio'   => 'Teri earned her Associate&rsquo;s Degree in Accounting and Data Processing in 1988 and her Certified Nursing Assistant certification in 1995. Her role combines her love of patient care with helping patients understand their treatment and financing options while making the most of their insurance benefits.',
        ],
        [
            'name'  => 'Teresa',
            'cred'  => '',
            'role'  => 'Patient Coordinator',
            'photo' => 'teresa.webp',
            'bio'   => 'Teresa joined our team in 2004 and is the patient and treatment coordinator for Dr. Burns&rsquo; patients. She loves sharing the confidence and trust she has in Dr. Burns and the team, and makes sure every patient has a great experience. She is a Virginia licensed cosmetologist and master aesthetician.',
        ],
        [
            'name'  => 'Janie',
            'cred'  => '',
            'role'  => 'Patient Coordinator',
            'photo' => 'janie.webp',
            'bio'   => 'With more than 30 years in dentistry, Janie brings experience in both clinical and administrative roles, including regional management at the corporate level. Her heart has always been in small-practice dentistry, where she can get to know patients and help them feel comfortable and confident. She is a lifelong resident of the area.',
        ],
        [
            'name'  => 'Tara Weaver',
            'cred'  => '',
            'role'  => 'Patient Coordinator',
            'photo' => 'tara.webp',
            'bio'   => 'Tara is the patient coordinator for Dr. Whitney&rsquo;s patients. After years as a pharmacy technician, she joined our office in 2021. She loves working with referring offices, meeting new people and helping our patients.',
        ],
        [
            'name'  => 'Katie McNally',
            'cred'  => '',
            'role'  => 'Expanded Function Dental Assistant',
            'photo' => 'katie.webp',
            'bio'   => 'Katie completed the dental assistant program at Massanutten Technical Center in 2011, became Level 1 board certified in 2022, and graduated from Germanna Community College in 2023 as a licensed Expanded Function Dental Assistant. She loves to do it all, but oral surgery is her favorite.',
        ],
    ];
}

/** The Google headline and blurb for /meet-the-team/, in the SEO team's format. */
function ds_team_seo() {
    return [
        'Meet Our Dental Team in New Market, VA | Dr. Jeffrey Burns',
        'Meet the hygienists, dental assistants, and coordinators who care for Dr. Jeffrey Burns\' patients at his New Market, VA office. Call 540-740-8937.',
    ];
}

/**
 * Once per site, after the theme is updated:
 *  1. creates /meet-the-team/ if it doesn't exist (a page someone drafted or
 *     trashed is left alone);
 *  2. fills its Slim SEO headline and blurb if they are empty;
 *  3. points the old staff and team addresses at it. Both went to
 *     /meet-dr-burns/ only because the new site had no team page (SEO tracker
 *     Redirect Map #55 and Reclaim 404 Backlinks, 7 linking sites).
 * Runs after the v1.6.2 redirect cleanup (20) and Dale's v1.9.0 migration (25).
 */
add_action( 'init', function () {
    if ( get_option( 'ds_team_page_191_done' ) === '1' ) {
        return;
    }

    $page = get_page_by_path( 'meet-the-team' );
    if ( ! $page ) {
        $trashed = get_posts( [
            'post_type'   => 'page',
            'post_status' => 'trash',
            'name'        => 'meet-the-team__trashed',
            'numberposts' => 1,
        ] );
        if ( ! $trashed ) {
            $id   = wp_insert_post( [
                'post_title'   => 'Meet the Team',
                'post_name'    => 'meet-the-team',
                'post_type'    => 'page',
                'post_status'  => 'publish',
                'post_content' => '',
            ] );
            $page = $id && ! is_wp_error( $id ) ? get_post( $id ) : null;
        }
    }

    if ( $page ) {
        $meta = get_post_meta( $page->ID, 'slim_seo', true );
        $meta = is_array( $meta ) ? $meta : [];
        [ $title, $description ] = ds_team_seo();
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
    }

    $opt_name  = defined( 'SLIM_SEO_REDIRECTS' ) ? SLIM_SEO_REDIRECTS : 'ss_redirects';
    $redirects = get_option( $opt_name, [] );
    if ( $page && 'publish' === $page->post_status && is_array( $redirects ) ) {
        $sources = [
            'about-us/meet-the-staff'     => 'SEO tracker Redirect Map #55 (Medium): now the team page',
            'about-our-practice/our-team' => 'SEO tracker Reclaim 404 Backlinks (7 linking sites): now the team page',
        ];
        $found = [];
        foreach ( $redirects as $k => $r ) {
            if ( ! is_array( $r ) ) {
                continue;
            }
            $from = strtolower( trim( (string) ( $r['from'] ?? '' ), '/' ) );
            if ( ! isset( $sources[ $from ] ) ) {
                continue;
            }
            $found[ $from ] = true;
            // Only move a rule that still lands on Dr. Burns' page. One the SEO
            // team has pointed somewhere else on purpose stays as it is.
            $to = trim( (string) wp_parse_url( (string) ( $r['to'] ?? '' ), PHP_URL_PATH ), '/' );
            if ( 'meet-dr-burns' === $to ) {
                $redirects[ $k ]['to'] = home_url( '/meet-the-team/' );
            }
        }
        foreach ( $sources as $from => $note ) {
            if ( empty( $found[ $from ] ) ) {
                $redirects[ uniqid() ] = [
                    'type'             => 301,
                    'condition'        => 'exact-match',
                    'from'             => '/' . $from . '/',
                    'to'               => home_url( '/meet-the-team/' ),
                    'note'             => $note,
                    'enable'           => 1,
                    'ignoreParameters' => 1,
                ];
            }
        }
        update_option( $opt_name, $redirects );
    }

    update_option( 'ds_team_page_191_done', '1' );
}, 30 );
