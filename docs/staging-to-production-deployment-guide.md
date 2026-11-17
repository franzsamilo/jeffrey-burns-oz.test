# Staging-to-Production Deployment Runbook (`uepreview.com` → `www.jeffreyburns.com`)

> **Target Production Site:** `https://www.jeffreyburns.com/` (Dr. Jeffrey S. Burns, DDS, PC — New Market, VA)  
> **Staging Environment:** `https://jeffreyburnsstagingclone2.uepreview.com/`  
> **Hosting Platform:** Pressable (Automattic WP Cloud, `BUR` datacenter)  
> **Theme Target:** `dreamsmile-child` **v1.9.2** (`Template: twentytwentyfive`)  
> **Last Verified Against Repo:** November 17, 2026  
> **Risk Classification:** **CRITICAL / ZERO-DOWNTIME** (Production handles live patient consultation requests, phone routing, and established organic search rankings.)

---

## 1. Current State Snapshot (November 17, 2026)

Before touching either environment, confirm the repository, branch, and environment states below:

### A. Git Branches & Theme Versions
| Ref / Branch | Commit | `dreamsmile-child` Version | What It Contains |
| :--- | :--- | :--- | :--- |
| `feat/meet-the-team-about-menu` ([PR #10](https://github.com/franzsamilo/jeffrey-burns-oz.test/pull/10)) | `c429c4e` | **1.9.2** | Adds `/meet-the-team/` (`1.9.1`), **About Us** navigation dropdown (`parts/header.html`), homepage comparison CTA contrast fix (`e78e6bc`), Dr. James Whitney consolidation onto `#59` (`/about-us/whitney-oral-surgery/dr-james-whitney/`) with `#58`/`#60`/`#61` drafted & redirected (`inc/whitney.php`), and automatic cleanup of `/meet-the-team-2/`. |
| `main` | `b232cf9` | **1.9.0** | Includes Rev 2 copy on all 8 `/contact-us/` town pages (`inc/town-pages.php`), `ds_v190_auto_migrate_done` (3 Oct 2026 blog posts, `/privacy-policy/`, internal post link rewrites, Slim SEO homepage/town seeding, author `noindex` & nicename cleanup), rich `Dentist` schema (`functions.php`), and `ds_v162_cleanup_done`. **Does not yet include `1.9.1` or `1.9.2` until PR #10 is merged.** |
| `setup/staging-and-deployment` | `f82d2de` | **1.6.1** | Branched off `dd4d2c2` (PR #7). Holds two older **Oct 24, 2026** commits (`d039daa` and `f82d2de`) that are **not** in `main` or PR #10 (see warning below). |

> [!WARNING]
> **About `setup/staging-and-deployment` (`d039daa` / `f82d2de`):**  
> Those Oct 24 commits added `blogname` (`Dr. Jeffrey Burns`), batch legacy page drafting (`harrisonburg`, `winchester`, `woodstock`, `front-royal`, `strasburg`, `luray`, `mount-jackson`, `broadway`, `contact-us`, `admin`, `sitemap`), `slim_seo_robots_index`, `novamira` plugin activation, and 87 embedded redirects inside `ds_seed_slim_seo`. Their SEO migration goals were subsequently superseded on `main` (`1.9.0`) and PR #10 (`1.9.1`–`1.9.2`) by `ds_v162_cleanup_done`, `ds_v190_auto_migrate_done`, `inc/team.php`, `inc/whitney.php`, `inc/post-links.php`, and `docs/seo/slim-seo-redirects-import.csv`. **Do not deploy directly from `setup/staging-and-deployment` without syncing it to `main` after PR #10 merges**, and do not re-introduce the `1.6.1` `inc/seo-migration.php` or `novamira` activation coupling.

### B. Environment Status
* **Staging (`https://jeffreyburnsstagingclone2.uepreview.com/`):**
  * Deployed with `feat/meet-the-team-about-menu` (PR #10) on **Nov 14, 2026** (`1.9.1` verified live in `docs/seo/2026-11-17-staging-status-and-whitney-audit.md`; **`1.9.2` (`c429c4e`)** implemented Nov 17, 2026).
  * **Check staging page source** for `dreamsmile-child/style.css?ver=1.9.2`. If staging still reports `?ver=1.9.1`, upload the `v1.9.2` zip to staging and purge Pressable cache before proceeding with Path A.
  * `Discourage search engines` is currently checked on staging.
* **Production (`https://www.jeffreyburns.com/`):**
  * Hosted on **Pressable (WP Cloud)** under the **PBHS / Automattic for Agencies** tenant (`docs/pressable-hosting-audit-and-staging-report.md`).
  * Runs the legacy classic PHP theme (`JeffreyBurns` / `Jeffrey S Burns DDS theme`), legacy PBHS plugins (`pbhs-common-plugin`, `pbhsthemehelper`), `Widget Google Reviews`, Gravity Forms (Form 1), FluentSMTP (SendGrid), Slim SEO, and Slim SEO Schema.
  * Holds **48 blank published pages** (flagged since Oct 8–14 audits) and `Crawl-delay: 3` in `robots.txt`.

### C. Key Repository Artifacts
* Theme source: `wp-content/themes/dreamsmile-child/` (`style.css`, `functions.php`, `inc/seo-migration.php`, `inc/team.php`, `inc/whitney.php`, `inc/post-links.php`, `inc/town-pages.php`, `inc/service-pages.php`, `inc/missing-blog-posts-2026-11.xml`)
* Zip packager: `build_zip.py` (outputs `dreamsmile-child.zip`, excluding `*.mp4` files and enforcing forward-slash paths)
* Redirect CSVs:
  * `docs/seo/slim-seo-redirects-import.csv` — **90 active 301 rules** (the 87 rules from `docs/seo/2026-10-20-seo-tracker-response.md` plus the 3 Dr. Whitney sibling consolidations `#58`, `#60`, `#61` added in `1.9.2`)
  * `docs/seo/slim-seo-redirects-on-hold.csv` — **2 disabled (`Enable=0`) rules** (`#19` `/restorative-dentistry/full-mouth-reconstruction/` and `#59` `/about-us/whitney-oral-surgery/dr-james-whitney/`, both intentionally kept live)
* Supporting docs:
  * `docs/pressable-staging-workflow.md`
  * `docs/pressable-hosting-audit-and-staging-report.md`
  * `docs/seo/2026-10-20-seo-tracker-response.md`
  * `docs/seo/2026-11-07-seo-recheck-response.md`
  * `docs/seo/2026-11-17-staging-status-and-whitney-audit.md`

---

## 2. Pre-Cutover Preparation (Mandatory Before Either Path)

Complete all five preparation steps before running Path A or Path B:

1. **Verify `v1.9.2` & Purge Staging Pressable Edge Cache:**
   * Inspect `view-source:https://jeffreyburnsstagingclone2.uepreview.com/` and verify `dreamsmile-child/style.css?ver=1.9.2`.
   * If staging still serves `1.9.1`, build `dreamsmile-child.zip` from `feat/meet-the-team-about-menu` (`python build_zip.py`), upload on staging via **Appearance → Themes → Add New Theme → Upload Theme → Replace active with uploaded**, then click **Purge All Caches** in **Pressable CM** (or top bar **P Cache Management**).
   * Confirm on staging:
     * `/about-us/whitney-oral-surgery/dr-james-whitney/` returns `HTTP 200` with the consolidated DreamSmile profile layout, hours (`Mon–Wed 9:00 AM – 3:00 PM`), and `info@whitneyoralsurgery.com`.
     * `/about-us/whitney-oral-surgery/`, `/about-us/whitney-oral-surgery/information/`, and `/about-us/whitney-oral-surgery/oral-surgery-hours/` are `Draft` and 301-redirect to `/about-us/whitney-oral-surgery/dr-james-whitney/`.
     * `/meet-the-team-2/` is trashed and absent from `sitemap-post-type-page.xml`.

2. **Merge PR #10 & Sync Branches:**
   * Merge `feat/meet-the-team-about-menu` (PR #10) into `main` so `main` sits at **`dreamsmile-child` v1.9.2**.
   * Sync `setup/staging-and-deployment` with `main` (preferring `main`'s `wp-content/themes/dreamsmile-child/functions.php` and `inc/seo-migration.php` over the older Oct 24 `d039daa`/`f82d2de` commits; check if the legacy unused slugs `front-royal`, `strasburg`, `mount-jackson` noted in `d039daa` exist on live and draft them manually if present).

3. **Schedule an Off-Hours Maintenance Window:**
   * Schedule cutover for **off-peak hours (e.g., Friday after 5:00 PM EST)** to minimize impact on live patient appointment inquiries and office phone call handling.

4. **Take a Manual Pressable Backup Snapshot of `jeffreyburns.com`:**
   * Log in to the [Pressable Control Panel](https://my.pressable.com/) → **Sites** → `jeffreyburns.com` → **Backups** → create a **manual backup snapshot** (files + database) immediately before starting cutover.
   * Record/verify live production credentials that must survive cutover: **Gravity Forms** license & Form 1 notification recipients, **FluentSMTP** SendGrid configuration, and **Google Tag Manager (GTM)** container placement.

5. **Audit Post-Oct-14 Live Data on `www.jeffreyburns.com`:**
   * Staging was cloned before subsequent live activity (and updated separately with the 3 Oct 2/9/16 blog posts and Nov 2026 team headshots). Before cutover, check `www.jeffreyburns.com/wp-admin/`:
     * **Gravity Forms Form 1 Entries (*Forms → Import/Export → Export Entries*):** Export all entries submitted since **Oct 14, 2026** as CSV so zero patient leads are lost if staging's database replaces production (Path A).
     * **New or Edited Posts & Pages (*Posts → All Posts*, *Pages → All Pages*):** Check for any blog posts published after Oct 16, 2026 (`missing-blog-posts-2026-11.xml` only covers the three Oct 2/9/16 posts) and export them via *Tools → Export* if deploying via Path A.
     * **Live `robots.txt` & GTM:** Save a copy of current `https://www.jeffreyburns.com/robots.txt` and note where GTM is injected (plugin, WPCode/Insert Headers & Footers, or Slim SEO) so it is preserved after cutover.

---

## 3. Choose Your Deployment Path

| Criterion | Path A: Pressable Staging → Production Push | Path B: Direct Deployment to `www.jeffreyburns.com` |
| :--- | :--- | :--- |
| **When to use** | Both `jeffreyburnsstagingclone2.uepreview.com` and `www.jeffreyburns.com` are accessible in the **same Pressable account / collaborator workspace** (or you are performing a full DB + files migration). | PBHS / agency Pressable tenant boundaries prevent a 1-click Pressable push (`docs/pressable-hosting-audit-and-staging-report.md`), **or** you want to preserve live Gravity Forms entries, FluentSMTP config, and existing post history in place without a database overwrite. |
| **Main risk to manage** | Overwriting post-Oct-14 Gravity Forms leads / posts, leftover `uepreview.com` URLs, and staging's `Discourage search engines` flag. | Ensuring every theme `init` auto-migration, manual trigger, 90-rule CSV redirect import, 48 blank page drafts, and 14 video uploads are executed in the right order. |

---

## 4. Path A: Pressable Staging → Production Push

> [!IMPORTANT]
> **Pressable Account Dependency (`docs/pressable-hosting-audit-and-staging-report.md`):**  
> `www.jeffreyburns.com` is hosted under the **PBHS / Automattic for Agencies** Pressable account, whereas `jeffreyburnsstagingclone2.uepreview.com` is on the preview/staging environment. Pressable's native **Clone / Sync to Live** only works when the executing account has collaborator/owner permissions on **both** sites. If that link is not in place, use **Path B** instead.

### Step-by-Step Execution
1. **Confirm Pre-Cutover Exports & Backup:**
   * Verify the manual Pressable backup of `jeffreyburns.com` is complete.
   * Confirm post-Oct-14 Gravity Forms Form 1 entries and any post-Oct-16 posts/comments/media from `www.jeffreyburns.com` have been exported.
   * Confirm staging (`jeffreyburnsstagingclone2.uepreview.com`) is running `dreamsmile-child` **v1.9.2** and all staging checks from Section 2.1 passed.

2. **Push / Sync Staging to Production in Pressable:**
   * In [my.pressable.com](https://my.pressable.com/), push/sync `jeffreyburnsstagingclone2.uepreview.com` (files + database) to `jeffreyburns.com` (or restore staging's DB/files archive onto production).
   * Confirm `WP_HOME` and `WP_SITEURL` resolve to `https://www.jeffreyburns.com` (and verify *Settings → General* shows `https://www.jeffreyburns.com` for both **WordPress Address** and **Site Address**).

3. **Run Database Search & Replace:**
   * Immediately run Search & Replace (via WP-CLI `wp search-replace --dry-run` first, then live, or Better Search Replace across all tables) to eliminate all staging domain references:
     ```bash
     wp search-replace 'https://jeffreyburnsstagingclone2.uepreview.com' 'https://www.jeffreyburns.com' --all-tables --precise --dry-run
     wp search-replace 'http://jeffreyburnsstagingclone2.uepreview.com' 'https://www.jeffreyburns.com' --all-tables --precise --dry-run
     ```
     Re-run without `--dry-run` once the replacement counts look clean.
   * Verify `ss_redirects` (Slim SEO Redirects) and `slim_seo` post meta contain no `uepreview.com` URLs or `http://www.jeffreyburns.com` targets.

4. **Check Slim SEO Schema Logo URL (`docs/seo/2026-10-20-seo-tracker-response.md` §4):**
   * On staging, `/wp-content/uploads/sites/4164/2019/10/logo.png` returned `404`.
   * Upload `wp-content/themes/dreamsmile-child/assets/arrange/jb-logo-clean.png` (or the practice's high-res clean logo) to **Media → Add New Media File** on production.
   * Open **Slim SEO → Schema** (Organization / Dentist entity) and set the **Logo** field to that working `https://www.jeffreyburns.com/wp-content/uploads/...` Media Library URL.
   * Note: `functions.php` (`slim_seo_schema_graph`, priority `999`) automatically enriches `#organization` into `@type: "Dentist"` (`Dr. Jeffrey Burns`, `+1-540-740-8937`, `9626 South Congress St, New Market, VA 22844`, `GeoCoordinates` `38.6473, -78.6711`, `hasMap`, `Mon–Thu 08:00–15:00`, `sameAs` links, and `https://` upgrades).

5. **Restore / Re-Verify Post-Oct-14 Live Leads, Posts, Transients & Credentials:**
   * Re-import any post-Oct-14 blog posts/pages/comments exported in Section 2.5, and run `/wp-admin/?ds_fix_post_links=1` if any newly restored posts contain legacy links.
   * Keep the exported post-Oct-14 Gravity Forms Form 1 CSV safely archived (or re-import into Gravity Forms if required by office staff).
   * Verify **FluentSMTP** SendGrid API key and **Gravity Forms** Form 1 settings/notifications work on `www.jeffreyburns.com`.
   * Clear the `ds_smile_reveal_ready` transient (cached for 30 minutes in `functions.php` per `embeddingOrigin`) so production does not inherit a stale `'no'` cached on `uepreview.com`:
     ```bash
     wp transient delete ds_smile_reveal_ready
     ```
   * Check whether the **14 compressed `.mp4` videos** (Section 5, Step 7) are already in the Media Library from staging; if any video still resolves to GitHub `releases/download/v2/`, upload the missing `.mp4` files from release `v2`.

6. **Proceed to Section 6 (Mandatory Launch-Day Cutover & Post-Launch Verification Checklist).**

---

## 5. Path B: Direct Deployment to `www.jeffreyburns.com`

Use this path to deploy `dreamsmile-child` **v1.9.2** directly onto production (`www.jeffreyburns.com`) while preserving existing live Gravity Forms entries, FluentSMTP settings, and posts in place.

### Step 1: Build `dreamsmile-child.zip`
From a clean checkout of `main` (after merging PR #10) or `feat/meet-the-team-about-menu` at `c429c4e` (`Version: 1.9.2`):
```bash
python build_zip.py
```
* Confirm output: `dreamsmile-child.zip` created at repository root, with `*.mp4` excluded and `"verified: all entries use forward slashes"`.

### Step 2: Install Parent Theme (`twentytwentyfive`) — Do NOT Activate
1. Log in to `https://www.jeffreyburns.com/wp-admin/` as Administrator.
2. Go to **Appearance → Themes → Add New Theme**.
3. Search for **Twenty Twenty-Five** (by the WordPress team) and click **Install**.
4. **Do NOT click Activate.** `dreamsmile-child/style.css` declares `Template: twentytwentyfive`, so Twenty Twenty-Five only needs to exist in `wp-content/themes/twentytwentyfive/`.

### Step 3: Upload & Activate `dreamsmile-child.zip`
1. Go to **Appearance → Themes → Add New Theme → Upload Theme**.
2. Select `dreamsmile-child.zip` and click **Install Now**.
3. Click **Activate** (if an older copy of `dreamsmile-child` was already installed, choose **Replace active with uploaded**, then activate).

### Step 4: Verify Automatic One-Time `init` Migrations
Immediately upon the first WordPress request after activating `dreamsmile-child` **v1.9.2**, four guarded `init` hooks execute in strict priority order and record completion flags in `wp_options`:

| Priority | Option Flag | Source File | Exact Actions Performed |
| :--- | :--- | :--- | :--- |
| `20` | `ds_v162_cleanup_done` | `wp-content/themes/dreamsmile-child/functions.php` | Removes case-insensitive self-redirect loops in `ss_redirects`; normalizes the 7 manual rules (`cosmetic-dentistry/clear-braces`, `porcelain-veneers`, `teeth-whitening`, `dental-bonding`, `inlays-onlays`, `about`, `About`); upgrades `http://` redirect targets to `https://`; drafts WPCode snippets containing `placeSmileReveal` or `smile-reveal-funnel.js`; strips legacy scripts from `ihaf_insert_footer`/`header`/`body`; clears `wpcode_snippets` cache. |
| `25` | `ds_v190_auto_migrate_done` | `wp-content/themes/dreamsmile-child/inc/seo-migration.php` | Seeds `ds_slim_seo_seed()` titles & descriptions (force-updating `/` description and the 8 `/contact-us/` town pages' approved titles & blurbs; keeping existing non-empty Slim SEO fields elsewhere); runs `ds_import_missing_blog_posts()` (`inc/missing-blog-posts-2026-11.xml`, skipping already-published slugs); runs `ds_ensure_privacy_policy_page()` (publishes `/privacy-policy/`, sets `wp_page_for_privacy_policy`, sets Slim SEO meta); runs `ds_post_links_scan()` across posts/pages; sets `slim_seo['author']['noindex'] = 1` and updates `upwardengine` → `dr-jeffrey-burns` (`Dr. Jeffrey S. Burns, DDS`) and `meganjburnsdds-com` → `megan` (`Megan`). |
| `30` | `ds_team_page_191_done` | `wp-content/themes/dreamsmile-child/inc/team.php` | Creates `/meet-the-team/` (if missing and not trashed), populates its Slim SEO title & description if empty, and updates Redirect Map `#55` (`/about-us/meet-the-staff/`) and `/about-our-practice/our-team/` in `ss_redirects` from `/meet-dr-burns/` to `/meet-the-team/`. |
| `32` | `ds_whitney_192_done` | `wp-content/themes/dreamsmile-child/inc/whitney.php` | Seeds Slim SEO title & description on `#59` (`/about-us/whitney-oral-surgery/dr-james-whitney/`) if empty; sets sibling pages `#58` (`/about-us/whitney-oral-surgery/`), `#60` (`/about-us/whitney-oral-surgery/information/`), and `#61` (`/about-us/whitney-oral-surgery/oral-surgery-hours/`) to **Draft** (never Trash, preserving `#59`'s URL); configures 301s `#58`/`#60`/`#61` → `#59`; trashes `/meet-the-team-2/` if present alongside `/meet-the-team/`. |

> [!IMPORTANT]
> **Timing & Ordering Behavior of `ds_v190_auto_migrate_done` (`init` Priority 25):**
> 1. Immediately on theme activation (Step 3/4), `ds_v190_auto_migrate_done` runs **before** `?ds_run_page_seeder=1` creates the new DreamSmile pages and **before** `Settings → Reading → Homepage` (`page_on_front`) is switched from the legacy PBHS homepage to the new DreamSmile `Home` page. As a result, `'/'` writes `slim_seo['description']` onto the legacy homepage, any not-yet-seeded DreamSmile pages are skipped, and `ds_v190_auto_migrate_done` locks to `'1'` (so it will not automatically re-run later). You will populate the new `Home` page and newly seeded pages in **Step 5** via `?ds_seed_slim_seo=1`.
> 2. **`/wp-admin/?ds_fix_post_links=1` in Step 6 is unconditionally required on Path B:** during Step 4 (`init` priority 25), `ss_redirects` does not yet contain the 90 CSV redirects and the new DreamSmile target pages have not been seeded yet (`ds_post_links_new_href()` in `inc/post-links.php` skips any target without a published page). You must run `/wp-admin/?ds_fix_post_links=1` **after** Step 5 and the Step 6 CSV import.

### Step 5: Run Manual Guarded Triggers (In Exact Order)
While logged in to `https://www.jeffreyburns.com/wp-admin/` as an **Administrator**:

1. **Run the Guarded Page Seeder:**
   Open:
   ```text
   https://www.jeffreyburns.com/?ds_run_page_seeder=1
   ```
   *(Pass `&force=1` only if `ds_pages_seeded_2026_05_10` was already set in `wp_options` and missing pages need to be created.)*
   * Creates any missing DreamSmile pages (including `Home`, `Make a Payment`, service pages, and the 8 theme town slugs `harrisonburg`, `winchester`, `broadway`, `bridgewater`, `luray`, `woodstock`, `elkton`, `timberville`) without overwriting existing service-detail copy.

2. **Switch `Settings → Reading → Homepage` BEFORE Running `?ds_seed_slim_seo=1`:**
   * The page seeder only sets `show_on_front` / `page_on_front` when `page_on_front` is empty (`! get_option( 'page_on_front' )`). Because live `www.jeffreyburns.com` already has a legacy `page_on_front`, go to **Settings → Reading**, set **"A static page → Homepage"** to the new DreamSmile **Home** page (and **Posts page** to **Blog** if needed), and click **Save Changes**.
   * **Do not skip this before Step 5.3:** `?ds_seed_slim_seo=1` resolves `'/'` strictly via `get_option( 'page_on_front' )` (`inc/seo-migration.php`), so the DreamSmile **Home** page will not receive its Slim SEO title and description unless `Homepage` is updated first.

3. **Run the Slim SEO Metadata Hand-Off:**
   Open:
   ```text
   https://www.jeffreyburns.com/wp-admin/?ds_seed_slim_seo=1
   ```
   * Inspect the preview table, which checks every entry in `ds_slim_seo_seed()` (including `'/'`, the newly seeded DreamSmile pages such as `/make-a-payment/` and all service/hub pages, existing blog posts, `/blog/`, `/disclaimer/`, `/privacy-policy/`, and the 8 `/contact-us/` town pages — filling only empty Slim SEO title/description fields and never overwriting existing Slim SEO text).
   * Click **Apply**.

### Step 6: Draft Legacy & 48 Blank Pages, Then Import Redirects
**Follow this exact order of operations:**

1. **Draft Legacy & Blank Pages FIRST (Before CSV Import):**
   In **Pages → All Pages**, set the following to **Draft**:
   * **The 48 blank published legacy pages** on `www.jeffreyburns.com` (audit from Oct 8–14).
   * **Legacy `/contact-us/` parent page:** Set `/contact-us/` itself to **Draft — NEVER Trash**, so the 8 `/contact-us/<town>/` child pages keep their hierarchical URLs!
   * **The 8 retiring theme town pages** (created by the seeder if not already drafted): `/harrisonburg/`, `/winchester/`, `/broadway/`, `/bridgewater/`, `/luray/`, `/woodstock/`, `/elkton/`, `/timberville/`.
   * **All other legacy PBHS URLs** mapped in `docs/seo/slim-seo-redirects-import.csv` (e.g., `/admin/`, `/sitemap/`, `/about-us/meet-the-staff/`, old `/restorative-dentistry/...`, `/preventative-care/...`, `/cosmetic-dentistry-4/...`, `/patient-information/...` pages, plus `/front-royal/`, `/strasburg/`, `/mount-jackson/` if present).
   * **DO NOT DRAFT:**
     * `#19` `/restorative-dentistry/full-mouth-reconstruction/` (intentionally kept live per SEO tracker `Won't do` decision).
     * `#59` `/about-us/whitney-oral-surgery/dr-james-whitney/` (Dr. Whitney's consolidated profile; `ds_whitney_192_done` already drafts `#58`, `#60`, `#61` for you).
     * The 8 `/contact-us/` town pages (`Harrisonburg`, `Winchester`, `Elkton`, `Bridgewater`, `Woodstock`, `Luray`, `Broadway`, `Timberville`).

2. **Import `docs/seo/slim-seo-redirects-import.csv` (90 Active 301 Rules):**
   * Go to **Slim SEO → Redirects → Import** and upload `docs/seo/slim-seo-redirects-import.csv`.
   * This imports all **90 active `301` exact-match rules** (`Enable=1`, `Ignore Parameters=1`, relative targets): the 87 baseline SEO tracker rules (73 Redirect Map + 12 Reclaim 404 Backlinks + `/Blog` + `/Contact`) plus the 3 Dr. Whitney sibling consolidations (`#58`, `#60`, `#61` → `/about-us/whitney-oral-surgery/dr-james-whitney/`).

3. **Keep `docs/seo/slim-seo-redirects-on-hold.csv` Disabled (2 Rules):**
   * Do **not** enable either rule in `docs/seo/slim-seo-redirects-on-hold.csv`:
     * `/restorative-dentistry/full-mouth-reconstruction/` → `/full-mouth-dental-implants/` (`Enable=0`, kept live on purpose).
     * `/about-us/whitney-oral-surgery/dr-james-whitney/` → `/wisdom-teeth-removal/` (`Enable=0`, enable only if Dr. Whitney leaves the practice).
   * If you choose to import `slim-seo-redirects-on-hold.csv` for documentation inside WP-Admin, confirm both toggles remain **Disabled (`0`)**.

4. **Check Manual "Fix Old Redirects" & Rewrite Post Links:**
   * Slim SEO's CSV importer skips any `From` rule that already exists. Verify in **Slim SEO → Redirects** that **no active redirect exists for `/cosmetic-dentistry/`** (it is a live page now — delete any legacy rule if present) and confirm the 7 legacy `/cosmetic-dentistry/...` and `/about` rules handled by `ds_v162_cleanup_done` resolve directly to their final `https://www.jeffreyburns.com/...` targets.
   * Run **`https://www.jeffreyburns.com/wp-admin/?ds_fix_post_links=1`**, review the preview of old internal links inside blog posts/pages, and click **Apply** so every internal post link jumps directly to its final target with zero redirect hops.

### Step 7: Upload the 14 Compressed `.mp4` Videos & Clean Logo
1. **Upload the 14 Compressed 720p Videos (Release `v2`):**
   * Download the 14 `.mp4` files from GitHub release `v2`:
     `https://github.com/franzsamilo/jeffrey-burns-oz.test/releases/tag/v2`
   * Upload all 14 via **Media → Add New Media File**, keeping these **exact file names**:
     * `showcase-expertise.mp4`
     * `Educational-One-Day-Teeth.mp4`
     * `Hall-of-Fame-Patients.mp4`
     * `FAQ-Implant-Lifespan.mp4`
     * `FAQ-Implant-Success-Rate.mp4`
     * `FAQ-Permanent-Teeth-One-Day.mp4`
     * `testi-angela.mp4`
     * `testi-danny.mp4`
     * `testi-kelly.mp4`
     * `testi-mike.mp4`
     * `testi-ron.mp4`
     * `Angela-Burker-Testimonial.mp4`
     * `Curtis-Cloude-Testimonial.mp4`
     * `Peter-Encheff-Testimonial.mp4`
   * `ds_media_library_videos()` (`functions.php`) automatically prioritizes the newest Media Library upload matching each lower-cased filename, removing runtime dependency on GitHub.

2. **Upload Clean Logo & Configure Slim SEO Schema:**
   * Upload `wp-content/themes/dreamsmile-child/assets/arrange/jb-logo-clean.png` to **Media → Add New Media File**.
   * In **Slim SEO → Schema** (`Dentist` / `#organization`), set the **Logo** URL to that new Media Library attachment URL (confirming it returns `HTTP 200`, not `404`).

### Step 8: Verify `Settings → General` & Site Editor Templates
1. **Settings → General:**
   * **Site Title:** `Dr. Jeffrey Burns` (ensures automatic `<title>` suffixes match `Page Title | Dr. Jeffrey Burns` via `document_title_separator` = `|`).
   * **WordPress Address (URL):** `https://www.jeffreyburns.com`
   * **Site Address (URL):** `https://www.jeffreyburns.com`
2. **Site Editor Reset (Only If Customized):**
   * Visit **Appearance → Editor → Templates** and **Patterns / Template Parts**.
   * If any template or part (such as `Header`, `Footer`, `Front Page`, or `Page`) shows a blue "customized" dot or renders stale markup (for example, old `12 pm – 5 pm` call-back options instead of `12 pm – 3 pm`, or old menu items instead of the **About Us** dropdown), open its **`...` actions menu → Reset** so the `dreamsmile-child` theme files take effect cleanly.

---

## 6. Mandatory Launch-Day Cutover & Post-Launch Verification Checklist

Execute **every item below** immediately after completing Path A or Path B on `https://www.jeffreyburns.com/`:

### A. Search Indexing, `robots.txt`, Sitemap & Blank Pages
- [ ] **Uncheck Search Engine Blocking:** Go to **Settings → Reading** on `www.jeffreyburns.com` and **uncheck** *"Discourage search engines from indexing this site"* (`blog_public = 1`). Click **Save Changes**.
- [ ] **Remove `Crawl-delay: 3` from `robots.txt`:** Inspect `https://www.jeffreyburns.com/robots.txt`. Remove `Crawl-delay: 3` (via Slim SEO's Robots / Tools settings, virtual `robots.txt`, or physical `robots.txt` file if one exists) and confirm there is no `Disallow: /` and that `Sitemap:` points to `https://www.jeffreyburns.com/sitemap.xml`.
- [ ] **Confirm 48 Blank Live Pages Are Draft:** Verify in **Pages → All Pages** and `https://www.jeffreyburns.com/sitemap-post-type-page.xml` that none of the 48 blank PBHS pages remain published, `/meet-the-team-2/` is gone, and `#58`/`#60`/`#61` are Draft while `#19` and `#59` are published.
- [ ] **Confirm Author Archive `noindex`:** Inspect `/author/dr-jeffrey-burns/` source for `<meta name="robots" content="noindex...">` (enforced by `slim_seo_robots_index` in `functions.php` and `slim_seo['author']['noindex']`).
- [ ] **Submit Sitemap in Google Search Console:** Submit `https://www.jeffreyburns.com/sitemap.xml` in Google Search Console (GSC) and verify live fetch succeeds with `HTTP 200`.

### B. Plugin Cleanup & Cache Purge
- [ ] **Deactivate Legacy PBHS Vendor Plugins:** In **Plugins → Installed Plugins**, deactivate **`pbhs-common-plugin`** and **`pbhsthemehelper`** (the DreamSmile theme does not use them, and removing them eliminates render-blocking legacy JS/CSS and `http://` page-link rewrites).
- [ ] **Deactivate Unused Google Reviews Plugin:** Deactivate **`Widget Google Reviews`** if no live page still renders its shortcode (town pages now use theme templates and no longer embed it).
- [ ] **Purge Pressable Cache & Stale Transients:** Click **Pressable CM** (or top admin bar **P Cache Management**) → **Purge All Caches**, and delete the 30-minute `ds_smile_reveal_ready` transient (`wp transient delete ds_smile_reveal_ready` or via a transient cleaner) if migrating from staging (`uepreview.com`) so Smile Reveal validates cleanly against `https://www.jeffreyburns.com`.
- [ ] **Verify Version Header:** Open `view-source:https://www.jeffreyburns.com/` in an Incognito window and confirm `dreamsmile-child/style.css?ver=1.9.2`.

### C. Incognito End-to-End Functional, Lead, SEO & SSL Verification
- [ ] **Gravity Forms Form 1 + FluentSMTP + GTM `generate_lead` (Modal):**
  * Open `https://www.jeffreyburns.com/` in an **Incognito / Private** window with DevTools Console/Network open.
  * Click **"Schedule"** (navbar, `parts/header.html`) or **"Schedule Your Free Assessment"** (hero, `patterns/hero.php`), and submit a real test booking (clearly labeled `TEST - Launch Verification`).
  * Confirm:
    1. POST to `/wp-admin/admin-ajax.php` (`action=ds_schedule_submit`) returns HTTP `200` `{ "success": true }`.
    2. Modal displays the green checkmark confirmation screen.
    3. `window.dataLayer` received `{ event: 'generate_lead', form_name: 'assessment_request', page_path: '/' }` with **zero patient PII**.
    4. Entry appears in **Gravity Forms → Form 1 → Entries**.
    5. Email alert appears in **FluentSMTP → Email Log** (SendGrid) and arrives in the practice notification inbox.
- [ ] **New Patient Forms Request (`new_patient_forms_request`):**
  * Open `https://www.jeffreyburns.com/new-patients/` in Incognito, pick a form, submit a test request, and confirm Form 1 entry + FluentSMTP delivery + `generate_lead` (`form_name: 'new_patient_forms_request'`).
- [ ] **Tap-to-Call Phone Routing:**
  * Test `(540) 740-8937` on mobile/desktop and verify `href="tel:+15407408937"`.
- [ ] **Make a Payment & Third-Party Lead Tools:**
  * Verify `/make-a-payment/` returns `HTTP 200`, links to `https://pay.balancecollect.com/m/jeffreysburnsddspc`, and displays the QR code.
  * Verify the Eligibility Quiz modal (`schedule.jeffrey-burns.implant-services.com`) opens and renders cleanly.
- [ ] **Media Library Videos:**
  * Inspect `<video><source src="..."></video>` on `/` and `/dental-implants/` and confirm sources resolve to `https://www.jeffreyburns.com/wp-content/uploads/...` (not `github.com`).
- [ ] **301 Redirects Spot-Check (Single-Hop HTTPS):**
  * Verify `301` → `200` at `https://www.jeffreyburns.com/...` for:
    * `/restorative-dentistry/dental-implants/` → `/dental-implants/`
    * `/contact-us/` → `/contact/`
    * `/about-us/meet-the-staff/` → `/meet-the-team/`
    * `/about-us/whitney-oral-surgery/` → `/about-us/whitney-oral-surgery/dr-james-whitney/`
    * `/about-us/whitney-oral-surgery/information/` → `/about-us/whitney-oral-surgery/dr-james-whitney/`
    * `/about-us/whitney-oral-surgery/oral-surgery-hours/` → `/about-us/whitney-oral-surgery/dr-james-whitney/`
    * `/harrisonburg/` → `/contact-us/dental-implants-harrisonburg-area/`
    * `/Blog` → `/blog/` and `/Contact` → `/contact/`
  * Confirm `HTTP 200` (no redirect) for `/restorative-dentistry/full-mouth-reconstruction/` (`#19`), `/about-us/whitney-oral-surgery/dr-james-whitney/` (`#59`), `/meet-the-team/`, `/privacy-policy/`, and `/make-a-payment/`.
- [ ] **SSL & Mixed Content:**
  * Confirm valid HTTPS certificate on `https://www.jeffreyburns.com/`, HTTP → HTTPS redirect works, and DevTools Console reports zero mixed-content errors.
- [ ] **Google Rich Results & Single-Copy Meta Check:**
  * Inspect page source on `/`, `/dental-implants/`, `/implant-faqs/`, `/contact-us/dental-implants-harrisonburg-area/`, and `/about-us/whitney-oral-surgery/dr-james-whitney/`: confirm **1** `<title>`, **1** `<meta name="description">`, **1** `<link rel="canonical">` (`https://`), **1** `<h1>`, and **1** clean `Dentist` schema graph (plus `FAQPage` only on `/implant-faqs/` and the 8 town pages).
  * Validate `/`, `/implant-faqs/`, and one town page in [Google Rich Results Test](https://search.google.com/test/rich-results).

---

## 7. Rollback Procedure

If a critical defect (broken patient intake, fatal PHP error, widespread 404s, or layout failure) is discovered after cutover, execute the rollback matching your deployment path:

### Scenario A: Fast Theme Rollback (Path B — Theme Switch + Manual `init` DB Cleanup)
Use only when `dreamsmile-child` was activated via Path B and you want to revert without a full DB restore.

> [!CAUTION]
> **Re-activating `JeffreyBurns` alone does NOT undo the Step 4 `init` database writes.**  
> Immediately upon theme activation (Step 3/4), the four `init` hooks mutate the live database before Steps 5–6 even run:
> * Drafts Dr. Whitney sibling pages `#58` (`/about-us/whitney-oral-surgery/`), `#60` (`/about-us/whitney-oral-surgery/information/`), and `#61` (`/about-us/whitney-oral-surgery/oral-surgery-hours/`).
> * Writes 301 rules into Slim SEO's `ss_redirects` option (`#58`/`#60`/`#61` → `#59`, `#55` & `/about-our-practice/our-team/` → `/meet-the-team/`, and the 7 `ds_v162_cleanup_done` rules) — **which remain active under Slim SEO even after switching back to `JeffreyBurns`**.
> * Updates `wp_users.user_nicename` / `display_name` (`upwardengine` → `dr-jeffrey-burns` / `Dr. Jeffrey S. Burns, DDS`, `meganjburnsdds-com` → `megan` / `Megan`) and sets `slim_seo['author']['noindex'] = 1`.
> * Writes `slim_seo['description']` on the active `page_on_front`, publishes `/privacy-policy/` & `/meet-the-team/`, imports the 3 Oct 2026 blog posts if missing, and drafts/strips Smile Reveal `wpcode` / `ihaf_insert_*` snippets.
>
> **If Steps 5–6 also ran, or if you want a clean 100% reversal of those DB writes, skip Scenario A and execute Scenario B (Pressable Snapshot Restore).**

If proceeding with Scenario A:
1. Log in to `https://www.jeffreyburns.com/wp-admin/` (or via Pressable OnePress Login / SFTP if WP-Admin is inaccessible; if `dreamsmile-child` throws a fatal error, rename `wp-content/themes/dreamsmile-child/` via SFTP so WordPress falls back).
2. Go to **Appearance → Themes** and re-activate the legacy **`JeffreyBurns`** (`Jeffrey S Burns DDS theme`).
3. Re-activate **`pbhs-common-plugin`** and **`pbhsthemehelper`** (and **`Widget Google Reviews`** if previously active).
4. In **Settings → Reading**, restore the legacy static homepage if changed.
5. **Revert the Step 4 `init` DB mutations in WP-Admin:**
   * Re-publish Dr. Whitney sibling pages `#58`, `#60`, and `#61` (and set newly created `/meet-the-team/` or `/privacy-policy/` to Draft if unwanted).
   * Remove or revert the `ss_redirects` rules added by `ds_v162_cleanup_done`, `ds_team_page_191_done`, and `ds_whitney_192_done` in **Slim SEO → Redirects**.
   * Re-enable any drafted Smile Reveal WPCode / `ihaf_insert_*` snippet if the legacy theme relied on it.
   * If any legacy pages were already drafted in Step 6, bulk-restore them or use **Scenario B** instead.
6. Click **Pressable CM → Purge All Caches** and test `https://www.jeffreyburns.com/` + Gravity Forms Form 1 in Incognito.

### Scenario B: Full Snapshot Restore (Path A or Full State Recovery)
Use when database changes (redirects, drafted pages, search-and-replace, or staging push) must be reverted completely:
1. **Save Any New Live Leads First:** Before restoring the DB, check **Forms → Entries** (or **FluentSMTP → Email Log**) for any patient leads submitted since cutover began and export them.
2. **Restore Manual Pressable Snapshot:**
   * Log in to [my.pressable.com](https://my.pressable.com/) → **Sites** → `jeffreyburns.com` → **Backups**.
   * Locate the **pre-cutover manual backup snapshot** created in Section 2.4.
   * Click **Restore** for **both Files and Database**.
3. **Post-Rollback Verification:**
   * Wait for Pressable restore completion, then **Purge All Caches**.
   * Verify `https://www.jeffreyburns.com/` renders the legacy PBHS site cleanly with valid SSL and active `robots.txt`.
   * Submit a test inquiry through the legacy contact form to confirm Gravity Forms Form 1 + FluentSMTP remain operational.
   * Re-import or forward any leads captured during the cutover window to clinic staff.
