<?php
$path = trim($_SERVER['REQUEST_URI'], '/');

if ($path == '' || $path == 'home') {
    include 'home.php';
} elseif ($path == 'sitemap') {
    include 'sitemap.php';
} elseif ($path == 'contact') {
    include 'contact.php';
} else {
    include '404.php';
}
?>