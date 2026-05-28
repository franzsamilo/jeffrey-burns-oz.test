<?php
/**
 * Master config for all single-service pages — see ds_service_pages()
 * in functions.php. Each top-level key is a WP page slug. Adding a
 * new entry here + a matching WP page is all that's needed to ship a
 * new service page (sub-hero, body content, and SEO meta all auto-wire).
 *
 * Categories help group pages for analytics and future filtering:
 *   implants  — 5 implant deep-dives
 *   general   — General Dentistry children (9)
 *   cosmetic  — Cosmetic Dentistry children (3)
 *   restore   — Restorative Care children (e.g. Dental Fillings)
 *   prevent   — Preventative care subpages (8, incl. gum-disease children)
 *   resource  — Resources children (Financing, Patient Education)
 */
defined( 'ABSPATH' ) || exit;

return [

  // ════════════════════════════════════════════════════════════════════
  // IMPLANT DEEP-DIVES (5)
  // ════════════════════════════════════════════════════════════════════

  'single-dental-implants' => [
    'category' => 'implants',
    'sub_hero' => [
      'label'    => 'SINGLE DENTAL IMPLANTS',
      'title'    => 'A Single Implant That Looks &amp; Feels Like Your <em>Own Tooth</em>.',
      'subtitle' => 'Replace one missing tooth without compromising the healthy teeth on either side. Permanent, natural-looking, designed to last a lifetime.',
      'bg'       => 'dental-implants-hero.jpg',
      'alt'      => 'Single dental implant &mdash; Dr. Burns&rsquo;s practice',
    ],
    'seo' => [
      'title'       => 'Single Dental Implants in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Replace one missing tooth with a permanent dental implant &mdash; natural-looking, fully functional, placed personally by Dr. Burns. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WHY A SINGLE IMPLANT',
      'title' => 'One missing tooth. <span class="ds-italic">One elegant solution.</span>',
      'sub'   => 'A single dental implant replaces just the missing tooth &mdash; without grinding down the healthy teeth around it (the way a traditional bridge does). The result feels and functions exactly like your natural tooth.',
      'pillars' => [
        [ 'strong' => 'One Tooth', 'span' => 'replaced without touching the others' ],
        [ 'strong' => '95%+ Success', 'span' => 'with proper bone and case planning' ],
        [ 'strong' => 'Lifetime Design', 'span' => 'with the Burns Protocol warranty' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your single-implant journey, <span class="ds-italic">step by step</span>.',
      'sub'   => 'Most patients are surprised at how comfortable and predictable the process is. Here&rsquo;s exactly what to expect.',
      'list' => [
        [ 'num' => '01', 'title' => 'Consultation &amp; 3D imaging',  'desc' => 'In-house 3D scan to map your bone, bite, and existing teeth. Dr. Burns reviews everything with you and answers questions before any decision.' ],
        [ 'num' => '02', 'title' => 'Implant placement',              'desc' => 'A single implant post is precisely placed into the jawbone &mdash; usually a 30&ndash;60 minute procedure with on-staff anesthesiology.' ],
        [ 'num' => '03', 'title' => 'Healing &amp; integration',      'desc' => '3&ndash;6 months for the implant to integrate with the bone. We provide a temporary crown so you&rsquo;re never without a tooth in that spot.' ],
        [ 'num' => '04', 'title' => 'Custom crown &amp; reveal',      'desc' => 'A custom-shaded porcelain crown is placed on the implant. It looks, feels, and functions like the tooth that was always supposed to be there.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'Why patients choose Dr. Burns for single implants.',
      'cards' => [
        [ 'icon' => 'doctor', 'title' => 'Personally placed',         'desc' => 'Dr. Burns performs every implant placement himself &mdash; no rotating providers, no associates handling the surgery.' ],
        [ 'icon' => 'cpu',    'title' => 'In-house 3D imaging',       'desc' => 'Modern cone-beam CT lets us plan the placement to within a fraction of a millimeter &mdash; before any surgery.' ],
        [ 'icon' => 'safety', 'title' => 'On-staff anesthesiology',   'desc' => 'A board-certified physician anesthesiologist for every procedure &mdash; not a CRNA, not a contractor.' ],
        [ 'icon' => 'phone',  'title' => 'His personal cell',         'desc' => 'Every implant patient leaves with Dr. Burns&rsquo;s direct cell number. Pain at 9 PM? Text him.' ],
      ],
    ],
    'cta' => [
      'label' => 'READY TO REPLACE THAT TOOTH?',
      'title' => 'Schedule your free single-implant consultation.',
      'sub'   => 'Free consultation, full 3D imaging, and a clear written treatment plan &mdash; with no obligations, ever.',
    ],
    'references' => [
      'label' => 'CLINICAL REFERENCES',
      'title' => 'For further reading.',
      'sub'   => 'The Burns Protocol&rsquo;s approach to single-tooth implants aligns with current guidance from the American Academy of Periodontology: the implant replaces both the missing tooth and its root, preserving the jawbone that would otherwise resorb after extraction.',
      'sources' => [
        [ 'title' => 'Single-Tooth Dental Implants', 'org' => 'American Academy of Periodontology', 'url' => 'https://www.perio.org/for-patients/periodontal-treatments-and-procedures/dental-implant-procedures/single-tooth-dental-implants/' ],
        [ 'title' => 'Dental Implants', 'org' => 'Cleveland Clinic', 'url' => 'https://my.clevelandclinic.org/health/treatments/10903-dental-implants' ],
      ],
    ],
  ],

  'implant-supported-bridges' => [
    'category' => 'implants',
    'sub_hero' => [
      'label'    => 'IMPLANT-SUPPORTED BRIDGES',
      'title'    => 'Replace Several Teeth in a Row &mdash; <em>Without a Removable Bridge</em>.',
      'subtitle' => 'Two implants anchor a custom bridge to fill the gap of multiple missing teeth. Stable, permanent, indistinguishable from natural teeth.',
      'bg'       => 'implant-cost-hero.jpg',
      'alt'      => 'Implant-supported bridge consultation',
    ],
    'seo' => [
      'title'       => 'Implant Supported Bridges in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Implant-supported bridges replace multiple missing teeth without grinding down healthy ones. A permanent, comfortable alternative to traditional bridges. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WHY IMPLANT-SUPPORTED',
      'title' => 'When you&rsquo;re missing two or more teeth in a row.',
      'sub'   => 'Traditional bridges anchor onto neighboring healthy teeth, which usually means grinding them down. Implant-supported bridges anchor onto two new dental implants instead &mdash; preserving every other tooth in your mouth.',
      'pillars' => [
        [ 'strong' => '2&ndash;6 Teeth', 'span' => 'replaced with just 2 implants' ],
        [ 'strong' => 'Zero Grinding', 'span' => 'of your remaining healthy teeth' ],
        [ 'strong' => 'Decades Long', 'span' => 'with proper care &mdash; no re-cementing' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your implant-bridge journey.',
      'list' => [
        [ 'num' => '01', 'title' => 'Consultation &amp; planning', 'desc' => '3D imaging maps the gap, the surrounding bone, and the exact placement angles for the two anchor implants.' ],
        [ 'num' => '02', 'title' => 'Implant placement',          'desc' => 'Two implants are placed at either end of the gap &mdash; one procedure, full anesthesiology coverage.' ],
        [ 'num' => '03', 'title' => 'Healing &amp; bridge design', 'desc' => '3&ndash;6 months of integration. During healing, your custom bridge is designed in-house by Dr. Burns&rsquo;s lab partners.' ],
        [ 'num' => '04', 'title' => 'Bridge placement',           'desc' => 'The custom porcelain bridge clicks into place on the two implants. The result: a row of teeth that looks and works like the originals.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY THIS BEATS A TRADITIONAL BRIDGE',
      'title' => 'Three reasons patients pick implant-supported.',
      'cards' => [
        [ 'icon' => 'tooth',  'title' => 'Saves your other teeth',  'desc' => 'Traditional bridges require grinding down two healthy teeth as anchors. Implants leave them alone.' ],
        [ 'icon' => 'shield', 'title' => 'Protects your jawbone',  'desc' => 'Implants stimulate the bone the way natural roots do &mdash; preventing the bone loss that follows missing teeth.' ],
        [ 'icon' => 'gem',    'title' => 'Lasts longer',           'desc' => 'Traditional bridges typically need replacement every 10&ndash;15 years. Implant bridges, with care, can last decades.' ],
      ],
    ],
    'cta' => [
      'label' => 'MISSING SEVERAL TEETH?',
      'title' => 'Find out if an implant bridge is right for you.',
      'sub'   => 'Free consultation, 3D imaging, and a side-by-side comparison of your real options &mdash; with full pricing.',
    ],
    'references' => [
      'label' => 'CLINICAL REFERENCES',
      'title' => 'Why an implant-supported bridge often outlasts a traditional one.',
      'sub'   => 'Per the Cleveland Clinic, traditional fixed bridges typically last 5&ndash;15 years and require reshaping the teeth on either side of the gap &mdash; a step that is irreversible. Implant-supported bridges anchor on new implants instead, preserve the surrounding teeth, and stimulate the underlying bone the way a natural root does.',
      'sources' => [
        [ 'title' => 'Dental Bridges &mdash; types, lifespan, and care', 'org' => 'Cleveland Clinic', 'url' => 'https://my.clevelandclinic.org/health/treatments/10921-dental-bridges' ],
        [ 'title' => 'Implant Bridge vs. Traditional Bridge', 'org' => 'Harlem Dentistry', 'url' => 'https://www.harlemdentistry.com/blog/implant-bridge-vs-traditional-bridge' ],
      ],
    ],
  ],

  'how-dental-implants-work' => [
    'category' => 'implants',
    'sub_hero' => [
      'label'    => 'HOW DENTAL IMPLANTS WORK',
      'title'    => 'The <em>Science</em> Behind a Smile That Lasts a Lifetime.',
      'subtitle' => 'A plain-English explanation of how dental implants integrate with the jawbone, why they outperform every alternative, and what makes them last.',
      'bg'       => 'implant-procedures-hero.jpg',
      'alt'      => 'Dental implant explained',
    ],
    'seo' => [
      'title'       => 'How Dental Implants Work | Dr. Jeffrey S. Burns, DDS &middot; New Market, VA',
      'description' => 'A plain-English explanation of how dental implants work, why they last, and how Dr. Burns&rsquo;s approach makes the procedure predictable. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'THE BASICS',
      'title' => 'A dental implant is <span class="ds-italic">a replacement root</span>.',
      'sub'   => 'A dental implant is a small titanium post that&rsquo;s placed into the jawbone where a tooth&rsquo;s root used to be. Over a few months, the bone grows around it &mdash; a process called osseointegration &mdash; locking the implant in permanently. A custom crown is then attached to the top.',
      'pillars' => [
        [ 'strong' => 'Titanium Post', 'span' => 'placed into the jawbone (the &ldquo;root&rdquo;)' ],
        [ 'strong' => 'Bone Integration', 'span' => 'fuses the post over 3&ndash;6 months' ],
        [ 'strong' => 'Custom Crown', 'span' => 'gives you the visible tooth' ],
      ],
    ],
    'steps' => [
      'label' => 'THE PROCESS',
      'title' => 'How an implant becomes part of you.',
      'sub'   => 'Four broad phases &mdash; though the timing varies based on your individual case.',
      'list' => [
        [ 'num' => '01', 'title' => 'Planning &amp; imaging',         'desc' => '3D cone-beam imaging maps your jawbone, sinuses, nerves, and bite. Dr. Burns plans the precise location, angle, and depth before any surgery.' ],
        [ 'num' => '02', 'title' => 'Placement',                      'desc' => 'A small opening is made in the gum and a titanium post is precisely set into the jawbone. The gum is closed and a temporary tooth is placed if needed.' ],
        [ 'num' => '03', 'title' => 'Osseointegration',               'desc' => 'Over 3&ndash;6 months the bone grows around the titanium post and locks it in. This is what makes implants permanent.' ],
        [ 'num' => '04', 'title' => 'Crown attachment',               'desc' => 'A custom porcelain crown is shaded to match your other teeth and attached to the integrated implant. You&rsquo;ll feel like yourself again.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY IMPLANTS WIN',
      'title' => 'Why implants outperform every alternative.',
      'cards' => [
        [ 'icon' => 'shield', 'title' => 'They preserve your jawbone',  'desc' => 'Missing teeth cause the jawbone to shrink. Implants stimulate the bone like a natural root, keeping your face shape and bite intact.' ],
        [ 'icon' => 'leaf',   'title' => 'They don&rsquo;t harm other teeth', 'desc' => 'Bridges grind down neighboring teeth. Dentures press on the gums. Implants stand alone &mdash; no impact on anything else.' ],
        [ 'icon' => 'gem',    'title' => 'They last a lifetime',         'desc' => 'A well-placed implant in healthy bone, properly maintained, can last for decades. The crown on top might need replacement; the implant itself usually does not.' ],
      ],
    ],
    'cta' => [
      'label' => 'STILL HAVE QUESTIONS?',
      'title' => 'Book a free conversation with Dr. Burns.',
      'sub'   => 'Free consultation, 3D imaging, and an honest read on whether implants are right for you &mdash; with no obligation.',
    ],
    'references' => [
      'label' => 'CLINICAL REFERENCES',
      'title' => 'How implants actually work, in the words of the clinical literature.',
      'sub'   => 'A modern dental implant has three parts &mdash; a titanium (or sometimes zirconia/ceramic) post that acts as the root, an abutment connector, and the visible restoration. The jawbone fuses to the post during osseointegration, a process lasting roughly 3&ndash;9 months. Candidates do best when smoking is avoided, gum disease is treated, jawbone density is adequate, and daily oral hygiene is consistent.',
      'sources' => [
        [ 'title' => 'Dental Implants &mdash; structure, materials &amp; osseointegration', 'org' => 'Cleveland Clinic', 'url' => 'https://my.clevelandclinic.org/health/treatments/10903-dental-implants' ],
        [ 'title' => 'Single-Tooth Dental Implants', 'org' => 'American Academy of Periodontology', 'url' => 'https://www.perio.org/for-patients/periodontal-treatments-and-procedures/dental-implant-procedures/single-tooth-dental-implants/' ],
      ],
    ],
  ],

  'full-mouth-dental-implants' => [
    'category' => 'implants',
    'sub_hero' => [
      'label'    => 'FULL MOUTH DENTAL IMPLANTS',
      'title'    => 'A Whole New Smile &mdash; <em>Permanently Anchored</em>.',
      'subtitle' => 'For patients missing all (or most) of their teeth. A full-arch fixed bridge supported by 4&ndash;6 implants &mdash; the All-on-4 / All-on-6 approach.',
      'bg'       => 'surgical-photo-burns.png',
      'alt'      => 'Full mouth dental implants &mdash; All-on-4 procedure',
    ],
    'seo' => [
      'title'       => 'Full Mouth Dental Implants (All-on-4) in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Full-arch dental implants restore an entire row of teeth with just 4&ndash;6 implants. Permanent, fixed, and life-changing &mdash; placed personally by Dr. Burns in New Market, VA.',
    ],
    'intro' => [
      'label' => 'A FULL ROW OF TEETH',
      'title' => 'When dentures aren&rsquo;t enough &mdash; <span class="ds-italic">and you want your life back</span>.',
      'sub'   => 'Full-mouth implants (often called All-on-4 or All-on-6) replace an entire arch of teeth with a fixed bridge anchored to just 4&ndash;6 implants. No removable plates, no slipping, no adhesive &mdash; just teeth that are part of you again.',
      'pillars' => [
        [ 'strong' => '4&ndash;6 Implants', 'span' => 'support a full arch of teeth' ],
        [ 'strong' => 'Often One Day', 'span' => 'from extraction to teeth-in-place' ],
        [ 'strong' => 'Lifetime Warranty', 'span' => 'on the Platinum DreamSmile tier' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your full-mouth journey, <span class="ds-italic">in plain steps</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Consultation &amp; comprehensive 3D imaging', 'desc' => 'A full plan: existing teeth, bone density, sinus position, bite. Dr. Burns reviews every option &mdash; including whether All-on-4 or All-on-6 is right for you.' ],
        [ 'num' => '02', 'title' => 'Surgery day',                                 'desc' => 'Any failing teeth are removed; 4&ndash;6 implants are precisely placed; a temporary fixed bridge is attached the same day. You leave with teeth.' ],
        [ 'num' => '03', 'title' => 'Healing &amp; integration',                   'desc' => '3&ndash;6 months for full bone integration. The temporary bridge stays in place &mdash; you eat, talk, and smile normally throughout.' ],
        [ 'num' => '04', 'title' => 'Final fixed bridge',                          'desc' => 'Your custom-designed final bridge is placed &mdash; the one designed for the next 30 years. This is the day you&rsquo;ll remember.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS FOR FULL-MOUTH',
      'title' => 'Why this is Dr. Burns&rsquo;s most-loved procedure.',
      'cards' => [
        [ 'icon' => 'gem',    'title' => 'Decades of full-arch experience', 'desc' => 'Dr. Burns has done thousands of full-arch cases. The Burns Protocol was built to make this exact procedure predictable.' ],
        [ 'icon' => 'safety', 'title' => 'On-staff anesthesiology',         'desc' => 'A board-certified physician anesthesiologist for every full-arch case &mdash; comfort and safety from start to finish.' ],
        [ 'icon' => 'house',  'title' => 'Everything in-house',             'desc' => 'Imaging, surgery, lab work, restoration. No referrals, no shipping you out, no losing your story between offices.' ],
        [ 'icon' => 'phone',  'title' => 'Direct line, every patient',      'desc' => 'Every full-arch patient gets Dr. Burns&rsquo;s personal cell. Worry at 11 PM the night after surgery? Call him.' ],
      ],
    ],
    'cta' => [
      'label' => 'READY FOR A WHOLE NEW SMILE?',
      'title' => 'Schedule your free full-mouth consultation.',
      'sub'   => 'Free 3D imaging, written treatment plan with turnkey pricing, and zero pressure to decide on the spot.',
    ],
    'references' => [
      'label' => 'CLINICAL REFERENCES',
      'title' => 'Why fixed full-arch implants outperform conventional dentures.',
      'sub'   => 'Per the American Academy of Periodontology, a full-arch fixed bridge anchored to dental implants integrates with the jawbone and prevents the bone loss and facial-shape changes that follow conventional dentures. The integration phase typically runs 2&ndash;6 months, and once placed the restoration is cleaned with the same brushing-and-flossing routine recommended for natural teeth.',
      'sources' => [
        [ 'title' => 'Full Mouth Dental Implants', 'org' => 'American Academy of Periodontology', 'url' => 'https://www.perio.org/for-patients/periodontal-treatments-and-procedures/dental-implant-procedures/full-mouth-dental-implants/' ],
        [ 'title' => 'Implant-Supported Dentures', 'org' => 'Cleveland Clinic', 'url' => 'https://my.clevelandclinic.org/health/treatments/24303-implant-supported-dentures' ],
      ],
    ],
  ],

  'implant-supported-dentures' => [
    'category' => 'implants',
    'sub_hero' => [
      'label'    => 'IMPLANT-SUPPORTED DENTURES',
      'title'    => 'Dentures That <em>Stay Where They Belong</em>.',
      'subtitle' => 'Snap-in dentures anchored to 2&ndash;4 implants &mdash; the comfort and stability of fixed teeth, with the convenience of a removable appliance.',
      'bg'       => 'implant-faqs-hero.jpg',
      'alt'      => 'Implant-supported dentures consultation',
    ],
    'seo' => [
      'title'       => 'Implant Supported Dentures in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Snap-in implant-supported dentures eliminate slipping, sore spots, and adhesive. Anchored to 2&ndash;4 implants. Free consultation with Dr. Burns in New Market, VA.',
    ],
    'intro' => [
      'label' => 'NO MORE SLIPPING',
      'title' => 'A denture that <span class="ds-italic">clicks into place</span>.',
      'sub'   => 'Traditional dentures sit on the gums and rely on suction or adhesive. Implant-supported dentures snap onto 2&ndash;4 small implants &mdash; eliminating the slipping, the sore spots, and the embarrassment of having teeth that move when you talk or eat.',
      'pillars' => [
        [ 'strong' => '2&ndash;4 Implants', 'span' => 'anchor a full denture' ],
        [ 'strong' => 'Snap-in Stability', 'span' => 'no more adhesive, no more shifting' ],
        [ 'strong' => 'Bite 4&times; Stronger', 'span' => 'than a conventional denture' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'From slipping dentures to <span class="ds-italic">stable, snap-in teeth</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Consultation &amp; assessment', 'desc' => 'Dr. Burns reviews your existing dentures (or current tooth situation), takes 3D imaging, and confirms you have the bone for implant anchors.' ],
        [ 'num' => '02', 'title' => 'Implant placement',             'desc' => 'Two to four implants are placed in the jawbone &mdash; usually a single 60&ndash;90 minute procedure with full anesthesiology.' ],
        [ 'num' => '03', 'title' => 'Healing',                       'desc' => '3&ndash;6 months of integration. You can wear your existing denture (modified for comfort) during this time.' ],
        [ 'num' => '04', 'title' => 'Snap-in denture fitting',       'desc' => 'A custom denture with snap-in attachments is fitted to the implants. You take it out at night to clean &mdash; otherwise it stays put, all day.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY THIS WORKS',
      'title' => 'What changes when your denture stays put.',
      'cards' => [
        [ 'icon' => 'tooth',  'title' => 'Eat what you want',         'desc' => 'Apples, steak, corn on the cob. The bite force of an implant denture is up to four times stronger than a conventional one.' ],
        [ 'icon' => 'shield', 'title' => 'No more sore spots',        'desc' => 'The implants take the chewing pressure off your gums. The denture stops grinding into soft tissue all day.' ],
        [ 'icon' => 'leaf',   'title' => 'Preserves your jawbone',    'desc' => 'Conventional dentures accelerate bone loss. Implants stimulate the bone the way natural roots do &mdash; keeping your face shape intact.' ],
      ],
    ],
    'cta' => [
      'label' => 'TIRED OF SLIPPING DENTURES?',
      'title' => 'Find out if implant dentures are right for you.',
      'sub'   => 'Free consultation, 3D imaging, and a clear comparison of your options. No obligation.',
    ],
    'references' => [
      'label' => 'CLINICAL REFERENCES',
      'title' => 'Implant-supported vs. implant-retained dentures &mdash; what the clinical sources say.',
      'sub'   => 'Per the Cleveland Clinic, implant-supported dentures anchor directly to the jawbone &mdash; preventing the slipping that conventional dentures cause, stimulating the underlying bone, and eliminating the daily adhesive routine. They come in two forms: removable (snap-on for nightly cleaning) and fixed (cleaned in place with specialised tools). Note: &ldquo;implant-retained&rdquo; and &ldquo;implant-supported&rdquo; refer to slightly different appliances &mdash; we&rsquo;ll explain which fits your case at the free consult.',
      'sources' => [
        [ 'title' => 'Implant-Supported Dentures', 'org' => 'Cleveland Clinic', 'url' => 'https://my.clevelandclinic.org/health/treatments/24303-implant-supported-dentures' ],
      ],
    ],
  ],

  // ════════════════════════════════════════════════════════════════════
  // GENERAL DENTISTRY CHILDREN (9)
  // ════════════════════════════════════════════════════════════════════

  'dental-bridges' => [
    'category' => 'general',
    'sub_hero' => [
      'label'    => 'DENTAL BRIDGES',
      'title'    => 'Bridge a Gap. <em>Restore Your Bite</em>.',
      'subtitle' => 'Traditional bridges and modern implant-supported alternatives &mdash; we&rsquo;ll help you choose the right approach for your case.',
      'bg'       => 'bridges-hero.jpg',
      'alt'      => 'Dental bridge consultation',
    ],
    'seo' => [
      'title'       => 'Dental Bridges &mdash; Traditional &amp; Implant-Supported | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Traditional and implant-supported dental bridges in New Market, VA. Get an honest comparison of both approaches and a recommendation for your specific case.',
    ],
    'intro' => [
      'label' => 'TRADITIONAL VS. IMPLANT',
      'title' => 'Two ways to bridge a gap &mdash; <span class="ds-italic">we&rsquo;ll help you pick</span>.',
      'sub'   => 'A traditional bridge anchors onto your existing teeth (which means grinding them down). An implant-supported bridge anchors onto new dental implants instead. Both work; one preserves more of your natural mouth. We&rsquo;ll walk you through the trade-offs honestly.',
      'pillars' => [
        [ 'strong' => 'Traditional', 'span' => 'lower cost, faster, anchors on natural teeth' ],
        [ 'strong' => 'Implant-Supported', 'span' => 'preserves healthy teeth, lasts longer' ],
        [ 'strong' => 'Honest Recommendation', 'span' => 'we&rsquo;ll tell you which fits your case' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Traditional bridge: <span class="ds-italic">three simple appointments</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Tooth preparation',             'desc' => 'The two teeth on either side of the gap are reshaped to receive crowns. Local anesthesia keeps the visit comfortable.' ],
        [ 'num' => '02', 'title' => 'Impression &amp; temporary',     'desc' => 'A precise impression goes to the lab. You wear a temporary bridge for 2&ndash;3 weeks while the final one is crafted.' ],
        [ 'num' => '03', 'title' => 'Final bridge placement',         'desc' => 'The custom porcelain bridge is bonded into place. Color-matched to your other teeth, fitted to your bite.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A general practice that handles both options.',
      'cards' => [
        [ 'icon' => 'doctor', 'title' => 'Both options under one roof',   'desc' => 'Most offices do traditional bridges OR specialize in implants. Dr. Burns does both well, so the recommendation isn&rsquo;t skewed by what we can offer.' ],
        [ 'icon' => 'gem',    'title' => 'Honest assessment',             'desc' => 'We&rsquo;ll tell you when a traditional bridge is the better fit (often: cost, timeline) and when an implant bridge is worth the extra investment.' ],
        [ 'icon' => 'shield', 'title' => 'In-house lab partners',         'desc' => 'Custom porcelain bridges crafted with our trusted lab partners. We control the quality of every restoration that leaves the office.' ],
      ],
    ],
    'cta' => [
      'label' => 'MISSING ONE OR MORE TEETH?',
      'title' => 'Find out which bridge fits your case.',
      'sub'   => 'Free consultation, full assessment, and a written treatment plan with both options compared.',
    ],
    'references' => [
      'label' => 'CLINICAL REFERENCES',
      'title' => 'Traditional bridges vs. implant-supported bridges &mdash; the trade-offs.',
      'sub'   => 'Two practical facts to weigh: traditional bridges last roughly 5&ndash;15 years and require permanently reshaping the teeth on either side of the gap, while implant-supported bridges typically last decades, preserve the surrounding teeth, and stimulate the underlying bone the way a natural root does. Cost and timeline favour traditional; long-term tooth and bone preservation favour implant-supported.',
      'sources' => [
        [ 'title' => 'Dental Bridges &mdash; types, lifespan, and care', 'org' => 'Cleveland Clinic', 'url' => 'https://my.clevelandclinic.org/health/treatments/10921-dental-bridges' ],
        [ 'title' => 'Implant Bridge vs. Traditional Bridge', 'org' => 'Harlem Dentistry', 'url' => 'https://www.harlemdentistry.com/blog/implant-bridge-vs-traditional-bridge' ],
      ],
    ],
  ],

  'tooth-extraction' => [
    'category' => 'general',
    'sub_hero' => [
      'label'    => 'TOOTH EXTRACTION',
      'title'    => 'When a Tooth Must Come Out &mdash; <em>Done Right</em>.',
      'subtitle' => 'Comfortable, anxiety-aware extractions with a clear plan for what comes next. Implant-ready extraction sites whenever possible.',
      'bg'       => 'extraction-hero.jpg',
      'alt'      => 'Comfortable tooth extraction at DreamSmile',
    ],
    'seo' => [
      'title'       => 'Tooth Extraction in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Comfortable, anxiety-aware tooth extractions with on-staff anesthesiology. Implant-ready extraction sites whenever possible. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WHEN AN EXTRACTION IS RIGHT',
      'title' => 'Sometimes the tooth has to go &mdash; <span class="ds-italic">and that&rsquo;s OK</span>.',
      'sub'   => 'Decay too deep for a root canal. A fracture below the gum line. Severe gum disease. Crowding before orthodontics. Whatever the reason, an extraction is sometimes the right call &mdash; and how it&rsquo;s done matters for whatever comes next.',
      'pillars' => [
        [ 'strong' => 'Comfort First', 'span' => 'on-staff anesthesiology if you want it' ],
        [ 'strong' => 'Implant-Ready', 'span' => 'site preserved for a future implant' ],
        [ 'strong' => 'Clear Next Steps', 'span' => 'no &ldquo;figure it out later&rdquo;' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your extraction visit, <span class="ds-italic">straightforward and calm</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Comfort planning',                'desc' => 'Local numbing, nitrous, or full IV sedation &mdash; your call, based on your anxiety level and the procedure complexity.' ],
        [ 'num' => '02', 'title' => 'Gentle removal',                  'desc' => 'Modern techniques minimize trauma to the bone and surrounding tissue &mdash; especially important if you&rsquo;ll want an implant in that spot later.' ],
        [ 'num' => '03', 'title' => 'Site preservation (if needed)',   'desc' => 'For future implant sites, we may add a small bone graft to keep the bone shape intact during healing.' ],
        [ 'num' => '04', 'title' => 'Aftercare &amp; replacement plan', 'desc' => 'Clear written aftercare, Dr. Burns&rsquo;s direct cell, and a recommendation for replacement (implant, bridge, or do-nothing).' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'An extraction handled with the next step in mind.',
      'cards' => [
        [ 'icon' => 'safety', 'title' => 'On-staff anesthesiology',     'desc' => 'A board-certified physician anesthesiologist available for any extraction &mdash; especially complex ones or anxious patients.' ],
        [ 'icon' => 'tooth',  'title' => 'Implant-aware technique',     'desc' => 'How an extraction is done affects whether the spot can hold an implant later. We extract with that future option in mind.' ],
        [ 'icon' => 'phone',  'title' => 'Aftercare you can call about', 'desc' => 'Pain or worry the night after? You have Dr. Burns&rsquo;s personal cell &mdash; not a voicemail or an answering service.' ],
      ],
    ],
    'cta' => [
      'label' => 'NEED A TOOTH OUT?',
      'title' => 'Schedule a comfort-focused extraction consult.',
      'sub'   => 'Free consultation. Honest discussion of whether the tooth can be saved &mdash; and the right next steps if not.',
    ],
  ],

  'bone-grafting' => [
    'category' => 'general',
    'sub_hero' => [
      'label'    => 'BONE GRAFTING',
      'title'    => 'Rebuild the Foundation &mdash; <em>Get Back on the Implant Track</em>.',
      'subtitle' => 'When bone loss has put implants out of reach, modern bone grafting often opens the door back up. The "yes" when other offices said no.',
      'bg'       => 'bone-graft-hero.jpg',
      'alt'      => 'Bone grafting consultation',
    ],
    'seo' => [
      'title'       => 'Bone Grafting in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Bone grafting rebuilds jawbone after tooth loss, opening up implant options that may have been ruled out elsewhere. Free consultation with Dr. Burns in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WHEN BONE LOSS IS A BLOCKER',
      'title' => 'When the answer used to be <span class="ds-italic">&ldquo;you don&rsquo;t have enough bone&rdquo;</span>.',
      'sub'   => 'Bone grafting adds material (your own, donor, or synthetic) to areas where bone has shrunk after tooth loss. After healing, that grafted area can hold an implant. Many patients told &ldquo;no&rdquo; elsewhere become candidates after a graft.',
      'pillars' => [
        [ 'strong' => 'Implant-Eligible Again', 'span' => 'after a successful graft' ],
        [ 'strong' => 'Several Material Options', 'span' => 'your bone, donor, or synthetic' ],
        [ 'strong' => 'In-House Procedure', 'span' => 'no second-office referral needed' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your bone-grafting journey.',
      'list' => [
        [ 'num' => '01', 'title' => '3D bone assessment',     'desc' => 'A cone-beam CT scan maps exactly where the bone has shrunk and how much volume needs to be rebuilt.' ],
        [ 'num' => '02', 'title' => 'Graft placement',         'desc' => 'A small procedure to add bone material to the deficient area. Sutures close the site; the body grows new bone around the graft over the next few months.' ],
        [ 'num' => '03', 'title' => 'Healing &amp; remodeling', 'desc' => '3&ndash;6 months for the graft to integrate and form solid new bone. We monitor with follow-up imaging.' ],
        [ 'num' => '04', 'title' => 'Implant placement',       'desc' => 'Once the bone has integrated, the implant is placed exactly as it would have been if you&rsquo;d had the bone all along.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A practice that says yes when others say no.',
      'cards' => [
        [ 'icon' => 'bone',   'title' => 'Decades of grafting experience', 'desc' => 'Dr. Burns has performed bone grafts as a routine part of complex implant cases for over 30 years.' ],
        [ 'icon' => 'cpu',    'title' => 'Modern 3D planning',             'desc' => 'Cone-beam CT lets us plan the exact volume and placement of the graft before any surgery.' ],
        [ 'icon' => 'house',  'title' => 'All in-house',                   'desc' => 'No referral to a separate oral surgeon. The graft, the healing, and the eventual implant all happen in the same office with the same doctor.' ],
      ],
    ],
    'cta' => [
      'label' => 'TOLD &ldquo;NO BONE FOR IMPLANTS&rdquo;?',
      'title' => 'Get a second opinion from Dr. Burns.',
      'sub'   => 'Free consultation, 3D imaging, and an honest assessment of whether grafting can put implants back on the table.',
    ],
    'references' => [
      'label' => 'CLINICAL REFERENCES',
      'title' => 'What the clinical literature says about bone grafting.',
      'sub'   => 'Per the Cleveland Clinic, dental bone grafts use one of four materials &mdash; the patient&rsquo;s own bone (autogenous), donor human bone (allograft), animal-derived bone (xenograft), or lab-synthesised mineral (alloplast). Initial healing takes about a week, but full integration runs 3&ndash;12 months; for best results an implant should be placed within 6&ndash;12 months of the graft, before new bone begins to resorb.',
      'sources' => [
        [ 'title' => 'Dental Bone Graft &mdash; types, recovery &amp; timeline', 'org' => 'Cleveland Clinic', 'url' => 'https://my.clevelandclinic.org/health/treatments/21727-dental-bone-graft' ],
      ],
    ],
  ],

  'full-dentures' => [
    'category' => 'general',
    'sub_hero' => [
      'label'    => 'FULL DENTURES',
      'title'    => 'Full Dentures &mdash; <em>Done With Care</em>.',
      'subtitle' => 'Traditional full dentures fitted with attention to comfort, fit, and natural appearance. Or upgrade to implant-stabilized for a no-slip solution.',
      'bg'       => 'full-dentures-hero.jpg',
      'alt'      => 'Full dentures fitting',
    ],
    'seo' => [
      'title'       => 'Full Dentures in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Comfortable, well-fitted full dentures &mdash; and the option to upgrade to implant-stabilized dentures for a no-slip solution. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'A FULL ARCH OF TEETH',
      'title' => 'Full dentures, <span class="ds-italic">fitted with care</span>.',
      'sub'   => 'When all the teeth in an arch are missing, a full denture replaces them with a removable appliance. The fit, the bite balance, and the appearance all matter &mdash; and we take time to get them right.',
      'pillars' => [
        [ 'strong' => 'Custom Fit', 'span' => 'multiple try-in visits, not a rush job' ],
        [ 'strong' => 'Natural Look', 'span' => 'shade and shape matched to your face' ],
        [ 'strong' => 'Implant-Upgradeable', 'span' => 'add 2&ndash;4 implants later for snap-in stability' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your full-denture process.',
      'list' => [
        [ 'num' => '01', 'title' => 'Consultation &amp; impressions', 'desc' => 'Detailed measurements of your jaw, bite, and remaining anatomy to design dentures that look and feel right.' ],
        [ 'num' => '02', 'title' => 'Try-in fittings',                'desc' => 'A wax-up version is tried in your mouth so you (and we) can confirm the look, the bite, and the comfort before the final dentures are made.' ],
        [ 'num' => '03', 'title' => 'Final dentures',                 'desc' => 'Custom dentures crafted in porcelain or high-grade acrylic. We adjust until the fit is right.' ],
        [ 'num' => '04', 'title' => 'Aftercare &amp; check-ins',      'desc' => 'Follow-up visits to fine-tune comfort. Dentures need adjustment over time as the gums change &mdash; we plan for that.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A denture that fits the way it should.',
      'cards' => [
        [ 'icon' => 'denture', 'title' => 'Time to get it right',          'desc' => 'We don&rsquo;t rush a denture. Multiple try-in visits ensure the fit, bite, and appearance are right before we finalize.' ],
        [ 'icon' => 'gem',     'title' => 'Lab partners we trust',          'desc' => 'Custom dentures crafted with experienced labs &mdash; not the cheapest mass-produced option, the right one for your case.' ],
        [ 'icon' => 'magnet',  'title' => 'Easy implant upgrade later',     'desc' => 'If your conventional denture starts to slip down the road, we can place 2&ndash;4 implants and convert to a snap-in denture without starting over.' ],
      ],
    ],
    'cta' => [
      'label' => 'NEED FULL DENTURES?',
      'title' => 'Schedule a denture consultation.',
      'sub'   => 'Free consultation, honest discussion of conventional vs. implant-stabilized, and a written treatment plan.',
    ],
    'references' => [
      'label' => 'CLINICAL REFERENCES',
      'title' => 'What to expect from a full denture &mdash; in the clinical literature.',
      'sub'   => 'Per the Cleveland Clinic, full dentures are built from impressions, a stone model, and an acrylic or resin base; getting the fit right typically takes several office visits as the oral tissues adapt. Adjustment to a new denture can take weeks or months. Conventional dentures average 7&ndash;10 years of service, with a reline every 1&ndash;2 years. Implant-retained versions snap on to dental implants for greater stability without adhesive &mdash; an upgrade path we&rsquo;ll discuss honestly at the consult.',
      'sources' => [
        [ 'title' => 'Dentures &mdash; fitting, lifespan &amp; care', 'org' => 'Cleveland Clinic', 'url' => 'https://my.clevelandclinic.org/health/treatments/10900-dentures' ],
      ],
    ],
  ],

  'partial-dentures' => [
    'category' => 'general',
    'sub_hero' => [
      'label'    => 'PARTIAL DENTURES',
      'title'    => 'Replace Several Teeth &mdash; <em>Without Touching the Others</em>.',
      'subtitle' => 'Discreet, well-fitted partial dentures fill the gaps where teeth are missing &mdash; while preserving every healthy tooth you still have.',
      'bg'       => 'partial-dentures-hero.jpg',
      'alt'      => 'Partial denture fitting',
    ],
    'seo' => [
      'title'       => 'Partial Dentures in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Discreet, well-fitted partial dentures that fill the gaps without compromising your healthy teeth. Free consultation with Dr. Burns in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WHEN A PARTIAL FITS',
      'title' => 'A removable appliance &mdash; <span class="ds-italic">when an implant or bridge isn&rsquo;t the right fit</span>.',
      'sub'   => 'Partial dentures clip onto your existing teeth to fill in the missing ones. They&rsquo;re removable, less expensive than implants, and a good fit when timing, budget, or bone density rules other options out.',
      'pillars' => [
        [ 'strong' => 'Healthy Teeth Preserved', 'span' => 'no grinding, no extractions' ],
        [ 'strong' => 'Removable &amp; Cleanable', 'span' => 'comes out at night for easy care' ],
        [ 'strong' => 'Lower Investment', 'span' => 'than implants or bridges' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your partial denture process.',
      'list' => [
        [ 'num' => '01', 'title' => 'Consultation &amp; impressions', 'desc' => 'A detailed look at your existing teeth, the gaps, and how a partial would clip in. Impressions go to the lab for a custom design.' ],
        [ 'num' => '02', 'title' => 'Try-in fitting',                 'desc' => 'A trial version confirms fit, comfort, and bite. Adjustments before the final partial is crafted.' ],
        [ 'num' => '03', 'title' => 'Final partial denture',          'desc' => 'Your custom partial is fitted. Clasps grip the existing teeth gently; the artificial teeth fill the gaps.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A partial that fits and lasts.',
      'cards' => [
        [ 'icon' => 'partial', 'title' => 'Discreet design',           'desc' => 'Modern partials use minimally visible clasps and natural-shaded artificial teeth. Most people won&rsquo;t notice.' ],
        [ 'icon' => 'shield',  'title' => 'Protects your teeth',      'desc' => 'Properly fitted partials distribute bite force evenly so the anchor teeth aren&rsquo;t overworked.' ],
        [ 'icon' => 'wallet',  'title' => 'A practical budget option', 'desc' => 'When implants aren&rsquo;t in the cards right now, a well-made partial is a real solution &mdash; not a compromise.' ],
      ],
    ],
    'cta' => [
      'label' => 'CONSIDERING A PARTIAL?',
      'title' => 'Schedule a partial-denture consultation.',
      'sub'   => 'Free consultation. Honest comparison of partials, bridges, and implants for your specific case.',
    ],
  ],

  'pediatric-dentistry' => [
    'category' => 'general',
    'sub_hero' => [
      'label'    => 'PEDIATRIC DENTAL CARE',
      'title'    => 'A Warm First Visit &mdash; <em>That Builds Lifelong Habits</em>.',
      'subtitle' => 'Gentle, patient pediatric care for our youngest patients. Cavity prevention, sealants, exams, and the kind of friendly first-visit experience that takes the fear out of the chair.',
      'bg'       => 'pediatric-hero.jpg',
      'alt'      => 'Pediatric dental care at DreamSmile',
    ],
    'seo' => [
      'title'       => 'Pediatric Dental Care in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Warm, gentle pediatric dental care for kids in New Market and the Shenandoah Valley. Cavity prevention, sealants, exams, and friendly first visits.',
    ],
    'intro' => [
      'label' => 'KIDS WELCOME',
      'title' => 'A first dental visit your child <span class="ds-italic">won&rsquo;t dread next time</span>.',
      'sub'   => 'A child&rsquo;s first dental experience shapes the next 70 years of their dental health. We take that seriously. Slow pace, friendly explanations, no surprises &mdash; and a parent welcome in the room throughout.',
      'pillars' => [
        [ 'strong' => 'No Rushing', 'span' => 'visits run at your child&rsquo;s pace' ],
        [ 'strong' => 'Parent Welcome', 'span' => 'sit in the room, hold a hand' ],
        [ 'strong' => 'Prevention First', 'span' => 'cavities prevented beat cavities filled' ],
      ],
    ],
    'steps' => [
      'label' => 'WHAT WE DO',
      'title' => 'Pediatric services we offer.',
      'list' => [
        [ 'num' => '01', 'title' => 'First-visit checkups',         'desc' => 'A gentle introduction: counting teeth, a quick polish, and showing your child what each tool does &mdash; before anything happens in their mouth.' ],
        [ 'num' => '02', 'title' => 'Cleanings &amp; fluoride',     'desc' => 'Professional cleanings tailored to small mouths, plus fluoride treatments to strengthen developing enamel.' ],
        [ 'num' => '03', 'title' => 'Dental sealants',              'desc' => 'A thin protective coating on molars to prevent cavities in the deep grooves where toothbrushes can&rsquo;t reach.' ],
        [ 'num' => '04', 'title' => 'Cavity care &amp; education',  'desc' => 'When fillings are needed, we explain what&rsquo;s happening in kid-friendly language. Brushing/flossing coaching parents will actually use.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY OUR PRACTICE WORKS FOR KIDS',
      'title' => 'What makes a kid feel safe in our chair.',
      'cards' => [
        [ 'icon' => 'kid',     'title' => 'Patience built in',       'desc' => 'We don&rsquo;t book back-to-back kid appointments. Your child&rsquo;s visit gets the time it needs &mdash; no shortcuts, no &ldquo;hurry up.&rdquo;' ],
        [ 'icon' => 'shield',  'title' => 'Prevention-first approach', 'desc' => 'We&rsquo;d rather coach a child to avoid cavities than fill them. Sealants, fluoride, and friendly hygiene coaching first.' ],
        [ 'icon' => 'doctor',  'title' => 'A doctor who explains',     'desc' => 'Dr. Burns talks to children directly &mdash; not just over their heads to the parent. Kids respond to being treated like people.' ],
      ],
    ],
    'cta' => [
      'label' => 'BRINGING IN YOUR CHILD?',
      'title' => 'Schedule a friendly first visit.',
      'sub'   => 'Free first-visit consultation. We&rsquo;ll meet your child, give them a tour, and never push more than they&rsquo;re ready for.',
    ],
  ],

  'dental-crowns' => [
    'category' => 'general',
    'sub_hero' => [
      'label'    => 'DENTAL CROWNS',
      'title'    => 'A Crown That Looks Like the Tooth <em>Was Always There</em>.',
      'subtitle' => 'Custom porcelain crowns that protect cracked, weakened, or restored teeth &mdash; shaded and shaped to disappear into your smile.',
      'bg'       => 'restorative-care-hero.jpg',
      'alt'      => 'Dental crown procedure',
    ],
    'seo' => [
      'title'       => 'Dental Crowns in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Custom porcelain dental crowns that protect cracked or weakened teeth and look indistinguishable from natural enamel. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WHEN A CROWN IS RIGHT',
      'title' => 'When a tooth needs <span class="ds-italic">a full coat of armor</span>.',
      'sub'   => 'A crown wraps over a tooth that&rsquo;s been weakened by decay, fracture, or a large filling. It restores the strength, the shape, and the appearance &mdash; while sealing the tooth from further damage.',
      'pillars' => [
        [ 'strong' => 'Strong &amp; Durable', 'span' => 'restores 100% of bite function' ],
        [ 'strong' => 'Custom Shaded', 'span' => 'matched to your other teeth' ],
        [ 'strong' => '10&ndash;15+ Years', 'span' => 'with proper care' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your crown process &mdash; <span class="ds-italic">two visits, beautifully fitted</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Tooth preparation',          'desc' => 'The tooth is gently shaped to receive the crown. Local anesthesia keeps the visit comfortable.' ],
        [ 'num' => '02', 'title' => 'Impression &amp; temporary', 'desc' => 'A precise digital or physical impression goes to the lab. You wear a temporary crown for 1&ndash;2 weeks.' ],
        [ 'num' => '03', 'title' => 'Final crown placement',      'desc' => 'The custom porcelain crown is bonded into place. Color, shape, and bite all checked &mdash; we adjust until it&rsquo;s right.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A crown that disappears into your smile.',
      'cards' => [
        [ 'icon' => 'crown',  'title' => 'Custom porcelain, not metal', 'desc' => 'We use modern all-porcelain crowns by default &mdash; no dark metal margins at the gum line.' ],
        [ 'icon' => 'gem',    'title' => 'Lab partners we trust',       'desc' => 'Crowns crafted with experienced lab partners. We don&rsquo;t outsource quality.' ],
        [ 'icon' => 'shield', 'title' => 'Bite checked carefully',      'desc' => 'A crown that&rsquo;s slightly too high causes ongoing problems. We adjust until your bite feels exactly right before you leave.' ],
      ],
    ],
    'cta' => [
      'label' => 'NEED A CROWN?',
      'title' => 'Schedule a crown consultation.',
      'sub'   => 'Free consultation. Honest assessment of whether a crown, filling, or other restoration is the right call.',
    ],
  ],

  'root-canal' => [
    'category' => 'general',
    'sub_hero' => [
      'label'    => 'ROOT CANAL THERAPY',
      'title'    => 'Save the Tooth. <em>End the Pain</em>.',
      'subtitle' => 'Modern, virtually painless root canal therapy that saves a damaged tooth from extraction &mdash; with the comfort techniques to make it nothing like the horror story.',
      'bg'       => 'root-canal-hero.jpg',
      'alt'      => 'Root canal therapy',
    ],
    'seo' => [
      'title'       => 'Root Canal in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Modern, virtually painless root canal therapy that saves the tooth and ends the pain. Free consultation with Dr. Burns in New Market, VA.',
    ],
    'intro' => [
      'label' => 'IT&rsquo;S NOT WHAT YOU&rsquo;VE HEARD',
      'title' => 'A root canal is the <span class="ds-italic">end of the pain</span>, not the cause of it.',
      'sub'   => 'The reputation comes from the toothache that makes a root canal necessary &mdash; not from the procedure itself. Modern root canal therapy with proper anesthesia is comfortable, predictable, and saves the tooth from extraction.',
      'pillars' => [
        [ 'strong' => 'Pain Ends Today', 'span' => 'the procedure is the cure' ],
        [ 'strong' => 'Tooth Saved', 'span' => 'no extraction needed' ],
        [ 'strong' => 'Comfort Options', 'span' => 'sedation if you want it' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your root canal visit, <span class="ds-italic">step by step</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Diagnosis &amp; numbing',  'desc' => 'X-rays confirm the infection. Local anesthesia (or sedation if you prefer) makes the area completely comfortable.' ],
        [ 'num' => '02', 'title' => 'Clean out the infection',  'desc' => 'A small access hole; the infected pulp is gently removed; the inside of the tooth is cleaned and shaped.' ],
        [ 'num' => '03', 'title' => 'Seal &amp; protect',       'desc' => 'The cleaned canal is filled and sealed. A temporary filling closes the access. The toothache that brought you in &mdash; gone.' ],
        [ 'num' => '04', 'title' => 'Crown for protection',     'desc' => 'A custom crown is placed at a follow-up visit to fully restore the tooth&rsquo;s strength and protect it for the long haul.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A root canal done thoughtfully, not rushed.',
      'cards' => [
        [ 'icon' => 'safety', 'title' => 'On-staff anesthesiology',     'desc' => 'For anxious patients or complex cases, full IV sedation is available &mdash; you can sleep through it.' ],
        [ 'icon' => 'cpu',    'title' => 'Modern imaging',               'desc' => 'Digital X-rays and 3D imaging let us see exactly where the infection is and plan the most efficient cleanout.' ],
        [ 'icon' => 'clock',  'title' => 'No rushing the visit',         'desc' => 'A root canal done well takes time. We don&rsquo;t book a 30-minute slot and try to push you out.' ],
      ],
    ],
    'cta' => [
      'label' => 'TOOTH HURTING?',
      'title' => 'Schedule an emergency-friendly consult.',
      'sub'   => 'If you&rsquo;re in pain, call <strong>(540) 740-8937</strong>. We try to see emergency cases the same day or next day.',
    ],
  ],

  'wisdom-teeth-removal' => [
    'category' => 'general',
    'sub_hero' => [
      'label'    => 'WISDOM TEETH REMOVAL',
      'title'    => 'A Comfortable Way Through &mdash; <em>With On-Staff Anesthesiology</em>.',
      'subtitle' => 'Safe, expertly planned wisdom-teeth removal &mdash; from a single tooth to all four, with full sedation if you want it.',
      'bg'       => 'wisdom-teeth-hero.jpg',
      'alt'      => 'Wisdom teeth removal consultation',
    ],
    'seo' => [
      'title'       => 'Wisdom Teeth Removal in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Safe, expertly planned wisdom-teeth removal with on-staff anesthesiology and a recovery plan that fits your week. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WISDOM TEETH OUT',
      'title' => 'Done <span class="ds-italic">in-house</span>, with the comfort options you&rsquo;d expect from a hospital.',
      'sub'   => 'Wisdom teeth often need to come out: impacted, crowding, hard to clean. Most offices refer this procedure out. We do it in-house with the same anesthesiology coverage we use for full-arch implant surgery.',
      'pillars' => [
        [ 'strong' => 'In-House Procedure', 'span' => 'no oral-surgeon referral needed' ],
        [ 'strong' => 'Full Sedation Option', 'span' => 'sleep through it if you want' ],
        [ 'strong' => 'Same-Day Recovery Plan', 'span' => 'clear instructions, direct cell line' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your wisdom-teeth visit.',
      'list' => [
        [ 'num' => '01', 'title' => 'Consultation &amp; 3D imaging', 'desc' => 'A panoramic X-ray (and 3D scan if needed) shows exactly how the wisdom teeth are positioned and what removal will involve.' ],
        [ 'num' => '02', 'title' => 'Comfort planning',              'desc' => 'Local numbing, nitrous, or full IV sedation &mdash; your call. For all four teeth, most patients pick full sedation.' ],
        [ 'num' => '03', 'title' => 'The procedure',                  'desc' => 'Typically 30&ndash;60 minutes for all four. You won&rsquo;t feel a thing during. We send you home with a driver and a clear recovery plan.' ],
        [ 'num' => '04', 'title' => 'Recovery follow-up',             'desc' => 'Most patients are back to normal in 3&ndash;5 days. Dr. Burns&rsquo;s direct cell number means you can text any worry, anytime.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A wisdom-teeth procedure done right.',
      'cards' => [
        [ 'icon' => 'safety', 'title' => 'On-staff anesthesiology',     'desc' => 'A board-certified physician anesthesiologist for sedation cases &mdash; not a dentist double-handling sedation while operating.' ],
        [ 'icon' => 'doctor', 'title' => 'Done by Dr. Burns himself',  'desc' => 'No referral to a separate oral surgeon. Same office, same doctor, same standards.' ],
        [ 'icon' => 'phone',  'title' => 'Recovery line you can call', 'desc' => 'Recovery questions go to Dr. Burns&rsquo;s personal cell &mdash; not a generic answering service.' ],
      ],
    ],
    'cta' => [
      'label' => 'WISDOM TEETH ACTING UP?',
      'title' => 'Schedule a wisdom-teeth consultation.',
      'sub'   => 'Free consultation, panoramic imaging, and a clear recommendation &mdash; out, watchful waiting, or no action needed.',
    ],
  ],

  // ════════════════════════════════════════════════════════════════════
  // COSMETIC DENTISTRY CHILDREN (3)
  // ════════════════════════════════════════════════════════════════════

  'porcelain-veneers' => [
    'category' => 'cosmetic',
    'sub_hero' => [
      'label'    => 'PORCELAIN VENEERS',
      'title'    => 'A Smile That Looks Like You &mdash; <em>On Your Best Day</em>.',
      'subtitle' => 'Custom-crafted ultra-thin porcelain shells that reshape, brighten, and rebuild a smile in just a few visits. Designed by an AACD-award-winning specialist.',
      'bg'       => 'veneers-hero.jpg',
      'alt'      => 'Porcelain veneers smile design',
    ],
    'seo' => [
      'title'       => 'Porcelain Veneers in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Custom porcelain veneers from an AACD-award-winning cosmetic specialist. Reshape, brighten, and rebuild your smile in just a few visits. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WHAT VENEERS DO',
      'title' => 'Veneers reshape <span class="ds-italic">the smile you already have</span>.',
      'sub'   => 'Porcelain veneers are ultra-thin shells bonded to the front of your teeth. They can change the color, shape, length, and alignment of teeth simultaneously &mdash; the closest thing dentistry has to an instant smile transformation.',
      'pillars' => [
        [ 'strong' => 'Designed Around You', 'span' => 'shape and shade matched to your face' ],
        [ 'strong' => 'Just 2&ndash;3 Visits', 'span' => 'from consult to final reveal' ],
        [ 'strong' => 'AACD-Recognized', 'span' => 'award-winning cosmetic work' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your veneer journey, <span class="ds-italic">visit by visit</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Smile design consultation', 'desc' => 'Photos, digital smile design preview, and a thorough conversation about what you actually want. You&rsquo;ll see the &ldquo;after&rdquo; before any work begins.' ],
        [ 'num' => '02', 'title' => 'Tooth preparation',         'desc' => 'A very thin layer of enamel is removed to make room for the veneer. Local anesthesia, no discomfort.' ],
        [ 'num' => '03', 'title' => 'Custom veneers crafted',    'desc' => 'Impressions go to a master ceramist; you wear temporary veneers for 1&ndash;2 weeks. The custom porcelain is shade-matched to your natural enamel.' ],
        [ 'num' => '04', 'title' => 'Final placement &amp; reveal', 'desc' => 'The veneers are bonded into place. The first time you see them in the mirror is the kind of moment that&rsquo;s hard to describe.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS FOR VENEERS',
      'title' => 'Why patients fly in for cosmetic work here.',
      'cards' => [
        [ 'icon' => 'sparkle', 'title' => 'AACD award recipient',         'desc' => 'Dr. Burns&rsquo;s cosmetic work has been recognized nationally by the American Academy of Cosmetic Dentistry.' ],
        [ 'icon' => 'cpu',     'title' => 'Digital smile design',         'desc' => 'You see your potential result on-screen before any veneer prep begins. Decisions get made with eyes wide open.' ],
        [ 'icon' => 'gem',     'title' => 'Master-ceramist lab partners', 'desc' => 'Veneer artistry depends on the lab. We use ceramists who specialize in cosmetic dentistry &mdash; not the cheapest available.' ],
      ],
    ],
    'cta' => [
      'label' => 'WANT TO SEE WHAT&rsquo;S POSSIBLE?',
      'title' => 'Book a free smile-design consultation.',
      'sub'   => 'Photos, digital smile design preview, and an honest conversation. Veneers are not for everyone &mdash; we&rsquo;ll tell you straight.',
    ],
  ],

  'teeth-whitening' => [
    'category' => 'cosmetic',
    'sub_hero' => [
      'label'    => 'TEETH WHITENING',
      'title'    => 'A Brighter Smile &mdash; <em>Without the Sensitivity</em>.',
      'subtitle' => 'Professional in-office and take-home whitening tailored to your enamel &mdash; safe, dramatic, and not the over-the-counter trip you&rsquo;ve had before.',
      'bg'       => 'whitening-hero.jpg',
      'alt'      => 'Professional teeth whitening',
    ],
    'seo' => [
      'title'       => 'Professional Teeth Whitening in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Professional in-office and take-home teeth whitening tailored to your enamel &mdash; safer, more dramatic, and lower-sensitivity than over-the-counter kits. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'NOT THE STRIPS',
      'title' => 'Professional whitening is <span class="ds-italic">a different category</span> from drugstore strips.',
      'sub'   => 'Over-the-counter products use weaker concentrations and one-size-fits-all trays. Professional whitening uses prescription-strength gel in custom-fitted trays &mdash; brighter results, more even, and far less sensitivity.',
      'pillars' => [
        [ 'strong' => 'Custom Trays', 'span' => 'gel reaches the teeth, not the gums' ],
        [ 'strong' => 'Stronger Gel', 'span' => 'dramatic results in days, not weeks' ],
        [ 'strong' => 'Sensitivity Plan', 'span' => 'tailored to your enamel' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your whitening options.',
      'list' => [
        [ 'num' => '01', 'title' => 'Whitening assessment',           'desc' => 'A quick evaluation: which type of staining, your sensitivity history, and the right approach for your case. Sometimes a cleaning is enough.' ],
        [ 'num' => '02', 'title' => 'In-office or take-home',         'desc' => 'In-office: dramatic results in one ~90 minute visit. Take-home: custom trays + prescription gel, 30&ndash;60 minutes a day for 2 weeks. Often we combine both.' ],
        [ 'num' => '03', 'title' => 'Maintenance plan',                'desc' => 'A simple maintenance schedule keeps the result bright. We&rsquo;ll tell you which foods/drinks to be careful with for the first 48 hours.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'Whitening that looks intentional, not bleached.',
      'cards' => [
        [ 'icon' => 'sparkle', 'title' => 'Result tuned to your face',     'desc' => 'There&rsquo;s a shade that&rsquo;s right for you and one that&rsquo;s too white. We&rsquo;ll help you find the natural-looking sweet spot.' ],
        [ 'icon' => 'shield',  'title' => 'Sensitivity-aware',             'desc' => 'We use desensitizing protocols when needed &mdash; especially for patients who&rsquo;ve had bad sensitivity from over-the-counter kits.' ],
        [ 'icon' => 'gem',     'title' => 'Pairs with veneers if needed', 'desc' => 'Whitening doesn&rsquo;t change crowns, fillings, or veneers. We&rsquo;ll tell you honestly if whitening alone will give you the result you want.' ],
      ],
    ],
    'cta' => [
      'label' => 'READY FOR A BRIGHTER SMILE?',
      'title' => 'Schedule a whitening consultation.',
      'sub'   => 'Free consultation, honest assessment of expected results, and clear pricing on every option.',
    ],
  ],

  'clear-braces' => [
    'category' => 'cosmetic',
    'sub_hero' => [
      'label'    => 'CLEAR BRACES',
      'title'    => 'Straighten Your Smile &mdash; <em>Without the Metal</em>.',
      'subtitle' => 'Discreet clear-aligner treatment for crowding, gaps, or bite issues. Removable, comfortable, and supervised personally by Dr. Burns.',
      'bg'       => 'aligners-hero.jpg',
      'alt'      => 'Clear braces / aligners consultation',
    ],
    'seo' => [
      'title'       => 'Clear Braces &amp; Aligners in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Discreet clear-aligner treatment for crooked teeth, gaps, or bite issues &mdash; planned and supervised by Dr. Burns. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'CLEAR &amp; REMOVABLE',
      'title' => 'A discreet way to straighten <span class="ds-italic">at any age</span>.',
      'sub'   => 'Clear aligners are nearly invisible, removable for eating and brushing, and (for the right cases) work as well as traditional braces. Adults often appreciate them; teens and young adults love them.',
      'pillars' => [
        [ 'strong' => 'Nearly Invisible', 'span' => 'others won&rsquo;t notice you&rsquo;re wearing them' ],
        [ 'strong' => 'Removable', 'span' => 'eat and brush like normal' ],
        [ 'strong' => '6&ndash;18 Months', 'span' => 'typical treatment duration' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your clear-aligner journey.',
      'list' => [
        [ 'num' => '01', 'title' => 'Consultation &amp; case planning', 'desc' => 'A digital scan maps your current bite. Dr. Burns reviews the case and confirms whether clear aligners are the right fit (sometimes traditional braces are better for complex cases).' ],
        [ 'num' => '02', 'title' => 'Custom aligner series',            'desc' => 'A series of custom aligners is fabricated &mdash; each one moves your teeth a little closer to the planned final position. You wear each set for ~2 weeks.' ],
        [ 'num' => '03', 'title' => 'Periodic check-ins',                'desc' => 'Quick check-in visits every 6&ndash;8 weeks to track progress. Dr. Burns supervises the case throughout &mdash; not a remote-only treatment plan.' ],
        [ 'num' => '04', 'title' => 'Retainers to lock it in',           'desc' => 'After the active treatment ends, custom retainers keep the new alignment locked in for the long haul.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'Aligners with a real doctor in the loop.',
      'cards' => [
        [ 'icon' => 'aligner', 'title' => 'Doctor-supervised',           'desc' => 'Not a mail-order, app-only program. Dr. Burns reviews progress and adjusts the plan if your teeth aren&rsquo;t moving as predicted.' ],
        [ 'icon' => 'cpu',     'title' => 'Digital case planning',       'desc' => 'You see the projected end result before treatment starts. No mystery about where you&rsquo;ll end up.' ],
        [ 'icon' => 'doctor',  'title' => 'Honest case selection',       'desc' => 'For complex cases, we&rsquo;ll tell you when traditional braces are the better option. Aligners aren&rsquo;t the right tool for every job.' ],
      ],
    ],
    'cta' => [
      'label' => 'READY TO STRAIGHTEN UP?',
      'title' => 'Schedule a clear-braces consultation.',
      'sub'   => 'Free consultation, digital case preview, and an honest read on whether aligners are right for your case.',
    ],
  ],

  // ════════════════════════════════════════════════════════════════════
  // PREVENTATIVE CARE SUBPAGES (5 service-detail + 2 gum-disease children)
  // ════════════════════════════════════════════════════════════════════

  'anesthesia' => [
    'category' => 'prevent',
    'sub_hero' => [
      'label'    => 'ANESTHESIA &amp; SEDATION',
      'title'    => 'Comfort Options &mdash; <em>From Local Numbing to Full Sedation</em>.',
      'subtitle' => 'Whatever your procedure, whatever your comfort level, we have an option that fits. With a board-certified physician anesthesiologist on staff for sedation cases.',
      'bg'       => 'anesthesia-hero.jpg',
      'alt'      => 'Anesthesia and sedation options',
    ],
    'seo' => [
      'title'       => 'Anesthesia &amp; Sedation Dentistry in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Local numbing, nitrous oxide, oral sedation, and full IV sedation &mdash; with a board-certified physician anesthesiologist on staff. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'COMFORT ON YOUR TERMS',
      'title' => 'Modern anesthesia means <span class="ds-italic">no procedure should be feared</span>.',
      'sub'   => 'Whether it&rsquo;s a routine filling or a full-arch implant case, we have a comfort option that fits. The most important difference: for IV sedation, we use a board-certified physician anesthesiologist &mdash; not a CRNA, not a contractor, not the dentist double-handling sedation while operating.',
      'pillars' => [
        [ 'strong' => 'Physician Anesthesiologist', 'span' => 'on staff for sedation cases' ],
        [ 'strong' => 'Multiple Levels Available', 'span' => 'matched to your procedure' ],
        [ 'strong' => 'Anxiety-Aware', 'span' => 'no judgement about being nervous' ],
      ],
    ],
    'steps' => [
      'label' => 'YOUR OPTIONS',
      'title' => 'Anesthesia options, <span class="ds-italic">explained simply</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Local anesthesia',           'desc' => 'A simple numbing injection. Used for most routine procedures. You&rsquo;re fully awake and aware &mdash; just the area being worked on is numb.' ],
        [ 'num' => '02', 'title' => 'Nitrous oxide ("laughing gas")', 'desc' => 'A relaxing gas you breathe through a small mask. You&rsquo;re still conscious but very relaxed. Wears off completely within minutes &mdash; you can drive yourself home.' ],
        [ 'num' => '03', 'title' => 'Oral sedation',              'desc' => 'A pill taken about an hour before your appointment. You&rsquo;re drowsy but conscious. You&rsquo;ll need a driver.' ],
        [ 'num' => '04', 'title' => 'IV sedation',                'desc' => 'For longer or more complex procedures (especially full-arch implants and wisdom teeth), full IV sedation lets you sleep through the whole thing. Always with our physician anesthesiologist.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY OUR APPROACH IS DIFFERENT',
      'title' => 'Why patients pick this office for sedation cases.',
      'cards' => [
        [ 'icon' => 'safety', 'title' => 'Physician anesthesiologist',       'desc' => 'A separate medical professional &mdash; board-certified MD &mdash; runs the sedation while Dr. Burns focuses entirely on the procedure. Two specialists in the room.' ],
        [ 'icon' => 'sleep',  'title' => 'Calm, no judgment',                 'desc' => 'Many of our patients come in after years of avoiding the dentist. We get it. There&rsquo;s no eye-rolling about being nervous &mdash; just the right comfort plan.' ],
        [ 'icon' => 'check',  'title' => 'Documented safety record',          'desc' => 'Decades of sedation cases without incident. We document every protocol, every dose, every recovery period.' ],
      ],
    ],
    'cta' => [
      'label' => 'NERVOUS ABOUT A PROCEDURE?',
      'title' => 'Talk through comfort options before booking.',
      'sub'   => 'Free phone or in-person consultation. We&rsquo;ll walk through what each level of sedation feels like and which one fits your case.',
    ],
  ],

  'dental-exams' => [
    'category' => 'prevent',
    'sub_hero' => [
      'label'    => 'DENTAL EXAMS &amp; CHECK-UPS',
      'title'    => 'A Six-Month Visit That <em>Actually Catches Things Early</em>.',
      'subtitle' => 'Comprehensive dental exams that go beyond the perfunctory peek &mdash; oral cancer screening, bite analysis, gum health, and a real conversation about what we see.',
      'bg'       => 'exams-hero.jpg',
      'alt'      => 'Dental exam and check-up',
    ],
    'seo' => [
      'title'       => 'Dental Exams &amp; Check-ups in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Comprehensive dental exams in New Market, VA &mdash; oral cancer screening, bite analysis, gum health, and a real conversation about what we see. Schedule your check-up today.',
    ],
    'intro' => [
      'label' => 'YOUR REGULAR CHECK-UP',
      'title' => 'A check-up that <span class="ds-italic">finds things while they&rsquo;re still small</span>.',
      'sub'   => 'Most dental problems are easier and cheaper to fix when caught early. A small cavity beats a root canal. Early gum disease beats periodontal surgery. A small fracture beats a crown. Six-month exams are how that early-catching happens.',
      'pillars' => [
        [ 'strong' => 'Oral Cancer Screening', 'span' => 'every visit, every patient' ],
        [ 'strong' => 'Digital X-rays', 'span' => '90% less radiation than film' ],
        [ 'strong' => 'Bite Analysis', 'span' => 'catches issues before they cause damage' ],
      ],
    ],
    'steps' => [
      'label' => 'WHAT TO EXPECT',
      'title' => 'A typical six-month exam, <span class="ds-italic">step by step</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Health history update',          'desc' => 'A quick check-in on any changes since your last visit &mdash; new medications, new conditions, anything bothering you.' ],
        [ 'num' => '02', 'title' => 'X-rays (when due)',               'desc' => 'Digital X-rays as needed (usually every 1&ndash;2 years for routine patients). 90% less radiation than the old film versions.' ],
        [ 'num' => '03', 'title' => 'Comprehensive exam',              'desc' => 'Dr. Burns examines every tooth, your gums, your bite, your jaw joints, and screens for oral cancer. We talk about anything we see, in plain English.' ],
        [ 'num' => '04', 'title' => 'Cleaning &amp; next steps',       'desc' => 'A professional cleaning by your hygienist, plus any next-step planning if a treatment is recommended. No surprise charges, ever.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A check-up that&rsquo;s a real conversation.',
      'cards' => [
        [ 'icon' => 'doctor', 'title' => 'Time to actually look',     'desc' => 'We don&rsquo;t book back-to-back exams in 15-minute slots. Dr. Burns spends real time on every check-up.' ],
        [ 'icon' => 'shield', 'title' => 'Oral cancer screening',     'desc' => 'Every exam includes a screening for oral cancer. Early detection changes outcomes dramatically.' ],
        [ 'icon' => 'check',  'title' => 'Honest treatment recs',     'desc' => 'If something can be watched, we&rsquo;ll watch it. We don&rsquo;t recommend treatment that isn&rsquo;t needed.' ],
      ],
    ],
    'cta' => [
      'label' => 'DUE FOR A CHECK-UP?',
      'title' => 'Schedule your dental exam.',
      'sub'   => 'New patients welcome. We accept most insurance and verify your coverage before any treatment.',
    ],
  ],

  'oral-hygiene' => [
    'category' => 'prevent',
    'sub_hero' => [
      'label'    => 'ORAL HYGIENE',
      'title'    => 'The Daily Habits That <em>Save Your Teeth</em>.',
      'subtitle' => 'Brushing, flossing, mouthwash, diet, electric vs. manual &mdash; the home-care basics, explained without the lecture.',
      'bg'       => 'oral-hygiene-hero.jpg',
      'alt'      => 'Oral hygiene coaching',
    ],
    'seo' => [
      'title'       => 'Oral Hygiene Coaching in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Practical, personalized oral hygiene coaching &mdash; the daily habits that prevent cavities, gum disease, and bigger problems. New Market, VA.',
    ],
    'intro' => [
      'label' => 'PREVENTION FIRST',
      'title' => 'Most dental problems start with <span class="ds-italic">small daily habits</span>.',
      'sub'   => 'You&rsquo;ve probably heard &ldquo;floss more&rdquo; from a dentist. We&rsquo;d rather tell you specifically what your mouth needs &mdash; not generic advice. Some patients need to focus on technique. Some need to switch to an electric brush. Some need to address dry mouth from a medication.',
      'pillars' => [
        [ 'strong' => 'Personalized Coaching', 'span' => 'tailored to what your mouth actually needs' ],
        [ 'strong' => 'Technique Tips', 'span' => 'small changes that make a huge difference' ],
        [ 'strong' => 'Product Recommendations', 'span' => 'what works, not just what we sell' ],
      ],
    ],
    'steps' => [
      'label' => 'WHAT WE COVER',
      'title' => 'Topics your hygienist will cover.',
      'list' => [
        [ 'num' => '01', 'title' => 'Brushing technique',              'desc' => 'How long, how hard, what angle. Most adults brush effectively for under 30 seconds &mdash; we&rsquo;ll show you the small fixes that change everything.' ],
        [ 'num' => '02', 'title' => 'Flossing (or alternatives)',       'desc' => 'Traditional floss, water flossers, interdental brushes &mdash; what works for you. Bridges, implants, and crowns each need their own approach.' ],
        [ 'num' => '03', 'title' => 'Mouthwash, fluoride, diet',        'desc' => 'When mouthwash actually helps. Fluoride decisions if you&rsquo;re cavity-prone. Diet patterns that quietly cause damage (looking at you, sparkling water).' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'Coaching, not lecturing.',
      'cards' => [
        [ 'icon' => 'shield', 'title' => 'No judgment',                 'desc' => 'Years between dental visits? Bad habits? We&rsquo;ve seen it all and we&rsquo;re glad you&rsquo;re here now. Where you start doesn&rsquo;t matter as much as where you go.' ],
        [ 'icon' => 'check',  'title' => 'Practical advice',            'desc' => 'No generic &ldquo;floss more&rdquo; lectures. Specific changes targeted at what we actually see in your mouth.' ],
        [ 'icon' => 'leaf',   'title' => 'Long-term thinking',          'desc' => 'Small habit changes compound over decades. We&rsquo;re here for the long haul, not just today&rsquo;s visit.' ],
      ],
    ],
    'cta' => [
      'label' => 'WANT BETTER HOME-CARE HABITS?',
      'title' => 'Book a check-up with hygiene coaching included.',
      'sub'   => 'A standard check-up always includes time with your hygienist for personalized coaching. No extra charge.',
    ],
  ],

  'teeth-cleaning' => [
    'category' => 'prevent',
    'sub_hero' => [
      'label'    => 'TEETH CLEANING',
      'title'    => 'Professional Cleaning That <em>Leaves Your Teeth Squeaky Clean</em>.',
      'subtitle' => 'Routine professional cleanings that remove the buildup brushing can&rsquo;t reach &mdash; the foundation of good oral health.',
      'bg'       => 'gum-disease-hero.jpg',
      'alt'      => 'Professional teeth cleaning',
    ],
    'seo' => [
      'title'       => 'Professional Teeth Cleaning in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Routine professional teeth cleanings in New Market, VA. Removes the plaque and tartar brushing can&rsquo;t reach. Schedule your cleaning today.',
    ],
    'intro' => [
      'label' => 'YOUR REGULAR CLEANING',
      'title' => 'The cleaning that <span class="ds-italic">brushing alone can&rsquo;t do</span>.',
      'sub'   => 'Even with great home care, plaque hardens into tartar in places a toothbrush cannot reach. Professional cleanings every 6 months remove that buildup before it causes gum disease, cavities, or bone loss.',
      'pillars' => [
        [ 'strong' => 'Every 6 Months', 'span' => 'recommended baseline for most adults' ],
        [ 'strong' => 'Tartar Removal', 'span' => 'what brushing physically cannot do' ],
        [ 'strong' => 'Polish &amp; Fluoride', 'span' => 'leaves teeth smooth and protected' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW A CLEANING WORKS',
      'title' => 'Your cleaning visit.',
      'list' => [
        [ 'num' => '01', 'title' => 'Quick assessment',          'desc' => 'Your hygienist takes a look at your gum health, checks for changes since last visit, and notes any spots that need extra attention.' ],
        [ 'num' => '02', 'title' => 'Scaling',                   'desc' => 'Tartar (hardened plaque) is gently removed from teeth and just below the gum line. Modern ultrasonic tools make this far more comfortable than the old hand-scaling.' ],
        [ 'num' => '03', 'title' => 'Polish &amp; floss',        'desc' => 'A gritty polish removes surface stains and leaves teeth smooth. Floss confirms nothing was missed between teeth.' ],
        [ 'num' => '04', 'title' => 'Fluoride (when appropriate)', 'desc' => 'A quick fluoride treatment strengthens enamel &mdash; especially helpful for patients with sensitivity or cavity history.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'Cleanings done thoroughly, not rushed.',
      'cards' => [
        [ 'icon' => 'clock',  'title' => 'Real time per visit',         'desc' => 'A proper adult cleaning takes 45&ndash;60 minutes. We don&rsquo;t book 30-minute slots and rush you out.' ],
        [ 'icon' => 'sparkle', 'title' => 'Comfortable techniques',     'desc' => 'Modern ultrasonic scaling is dramatically more comfortable than old hand-scaling. We use it on every patient unless there&rsquo;s a specific reason not to.' ],
        [ 'icon' => 'shield',  'title' => 'Honest gum-health check',   'desc' => 'If your gums need more than a routine cleaning (a deep cleaning, periodontal therapy), we&rsquo;ll tell you straight &mdash; with what it costs and why.' ],
      ],
    ],
    'cta' => [
      'label' => 'DUE FOR A CLEANING?',
      'title' => 'Schedule your professional cleaning.',
      'sub'   => 'New patients welcome. Most insurance plans cover cleanings at 100% &mdash; we verify before your visit.',
    ],
  ],

  'dental-sealants' => [
    'category' => 'prevent',
    'sub_hero' => [
      'label'    => 'DENTAL SEALANTS',
      'title'    => 'A Thin Coating That <em>Prevents Cavities Before They Start</em>.',
      'subtitle' => 'A simple protective coating on the chewing surface of molars &mdash; especially for kids and teens whose new permanent teeth are most cavity-prone.',
      'bg'       => 'sealants-hero.jpg',
      'alt'      => 'Dental sealants for cavity prevention',
    ],
    'seo' => [
      'title'       => 'Dental Sealants in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Dental sealants prevent cavities in the deep grooves of molars &mdash; especially for kids and teens. Painless, fast, and highly effective. New Market, VA.',
    ],
    'intro' => [
      'label' => 'PREVENTION THAT WORKS',
      'title' => 'A 5-minute treatment that <span class="ds-italic">prevents 80% of cavities</span> in molars.',
      'sub'   => 'The chewing surface of molars has deep grooves where toothbrush bristles can&rsquo;t reach. Bacteria and food particles settle in &mdash; cavities form. A sealant fills those grooves with a clear protective coating that bacteria can&rsquo;t penetrate.',
      'pillars' => [
        [ 'strong' => '~80% Cavity Reduction', 'span' => 'in protected molars' ],
        [ 'strong' => 'Painless &amp; Fast', 'span' => 'about 5 minutes per tooth' ],
        [ 'strong' => 'Lasts Years', 'span' => 'with simple maintenance' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'A sealant visit, <span class="ds-italic">no drills involved</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Tooth cleaning &amp; prep', 'desc' => 'The chewing surface is cleaned and lightly etched so the sealant will bond properly. Painless, no anesthesia needed.' ],
        [ 'num' => '02', 'title' => 'Sealant application',       'desc' => 'A thin coat of sealant is painted onto the chewing surface and hardened with a special light. Takes about a minute.' ],
        [ 'num' => '03', 'title' => 'Bite check',                 'desc' => 'Quick bite check to confirm the sealant doesn&rsquo;t feel high. Done. Eat normally afterward.' ],
      ],
    ],
    'why' => [
      'label' => 'WHO SEALANTS ARE FOR',
      'title' => 'Sealants make sense for these patients.',
      'cards' => [
        [ 'icon' => 'kid',     'title' => 'Kids &amp; teens',           'desc' => 'Permanent molars come in around age 6 and 12. The first 2&ndash;4 years after eruption is when they&rsquo;re most cavity-prone &mdash; ideal sealant timing.' ],
        [ 'icon' => 'shield',  'title' => 'Cavity-prone adults',         'desc' => 'Adults with deep grooves on their molars and a history of cavities can also benefit. We&rsquo;ll tell you honestly if it&rsquo;s worth doing.' ],
        [ 'icon' => 'wallet',  'title' => 'Insurance often covers',     'desc' => 'Most pediatric insurance plans cover sealants at 100%. We verify before any treatment.' ],
      ],
    ],
    'cta' => [
      'label' => 'WANT TO PREVENT CAVITIES?',
      'title' => 'Schedule a sealant consultation.',
      'sub'   => 'Free assessment to see whether sealants are worth it for your child (or you). We won&rsquo;t recommend them unless they&rsquo;ll help.',
    ],
  ],

  'deep-teeth-cleaning' => [
    'category' => 'prevent',
    'sub_hero' => [
      'label'    => 'DEEP TEETH CLEANING',
      'title'    => 'When a Routine Cleaning <em>Isn&rsquo;t Enough</em>.',
      'subtitle' => 'Scaling and root planing for early gum disease &mdash; gentle, thorough, and the right step before things get worse.',
      'bg'       => 'deep-cleaning-hero.jpg',
      'alt'      => 'Deep teeth cleaning &mdash; scaling and root planing',
    ],
    'seo' => [
      'title'       => 'Deep Teeth Cleaning (Scaling &amp; Root Planing) in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Deep cleaning (scaling and root planing) for early gum disease. The right step when a routine cleaning isn&rsquo;t enough. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WHEN A DEEP CLEANING IS RIGHT',
      'title' => 'When the gum line has <span class="ds-italic">started to detach</span>.',
      'sub'   => 'Early gum disease (gingivitis, mild periodontitis) means tartar has worked below the gum line and the tissue is starting to separate from the tooth. A regular cleaning can&rsquo;t reach that far. A deep cleaning &mdash; scaling and root planing &mdash; gently cleans below the gum and smooths the root surface so the tissue can reattach.',
      'pillars' => [
        [ 'strong' => 'Reverses Early Gum Disease', 'span' => 'when caught in time' ],
        [ 'strong' => 'Comfort Options', 'span' => 'numbing, sedation if needed' ],
        [ 'strong' => 'Prevents Worse', 'span' => 'avoids surgery and tooth loss' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your deep cleaning visit.',
      'list' => [
        [ 'num' => '01', 'title' => 'Comfort planning',                'desc' => 'Local anesthesia for the area being cleaned. Some patients prefer a touch of nitrous oxide to take the edge off.' ],
        [ 'num' => '02', 'title' => 'Scaling below the gum line',      'desc' => 'Specialized tools (often ultrasonic) carefully remove tartar from below the gum line where a regular cleaning can&rsquo;t reach.' ],
        [ 'num' => '03', 'title' => 'Root planing',                    'desc' => 'The root surface is smoothed so bacteria can&rsquo;t easily re-attach and so the gum tissue can heal back tight against the tooth.' ],
        [ 'num' => '04', 'title' => 'Follow-up &amp; maintenance',     'desc' => 'A follow-up visit confirms the gums are healing. Most patients move to 3&ndash;4 month maintenance cleanings to keep gum disease from returning.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A deep cleaning done thoroughly &mdash; not rushed.',
      'cards' => [
        [ 'icon' => 'shield', 'title' => 'Stops the progression',        'desc' => 'Early gum disease is reversible if treated. Untreated, it leads to bone loss and eventually tooth loss. The deep cleaning is the early intervention.' ],
        [ 'icon' => 'clock',  'title' => 'Time per quadrant',            'desc' => 'A proper deep cleaning often takes two visits (two quadrants per visit). We don&rsquo;t cram it into a single rushed appointment.' ],
        [ 'icon' => 'check',  'title' => 'Honest assessment',            'desc' => 'If a regular cleaning is enough, we&rsquo;ll do that. We don&rsquo;t upsell deep cleanings just because they&rsquo;re more expensive.' ],
      ],
    ],
    'cta' => [
      'label' => 'GUM ISSUES?',
      'title' => 'Schedule a gum-health assessment.',
      'sub'   => 'Free consultation. Honest assessment of whether a regular cleaning, deep cleaning, or further periodontal care is the right step.',
    ],
  ],

  'periodontal-maintenance' => [
    'category' => 'prevent',
    'sub_hero' => [
      'label'    => 'PERIODONTAL MAINTENANCE',
      'title'    => 'Keeping Gum Disease <em>From Coming Back</em>.',
      'subtitle' => 'Specialized maintenance cleanings every 3&ndash;4 months for patients who&rsquo;ve had gum disease &mdash; the way to stay ahead of it long-term.',
      'bg'       => 'perio-maint-hero.jpg',
      'alt'      => 'Periodontal maintenance cleanings',
    ],
    'seo' => [
      'title'       => 'Periodontal Maintenance in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Periodontal maintenance cleanings every 3&ndash;4 months for patients who&rsquo;ve had gum disease &mdash; the long-term plan to stay healthy. New Market, VA.',
    ],
    'intro' => [
      'label' => 'AFTER A DEEP CLEANING',
      'title' => 'Gum disease can come back &mdash; <span class="ds-italic">unless you stay ahead of it</span>.',
      'sub'   => 'Once you&rsquo;ve had gum disease and gone through deep cleaning, your maintenance plan changes. Instead of standard 6-month cleanings, you move to 3&ndash;4 month periodontal maintenance visits &mdash; the cadence that&rsquo;s been shown to keep gum disease from returning.',
      'pillars' => [
        [ 'strong' => 'Every 3&ndash;4 Months', 'span' => 'the proven prevention cadence' ],
        [ 'strong' => 'Specialized Cleaning', 'span' => 'goes below the gum line' ],
        [ 'strong' => 'Stays Ahead Long-Term', 'span' => 'protects your investment' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'Your maintenance visits.',
      'list' => [
        [ 'num' => '01', 'title' => 'Gum-health check',                'desc' => 'Probing depths around each tooth to track gum-line health over time. Any spots that look like trouble &mdash; we catch them early.' ],
        [ 'num' => '02', 'title' => 'Specialized cleaning',            'desc' => 'A cleaning that goes deeper than a routine adult cleaning &mdash; below the gum line where bacteria love to settle.' ],
        [ 'num' => '03', 'title' => 'Education &amp; technique tips',  'desc' => 'Specific home-care coaching tailored to where your gums need extra attention &mdash; and where they don&rsquo;t.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY THIS CADENCE WORKS',
      'title' => 'Three reasons periodontal patients commit.',
      'cards' => [
        [ 'icon' => 'shield', 'title' => 'Prevents progression',         'desc' => 'Patients who stick to 3&ndash;4 month maintenance lose dramatically fewer teeth than those who try to manage with 6-month visits.' ],
        [ 'icon' => 'wallet', 'title' => 'Cheaper than the alternative', 'desc' => 'Maintenance cleanings cost a fraction of what untreated gum disease costs &mdash; surgery, bone loss, eventual tooth loss and replacement.' ],
        [ 'icon' => 'clock',  'title' => 'Visits stay short',            'desc' => 'When you&rsquo;re on the right cadence, each visit is brief and uneventful. The time investment is small.' ],
      ],
    ],
    'cta' => [
      'label' => 'ON A MAINTENANCE PLAN?',
      'title' => 'Schedule your next maintenance visit.',
      'sub'   => 'New to our practice and on periodontal maintenance elsewhere? We&rsquo;re happy to take over &mdash; bring records and we&rsquo;ll continue your plan.',
    ],
  ],

  // ════════════════════════════════════════════════════════════════════
  // RESTORATIVE CARE CHILDREN (1)
  // ════════════════════════════════════════════════════════════════════

  'dental-fillings' => [
    'category' => 'restore',
    'sub_hero' => [
      'label'    => 'DENTAL FILLINGS',
      'title'    => 'Tooth-Colored Fillings &mdash; <em>The Way Modern Dentistry Should Look</em>.',
      'subtitle' => 'Composite fillings that match your natural tooth shade &mdash; no more silver flashes when you laugh.',
      'bg'       => 'fillings-hero.jpg',
      'alt'      => 'Tooth-colored composite fillings',
    ],
    'seo' => [
      'title'       => 'Tooth-Colored Dental Fillings in New Market, VA | Dr. Jeffrey S. Burns, DDS',
      'description' => 'Modern tooth-colored composite fillings that match your natural enamel &mdash; no more silver flashes when you laugh. Free consultation in New Market, VA.',
    ],
    'intro' => [
      'label' => 'A FILLING DONE RIGHT',
      'title' => 'A small filling, <span class="ds-italic">done well</span>, lasts decades.',
      'sub'   => 'A filling restores a tooth after decay. We use modern tooth-colored composite material &mdash; not the silver amalgam fillings of the past. The result is invisible, bonded directly to the tooth, and protective for the long haul.',
      'pillars' => [
        [ 'strong' => 'Tooth-Colored Material', 'span' => 'invisible to anyone looking' ],
        [ 'strong' => 'Bonded, Not Wedged', 'span' => 'composite seals the tooth' ],
        [ 'strong' => 'Lasts Many Years', 'span' => 'with proper care' ],
      ],
    ],
    'steps' => [
      'label' => 'HOW IT WORKS',
      'title' => 'A filling visit, <span class="ds-italic">straightforward and quick</span>.',
      'list' => [
        [ 'num' => '01', 'title' => 'Numbing &amp; prep',          'desc' => 'Local anesthesia keeps the area completely comfortable. The decay is gently removed and the tooth is prepared.' ],
        [ 'num' => '02', 'title' => 'Composite placement',         'desc' => 'Tooth-colored composite is bonded directly to the tooth in layers, each layer hardened with a special light.' ],
        [ 'num' => '03', 'title' => 'Shape &amp; bite check',      'desc' => 'The filling is shaped to match the original tooth contour. We adjust the bite until it feels exactly right before you leave.' ],
      ],
    ],
    'why' => [
      'label' => 'WHY DR. BURNS',
      'title' => 'A filling that lasts and disappears.',
      'cards' => [
        [ 'icon' => 'sparkle', 'title' => 'Tooth-colored, always',     'desc' => 'We don&rsquo;t do silver amalgam fillings. Composite is the modern standard &mdash; better appearance, no metal expansion over time.' ],
        [ 'icon' => 'shield',  'title' => 'Bonded for a real seal',    'desc' => 'Composite bonds to the tooth, sealing the prep area. This protects against the recurrent decay that often forms around old amalgam fillings.' ],
        [ 'icon' => 'clock',   'title' => 'Quick visit',               'desc' => 'Most fillings take about 30&ndash;45 minutes. You&rsquo;re back to normal eating within a couple hours.' ],
      ],
    ],
    'cta' => [
      'label' => 'NEED A FILLING?',
      'title' => 'Schedule a filling consultation.',
      'sub'   => 'Free consultation. Honest assessment of whether a filling, crown, or other treatment is the right call.',
    ],
  ],

  // ════════════════════════════════════════════════════════════════════
  // RESOURCES CHILDREN (2)
  // ════════════════════════════════════════════════════════════════════

  'financing' => [
    'category' => 'resource',
    'sub_hero' => [
      'label'    => 'FINANCING &amp; INSURANCE',
      'title'    => 'Flexible Payment &mdash; <em>So Cost Isn&rsquo;t the Reason You Wait</em>.',
      'subtitle' => 'Most major insurance accepted. Cherry, CareCredit, and Sunbit financing for what insurance doesn&rsquo;t cover. Turnkey pricing &mdash; no surprise bills.',
      'bg'       => 'financing-hero.jpg',
      'alt'      => 'Financing and insurance options',
    ],
    'seo' => [
      'title'       => 'Financing &amp; Insurance | Dr. Jeffrey S. Burns, DDS &middot; New Market, VA',
      'description' => 'Most major insurance accepted plus flexible financing through Cherry, CareCredit, and Sunbit. Turnkey pricing &mdash; no surprise bills. New Market, VA.',
    ],
    'intro' => [
      'label' => 'PAYING FOR CARE',
      'title' => 'Cost should never be <span class="ds-italic">why you put off care</span>.',
      'sub'   => 'We work hard to make every care plan financially achievable. That means accepting most insurance plans, offering several outside-financing partners for what insurance doesn&rsquo;t cover, and providing turnkey pricing so you know what you owe before any treatment begins.',
      'pillars' => [
        [ 'strong' => 'Most Insurance Accepted', 'span' => 'Delta, MetLife, Cigna, Aetna, Anthem, more' ],
        [ 'strong' => '0% APR Available', 'span' => 'for qualifying patients' ],
        [ 'strong' => 'Turnkey Pricing', 'span' => 'one number covers everything' ],
      ],
    ],
    'steps' => [
      'label' => 'YOUR PAYMENT OPTIONS',
      'title' => 'Three ways patients pay.',
      'list' => [
        [ 'num' => '01', 'title' => 'Insurance',                       'desc' => 'We file claims directly with most major dental insurance providers. Bring your card; we verify your coverage before any treatment so there are no surprises.' ],
        [ 'num' => '02', 'title' => 'Outside financing',                'desc' => 'For procedures insurance won&rsquo;t cover (especially implants and full-arch cases), we partner with Cherry, CareCredit, and Sunbit. Quick approval, including 0% APR plans for qualifying patients.' ],
        [ 'num' => '03', 'title' => 'Direct payment plans',             'desc' => 'For larger cases, we can work out a direct payment plan with you. We&rsquo;d rather see you get the care you need than have you wait years to save up.' ],
      ],
    ],
    'why' => [
      'label' => 'OUR PRICING APPROACH',
      'title' => 'Three things you won&rsquo;t encounter here.',
      'cards' => [
        [ 'icon' => 'wallet', 'title' => 'No surprise bills',          'desc' => 'Turnkey pricing on all major procedures. The number we quote is the number you pay &mdash; no add-on charges discovered later.' ],
        [ 'icon' => 'check',  'title' => 'No hidden fees',              'desc' => 'Implant cases include the surgery, anesthesia, lab work, restoration, follow-ups, AND the lifetime warranty. One number, all in.' ],
        [ 'icon' => 'shield', 'title' => 'No high-pressure upsells',    'desc' => 'We recommend the right treatment for your case &mdash; not the most expensive one. Sometimes the right answer is &ldquo;watch and wait.&rdquo;' ],
      ],
    ],
    'cta' => [
      'label' => 'WANT FULL PRICING DETAILS?',
      'title' => 'Schedule a financing consultation.',
      'sub'   => 'Free consultation, insurance verification, and a written treatment plan with full pricing &mdash; before any commitment.',
    ],
  ],

  'patient-education' => [
    'category' => 'resource',
    'kind'     => 'index',
    'sub_hero' => [
      'label'    => 'PATIENT EDUCATION',
      'title'    => 'Plain-English Articles on <em>Real Dentistry</em>.',
      'subtitle' => 'Honest, jargon-free articles on procedures, recovery, and what to expect &mdash; reviewed by Dr.&nbsp;Burns&rsquo;s office, written for patients.',
      'bg'       => 'resources-hero.jpg',
      'alt'      => 'Patient education articles',
    ],
    'seo' => [
      'title'       => 'Patient Education | Dr. Jeffrey S. Burns, DDS &middot; New Market, VA',
      'description' => 'Plain-English articles on dental procedures, recovery, and what to expect &mdash; reviewed by Dr. Jeffrey S. Burns&rsquo;s office in New Market, VA.',
    ],
    'intro' => [
      'label' => 'WHY THIS PAGE EXISTS',
      'title' => 'Dental information you can <span class="ds-italic">actually use</span>.',
      'sub'   => 'Most dental writing online falls into two camps: thinly disguised marketing for clinics, or technical articles written for other dentists. Neither helps a patient trying to understand what&rsquo;s happening in their mouth. We&rsquo;re building a library of plain-English articles to fix that.',
      'pillars' => [
        [ 'strong' => 'Procedure Walkthroughs', 'span' => 'what actually happens, in plain English' ],
        [ 'strong' => 'Recovery Realities', 'span' => 'honest expectations, not soft-pedaled timelines' ],
        [ 'strong' => 'Decision Frameworks', 'span' => 'how to think through your options' ],
      ],
    ],
    'steps' => [
      'label' => 'WHAT&rsquo;S COMING',
      'title' => 'Topics in the works.',
      'list' => [
        [ 'num' => '01', 'title' => '&ldquo;Should I get an implant or a bridge?&rdquo;', 'desc' => 'A frank decision-framework article walking through cost, longevity, impact on neighboring teeth, and how to think about the trade-offs.' ],
        [ 'num' => '02', 'title' => '&ldquo;What full-arch surgery actually feels like&rdquo;', 'desc' => 'An honest first-person account of what All-on-4 day-of and recovery week feels like &mdash; written from real patient experiences.' ],
        [ 'num' => '03', 'title' => '&ldquo;Why your insurance &lsquo;covers&rsquo; less than you think&rdquo;', 'desc' => 'A no-nonsense explainer of how dental insurance actually works &mdash; and how to think about cost when insurance won&rsquo;t cover the recommended treatment.' ],
      ],
    ],
    'why' => [
      'label' => 'WHILE YOU WAIT',
      'title' => 'Have a question now? Ask Dr. Burns directly.',
      'cards' => [
        [ 'icon' => 'phone', 'title' => 'Call the office',           'desc' => 'For specific questions about your case, calling beats reading. Real receptionist, real conversation, no answering tree.' ],
        [ 'icon' => 'book',  'title' => 'Read the FAQs',             'desc' => 'Our <a href="/implant-faqs/">Implant FAQs</a> page covers the most common questions about pain, healing, longevity, and cost.' ],
        [ 'icon' => 'check', 'title' => 'Schedule a free consult',   'desc' => 'For anything more than a general question, a free consultation is faster than reading. No commitment.' ],
      ],
    ],
    'cta' => [
      'label' => 'WANT A SPECIFIC TOPIC COVERED?',
      'title' => 'Tell us what you&rsquo;d like to read about.',
      'sub'   => 'Patient questions drive what we write next. Call the office or mention your topic when you schedule &mdash; we&rsquo;ll add it to the queue.',
    ],
  ],

];
