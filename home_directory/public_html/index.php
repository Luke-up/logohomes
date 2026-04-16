<?php
$path = trim($_SERVER['REQUEST_URI'], '/');

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
} elseif ($path == 'sitemap') {
    include 'sitemap.php';
} elseif ($path == 'contact') {
    include 'contact.php';
} else {
    include '404.php';
}
?>