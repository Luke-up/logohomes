<?php
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');

if ($path == '' || $path == 'home') {
    include 'home.php';
} elseif ($path == 'about') {
    include 'about.php';
} elseif ($path == 'faq') {
    include 'faq.php';
} elseif ($path == 'construction') {
    include 'construction.php';
} elseif ($path == 'finishes') {
    include 'finishes.php';
} elseif ($path == 'gallery-awards') {
    include 'gallery-awards.php';
} elseif ($path == 'projects') {
    include 'projects.php';
} elseif ($path == 'awards') {
    header('Location: /projects', true, 301);
    exit;
} elseif ($path == 'gallery/exteriors') {
    include 'gallery-exteriors.php';
} elseif ($path == 'gallery/interiors') {
    include 'gallery-interiors.php';
} elseif ($path == 'gallery/finishes') {
    header('Location: /finishes', true, 301);
    exit;
} elseif ($path == 'gallery/during-construction') {
    header('Location: /construction', true, 301);
    exit;
} elseif (preg_match('#^projects/([a-z0-9-]+)$#', $path, $projectPathMatch)) {
    $projectSlug = $projectPathMatch[1];
    include 'project.php';
} elseif ($path == 'sitemap') {
    include 'sitemap.php';
} elseif ($path == 'contact') {
    include 'contact.php';
} elseif ($path == 'privacy-policy') {
    include 'privacy-policy.php';
} else {
    include '404.php';
}
?>