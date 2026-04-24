# DreamSmile — Shareable Preview Setup

This folder packages everything you need to publish a one-click Playground link your teammates can open in their browser to see your live work.

---

## What you'll end up with

A URL like:
```
https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/<your-user>/<your-repo>/main/preview/blueprint.json
```
Anyone who clicks gets a fresh WordPress in their browser, your theme installed and activated, the four pages (Home / Dental Implants / Locations / New Patients) created, and lands on the homepage.

---

## One-time setup (about 5 minutes)

### 1. Download the bundled theme zip from your Playground

Open this URL in the same browser tab where Playground is currently running:
```
https://playground.wordpress.net/scope:loyal-old-town/wp-content/uploads/dreamsmile-bundle/dreamsmile-child.zip
```
That downloads **`dreamsmile-child.zip`** (~43 MB for v2 — larger than v1 because it now bundles the 5 patient/lecture videos) — it contains the entire theme **including the location photos, hero images, and video clips that only live on the Playground**.

> If your Playground site slug isn't `loyal-old-town`, swap that part of the URL.

### 2. Create a public GitHub repo

```bash
# in your project root
gh repo create dreamsmile-preview --public --source=. --push
```
Or do it through the GitHub web UI — just make sure it's **public** (so Playground can fetch from it without auth).

### 3. Upload the theme zip as a Release asset

Releases give you a stable URL like `…/releases/latest/download/dreamsmile-child.zip` that auto-resolves to the newest version — easier to update later than committing the binary.

```bash
# from your project root, after downloading the zip from step 1
gh release create v1 ./dreamsmile-child.zip --title "v1 preview" --notes "Initial preview build"
```
Or in the web UI: **Releases → Draft a new release → Upload `dreamsmile-child.zip`**.

### 4. Edit `preview/blueprint.json`

Replace `REPLACE_USER/REPLACE_REPO` with your actual `username/repo`. So:
```
https://github.com/REPLACE_USER/REPLACE_REPO/releases/latest/download/dreamsmile-child.zip
```
becomes (e.g.):
```
https://github.com/franzsamilo/dreamsmile-preview/releases/latest/download/dreamsmile-child.zip
```

Commit + push:
```bash
git add preview/blueprint.json
git commit -m "preview: point blueprint at GitHub release"
git push
```

### 5. Build your shareable URL

```
https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/<your-user>/<your-repo>/main/preview/blueprint.json
```

Send that to teammates. First click takes ~30 seconds (downloads WordPress + theme); subsequent clicks are cached.

---

## Updating the preview later

When you change the theme:

1. Re-export from your Playground (the same `?storage=browser&site-slug=loyal-old-town` URL you use today, then run the export PHP again — see "Re-exporting" below).
2. Upload the new `dreamsmile-child.zip` to a new GitHub release: `gh release create v2 ./dreamsmile-child.zip`.
3. Teammates re-open the same shareable URL — Playground pulls the latest release automatically.

### Re-exporting from Playground

Run this in the Claude Code Playground tools (or via `/wp-admin/tools.php` if you wire up an export button):

```php
require('/wordpress/wp-load.php');
$theme = get_stylesheet_directory();
$out = WP_CONTENT_DIR . '/uploads/dreamsmile-bundle/dreamsmile-child.zip';
if (file_exists($out)) unlink($out);
wp_mkdir_p(dirname($out));
$zip = new ZipArchive(); $zip->open($out, ZipArchive::CREATE);
$base = strlen(dirname($theme)) + 1;
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($theme, RecursiveDirectoryIterator::SKIP_DOTS)) as $f) {
  if ($f->isFile()) $zip->addFile($f->getPathname(), substr($f->getPathname(), $base));
}
$zip->close();
echo 'Done: ' . filesize($out) . ' bytes';
```

Then re-download from `…/scope:loyal-old-town/wp-content/uploads/dreamsmile-bundle/dreamsmile-child.zip`.

---

## Troubleshooting

| Symptom | Fix |
|---|---|
| Teammates see a blank/empty WordPress | Check the GitHub release URL is publicly downloadable. Visit it in an incognito tab. |
| Pages 404 | Ensure permalinks are set in blueprint (already are). The `runPHP` step calls `flush_rewrite_rules()`. |
| Theme not active | Check `installTheme.options.activate` is `true` (it is). |
| Images broken | The zip must include `assets/arrange/` images — re-export if you forget some. Check `unzip -l dreamsmile-child.zip \| grep arrange` shows ~32 files. |
| Blueprint won't load | The blueprint URL must be HTTPS and the JSON must validate. Paste it into [Playground Blueprint Builder](https://playground.wordpress.net/builder/builder.html) to test. |
