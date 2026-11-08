# SEO Issues Tracker: developer response to the Nov 5 recheck (2026-11-07)

Response to the **Nov 5, 2026 recheck** of "Dr. Jeffrey Burns - SEO Issues Tracker" (Upward
Engine). It covers every row still marked **Not started**, plus the other open rows the
recheck called out.

Theme **1.8.1**, branch `fix/seo-tracker-nov5`. 1.7.0 has the town pages, the https links and the
content gaps. 1.8.0 adds the speed and accessibility work (section 7). 1.8.1 adds the one-click
fix for old links in posts (section 4), plus the call-back time and review count fixes
(section 6).
Everything below was tested on a local WordPress running this theme. Staging shows none of it
until 1.8.1 is deployed (steps in section 8).

**Updated Nov 8.** We rechecked this response against every tab of the tracker. Added: section 4,
and three rows the first version missed (the blank live pages, the booking form's call-back time,
and the general dentistry text). Section 5 now says plainly that the post-op content went
somewhere other than the tracker suggested. The questions we had for the practice are now
answered from the tracker and the live site (sections 2, 5 and 6). Only the Privacy Policy still
needs the practice (section 9).

---

## 1. Area Pages tab: the 8 town pages and the fix list for Oliver

**What was blocking it (our side):** since late October the theme drew all 8 `/contact-us/`
town pages from its own copy of the text. Anything pasted into those pages in WordPress was
ignored, so Oliver's restore would never have shown up.

**Fixed in 1.7.0.** Each town page now shows the text in its WordPress editor as soon as the
January text is replaced there. Until then it keeps the current text, so nothing changes on
staging today.

How to restore a town page (per page):

1. Open the page in WordPress (Pages → the town page under Contact Us).
2. Replace **all** of the page text with the restored text, laid out like this:
   - one **H1** (the page headline, for example "Dental Implants Near Harrisonburg, VA");
   - a short intro: the paragraphs before the first H2;
   - one **H2** per section, and at least two of them. The first H2 section comes right after
     the eligibility quiz. The last H2 section closes the page above the call buttons. Lists
     and H3 subheadings are kept.
3. Update the page. A box in the editor sidebar, **"Town page text"**, says which text the
   page is showing.

Things to know:

- The page switches once the January section headings are gone from the editor. If two or
  more of them are still there, the page keeps showing the January text, so remove them all.
- The page adds its own photo, quiz, "Meet Dr. Burns", DreamSmile™, map and call buttons.
  Leave images, buttons, the Google-reviews widget and any shortcodes out of the pasted text.
  They are dropped automatically if they slip in.
- Empty bold marks (the `** **` problem on the fix list) are removed automatically.
- **Old links can stay in the pasted text** (fix list row "Every link points to an old
  address"). Once the pages are restored, run the link fix in section 4. It points every old
  link at its new address. You can also use the Redirect Map's New address column while pasting.
- The headline and blurb from the Area Pages tab go in each page's **Slim SEO** box, as on every
  page. Editing only the Slim SEO box never changes the page text.
- Wording the practice asked for in its Aug 4 review of the new site: say "assessment", not
  "consultation". Never call Dr. Burns a "specialist", and don't say the practice "specializes".
  Write the brand as DreamSmile™ (one word). The office is in New Market, so towns are "near",
  not "in", as in your new headlines.

Every other row on the fix list is a wording fix in the restored text, so it is on Oliver's side
and no longer waiting on us.

## 2. Redirect Map #58–61 and Content Gaps "Dr. James Whitney": he is still there

Every source we checked says Dr. Whitney still practices inside the New Market office:

- His four pages on the live site say "Dr. Whitney's Oral Surgery is located within the dental
  office of Jeffrey S. Burns D.D.S. in New Market". They list extractions and wisdom teeth
  removal, hours of Mon–Wed 9 AM – 3 PM, and the office phone.
- The live Meet the Staff page (its text is from 2022 or later) lists Tara Weaver as "patient
  coordinator for Dr. Whitney's patients".
- The national provider registry (NPI, last updated Nov 2024) lists him, oral and maxillofacial
  surgery, at 9626 S Congress St with the office's phone number.

So we keep his four pages live and leave the four redirects out, which is how staging is today.
The content gap is a mention on the new site, for example on /wisdom-teeth-removal/ and
/tooth-extraction/, linking to his page. If the practice tells us he has left, we draft the
pages and add the redirects instead.

## 3. Launch Checklist rows 12 (Blocker) and 16: the 3 missing blog posts

All three posts are on the live site and missing from staging. Nothing newer has been published
since Oct 16 (rechecked Nov 8):

- /dental-implant-cost-factors/ (Oct 2)
- /how-long-pain-lasts-after-dental-implants/ (Oct 9)
- /what-to-do-after-dental-implant-surgery/ (Oct 16; this is the row 16 "Aftercare" post. The
  tracker says Oct 14, which is when it was last edited. It was published Oct 16.)

**Ready to import:** `docs/seo/missing-blog-posts-2026-11.xml`. It holds all three posts with
the same address, title, date and categories, the featured image, and the **Slim SEO headline
and blurb copied from the live site**. Inside the posts, links now go straight to the new
addresses (for example /contact-us/ → /contact/), so there is no redirect hop.

In staging's WordPress: **Tools → Import → WordPress** (install the importer if asked), choose
the file, assign the author to **upwardengine** (shown as "Dr. Jeffrey S. Burns, DDS"), tick
**Download and import file attachments**, then Submit. Afterwards, open each post and check
its featured image. The images come from the live site's media library, so if the download step
fails, set them by hand from the same files.

We test-imported the file on a local WordPress. All three posts came in with the right
address, date, author, categories, links, and Slim SEO headline and blurb. (The local test
can't download images, so that step is only checkable on staging.)

Two notes on the posts' own text, both written on the live site:

- They say "the offices of Dr. Jeffrey Burns in Harrisonburg and Winchester, VA", but there is
  one office, in New Market.
- They use "consultation".

We left the wording as published. Change it if you'd like it to follow the rules in section 1.

If any new post goes live on the current site before launch, it needs the same treatment.

## 4. Launch Checklist row 22: old links in blog posts (theme 1.8.1)

The tracker has this as an after-launch item. It is now one click, so it can be done on staging
before launch.

On staging today, 47 of the 61 posts have 96 links to old addresses (the tracker counts 97). 43
go to /contact-us/ and 17 to /restorative-dentistry/dental-implants/. Each one works through a
single redirect, so nothing is broken. The fix removes that extra step.

How to run it:

1. Log in to staging as an administrator.
2. Open **/wp-admin/?ds_fix_post_links=1**. A preview lists every link that will change: the
   post, the old link and the new one. Nothing changes yet.
3. Click **Apply**.

How it behaves:

- It reads Slim SEO's own redirect list (Slim SEO → Redirects). It matches each link the same
  way Slim SEO matches a visit, and follows chains to the last stop. Nothing is hard-coded, so
  later edits to the redirect list are picked up.
- Only the address inside each link changes. Link text and formatting stay the same, relative
  links stay relative, and a #section part is kept.
- Each changed post is saved normally, so its Revisions screen can put it back.
- It covers posts and pages: published, scheduled, draft, pending and private.
- It is safe to run again, because links already at their new address are left alone. Run it
  again after the town text is restored (section 1).
- Some links are left alone and listed for a look by hand: those whose redirect ends at a 410,
  goes round in a loop, or lands on an address with no published page.

We tested it on a local WordPress that had a copy of staging's posts and pages, the 87 redirects,
and 11 made-up edge cases (chains, a loop, a 410, prefix and pattern rules, #section and ?utm
links). It changed 109 links in 49 posts and nothing else in them. Every changed post got a
revision. Every new link loads its page directly, with no redirect.

## 5. Content Gaps tab

| Gap | Status |
|---|---|
| Care after surgery (post-op) | **Done, but not where the tracker suggested.** The tracker asked for a Patient Education article. We put the content on /implant-procedures/ instead, because redirect #18 already sends the old After Implant Placement page there. That way the old page's links and rankings land on the content that replaced it. The new section is "What to expect after your implant surgery", built from the old page's answers. It links to the aftercare and pain posts once they are imported. If you still want it under Patient Education, we can add a card there that links to it. |
| Inlays and onlays, dental bonding | **Done.** An inlays and onlays section on /dental-fillings/, and a bonding section on /cosmetic-dentistry/, both from the old pages' text. |
| Denture care, relines, repairs, immediate dentures | **Done.** /full-dentures/ now covers immediate dentures, relines and soft liners, rebases and repairs, a care checklist, and the yearly denture exam. |
| Team / staff page | **Can be built from the live site.** The live Meet the Staff page has all 8 team members with bios and photos (6 of the photos are from Feb 2024). A team section on /meet-dr-burns/ can reuse that text, which is what visitors see on the live site today. |
| Testimonials page | Optional. We'll build it only if the practice wants one. |
| Harrisonburg and Winchester targeting | **Theme part done** (since October, /dental-implants/ and /full-mouth-dental-implants/ name and link both towns). The rest is restoring those two town pages' text (section 1). |

## 6. Other open rows from the recheck

| Row | What we found / did | Owner |
|---|---|---|
| **Blocker: http:// main address on 58 pages** | It isn't the site address setting. On staging **every page** comes out http:// (all 57 published, including untouched 2012 pages like /disclaimer/). Posts, categories and the sitemap index are https://. Something outside the theme rewrites page links; staging still runs the old vendor's two PBHS plugins (pbhs-common-plugin, pbhsthemehelper). The live site is fine. **1.7.0 forces page links back to https** whenever the site is served over https, so this clears on deploy. Still worth checking Settings → General (both addresses https). After launch, consider turning off the PBHS plugins; the new theme doesn't use them. | Developer (done) + check at launch |
| Author pages not hidden from Google | Slim SEO's robots rules are switched off while "Discourage search engines" is ticked on staging, so nothing can be confirmed there until launch. Simplest fix: turn on Slim SEO's built-in noindex option for author archives, in its Meta Tags settings (Dale's branch also adds a theme filter that does the same). The usernames in the addresses need each user's "nicename" changed, which takes admin access or a plugin. | SEO team / launch day |
| Homepage blurb (Metadata row 22) | Paste the suggested blurb into the homepage's Slim SEO box. | SEO team |
| Business details for Google (Launch row 18) | The Google Business Profile link, address, hours and map location are Slim SEO Schema settings. | SEO team |
| **Blank pages still public on the live site** (one of the three launch blockers in the recheck summary; 48 in the Oct 14 audit) | Not a theme item. They are on www.jeffreyburns.com, so someone with admin access to the live site needs to set them to draft. Please agree who that is. We haven't changed anything on the live site. | Team |
| Office hours (Launch row 13): confirm against the Google Business Profile, and the booking form's 12 to 5 pm call-back | **Hours match.** The live contact page, the new site and the practice's claimed Birdeye profile all say Mon–Thu, 8 AM – 3 PM, closed Fri–Sun. **Fixed in 1.8.1:** the call-back option now reads 12 pm – 3 pm. | Developer (done) |
| "5.0 from 200+ Google reviews" on /dental-implants/ (not in the tracker; found on Nov 8) | The live site's Google reviews widget says 5.0, based on 188 reviews, so "200+" wasn't true. **Fixed in 1.8.1:** it now reads "180+", which stays true as reviews come in. | Developer (done) |
| Old links in blog posts (Launch row 22) | **Ready now**, see section 4. | SEO team (one click) |
| Privacy Policy page | The practice or its legal team needs to supply the text. The footer already links /disclaimer/. | Client |
| Speed (59) and accessibility (88) | **Done in 1.8.0**, see section 7. | Developer (done) + plugins at launch |
| General dentistry pages share text (Launch row 28) | After launch, as the tracker says. These 7 pages get their text from the theme, so new wording goes through us. Send the copy, or ask us to draft it. | After launch |
| robots.txt Crawl-delay, full Slim SEO redirect list recheck | Launch day. | Launch day |

## 7. Launch Checklist "Speed" and "Accessibility" rows (theme 1.8.0)

Measured with Google's Lighthouse (phone settings) on a local copy of the site, before and after.
Staging's homepage gave the same accessibility warnings as the local copy, so the fixes carry over.

| Homepage | Before | After 1.8.0 |
|---|---|---|
| Accessibility score | 88 | **100** (Dental Implants page: 100 too) |
| Page weight | 3.2 MB | **1.6 MB** |
| Speed index | 9.1 s | 5.2 s |
| Layout shift | 0 | 0 |

The local copy has no file compression and a slow server, so its speed score (63, was 58) runs
lower than staging's will. Retest on staging after the deploy.

**Accessibility.** Lighthouse only checks what is on screen when it runs, and this site fades
sections in as you scroll. So we also checked every section on 26 pages at phone and desktop
widths (six of them at four widths), plus the open menus, the phone menu, the booking form and
the FAQ answers. All of them pass now.

- Colour contrast. The brand teal (#7FB5B0) is too light for small text on white, so small teal
  text now uses a deeper teal (#3D7872). Teal buttons keep their teal and get dark text instead
  of white; on hover they lighten. The "Platinum" warranty card is a shade deeper. Headline
  colours and photos are unchanged.
- Screen reader labels: star ratings, carousel dots, the FAQ topic filter, the diagrams and the
  scrolling photo strip are now announced properly; the header menus use the standard pattern.
- Headings no longer skip levels, and each page has one header and one footer region.
- Links without clear text: the three "Learn more" buttons now tell screen readers and Google
  where they go ("Learn more about cosmetic dentistry"). They look the same.

**Speed (theme side, all done).**

- JPG/PNG images: the theme's photos now load as WebP, sized to how big they show on screen.
  That's the "about 320 KB" from the tracker on the homepage, and about 4 MB across the site.
  (Two town photos, the logos and the payment QR code stay as they are: WebP saved nothing.)
- The homepage photo (the slow "main content") is now requested first, before the stylesheets
  finish. The same applies to every service page's top photo.
- Videos wait for the play button and show a still frame until then. Before, the homepage
  downloaded about 600 KB of video on load. The before/after carousel on /dental-implants/
  started its first video as soon as the page opened (16 MB on staging); it now starts only
  when scrolled to.
- Smaller fixes: images below the fold load as you scroll, image sizes are reserved so nothing
  jumps, the Google Fonts connection opens earlier, and WordPress's emoji script is removed.

**Still slowing staging down, outside the theme (for launch day):**

| What | Cost on staging's homepage | Fix |
|---|---|---|
| Old PBHS plugins (pbhs-common-plugin, pbhsthemehelper) | Load jQuery, a script and a stylesheet before the page can show | Deactivate. The new theme uses neither. |
| Widget Google Reviews plugin | Its stylesheet loads on every page | Deactivate if the reviews widget isn't placed anywhere (the town pages no longer use it). |
| Dashicons + admin-bar CSS for logged-out visitors | About 40 KB that blocks the page | Pressable's cache plugin toolbar loads them; check its settings or ask Pressable. |
| Google Tag Manager | About 0.4 s of main-thread time, 180 KB | Review the tags in the container (whoever manages GTM). |
| Server response | 1.9 s for the first byte | Usually better on the live host with page caching on; retest at launch. |

**Videos (optional on staging).** Staging's Media Library copies of the eight long videos are
already compressed: 96 MB together. The online preview, and any site without those uploads,
used the 4K originals from GitHub instead (1.2 GB together). Those are now replaced with 720p
copies, 49 MB together, with the same picture, captions and sound. That is still sharper than
the video boxes on the site need.

Uploading the same copies to staging halves its video weight again. The before/after videos,
which play as soon as they're scrolled to, go from about 16 MB to 8 MB each.

| Video | Where it plays | Staging now | New copy |
|---|---|---|---|
| Curtis-Cloude-Testimonial.mp4 | Dental Implants, before/after | 15.8 MB | 8.3 MB |
| Angela-Burker-Testimonial.mp4 | Dental Implants, before/after | 16.0 MB | 8.0 MB |
| Peter-Encheff-Testimonial.mp4 | Dental Implants, before/after | 15.3 MB | 7.7 MB |
| Educational-One-Day-Teeth.mp4 | Dental Implants | 12.4 MB | 6.5 MB |
| FAQ-Permanent-Teeth-One-Day.mp4 | Implant FAQs | 16.0 MB | 8.3 MB |
| FAQ-Implant-Success-Rate.mp4 | Implant FAQs | 9.2 MB | 4.6 MB |
| FAQ-Implant-Lifespan.mp4 | Implant FAQs | 7.1 MB | 3.7 MB |
| Hall-of-Fame-Patients.mp4 | Town and location pages | 4.0 MB | 1.9 MB |

To use them, **after 1.8.1 is deployed**:

1. Download the files from the GitHub release:
   https://github.com/franzsamilo/jeffrey-burns-oz.test/releases/tag/v2
2. Upload them in Media → Add New Media File, keeping the file names exactly as they are.

The site uses the newest upload with a given name, so the old copies can stay or be deleted
later. Themes before 1.8.0 kept using the first upload, which is why this step waits for the
deploy.

## 8. Deploying 1.8.1 to staging

1. Once `fix/seo-tracker-nov5` is merged into `main`, merge `main` into
   `setup/staging-and-deployment`. That branch also carries Dale's Oct 24 migration-script work.
2. `python build_zip.py`, then upload the zip in Appearance → Themes ("Replace active with
   uploaded"), then purge the Pressable cache.
3. Check the page source shows `dreamsmile-child/style.css?ver=1.8.1`, and that a page's
   canonical now starts with https://.
4. If the header or footer still shows the old markup (for example the booking form still says
   12 pm – 5 pm), the templates were edited in the Site Editor at some point. Reset them there
   (Appearance → Editor → Templates → Reset) so the theme files apply.
5. Import the three posts (section 3).
6. Run the link fix (section 4).
7. Optional: upload the smaller videos (end of section 7).

## 9. What still needs the practice

Only the Privacy Policy (Launch row 24). Neither site has one; the live site has only
/disclaimer/. A policy does exist for the practice, though: The Implant Engine's, at
https://jeffrey-burns.implant-services.com/jeffrey-burns-privacy-policy (last updated Dec 1,
2025). It names Jeffrey S. Burns DDS but covers only that funnel site. We can adapt it for
/privacy-policy/. That means naming www.jeffreyburns.com, adding the site's own booking and forms
requests and Google Tag Manager, and using the office phone. Whoever owns that text (the
practice or The Implant Engine) then only has to approve the adapted copy.

Everything else we could answer from the tracker and the live site: Dr. Whitney (section 2),
the team (section 5) and the office hours (section 6).
