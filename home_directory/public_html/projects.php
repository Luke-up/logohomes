<?php
$pageTitle = 'Projects - Logo Homes';

require_once __DIR__ . '/includes/projects-data.php';
require_once __DIR__ . '/includes/gallery-helpers.php';

$projects = logohomes_projects();
?>
<?php include __DIR__ . '/includes/header.php'; ?>

<main class="content-page content-page--gallery content-page--awards">
    <section class="page-hero">
        <h1>Projects</h1>
    </section>

    <nav class="page-section" aria-label="Projects">
        <h2 class="visually-hidden">Project listings</h2>
        <ul class="awards-project-grid">
            <?php foreach ($projects as $project) :
                $thumb = logohomes_project_feature_thumb_web($project['slug']);
                ?>
            <li class="awards-project-grid-item">
                <a class="awards-project-card" href="/projects/<?php echo htmlspecialchars($project['slug'], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="listing-slide awards-listing-slide">
                        <?php if ($thumb !== null) : ?>
                        <img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?>" width="640" height="360" loading="lazy" decoding="async">
                        <?php else : ?>
                        <span class="awards-listing-slide-placeholder" aria-hidden="true">
                            <span class="awards-listing-slide-placeholder-label">Image coming soon</span>
                        </span>
                        <?php endif; ?>
                        <div class="text">
                            <p><?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </div>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
