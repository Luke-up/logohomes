<?php
$currentPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
if ($currentPath === '') {
    $currentPath = 'home';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Design and building your perfect home. - Logo Homes</title>
        <meta
        name="description"
        content="Logo Homes offer you a highly specialised and unique timber frame building service that incorporates both the design and the building of your perfect home."
        />
        <link rel="canonical" href="https://www.logohomes.co.za/" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta
        property="og:title"
        content="Design and building your perfect home. - Logo Homes"
        />
        <meta
        property="og:description"
        content="At Logo Homes, we are able to offer you a highly specialised and unique timber frame building service that incorporates both the design and the building of your perfect home."
        />
        <meta property="og:url" content="https://www.logohomes.co.za/" />
        <meta property="og:site_name" content="Logo Homes" />
        <meta
        property="article:publisher"
        content="https://www.facebook.com/pages/Logo-Homes/882329498476445"
        />
        <meta
        property="article:modified_time"
        content="2024-11-28T12:52:43+00:00"
        />
        <meta
        property="og:image"
        content="https://www.logohomes.co.za/wp-content/uploads/2015/02/logo-with-tagline.png"
        />
        <meta property="og:image:width" content="383" />
        <meta property="og:image:height" content="117" />
        <meta property="og:image:type" content="image/png" />
        <link rel="icon" href="/favicon.ico" type="image/x-icon">

        <meta
        name="google-site-verification"
        content="zqqe8SEwKkLhTQc7swlQtjArbj3FwIxFljfByRpSTzs"
        />

        <link rel="stylesheet" href="/assets/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/slick.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/slick-theme.css">
    </head>
<body>
    <header>
        <nav id="nav-main" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <div id="logo">
                <a href="/">
                    <img src="/assets/logo-with-tagline.png" alt="Logo Homes Logo" width="288" loading="eager"/>
                </a>
            </div>
            <div id="mobi-hamburger-open"></div>
            <div class="nav-links-col">
                <div class="header-contact-row" aria-label="Contact information">
                    <a href="tel:+27218454606" aria-label="Call Logo Homes">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M22 16.92V20a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3.09a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l1.36-1.36a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        +27 21 845 4606
                    </a>
                    <span class="separator" aria-hidden="true">|</span>
                    <a href="mailto:logo@icon.co.za" aria-label="Email Logo Homes">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="m22 6-10 7L2 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        logo@icon.co.za
                    </a>
                </div>
                <ul id="menu-main-menu">
                    <div id="mobi-hamburger-close"></div>
                    <li>
                        <a href="/" <?php if ($currentPath === 'home') { echo 'aria-current="page" class="is-active"'; } ?>><span>Home</span></a>
                    </li>
                    <li>
                        <a href="/about" <?php if ($currentPath === 'about') { echo 'aria-current="page" class="is-active"'; } ?>><span>About</span></a>
                    </li>
                    <li>
                        <a href="/designs" <?php if ($currentPath === 'designs') { echo 'aria-current="page" class="is-active"'; } ?>><span>Designs</span></a>
                    </li>
                    <li>
                        <a href="/faq" <?php if ($currentPath === 'faq') { echo 'aria-current="page" class="is-active"'; } ?>><span>FAQ</span></a>
                    </li>
                    <?php
                    $galleryNavPaths = [
                        'gallery-awards',
                        'awards',
                        'gallery/exteriors',
                        'gallery/interiors',
                        'gallery/finishes',
                        'gallery/during-construction',
                    ];
                    $galleryNavActive = in_array($currentPath, $galleryNavPaths, true)
                        || preg_match('#^projects/[a-z0-9-]+$#', $currentPath) === 1;
                    ?>
                    <li class="menu-item-has-children">
                        <a
                            href="/gallery-awards"
                            <?php
                            if ($galleryNavActive) {
                                echo 'class="is-active"';
                            }
                            if ($currentPath === 'gallery-awards') {
                                echo ' aria-current="page"';
                            }
                            ?>
                        ><span>Gallery &#038; Awards</span></a>
                        <ul class="sub-menu" aria-label="Gallery and awards sections">
                            <li>
                                <a href="/gallery/exteriors" <?php if ($currentPath === 'gallery/exteriors') { echo 'aria-current="page" class="is-active"'; } ?>><span>Exteriors</span></a>
                            </li>
                            <li>
                                <a href="/gallery/interiors" <?php if ($currentPath === 'gallery/interiors') { echo 'aria-current="page" class="is-active"'; } ?>><span>Interiors</span></a>
                            </li>
                            <li>
                                <a href="/gallery/finishes" <?php if ($currentPath === 'gallery/finishes') { echo 'aria-current="page" class="is-active"'; } ?>><span>Finishes</span></a>
                            </li>
                            <li>
                                <a href="/gallery/during-construction" <?php if ($currentPath === 'gallery/during-construction') { echo 'aria-current="page" class="is-active"'; } ?>><span>During construction</span></a>
                            </li>
                            <li>
                                <a href="/awards" <?php
                                if ($currentPath === 'awards') {
                                    echo 'aria-current="page" class="is-active"';
                                } elseif (preg_match('#^projects/[a-z0-9-]+$#', $currentPath) === 1) {
                                    echo 'class="is-active"';
                                }
                                ?>><span>Awards</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/contact" <?php if ($currentPath === 'contact') { echo 'aria-current="page" class="is-active"'; } ?>><span>Contact</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
