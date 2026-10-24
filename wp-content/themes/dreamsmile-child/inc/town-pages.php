<?php
/**
 * The old site's copy for the /contact-us/ town pages, keyed by page slug.
 * Read through ds_town_copy(); drawn by patterns/town-page.php.
 *
 * Copied word for word from jeffreyburns.com, at the client's request
 * (2026-10-24: "take the content from the Harrisonburg service page on the old
 * site and copy it over"). The only changes are the client's standing rules:
 * "consultation" becomes "assessment".
 *
 * Every old town page has the same shape, which is what the keys follow:
 *   h1       — the page's one H1
 *   intro    — the two lines under the survey on the old page
 *   sections — five [ H2, paragraphs ] pairs, in the old order
 * The "Meet Dr. Jeffrey Burns" and DreamSmile blurbs were the same on every
 * town page, so they live in the pattern, not here.
 *
 * A town with an entry here gets templates/page-town.html (see the
 * page_template_hierarchy filter in functions.php). Towns without one keep
 * the default page template and whatever is in wp-admin.
 */
defined( 'ABSPATH' ) || exit;

// The old copy links "Dr. Jeffrey Burns" to the homepage in three places.
$dr = '<a href="/">Dr. Jeffrey Burns</a>';

return [

    'dental-implants-harrisonburg-area' => [
        'town'      => 'Harrisonburg',
        'state'     => 'VA',
        'h1'        => 'Dental Implants Near Harrisonburg, VA',
        'image'     => 'Harrisonburg-8locations.jpg',
        'image_alt' => 'The Rockingham County Courthouse in downtown Harrisonburg, VA',
        'travel'    => 'A short drive north on I-81 from Harrisonburg &mdash; easy highway access the whole way to our New Market office.',
        'intro'     => [
            'Missing teeth can affect more than your appearance&mdash;they can influence your daily comfort, eating habits, and even your confidence. For residents in the Harrisonburg area, dental implants offer a reliable, long-term solution that restores both function and aesthetics.',
            $dr . ' provides skilled implant care designed for precision, comfort, and natural-looking results.',
        ],
        'sections'  => [
            [
                'Tailored Implant Solutions for Harrisonburg Residents',
                [
                    'Every patient&rsquo;s needs are unique, and Dr. Jeffrey Burns ensures that Harrisonburg patients receive care personalized to their oral health, jaw structure, and lifestyle goals. From the initial evaluation to final restoration, each implant is carefully planned to provide stability, durability, and a natural appearance.',
                    'Implants replace tooth roots by anchoring directly into the jawbone, providing a strong foundation for replacement teeth. This method helps preserve bone and gum tissue, supporting oral health while allowing patients to eat, speak, and smile with confidence.',
                ],
            ],
            [
                'Why Dental Implants Are an Excellent Choice',
                [
                    'Dental implants are a preferred solution for long-lasting tooth replacement. They maintain jawbone integrity, prevent changes to facial structure, and offer superior stability compared to removable dentures or bridges. Harrisonburg patients often find that implants provide freedom from daily adhesives and give them the confidence to enjoy life without hesitation.',
                    'With proper care, implants can remain a permanent part of your smile for decades, making them a valuable investment in both oral function and appearance.',
                ],
            ],
            [
                'State-of-the-Art Technology for Successful Implant Placement',
                [
                    'At ' . $dr . ', modern diagnostic tools, including 3D imaging, ensure that each implant is placed with accuracy and precision. This technology enhances predictability, supports faster recovery, and allows for customized restorations that match the look and feel of your natural teeth.',
                    'Every step of the implant process is carefully coordinated, from assessment to placement to final restoration. Eligible patients may also benefit from streamlined procedures for a more efficient experience.',
                ],
            ],
            [
                'Comfort-Focused Care During Every Visit',
                [
                    'Patient comfort is a top priority. For those who feel anxious about dental procedures, sedation options are available to make the implant process more relaxing. Harrisonburg patients appreciate a supportive environment where every step is clearly explained, giving them confidence throughout treatment.',
                    'Before placing implants, your dentist evaluates bone and gum health and discusses any preparatory procedures needed to ensure successful results. All recommendations are explained in detail so you can make informed decisions.',
                ],
            ],
            [
                'A Long-Term Solution for a Complete Smile',
                [
                    'Dental implants offer a permanent, functional, and natural-looking solution for missing teeth. Residents of Harrisonburg rely on ' . $dr . ' for expert implant care, personalized attention, and long-lasting results, helping you enjoy a healthy, confident smile for years to come.',
                ],
            ],
        ],
    ],

];
