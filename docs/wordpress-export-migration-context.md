# WordPress Export & Migration Context: DreamSmile Child Theme

> **Document Purpose:** This document provides full technical context, architectural audits, safety risks, and step-by-step export procedures for any developer or AI agent tasked with deploying or migrating the DreamSmile project into the client's WordPress site.

---

## 1. Project Overview & Evolution

* **Client:** Dr. Jeffrey S. Burns, DDS (New Market, VA)
* **Brand / Project:** DreamSmile Dental Implants & Comprehensive Dentistry
* **Repository:** `jeffrey-burns-oz.test`
* **Original Build:** Next.js 14 App Router prototype (now archived in `archive-nextjs/`).
* **Current Active Build:** WordPress Full Site Editing (FSE) Block Child Theme located at `wp-content/themes/dreamsmile-child/`.
* **Theme Specification:**
  * **Theme Name:** DreamSmile Child (v1.2.7)
  * **Parent Theme:** `twentytwentyfive` (WordPress 6.7 default theme)
  * **Build Tool:** `build_zip.py` packages the theme into `dreamsmile-child.zip` (excludes `.mp4` video files to reduce bundle size).
  * **Preview Environment:** WordPress Playground (`preview/blueprint.json`).

---

## 2. Live Client Site Audit (`https://www.jeffreyburns.com/`)

An automated inspection of the client's production site reveals:
* **Current Setup:** Classic WordPress site powered by **PBHS** (a dental website/marketing vendor).
* **Active Theme:** `JeffreyBurns` (`/wp-content/themes/JeffreyBurns/`), a classic PHP theme using Bootstrap 3 and FontAwesome 4.7.
* **Active Plugins:** PBHS plugins (`pbhs-common-plugin`, `pbhsthemehelper`), Google Reviews widget, Jetpack.
* **URL Structure:** Deeply nested paths reflecting legacy PBHS information architecture:
  * `/restorative-dentistry/dental-implants/`
  * `/preventative-care/child-dentistry/`
  * `/patient-information/new-patients/`
  * `/contact-us/`
* **Business Risk:** The live site generates real patient appointments and holds established Google SEO rankings. **Any uncoordinated changes or direct theme switches on production will disrupt patient inquiries and search visibility.**

---

## 3. Critical Safety Pitfalls (What Will Break If Uploaded Directly)

### Pitfall 1: Automated Page Seeder (`functions.php` lines 54–132)
* **What it is:** A startup routine hooked to `init` intended for WordPress Playground previews.
* **What it does:** Checks for option `ds_pages_seeded_2026_05_10`. If absent, it synchronously loops through **49 hardcoded page titles** and calls `wp_insert_post()` to create and publish them.
* **Why it is dangerous on production:**
  1. **Mass Uncontrolled Creation:** Injects 49 public, indexable pages immediately into the client's production database.
  2. **Page Hijacking:** Lines 125–128 check `if ( $home_id && ! get_option( 'page_on_front' ) )` and will override the WordPress front page reading settings to point to the newly seeded `Home` page.
  3. **Content Overrides / Duplicate Slugs:** Compares slugs via `get_page_by_path()`. If empty pages exist, it replaces content with block patterns (`wp_update_post`). If slugs differ slightly (`contact-us` vs `contact`), it creates duplicate pages.
  4. **Performance:** Running 49 inserts and `flush_rewrite_rules()` on a single live web request can trigger execution timeouts (504 Gateway Timeout).
  5. **Irreversible on Theme Switch:** Deactivating the theme leaves all 49 pages in `wp_posts`.

### Pitfall 2: Missing Parent Theme (`style.css` line 3)
* `dreamsmile-child` requires `Template: twentytwentyfive`.
* The client's live site runs the classic `JeffreyBurns` theme. If `twentytwentyfive` is not installed on the destination WordPress install, activating `dreamsmile-child` will fail with a fatal parent theme error.

### Pitfall 3: Hidden WordPress Admin Bar (`functions.php` line 43)
* `add_filter( 'show_admin_bar', '__return_false' );` hides the admin bar for **all users** on the frontend (including logged-in administrators and clinic staff), preventing normal content editing and admin access from the front end.

### Pitfall 4: Lead Forms in Demo Mode (`schedule-modal.js` lines 153–161)
* Lead capture modals and inline forms currently run in **demo mode** unless configured with an external endpoint (`data-ds-access-key` for Web3Forms or `data-ds-endpoint` in `parts/footer.html`).
* If deployed as-is, patient consultation requests simulate success on the UI, but **no emails or leads are sent to the clinic**.

### Pitfall 5: SEO Breakdown & 404s
* The DreamSmile child theme uses flat URLs (e.g., `/dental-implants/`, `/contact/`, `/pediatric-dentistry/`).
* The live site uses PBHS nested paths (e.g., `/restorative-dentistry/dental-implants/`, `/contact-us/`).
* A direct cutover without a complete 301 redirect map will destroy established rankings and break existing inbound links.

### Pitfall 6: External Video Hosting (`functions.php` lines 605–611)
* Videos are excluded from `dreamsmile-child.zip` by `build_zip.py`.
* `ds_get_video_url()` falls back to `https://github.com/franzsamilo/jeffrey-burns-oz.test/releases/download/v2/`.
* If that GitHub release or repository is ever renamed, deleted, or made private, all 11 video embeds across the site will 404.

---

## 4. Required Pre-Flight Code Modifications

Before exporting or deploying the theme, the following modifications must be made in `wp-content/themes/dreamsmile-child/`:

### 1. Guard the Page Seeder (`functions.php`)
Convert the seeder from an automatic `init` hook to an explicit, authenticated admin action:
```php
// Replace line 54 in functions.php:
add_action( 'init', function () {
    // Only execute if explicitly requested by a logged-in Administrator
    if ( ! isset( $_GET['ds_run_page_seeder'] ) ) {
        return;
    }
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Unauthorized' );
    }

    $version = 'ds_pages_seeded_2026_05_10';
    if ( get_option( $version ) && ! isset( $_GET['force'] ) ) {
        return;
    }
    // ... existing page creation logic ...
} );
```

### 2. Restore Admin Bar for Editors & Admins (`functions.php`)
```php
// Replace line 43 in functions.php:
add_filter( 'show_admin_bar', function ( $show ) {
    return current_user_can( 'edit_posts' );
} );
```

### 3. Connect Real Lead Capture Endpoints (`parts/footer.html`)
Update the booking modal form attributes in `parts/footer.html`:
* Add `data-ds-access-key="YOUR_WEB3FORMS_KEY"` OR `data-ds-endpoint="https://your-crm-or-form-handler.com/api"`.
* Ensure notification recipients are verified with the client.

### 4. Verify Google Review Count in Schema (`functions.php` line 456)
* Update `'reviews' => '200'` in `ds_office_data()` to Dr. Burns' verified live Google review count.

---

## 5. Deployment Strategies

### Strategy A: Full Redesign / Replacement (Replacing `jeffreyburns.com`)
Use this path only if the client has formally approved replacing their entire PBHS website with this new build.

1. **Staging First:** Spin up a separate staging site (`staging.jeffreyburns.com`). **Never test on production.**
2. **Install Parent Theme:** In Staging WP Admin, install and keep `twentytwentyfive`.
3. **Build & Upload Theme:**
   * Run `python build_zip.py` to generate `dreamsmile-child.zip`.
   * Upload and activate `dreamsmile-child.zip` on staging.
4. **Trigger Seeder on Staging:** Log in as administrator and run `staging.jeffreyburns.com/?ds_run_page_seeder=1`.
5. **Configure 301 Redirects:** Add redirect rules for all legacy PBHS URLs (via `.htaccess` or *Redirection* plugin):
   * `/restorative-dentistry/dental-implants/` → `/dental-implants/`
   * `/preventative-care/child-dentistry/` → `/pediatric-dentistry/`
   * `/preventative-care/dental-exams-and-check-ups/` → `/dental-exams/`
   * `/preventative-care/gum-disease-treatment/deep-teeth-cleaning/` → `/deep-teeth-cleaning/`
   * `/contact-us/` → `/contact/`
   * `/patient-information/new-patients/` → `/new-patients/`
6. **Verify Lead Intake & Tracking:** Confirm Google Analytics 4, Tag Manager, call tracking numbers, and form notifications arrive at Dr. Burns' office.
7. **Scheduled Launch:** Take a complete production backup, push staging to live during off-hours, and verify DNS / SSL.

### Strategy B: Subdomain / Campaign Microsite (Zero Risk to Live Site)
Use this path if DreamSmile is intended as a dedicated dental implant landing page/funnel alongside the existing general practice site.

1. Create a subdomain in DNS: `dreamsmile.jeffreyburns.com`.
2. Provision a clean WordPress instance with its own database.
3. Install `twentytwentyfive` and activate `dreamsmile-child.zip`.
4. Trigger the seeder to establish the full DreamSmile structure in isolation.
5. Cross-link `jeffreyburns.com` to the new subdomain.

---

## 6. Key File & Directory Map

| Path | Purpose |
|---|---|
| `wp-content/themes/dreamsmile-child/` | Active theme codebase |
| `├── style.css` | Child theme declaration (requires `twentytwentyfive`) |
| `├── functions.php` | Enqueues, SEO schema, office data, page seeder |
| `├── theme.json` | FSE design tokens, palette, and typography |
| `├── inc/service-pages.php` | Content dictionaries for 25+ dental service pages |
| `├── inc/diagrams.php` | Explanatory SVG diagrams for procedures |
| `├── templates/` | 14 FSE HTML templates (`front-page.html`, `page.html`, etc.) |
| `├── parts/` | `header.html` (mega menu) & `footer.html` (lead modals) |
| `├── patterns/` | 41 block patterns (Hero, Comparison, Protocol, Reviews, etc.) |
| `├── assets/arrange/` | Optimized imagery, badges, and portraits |
| `├── assets/js/` | `schedule-modal.js`, `navbar.js`, `quiz.js`, `testimonials.js` |
| `build_zip.py` | Python script to package clean `dreamsmile-child.zip` |
| `docs/client-feedback-2026-08-04.md` | Client meeting notes and design approvals |
| `checklist-extracted.txt` | Mapping between live PBHS site pages and new build |
