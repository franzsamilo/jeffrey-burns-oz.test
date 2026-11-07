# SEO Issues Tracker: developer response to the Nov 5 recheck (2026-11-07)

Response to the **Nov 5, 2026 recheck** of "Dr. Jeffrey Burns - SEO Issues Tracker" (Upward
Engine). It covers every row still marked **Not started**, plus the other open rows the
recheck called out.

Theme **1.7.0**, branch `fix/seo-tracker-nov5`. Everything below was tested on a local
WordPress running this theme. Staging shows none of it until 1.7.0 is deployed (steps at the end).

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
   - one **H2** per section. The first H2 section comes right after the eligibility quiz. The
     last H2 section closes the page above the call buttons. Lists and H3 subheadings are
     kept.
3. Update the page. A box in the editor sidebar, **"Town page text"**, says which text the
   page is showing.

Things to know:

- The page switches once the January section headings are gone from the editor. If two or
  more of them are still there, the page keeps showing the January text, so remove them all.
- The page adds its own photo, quiz, "Meet Dr. Burns", DreamSmile™, map and call buttons.
  Leave images, buttons, the Google-reviews widget and any shortcodes out of the pasted text.
  They are dropped automatically if they slip in.
- Empty bold marks (the `** **` problem on the fix list) are removed automatically.
- **Links still need the new addresses** (fix list row "Every link points to an old address").
  Use the Redirect Map's New address column.
- The headline and blurb from the Area Pages tab go in each page's **Slim SEO** box, as on every
  page. Editing only the Slim SEO box never changes the page text.
- Practice wording rules for the pasted text: say "assessment", not "consultation". Never call
  Dr. Burns a "specialist", and don't say the practice "specializes". The office is in New Market,
  so towns are "near", not "in". Write the brand as DreamSmile™ (one word).

Every other row on the fix list is a wording fix in the restored text, so it is on Oliver's side
and no longer waiting on us.

## 2. Redirect Map #58–61 and Content Gaps "Dr. James Whitney": needs the client

We left these four pages alone. **Question for the practice: is Dr. James Whitney still
practicing at the New Market office?** One more detail for that conversation: the old Meet the
Staff page (photos updated Feb 2024) still lists Tara Weaver as "patient coordinator for Dr.
Whitney's patients".

- If yes: keep the pages, and we add a short Dr. Whitney section (and link) on the new site.
- If no: draft the pages and add the four redirects from the Redirect Map.

## 3. Launch Checklist rows 12 (Blocker) and 16: the 3 missing blog posts

All three posts are on the live site and missing from staging. Nothing newer has been published
since Oct 16:

- /dental-implant-cost-factors/ (Oct 2)
- /how-long-pain-lasts-after-dental-implants/ (Oct 9)
- /what-to-do-after-dental-implant-surgery/ (Oct 16; this is the row 16 "Aftercare" post)

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

## 4. Content Gaps tab

| Gap | Status in 1.7.0 |
|---|---|
| Care after surgery (post-op) | **Done.** /implant-procedures/ (where redirect #18 already sends the old After Implant Placement page) now has "What to expect after your implant surgery", built from the old page's answers. It links to the aftercare and pain posts once they are imported. |
| Inlays and onlays, dental bonding | **Done.** An inlays and onlays section on /dental-fillings/, and a bonding section on /cosmetic-dentistry/, both from the old pages' text. |
| Denture care, relines, repairs, immediate dentures | **Done.** /full-dentures/ now covers immediate dentures, relines and soft liners, rebases and repairs, a care checklist, and the yearly denture exam. |
| Team / staff page | **Needs the client.** The old Meet the Staff page lists 8 people (photos from Feb 2024). We'll build the section on /meet-dr-burns/ once the practice confirms who is on the team today. |
| Testimonials page | Optional. We'll build it only if the practice wants one. |

## 5. Other open rows from the recheck

| Row | What we found / did | Owner |
|---|---|---|
| **Blocker: http:// main address on 58 pages** | It isn't the site address setting. On staging **every page** comes out http:// (all 57 published, including untouched 2012 pages like /disclaimer/). Posts, categories and the sitemap index are https://. Something outside the theme rewrites page links; staging still runs the old vendor's two PBHS plugins (pbhs-common-plugin, pbhsthemehelper). The live site is fine. **1.7.0 forces page links back to https** whenever the site is served over https, so this clears on deploy. Still worth checking Settings → General (both addresses https). After launch, consider turning off the PBHS plugins; the new theme doesn't use them. | Developer (done) + check at launch |
| Author pages not hidden from Google | Slim SEO's robots rules are switched off while "Discourage search engines" is ticked on staging, so nothing can be confirmed there until launch. Simplest fix: turn on Slim SEO's built-in noindex option for author archives, in its Meta Tags settings (Dale's branch also adds a theme filter that does the same). The usernames in the addresses need each user's "nicename" changed, which takes admin access or a plugin. | SEO team / launch day |
| Homepage blurb (Metadata row 22) | Paste the suggested blurb into the homepage's Slim SEO box. | SEO team |
| Business details for Google (Launch row 18) | The Google Business Profile link, address, hours and map location are Slim SEO Schema settings. | SEO team |
| Privacy Policy page | The practice or its legal team needs to supply the text. The footer already links /disclaimer/. | Client |
| Speed (59) and accessibility (88) | After-launch developer items. 1.7.0 already fixes the low-contrast teal links in service-page text. | Developer, after launch |
| robots.txt Crawl-delay, full Slim SEO redirect list recheck | Launch day. | Launch day |

## 6. Deploying 1.7.0 to staging

1. Once `fix/seo-tracker-nov5` is merged into `main`, merge `main` into
   `setup/staging-and-deployment`. That branch also carries Dale's Oct 24 migration-script work.
2. `python build_zip.py`, then upload the zip in Appearance → Themes ("Replace active with
   uploaded"), then purge the Pressable cache.
3. Check the page source shows `dreamsmile-child/style.css?ver=1.7.0`, and that a page's
   canonical now starts with https://.
4. Import the three posts (section 3).

## 7. Questions for the practice

1. Is Dr. James Whitney still practicing at the office? (section 2)
2. Who is on the team today, and would they like a team section on Meet Dr. Burns? (section 4)
3. Text for a Privacy Policy page.
