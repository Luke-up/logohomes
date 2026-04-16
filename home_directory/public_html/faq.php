<?php include '../includes/header.php'; ?>

<?php
$faqEntries = [
    [
        'q' => 'Do all Municipalities accept timber frame construction?',
        'a' => 'Our homes adhere strictly to the National Building Regulations and therefore should be accepted by all municipalities.',
    ],
    [
        'q' => 'Is insurance greater on a timber house?',
        'a' => 'Not at all, there is no greater risk for a timber frame home than any other construction method.',
    ],
    [
        'q' => 'How durable are timber houses?',
        'a' => 'There are examples of timber houses lasting for hundreds of years and, with modern treatments, today&rsquo;s timber houses are even more durable.',
    ],
    [
        'q' => 'What about maintenance?',
        'a' => 'Maintenance of a timber house is similar to that of a conventional brick house. Your choice of exterior cladding and final finishes will, of course, dictate your maintenance needs. Over the years we have developed methods of painting and construction and use products with low maintenance requirements.',
    ],
    [
        'q' => 'What about the fire hazard?',
        'a' => 'The CSIR and South African Bureau of Standards (SABS) have spent much time and money setting up a code of practice for timber frame buildings &ndash; refer to SANS 10082. The methods of building specified in these codes, allow timber frame houses to be built with fire ratings equivalent to or better than brick houses.',
    ],
    [
        'q' => 'Can one have a fireplace in a timber home?',
        'a' => 'Yes, one can put in a free standing fireplace or build one in brick. Moreover, your fireplace will soon become a focal point of your timber frame home &ndash; especially in winter!',
    ],
    [
        'q' => 'How about rocky or steep sites?',
        'a' => 'Timber frame houses are particularly suitable for tricky sites requiring lighter foundations and are easily suspended at limited extra expense. In fact, for many of the most spectacular sites, timber frame is the only sensible solution.',
    ],
    [
        'q' => 'What about insulation?',
        'a' => 'Heat: Timber itself is a very good insulator. We further insulate the walls and roof with foil and blanket type insulation. This keeps it warm in the winter and cool in the summer. New energy efficiency regulations dictate minimum thermal insulation values. Even the minimum R-values required for a timber frame wall ensure that they are far better insulated than a standard brick cavity wall.',
    ],
    [
        'q' => 'What about noise?',
        'a' => 'There are various methods of ensuring noise is kept to a minimum. We can achieve a better decibel rating than a brick house.',
    ],
    [
        'q' => 'What about later additions?',
        'a' => 'That&rsquo;s one of the chief attractions of timber frame houses. You can easily add to the house horizontally or vertically later as the need arises.',
    ],
    [
        'q' => 'How much does a wooden house cost compared to a brick house?',
        'a' => 'For the same design and quality of finish the cost is very much the same. Timber frame is however about 1/3 quicker to build which translates to a saving in interest and interim rent. Timber frame is also considerably cheaper when it comes to building on difficult sites like rocky or clay ground and especially steep properties.',
    ],
];
?>

<main class="content-page content-page--faq">
    <section class="page-hero">
        <h1>FAQs</h1>
    </section>

    <section class="page-section faq-intro">
        <p>Here are some of the most frequently asked questions about building timber frame houses. If you have any other questions you&rsquo;d like answered, you&rsquo;ll find our details on the contact us page &ndash; feel free to phone or email us.</p>
    </section>

    <div class="faq-list">
        <?php foreach ($faqEntries as $index => $entry) :
            $baseId = 'faq-' . $index;
            ?>
        <div class="faq-item">
            <h2 class="faq-q-heading">
                <button
                    type="button"
                    class="faq-q"
                    id="<?php echo htmlspecialchars($baseId, ENT_QUOTES, 'UTF-8'); ?>-trigger"
                    aria-expanded="false"
                    aria-controls="<?php echo htmlspecialchars($baseId, ENT_QUOTES, 'UTF-8'); ?>-panel"
                >
                    <span class="faq-q-label">
                        <span class="faq-letter-cell"><span class="faq-letter">Q</span></span>
                        <span class="faq-q-text"><strong><?php echo htmlspecialchars($entry['q'], ENT_QUOTES, 'UTF-8'); ?></strong></span>
                    </span>
                    <span class="faq-toggle-icons" aria-hidden="true">
                        <span class="faq-icon-plus">+</span>
                        <span class="faq-icon-minus">&minus;</span>
                    </span>
                </button>
            </h2>
            <div
                class="faq-panel"
                id="<?php echo htmlspecialchars($baseId, ENT_QUOTES, 'UTF-8'); ?>-panel"
                role="region"
                aria-labelledby="<?php echo htmlspecialchars($baseId, ENT_QUOTES, 'UTF-8'); ?>-trigger"
                hidden
            >
                <div class="faq-a">
                    <div class="faq-letter-cell"><span class="faq-letter">A</span></div>
                    <div class="faq-a-text"><?php echo $entry['a']; ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
