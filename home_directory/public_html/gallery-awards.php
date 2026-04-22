<?php
require_once __DIR__ . '/../includes/projects-data.php';
require_once __DIR__ . '/../includes/gallery-helpers.php';

$projects = logohomes_projects_overview_records();
?>
<?php include '../includes/header.php'; ?>

<main class="content-page content-page--gallery content-page--gallery-hub">
    <section class="page-hero">
        <h1>Gallery</h1>
    </section>

    <section class="page-section gallery-awards-overview" aria-label="Awarded projects overview">
        <h2 class="visually-hidden">Awarded projects overview</h2>
        <div class="gallery-awards-overview-inner">
            <div class="gallery-awards-image-slider">
                <?php foreach ($projects as $project) :
                    $thumb = logohomes_project_feature_thumb_web($project['slug']);
                    ?>
                <div class="gallery-awards-image-slide">
                    <a href="/projects/<?php echo htmlspecialchars($project['slug'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?php if ($thumb !== null) : ?>
                        <img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                        <?php else : ?>
                        <span class="gallery-awards-image-placeholder" aria-hidden="true">
                            <span class="gallery-awards-image-placeholder-label">Image coming soon</span>
                        </span>
                        <?php endif; ?>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="gallery-awards-text-shell">
                <button type="button" class="gallery-awards-slider-nav-btn gallery-awards-slider-nav-btn--prev" aria-label="Previous project">&#8249;</button>
                <div class="gallery-awards-text-slider">
                    <?php foreach ($projects as $project) :
                        $awardLabel = logohomes_award_label($project['award']);
                        ?>
                    <div class="gallery-awards-text-slide">
                        <p class="gallery-awards-text-line">
                            <span class="gallery-awards-text-title"><?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="gallery-awards-text-item">Award: <?php echo htmlspecialchars($awardLabel !== '' ? $awardLabel : '—', ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="gallery-awards-text-item">Location: <?php echo htmlspecialchars($project['location'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="gallery-awards-text-item">Size: <?php echo htmlspecialchars($project['size_label'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" class="gallery-awards-slider-nav-btn gallery-awards-slider-nav-btn--next" aria-label="Next project">&#8250;</button>
            </div>
        </div>
    </section>

    <nav class="page-section gallery-theme-ctas" aria-label="Gallery themes">
        <ul class="gallery-theme-ctas-row">
            <li class="gallery-theme-ctas-item">
                <a class="gallery-theme-cta" href="/gallery/exteriors">
                    <span class="gallery-theme-cta-thumb">
                        <img src="/assets/img/gallery-awards-ctas/exteriors.avif" alt="" width="320" height="427" loading="lazy" decoding="async">
                    </span>
                    <span class="gallery-theme-cta-label">Exteriors</span>
                </a>
            </li>
            <li class="gallery-theme-ctas-item">
                <a class="gallery-theme-cta" href="/gallery/interiors">
                    <span class="gallery-theme-cta-thumb">
                        <img src="/assets/img/gallery-awards-ctas/interiors.avif" alt="" width="320" height="427" loading="lazy" decoding="async">
                    </span>
                    <span class="gallery-theme-cta-label">Interiors</span>
                </a>
            </li>
            <li class="gallery-theme-ctas-item">
                <a class="gallery-theme-cta" href="/gallery/finishes">
                    <span class="gallery-theme-cta-thumb">
                        <img src="/assets/img/gallery-awards-ctas/finishes.avif" alt="" width="320" height="427" loading="lazy" decoding="async">
                    </span>
                    <span class="gallery-theme-cta-label">Finishes</span>
                </a>
            </li>
            <li class="gallery-theme-ctas-item">
                <a class="gallery-theme-cta" href="/gallery/during-construction">
                    <span class="gallery-theme-cta-thumb">
                        <img src="/assets/img/gallery-awards-ctas/during-construction.avif" alt="" width="320" height="427" loading="lazy" decoding="async">
                    </span>
                    <span class="gallery-theme-cta-label">During construction</span>
                </a>
            </li>
        </ul>
    </nav>


</main>

<?php include '../includes/footer.php'; ?>
