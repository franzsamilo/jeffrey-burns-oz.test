# SEO Issues Tracker — developer response (2026-10-20)

Response to **"Dr. Jeffrey Burns - SEO Issues Tracker"** (Upward Engine, audit of
`jeffreyburnsstagingclone2.uepreview.com` on 2026-10-14), plus Dr. Burns's request for an
online payment link and QR code.

Branch: `fix/seo-tracker-launch`, built on `setup/staging-and-deployment` (the Gravity Forms
branch that staging runs). Theme version **1.3.0**.

Everything below was checked on a local WordPress (latest) running this theme with the real
Slim SEO plugin: one canonical, one description, one Open Graph set and one H1 per page; Slim
SEO's schema only; links, redirects and the Slim SEO hand-off exercised end to end.

---

## 0. Update 2026-10-26: staging steps, in order

Four updates are now merged into `main`: this SEO tracker work (PR #1), the GoHighLevel quiz,
smile preview and free guide (PR #2), the Harrisonburg and Make a Payment pages (PR #3), and a
visual pass over every page plus proper blog layouts (PR #5, theme **1.5.2**). The
`setup/staging-and-deployment` branch now matches `main`. Staging was still serving theme
**1.2.7** when we checked on 2026-10-26, so none of this is visible there yet.

### Step 1: deploy (everything else depends on this)

1. Build the theme zip from `setup/staging-and-deployment`: `python build_zip.py` writes
   `dreamsmile-child.zip`.
2. In staging's WordPress admin: *Appearance → Themes → Add New Theme → Upload Theme*, choose
   the zip, then **Replace active with uploaded**.
3. Purge the Pressable cache.
4. Check: the page source should show `dreamsmile-child/style.css?ver=1.5.2` (or a later
   version). If it still says 1.2.7, the old theme is still active or the cache wasn't purged.

### Step 2: right after the deploy

- **Create the payment page.** *Pages → Add New*, title "Make a Payment", slug
  `make-a-payment`, leave the content empty, publish. It is a 404 on staging right now. Until
  it exists, the new theme sends `/make-a-payment/` to the payment portal so no link breaks.
- **Remove the old Smile Reveal script.** It is printed just after the site footer: a script
  tag loading `app.smilereveal.io/smile-reveal-funnel.js`, plus a script containing a
  `placeSmileReveal()` function. It targets the old theme's layout and does nothing on the new
  one, because the theme now places Smile Reveal itself. It was still on staging on 2026-10-26.
- **Run the Slim SEO hand-off** in §2 (`/wp-admin/?ds_seed_slim_seo=1`, then *Apply*). It only
  exists once the new theme is deployed.

### Step 3: still open from this response

We could only check what is visible from outside the admin:

- **Redirects (R9, R10): not imported yet.** On 2026-10-26, old addresses such as
  `/about-our-practice/our-services/` and `/office-information/make-an-appointment/` still
  returned 404, `/winchester/` still redirected through `http://`, and the theme's `/elkton/`
  page was still live. Follow the order in §3: draft the old pages, import the CSV, then make
  the manual edits.
- **Not checkable from outside, so skip any already done:** Tag Manager setup (§5), the 14
  videos (§6), Slim SEO Schema business details (§4), the blog content in R11/R22, unpublishing
  `/admin/` and `/sitemap/` (R23), and hiding author archives (R31).

### Heads-up: town pages now take their text from the theme

After the deploy, `/contact-us/dental-implants-harrisonburg-area/` shows the old site's text
word for word in the new layout. That text comes from the theme, so **edits to the page body
in WordPress no longer show**. Send wording changes to us. The page's Slim SEO title and
description still work as normal.

The other seven town pages are built the same way and waiting in PR #4. They stay on their
current WordPress content until the SEO team confirms they want them moved.

### Heads-up: blog posts and /blog/ now use the site's own layout

Until now the theme had no blog layout, so posts, `/blog/` and category pages fell back to
WordPress's default look. After the deploy they use the same design as the rest of the site:
an article header, the reading column, and post cards on `/blog/`. Two things behave
differently:

- **Posts no longer show a comment form.** Existing comments stay in WordPress; they just
  aren't displayed. Tell us if the practice wants comments on.
- **The main heading on `/blog/` is fixed as "Blog".** Renaming the Blog page in WordPress
  changes nothing on the page itself; its Slim SEO title and description still work as normal.
  Category pages use the category name as their heading. Ask us if you want different wording.

### Launch day (not yet)

Untick *Discourage search engines*, confirm *Settings → General* uses `https://www`, submit
`/sitemap.xml` in Search Console, remove `Crawl-delay` from robots.txt (R12, R33), and agree who
has live-site admin access before the 48 blank live pages are set to draft (R17).

---

## 1. Launch Checklist — status by row

**Who:** *Theme* = done in this branch. *SEO team* = Slim SEO / WordPress settings on
staging. *Client* = needs an answer from the practice. *Launch day* = at cut-over.

| Row | Priority | Issue | Status | Who |
|---|---|---|---|---|
| R7 | Blocker | Two copies of canonical / description / robots / schema | **Done.** The theme prints no title, description, canonical, robots, Open Graph, Twitter or business schema any more. Slim SEO is the only source. (The theme keeps a `FAQPage` block on `/implant-faqs/` only — it mirrors that page's FAQ list and Slim SEO prints none.) | Theme |
| R7 | Blocker | Move the theme's titles/descriptions into Slim SEO | **Ready to run** — see §2. One click; only fills empty Slim SEO fields. | SEO team (1 click) |
| R8 | Blocker | Pages without a custom title show only "Jeffrey Burns" | **Done.** Root cause was a theme title filter; removed. Untitled pages now read "Post Title \| Site Name" (pipe set in the theme). The tracker's 16 suggested headlines (14 posts, /blog/, /disclaimer/) are included in the §2 hand-off. Optional: change *Settings → General → Site Title* to "Dr. Jeffrey Burns" so the automatic suffix matches the " \| Dr. Jeffrey Burns" convention. | Theme + SEO team |
| R9 | Blocker | ~80 old addresses need 301s | **CSV ready** — `slim-seo-redirects-import.csv` (87 rules), see §3. Draft the old pages first. | SEO team |
| R10 | Blocker | Old redirects point through http:// and old addresses | Existing rules can't be fixed by import (Slim SEO skips any "From" it already has). Manual list in §3. | SEO team |
| R11 | Blocker | Two newest blog posts missing on staging | Content, not theme. Rebuild `/dental-implant-cost-factors/` and `/how-long-pain-lasts-after-dental-implants/` on staging. | SEO team / content |
| R12 | Blocker | Staging robots.txt `Disallow: /`, http:// sitemap | **Theme side done:** the theme no longer adds its own `Sitemap:` line (it pointed at `/wp-sitemap.xml`, which Slim SEO turns off). At launch: untick *Settings → Reading → Discourage search engines*, make sure *Settings → General* uses `https://www`, submit `/sitemap.xml` in Search Console. | Launch day |
| R13 | Blocker | Hours: text says Mon–Thu 8–3, schema says Mon–Fri 8–5 | **Theme side done:** the Mon–Fri 8–5 schema was the theme's and is gone. Site text says Mon–Thu 8 AM–3 PM everywhere. Confirm against the Google Business Profile and enter the same hours in Slim SEO Schema. | Client confirms; SEO team |
| R14 | Blocker | Forms send no tracking signal | **Done.** Both forms push a `generate_lead` event to the GTM dataLayer after the server confirms receipt — see §5. GTM/GA4 setup + test submissions still needed. | Theme + SEO team |
| R15 | High | Developer's 8 town pages vs. the /contact-us/ pages | **Done (theme side).** `/locations/`, the contact page and the footer now link the 8 `/contact-us/` pages. The theme's `/harrisonburg/`-style pages get drafted + redirected (in the CSV). Set `/contact-us/` itself to **draft, not trash**. | Theme + SEO team |
| R16 | High | Implants banner as an extra H1 on non-implant pages | **Done.** The default page template no longer falls back to the implants banner. Pages with their own H1 (town pages, /disclaimer/) keep exactly that one; pages without one get the page title as the H1 (since theme 1.5.2, /blog/ has its own layout with the H1 "Blog"); /implant-faqs, -procedures and -cost keep only their own hero. | Theme |
| R17 | High | 48 blank pages public on the **live** site since Oct 8 | Not a theme change — these need setting to draft on www.jeffreyburns.com. Please confirm who has live-admin access before anyone touches production. | Team decision |
| R18 | Medium | Ranking-tool drop | SEO team's reporting; no site change. | SEO team |
| R19 | High | Link-building targets addresses that will redirect | SEO team's link roadmap. | SEO team |
| R20 | High | "Jeffery" misspelling | None in the theme. The typo lives in onboarding docs, Slim SEO's business name and AgencyAnalytics. | SEO team |
| R21 | Medium | full-mouth-reconstruction redirect would lose 5 rankings | **Held back** from the import (`slim-seo-redirects-on-hold.csv`, disabled). | Client / SEO team decision |
| R22 | Medium | "Immediate Dental Implant Aftercare" post unpublished | Content. | SEO team / content |
| R23 | High | /admin/ and /sitemap/ thin pages | Unpublish; redirects to / are in the CSV. | SEO team |
| R24 | Medium | Two schema systems, typo, broken logo, no geo/sameAs | **Theme side done:** the theme's Dentist/Person/WebSite/BreadcrumbList are gone. Values to enter in Slim SEO Schema are in §4. | SEO team |
| R25 | Medium | Hard-coded "5.0 from 200 reviews" rating | **Done.** Removed with the theme's schema. | Theme |
| R26 | Medium | Videos hosted on a developer's GitHub | **Done (code).** The theme now uses a video from the Media Library first when one with the same file name exists. Upload the 14 files in §6 and every video slot switches over with no code change. | Theme + whoever uploads |
| R27 | Medium | Slow on phones (46/100), 4.3 MB homepage | **Done for the flagged images.** 12 homepage images converted to WebP at display size: 19.9 MB → 0.49 MB, visually identical at 1:1 (`burns-ct-scan` 1.7 MB → 31 KB; `hero-shot` 645 KB → 119 KB). Below-the-fold images were already lazy-loaded and videos already `preload="metadata"`. Re-test in PageSpeed Insights after deploy; GTM's 0.9 s is the SEO team's tag setup. | Theme |
| R28 | Medium | 94 blog-post links to old addresses | Post-launch content edit. | SEO team |
| R29 | High | Nothing links the town pages | **Done.** Footer "Areas We Serve" lists all 8; `/dental-implants/` and `/full-mouth-dental-implants/` link Harrisonburg and Winchester in body copy. | Theme |
| R30 | Medium | No Privacy Policy; footer lacks it and /disclaimer/ | **Done (theme side).** The footer shows *Privacy Policy* and *Disclaimer* links automatically once those pages are published (Privacy Policy = the page set in *Settings → Privacy*). Text from the client's legal team. | Theme + Client |
| R31 | Medium | Author pages indexable | Slim SEO setting (noindex author archives) + display names. | SEO team |
| R32 | Medium | ~25 headlines over 65 characters | **Done** in the §2 hand-off: every theme page title ≤ 60 characters, ending " \| Dr. Jeffrey Burns"; descriptions ≤ 155. | Theme |
| R33 | Low | `Crawl-delay: 3` in live robots.txt | Launch day. | Launch day |
| R34 | Low | Accessibility 88/100 | Not addressed in this pass. | Later |
| R35 | Low | General-dentistry pages ~55% shared text | Post-launch content. | Later |

### Content Gaps tab

| Gap | Status |
|---|---|
| Same-day crowns (CEREC) — High | **Done.** New "Same-Day Crowns" section on `/dental-crowns/` (and the crown steps now describe the one-visit CEREC route). Facts taken from the old `/restorative-dentistry/cerec/` page. |
| Teeth-in-a-Day — High | **Done.** New "Teeth-in-a-Day" section on `/full-mouth-dental-implants/`, facts from the old Teeth-in-a-Day page. |
| Harrisonburg & Winchester targeting — High | **Done.** Both towns named and linked on `/dental-implants/`, `/full-mouth-dental-implants/` and `/dental-crowns/`. |
| Dr. Whitney / oral surgery — Medium | **Client question.** His 4 redirects are held back (on-hold CSV). |
| Team page, post-op care article, inlays/onlays/bonding, denture care, testimonials page | Not in this pass (Medium/Low, post-launch). |

---

## 2. Slim SEO hand-off (titles + descriptions) — one click

Logged in as an administrator on staging, open:

```
/wp-admin/?ds_seed_slim_seo=1
```

It shows a preview table: every page, and the title/description it **will write**, or the Slim
SEO text it **keeps**. Click **Apply** to write. Rules:

- It only fills a Slim SEO title or description that is **empty**. Anything already typed into
  Slim SEO is never touched, so it is safe to run more than once (a second run writes nothing).
- Pages that don't exist on the site are listed and skipped.
- The 8 `/contact-us/` town pages are deliberately not included; the tracker says to finalise
  their headlines after Oliver's edits.
- 42 theme pages + the tracker's 16 suggested headlines. The full text is in
  `wp-content/themes/dreamsmile-child/inc/seo-migration.php`.

After this, titles and descriptions are edited in each page's Slim SEO box. Nothing in the
theme reads them.

## 3. Redirects

**`slim-seo-redirects-import.csv` — 87 rules, ready to import** (*Slim SEO → Redirects →
Import*). All 301, exact match, query strings ignored, relative targets (so they work on
staging for testing and resolve to `https://www.jeffreyburns.com` on production).

- 73 rows from the Redirect Map tab (all but the 5 held back)
- 12 rows from the Reclaim 404 Backlinks tab
- 2 new rules from Fix Old Redirects: `/Blog` → `/blog/`, `/Contact` → `/contact/`

Order of operations (from the tracker): set the old pages to **draft** first — including the
theme's 8 `/harrisonburg/`-style pages and `/contact-us/` itself (draft, not trash) — then
import, then test the High-priority rows.

**`slim-seo-redirects-on-hold.csv` — 5 rules, imported disabled if at all:**
`/restorative-dentistry/full-mouth-reconstruction/` (tracker R21 decision) and the four
Dr. Whitney pages (client question).

**Manual edits — existing rules the importer will not overwrite** (Fix Old Redirects tab):

| From | Change target to |
|---|---|
| `/cosmetic-dentistry/clear-braces/` | `/clear-braces/` |
| `/cosmetic-dentistry/porcelain-veneers/` | `/porcelain-veneers/` |
| `/cosmetic-dentistry/teeth-whitening/` | `/teeth-whitening/` |
| `/cosmetic-dentistry/dental-bonding/` | `/cosmetic-dentistry/` |
| `/cosmetic-dentistry/inlays-onlays/` | `/dental-fillings/` |
| `/about` and `/About` | `/meet-dr-burns/` |
| `/cosmetic-dentistry/` | delete any old rule — it is a real page now |

Then export the full list and point anything else at its final address.

## 4. Business details for Slim SEO Schema (R13 / R24)

The theme no longer sends any business schema. Values for the single Dentist entity in Slim SEO:

| Field | Value | Note |
|---|---|---|
| Type | `Dentist` | |
| Name | *exactly as on the Google Business Profile* | Fixes the "Dr. Jeffery Burns" typo |
| Address | 9626 South Congress St, New Market, VA 22844, US | |
| Telephone | +1 540-740-8937 | |
| Hours | Mon–Thu 08:00–15:00 | **Confirm against GBP** |
| Logo | a working URL in the Media Library | The current `/wp-content/uploads/sites/4164/2019/10/logo.png` is 404 |
| geo / hasMap | from the Google Business Profile | not in our files |
| sameAs | Facebook, Instagram, Google Business Profile URLs | not in our files |
| aggregateRating | leave out | unless it pulls the real GBP count (R25) |

## 5. Lead tracking (R14)

Both forms — the site-wide schedule/guide modal and the New Patient Forms request — push this
to `window.dataLayer` **after** the server confirms the lead was received:

```js
{ event: 'generate_lead', form_name: 'assessment_request' | 'guide_request' | 'new_patient_forms_request', page_path: '/current/page/' }
```

No patient-entered data is ever pushed. In GTM: a Custom Event trigger on `generate_lead`, a
Data Layer Variable for `form_name`, and a GA4 event tag. Then send a test of each form and
confirm the office receives it.

## 6. Videos to upload to the Media Library (R26)

Upload with these exact file names; the matching slot switches to the Media Library copy
automatically:

`showcase-expertise.mp4`, `Educational-One-Day-Teeth.mp4`, `Hall-of-Fame-Patients.mp4`,
`FAQ-Implant-Lifespan.mp4`, `FAQ-Implant-Success-Rate.mp4`, `FAQ-Permanent-Teeth-One-Day.mp4`,
`testi-angela.mp4`, `testi-danny.mp4`, `testi-kelly.mp4`, `testi-mike.mp4`, `testi-ron.mp4`,
`Angela-Burker-Testimonial.mp4`, `Curtis-Cloude-Testimonial.mp4`, `Peter-Encheff-Testimonial.mp4`

Source copies are on the GitHub v2 release (`franzsamilo/jeffrey-burns-oz.test`).

## 7. Online bill payment (Dr. Burns's request)

> **Update 2026-10-24 (theme 1.5.0):** the page moved to **`/make-a-payment/`**, the old site's
> address for it, and now carries the old page's copy word for word. Create the page with title
> "Make a Payment", slug `make-a-payment`. All links in the theme point there, and both
> `/make-a-payment/` and `/pay-your-bill/` send people to the payment portal until the page exists.
> The rest of this section describes the 1.3.0 version.

- **New page `/pay-your-bill/`** — "Pay Online Now" button (opens
  `https://pay.balancecollect.com/m/jeffreysburnsddspc`), the QR code for people on a computer
  (hidden on phones, where you tap instead), the office phone for balance questions, and a
  pointer to Financing for new treatment.
- **Linked from:** navbar *Resources* menu (desktop + mobile), footer *Contact* column, and a
  fourth card on `/resources/`.
- **Create the page**: *Pages → Add New*, title "Pay Your Bill", slug `pay-your-bill`, leave the
  content empty, publish — the template is picked up automatically. (The page seeder can also
  do it, but it has already run on staging, so it needs `/?ds_run_page_seeder=1&force=1`; it
  only adds missing pages and leaves existing ones, including drafts, alone.) Until it exists,
  `/pay-your-bill/` sends people straight to the payment portal, so no link ever 404s.
- The QR code is the practice's own file, decoded and confirmed to open exactly the link above.
  It is stored at 2× resolution so it stays sharp on high-density screens.

## 8. Questions for the client

1. Office hours as listed on the Google Business Profile (site says Mon–Thu 8 AM–3 PM).
2. Is Dr. James Whitney still with the practice? (4 held redirects, Content Gaps.)
3. Keep `/restorative-dentistry/full-mouth-reconstruction/` live, or fold it into
   `/full-mouth-dental-implants/`? (R21)
4. Privacy Policy text (R30).
5. Business name exactly as on the Google Business Profile, plus Facebook/Instagram/GBP URLs (R24).
