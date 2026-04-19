<?php
require_once __DIR__ . '/../includes/projects-data.php';
include '../includes/header.php';
?>
<h1>Website Sitemap</h1>
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/designs">Designs</a></li>
    <li><a href="/faq">FAQ</a></li>
    <li><a href="/gallery-awards">Gallery</a>
        <ul>
            <li><a href="/gallery/exteriors">Gallery — Exteriors</a></li>
            <li><a href="/gallery/interiors">Gallery — Interiors</a></li>
            <li><a href="/gallery/finishes">Gallery — Finishes</a></li>
            <li><a href="/gallery/during-construction">Gallery — During construction</a></li>
            <li><a href="/awards">Awards</a>
                <ul>
                    <?php foreach (logohomes_projects() as $p) : ?>
                        <li><a href="/projects/<?php echo htmlspecialchars($p['slug'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($p['title'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </li>
    <li><a href="/contact">Contact</a></li>
</ul>
<?php include '../includes/footer.php'; ?>
