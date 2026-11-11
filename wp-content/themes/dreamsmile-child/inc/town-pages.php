<?php
/**
 * Copy for the 8 /contact-us/ town pages, keyed by page slug.
 * Read through ds_town_copy(); drawn by patterns/town-page.php.
 *
 * Rev 2 copy from the SEO team (Google Docs "Dental Implants Near <Town>, VA |
 * Dr. Jeffrey Burns (Rev 2)", sent 2026-11-11), word for word. Each doc gives
 * every town its own topic: Woodstock single implants vs bridges, Winchester
 * the drive and fewer trips, Timberville implant dentures, Luray sedation,
 * Harrisonburg full-arch and Teeth in a Day, Elkton extraction to implant,
 * Broadway 3D planning, Bridgewater cost and financing. The docs' links point
 * at jeffreyburns.com, and here they're site-relative: every one of those
 * pages is on the new site at the same address. The only other changes follow
 * standing client rules:
 *   - Winchester: Dr. Whitney's "same-day consultations" becomes
 *     "assessments" (client rule: never "consultation");
 *   - DreamSmile™ on the two headings that lacked the mark (Winchester's
 *     "The DreamSmile Approach" card and its warranty question);
 *   - Dr. Whitney's name links to his page while that page is published
 *     (ds_whitney_url(), SEO tracker Nov 2026).
 * The docs' optional town-specific Google reviews are left out: they wait on
 * client approval, and the site never shows reviews as one town's.
 *
 * The keys follow the page, top to bottom:
 *   h1        the page's one H1
 *   intro     the two short paragraphs under it, in the hero
 *   sections  [ H2, blocks, icon? ]: the first is the intro block after the
 *             survey, the next three are the three cards, the last is the
 *             closing call to action
 *   details   [ H2, blocks ] full-width sections after the cards (a table,
 *             steps, or both). Bridgewater has two.
 *   travel    the "Visit us" paragraphs above the map
 *   faq       [ question, answer ] pairs, drawn as an accordion after the
 *             map and printed as FAQPage schema (functions.php)
 *   january   the section headings of the January text that is still in the
 *             pages' WordPress editors (see below)
 * plus the hero image and its alt text.
 *
 * A block is a paragraph (an HTML string), or one of:
 *   [ 'ul' | 'ol' => '<li>…</li>…' ]  a list
 *   [ 'h3' => '…' ]                  a subheading
 *   [ 'table' => [ 'head' => [ cells ], 'rows' => [ [ cells ], … ],
 *                  'em' => [ 'col' => n ] | [ 'row' => n ] ] ]
 * A table's first cell in each row is that row's header. 'em' tints the
 * option the page argues for (the implant column or row), the way the
 * homepage comparison makes DreamSmile™ stand out.
 *
 * The "Meet Dr. Jeffrey Burns" and DreamSmile blurbs are the same on every
 * town page, so they live in the pattern. So does the service-area line under
 * "Visit us", which the docs restore from the live site.
 *
 * A town with an entry here gets templates/page-town.html (see the
 * page_template_hierarchy filter in functions.php). Text pasted into a page's
 * WordPress editor replaces this copy once it no longer has two or more of the
 * headings the theme already carries: the January ones (still in every editor
 * on staging, Nov 2026) or this copy's own. See ds_town_editor_copy(). So keep
 * the 'january' lists as they are.
 */
defined( 'ABSPATH' ) || exit;

$tm    = 'DreamSmile<sup class="ds-tm">&trade;</sup>';
$call  = 'Call <a href="tel:+15407408937">540-740-8937</a>';
$whit  = function_exists( 'ds_whitney_url' ) ? ds_whitney_url() : '';
$whit  = $whit ? '<a href="' . esc_url( $whit ) . '">Dr. James Whitney</a>' : 'Dr. James Whitney';

return [

    'dental-implants-harrisonburg-area' => [
        'town'      => 'Harrisonburg',
        'state'     => 'VA',
        'h1'        => 'Full-Arch Dental Implants and Teeth in a Day Near Harrisonburg, VA',
        'image'     => 'Harrisonburg-8locations.webp',
        'image_alt' => 'The Rockingham County Courthouse in downtown Harrisonburg, VA',
        'intro'     => [
            'When most of your teeth are failing or missing, replacing them one at a time is rarely the best plan. <a href="/">Dr. Jeffrey Burns</a> rebuilds complete smiles with full-arch <a href="/dental-implants/">dental implants</a> in New Market, about 25 minutes north of Harrisonburg on I-81.',
            'Every case is planned from 3D scans, so you know what to expect before treatment starts.',
        ],
        'sections'  => [
            [
                'Is Full-Arch Treatment Right for You?',
                [
                    'Full-arch implants replace an entire upper or lower set of teeth on four to six implants. They are often the right fit if you:',
                    [ 'ul' => '<li>Have many teeth that are broken, decayed, or loose from gum disease</li><li>Wear a full or partial denture that no longer fits or stays in place</li><li>Have been told you need several extractions, bridges, and root canals</li><li>Want fixed teeth that do not come out at night</li>' ],
                ],
            ],
            [
                'Full-Arch Options',
                [
                    'Not every patient needs the same approach. Dr. Burns will review three options with you:',
                    [ 'ul' => '<li>Fixed full-arch teeth (All-on-X), removed only by the dentist</li><li>Snap-in implant dentures that come out for cleaning</li><li>Traditional implant bridges</li>' ],
                    'See our <a href="/restorative-dentistry/full-mouth-reconstruction/">full mouth reconstruction</a> page for more.',
                ],
                'tooth',
            ],
            [
                'Comfort for Longer Procedures',
                [
                    'Full-arch surgery is usually done under sedation. Our office offers <a href="/anesthesia/">IV sedation and general anesthesia</a>, provided by board-certified anesthesiologists and certified nurse anesthetists.',
                    'Small openings in the gum mean less swelling and bruising, and most patients return to normal activities the next day.',
                ],
                'shield',
            ],
            [
                '30 Years of Full-Arch Experience',
                [
                    'Dr. Burns earned his dental degree from West Virginia University in 1994, trained at the Midwest Implant Institute, and created the Burns Protocol, a six-step system he has taught to dentists nationwide.',
                    'Qualifying full-arch cases are part of his DreamSmile program, backed by the DreamSmile Warranty with coverage of up to a lifetime.',
                ],
                'award',
            ],
            [
                'Schedule Your ' . $tm . ' Assessment',
                [
                    'Find out whether Teeth in a Day or another full-arch option fits your needs. ' . $call . ' to schedule your ' . $tm . ' Assessment with Dr. Burns.',
                ],
            ],
        ],
        'details'   => [
            [
                'How Teeth in a Day Works',
                [
                    '<a href="/full-mouth-dental-implants/">Teeth in a Day</a> gives you a full set of working teeth on implants in a single procedure. It uses a system developed by Nobel Biocare, and the planning happens before you ever sit in the chair.',
                    [ 'ol' => '<li><strong>3D scan and virtual planning:</strong> A cone beam CT scan of your jaw becomes a 3D model, and Dr. Burns plans every implant on the computer.</li><li><strong>Teeth made in advance:</strong> Your new teeth are made before surgery, so they are ready the day the implants go in.</li><li><strong>Guided, minimally invasive placement:</strong> A surgical guide places the implants through small openings in the gum rather than larger incisions.</li><li><strong>Leave with teeth:</strong> Your teeth are attached the same day. Most patients return to normal activities the next day.</li>' ],
                    'Teeth in a Day is not right for every case. If bone is limited, Dr. Burns may recommend grafting first or a snap-in denture, and he will explain why using your 3D scan.',
                ],
            ],
        ],
        'travel'    => [
            'About 20 miles north on I-81, roughly 25 minutes from downtown Harrisonburg or the JMU area. Take exit 264 and follow US-211 into New Market.',
            'Full-arch surgery is usually done under sedation, so arrange for an adult to drive you home.',
        ],
        'faq'       => [
            [ 'Can I really get new teeth in one day?', 'Yes, for patients who qualify. With Teeth in a Day, the implants are placed and a full set of teeth is attached in the same procedure. A 3D scan at your ' . $tm . ' Assessment shows whether you are a candidate.' ],
            [ 'How many implants does a full arch need?', 'Usually four to six per arch, depending on your bone and the type of restoration.' ],
            [ 'What is All-on-X?', 'A fixed full set of teeth attached to four to six implants per arch. Only the dentist removes it, and it feels closest to natural teeth.' ],
            [ 'Is there a warranty on full-arch treatment?', 'Qualifying cases are part of the DreamSmile program, backed by the DreamSmile Warranty with coverage of up to a lifetime.' ],
            [ 'Is Teeth in a Day painful?', 'The implants are placed under sedation through small openings in the gum, which means less swelling, bruising, and discomfort. Most patients return to normal activities the next day.' ],
            [ 'Why choose a New Market implant dentist over one in Harrisonburg?', 'Full-arch treatment is complex, and experience matters. Our office combines more than 30 years of implant focus, 3D imaging, guided surgery, and on-site anesthesia, about 25 minutes from Harrisonburg.' ],
        ],
        'january'   => [
            'Tailored Implant Solutions for Harrisonburg Residents',
            'Why Dental Implants Are an Excellent Choice',
            'State-of-the-Art Technology for Successful Implant Placement',
            'Comfort-Focused Care During Every Visit',
            'A Long-Term Solution for a Complete Smile',
        ],
    ],

    'winchester-dentist-dental-implants' => [
        'town'      => 'Winchester',
        'state'     => 'VA',
        'h1'        => 'Dental Implants Near Winchester, VA: Worth the Drive to New Market',
        'image'     => 'Winchester-8locations.webp',
        'image_alt' => 'The Old Town walking mall in Winchester, VA',
        'intro'     => [
            'Patients drive about 50 miles south from Winchester because implant results depend on experience. <a href="/">Dr. Jeffrey Burns</a> has focused on <a href="/dental-implants/">dental implants</a> and reconstructive dentistry for more than 30 years, and his office keeps out-of-town trips to a minimum.',
            'Here is what makes the drive from Frederick County worth it.',
        ],
        'sections'  => [
            [
                'Fewer Trips, Planned Around Your Drive',
                [
                    'Every extra appointment costs a Winchester patient about two hours round trip. Our in-house <a href="/dental-crowns/">CEREC system</a> mills implant crowns on site, so many single implants need just two main visits: one for surgery and one for the crown.',
                    'Your 3D cone beam scan is taken at your first visit, so planning starts right away instead of after an outside referral.',
                ],
            ],
            [
                'Surgery and Anesthesia Under One Roof',
                [
                    'Everything your implant needs happens in our New Market office:',
                    [ 'ul' => '<li>Oral surgeon ' . $whit . ', with more than 40 years of experience, offers same-day assessments</li><li>Board-certified anesthesiologists and certified nurse anesthetists provide <a href="/anesthesia/">IV sedation and general anesthesia</a></li><li>3D imaging, 3D-printed surgical guides, and CEREC crowns are all in-house</li>' ],
                    'You are not sent to a hospital, surgery center, or outside lab.',
                ],
                'shield',
            ],
            [
                'The ' . $tm . ' Approach',
                [
                    'Every DreamSmile case follows the Burns Protocol, the six-step planning and placement system Dr. Burns teaches to dentists nationwide.',
                    [ 'ul' => '<li>Premium materials from top dental labs</li><li>The DreamSmile Warranty, with coverage of up to a lifetime</li><li>Dr. Burns&rsquo; personal cell number, so a question between visits does not turn into a drive</li><li>A DreamSmile Care Kit to protect your new teeth from day one</li>' ],
                ],
                'sparkle',
            ],
            [
                'Experience You Can Check',
                [
                    'Dr. Burns earned his dental degree from West Virginia University in 1994 and trained at the Midwest Implant Institute. His smile reconstructions have earned gold medals and the People&rsquo;s Choice Award from the American Academy of Cosmetic Dentistry.',
                    'Need a full set of teeth? See same-day options on our <a href="/full-mouth-dental-implants/">full-mouth dental implants</a> page, or read his background on <a href="/meet-dr-burns/">Meet Dr. Burns</a>.',
                ],
                'award',
            ],
            [
                'Schedule Your ' . $tm . ' Assessment',
                [
                    'See whether you qualify for a DreamSmile and how few trips your treatment will take. ' . $call . ' to book your ' . $tm . ' Assessment with Dr. Burns.',
                ],
            ],
        ],
        'details'   => [
            [
                'What Your Trips to New Market Look Like',
                [
                    'For a single implant, most Winchester patients make two main trips, plus a short follow-up if needed.',
                    [ 'table' => [
                        'head' => [ 'Visit', 'What happens' ],
                        'rows' => [
                            [ '1. ' . $tm . ' Assessment', 'Exam, 3D cone beam scan in our office, and your treatment plan and price' ],
                            [ '2. Implant surgery', 'Guided placement with a 3D-printed guide; IV sedation available' ],
                            [ '3. Crown placement', 'CEREC crown designed and milled in our office, then attached' ],
                            [ 'As needed', 'A short follow-up to check healing; extra visits for grafting or full-arch cases' ],
                        ],
                    ] ],
                    'Many Winchester patients book the first appointment of the morning or the last of the afternoon to avoid traffic. If you will have IV sedation, plan for an adult to drive you home.',
                    'Coming from farther away? Ask when you book about combining steps so your trips stay to a minimum.',
                ],
            ],
        ],
        'travel'    => [
            'About 50 miles south on I-81, roughly 45 to 50 minutes. Take exit 264 for New Market and follow US-211 to our office at 9626 South Congress St.',
        ],
        'faq'       => [
            [ 'How many trips to New Market will my implant take?', 'For a single implant, usually two main appointments: surgery, then crown placement. Full-arch cases and cases that need a bone graft take more visits, and we map them out at your ' . $tm . ' Assessment.' ],
            [ 'Why drive from Winchester for implants?', 'More than 30 years of implant focus, 3D imaging, in-house crowns, on-site anesthesia, and an oral surgeon on the team, all in one office.' ],
            [ 'What does the ' . $tm . ' Warranty cover?', 'DreamSmile restorations carry warranty coverage of up to a lifetime. Ask at your ' . $tm . ' Assessment for the terms that apply to your plan.' ],
            [ 'Can I get a full set of teeth in one day?', 'Patients who qualify can have Teeth in a Day: implants are placed and a full set of teeth is attached in the same procedure.' ],
            [ 'Do you take insurance or offer financing?', 'Our office bills your insurance as a courtesy, and patients can finance treatment through CareCredit or Cherry, subject to approval.' ],
            [ 'Is sedation available?', 'Yes. IV sedation and general anesthesia are provided in our office by board-certified anesthesiologists and certified nurse anesthetists.' ],
        ],
        'january'   => [
            'Personalized Implant Care for Winchester Patients',
            'Benefits of Choosing Dental Implants',
            'Advanced Technology for Accurate Results',
            'Comfort and Care Every Step of the Way',
            'Restore Your Smile for Life',
        ],
    ],

    'cosmetic-dentist-elkton-area' => [
        'town'      => 'Elkton',
        'state'     => 'VA',
        'h1'        => 'From Failing Tooth to Dental Implant Near Elkton, VA',
        'image'     => 'Elkton-8locations.webp',
        'image_alt' => 'Storefronts and flags on the main street of Elkton, VA',
        'intro'     => [
            'A cracked molar, deep decay, or a tooth that keeps flaring up after a root canal eventually cannot be saved. <a href="/">Dr. Jeffrey Burns</a> handles the whole path from removing the tooth to placing a <a href="/dental-implants/">dental implant</a>, all at his New Market office.',
            'Planning the implant before the tooth comes out protects the bone and can save months.',
        ],
        'sections'  => [
            [
                'Signs a Tooth May Need to Be Replaced',
                [
                    [ 'ul' => '<li>A crack that runs below the gumline</li><li>Decay too deep to support a filling or crown</li><li>A tooth that has already had a root canal and is infected again</li><li>A tooth loosened by advanced gum disease</li>' ],
                    'Dr. Burns always looks at whether a tooth can be saved first. When it cannot, a gentle <a href="/tooth-extraction/">tooth extraction</a> is the first step toward the implant.',
                ],
            ],
            [
                'What a Dental Implant Is Made Of',
                [
                    'An implant replaces the root and the visible tooth. It has three parts:',
                    [ 'ol' => '<li><strong>The implant:</strong> A small titanium post placed in the jawbone. The bone bonds to it over the following months, a process called osseointegration.</li><li><strong>The abutment:</strong> A connector attached to the top of the implant.</li><li><strong>The crown:</strong> The visible tooth, made in our office with CEREC and matched to your natural teeth. Learn more about <a href="/dental-crowns/">dental crowns</a>.</li>' ],
                ],
                'tooth',
            ],
            [
                'Same-Day Extraction and Implant',
                [
                    'When the bone around the tooth is healthy, Dr. Burns can place the implant right after removing the tooth, which saves a separate surgery. If there is infection or damaged bone, the site heals first.',
                    'In many cases a temporary tooth can be attached so you are not left with a gap.',
                ],
                'clock',
            ],
            [
                'When a Bone Graft Is Needed',
                [
                    'Bone starts to shrink as soon as a tooth is gone, and up to one third of the jaw&rsquo;s thickness can be lost in the first year. After a month or more, a <a href="/bone-grafting/">bone graft</a> is often needed first. Grafting at the time of extraction can preserve the socket.',
                    'Our office uses L-PRF grafting, made from a small sample of your own blood, to support healing, and an Osstell IDX device to confirm the implant is ready for its crown.',
                ],
                'shield',
            ],
            [
                'Schedule Your ' . $tm . ' Assessment',
                [
                    'If a tooth is causing trouble, plan the replacement before it is removed. ' . $call . ' to schedule your ' . $tm . ' Assessment with Dr. Burns.',
                ],
            ],
        ],
        'details'   => [
            [
                'From Extraction to Final Crown',
                [
                    'Every case is planned from a 3D cone beam scan taken in our office, so you know your timeline at the first visit.',
                    [ 'table' => [
                        'head' => [ 'Step', 'What happens', 'Typical timing' ],
                        'rows' => [
                            [ '1. Assessment and 3D scan', 'Dr. Burns checks whether the tooth can be saved and plans the implant', 'First visit' ],
                            [ '2. Extraction', 'Gentle removal, with socket grafting if needed', 'Often the same visit as the implant' ],
                            [ '3. Bone graft, if needed', 'Rebuilds the bone so the implant has a solid base', 'About 4 months of healing' ],
                            [ '4. Implant placement', 'Titanium post placed; a temporary tooth can often be attached', '30 to 60 minutes' ],
                            [ '5. Healing', 'Bone bonds to the implant; Osstell IDX checks stability', '4 to 6 months from start' ],
                            [ '6. Final crown', 'CEREC crown made in our office and attached', 'Final visit' ],
                        ],
                    ] ],
                ],
            ],
        ],
        'travel'    => [
            'About 40 minutes. The usual route is US-33 west to Harrisonburg, then I-81 north to exit 264.',
            'You can also take US-340 north to Luray and US-211 west over the mountain into New Market.',
        ],
        'faq'       => [
            [ 'Can my tooth be pulled and replaced with an implant in the same visit?', 'Often, yes, if there is no infection and the bone is healthy. Dr. Burns will confirm with a 3D scan.' ],
            [ 'Will I need a bone graft?', 'If the tooth has been missing for a month or more, usually yes. If the tooth is still in place, grafting at the time of extraction can often prevent a larger graft later.' ],
            [ 'Can a cracked tooth be saved?', 'Sometimes. Dr. Burns always checks first. A crack that runs below the gumline usually means the tooth needs to come out.' ],
            [ 'How long does the whole process take?', 'Most implants take 4 to 6 months from start to finish, plus about 4 months if a bone graft is needed.' ],
            [ 'Will I have a gap while the implant heals?', 'In many cases a temporary tooth can be attached so you are not left with a gap.' ],
            [ 'What is the best route from Elkton?', 'US-33 west to I-81 north is usually the quickest. The drive takes about 40 minutes.' ],
        ],
        'january'   => [
            'Serving the Elkton Community with Implant-Focused Care',
            'Why Implants Are a Trusted Tooth Replacement Option',
            'Advanced Technology for Predictable Results',
            'Comfort-Centered Treatment Experience',
            'A Lasting Investment in Your Smile',
        ],
    ],

    'dental-implants-dentist-near-bridgewater' => [
        'town'      => 'Bridgewater',
        'state'     => 'VA',
        'h1'        => 'Dental Implants Near Bridgewater, VA: Options, Cost, and Financing',
        'image'     => 'burns-consultation.webp',
        'image_alt' => 'Dr. Burns going over a 3D implant scan with a patient',
        'intro'     => [
            'For many Bridgewater residents, the first question about implants is what they will cost and how to pay for them. <a href="/">Dr. Jeffrey Burns</a> provides <a href="/dental-implants/">dental implants</a> in New Market, about 40 minutes away, and gives every patient a specific price before work begins.',
            'Here are your options, what drives the price, and how to pay.',
        ],
        'sections'  => [
            [
                'Your Implant Options',
                [
                    [ 'ul' => '<li><strong>Single tooth implant:</strong> One implant and a crown replace one tooth without touching the teeth beside it.</li><li><strong>Implant-supported bridge:</strong> Two implants support a bridge that replaces several teeth in a row, with no removable partial.</li><li><strong>Full-arch teeth (All-on-X):</strong> A full upper or lower set of teeth anchored on four to six implants.</li><li><strong>Implant-supported dentures:</strong> A denture that <a href="/implant-supported-dentures/">snaps onto implants</a> for a secure fit at a lower cost than fixed teeth.</li>' ],
                ],
            ],
            [
                'What Affects the Cost of Dental Implants',
                [
                    'No two cases cost the same, which is why we do not quote prices without seeing you. The total depends on:',
                    [ 'ul' => '<li>How many teeth are being replaced and how many implants are needed</li><li>Extractions of failing teeth, if any</li><li>Bone grafting or a sinus lift, if the bone needs rebuilding</li><li>The type of restoration, from a single crown to fixed full-arch teeth</li><li>Imaging, sedation, and follow-up care. See our <a href="/implant-cost/">dental implant cost</a> page.</li>' ],
                ],
                'dollar',
            ],
            [
                'Why Implants Often Cost Less Over Time',
                [
                    'A bridge or denture usually costs less up front, but both typically need repair or replacement every 5 to 10 years.',
                    'A properly placed and cared-for implant can last a lifetime, and it protects the jawbone from the shrinking that leads to more dental work later.',
                ],
                'clock',
            ],
            [
                'Insurance and Financing',
                [
                    [ 'ul' => '<li><strong>Insurance:</strong> Check with your carrier on what it covers. Our office bills your insurance and tracks the claim for you.</li><li><strong>CareCredit:</strong> No interest if paid in full within six months on qualifying purchases of $200 or more, subject to approval. See <a href="/financing/">financing</a>.</li><li><strong>Cherry:</strong> Another financing option, subject to approval.</li><li><strong>Other payment:</strong> Cash, check, Visa, MasterCard, Discover, and American Express.</li>' ],
                ],
                'card',
            ],
            [
                'Schedule Your ' . $tm . ' Assessment',
                [
                    'Get a clear plan and an exact price for your case. ' . $call . ' to schedule your ' . $tm . ' Assessment with Dr. Burns.',
                ],
            ],
        ],
        'details'   => [
            [
                'Long-Term Cost Compared',
                [
                    'When you compare quotes, look at what each option costs over the years, not just on day one.',
                    [ 'table' => [
                        'head' => [ 'Option', 'Up-front cost', 'Typical lifespan', 'Effect on jawbone' ],
                        'rows' => [
                            [ 'Removable denture or partial', 'Lowest', 'Often relined or replaced every 5 to 10 years', 'Bone keeps shrinking' ],
                            [ 'Traditional bridge', 'Moderate', 'Often replaced every 5 to 10 years', 'Bone under the gap keeps shrinking' ],
                            [ 'Dental implant', 'Highest', 'Can last a lifetime with care', 'Keeps the bone in use' ],
                        ],
                        'em'   => [ 'row' => 2 ],
                    ] ],
                ],
            ],
            [
                'The Implant Process, Step by Step',
                [
                    [ 'ol' => '<li><strong>Assessment and 3D imaging:</strong> A cone beam CT scan in our office lets Dr. Burns plan each implant and give you an accurate quote.</li><li><strong>Preparation, if needed:</strong> Extractions, <a href="/bone-grafting/">bone grafting</a>, or a sinus lift rebuild the foundation.</li><li><strong>Guided placement:</strong> The implant is placed with a 3D-printed surgical guide, with <a href="/anesthesia/">sedation options</a> for your comfort.</li><li><strong>Healing:</strong> The bone bonds to the implant over the following months. A temporary tooth can often be attached.</li><li><strong>Final restoration:</strong> Your crown, bridge, or denture is attached. Single crowns are made in our office with CEREC.</li>' ],
                    'Most implants take 4 to 6 months from start to finish, plus about 4 months if a bone graft is needed.',
                ],
            ],
        ],
        'travel'    => [
            'About 40 minutes. Take Route 42 north into Harrisonburg, then I-81 north to exit 264, and follow US-211 into New Market to 9626 South Congress St.',
        ],
        'faq'       => [
            [ 'How much do dental implants cost?', 'It depends on how many teeth you are replacing, whether you need grafting, and the type of restoration. We give you a specific price for your case at your ' . $tm . ' Assessment.' ],
            [ 'Does dental insurance cover implants?', 'Some plans cover part of the cost. Check with your carrier, and our office will bill your insurance for you.' ],
            [ 'Do you offer payment plans?', 'Yes. Patients can finance treatment through CareCredit or Cherry, subject to approval.' ],
            [ 'Do you give a price before treatment starts?', 'Yes. You get a clear treatment plan and a specific price at your ' . $tm . ' Assessment, before any work begins.' ],
            [ 'Are implants worth the higher up-front cost?', 'For many patients, yes. A bridge or denture often needs repair or replacement every 5 to 10 years, while a well-cared-for implant can last a lifetime and protects the jawbone.' ],
            [ 'What payment methods do you accept?', 'Cash, check, Visa, MasterCard, Discover, and American Express, plus financing through CareCredit or Cherry.' ],
        ],
        'january'   => [
            'Comprehensive Implant Care for Bridgewater Patients',
            'The Advantages of Choosing Implants',
            'Precision Technology for Successful Implant Placement',
            'Comfort and Support Throughout Treatment',
            'Restore Your Smile with Confidence',
        ],
    ],

    'dentist-near-woodstock-cosmetic-implants' => [
        'town'      => 'Woodstock',
        'state'     => 'VA',
        'h1'        => 'Single-Tooth Dental Implants Near Woodstock, VA',
        'image'     => 'Woodstock-8locations.webp',
        'image_alt' => 'Aerial view of Woodstock, VA in the Shenandoah Valley',
        'intro'     => [
            'Losing one tooth affects how you chew, lets nearby teeth drift, and starts a slow loss of jawbone. <a href="/">Dr. Jeffrey Burns</a> replaces missing teeth with <a href="/dental-implants/">dental implants</a> at his New Market office, about 15 minutes south of Woodstock on I-81.',
            'Weighing an implant against a bridge? Here is how the two compare.',
        ],
        'sections'  => [
            [
                'How a Single Implant Replaces a Tooth',
                [
                    'An implant replaces the whole tooth, root included. A small titanium post is placed in the jaw, the bone bonds to it over several months, and a custom <a href="/dental-crowns/">crown</a> goes on top. Nothing is anchored to your other teeth, and you brush and floss it like a natural tooth.',
                    'Our in-house CEREC system designs and mills implant crowns, so many single-tooth cases need just two main appointments: one for surgery and one for the crown.',
                ],
            ],
            [
                'Why an Implant Protects Your Other Teeth',
                [
                    'A traditional <a href="/dental-bridges/">bridge</a> fills a gap by shaving down the healthy teeth on both sides so they can hold crowns. An implant stands on its own and leaves those teeth untouched.',
                    'Cleaning is simpler too. A bridge needs floss threaders underneath, while an implant crown is brushed and flossed like your other teeth.',
                ],
                'tooth',
            ],
            [
                'Protecting the Jawbone for the Long Term',
                [
                    'A bridge sits on the gums, so the bone under the gap keeps shrinking. As much as one third of the jaw&rsquo;s thickness can be lost in the first year after an extraction. An implant replaces the root and keeps that bone in use.',
                    'Bridges typically need repair or replacement every 5 to 10 years. A well-placed, well-maintained implant can last a lifetime, which often makes it the better value over time.',
                ],
                'shield',
            ],
            [
                'Are You a Candidate for a Single Implant?',
                [
                    'Most adults in good general health can get an implant. A good candidate has:',
                    [ 'ul' => '<li>Healthy gums, or gum disease treated before the implant</li><li>Enough jawbone to hold the implant, or a small <a href="/bone-grafting/">bone graft</a> to rebuild it</li><li>A 3D cone beam scan showing where the bone, nerve, and sinus sit</li>' ],
                    'If the tooth has been missing for a month or more, a graft is often needed first.',
                ],
                'check',
            ],
            [
                'Schedule Your ' . $tm . ' Assessment',
                [
                    'Missing a tooth or told you need a bridge? Get a second opinion on whether an implant is the better long-term fix. ' . $call . ' to book your ' . $tm . ' Assessment with Dr. Burns.',
                ],
            ],
        ],
        'details'   => [
            [
                'Implant vs. Bridge at a Glance',
                [
                    'Here is how the two most common fixes for one missing tooth compare.',
                    [ 'table' => [
                        'head' => [ '', 'Dental implant', 'Traditional bridge' ],
                        'rows' => [
                            [ 'Neighboring teeth', 'Left untouched', 'Shaved down to hold crowns' ],
                            [ 'Jawbone', 'Kept in use by the implant root', 'Keeps shrinking under the gap' ],
                            [ 'Typical lifespan', 'Can last a lifetime with care', 'Often redone every 5 to 10 years' ],
                            [ 'Up-front cost', 'Higher', 'Lower' ],
                            [ 'Cleaning', 'Brush and floss like a natural tooth', 'Needs floss threaders underneath' ],
                            [ 'Appointments', 'Usually two main visits over 4 to 6 months', 'Usually three visits' ],
                        ],
                        'em'   => [ 'col' => 1 ],
                    ] ],
                    'A bridge can still be the right choice when the teeth beside the gap already need crowns. Dr. Burns will walk through both options using 3D images of your jaw.',
                    '<strong>Your single-implant timeline:</strong>',
                    [ 'ol' => '<li><strong>Assessment and 3D scan:</strong> Dr. Burns checks your bone and plans the implant.</li><li><strong>Bone graft, if needed:</strong> Rebuilds the area and adds about 4 months of healing.</li><li><strong>Implant placement:</strong> Usually 30 to 60 minutes with local anesthetic or sedation.</li><li><strong>Healing:</strong> The bone bonds to the implant over the following months.</li><li><strong>Final crown:</strong> Your CEREC crown is made in our office and attached.</li>' ],
                ],
            ],
        ],
        'travel'    => [
            'About 15 minutes south on I-81 to exit 264, then US-211 into New Market. Both Woodstock and New Market are in Shenandoah County.',
            'Placing a single implant usually takes 30 to 60 minutes, so most Woodstock patients fit it into a morning.',
        ],
        'faq'       => [
            [ 'How far is Dr. Burns&rsquo; office from Woodstock?', 'About 15 minutes south on I-81. Our office is just off exit 264 in New Market.' ],
            [ 'Is an implant better than a bridge for one missing tooth?', 'For most patients, yes. An implant protects the neighboring teeth and the jawbone and can last a lifetime. A bridge may make sense if the teeth on both sides already need crowns.' ],
            [ 'How many visits does a single implant take?', 'Usually two main appointments: implant surgery, then a CEREC crown made in our office. The full process takes 4 to 6 months, plus about 4 months if a bone graft is needed.' ],
            [ 'Does getting an implant hurt?', 'The area is fully numbed with local anesthetic, and sedation is available. Most patients return to work the next day and manage soreness with over-the-counter medication.' ],
            [ 'How long does a dental implant last?', 'With good care and regular cleanings, the implant post can last a lifetime.' ],
        ],
        'january'   => [
            'Serving Woodstock with Personalized Implant Solutions',
            'The Benefits of Dental Implants',
            'Advanced Technology for Reliable Results',
            'Comfort-Focused Care Throughout Treatment',
            'Restore Your Smile with Confidence',
        ],
    ],

    'cosmetic-dentist-near-luray' => [
        'town'      => 'Luray',
        'state'     => 'VA',
        'h1'        => 'Comfortable Dental Implants Near Luray, VA',
        'image'     => 'Luray-8locations.webp',
        'image_alt' => 'Shops and hanging flower baskets on Main Street in Luray, VA',
        'intro'     => [
            'Many people put off implants for one reason: fear of the dental chair. <a href="/">Dr. Jeffrey Burns</a> places <a href="/dental-implants/">dental implants</a> for Luray and Page County patients with a full range of sedation, including sleep dentistry, at his New Market office.',
            'You do not have to be awake and tense for your procedure.',
        ],
        'sections'  => [
            [
                'Sedation Options for Implant Surgery',
                [
                    'Every implant procedure starts with local anesthetic, so the area is fully numb. From there, you choose how relaxed you want to be.',
                    'Our <a href="/anesthesia/">anesthesia</a> options range from staying awake and numb to being fully asleep. They are compared in the table below.',
                ],
            ],
            [
                'Anesthesia Specialists in Our Office',
                [
                    'We partner with Anesthesia Connections Dental, whose anesthesiologists are medical doctors board-certified in adult and pediatric anesthesia, and we also work with certified nurse anesthetists.',
                    'We are the only general dental office in the area with both. Your anesthesia plan is reviewed with you before treatment.',
                ],
                'shield',
            ],
            [
                'Fewer, Longer Visits Under Sedation',
                [
                    'For many anxious patients, the best approach is to combine treatment into fewer appointments. One implant takes about 30 to 60 minutes to place, and several implants take 2 to 3 hours.',
                    'That means a lot can often be done in a single visit while you rest comfortably.',
                ],
                'clock',
            ],
            [
                'What to Expect Before and After',
                [
                    [ 'ul' => '<li>Do not eat or drink for 8 hours before IV sedation or general anesthesia</li><li>Bring an adult to drive you home after oral sedation, IV sedation, or general anesthesia</li><li>Plan to rest the rest of the day; most patients return to work the next day</li><li>Soreness is usually managed with over-the-counter medication</li>' ],
                ],
                'check',
            ],
            [
                'Schedule Your ' . $tm . ' Assessment',
                [
                    'Tell us what worries you most, and we will build your plan around it. ' . $call . ' to schedule your ' . $tm . ' Assessment with Dr. Burns.',
                ],
            ],
        ],
        'details'   => [
            [
                'Sedation Options at a Glance',
                [
                    'Here is how each level of sedation works and what to plan for.',
                    [ 'table' => [
                        'head' => [ 'Option', 'How it is given', 'How you feel', 'Driver needed?' ],
                        'rows' => [
                            [ 'Local anesthetic', 'Injection at the treatment site', 'Awake, area fully numb', 'No' ],
                            [ 'Oral sedation', 'A pill about an hour before your visit', 'Awake but relaxed', 'Yes' ],
                            [ 'IV twilight sedation', 'Through an IV in our office', 'Drift in and out of sleep, little memory afterward', 'Yes' ],
                            [ 'General anesthesia', 'Given by an anesthesiologist', 'Fully asleep', 'Yes' ],
                        ],
                    ] ],
                    'General anesthesia may be recommended for longer cases or severe anxiety. Recovery from IV sedation is quicker.',
                    '<strong>Tips for nervous patients:</strong>',
                    [ 'ul' => '<li>Tell us what worries you most at your ' . $tm . ' Assessment</li><li>Ask about combining treatment into fewer, longer visits under sedation</li><li>Bring someone you trust to drive you and stay nearby</li><li>Plan a quiet rest of the day at home</li>' ],
                ],
            ],
        ],
        'travel'    => [
            'About 25 to 30 minutes west on US-211, over Massanutten Mountain through the New Market Gap, then into New Market.',
            'If you are having sedation, plan for a driver who is comfortable with the mountain road.',
        ],
        'faq'       => [
            [ 'Can I be asleep for my implant surgery?', 'Yes. General anesthesia is available in our office, and IV twilight sedation lets you rest comfortably with little memory of the procedure.' ],
            [ 'Who provides the sedation?', 'Board-certified anesthesiologists from Anesthesia Connections Dental and certified nurse anesthetists, in our New Market office.' ],
            [ 'Will I feel anything during implant surgery?', 'Every procedure starts with local anesthetic so the area is fully numb, and sedation lets you relax or sleep through it.' ],
            [ 'How many implants can be placed in one visit?', 'Several. One implant takes about 30 to 60 minutes, and several take 2 to 3 hours, which many anxious patients prefer to do in one sedated visit.' ],
            [ 'Do I need someone to drive me home to Luray?', 'Yes, for oral sedation, IV sedation, and general anesthesia.' ],
            [ 'Who monitors me during IV sedation?', 'A board-certified anesthesiologist or certified nurse anesthetist, in our office. Your anesthesia plan is reviewed with you in advance.' ],
            [ 'How long is the drive from Luray?', 'About 25 to 30 minutes west on US-211 through the New Market Gap.' ],
        ],
        'january'   => [
            'Personalized Implant Care for Luray Residents',
            'Why Dental Implants Are the Preferred Choice',
            'Advanced Technology for Accurate Implant Placement',
            'Comfort and Support Throughout Treatment',
            'Invest in Your Smile with Dental Implants',
        ],
    ],

    'cosmetic-dentist-near-broadway' => [
        'town'      => 'Broadway',
        'state'     => 'VA',
        'h1'        => 'Precision-Planned Dental Implants Near Broadway, VA',
        'image'     => 'Broadway-8locations.webp',
        'image_alt' => 'Storefronts on Main Street in Broadway, VA',
        'intro'     => [
            'Where an implant sits in the bone, its angle, and how it meets your bite decide how it looks and how long it lasts. <a href="/">Dr. Jeffrey Burns</a> plans every <a href="/dental-implants/">dental implant</a> in 3D at his New Market office, about 20 minutes from Broadway.',
            'Here is the technology that makes the result predictable.',
        ],
        'sections'  => [
            [
                '3D Cone Beam Imaging',
                [
                    'A standard X-ray is flat. It cannot show the width of your jawbone, the nerve in your lower jaw, or how close your sinus sits. Our Sirona XG3D cone beam scanner captures all of that in one scan.',
                    [ 'ul' => '<li>Focused on your area of concern, which limits radiation exposure</li><li>Taken in our office at your ' . $tm . ' Assessment, so planning starts right away</li><li>Read by Beam Readers, an outside group of radiologists who return a detailed report within 24 hours</li>' ],
                ],
            ],
            [
                'Virtual Planning and 3D-Printed Surgical Guides',
                [
                    'Using your scan, Dr. Burns sets the location, depth, angle, and size of each implant on the computer, then prints a custom surgical guide in our office. During surgery, the guide directs the implant to the planned position.',
                    'That means smaller openings in the gum, shorter procedures, and less swelling. Learn <a href="/how-dental-implants-work/">how dental implants work</a>.',
                ],
                'cpu',
            ],
            [
                'Testing That the Implant Is Ready',
                [
                    'Before your crown goes on, our Osstell IDX device measures implant stability with a precise number, so the crown is placed only when the implant has bonded firmly to the bone.',
                    'When grafting is needed, we use L-PRF <a href="/bone-grafting/">bone grafting</a>, made from a small sample of your own blood, to support healing.',
                ],
                'check',
            ],
            [
                'Crowns Made in Our Office',
                [
                    'Our <a href="/dental-crowns/">CEREC system</a> scans the implant and mills the crown in our office, which keeps the fit precise. Many single-implant cases need only two main appointments: surgery and crown placement.',
                    'For larger cases, we work with high-end dental labs known for premium materials.',
                ],
                'tooth',
            ],
            [
                'Schedule Your ' . $tm . ' Assessment',
                [
                    'See your own 3D scan and implant plan at your first visit. ' . $call . ' to book your ' . $tm . ' Assessment with Dr. Burns.',
                ],
            ],
        ],
        'details'   => [
            [
                'The Technology Behind Your Implant',
                [
                    'Each tool in our office handles one part of getting the implant right.',
                    [ 'table' => [
                        'head' => [ 'Technology', 'What it does', 'What it means for you' ],
                        'rows' => [
                            [ 'Sirona XG3D cone beam CT', 'Shows bone, nerves, and sinuses in 3D', 'Safe, accurate planning from your first visit' ],
                            [ 'Virtual implant planning', 'Sets position, depth, angle, and size on the computer', 'Fewer surprises during surgery' ],
                            [ '3D-printed surgical guide', 'Directs the implant to the planned spot', 'Smaller openings, shorter procedure, less swelling' ],
                            [ 'Osstell IDX', 'Measures implant stability with a number', 'Crown placed only when the implant is ready' ],
                            [ 'L-PRF grafting', 'Uses a small sample of your own blood', 'Supports healing when grafting is needed' ],
                            [ 'CEREC', 'Designs and mills crowns in our office', 'Precise fit and fewer appointments' ],
                        ],
                    ] ],
                    'Precision matters because an implant placed too close to a nerve or sinus, or at the wrong angle, can affect comfort, your bite, and how long it lasts. Planning in 3D and placing through a guide is how we avoid that.',
                ],
            ],
        ],
        'travel'    => [
            'About 20 minutes. Take Route 259 to I-81 at exit 257, head north to exit 264, and follow US-211 into New Market to 9626 South Congress St.',
        ],
        'faq'       => [
            [ 'What is a 3D cone beam scan, and do I need one?', 'It is a quick 3D X-ray of your jaw that shows bone volume, nerves, and sinuses. Dr. Burns uses it to plan every implant safely and accurately.' ],
            [ 'What is guided implant surgery?', 'The implant is placed through a custom guide made from your 3D scan, so it goes exactly where it was planned. It usually means a shorter, more comfortable procedure.' ],
            [ 'How long does it take to place an implant?', 'A single implant usually takes 30 to 60 minutes.' ],
            [ 'Will I need a bone graft?', 'Your 3D scan shows how much bone you have. If the tooth has been missing for a month or more, a graft is often needed first, and L-PRF grafting supports healing.' ],
            [ 'Who reads my 3D scan?', 'Beam Readers, an outside group of radiologists, reviews scans and returns a detailed report within 24 hours.' ],
            [ 'How far is the office from Broadway?', 'About 20 minutes, mostly on I-81 between exits 257 and 264.' ],
        ],
        'january'   => [
            'Serving the Broadway Community with Advanced Implant Care',
            'What Makes Dental Implants the Preferred Choice',
            'Comprehensive Implant Solutions Under One Roof',
            'Dental Implants Designed Around Your Comfort',
            'A Long-Term Investment in Your Smile',
        ],
    ],

    'dental-implants-timberville-va' => [
        'town'      => 'Timberville',
        'state'     => 'VA',
        'h1'        => 'Dental Implants and Implant-Supported Dentures Near Timberville, VA',
        'image'     => 'Timberville-8locations.jpg',
        'image_alt' => 'Timberville, VA and the hills around it at sunset',
        'intro'     => [
            'Adhesive in the morning, soft foods at dinner, and worry that something will slip when you laugh. <a href="/">Dr. Jeffrey Burns</a> helps Timberville denture wearers trade that routine for teeth anchored on <a href="/dental-implants/">dental implants</a>, about 20 minutes away in New Market.',
            'Here are your options and how implants change daily life.',
        ],
        'sections'  => [
            [
                'Dentures, Snap-In Dentures, or Fixed Teeth?',
                [
                    'There are three main ways to replace a full arch of teeth. The right one depends on your bone, your budget, and how permanent you want the result to be.',
                    'Traditional dentures rest on the gums. <a href="/implant-supported-dentures/">Implant-supported dentures</a> snap onto a few implants and come out at night for cleaning. Fixed full-arch teeth attach to four or more implants, and only the dentist removes them.',
                ],
            ],
            [
                'No More Adhesive, Real Chewing Power',
                [
                    'When implants hold your denture, daily life changes in ways you notice right away:',
                    [ 'ul' => '<li>No adhesive to apply or clean off</li><li>Steak, apples, and raw vegetables back on the menu</li><li>Less plastic over the roof of the mouth on many upper dentures, so food tastes the way it should</li>' ],
                ],
                'tooth',
            ],
            [
                'Protecting Your Jawbone',
                [
                    'Without tooth roots, the jawbone shrinks over time, which loosens dentures and ages the face. Implants keep the bone working and slow that loss.',
                    'On the lower jaw, two implants are often enough to keep a denture firmly in place. The upper jaw usually needs more because the bone is softer.',
                ],
                'shield',
            ],
            [
                'Already Wearing Dentures?',
                [
                    'You may not have to start over. If your current denture fits well, it can sometimes be adapted to snap onto new implants, which lowers the cost.',
                    'Long-time denture wearers may have lost some bone, and a <a href="/bone-grafting/">bone graft</a> can rebuild it. A 3D cone beam scan in our office shows which option fits.',
                ],
                'check',
            ],
            [
                'Schedule Your ' . $tm . ' Assessment',
                [
                    'Find out whether implant-supported dentures are right for you. ' . $call . ' to book your ' . $tm . ' Assessment with Dr. Burns.',
                ],
            ],
        ],
        'details'   => [
            [
                'Comparing Your Options',
                [
                    'Here is how the three ways to replace a full arch compare.',
                    [ 'table' => [
                        'head' => [ '', 'Traditional dentures', 'Snap-in implant dentures', 'Fixed full-arch teeth' ],
                        'rows' => [
                            [ 'How it stays in', 'Suction or adhesive', 'Clicks onto 2 or more implants', 'Attached to 4 or more implants' ],
                            [ 'Who removes it', 'You', 'You, at night for cleaning', 'Only the dentist' ],
                            [ 'Chewing', 'Limited; can rock on the gums', 'Much more stable', 'Closest to natural teeth' ],
                            [ 'Jawbone', 'Keeps shrinking', 'Implants slow bone loss', 'Implants slow bone loss' ],
                            [ 'Relines or replacement', 'Often every 5 to 10 years', 'Less often', 'Less often' ],
                            [ 'Up-front cost', 'Lowest', 'Moderate', 'Highest' ],
                        ],
                    ] ],
                    '<strong>Signs it may be time to anchor your denture:</strong>',
                    [ 'ul' => '<li>Your denture slips when you talk or laugh</li><li>You avoid foods like steak, apples, or raw vegetables</li><li>You go through a lot of adhesive</li><li>Your denture needs relines more often as your jaw changes</li>' ],
                    'Learn more about fixed teeth on our <a href="/full-mouth-dental-implants/">full-mouth dental implants</a> page.',
                ],
            ],
        ],
        'travel'    => [
            'About 20 minutes. Take Route 259 east to I-81 at exit 257 near Mauzy, head north to exit 264, and follow US-211 into New Market.',
            'If you plan to have IV sedation, bring an adult to drive you home.',
        ],
        'faq'       => [
            [ 'Can my current dentures be converted to snap-in dentures?', 'Sometimes. If your denture fits well and is in good condition, it may be adapted to attach to new implants. Dr. Burns will check its fit at your ' . $tm . ' Assessment.' ],
            [ 'How many implants does a snap-in denture need?', 'Often two on the lower jaw and more on the upper jaw, where the bone is softer. Fixed full-arch teeth usually use four or more per arch.' ],
            [ 'Will I be without teeth during treatment?', 'In most cases, no. Many patients wear temporary teeth while the implants heal, and Teeth in a Day patients leave with fixed teeth the same day.' ],
            [ 'How long do implant dentures last?', 'The implants can last a lifetime with good care. The denture that attaches to them wears over time and may eventually need to be relined or replaced.' ],
            [ 'Do snap-in dentures come out at night?', 'Yes, you remove them each night to clean them. Fixed full-arch teeth stay in and are removed only by the dentist.' ],
            [ 'How far is the office from Timberville?', 'About 20 minutes, mostly on I-81 between exits 257 and 264.' ],
        ],
        'january'   => [
            'Serving Timberville with Personalized Implant Care',
            'Why Implant Dentistry Is a Long-Term Solution',
            'Advanced Technology for Accurate Results',
            'Comfort-Focused Care at Every Visit',
            'Restoring Confidence with a Stronger Smile',
        ],
    ],

];
