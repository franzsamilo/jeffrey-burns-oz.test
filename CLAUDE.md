# J. Burns DreamSmile — Next.js Project Guide

## Project Overview

Marketing landing page for **Dr. Jeffrey S. Burns, DDS** promoting his **DreamSmile** dental implant service. The site is a long-scroll, conversion-focused page designed to build trust, educate patients on dental implants, and drive free consultation bookings.

**Live Phone:** (540) 740-8937
**Brand Tagline:** "A Dream Smile You Never Have to Hide"

---

## Tech Stack

- **Framework:** Next.js 14+ (App Router)
- **Styling:** Tailwind CSS 3.x
- **Animations:** Framer Motion
- **Font Loading:** `next/font/google`
- **Image Handling:** `next/image` with placeholder blur
- **Deployment Target:** Vercel

---

## Design Tokens & Brand Identity

### Color Palette

```css
/* Primary */
--color-teal:          #7FB5B0;   /* primary brand teal — CTAs, accents, highlights */
--color-teal-dark:     #5A9A93;   /* hover states */
--color-teal-light:    #A8D5D0;   /* light teal for pill badges ("AS SEEN ON TV") */

/* Neutrals */
--color-charcoal:      #3A3A3A;   /* dark sections (hero overlay, Burns Protocol, Patient Promise) */
--color-dark-slate:    #4A4A4A;   /* body text */
--color-gray-warm:     #6B6B6B;   /* secondary text */
--color-gray-light:    #F5F5F3;   /* light section backgrounds (quiz, comparison) */
--color-white:         #FFFFFF;
--color-off-white:     #FAFAF8;   /* page base background */

/* Accents */
--color-coral:         #E88B7A;   /* strikethrough/negative accent ("hiding your mouth") */
--color-red-muted:     #D9534F;   /* red X icons in comparison table (dental chains) */
--color-green-check:   #7FB5B0;   /* teal checkmarks in comparison table (DreamSmile side) */
--color-gold-star:     #F5A623;   /* Google rating stars */
```

### Typography

```
Headings (H1, Hero):       "Playfair Display", serif — bold/italic mix
Headings (H2 sections):    "Playfair Display", serif — regular weight
Subheadings / Labels:       "Montserrat", sans-serif — uppercase, letterspaced (tracking-widest)
Body Text:                  "Montserrat", sans-serif — 400/500 weight
CTA Buttons:                "Montserrat", sans-serif — 600, uppercase, letter-spaced
Brand Wordmark "DreamSmile": Custom/stylized — use an SVG or a script font like "Great Vibes" / "Dancing Script"
```

### Spacing & Layout

- **Max content width:** 1200px, centered
- **Section vertical padding:** 80px–100px desktop / 48px–60px mobile
- **Between-section dividers:** Subtle `border-top: 1px solid #E5E5E5` or clean whitespace
- **Border radius on cards:** 8px–12px
- **Border radius on CTAs:** 24px–30px (rounded pill shape)

---

## Page Sections (Top to Bottom)

The page is a single long-scroll layout. Build each section as its own component inside `components/sections/`.

### 1. `Navbar`
- **Left:** J. Burns logo (stylized "j burns" with "Jeffrey S. Burns D.D.S." subtitle) — white text on dark
- **Right:** Teal outlined pill button: "Call Us (540) 740-8937"
- **Behavior:** Sticky top, transparent on hero → solid white/shadow on scroll
- **File:** `components/Navbar.tsx`

### 2. `HeroSection`
- **Background:** Dark photo overlay of Dr. Burns with a patient (use a placeholder image)
- **Left-aligned white text:**
  - H1: "A Dream Smile You Never Have to *Hide*" — "Hide" in italic
  - Checkmark list (3 items):
    - "A doctor who truly cares — gives you his personal cell number"
    - "30 years of dental implant service and experience"
    - "No 3rd-parties. A one-stop shop. Everything in-house."
  - CTA: Teal rounded pill button → "Schedule Your Free Consultation"
- **Bottom right:** DreamSmile script logo watermark
- **File:** `components/sections/HeroSection.tsx`

### 3. `QuizAndGuideSection`
- **Background:** Light gray `#F5F5F3`
- **Layout:** 3-column row (quiz | book image | guide CTA)
- **Left column — Quiz card:**
  - Label: "FIND OUT IF YOU'RE A" (small uppercase)
  - H3: "CANDIDATE FOR DENTAL IMPLANTS"
  - Subtitle: "Take this 30-second quiz"
  - Bold: "What best describes your current condition?"
  - Radio options: "I have all of my teeth", "I'm missing one tooth", "I'm missing multiple teeth", "I'm missing all of my teeth"
  - Teal "Next →" button at bottom right
- **Center:** Book cover image ("The Complete Handbook on Dental Implants")
- **Right column — Guide CTA card:**
  - "WANT TO LEARN MORE ABOUT DENTAL IMPLANTS?"
  - "Download the FREE Pricing & Information Guide"
  - Outlined teal button: "GET THE FREE GUIDE"
- **File:** `components/sections/QuizAndGuideSection.tsx`

### 4. `IntroducingDreamSmile`
- **White background**
- **Centered text:** "Introducing The **DreamSmile**" (DreamSmile in script/brand font) + "by Jeffrey S. Burns DDS"
- **Photo grid:** 4 portrait photos in rounded-rectangle frames showing smiling patients — use placeholders
- **File:** `components/sections/IntroducingDreamSmile.tsx`

### 5. `DreamSmileIsSection`
- **Centered heading:** "The DreamSmile is..."
- **Body:** "A healthy, beautiful, natural functioning and looking smile using dental implants."
- **Styled line:** "Say goodbye to ~~hiding your mouth~~ and say **hello to...**" (strikethrough in coral)
- **Alternating benefit rows (zigzag layout):**
  - Row 1: Image left → "...getting out of pain" (text right, teal underline bar)
  - Row 2: "...eating the foods that you love" (text left, teal bar) → Image right
  - Row 3: Image left → "...speaking naturally"
  - Row 4: "...confidently smiling again" (text left) → Image right
- **Each row has a teal accent bar** behind/below the text
- **File:** `components/sections/DreamSmileIsSection.tsx`

### 6. `CanYouSeeYourselfSection`
- **Heading:** "Can You See Yourself with Your DreamSmile?"
- **Note:** This is a transition heading leading into the next section
- **File:** Can be combined with section above or standalone

### 7. `ExpertiseSection`
- **Light gray background**
- **H2:** "Nationally Recognized Expertise you can Trust" (Playfair Display, italic)
- **Teal pill badge:** "AS SEEN ON TV"
- **Video thumbnail/embed:** Showcase TV segment with overlay
- **Doctor info below:**
  - "Dr. Jeffrey S. Burns, DDS"
  - "Changing lives, one **DreamSmile** at a time"
- **Google rating bar:** G icon + "5.0" + 5 gold stars + "Read our reviews"
- **Stats row (3 columns):**
  - "30+ Years" / "Trusted Experience" + calendar icon
  - "AACD Award" / "Cosmetic Excellence" + award icon
  - "100+ Smiles" / "Transformed Lives" + smile icon
- **File:** `components/sections/ExpertiseSection.tsx`

### 8. `PrimaryServicesSection`
- **White background**
- **H2:** "Our Primary Services"
- **3-card grid:**
  - **Dental Implants** — image, bold title, description, teal CTA: "GET YOUR DREAMSMILE"
  - **General Dentistry** — image, bold title, description, teal CTA: "CHOOSE YOUR SERVICE"
  - **Cosmetic Dentistry** — image, bold title, description, teal CTA: "LEARN MORE"
- **Card style:** No outer border, image on top with rounded corners, clean text below
- **File:** `components/sections/PrimaryServicesSection.tsx`

### 9. `ComparisonSection`
- **Light gray background**
- **Small label:** "SEE THE DIFFERENCE" (teal, uppercase)
- **H2:** "The **DreamSmile** vs. Dental Chains"
- **Subtitle:** *Not all dental implant smiles are created equal.*
- **Two-column comparison table:**
  - **Left (DreamSmile):** White card, slight shadow/elevation, "RECOMMENDED" teal badge
    - Title: "The DreamSmile" / "THE DR. BURNS EXPERIENCE"
    - 6 rows with teal checkmark icons:
      1. Dr. Burns Personally Handles Every Case
      2. On-Staff Anesthesiologist
      3. The Burns Protocol
      4. Dr. Burns's Personal Cell Phone
      5. Turnkey Pricing + Lifetime Warranty
      6. One-Stop Shop
    - Each row has bold title + smaller description
  - **Right (Dental Chains):** Flat/muted card
    - Title: "National Dental Chains" / "THE TRADITIONAL EXPERIENCE"
    - 6 matching rows with red X icons:
      1. Rotating Providers
      2. CRNA Sedation
      3. Cookie-Cutter Protocols
      4. Call Center Support
      5. Hidden Fees & Upsells
      6. Multiple Locations Required
  - **"VS" divider** between the two columns (centered vertically)
- **Bottom CTA:** Full-width teal button → "SEE IF YOU'RE ELIGIBLE FOR DENTAL IMPLANTS"
- **File:** `components/sections/ComparisonSection.tsx`

### 10. `BurnsProtocolSection`
- **Dark charcoal/slate background (#3A3A3A) — full bleed**
- **Small label:** "YOUR JOURNEY" (teal, uppercase)
- **H2:** "The Burns Protocol" (white, Playfair Display)
- **Description:** Brief paragraph about the proprietary 6-step process
- **Pill badge:** "NATIONALLY RECOGNIZED PROTOCOL"
- **Left column:** Photo of Dr. Burns in surgical loupes
- **Right column — 6-step numbered timeline:**
  1. DreamSmile Assessment
  2. DreamSmile Design Day
  3. DreamSmile Creation Day
  4. DreamSmile Refinement
  5. DreamSmile Reveal
  6. Lifetime Care & Maintenance
  - Each step: teal circled number, bold title, description paragraph
  - Optional "SCHEDULE YOUR FREE ASSESSMENT →" link per step
- **File:** `components/sections/BurnsProtocolSection.tsx`

### 11. `WarrantySection`
- **Background:** Blurred/lightened photo of dental office
- **H2:** "The DreamSmile Warranty"
- **Subtitle:** "Every Dream Smile is backed by our exclusive warranty."
- **3-tier pricing-style cards:**
  - **Silver:** Implants 5 Years / Teeth 2 Years
  - **Platinum (center, elevated, "RECOMMENDED" badge):** Implants 5 Years / Teeth Lifetime — dark teal card
  - **Gold:** Implants 5 Years / Teeth 5 Years
- **Bottom CTA:** Teal pill → "SCHEDULE FREE DREAMSMILE ASSESSMENT"
- **File:** `components/sections/WarrantySection.tsx`

### 12. `PatientPromiseSection`
- **Dark charcoal background with photo overlay (smiling woman)**
- **H2:** "The Patient Promise" (white)
- **5 promise items with teal checkmarks:**
  - "We promise to always put you and your healthcare first"
  - "We promise you'll never feel like a number here"
  - "We promise to provide you with nationally recognized, premium dental care"
  - "We promise that everything we do is based on your safety, comfort, and outcome"
  - "We promise to provide you with a world-class beautiful smile"
- **File:** `components/sections/PatientPromiseSection.tsx`

### 13. `FrustrationsSection`
- **Light background**
- **Small label:** "SOUND FAMILIAR?" (teal)
- **H2:** "You Deserve Better Than Another Band-Aid Solution"
- **Subtitle:** "If you're reading this, you've probably experienced one or more of these frustrations."
- **6-card grid (3×2):** Each card has an icon + bold title + description
  1. 🦷 Dentures That Slip
  2. 🦷 Missing Teeth
  3. 🌉 Bridges That Fail
  4. 🔗 Dental Chains
  5. 😨 Fear of Being Awake
  6. 💲 Hidden Fees
- **Cards:** White with subtle border, icon top-left
- **Bottom CTA:** Teal pill → "SCHEDULE FREE DREAM SMILE ASSESSMENT"
- **File:** `components/sections/FrustrationsSection.tsx`

### 14. `TestimonialsSection`
- **White background**
- **H2:** "Real Results. Real Patients." (Playfair Display)
- **Subtitle:** "Real results from real patients who trusted Dr. Burns with their DreamSmile."
- **3-column grid:** Patient photo (square/rounded), 5 gold stars, name, position/occupation
- **Bottom CTA:** Teal outlined pill → "FIND OUT IF YOU'RE A CANDIDATE FOR DENTAL IMPLANTS"
- **File:** `components/sections/TestimonialsSection.tsx`

### 15. `AboutDrBurnsSection`
- **Soft teal/gray background**
- **Small label:** "MEET THE SPECIALIST"
- **H2:** "Dr. Jeffrey S. Burns"
- **Two columns:**
  - **Left:** Bio text (nationally recognized leader, 30+ years, Burns Protocol creator, taught dentists nationwide, gives personal cell phone)
  - **Right:** Photo of Dr. Burns (casual/approachable)
- **Credential badges row:** "Nationally Recognized" / "Top Free Cosmetic Fellowship" / "AACD Award Recipient" / "Published Author" — teal/outlined pill badges
- **Testimonial quote block:** Large teal quote marks, italic text, patient name attribution
- **File:** `components/sections/AboutDrBurnsSection.tsx`

### 16. `FooterSection`
- **Dark background**
- **Logo, contact info, navigation links, social links**
- **Copyright**
- **File:** `components/Footer.tsx`

---

## Project Structure

```
├── app/
│   ├── layout.tsx              # Root layout with fonts, metadata
│   ├── page.tsx                # Main landing page (assembles all sections)
│   └── globals.css             # Tailwind directives + CSS custom properties
├── components/
│   ├── Navbar.tsx
│   ├── Footer.tsx
│   ├── ui/
│   │   ├── Button.tsx          # Reusable pill button (solid/outlined variants)
│   │   ├── SectionLabel.tsx    # Small uppercase teal label ("SEE THE DIFFERENCE")
│   │   ├── CheckItem.tsx       # Teal checkmark + text row
│   │   ├── StatCard.tsx        # Icon + number + subtitle stat block
│   │   └── ServiceCard.tsx     # Image + title + text + CTA card
│   └── sections/
│       ├── HeroSection.tsx
│       ├── QuizAndGuideSection.tsx
│       ├── IntroducingDreamSmile.tsx
│       ├── DreamSmileIsSection.tsx
│       ├── ExpertiseSection.tsx
│       ├── PrimaryServicesSection.tsx
│       ├── ComparisonSection.tsx
│       ├── BurnsProtocolSection.tsx
│       ├── WarrantySection.tsx
│       ├── PatientPromiseSection.tsx
│       ├── FrustrationsSection.tsx
│       ├── TestimonialsSection.tsx
│       └── AboutDrBurnsSection.tsx
├── public/
│   ├── images/
│   │   ├── hero-bg.jpg
│   │   ├── dr-burns-portrait.jpg
│   │   ├── dr-burns-surgical.jpg
│   │   ├── dreamsmile-logo.svg
│   │   ├── book-cover.png
│   │   ├── patients/           # Patient smile photos (placeholders)
│   │   ├── services/           # Service category images
│   │   └── icons/              # Custom SVG icons if needed
│   └── fonts/                  # Any local fonts
├── lib/
│   └── constants.ts            # Site-wide text content, phone numbers, links
├── tailwind.config.ts
├── next.config.js
└── package.json
```

---

## Tailwind Config Extensions

```ts
// tailwind.config.ts
import type { Config } from "tailwindcss";

const config: Config = {
  content: [
    "./app/**/*.{ts,tsx}",
    "./components/**/*.{ts,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        teal: {
          DEFAULT: "#7FB5B0",
          dark: "#5A9A93",
          light: "#A8D5D0",
        },
        charcoal: "#3A3A3A",
        "dark-slate": "#4A4A4A",
        "warm-gray": "#6B6B6B",
        coral: "#E88B7A",
        "off-white": "#FAFAF8",
      },
      fontFamily: {
        display: ["var(--font-playfair)", "serif"],
        body: ["var(--font-montserrat)", "sans-serif"],
        script: ["var(--font-dancing-script)", "cursive"],
      },
      maxWidth: {
        content: "1200px",
      },
      borderRadius: {
        pill: "9999px",
      },
    },
  },
  plugins: [],
};

export default config;
```

---

## Font Setup (app/layout.tsx)

```tsx
import { Playfair_Display, Montserrat, Dancing_Script } from "next/font/google";

const playfair = Playfair_Display({
  subsets: ["latin"],
  variable: "--font-playfair",
  display: "swap",
});

const montserrat = Montserrat({
  subsets: ["latin"],
  variable: "--font-montserrat",
  display: "swap",
});

const dancingScript = Dancing_Script({
  subsets: ["latin"],
  variable: "--font-dancing-script",
  display: "swap",
});
```

---

## Key Component Patterns

### Button Component

Two variants used throughout the site:
- **Solid:** `bg-teal text-white` with rounded-full, uppercase, tracking-wider
- **Outlined:** `border-2 border-teal text-teal` with rounded-full, hover fills teal

### Section Backgrounds

Sections alternate between:
1. **White / Off-white** — most content sections
2. **Light gray (#F5F5F3)** — quiz, comparison, expertise
3. **Dark charcoal (#3A3A3A)** — hero, Burns Protocol, Patient Promise (white text)
4. **Photo overlay with dark scrim** — hero, warranty (blurred bg image)

### Animations (Framer Motion)

- **Scroll reveal:** Sections fade up on viewport entry (`whileInView`)
- **Stagger children:** Card grids animate in sequence
- **Hero text:** Slide in from left with delay cascade
- **Stats counter:** Count-up animation on scroll
- **Comparison cards:** Subtle scale on hover

---

## Image & Asset Strategy

Use `next/image` for all raster images. Export from Figma at **2x** for retina. Prefer **WebP** for photos (with JPG fallback) and **SVG** for logos/icons. All assets go in `public/images/` organized by subfolder.

Configure `next.config.js`:
```js
images: {
  formats: ["image/webp"],
}
```

Until real assets are exported, use placeholder `<div>` blocks with matching aspect ratios and background colors so layouts stay accurate.

---

### Complete Asset Checklist

Export every asset below from Figma. Select the layer → right panel "Export" → add export setting → choose format/scale → export.

#### Logos & Branding — `public/images/logos/`

| Filename | Source Section | Format | Export Notes |
|---|---|---|---|
| `jburns-logo.svg` | Navbar (top-left) | SVG | The "j burns" wordmark with "Jeffrey S. Burns D.D.S." subtitle. Export the entire logo group as one SVG. |
| `jburns-logo-white.svg` | Navbar | SVG | White variant for use on dark backgrounds (hero, dark sections). |
| `dreamsmile-wordmark.svg` | "Introducing The DreamSmile" heading | SVG | The stylized script "DreamSmile" text with "by Jeffrey S. Burns DDS" below. |
| `dreamsmile-watermark.svg` | Hero (bottom-right corner) | SVG or PNG @2x | The semi-transparent DreamSmile script logo overlaid on the hero. Export with transparency. |
| `google-g-icon.svg` | Expertise section (Google rating) | SVG | The colored Google "G" icon next to the 5.0 rating. |

#### Hero Section — `public/images/hero/`

| Filename | Source Section | Dimensions (approx) | Format | Export Notes |
|---|---|---|---|---|
| `hero-bg.webp` | Hero background | 1920×900 @2x | WebP + JPG fallback | Full photo of Dr. Burns with patient. Export the background image layer only (no text overlays). Use a dark gradient overlay in CSS. |

#### Patient Photos — `public/images/patients/`

| Filename | Source Section | Dimensions | Format | Export Notes |
|---|---|---|---|---|
| `smile-grid-1.webp` | "Introducing The DreamSmile" — leftmost photo | 300×400 @2x | WebP | Woman touching face, smiling. Crop to portrait ratio. |
| `smile-grid-2.webp` | "Introducing The DreamSmile" — second photo | 300×400 @2x | WebP | Young man, bright smile. |
| `smile-grid-3.webp` | "Introducing The DreamSmile" — third photo | 300×400 @2x | WebP | Couple smiling together. |
| `smile-grid-4.webp` | "Introducing The DreamSmile" — rightmost photo | 300×400 @2x | WebP | Older man, confident smile. |
| `testimonial-1.webp` | Testimonials — left patient | 400×400 @2x | WebP | Square crop, patient headshot. |
| `testimonial-2.webp` | Testimonials — center patient | 400×400 @2x | WebP | Square crop, patient headshot. |
| `testimonial-3.webp` | Testimonials — right patient | 400×400 @2x | WebP | Square crop, patient headshot. |

#### Benefit / Zigzag Images — `public/images/benefits/`

| Filename | Source Section | Dimensions | Format | Export Notes |
|---|---|---|---|---|
| `benefit-pain.webp` | "...getting out of pain" — image left | 500×350 @2x | WebP | Woman with jaw/tooth pain expression. Rounded corners applied in CSS, not in export. |
| `benefit-eating.webp` | "...eating the foods that you love" — image right | 500×350 @2x | WebP | Person eating / food image. |
| `benefit-speaking.webp` | "...speaking naturally" — image left | 500×350 @2x | WebP | Group of people talking/laughing. |
| `benefit-smiling.webp` | "...confidently smiling again" — image right | 500×350 @2x | WebP | Older couple smiling confidently. |

#### Dr. Burns Photos — `public/images/dr-burns/`

| Filename | Source Section | Dimensions | Format | Export Notes |
|---|---|---|---|---|
| `dr-burns-surgical.webp` | Burns Protocol section (left column) | 600×800 @2x | WebP | Dr. Burns wearing surgical loupes and mask, dark background. |
| `dr-burns-casual.webp` | About Dr. Burns section | 500×600 @2x | WebP | Dr. Burns in casual/approachable pose (wearing cap, friendly expression). |
| `dr-burns-tv.webp` | Expertise section — TV segment thumbnail | 700×400 @2x | WebP | The "Showcase" TV segment frame. If this is a video, export a thumbnail still. |

#### Service Images — `public/images/services/`

| Filename | Source Section | Dimensions | Format | Export Notes |
|---|---|---|---|---|
| `service-implants.webp` | "Our Primary Services" — Dental Implants card | 600×400 @2x | WebP | Dental implant procedure / surgical image with teal-tinted lighting. |
| `service-general.webp` | "Our Primary Services" — General Dentistry card | 600×400 @2x | WebP | General dental procedure photo. |
| `service-cosmetic.webp` | "Our Primary Services" — Cosmetic Dentistry card | 600×400 @2x | WebP | Cosmetic dental work / tooth model close-up. |

#### Book & Guide — `public/images/guide/`

| Filename | Source Section | Dimensions | Format | Export Notes |
|---|---|---|---|---|
| `book-cover.webp` | Quiz section — center column | 350×500 @2x | WebP or PNG | "The Complete Handbook on Dental Implants" book cover. Export with any drop shadow removed (add in CSS). |

#### Background / Overlay Images — `public/images/backgrounds/`

| Filename | Source Section | Dimensions | Format | Export Notes |
|---|---|---|---|---|
| `patient-promise-bg.webp` | Patient Promise section | 1920×600 @2x | WebP | Close-up of smiling woman. Will be darkened with CSS overlay. Export the raw photo without any text/overlay. |
| `warranty-bg.webp` | Warranty section | 1920×600 @2x | WebP | Dental office scene (Dr. with patient, blurred). Export without text/cards. Apply blur + light overlay in CSS. |

#### Icons — `public/images/icons/`

Export all icons as **SVG**. Select just the icon shape in Figma, not the surrounding card or circle.

| Filename | Source Section | Format | Description |
|---|---|---|---|
| `check-circle.svg` | Used throughout (comparison, promises, hero) | SVG | Teal filled circle with white checkmark. |
| `x-circle.svg` | Comparison table — Dental Chains column | SVG | Muted red filled circle with white X. |
| `icon-calendar.svg` | Stats row — "30+ Years" | SVG | Calendar/experience icon below the stat. |
| `icon-award.svg` | Stats row — "AACD Award" | SVG | Award/medal icon below the stat. |
| `icon-smile.svg` | Stats row — "100+ Smiles" | SVG | Smile/teeth icon below the stat. |
| `icon-denture.svg` | Frustrations — "Dentures That Slip" | SVG | Denture icon (top-left of card). |
| `icon-tooth.svg` | Frustrations — "Missing Teeth" | SVG | Tooth icon. |
| `icon-bridge.svg` | Frustrations — "Bridges That Fail" | SVG | Bridge icon. |
| `icon-chain.svg` | Frustrations — "Dental Chains" | SVG | Chain link icon. |
| `icon-eye.svg` | Frustrations — "Fear of Being Awake" | SVG | Eye / awake icon. |
| `icon-dollar.svg` | Frustrations — "Hidden Fees" | SVG | Dollar sign icon. |
| `star-filled.svg` | Google rating + testimonials | SVG | Gold filled star for ratings. |
| `quote-mark.svg` | About Dr. Burns — testimonial quote | SVG | Large teal opening quotation mark. |

---

### Figma Export Quick Guide

**For photos (WebP/JPG):**
1. Select the image layer (not the frame around it)
2. Bottom-right panel → "Export"
3. Click "+" to add export
4. Set scale to **2x**, format to **PNG** (convert to WebP during build or manually)
5. Hit "Export [layer name]"

**For SVGs (logos/icons):**
1. Select the vector/group layer
2. Export panel → format **SVG**
3. Keep "Include 'id' attribute" unchecked for cleaner SVGs
4. Export

**For background photos:**
1. Hide all text/overlay layers above the photo
2. Select just the photo layer
3. Export at **2x** as PNG
4. Convert to WebP using any converter or let Next.js handle it via the `formats` config

**Batch export tip:** Select multiple layers → all appear in the export panel → export all at once.

---

### Placeholder Strategy (Before Real Assets)

Until Figma assets are exported, use these placeholder patterns in components so the layout is pixel-accurate:

```tsx
{/* Photo placeholder */}
<div
  className="bg-slate-200 rounded-lg flex items-center justify-center text-slate-400 text-sm"
  style={{ aspectRatio: "3/4" }}
>
  Patient Photo
</div>

{/* Background placeholder */}
<div className="bg-gradient-to-r from-charcoal to-charcoal/80 absolute inset-0" />

{/* Icon placeholder */}
<div className="w-10 h-10 rounded-full bg-teal/20 flex items-center justify-center">
  <span className="text-teal text-lg">✓</span>
</div>
```

Once assets are ready, swap in `<Image>` components:
```tsx
import Image from "next/image";

<Image
  src="/images/patients/smile-grid-1.webp"
  alt="Smiling patient after DreamSmile dental implant procedure"
  width={300}
  height={400}
  className="rounded-lg object-cover"
  placeholder="blur"
  blurDataURL="data:image/jpeg;base64,/9j/4AAQ..."
/>
```

---

## Content Constants (lib/constants.ts)

Centralize all copy in a single constants file so content can be updated without touching components. Include:
- `PHONE_NUMBER`
- `heroContent` (headline, bullet points)
- `quizOptions`
- `dreamSmileBenefits` (array of { text, imagePosition })
- `stats` (30+ Years, AACD Award, 100+ Smiles)
- `services` (3 service cards)
- `comparisonData` (dreamSmile vs chains rows)
- `burnsProtocolSteps` (6 steps with titles and descriptions)
- `warrantyTiers` (silver, platinum, gold)
- `patientPromises` (5 items)
- `frustrations` (6 cards)
- `testimonials` (3 patients)
- `drBurnsBio`

---

## Responsive Breakpoints

- **Mobile (< 768px):** Single column, stacked layouts, hamburger nav
- **Tablet (768px–1024px):** 2-column grids where applicable
- **Desktop (1024px+):** Full layouts as designed

Key responsive adjustments:
- Hero: Full-width image bg, text overlaid with bottom padding
- Quiz section: Stack vertically on mobile
- Comparison: Stack cards vertically with "VS" as horizontal divider
- Burns Protocol: Timeline goes single-column, image hidden or above
- Services/Frustrations: 1-col mobile → 2-col tablet → 3-col desktop
- Warranty cards: Horizontal scroll or stacked on mobile

---

## Accessibility Notes

- All images require meaningful `alt` text
- CTA buttons should have `aria-label` when text is icon-only
- Color contrast: Ensure teal on white meets WCAG AA (darken if needed)
- Quiz radio inputs: Use proper `<label>` and `<fieldset>`
- Skip-to-content link at top of page
- Focus-visible outlines on interactive elements

---

## Development Priorities

1. **Phase 1:** Navbar + Hero + Quiz/Guide + Footer (core above-the-fold)
2. **Phase 2:** IntroducingDreamSmile + DreamSmileIs + Expertise + Services
3. **Phase 3:** Comparison + Burns Protocol + Warranty
4. **Phase 4:** Patient Promise + Frustrations + Testimonials + About Dr. Burns
5. **Phase 5:** Animations, responsive polish, image replacement, SEO metadata
