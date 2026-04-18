<?php
require_once __DIR__ . '/../includes/projects-data.php';
require_once __DIR__ . '/../includes/gallery-helpers.php';

$projects = logohomes_projects();
$first = $projects[0] ?? null;
$firstAward = $first ? logohomes_award_display_phrase($first['award']) : '';
?>
<?php include '../includes/header.php'; ?>

<main class="content-page content-page--gallery content-page--gallery-hub">
    <section class="page-hero">
        <h1>Gallery &amp; Awards</h1>
    </section>

    <section class="page-section gallery-feature-section" aria-labelledby="gallery-feature-heading">
        <h2 id="gallery-feature-heading" class="visually-hidden">Featured projects</h2>
        <div class="gallery-feature-carousel">
            <div class="gallery-feature-slider">
                <?php foreach ($projects as $p) :
                    $thumb = logohomes_project_feature_thumb_web($p['slug']);
                    $awardPhrase = logohomes_award_display_phrase($p['award']);
                    ?>
                <div
                    class="gallery-feature-slide"
                    data-title="<?php echo htmlspecialchars($p['title'], ENT_QUOTES, 'UTF-8'); ?>"
                    data-size="<?php echo htmlspecialchars($p['size_label'], ENT_QUOTES, 'UTF-8'); ?>"
                    data-award="<?php echo htmlspecialchars($awardPhrase, ENT_QUOTES, 'UTF-8'); ?>"
                    data-location="<?php echo htmlspecialchars($p['location'], ENT_QUOTES, 'UTF-8'); ?>"
                    data-summary="<?php echo htmlspecialchars($p['one_line_summary'], ENT_QUOTES, 'UTF-8'); ?>"
                >
                    <a href="/projects/<?php echo htmlspecialchars($p['slug'], ENT_QUOTES, 'UTF-8'); ?>" class="gallery-feature-slide-link">
                        <span class="gallery-feature-slide-img-wrap">
                            <?php if ($thumb !== null) : ?>
                            <img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($p['title'], ENT_QUOTES, 'UTF-8'); ?>" width="900" height="600" loading="lazy" decoding="async">
                            <?php else : ?>
                            <span class="gallery-feature-slide-fallback" aria-hidden="true">
                                <span class="gallery-feature-slide-placeholder-label">Image coming soon</span>
                            </span>
                            <?php endif; ?>
                            <span class="gallery-feature-slide-shade" aria-hidden="true"></span>
                        </span>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="gallery-feature-meta" aria-live="polite">
            <?php if ($first !== null) : ?>
            <h3 class="gallery-feature-meta-title"><?php echo htmlspecialchars($first['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <dl class="gallery-feature-meta-dl">
                <div><dt>Size</dt><dd data-meta="size"><?php echo htmlspecialchars($first['size_label'], ENT_QUOTES, 'UTF-8'); ?></dd></div>
                <div><dt>Award</dt><dd data-meta="award"><?php echo htmlspecialchars($firstAward !== '' ? $firstAward : '—', ENT_QUOTES, 'UTF-8'); ?></dd></div>
                <div><dt>Location</dt><dd data-meta="location"><?php echo htmlspecialchars($first['location'], ENT_QUOTES, 'UTF-8'); ?></dd></div>
            </dl>
            <p class="gallery-feature-meta-summary" data-meta="summary"><?php echo htmlspecialchars($first['one_line_summary'], ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
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
