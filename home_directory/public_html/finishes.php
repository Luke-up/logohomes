<?php
$pageTitle = 'Finishes - Logo Homes';

require_once __DIR__ . '/includes/gallery-helpers.php';

$finishesFeatureImg = logohomes_finishes_marketing_feature_web();
?>
<?php include __DIR__ . '/includes/header.php'; ?>

<main class="content-page content-page--finishes-marketing">
    <section class="page-hero">
        <h1>Finishes</h1>
    </section>
    <section class="page-intro-lede page-section" aria-label="Introduction">
        <p>Interior and exterior finishes define character and longevity. We combine durable materials with careful detailing so your home feels cohesive inside and out.</p>
    </section>

    <section class="finishes-highlight-section page-section" aria-labelledby="finishes-shiplap-heading">
        <h3 id="finishes-shiplap-heading" class="finishes-highlight-heading">Shiplap and corrugated iron roofing</h3>
        <div class="finishes-highlight-split<?php echo $finishesFeatureImg === null ? ' finishes-highlight-split--single' : ''; ?>">
            <div class="finishes-highlight-copy">
                <p>Shiplap adds rhythm and texture to walls and ceilings, while corrugated iron brings a crisp, weather-hardy roofline suited to coastal and rural settings. Together they balance warmth and practicality.</p>
            </div>
            <?php if ($finishesFeatureImg !== null) : ?>
            <div class="finishes-highlight-media">
                <img src="<?php echo htmlspecialchars($finishesFeatureImg, ENT_QUOTES, 'UTF-8'); ?>" alt="Shiplap and corrugated iron roofing detail" loading="lazy" decoding="async">
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
