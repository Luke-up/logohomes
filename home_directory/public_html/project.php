<?php
/**
 * Single project page template.
 * Routed from public_html/index.php when the path matches projects/{slug}.
 * Project copy and award metadata: includes/projects-data.php
 * Image discovery: includes/gallery-helpers.php
 */
require_once __DIR__ . '/includes/projects-data.php';
require_once __DIR__ . '/includes/gallery-helpers.php';

$slug = $projectSlug ?? '';
$project = logohomes_project_by_slug($slug);

if ($project === null) {
    include '404.php';
    return;
}

$assetRel = 'assets/gallery/projects/' . $project['slug'];
$galleryImages = logohomes_collect_gallery_images($assetRel);
$awardLabel = logohomes_award_label($project['award']);
$awardHero = logohomes_award_display_phrase($project['award']);
?>
<?php include __DIR__ . '/includes/header.php'; ?>

<main class="content-page content-page--gallery content-page--project">
    <section class="page-hero page-hero--project">
        <h1><?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <?php if ($awardHero !== '') : ?>
        <p class="page-hero-award"><?php echo htmlspecialchars($awardHero, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
    </section>

    <section class="page-section project-intro-row" aria-labelledby="project-intro-summary">
        <div class="project-intro-blurb">
            <h2 id="project-intro-summary" class="visually-hidden">Project summary</h2>
            <p><?php echo htmlspecialchars($project['summary_blurb'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <aside class="project-intro-facts" aria-label="Project details">
            <h2 class="visually-hidden">Facts</h2>
            <ul>
                <li><span>Location</span> <?php echo htmlspecialchars($project['location'], ENT_QUOTES, 'UTF-8'); ?></li>
                <li><span>Size</span> <?php echo htmlspecialchars($project['size_label'], ENT_QUOTES, 'UTF-8'); ?></li>
                <li><span>Bedrooms</span> <?php echo (int) $project['bedrooms']; ?></li>
                <li><span>Bathrooms</span> <?php echo (int) $project['bathrooms']; ?></li>
                <li><span>Award</span> <?php echo htmlspecialchars($awardLabel !== '' ? $awardLabel : '—', ENT_QUOTES, 'UTF-8'); ?></li>
            </ul>
        </aside>
    </section>

    <?php if ($galleryImages !== []) : ?>
    <section class="page-section project-gallery-section" aria-label="Project gallery">
        <div class="project-gallery-shell">
            <div class="project-gallery-slider">
                <?php foreach ($galleryImages as $img) :
                    $heading = $img['heading'];
                    $cap = $img['caption'] !== '' ? $img['caption'] : '';
                    if ($cap !== '' && $cap === $heading) {
                        $cap = '';
                    }
                    ?>
                <div class="project-gallery-slide">
                    <button
                        type="button"
                        class="project-gallery-slide-btn js-lightbox-trigger"
                        data-full-src="<?php echo htmlspecialchars($img['fullWeb'], ENT_QUOTES, 'UTF-8'); ?>"
                        data-caption="<?php echo htmlspecialchars($cap, ENT_QUOTES, 'UTF-8'); ?>"
                        data-heading="<?php echo htmlspecialchars($heading, ENT_QUOTES, 'UTF-8'); ?>"
                        aria-label="Open larger image: <?php echo htmlspecialchars($img['heading'], ENT_QUOTES, 'UTF-8'); ?>"
                    >
                        <img src="<?php echo htmlspecialchars($img['thumbWeb'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($img['heading'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                    </button>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="project-gallery-controls" role="group" aria-label="Gallery navigation">
                <button type="button" class="project-gallery-nav-btn project-gallery-nav-btn--prev" aria-label="Previous image">
                    <svg class="project-gallery-nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
                </button>
                <div class="project-gallery-dots-host"></div>
                <button type="button" class="project-gallery-nav-btn project-gallery-nav-btn--next" aria-label="Next image">
                    <svg class="project-gallery-nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
                </button>
            </div>
        </div>
    </section>
    <?php else : ?>
    <section class="page-section gallery-section-intro">
        <p>Add images under <code><?php echo htmlspecialchars($assetRel, ENT_QUOTES, 'UTF-8'); ?></code> (optionally <code>full/</code> and <code>thumb/</code> with matching filenames).</p>
    </section>
    <?php endif; ?>

    <section class="page-section">
        <p><a href="/awards">Awards</a> · <a href="/gallery-awards">Gallery</a></p>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
