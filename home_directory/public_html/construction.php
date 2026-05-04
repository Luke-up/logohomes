<?php
$pageTitle = 'Construction - Logo Homes';

require_once __DIR__ . '/includes/gallery-helpers.php';

$constructionSlides = logohomes_construction_progress_slide_urls();
?>
<?php include __DIR__ . '/includes/header.php'; ?>

<main class="content-page content-page--construction">
    <section class="page-hero">
        <h1>Construction</h1>
    </section>
    <section class="page-intro-lede page-section" aria-label="Introduction">
        <p>Timber frame shells coming together on site — structure, weatherproofing, and craftsmanship before the final layers of finishes.</p>
    </section>

    <?php if ($constructionSlides !== []) : ?>
    <section class="page-section construction-progress-section" aria-label="Construction progress">
        <h2 class="visually-hidden">Progress gallery</h2>
        <div class="construction-progress-slider">
            <?php foreach ($constructionSlides as $idx => $src) : ?>
            <div>
                <div class="construction-progress-slide">
                    <img src="<?php echo htmlspecialchars($src, ENT_QUOTES, 'UTF-8'); ?>" alt="Construction progress, photo <?php echo (int) ($idx + 1); ?>" loading="<?php echo $idx === 0 ? 'eager' : 'lazy'; ?>" decoding="async">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <section class="page-section construction-beams-section" aria-label="Structural timber detail">
        <div class="construction-beams-split">
            <div class="construction-beams-copy">
                <p>Post-and-beam timber framing carries loads cleanly through the structure; here you can see the skeleton mid-build and how those same members read once ceiling finishes are applied.</p>
            </div>
            <div class="construction-beams-figures">
                <figure class="construction-beams-figure">
                    <img src="/assets/img/construction/beams_construction.avif" alt="Timber beams during construction" width="250" height="350" loading="lazy" decoding="async">
                </figure>
                <figure class="construction-beams-figure">
                    <img src="/assets/img/construction/beams_finish.avif" alt="Timber beams finished" width="250" height="350" loading="lazy" decoding="async">
                </figure>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
