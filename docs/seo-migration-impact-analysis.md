# SEO Migration Impact Analysis & Mitigation Strategy

> **Practice:** Dr. Jeffrey S. Burns, DDS (`https://www.jeffreyburns.com/`)  
> **Target Theme:** DreamSmile Child Theme (`dreamsmile-child` v1.2.7)  
> **Current Environment:** WordPress 7.1 on Pressable, running Classic PBHS Theme  
> **Document Purpose:** Comprehensive risk assessment, architectural comparison, and actionable technical protocols to ensure zero ranking loss and maximize organic growth during migration.

---

## 1. Executive Summary

**Will adding this theme affect SEO? Yes, profoundly.**

A theme switch on an established medical practice website is not merely cosmetic—it alters URL structures, HTML semantic hierarchies, page loading speeds, structured schema markup, and internal link equity.

* **The Downside Risk (Without Mitigation):** If activated directly on production without proper URL mapping, Google crawlers and existing patients will encounter **404 Not Found errors**, leading to immediate de-indexing of key service pages, lost Google Business Profile traffic, and dropping keyword rankings.
* **The Upside Potential (With Proper Mitigation):** DreamSmile replaces a decade-old PBHS codebase (Bootstrap 3, FontAwesome 4.7) with an ultra-lightweight Full Site Editing (FSE) block architecture, adds dedicated Local SEO hubs for **8 Shenandoah Valley communities**, and provides modernized schema that directly targets high-intent dental implant search queries.

---

## 2. Live Production SEO Baseline (Live Novamira Audit)

Inspection of `https://www.jeffreyburns.com/` via live agent diagnostics reveals the existing SEO footprint:

| Metric / Tool | Current Live Configuration | Impact / Considerations |
| :--- | :--- | :--- |
| **Active SEO Plugin** | **Slim SEO (v4.10.1)** | Handles meta titles, descriptions, Open Graph, and automatic XML sitemaps. |
| **Active Schema Plugin** | **Slim SEO Schema (v2.12.7)** | Generates structured JSON-LD entities. |
| **Active Content Volume** | **81 Pages & 59 Posts** | Significant organic equity and long-tail keyword rankings across the Shenandoah Valley. |
| **Active Theme Architecture** | Classic PHP (`Jeffrey S Burns DDS`) | Heavy DOM footprint, render-blocking CSS/JS, PBHS custom shortcodes. |
| **URL Architecture** | Deeply nested legacy paths | e.g., `/restorative-dentistry/dental-implants/` |

---

## 3. The 4 Critical SEO Threat Vectors (What Must Be Guarded)

### Threat 1: URL Structure Mismatch (The #1 Hazard)
* **The Conflict:**
  * Live site uses nested categories: `https://www.jeffreyburns.com/restorative-dentistry/dental-implants/`
  * DreamSmile uses clean, modern slugs: `https://www.jeffreyburns.com/dental-implants/`
* **The Hazard:** Google has ranked the nested URLs for years. Inbound links from external directories, health portals, and user bookmarks point to the old URLs. Without immediate 301 redirects, these become 404s, destroying accumulated link authority (PageRank).
* **The Fix:** Implement an exact 301 permanent redirect map prior to cutover.

### Threat 2: Schema Conflict (Duplicate LocalBusiness / Dentist Entities)
* **The Conflict:**
  * The live site uses **Slim SEO Schema** (`v2.12.7`).
  * `dreamsmile-child` outputs custom JSON-LD schema via `ds_output_seo_schema()` in `functions.php`.
* **The Hazard:** If both output schema simultaneously without harmonization, Google Search Console will flag duplicate, conflicting, or nested schema entities (e.g., conflicting review counts, phone numbers, or practice hours).
* **The Fix:** Harmonize schema output. Either:
  1. Let DreamSmile's custom dental schema in `functions.php` handle the rich `Dentist` + `areaServed` markup and disable redundant LocalBusiness schema in Slim SEO Schema, OR
  2. Map DreamSmile's structured attributes directly into Slim SEO Schema.

### Threat 3: Orphaned Content & Blog Authority
* **The Conflict:** The live site has **59 active blog posts** providing educational dental advice (e.g. pediatric dental tips, plaque removal, decay signs).
* **The Hazard:** If the new DreamSmile navigation (mega menu and footer) exclusively links to core implant pages and omits the blog directory ("Patient Education"), search engine crawlers will reduce crawl frequency to those 59 posts, leading to gradual keyword atrophy.
* **The Fix:** Ensure the "Patient Education" blog hub (`/blog/` or `/patient-education/`) is permanently anchored in the main navigation and footer sitemap.

### Threat 4: Heading Hierarchy & Keyword Density Shifts
* **The Conflict:** PBHS pages use traditional text-heavy layouts with repetitive H1/H2 heading tags optimized for 2018-era SEO. DreamSmile utilizes modern block patterns with concise, high-converting copy.
* **The Hazard:** Abrupt removal of core localized search terms ("dentist in New Market VA", "Shenandoah County dental care") from primary headings can cause temporary keyword fluctuations.
* **The Fix:** Audit DreamSmile patterns to verify that primary service pages maintain core practice keywords in their `<h1>` and `<h2>` elements.

---

## 4. The 4 Major SEO Growth Opportunities (The Upside)

### 1. Massive Core Web Vitals & Mobile Speed Improvement
Google uses page experience and Core Web Vitals as ranking factors, especially on mobile:
* **Current PBHS Theme:** Enqueues Bootstrap 3 CSS/JS, FontAwesome 4.7 font files, PBHS helper scripts, and legacy jQuery libraries, resulting in lower mobile performance scores.
* **DreamSmile Theme:** Native Full Site Editing block theme with zero CSS framework overhead, pure SVG inline iconography, vanilla JavaScript (`assets/js/schedule-modal.js`), and instant rendering. This results in faster Largest Contentful Paint (LCP) and lower Cumulative Layout Shift (CLS).

### 2. Hyper-Local SEO Expansion (8 Target Communities)
DreamSmile introduces dedicated SEO landing pages and structured `areaServed` metadata for 8 high-value surrounding towns:
1. **Harrisonburg, VA**
2. **Winchester, VA**
3. **Broadway, VA**
4. **Bridgewater, VA**
5. **Luray, VA**
6. **Woodstock, VA**
7. **Elkton, VA**
8. **Timberville, VA**

Each page includes localized schema, driving organic traffic for queries like *"dental implants near Harrisonburg"* and *"cosmetic dentistry Woodstock VA"*.

### 3. Medical & Procedure-Specific JSON-LD Schema
In `functions.php`, DreamSmile outputs high-precision medical schema:
* `@type: Dentist` / `MedicalBusiness`
* Verified Google Reviews aggregate rating markup
* Explicit opening hours, geographic coordinates, and ADA accessibility indicators
* Procedure-level entity associations

### 4. Conversion Rate Optimization (CRO) as a Ranking Signal
Google measures user engagement (dwell time, bounce rate, pogo-sticking back to search results). DreamSmile’s frictionless booking modal, prominent phone links (`tel:+15407408937`), and before-and-after case showcases significantly reduce bounce rates, signaling high search satisfaction to Google's ranking algorithms.

---

## 5. Master 301 Permanent Redirect Reference

The following redirect rules must be deployed via the **Redirection** plugin or server configuration (`.htaccess` / Nginx) upon cutover:

```text
# ── Core Service Hubs ────────────────────────────────────────────────────────
Redirect 301 /restorative-dentistry/dental-implants/                             /dental-implants/
Redirect 301 /restorative-dentistry/dental-implants/overview-of-implant-placement/ /how-dental-implants-work/
Redirect 301 /restorative-dentistry/dental-implants/missing-all-upper-or-lower-teeth/ /full-mouth-dental-implants/
Redirect 301 /restorative-dentistry/dental-bridges/                              /dental-bridges/
Redirect 301 /restorative-dentistry/dental-crowns/                               /dental-crowns/
Redirect 301 /restorative-dentistry/root-canal/                                 /root-canal/
Redirect 301 /restorative-dentistry/l-prf-grafting-and-osstell-idx/              /bone-grafting/
Redirect 301 /restorative-dentistry/dentures/                                    /full-dentures/
Redirect 301 /restorative-dentistry/dentures/partial-dentures/                   /partial-dentures/
Redirect 301 /restorative-dentistry/dental-fillings/                             /dental-fillings/
Redirect 301 /restorative-dentistry/                                             /general-dentistry/

# ── Preventative & Pediatric Care ─────────────────────────────────────────────
Redirect 301 /preventative-care/child-dentistry/                                 /pediatric-dentistry/
Redirect 301 /preventative-care/wisdom-teeth-removal/                            /wisdom-teeth-removal/
Redirect 301 /preventative-care/tooth-extractions/                               /tooth-extraction/
Redirect 301 /preventative-care/dental-exams-and-check-ups/                      /dental-exams/
Redirect 301 /preventative-care/oral-hygiene/                                    /oral-hygiene/
Redirect 301 /preventative-care/teeth-cleaning/                                  /teeth-cleaning/
Redirect 301 /preventative-care/dental-sealants/                                 /dental-sealants/
Redirect 301 /preventative-care/gum-disease-treatment/                           /gum-disease/
Redirect 301 /preventative-care/gum-disease-treatment/deep-teeth-cleaning/       /deep-teeth-cleaning/
Redirect 301 /preventative-care/gum-disease-treatment/periodontal-maintenance/   /periodontal-maintenance/

# ── Cosmetic Dentistry ────────────────────────────────────────────────────────
Redirect 301 /cosmetic-dentistry-4/                                              /cosmetic-dentistry/
Redirect 301 /cosmetic-dentistry-4/porcelain-veneers/                            /porcelain-veneers/
Redirect 301 /cosmetic-dentistry-4/teeth-whitening/                              /teeth-whitening/
Redirect 301 /cosmetic-dentistry-4/clear-braces/                                 /clear-braces/

# ── Practice & Patient Information ────────────────────────────────────────────
Redirect 301 /about-us/dr-jeffrey-burns/                                         /meet-dr-burns/
Redirect 301 /patient-information/new-patients/                                  /new-patients/
Redirect 301 /patient-information/anesthesia/                                    /anesthesia/
Redirect 301 /patient-information/insurance/cherry-credit/                       /financing/
Redirect 301 /patient-information/patient-education/                             /patient-education/
Redirect 301 /contact-us/                                                        /contact/
```

---

## 6. Pre-Launch & Post-Launch SEO Quality Checklist

### Phase A: Staging Validation
- [ ] Install **Redirection** plugin on staging and import the redirect table above.
- [ ] Test every legacy PBHS URL in an incognito window and verify it returns HTTP `301 Moved Permanently` to the clean slug.
- [ ] Run Google Rich Results Test (`https://search.google.com/test/rich-results`) on staging pages to confirm valid `Dentist` schema without syntax errors.
- [ ] Verify that `Slim SEO` XML sitemap reflects the new page slugs and includes all 59 blog posts.

### Phase B: Launch Day Protocol
- [ ] Verify that WordPress **Search Engine Visibility** is UNCHECKED on Production (**Settings** → **Reading**).
- [ ] Immediately activate redirect rules on Production.
- [ ] Submit updated XML sitemap (`/sitemap.xml`) to **Google Search Console**.
- [ ] Request re-indexing of key landing pages (`/`, `/dental-implants/`, `/contact/`).

### Phase C: 14-Day Post-Launch Monitoring
- [ ] Monitor Google Search Console **Coverage / Page indexing** report for any unexpected 404 spikes.
- [ ] Monitor **Enhancements** tab in Search Console for schema validation warnings.
- [ ] Track rankings for primary keyword targets:
  - *"dental implants New Market VA"*
  - *"dentist New Market VA"*
  - *"dental implants Harrisonburg VA"*
  - *"emergency dentist Shenandoah County"*
