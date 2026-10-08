# Theme Page Inventory & Content Discrepancy Audit

> **Practice:** Dr. Jeffrey S. Burns, DDS (`https://www.jeffreyburns.com/`)  
> **Target Theme:** DreamSmile Child Theme (`dreamsmile-child` v1.2.7)  
> **Audit Source:** Direct live database query via Novamira MCP vs. Theme Source Code  
> **Document Purpose:** Complete accounting of all **brand new pages** introduced by DreamSmile and all **existing live pages currently missing** from the theme, including clinical, business, and SEO risk assessments for synchronization.

---

## 1. Executive Summary & Inventory Totals

* **Total Live Published Pages on `jeffreyburns.com`:** **81 Pages** (plus 1 draft)
* **Total Pages Defined in DreamSmile Theme:** **49 Pages**
* **Pages Present on Both (Identical Path):** **1 Page** (`/` Homepage)
* **Brand New Pages Introduced by Theme:** **10 Pages**
* **Existing Live Pages Missing from Theme:** **46 Pages**

---

## 2. Brand New Pages in the DreamSmile Theme (10 Pages)

These pages are net-new additions in DreamSmile that do not exist on the live PBHS site. They expand the practice's information architecture and target specific high-intent search queries.

| # | Page Title | Theme Slug & URL | Strategic Purpose |
| :-: | :--- | :--- | :--- |
| **1** | **Locations Hub** | `/locations/` | Directory hub linking all 8 Shenandoah Valley target communities. |
| **2** | **General Dentistry Hub** | `/general-dentistry/` | Service category overview for general family dental services. |
| **3** | **Meet Dr. Burns** | `/meet-dr-burns/` | Dedicated practitioner bio and credentials page (replacing nested PBHS path). |
| **4** | **Restorative Care Hub** | `/restorative-care/` | Service category overview for restorative dental treatments. |
| **5** | **Resources Hub** | `/resources/` | Patient resource library linking financing, forms, and FAQs. |
| **6** | **Implant Cost & Financing** | `/implant-cost/` | High-intent patient conversion page detailing pricing and payment plans. |
| **7** | **Implant Procedures Overview** | `/implant-procedures/` | Comprehensive procedure guide explaining surgical stages. |
| **8** | **Implant FAQs** | `/implant-faqs/` | Dedicated Q&A addressing patient pain, longevity, and recovery questions. |
| **9** | **Implant Supported Bridges** | `/implant-supported-bridges/` | Specialized procedure page for multi-tooth replacement. |
| **10** | **Pediatric Dentistry** | `/pediatric-dentistry/` | Modern slug replacing legacy `/preventative-care/child-dentistry/`. |

---

## 3. Existing Live Pages Missing from the DreamSmile Theme (46 Pages)

The following 46 published pages currently receive traffic, rank on Google, or serve clinical/administrative functions on `jeffreyburns.com`, but have **no corresponding template or page in the new theme**.

### Group A: Dr. James Whitney Oral Surgery Partnership (4 Pages)
> [!WARNING]
> **Business & Patient Impact:** The live site features a dedicated section for **Dr. James Whitney** and **Whitney Oral Surgery**, who appears to provide oral surgery services within or alongside Dr. Burns' practice. Omitting these pages will completely cut off Dr. Whitney's patient intake and practice hours.

| Page Title | Live URL | Recommended Action |
| :--- | :--- | :--- |
| **Whitney Oral Surgery** | `/about-us/whitney-oral-surgery/` | **Retain / Add Template:** Create a partner profile page in the new theme. |
| **Dr. James Whitney** | `/about-us/whitney-oral-surgery/dr-james-whitney/` | **Retain:** Maintain biography and surgical credentials. |
| **Information** | `/about-us/whitney-oral-surgery/information/` | **Merge or Retain:** Consolidate into Whitney Oral Surgery hub. |
| **Oral Surgery Hours** | `/about-us/whitney-oral-surgery/oral-surgery-hours/` | **Retain:** Essential for scheduled surgical consultations. |

---

### Group B: Post-Operative & Clinical Patient Instructions (1 Page)
> [!CAUTION]
> **Clinical Risk:** This page provides critical post-surgical aftercare instructions for patients who just underwent dental implant surgery.

| Page Title | Live URL | Recommended Action |
| :--- | :--- | :--- |
| **After Implant Placement** | `/restorative-dentistry/dental-implants/after-implant-placement/` | **Must Retain:** Build into DreamSmile under `/implant-aftercare/` or keep at current URL. |

---

### Group C: Advanced Technology & Imaging (3 Pages)
> [!NOTE]
> Dr. Burns' practice highlights in-house high-tech capabilities (3D Cone Beam CT scans and same-day CEREC restorations) that build clinical credibility.

| Page Title | Live URL | Recommended Action |
| :--- | :--- | :--- |
| **3D Imaging** | `/about-us/3d-imaging/` | **Retain or Integrate:** Add section to Technology/About page or keep standalone. |
| **Advanced Technology** | `/about-us/advanced-technology/` | **Retain:** High conversion factor for tech-conscious patients. |
| **CEREC** | `/restorative-dentistry/cerec/` | **Retain:** Targets patients searching for "same-day crowns New Market VA". |

---

### Group D: Practice Staff & About Information (3 Pages)

| Page Title | Live URL | Recommended Action |
| :--- | :--- | :--- |
| **About Us** | `/about-us/` | **Map:** Point to `/meet-dr-burns/` or create general practice overview. |
| **Dr. Jeffrey Burns** | `/about-us/dr-jeffrey-burns/` | **Redirect 301:** Redirect directly to `/meet-dr-burns/`. |
| **Meet The Staff** | `/about-us/meet-the-staff/` | **Retain:** Patients value seeing the hygienists and dental assistants before visiting. |

---

### Group E: Patient Intake, Registration & Financing (7 Pages)

| Page Title | Live URL | Recommended Action |
| :--- | :--- | :--- |
| **First Visit** | `/patient-information/first-visit/` | **Integrate:** Consolidate into `/new-patients/`. |
| **Patient Registration** | `/patient-information/patient-registration/` | **Must Retain:** Contains printable or online patient registration intake forms. |
| **Scheduling** | `/patient-information/scheduling/` | **Redirect 301:** Redirect to `/contact/` or interactive booking modal. |
| **Why Choose Us** | `/patient-information/why-choose-us/` | **Integrate:** Preserved inside DreamSmile homepage & about patterns. |
| **Patient Information** | `/patient-information/` | **Redirect 301:** Redirect to `/resources/`. |
| **CareCredit** | `/patient-information/care-credit/` | **Merge:** Consolidate into `/financing/`. |
| **Cherry Credit** | `/patient-information/insurance/cherry-credit/` | **Merge:** Consolidate into `/financing/`. |

---

### Group F: Denture Care & Specialized Prosthetics (7 Pages)
> [!NOTE]
> The live site has extensive dedicated subpages for denture maintenance that general denture wearers rely on.

| Page Title | Live URL | Recommended Action |
| :--- | :--- | :--- |
| **Dentures (Hub)** | `/restorative-dentistry/dentures/` | **Map 301:** Redirect to `/full-dentures/`. |
| **Denture Care** | `/restorative-dentistry/dentures/denture-care/` | **Retain or Add to Patient Education:** Valuable long-tail SEO. |
| **Denture Relines** | `/restorative-dentistry/dentures/denture-relines/` | **Retain:** High-intent local emergency service. |
| **Exams & Maintenance** | `/restorative-dentistry/dentures/exams-maintenance/` | **Merge:** Integrate into Denture Care or Periodontal Maintenance. |
| **Immediate Dentures** | `/restorative-dentistry/dentures/immediate-dentures/` | **Retain:** Specific clinical procedure for same-day extractions. |
| **Rebase & Repairs** | `/restorative-dentistry/dentures/rebase-repairs/` | **Retain:** High-intent local repair search query. |
| **Soft Liners** | `/restorative-dentistry/dentures/soft-liners/` | **Merge or Retain:** Specialty denture cushion service. |

---

### Group G: Specific Dental & Cosmetic Procedures (5 Pages)

| Page Title | Live URL | Recommended Action |
| :--- | :--- | :--- |
| **Full Mouth Reconstruction** | `/restorative-dentistry/full-mouth-reconstruction/` | **Cross-Link:** Coordinate with `/full-mouth-dental-implants/`. |
| **Teeth-in-a-Day** | `/restorative-dentistry/dental-implants/teeth-in-a-day/` | **Redirect 301:** Redirect to `/full-mouth-dental-implants/`. |
| **Dental Bonding** | `/cosmetic-dentistry-4/dental-bonding/` | **Retain:** Common entry-level cosmetic procedure. |
| **Inlays & Onlays** | `/cosmetic-dentistry-4/inlays-onlays/` | **Retain:** Conservative restorative option between fillings and crowns. |
| **Child Dentistry** | `/preventative-care/child-dentistry/` | **Redirect 301:** Redirect to `/pediatric-dentistry/`. |

---

### Group H: Reviews, Testimonials & Feedback (3 Pages)

| Page Title | Live URL | Recommended Action |
| :--- | :--- | :--- |
| **Dental Testimonials** | `/patient-information/dental-testimonials/` | **Redirect 301:** Redirect to homepage reviews or dedicated review section. |
| **Patient Reviews** | `/patient-information/testimonials/` | **Redirect 301:** Redirect to Google Review showcase on the new site. |
| **Write a Review** | `/patient-information/patient-review-form/` | **Retain:** Direct link for patients to leave Google/internal reviews. |

---

### Group I: Utility, Blog & Compliance Pages (4 Pages)

| Page Title | Live URL | Recommended Action |
| :--- | :--- | :--- |
| **Blog** | `/blog/` | **Preserve:** Archive hub for all 59 published dental blog posts. |
| **COVID-19 Office Re-Opening**| `/patient-information/covid-19-office-re-opening/` | **Archive / 410 or Redirect:** Outdated pandemic protocol page. |
| **Disclaimer** | `/disclaimer/` | **Retain:** Standard legal dental disclaimer. |
| **Sitemap** | `/sitemap/` | **Retain / Auto-generate:** HTML sitemap for patient navigation. |

---

## 4. Prioritized Synchronization Recommendations

To ensure no vital content is lost when deploying the DreamSmile theme:

1. **Top Priority: Dr. James Whitney Section**
   * Confirm with Dr. Burns whether Dr. Whitney is still an active visiting specialist or partner. If active, port the Whitney Oral Surgery pages into the new theme.
2. **Clinical Safety Priority: After Implant Placement**
   * Keep the post-op care instructions published and link to them directly from the implant recovery sections.
3. **Conversion Priority: Patient Registration Forms**
   * Ensure new patients can download or complete their intake forms online before their first visit.
4. **SEO Protection: 301 Redirect Consolidation**
   * For missing pages that are merged (e.g. `CareCredit` → `Financing`, `Teeth-in-a-Day` → `Full Mouth Implants`), apply permanent 301 redirects immediately so inbound links pass their full equity.
