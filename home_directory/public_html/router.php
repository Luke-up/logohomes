<?php

declare(strict_types=1);

/**
 * Router for PHP's built-in server so paths like /gallery/exteriors reach index.php.
 * Usage from repo root: php -S localhost:8000 -t home_directory/public_html home_directory/public_html/router.php
 */
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$file = __DIR__ . $path;

if ($path !== '/' && is_file($file)) {
    return false;
}

require __DIR__ . '/index.php';
