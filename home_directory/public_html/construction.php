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
                    <img src="<?php echo htmlspecialchars($src, ENT_QUOTES, 'UTF-8'); ?>" alt="Construction progress, photo <?php echo (int) ($idx + 1); ?>" loading="<?php echo $idx < 3 ? 'eager' : 'lazy'; ?>" decoding="async">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <section class="page-section construction-updates-section" aria-label="Gans Baai under construction updates">
        <h2 class="construction-updates-heading">Gans Baai Under construction</h2>
        <div class="construction-updates-row construction-updates-row--two">
            <figure class="construction-updates-card">
                <img src="/assets/img/construction/Gans_Baai_under_construction_1.avif" alt="Gans Baai under construction 1" loading="lazy" decoding="async">
            </figure>
            <figure class="construction-updates-card">
                <img src="/assets/img/construction/Gans_Baai_under_construction_2.avif" alt="Gans Baai under construction 2" loading="lazy" decoding="async">
            </figure>
        </div>
    </section>

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
        <div class="construction-updates-row construction-updates-row--three">
            <figure class="construction-updates-card construction-updates-card--captioned">
                <img src="/assets/img/construction/Cottage_under_construction.avif" alt="Cottage under construction" loading="lazy" decoding="async">
                <figcaption>Cottage under construction</figcaption>
            </figure>
            <figure class="construction-updates-card construction-updates-card--captioned">
                <img src="/assets/img/construction/Pine_cladding_installation.avif" alt="Pine cladding installation" loading="lazy" decoding="async">
                <figcaption>Pine cladding installation</figcaption>
            </figure>
            <figure class="construction-updates-card construction-updates-card--captioned">
                <img src="/assets/img/construction/Poles_bearers_and_joist.avif" alt="Poles bearers and joist" loading="lazy" decoding="async">
                <figcaption>Poles bearers and joist</figcaption>
            </figure>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
