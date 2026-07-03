"""Build dreamsmile-child.zip with forward-slash separators for Playground."""
import os
import zipfile

THEME_DIR = "wp-content/themes/dreamsmile-child"
OUT = "dreamsmile-child.zip"
ROOT = "dreamsmile-child"


def main() -> None:
    files = []
    for root, _, names in os.walk(THEME_DIR):
        for n in names:
            files.append(os.path.join(root, n))
    files.sort()

    with zipfile.ZipFile(OUT, "w", zipfile.ZIP_DEFLATED, compresslevel=6) as z:
        for fp in files:
            rel = os.path.relpath(fp, THEME_DIR).replace(os.sep, "/")
            arc = f"{ROOT}/{rel}"
            z.write(fp, arc)

    size_mb = os.path.getsize(OUT) / 1024 / 1024
    print(f"wrote {OUT}: {len(files)} files, {size_mb:.1f} MB")

    with zipfile.ZipFile(OUT) as z:
        bs = [n for n in z.namelist() if "\\" in n]
        if bs:
            raise SystemExit(f"FAIL: {len(bs)} entries contain backslashes")
        print("verified: all entries use forward slashes")


if __name__ == "__main__":
    main()
