# SEO Issues Tracker: Staging Status Update & Row 10 / Dr. Whitney Audit (2026-11-17)

> **Scope:** Captures all work shipped to staging since the [Nov 7–8, 2026 SEO recheck response](2026-11-07-seo-recheck-response.md) (`1.8.2` → `1.9.0` → `1.9.1`), and answers the open question on **Launch Checklist Row 10** (`73 of 78 redirects`) and **Redirect Map `#19` & `#58–#61` (Dr. James Whitney pages)** on `https://jeffreyburnsstagingclone2.uepreview.com/`.

---

## 1. What Has Shipped Since the Nov 7–8 Response (Live on Staging)

Staging is currently running **`dreamsmile-child` v1.9.1** (`feat/meet-the-team-about-menu` / [PR #10](https://github.com/franzsamilo/jeffrey-burns-oz.test/pull/10), deployed Nov 14, 2026). Both **v1.9.0** (`b232cf9`) and **v1.9.1** (`e78e6bc`) have been uploaded and verified live against `https://jeffreyburnsstagingclone2.uepreview.com/`:

### A. Theme `1.9.0` (`c3fb3eb` / PR #9, merged Nov 11) + Automated Migration (`b232cf9`, deployed Nov 12)
1. **Rev 2 Multi-Service Copy on All 8 Town Pages (`inc/town-pages.php`):**
   - Replaced the January implants-only copy on all eight `/contact-us/` town pages (`Harrisonburg`, `Winchester`, `Elkton`, `Bridgewater`, `Woodstock`, `Luray`, `Broadway`, `Timberville`) with the SEO team's Rev 2 topic-specific copy.
   - Added comparison tables (`Winchester`, `Elkton`, `Bridgewater`, `Woodstock`, `Luray`, `Broadway`, `Timberville`), numbered steps (`Harrisonburg` and `Bridgewater`), and FAQ accordions backed by `FAQPage` JSON-LD schema on all 8 pages.
   - Incorporated standing client wording rules ("assessment" instead of "consultation", `DreamSmile™` formatting, and dynamic `ds_whitney_url()` linking on Winchester) plus the Area Pages tracker copy fixes.
   - Editor status indicator: the **`Town page text`** (`ds-town-text`) meta box in `functions.php` inspects `ds_town_editor_copy()` and shows whether each town page is rendering theme copy or pasted WordPress editor copy.
2. **One-Time Auto-Migration (`ds_v190_auto_migrate_done` in `inc/seo-migration.php`, `init` priority 25):**
   - **3 Missing October 2026 Blog Posts (`ds_import_missing_blog_posts()`):** Imported `/dental-implant-cost-factors/` (Oct 2), `/how-long-pain-lasts-after-dental-implants/` (Oct 9), and `/what-to-do-after-dental-implant-surgery/` (Oct 16) from `inc/missing-blog-posts-2026-11.xml`, sideloaded featured images, and populated Slim SEO titles and meta descriptions. All 3 return `HTTP 200` on staging.
   - **Privacy Policy Page (`ds_ensure_privacy_policy_page()`, Launch Checklist Row 24):** Published `/privacy-policy/` adapted from the practice's active Implant Engine funnel policy (`jeffrey-burns.implant-services.com/jeffrey-burns-privacy-policy`), assigned `wp_page_for_privacy_policy`, and seeded its Slim SEO title (`Privacy Policy | Dr. Jeffrey Burns`) and description. Verified `HTTP 200` on staging.
   - **Old Internal Links in Posts (`ds_post_links_rules()` / `ds_post_links_scan()`, Launch Checklist Row 22):** Automatically rewrote legacy internal links across posts and pages directly to their final Slim SEO redirect targets (`0` links remaining to `/contact-us/`).
   - **Slim SEO Titles & Blurbs Seeded:** Wrote the approved 147-char homepage blurb (Metadata Issues Row 22) and all 8 town pages' approved Google headlines and blurbs (Area Pages Rows 7–14) into `slim_seo` post meta.
   - **Author Archive `noindex` & Nicename Cleanup (Launch Checklist Row 25 / Metadata Row 23):** Enabled `slim_seo['author']['noindex'] = 1`, added a `slim_seo_robots_index` filter returning `false` on `is_author()`, and updated `upwardengine` → `dr-jeffrey-burns` (`Dr. Jeffrey S. Burns, DDS`) and `meganjburnsdds-com` → `megan` (`Megan`). Verified `noindex` live on `/author/dr-jeffrey-burns/`.
3. **Rich `Dentist` Schema (`functions.php`, `slim_seo_schema_graph` priority 999):**
   - Enriches Slim SEO's `#organization` node into `@type: "Dentist"` (`Dr. Jeffrey Burns`, `+1-540-740-8937`, `9626 South Congress St, New Market, VA 22844`, `GeoCoordinates` `38.6473, -78.6711`, `hasMap`, `OpeningHoursSpecification` `Mon–Thu 08:00–15:00`, `sameAs` for Facebook, Instagram, and Google Maps) and upgrades `http://` schema URLs to `https://`. Verified live on staging.
4. **Redirect Guardrails & Legacy Footer Script Cleanup (`functions.php`, `ds_v162_cleanup_done` & `template_redirect` priority 1):**
   - Removes case-insensitive self-redirect loops in `ss_redirects`, enforces 301s at `template_redirect` priority 1 for `/Blog` → `/blog/`, `/Contact` → `/contact/`, `/about` & `/About` → `/meet-dr-burns/`, and the legacy `/cosmetic-dentistry/...` Fix Old Redirects rules, drafts WPCode snippets containing `placeSmileReveal`, and strips legacy `smile-reveal-funnel.js` / `placeSmileReveal()` footer output.

### B. Theme `1.9.1` (`f0411f8` + `e78e6bc` / PR #10, open on GitHub & live on staging since Nov 14)
1. **Dedicated `/meet-the-team/` Page (`inc/team.php`, `patterns/meet-the-team.php`, `templates/page-meet-the-team.html`):**
   - Displays all 9 staff members from the Nov 2026 live `/about-us/meet-the-staff/` page with cropped 3:4 WebP headshots shipped in `assets/arrange/team/*.webp`, plus a "Dr. James Whitney, oral surgeon" card when `ds_whitney_url()` is published.
   - `meet-the-team` setup (`ds_team_page_191_done`, `init` priority 30) creates the page, fills its Slim SEO headline (`Meet Our Dental Team in New Market, VA | Dr. Jeffrey Burns`, 58 chars) and blurb (146 chars), and updates Redirect Map `#55` (`/about-us/meet-the-staff/`) and Reclaim 404 Backlinks (`/about-our-practice/our-team/`) in `ss_redirects` from `/meet-dr-burns/` to `/meet-the-team/`. Both 301s and `/meet-the-team/` are verified live on staging.
2. **About Us Menu & `/meet-dr-burns/` Teaser (`parts/header.html`, `patterns/meet-dr-burns-extended.php`):**
   - Replaced "Meet the Doctors" in desktop and mobile navigation with an **About Us** dropdown/accordion linking **Dr. Jeffrey Burns** (`/meet-dr-burns/`) and **Meet the Team** (`/meet-the-team/`).
   - Replaced the full team list on `/meet-dr-burns/` with a compact teaser linking to `/meet-the-team/`.
3. **Comparison CTA Readability Fix (`assets/css/sections.css`, `e78e6bc`):**
   - Fixed dark-text contrast on the charcoal "See if you're eligible for a DreamSmile™" comparison CTA button.

### C. Theme `1.9.2` (Deployed to Staging Nov 17 — Superseded by `1.9.3`)
Temporarily consolidated `#58–#61` onto `/about-us/whitney-oral-surgery/dr-james-whitney/` (`#59`) and cleaned up the accidental `/meet-the-team-2/` duplicate (`ds_whitney_192_done`). Superseded by **Theme `1.9.3`** below per client direction to remove all Dr. Whitney pages and mentions.

### D. Theme `1.9.3` (Implemented Nov 18, 2026 — Pending Upload to Staging)
Per client instruction (*"we should remove any pages or content about Dr. Whitney"*), retires all 4 Dr. Whitney pages (`#58–#61`) and removes every Dr. Whitney reference across the theme:
1. **Removed All Dr. Whitney Pages, Templates & Theme Copy:**
   - Deleted standalone `#59` files (`templates/page-dr-james-whitney.html`, `patterns/dr-james-whitney.php`, `assets/arrange/dr-james-whitney.webp`) and the `dr-james-whitney` hero variant in `patterns/page-sub-hero.php`.
   - Removed **Dr. James Whitney** from desktop & mobile **About Us** menus (`parts/header.html`), removed the `ds-team-whitney` card from `/meet-the-team/` (`patterns/meet-the-team.php`), removed Dr. Whitney links/copy from `/tooth-extraction/`, `/wisdom-teeth-removal/`, `/contact-us/winchester-dentist-dental-implants/`, and Tara Weaver's bio (`inc/team.php`), and set `ds_whitney_url()` to return `''`.
2. **One-Time Migration (`ds_whitney_193_done` in `inc/whitney.php`, `init` priority 32):**
   - Sets all 4 Whitney pages (`#58` `/about-us/whitney-oral-surgery/`, `#59` `/dr-james-whitney/`, `#60` `/information/`, `#61` `/oral-surgery-hours/`) to **`draft`** so all 4 are removed from `sitemap-post-type-page.xml`.
   - Activates Slim SEO 301 redirects (plus `template_redirect` priority 1 guardrails) matching `Redirect Map` (`gid=169489043`) Column C exactly: `#58–#60` → `/wisdom-teeth-removal/`, `#61` → `/contact/`.
   - Brings Redirect Map completion to **77 of 78** (with `#19` intentionally kept live). Updated `docs/seo/slim-seo-redirects-import.csv` and `docs/seo/slim-seo-redirects-on-hold.csv` to match.
   - Keeps `/meet-the-team-2/` duplicate trash cleanup if present.

---

## 2. Deep-Dive: Launch Checklist Row 10 (`73 of 78` Redirects) & Dr. Whitney Pages (`#58–#61`)

Launch Checklist Row 10 states:
> **Started:** *73 of 78 redirects are in place and each goes to its new page in one step. Old pages are out of the sitemap. Not redirected: #19 (kept live on purpose) and #58 to #61 (Dr. Whitney pages, still live).*  
> *Waiting on the client to say if Dr. Whitney is still with the practice.*

All 5 exceptions on the Redirect Map tab are tracked in `docs/seo/slim-seo-redirects-on-hold.csv`:

### A. Redirect Map `#19`: `/restorative-dentistry/full-mouth-reconstruction/` — **Resolved / Intentional Keep**
- **Tracker Status:** **`Won't do`** (*"Kept live on the new site on purpose (decision made). Take it off this list."*).
- **Live & Staging Status:** Returns `HTTP 200` with 3,594 chars of Sept 2026 copy, ranks for 5 tracked full-mouth queries, sits in `sitemap-post-type-page.xml`, and is linked internally from the Harrisonburg town page (`inc/town-pages.php:91`). No redirect should be added here.

### B. Redirect Map `#58–#61`: The 4 Dr. James Whitney Pages — **Audit of Current Staging State**
Live inspection of both `www.jeffreyburns.com` and `jeffreyburnsstagingclone2.uepreview.com` on **Nov 17, 2026** confirms all 4 pages remain published, return `HTTP 200`, use the bare fallback `templates/page.html`, have no custom Slim SEO meta descriptions, and appear in `sitemap-post-type-page.xml`:

| Row | URL | Current Live/Staging Content | Current Links & Problems |
| :--- | :--- | :--- | :--- |
| **#58** | `/about-us/whitney-oral-surgery/` | **1 placeholder line only:** *"This page is currently under development. Please check back later for information about Whitney Oral Surgery."* | **Orphan page.** Legacy PBHS submenu parent; nothing in the DreamSmile theme links here, yet it remains indexed in `sitemap-post-type-page.xml`. |
| **#59** | `/about-us/whitney-oral-surgery/dr-james-whitney/` | Dr. Whitney's headshot + 1-paragraph bio (*"Dr. Whitney's Oral Surgery is located within the dental office of Jeffrey S. Burns D.D.S. in New Market, Virginia."*). | **Only Whitney URL linked by the theme** (`ds_whitney_url()` in `functions.php:405`, linked from `/meet-the-team/`, `/wisdom-teeth-removal/`, and `/contact-us/winchester-dentist-dental-implants/`). Ranks for `'whitney dental'`, but **omits** his hours and referral email, and renders the `"MEET THE EXPERT Dr. Jeffrey S. Burns"` block right below Dr. Whitney's bio. |
| **#60** | `/about-us/whitney-oral-surgery/information/` | 3 short lines: dental extractions & wisdom tooth removal links, `Email: info@whitneyoralsurgery.com`, `Call: 540-740-8937`, and `Referring Dental Offices Email images and Referral to: info@whitneyoralsurgery.com`. | **Unlinked thin orphan page.** Nothing in the DreamSmile theme links here, so referring dentists/patients arriving via `/meet-the-team/` or `/wisdom-teeth-removal/` never see the referral email. |
| **#61** | `/about-us/whitney-oral-surgery/oral-surgery-hours/` | **1 sentence only:** *"Oral Surgery office hours are Monday-Wednesday 9:00 AM – 3:00 PM"* | **Unlinked thin orphan page.** Patients clicking through to Dr. Whitney's page cannot see his Mon–Wed 9 AM – 3 PM hours unless they stumble on this URL directly. |

---

## 3. Resolution Status for `#58–#61`

Implemented via **full removal & Option 2 in Theme `1.9.3`** per client instruction (*"we should remove any pages or content about Dr. Whitney"*):
1. All 4 Whitney pages (`#58–#61`) are set to **`draft`** (removed from `sitemap.xml`) and 301-redirected directly to their `Redirect Map` (`gid=169489043`) Column C targets (`#58–#60` → `/wisdom-teeth-removal/`, `#61` → `/contact/`).
2. All theme links, nav items, hero/page templates, `Meet the Team` card, service-page cards, Winchester copy, and Tara Weaver's bio reference have been removed.
3. Redirect Map progress moves from **73 of 78** to **77 of 78** (with `#19` `/restorative-dentistry/full-mouth-reconstruction/` intentionally kept live).

---

## 4. Open Launch-Day Items & Notes (Updated Nov 18, 2026)

1. **Duplicate `/meet-the-team-2/` in Staging Sitemap:**
   - Inspection of `https://jeffreyburnsstagingclone2.uepreview.com/sitemap-post-type-page.xml` on Nov 17 found both `/meet-the-team/` and an accidental **`/meet-the-team-2/`** (`HTTP 200`). It was cleaned up by `inc/whitney.php` in `1.9.2` (verified `HTTP 404` and out of sitemap on Nov 17), and `1.9.3` keeps that guard while `inc/team.php` marks `ds_team_page_191_done` before `wp_insert_post()`.
2. **Git Branch Sync Note:**
   - [PR #10](https://github.com/franzsamilo/jeffrey-burns-oz.test/pull/10) (`feat/meet-the-team-about-menu`) targets `main` (`b232cf9`). After deploying and verifying **`1.9.3`** on staging, merge into `main` and sync `setup/staging-and-deployment`.
3. **Production Launch-Day Cutover Tasks (Do NOT run on staging):**
   - Uncheck **Settings → Reading → Discourage search engines from indexing this site** on production at cutover.
   - Remove `Crawl-delay: 3` from live `robots.txt` (`https://www.jeffreyburns.com/robots.txt`) and submit `/sitemap.xml` in Google Search Console.
   - Set the **48 blank legacy pages on `www.jeffreyburns.com`** to **Draft** at launch (already cleaned/out of sitemap on staging).
   - Deactivate legacy vendor plugins (**`pbhs-common-plugin`**, **`pbhsthemehelper`**) and unused **Widget Google Reviews** plugin if unneeded after launch.
   - Optional: Upload the 720p videos from release `v2` to Staging/Live Media Library to cut video payload size in half, and replace the 5 older 300px team headshots (`Megan`, `Ginger`, `Sara`, `Teri`, `Katie`) when newer files arrive from the practice.
