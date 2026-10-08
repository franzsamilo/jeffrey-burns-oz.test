# Pressable Staging Deployment & Verification Workflow

> **Target Practice:** Dr. Jeffrey S. Burns, DDS (`https://www.jeffreyburns.com/`)  
> **Hosting Platform:** Pressable (Automattic Managed WordPress)  
> **Theme Target:** `dreamsmile-child` (v1.2.7) requiring parent theme `twentytwentyfive`  
> **Risk Classification:** **CRITICAL / ZERO-DOWNTIME** (Live site handles real patient appointments, active phone routing, and established Google organic rankings).

---

## 1. Why Staging is Mandatory

Inspection of the live environment (`https://www.jeffreyburns.com/wp-admin/index.php`) confirms:
* **Production Footprint:** 81 published pages, 59 published posts, active PBHS lead generation.
* **Locked URLs:** `WP_HOME` and `WP_SITEURL` are hardcoded to production.
* **Active Legacy Theme:** Classic PHP theme (`Jeffrey S Burns DDS theme`). The required parent theme (`twentytwentyfive`) is not active.
* **Direct Switch Consequence:** Activating `dreamsmile-child` directly on production without staging will trigger fatal parent theme errors, duplicate page collisions, or broken permalinks.

---

## 2. Phase 1: Provision the Pressable Staging Clone

Pressable offers 1-click isolated staging environments that duplicate the live database, media library, and plugins into a sandbox URL with zero impact on live traffic.

### Step-by-Step Provisioning:
1. Log in to the [Pressable Control Panel](https://my.pressable.com/).
2. In your site listing, locate and click on **Jeffrey Burns** (`jeffreyburns.com`).
3. In the site actions or overview panel, select **Clone Site** (or **Create Staging Site**).
4. Enter a name for the clone, such as `jeffreyburns-staging`.
5. Wait for Pressable to complete the cloning process (typically 2–3 minutes).
6. Note the generated staging URL (typically in the format `https://jeffreyburns-staging.mystagingwebsite.com` or `https://*.pressable.com`).
7. Confirm search engine visibility is disabled on staging:
   * Navigate to Staging WP Admin → **Settings** → **Reading**.
   * Ensure **"Discourage search engines from indexing this site"** is checked.

---

## 3. Phase 2: Staging Theme Installation & Prerequisites

`dreamsmile-child` is a Full Site Editing (FSE) block child theme built upon WordPress 6.7's default **Twenty Twenty-Five** theme.

### Step-by-Step Installation on Staging:

#### 1. Install the Parent Theme (`twentytwentyfive`)
1. Log into your **Staging WP Admin** (`https://<staging-domain>/wp-admin/`).
2. Go to **Appearance** → **Themes** → **Add New Theme**.
3. Search for **Twenty Twenty-Five** (by the WordPress team).
4. Click **Install**.
   > [!IMPORTANT]
   > **DO NOT click Activate** on Twenty Twenty-Five. It only needs to reside in `/wp-content/themes/twentytwentyfive/` as the parent base.

#### 2. Upload the Safeguarded Child Theme
1. In Staging WP Admin, go to **Appearance** → **Themes** → **Add New Theme** → **Upload Theme**.
2. Select the distribution bundle:
   `dreamsmile-child.zip` (packaged via `build_zip.py`).
3. Click **Install Now**.
4. Once uploaded, click **Activate**.

#### 3. Immediate Sanity Check:
* Verify the site does not display a PHP fatal error.
* Because the page seeder is now guarded, activating the theme **will not** automatically alter existing pages or hijack the homepage.
* Verify the WordPress Admin Bar remains visible on the frontend while logged in as Administrator.

---

## 4. Phase 3: Controlled Content Seeding (Optional / Selective)

The theme includes a pre-configured page architecture covering 49 service and location pages.

### Triggering the Seeder Safely:
If you wish to populate the new DreamSmile block pages into the staging database:
1. Ensure you are logged into Staging WP Admin as an **Administrator**.
2. Visit the following URL in your browser:
   ```text
   https://<staging-domain>/?ds_run_page_seeder=1
   ```
   *(To force-refresh existing pages if needed: `https://<staging-domain>/?ds_run_page_seeder=1&force=1`)*
3. **What happens:**
   * Checks each slug against existing pages.
   * Inserts missing service/location pages.
   * Attaches block patterns (e.g., `dreamsmile/implant-cost`, `dreamsmile/single-location`).
   * Updates `show_on_front` to `page` and sets the front page to `Home`.
   * Flushes rewrite rules cleanly.

---

## 5. Phase 4: 301 Redirect Mapping (PBHS → DreamSmile)

The live PBHS site uses deeply nested URLs. On staging, we must verify the complete 301 redirect map before any production cutover to preserve Google SEO equity.

Install the **Redirection** plugin (`Plugins` → `Add New` → search `Redirection`) or configure these rules in Nginx/Apache:

| Legacy Live URL (PBHS) | New DreamSmile Target URL | Purpose |
| :--- | :--- | :--- |
| `/restorative-dentistry/dental-implants/` | `/dental-implants/` | Core Implant Landing Hub |
| `/restorative-dentistry/dental-implants/overview-of-implant-placement/` | `/how-dental-implants-work/` | Procedure Overview |
| `/restorative-dentistry/dental-implants/missing-all-upper-or-lower-teeth/` | `/full-mouth-dental-implants/` | Full Arch Solutions |
| `/restorative-dentistry/dental-bridges/` | `/dental-bridges/` | Restorative Bridges |
| `/restorative-dentistry/dental-crowns/` | `/dental-crowns/` | Restorative Crowns |
| `/restorative-dentistry/root-canal/` | `/root-canal/` | Endodontic Care |
| `/restorative-dentistry/l-prf-grafting-and-osstell-idx/` | `/bone-grafting/` | Grafting & Advanced Healing |
| `/restorative-dentistry/dentures/` | `/full-dentures/` | Denture Hub |
| `/restorative-dentistry/dentures/partial-dentures/` | `/partial-dentures/` | Partial Dentures |
| `/restorative-dentistry/dental-fillings/` | `/dental-fillings/` | Fillings |
| `/preventative-care/child-dentistry/` | `/pediatric-dentistry/` | Pediatric Care |
| `/preventative-care/wisdom-teeth-removal/` | `/wisdom-teeth-removal/` | Oral Surgery |
| `/preventative-care/tooth-extractions/` | `/tooth-extraction/` | Extractions |
| `/preventative-care/dental-exams-and-check-ups/` | `/dental-exams/` | Preventative Exams |
| `/preventative-care/oral-hygiene/` | `/oral-hygiene/` | Preventative Hygiene |
| `/preventative-care/teeth-cleaning/` | `/teeth-cleaning/` | Preventative Cleaning |
| `/preventative-care/dental-sealants/` | `/dental-sealants/` | Sealants |
| `/preventative-care/gum-disease-treatment/` | `/gum-disease/` | Periodontal Care |
| `/preventative-care/gum-disease-treatment/deep-teeth-cleaning/` | `/deep-teeth-cleaning/` | Periodontal Cleaning |
| `/preventative-care/gum-disease-treatment/periodontal-maintenance/` | `/periodontal-maintenance/` | Periodontal Maintenance |
| `/cosmetic-dentistry-4/` | `/cosmetic-dentistry/` | Cosmetic Overview |
| `/cosmetic-dentistry-4/porcelain-veneers/` | `/porcelain-veneers/` | Veneers |
| `/cosmetic-dentistry-4/teeth-whitening/` | `/teeth-whitening/` | Whitening |
| `/cosmetic-dentistry-4/clear-braces/` | `/clear-braces/` | Orthodontics |
| `/about-us/dr-jeffrey-burns/` | `/meet-dr-burns/` | Doctor Bio |
| `/patient-information/new-patients/` | `/new-patients/` | Patient Onboarding |
| `/patient-information/anesthesia/` | `/anesthesia/` | Sedation Options |
| `/patient-information/insurance/cherry-credit/` | `/financing/` | Patient Financing |
| `/patient-information/patient-education/` | `/patient-education/` | Patient Learning |
| `/contact-us/` | `/contact/` | Contact & Map |

---

## 6. Phase 5: Lead Capture & Form Verification

DreamSmile includes interactive modal scheduling and inline inquiry forms.

### Form Configuration (`parts/footer.html` & `patterns/new-patients-content.php`):
1. Locate the modal form declaration:
   ```html
   <form class="ds-modal__form" data-ds-modal-form
         data-ds-access-key="YOUR_WEB3FORMS_ACCESS_KEY"
         data-ds-endpoint="">
   ```
2. **Options for Live Delivery:**
   * **Web3Forms (Easiest):** Create a free access key at [web3forms.com](https://web3forms.com) bound to the clinic email (or a staging test email) and place it in `data-ds-access-key`.
   * **Custom CRM / Webhook:** Paste the destination webhook URL in `data-ds-endpoint`.
3. **Verification Checklist:**
   - [ ] Open modal via header "Schedule Assessment" button.
   - [ ] Submit a test booking with name, phone, email, and preferred time.
   - [ ] Verify that the modal shows the checkmark confirmation screen.
   - [ ] Verify the inquiry email is received in the testing inbox.
   - [ ] Confirm telephone tap-to-call links trigger `tel:+15407408937`.

---

## 7. Phase 6: Cache & Asset Testing on Pressable

Pressable uses multi-tier caching (Varnish / Edge Caching / Object Caching).

1. In Staging WP Admin, locate the **Pressable CM** (or top bar **`P Cache Management`**) menu.
2. Click **Purge All Caches** after uploading new theme files or making customizer edits.
3. Test frontend pages in an **Incognito / Private Window** to confirm:
   * Split heroes and responsive images load smoothly.
   * Mega menu dropdowns and mobile hamburger navigations operate cleanly.
   * External video embeds load properly from CDN fallbacks.
   * Google Reviews schema output validates on Google's Rich Results Test tool.

---

## 8. Phase 7: Production Cutover Checklist

When the staging site has received full client sign-off:

1. **Production Backup:** Log into Pressable Control Panel → Sites → `jeffreyburns.com` → **Backups** → Create manual backup snapshot.
2. **Scheduled Window:** Execute cutover during off-peak hours (e.g., Friday after 5:00 PM EST).
3. **Cutover Options:**
   * **Option 1 (Pressable Overwrite):** Push Staging to Production directly within the Pressable dashboard.
   * **Option 2 (Safe Modular Theme Activation):** Install `twentytwentyfive` on Production → Upload `dreamsmile-child.zip` on Production → Activate `dreamsmile-child` → Import 301 Redirection rules.
4. **Post-Launch Verification:**
   * [ ] Test telephone link on smartphone.
   * [ ] Submit live consultation request and confirm clinic staff receives notification.
   * [ ] Check Google Search Console for crawl errors or 404s.
   * [ ] Confirm SSL certificate remains active and valid.
