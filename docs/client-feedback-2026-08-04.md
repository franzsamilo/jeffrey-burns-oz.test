# Client Meeting — Aug 4, 2026 (Burns / DreamSmile)

Source: Zoom recording `GMT20260804-000844` (53 min), Drive folder "Aug. 4, 2026 Meeting Notes → Meeting recording".
The read.ai chat log in that folder is empty — the bot was denied recording permission, so this brief is transcribed from the audio.

Participants: **Spencer** (client-side strategist, drove the review), **Chris** (marketing), **Bobby** (client liaison, Antipolo), **Matthew** (OZ design/dev lead).

Overall reaction to the current build: positive — "this is looking excellent," "love it." Everything below is refinement, not rework.

---

## Implementation status (as of 2026-08-07)

**Done:** 2.2 · 3.1 · 3.2 · 3.3 · 4.1 · 4.2 · 4.3 · 5.1 · 5.2 · 6.1 · 6.2 · 7.1 · 7.2 · 8.1 · 8.2 · 8.4 — plus the before/after stills now wired as testimonial poster frames.

**Open, and why:**

| Item | Blocked on |
|---|---|
| **1.3 — Services vs. the emotional hook** | A **1-3-1** owed back to the client. This is a design deliverable, and it gates 1.2 and 1.4. |
| 1.1 · 1.2 · 1.4 | Sequenced behind 1.3 — reordering the homepage before the 1-3-1 is settled would be rework. |
| 2.1 — second TV station | Client: confirm call letters (WRIC / WHSV?) and supply the segment. |
| 3.4 · 3.5 — real photography | Client: Dr. Burns + Megan shoot. |
| 3.6 — vertical testimonial videos | Needs re-cut footage; posters are wired in the meantime. |
| 5.3 — service outline | Bobby to re-send the approved page list. |
| 6.3 — Meet the Staff page | Team photos exist in Drive ("Dr. Burns Team", 2 files); needs bios from the client. |
| 6.4 — nav contents | Same page list as 5.3. |
| 6.5 — blog simplification | Standalone chunk of work, not started. |
| 8.3 — social proof high on location pages | Touches the same ordering question as 1.3. |
| 9.1 · 9.2 — team section | Follows 6.3. |

**Correction to the "blocked on client" list at the bottom of this doc:** the before/after photos **do exist**. `Assets / Assets to use 2 / Pictures` holds `Before & After - {Angela, Danny, Kelly, Mike, Ron}.png`, and `Assets to use 2 / Before and After Testimonial vids` holds a matching 60-second video per patient. Matthew and Bobby concluded on the call that Megan never sent them. They were there.

---

## 1. Homepage structure

| # | Item | Detail |
|---|---|---|
| 1.1 | **Quiz/lead-capture must peek above the fold** | Not a flat section you have to scroll to find. It should visibly stick up into the viewport so visitors think "wait, what's this down here?" and get pulled down. Matthew confirmed this is already in progress. |
| 1.2 | **New section order** | Hero → **lead-capture form** → **Primary Services (3 cards)** → Introducing DreamSmile → the rest of the DreamSmile story. Rationale: a low-threshold CTA must be above the fold ("very few people scroll very far"), and Services early stops visitors from assuming the practice only does implants. |
| 1.3 | **Open tension — needs a design proposal from us** | Spencer worries Services between the hero and the "Introducing The DreamSmile" photo grid breaks the emotional hook — the photo grid is "a massive hook… you'd go from this to this and be like, wow." Chris asked OZ to come back with a **1-3-1** (one problem, three visual options, one recommendation) rather than debating it verbally. **This is the one item that is ours to solve and present.** |
| 1.4 | **Collapse the "The DreamSmile is…" section** | Delete it as a standalone section. Fold its copy into the "Introducing The DreamSmile" block: heading `Introducing The DreamSmile by Jeffrey S. Burns` → paragraph `A healthy, beautiful, natural functioning and looking smile using dental implants. Say goodbye to hiding your mouth and say hello to…` → **bullet points** (the zigzag benefits become bullets). Drop the image that currently sits there. |

## 2. Expertise / "As Seen On"

- **2.1** Add a **second TV station**. Dr. Burns has been on two stations plus a radio station. Named on the call: **WRIC** and one that sounded like **WHSV**. Order: current station first → WRIC → radio station. *(Spencer to confirm call letters and source the second interview.)*
- **2.2** Say **"As Seen On" once**, then all outlet logos beneath it. Spencer floated repeating "As seen on…" per logo; Chris shot it down — "you don't have to repeat yourself."
- **2.3** Use **one interview video only** for now, until the second is actually located.

## 3. Branding & assets

- **3.1** The **DreamSmile logo image renders cut off and poor quality** in at least one spot. Replace with the written-out "DreamSmile" text treatment used elsewhere.
- **3.2** **™ is far too large everywhere.** "Trademarks are usually small little letters." Needs to be small superscript site-wide.
- **3.3** **A fake/AI-generated DreamSmile logo is in the build** — Spencer identified it as "the Train of Thought logo," appearing in the footer and on location pages. Remove every wrong logo; only the real DreamSmile mark ships.
- **3.4** **Hero image is pixelated** — it's a screenshot pulled from client video. Dr. Burns + Megan were supposed to shoot proper photos. Blocked on client.
- **3.5** Another image flagged as "super blurry" — good photo, bad resolution. Needs a replacement source.
- **3.6** **Testimonial videos → vertical format** so they read bigger in the compact grid.

## 4. Comparison section

- **4.1** Use the DreamSmile logo/wordmark in the comparison heading.
- **4.2** "The Dr. Burns Experience" → consider **"The DreamSmile Experience"** (Spencer was 60/40, leaning DreamSmile).
- **4.3** CTA copy: **"See if you're eligible for a DreamSmile."**

## 5. Services mega-menu in the nav

> Corrected on implementation: this reads like the "Our Primary Services" homepage section, but Spencer was pointing at the **Services dropdown in the navigation** — the three names he lists ("Dental Implants, General Dentistry, and then Cosmetic and Restorative") are the three mega-menu column headings, and he moves straight from here into the Locations nav item. The homepage services section was already consistent.

- **5.1** The three column headings rendered in **inconsistent font and color**. Cause: columns 1 and 2 head a real link (`.ds-navbar__mega-head`, teal-dark, hover arrow); column 3 was a non-link `<span>` carrying a `--dual` modifier, since "Cosmetic & Restorative" bundled two hubs under one heading.
- **5.2** The **"extra stray items"** below each column were three *different* footer treatments: `mega-quick` (12px / 500 / warm-gray) in column 1, `mega-quick--also` in column 2, and `mega-foot` (12.5px / 600 / teal-dark) in column 3. Same visual slot, three styles.
- **5.3** Rebuild the full service outline against the page list **Bobby sent over** — Bobby to re-send it. **Still open** — the fix applied so far only normalizes the existing structure; it does not re-derive the IA.

## 6. Navigation & IA

- **6.1** **Remove "Locations" from the top nav.** One practice, one location. Move it to the **footer** and rename it **"Service Areas."** (Location subpages themselves stay — they're SEO landing pages.)
- **6.2** **"Specialist" must go, everywhere.** Dr. Burns is not a specialist and cannot be described as one — this is a compliance issue, previously raised. Replace with **"expert."** Affected: "Meet the Specialist" label and body copy.
- **6.3** The **"Our Team" page only contains Dr. Burns.** Split into **Meet the Doctor** and **Meet the Staff**, ideally as a nav dropdown under About.
- **6.4** Nav contents were guessed from the Figma mockup — **rebuild against the approved page list** (the updated one Matthew recalls existing).
- **6.5** **"Patient Education" → just the blog.** It's currently over-categorized with bespoke block sections. Spencer wants a **standard WordPress blog template**: someone posts, it flows in, no architecting, no "which section does this go under?" Purpose is purely SEO long-tail ("how long does recovery take," "what foods can you eat after surgery") funneling readers into the site.

## 7. Copy

- **7.1** **Global: "consultation" / "consult" → "assessment."** "Anywhere where it says consultation, change it to assessment — that's the first step in the protocol." So `Schedule Your Free Consultation` → `Schedule Your Free Assessment` (or `Schedule Your Free DreamSmile Assessment`). *(~125 occurrences across 18 theme files.)*
- **7.2** Add a **"nationally recognized but stayed local"** angle to the Dr. Burns bio: he became good enough to teach other dentists and develop his own proprietary protocol, yet still chooses to practice in **New Market — a township of about 3,000 people.**

## 8. Location pages

- **8.1** **Lead-capture form at the top of every location page** — the same "peekaboo" quiz treatment as the homepage, on all of them.
- **8.2** **H1 should lead with the location keyword**, e.g. `Dental Implants Near Winchester, Virginia — Expert Results You Can Trust`, so a searcher for "dental implants Winchester" lands and immediately thinks "this is exactly for me." Spencer went back and forth here but landed on location-first.
- **8.3** **Social proof immediately after the hook**, high on the page — hook with UVP + high-threshold CTA + low-threshold CTA above the fold, then social proof, then the logical/detail content.
- **8.4** **Bug: the Dr. Burns section appears twice** on at least one location page.
- **8.5** **The canonical story to tell on every landing page** (Spencer's words, condensed):
  1. If you have lost or missing teeth → we have a solution
  2. Introducing the DreamSmile — the best way to restore your smile
  3. Created by a nationally recognized doctor with his own proprietary protocol
  4. That protocol delivers real benefits vs. the traditional/chain experience
  5. The results are so good → **social proof**
  6. So good they're backed by a warranty
  7. Patient Promise + the doctor's accolades

  Vary the wording page to page so it doesn't read as duplicate content.

## 9. Team section (new idea)

- **9.1** Matthew showed a Vercel-inspired layout where team photos are arranged so the composition **reads like a row of teeth**. Spencer liked it.
- **9.2** Add **bios**: clicking a team member swaps the bio in a panel directly beneath the grid (Spencer likes the bio layout on the current live site). His joke — "or the teeth open up and the bio shows up in between" — was explicitly a joke, but the click-to-swap-bio behaviour is a real request.

---

## Drive asset audit (2026-08-07)

Source: `Assets` folder `1RJysG8r9n4M5HTYXPvBrfxLypbyjo3yg`. Listing method that works: `WebFetch` on `https://drive.google.com/embeddedfolderview?id=<ID>#list`, then `curl` on `https://drive.usercontent.google.com/download?id=<FILE_ID>&export=download`. The Drive MCP's `parentId` search returns `{}` for these folders and cannot be used.

**Already in the theme** (verified by MD5, so no duplicates were introduced):

| Drive file | In theme as | Slot |
|---|---|---|
| `Cosmetic Dentistry.png` | `intro-cosmetic.png` | Cosmetic service card |
| `General Dentistry.png` | `general-dentistry-real.png` | General service card |
| `Hero Section option 1.png` | `hero-option1.png` | hero candidate |
| `DSC06053.jpg` | `dr-burns-portrait.jpg` | About portrait |
| **`Dental Implants.png`** | **`dreamsmile-logo-banner.png`** | **misnamed + unused — see below** |

**Newly installed:**

| File | Slot |
|---|---|
| `guide-cover.webp` | Quiz/guide iPad — replaces `quiz-card.png` |
| `team-group.jpg` (1800×1202, 14 people) | Meet the Staff (6.3) |
| `team-group-alt.jpg` (1800×1282, 9 people) | Meet the Staff alternate |
| `burns-loupes-wide.jpg` (1900×946) | Burns Protocol — matches the spec's "surgical loupes" shot |
| `burns-talking-wide.jpg` (1900×946) | About / Meet Dr. Burns |
| `testimonial-ba-{angela,danny,kelly,mike,ron}.jpg` | Testimonial poster frames |

**Three findings worth acting on:**

1. **`dreamsmile-logo-banner.png` is not a logo.** It is byte-identical to the client's `Dental Implants.png` — the implant-model photo with the DreamSmile sticker on the counter. It is referenced **nowhere** in the theme, while the Dental Implants service card uses `burns-ct-scan.png` instead. This mislabelling is a plausible source of the "made up AI version of the logo" confusion (3.3). Decide whether the client's designated image should take the card.
2. **The guide TODO was stale.** `quiz-and-guide.php` carried a `TODO (client)` saying the guide image was "a stock placeholder — NOT Dr. Burns's actual patient or his real guide." It *was* his real guide; someone swapped it and left the note. The genuine problem was different: the artwork had a **"Download Now" button baked into the image**, sitting next to the real GET THE FREE GUIDE control — a thing that looks clickable but isn't. Swapped to the clean render, TODO replaced with an accurate note.
3. **`dr-burns-portrait.jpg` is 571×800 / 37 KB** — the only copy that exists, in Drive and in the theme. That is soft on a retina About card and is the most likely candidate for the "super blurry" image at 3.5. No higher-resolution version exists in the Drive; it needs a re-shoot or the original camera file.

**Two folders are inaccessible to this account** (HTTP 401, and the Drive MCP cannot see them either):
- `Content Library - Burns`
- `Testimonial Day Footage/Headshots/Team Photos 1/16/26` ← where individual staff headshots would live, needed for 6.3 and 9.1/9.2

Matthew raised a possible access asymmetry on the Aug 4 call and was talked out of it. He was right, just about different folders than the ones being discussed. Ask for these two to be shared.

---

## Blocked on the client

- **Real photography.** Dr. Burns + Megan were to shoot new photos; nothing usable has arrived. Every hero/portrait image in the build is still a video screenshot.
- **Before/after photos.** Bobby believed Megan sent them; Matthew checked the shared drive and found only team photos + videos. **Megan appears not to have sent photos at all** — Bobby to re-confirm.
- **Second TV interview + correct call letters** (WRIC / WHSV?) and the radio segment.
- **The approved page-list / nav outline** — Bobby to re-send.
- Spencer's standing offer: *"if there's any other photos that you guys want or need, just let us know. We'll make it happen."* Worth sending a specific shot list rather than waiting.
