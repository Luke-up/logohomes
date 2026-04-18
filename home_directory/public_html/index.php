<?php
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');

if ($path == '' || $path == 'home') {
    include 'home.php';
} elseif ($path == 'about') {
    include 'about.php';
} elseif ($path == 'designs') {
    include 'designs.php';
} elseif ($path == 'faq') {
    include 'faq.php';
} elseif ($path == 'gallery-awards') {
    include 'gallery-awards.php';
} elseif ($path == 'awards') {
    include 'awards.php';
} elseif ($path == 'projects') {
    header('Location: /awards', true, 302);
    exit;
} elseif ($path == 'gallery/exteriors') {
    include 'gallery-exteriors.php';
} elseif ($path == 'gallery/interiors') {
    include 'gallery-interiors.php';
} elseif ($path == 'gallery/finishes') {
    include 'gallery-finishes.php';
} elseif ($path == 'gallery/during-construction') {
    include 'gallery-during-construction.php';
} elseif (preg_match('#^projects/([a-z0-9-]+)$#', $path, $projectPathMatch)) {
    $projectSlug = $projectPathMatch[1];
    include 'project.php';
} elseif ($path == 'sitemap') {
    include 'sitemap.php';
} elseif ($path == 'contact') {
    include 'contact.php';
} else {
    include '404.php';
}
?>