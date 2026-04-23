<?php
require_once __DIR__ . '/includes/projects-data.php';
require_once __DIR__ . '/includes/gallery-helpers.php';
require_once __DIR__ . '/includes/request-viewport-hint.php';

$body_class_extra = logohomes_request_hints_coarse_mobile() ? 'layout-coarse-mobile-hint' : '';

$projects = logohomes_projects();
$homeFeaturedProjects = [];
$homeAwardProjects = [];

foreach ($projects as $project) {
    $slug = $project['slug'];
    $title = $project['title'];
    $location = $project['location'];
    $summary = $project['summary_blurb'];
    $images = logohomes_collect_gallery_images('assets/gallery/projects/' . $slug);
    $thumbs = [];

    foreach (array_slice($images, 0, 3) as $img) {
        $thumbs[] = $img['thumbWeb'];
    }

    while ($thumbs !== [] && count($thumbs) < 3) {
        $thumbs[] = $thumbs[count($thumbs) - 1];
    }

    if ($thumbs !== []) {
        $homeFeaturedProjects[] = [
            'slug' => $slug,
            'title' => $title,
            'location' => $location,
            'summary' => $summary,
            'thumbs' => $thumbs,
        ];
    }

    $awardLabel = logohomes_award_label($project['award']);
    $awardText = $awardLabel !== '' ? $awardLabel . ' - ' . $location : $location;
    $featureThumb = $images[0]['thumbWeb'] ?? null;

    if (is_string($featureThumb) && $featureThumb !== '') {
        $homeAwardProjects[] = [
            'slug' => $slug,
            'title' => $title,
            'awardText' => $awardText,
            'thumb' => $featureThumb,
        ];
    }
}
?>
<?php include __DIR__ . '/includes/header.php'; ?>
<div class="header">
    <div class="slider-container">
        <div class="header-slider">
            <div>
                <img src="/assets/img/header-slider/1.avif" alt="Logo Homes exterior shot">
            </div>
            <div>
                <img src="/assets/img/header-slider/2.avif" alt="Logo Homes exterior shot">
            </div>
            <div>
                <img src="/assets/img/header-slider/3.avif" alt="Logo Homes exterior shot">
            </div>
            <div>
                <img src="/assets/img/header-slider/4.avif" alt="Logo Homes exterior shot">
            </div>
            <div>
                <img src="/assets/img/header-slider/5.avif" alt="Logo Homes exterior shot">
            </div>
            <div>
                <img src="/assets/img/header-slider/6.avif" alt="Logo Homes exterior shot">
            </div>
        </div>
    </div>
    <div class="social-links">
        <ul>
            <li>
                <a href="https://www.facebook.com/pages/Logo-Homes/882329498476445" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff" height="20px" width="20px" version="1.1" id="Layer_1" viewBox="0 0 310 310" xml:space="preserve">
                    <g id="XMLID_834_">
                        <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064   c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996   V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545   C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703   c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"/>
                    </g>
                </svg>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/logohomesza/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" fill="#ffffff"/>
                        <path d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z" fill="#ffffff"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z" fill="#ffffff"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</div>

<div id="welcome-section">
    <h1>Logo Homes</h1>
    <p>Logo Homes was established in 1993 and has grown from strength to strength, winning awards for both the design and construction of high quality homes.</p>
    <div class="btn-container">
        <a class="btn" href="/about">See More</a>
    </div>
</div>

<div class="featured-projects">
    <div class="featured-projects-slider">
        <?php foreach ($homeFeaturedProjects as $project) : ?>
        <div>
            <div class="project">
                <div class="image-container">
                    <a class="project-link-overlay" href="/projects/<?php echo htmlspecialchars($project['slug'], ENT_QUOTES, 'UTF-8'); ?>" aria-label="View project: <?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?>"></a>
                    <?php foreach ($project['thumbs'] as $thumb) : ?>
                    <img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                    <?php endforeach; ?>
                </div>
                <div class="information">
                    <h3><a href="/projects/<?php echo htmlspecialchars($project['slug'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></a></h3>
                    <p><?php echo htmlspecialchars($project['location'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><?php echo htmlspecialchars($project['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <div class="navigation">
                        <div class="prev-arrow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 6l-6 6 6 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="next-arrow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 6l6 6-6 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="featured-container">
    <h3>Latest Awards</h3>
    <div class="featured-slider">
        <?php foreach ($homeAwardProjects as $project) : ?>
        <div>
            <a class="featured-award-link" href="/projects/<?php echo htmlspecialchars($project['slug'], ENT_QUOTES, 'UTF-8'); ?>">
                <div class="listing-slide">
                    <img src="<?php echo htmlspecialchars($project['thumb'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                    <div class="text">
                        <p><?php echo htmlspecialchars($project['awardText'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="call-to-action">
    <a href="https://www.facebook.com/pages/Logo-Homes/882329498476445" target="blank">
        <div class="facebook cta">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="150px" height="150px">    <path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"/></svg>
            <p>Follow us</p>
        </div>
    </a>
    <a href="/faq">
        <div class="faq cta">
            <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 318.996"><path d="M156.175.085c41.358 1.25 78.515 16.002 105.163 38.847 12.165 10.432 22.185 22.545 29.504 35.863 19.557-8.363 41.599-13.386 64.983-14.094l.139-.003c41.316-1.216 79.32 11.338 107.357 32.613 29.05 22.044 47.56 53.439 48.63 88.948.558 18.444-3.668 36.073-11.756 52.105-6.408 12.706-15.275 24.403-26.116 34.68l11.336 26.959a16.528 16.528 0 01.584 11.236c-2.654 8.751-11.902 13.693-20.653 11.04l-48.837-14.918c-7.223 2.557-14.724 4.571-22.428 6.068-9.726 1.891-19.983 2.968-30.59 3.277-41.316 1.215-79.319-11.336-107.355-32.612-14.932-11.33-27.076-25.132-35.504-40.695-21.649 8.809-46.235 13.452-72.123 12.69-10.607-.308-20.864-1.386-30.59-3.276-7.704-1.498-15.205-3.512-22.428-6.069l-48.837 14.918c-8.751 2.654-17.999-2.289-20.653-11.039a16.498 16.498 0 01.588-11.234l11.332-26.962c-10.841-10.277-19.708-21.974-26.116-34.68C3.717 157.716-.509 140.087.049 121.643c1.07-35.51 19.58-66.904 48.63-88.948C76.716 11.419 114.72-1.134 156.036.081l.139.004zm141.579 89.772c4.774 12.806 7.162 26.457 6.745 40.597l-.003.074c-1.072 35.508-19.583 66.906-48.632 88.95-6.257 4.747-13.012 9.061-20.186 12.884 21.607 39.012 70.868 65.445 127.359 63.783 18.86-.553 36.865-3.849 52.876-10.281l54.239 16.568-15.984-38.017c26.236-20.785 42.186-49.903 41.222-81.702-1.824-60.444-64.047-107.658-138.971-105.455-21.143.623-41.038 5.116-58.665 12.599zm47.948 149.715h-28.953l32.621-106.739h36.651l32.598 106.739h-28.93l-5.709-20.423h-32.576l-5.702 20.423zm32.211-42.118l-9.846-35.221h-.768l-9.835 35.221h20.449zm-177.682-75.107c0 11.885-2.151 21.889-6.429 30.058-2.349 4.471-5.146 8.343-8.394 11.62l15.004 19.615h-23.724l-7.449-9.363c-5.302 1.933-10.992 2.905-17.069 2.905-8.986 0-17.114-2.128-24.378-6.334-7.246-4.232-12.995-10.419-17.25-18.565-4.28-8.144-6.408-18.123-6.408-29.936 0-11.888 2.128-21.892 6.408-30.036 4.255-8.145 10.004-14.309 17.25-18.516 7.264-4.183 15.392-6.262 24.378-6.262 8.944 0 17.047 2.079 24.315 6.262 7.266 4.207 13.038 10.371 17.317 18.516 4.278 8.144 6.429 18.148 6.429 30.036zm-57.499 13.768h20.826l4.862 6.579a26.058 26.058 0 001.862-4.157c1.562-4.402 2.354-9.783 2.354-16.19 0-6.385-.792-11.791-2.354-16.168-1.538-4.403-3.849-7.729-6.884-10.029-3.032-2.275-6.79-3.399-11.228-3.399-4.437 0-8.171 1.124-11.205 3.399-3.033 2.3-5.342 5.626-6.903 10.029-1.562 4.377-2.333 9.783-2.333 16.168 0 6.407.771 11.788 2.333 16.19 1.561 4.379 3.87 7.73 6.903 10.004 3.034 2.275 6.768 3.399 11.205 3.399.535 0 1.059-.016 1.576-.048l-11.014-15.777z"/></svg>
            <p>FAQ's</p>
        </div>
    </a>
    <a href="/contact">
        <div class="contact cta">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><g id="Contact_Number" data-name="Contact Number"><g id="Contact_Number-2" data-name="Contact Number"><path d="M255.9865,73.8247c-100.5993,0-182.1708,81.5625-182.1708,182.18,0,100.6,81.5715,182.1708,182.1708,182.1708,100.6173,0,182.1978-81.5706,182.1978-182.1708C438.1843,155.3872,356.6038,73.8247,255.9865,73.8247Zm74.04,105.17V361.3387a1.4,1.4,0,0,1-1.4,1.4H169.0319a2.7988,2.7988,0,0,1-2.7988-2.7988V156.5887a2.8009,2.8009,0,0,1,2.8008-2.8008H328.6256a1.4,1.4,0,0,1,1.4,1.4Zm25.2071,0v171.14A12.609,12.609,0,0,1,342.63,362.7391h-3.41a25.0257,25.0257,0,0,0,3.41-12.6036V166.3915a25.0507,25.0507,0,0,0-3.41-12.6036h3.41a12.609,12.609,0,0,1,12.6036,12.6036Z"/><path d="M287.0914,274.8487s-4.7466-5.6952-10.0107-1.7667c-3.92,2.9268-10.96,9.4482-12.6567,11.03,0,0-11.7684-6.2757-18.72-12.006-10.3185-8.4906-17.2179-18.9585-20.84-24.9084L222.1663,242.1c.94-1.02,8.1567-8.7363,11.268-12.9195,3.9195-5.256-1.7577-10.0026-1.7577-10.0026s-16.0136-16.0137-19.6614-19.1952a7.84,7.84,0,0,0-7.8489-1.4058c-7.6635,4.9563-15.6177,9.2637-16.0929,29.97-.0081,19.4067,14.7042,39.402,30.6306,54.8883,15.9426,17.4987,37.837,35.0244,59.0094,35.0064,20.7162-.4743,25.0227-8.42,29.98-16.0929a7.8541,7.8541,0,0,0-1.4157-7.848C303.0961,290.8534,287.0914,274.8487,287.0914,274.8487Z"/></g></g></svg>
            <p>Contact Us</p>
        </div>
    </a>
</div>

<div class="get-in-touch">
    <div class="get-in-touch-form-block">
        <h2 class="get-in-touch-form-heading">Contact us and we'll get back to you</h2>
            <form action="submit.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Full Name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email Address" required>

                <div class="message-field-wrap">
                    <textarea id="message" name="message" placeholder="" rows="5" required></textarea>
                    <label for="message" class="message-field-label">Message</label>
                </div>

                <button type="submit">Send</button>
            </form>
    </div>
        
</div>


<?php include __DIR__ . '/includes/footer.php'; ?>