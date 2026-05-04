<?php

declare(strict_types=1);

/**
 * Gallery filesystem helpers for Logo Homes.
 *
 * Why this file exists: theme gallery pages (`gallery-exteriors.php`, etc.) and project pages (`project.php`)
 * discover images from disk under `public_html/assets/gallery/...` without a database.
 *
 * What is necessary:
 * - Path resolution + `..` rejection keeps requests from escaping `public_html`.
 * - Theme feature pages: `logohomes_theme_feature_images()` — `thumb/` only on the grid; lightbox uses
 *   matching `full/` filename when that file exists (otherwise the thumb URL).
 * - Project galleries: `logohomes_collect_gallery_images()` with optional `captions.json` and flexible layout.
 * - `logohomes_project_feature_thumb_web()` for project cards (e.g. projects listing).
 * - Award helpers are tiny display mappers used in PHP and in `data-*` attributes for JS.
 *
 * You could inline some of this into one template file, but keeping it here keeps templates
 * readable and behaviour consistent across themes / projects.
 */

/** @var string|null Cached absolute path to public_html */
$GLOBALS['_logohomes_public_root'] = null;

/** Absolute filesystem path to `public_html` (cached). Used to resolve gallery folders safely. */
function logohomes_public_root(): string
{
    if ($GLOBALS['_logohomes_public_root'] === null) {
        $root = realpath(__DIR__ . '/..');
        $GLOBALS['_logohomes_public_root'] = $root !== false ? $root : '';
    }

    return $GLOBALS['_logohomes_public_root'];
}

/** File extensions treated as gallery images when scanning folders. */
function logohomes_gallery_image_extensions(): array
{
    return ['avif', 'webp', 'jpg', 'jpeg', 'png'];
}

/** Turn a path relative to `public_html` into a site-root URL (always starts with `/`). */
function logohomes_web_path(string $relativeFromPublicHtml): string
{
    $relativeFromPublicHtml = str_replace('\\', '/', $relativeFromPublicHtml);
    $relativeFromPublicHtml = trim($relativeFromPublicHtml, '/');

    return '/' . $relativeFromPublicHtml;
}

/**
 * Optional per-folder captions: `captions.json` next to images maps `filename.ext` → caption text.
 * Used for lightbox / headings where filenames alone are not enough.
 *
 * @return array<string, string>|null
 */
function logohomes_load_captions_json(string $diskDir): ?array
{
    $path = $diskDir . '/captions.json';
    if (!is_readable($path)) {
        return null;
    }
    $raw = file_get_contents($path);
    if ($raw === false) {
        return null;
    }
    $data = json_decode($raw, true);
    if (!is_array($data)) {
        return null;
    }
    /** @var array<string, string> $out */
    $out = [];
    foreach ($data as $k => $v) {
        if (is_string($k) && is_string($v)) {
            $out[$k] = $v;
        }
    }

    return $out === [] ? null : $out;
}

/**
 * Derive a short human title from a filename: strip extension, leading `001-` style prefixes,
 * replace `-` / `_` with spaces, title-case. Used when no caption is provided.
 */
function logohomes_humanize_image_heading(string $filename): string
{
    $base = preg_replace('/\.[^.]+$/', '', $filename);
    if (!is_string($base)) {
        $base = $filename;
    }
    $base = preg_replace('/^\d+[\s_-]*/', '', $base);
    if (!is_string($base)) {
        $base = $filename;
    }
    $base = str_replace(['-', '_'], ' ', $base);
    $base = trim(preg_replace('/\s+/', ' ', $base) ?? '');

    return $base === '' ? $filename : ucwords($base);
}

/**
 * Theme feature mosaic label: strip any extension, replace "-" with spaces (filename as typed, not title case).
 */
function logohomes_theme_feature_tile_label(string $filename): string
{
    $base = preg_replace('/\.[^.]+$/', '', $filename);
    if (!is_string($base) || $base === '') {
        $base = $filename;
    }
    $label = str_replace('-', ' ', $base);
    $label = trim(preg_replace('/\s+/', ' ', $label) ?? '');

    return $label === '' ? $filename : $label;
}

/** List absolute image paths in one directory (non-recursive), sorted for stable gallery order. */
function logohomes_glob_images_in_dir(string $diskDir): array
{
    if ($diskDir === '' || !is_dir($diskDir)) {
        return [];
    }
    $exts = logohomes_gallery_image_extensions();
    $found = [];
    foreach ($exts as $ext) {
        foreach (glob($diskDir . '/*.' . $ext, GLOB_NOSORT) ?: [] as $f) {
            if (is_file($f)) {
                $found[] = $f;
            }
        }
    }
    usort($found, 'strnatcasecmp');

    return $found;
}

/**
 * Theme feature galleries (exteriors, interiors, finishes, during-construction): scan only `thumb/`.
 * Each tile shows the file basename; the lightbox opens `full/{basename}` when that file exists, else the thumb.
 *
 * @return list<array{filename: string, label: string, thumbWeb: string, fullWeb: string}>
 */
function logohomes_theme_feature_images(string $relativeDir): array
{
    $relativeDir = trim(str_replace('\\', '/', $relativeDir), '/');
    if (str_contains($relativeDir, '..')) {
        return [];
    }
    $root = logohomes_public_root();
    if ($root === '') {
        return [];
    }
    $baseDisk = $root . '/' . $relativeDir;
    $realBase = realpath($baseDisk);
    if ($realBase === false || !str_starts_with($realBase, $root)) {
        return [];
    }

    $thumbDisk = $realBase . '/thumb';
    $fullDisk = $realBase . '/full';
    if (!is_dir($thumbDisk)) {
        return [];
    }

    $thumbFiles = logohomes_glob_images_in_dir($thumbDisk);
    $out = [];
    foreach ($thumbFiles as $thumbPath) {
        $basename = basename($thumbPath);
        $relThumb = ltrim(str_replace('\\', '/', substr($thumbPath, strlen($root))), '/');
        $thumbWeb = logohomes_web_path($relThumb);

        $fullPath = $fullDisk . '/' . $basename;
        if (is_file($fullPath)) {
            $relFull = ltrim(str_replace('\\', '/', substr($fullPath, strlen($root))), '/');
            $fullWeb = logohomes_web_path($relFull);
        } else {
            $fullWeb = $thumbWeb;
        }

        $out[] = [
            'filename' => $basename,
            'label' => logohomes_theme_feature_tile_label($basename),
            'thumbWeb' => $thumbWeb,
            'fullWeb' => $fullWeb,
        ];
    }

    return $out;
}

/**
 * Build a list of images for a project gallery folder, relative to `public_html` (also supports flat folders).
 *
 * Layout rules:
 * - If `full/` exists: each file there is the “large” image; optional matching file in `thumb/`
 *   is used for grids/sliders. If no thumb, the full file is used for both URLs.
 * - Otherwise: all images in the folder root are used (same URL for thumb + full).
 * - Optional `captions.json` in that folder maps basename → caption string.
 *
 * @return list<array{fullWeb: string, thumbWeb: string, basename: string, heading: string, caption: string}>
 */
function logohomes_collect_gallery_images(string $relativeDir): array
{
    $relativeDir = trim(str_replace('\\', '/', $relativeDir), '/');
    if (str_contains($relativeDir, '..')) {
        return [];
    }
    $root = logohomes_public_root();
    if ($root === '') {
        return [];
    }
    $baseDisk = $root . '/' . $relativeDir;
    $realBase = realpath($baseDisk);
    if ($realBase === false || !str_starts_with($realBase, $root)) {
        return [];
    }

    $captions = logohomes_load_captions_json($realBase);

    $fullDisk = $realBase . '/full';
    $thumbDisk = $realBase . '/thumb';
    $hasFull = is_dir($fullDisk);
    $hasThumb = is_dir($thumbDisk);

    $out = [];

    if ($hasFull) {
        $fullFiles = logohomes_glob_images_in_dir($fullDisk);
        foreach ($fullFiles as $fullPath) {
            $basename = basename($fullPath);
            $thumbPath = $hasThumb && is_file($thumbDisk . '/' . $basename)
                ? $thumbDisk . '/' . $basename
                : $fullPath;
            $relFull = ltrim(str_replace('\\', '/', substr($fullPath, strlen($root))), '/');
            $relThumb = ltrim(str_replace('\\', '/', substr($thumbPath, strlen($root))), '/');
            $cap = $captions[$basename] ?? '';
            $out[] = [
                'fullWeb' => logohomes_web_path($relFull),
                'thumbWeb' => logohomes_web_path($relThumb),
                'basename' => $basename,
                'heading' => logohomes_humanize_image_heading($basename),
                'caption' => $cap,
            ];
        }
    } else {
        foreach (logohomes_glob_images_in_dir($realBase) as $filePath) {
            $basename = basename($filePath);
            if ($basename === 'captions.json') {
                continue;
            }
            $rel = ltrim(str_replace('\\', '/', substr($filePath, strlen($root))), '/');
            $cap = $captions[$basename] ?? '';
            $web = logohomes_web_path($rel);
            $out[] = [
                'fullWeb' => $web,
                'thumbWeb' => $web,
                'basename' => $basename,
                'heading' => logohomes_humanize_image_heading($basename),
                'caption' => $cap,
            ];
        }
    }

    return $out;
}

/** First thumbnail (or full) URL for a project slug — used on project listings (e.g. projects page). */
function logohomes_project_feature_thumb_web(string $slug): ?string
{
    $images = logohomes_collect_gallery_images('assets/gallery/projects/' . $slug);

    return $images[0]['thumbWeb'] ?? null;
}

/**
 * Homepage "Latest Awards" strip: up to two images under `assets/img/awards/`.
 * Overlay copy matches theme mosaic tiles: basename without extension, `-` → spaces
 * (`logohomes_theme_feature_tile_label()`).
 *
 * @return list<array{src: string, label: string}>
 */
function logohomes_home_awards_folder_slides(): array
{
    $dir = logohomes_public_root() . '/assets/img/awards';
    if ($dir === '' || !is_dir($dir)) {
        return [];
    }

    $extOk = array_flip(logohomes_gallery_image_extensions());
    $names = [];
    foreach (scandir($dir) ?: [] as $name) {
        if ($name === '.' || $name === '..') {
            continue;
        }
        $path = $dir . '/' . $name;
        if (!is_file($path)) {
            continue;
        }
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        if (!isset($extOk[$ext])) {
            continue;
        }
        $names[] = $name;
    }

    sort($names, SORT_NATURAL | SORT_FLAG_CASE);

    $out = [];
    foreach (array_slice($names, 0, 2) as $name) {
        $out[] = [
            'src' => logohomes_web_path('assets/img/awards/' . $name),
            'label' => logohomes_theme_feature_tile_label($name),
        ];
    }

    return $out;
}

/** Resolve `{relativeDir}/{stem}.{ext}` for the first gallery extension that exists on disk. */
function logohomes_image_web_by_stem(string $relativeDir, string $stem): ?string
{
    $root = logohomes_public_root();
    if ($root === '') {
        return null;
    }
    $relativeDir = trim(str_replace('\\', '/', $relativeDir), '/');
    if (str_contains($relativeDir, '..')) {
        return null;
    }
    foreach (logohomes_gallery_image_extensions() as $ext) {
        $rel = $relativeDir . '/' . $stem . '.' . $ext;
        if (is_file($root . '/' . $rel)) {
            return logohomes_web_path($rel);
        }
    }

    return null;
}

/**
 * Construction page progress slider: `construction_progress_1` … `_5` under `assets/img/construction`.
 *
 * @return list<string> Web URLs in numeric order (missing indices skipped).
 */
function logohomes_construction_progress_slide_urls(): array
{
    if (logohomes_public_root() === '') {
        return [];
    }
    $out = [];
    for ($i = 1; $i <= 5; $i++) {
        $url = logohomes_image_web_by_stem('assets/img/construction', 'construction_progress_' . $i);
        if ($url !== null) {
            $out[] = $url;
        }
    }

    return $out;
}

/** First image in `assets/img/finishes` (flat folder), natural sort — used on the Finishes marketing page. */
function logohomes_finishes_marketing_feature_web(): ?string
{
    $dir = logohomes_public_root() . '/assets/img/finishes';
    if ($dir === '' || !is_dir($dir)) {
        return null;
    }
    $extOk = array_flip(logohomes_gallery_image_extensions());
    $names = [];
    foreach (scandir($dir) ?: [] as $name) {
        if ($name === '.' || $name === '..') {
            continue;
        }
        $path = $dir . '/' . $name;
        if (!is_file($path)) {
            continue;
        }
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        if (!isset($extOk[$ext])) {
            continue;
        }
        $names[] = $name;
    }
    if ($names === []) {
        return null;
    }
    sort($names, SORT_NATURAL | SORT_FLAG_CASE);

    return logohomes_web_path('assets/img/finishes/' . $names[0]);
}

/** Short award word for meta / lists: Gold, Silver, Bronze. */
function logohomes_award_label(string $key): string
{
    return match ($key) {
        'gold' => 'Gold',
        'silver' => 'Silver',
        'bronze' => 'Bronze',
        default => '',
    };
}

/** Phrase for hero lines: Gold award, Silver award, Bronze award. */
function logohomes_award_display_phrase(string $key): string
{
    return match ($key) {
        'gold' => 'Gold award',
        'silver' => 'Silver award',
        'bronze' => 'Bronze award',
        default => '',
    };
}
