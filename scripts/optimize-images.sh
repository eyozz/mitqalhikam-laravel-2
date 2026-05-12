#!/usr/bin/env bash
set -euo pipefail

ROOT="${1:-public/images}"
OUT="public/images/optimized"
WIDTHS=(160 320 640 960 1280)
JPG_QUALITY=78
WEBP_QUALITY=78
AVIF_QUALITY=45

mkdir -p "$OUT"
TMPDIR=$(mktemp -d)
trap 'rm -rf "$TMPDIR"' EXIT

find "$ROOT" -type f \( -iname '*.jpg' -o -iname '*.jpeg' -o -iname '*.png' -o -iname '*.JPG' -o -iname '*.JPEG' \) ! -path '*/optimized/*' -print0 |
while IFS= read -r -d '' src; do
  rel="${src#public/}"
  hash=$(printf '%s' "$rel" | md5)
  dest="$OUT/$hash"
  mkdir -p "$dest"

  width=$(sips -g pixelWidth "$src" 2>/dev/null | awk '/pixelWidth/{print $2}')
  height=$(sips -g pixelHeight "$src" 2>/dev/null | awk '/pixelHeight/{print $2}')
  if [[ -z "${width:-}" || -z "${height:-}" ]]; then
    echo "skip unreadable $src"
    continue
  fi

  for target in "${WIDTHS[@]}"; do
    actual=$target
    if (( width < target )); then actual=$width; fi

    jpg="$dest/${actual}.jpg"
    webp="$dest/${actual}.webp"
    avif="$dest/${actual}.avif"

    if [[ ! -f "$jpg" ]]; then
      sips -s format jpeg -s formatOptions "$JPG_QUALITY" --resampleWidth "$actual" "$src" --out "$jpg" >/dev/null
    fi
    if [[ ! -f "$webp" ]]; then
      cwebp -quiet -q "$WEBP_QUALITY" "$jpg" -o "$webp"
    fi
    if [[ ! -f "$avif" ]]; then
      avifenc -q "$AVIF_QUALITY" -s 6 "$jpg" "$avif" >/dev/null
    fi

    if (( width < target )); then
      break
    fi
  done

  printf '%s %sx%s -> %s\n' "$rel" "$width" "$height" "$dest"
done
