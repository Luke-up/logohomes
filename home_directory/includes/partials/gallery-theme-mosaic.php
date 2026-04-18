<?php

declare(strict_types=1);

/**
 * Theme feature gallery: thumbnails from `{theme}/thumb/`, lightbox from matching `{theme}/full/` file.
 * Expects $galleryAssetBase (e.g. assets/gallery/exteriors).
 * Optional: $galleryMosaicAriaLabel for the mosaic section aria-label.
 */

if (!isset($galleryAssetBase) || $galleryAssetBase === '') {
    return;
}

if (!function_exists('logohomes_theme_feature_images')) {
    require_once dirname(__DIR__) . '/gallery-helpers.php';
}

$sectionImages = logohomes_theme_feature_images($galleryAssetBase);
$mosaicAria = isset($galleryMosaicAriaLabel) && $galleryMosaicAriaLabel !== ''
    ? $galleryMosaicAriaLabel
    : 'Gallery images';

?>
    <?php if ($sectionImages !== []) : ?>
    <section class="page-section gallery-mosaic-section" aria-label="<?php echo htmlspecialchars($mosaicAria, ENT_QUOTES, 'UTF-8'); ?>">
        <div class="gallery-mosaic">
            <?php foreach ($sectionImages as $img) :
                $fn = $img['filename'];
                ?>
            <button
                type="button"
                class="gallery-mosaic-item js-lightbox-trigger"
                data-full-src="<?php echo htmlspecialchars($img['fullWeb'], ENT_QUOTES, 'UTF-8'); ?>"
                data-heading="<?php echo htmlspecialchars($fn, ENT_QUOTES, 'UTF-8'); ?>"
                aria-label="Open image: <?php echo htmlspecialchars($fn, ENT_QUOTES, 'UTF-8'); ?>"
            >
                <span class="gallery-mosaic-item-inner">
                    <img src="<?php echo htmlspecialchars($img['thumbWeb'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($fn, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                </span>
                <span class="gallery-mosaic-filename"><?php echo htmlspecialchars($fn, ENT_QUOTES, 'UTF-8'); ?></span>
            </button>
            <?php endforeach; ?>
        </div>
    </section>
    <?php else : ?>
    <section class="page-section gallery-section-intro">
        <p>Add thumbnail images under <code><?php echo htmlspecialchars($galleryAssetBase, ENT_QUOTES, 'UTF-8'); ?>/thumb/</code>. For the lightbox, place the larger file with the <strong>same filename</strong> under <code>full/</code> (optional — if missing, the thumb is shown).</p>
    </section>
    <?php endif; ?>
