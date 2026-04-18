<?php

declare(strict_types=1);

/**
 * @return list<array{
 *   slug: string,
 *   title: string,
 *   tagline: string,
 *   award: string,
 *   award_subheading: string,
 *   location: string,
 *   size_label: string,
 *   bedrooms: int,
 *   bathrooms: int,
 *   one_line_summary: string,
 *   summary_blurb: string,
 *   paragraphs: list<string>
 * }>
 */
function logohomes_projects(): array
{
    return [
        [
            'slug' => 'somerset-lakeside',
            'title' => 'Somerset lakeside',
            'tagline' => 'Timber frame home with generous glazing toward the water.',
            'award' => 'gold',
            'award_subheading' => 'Master Builders Western Cape — design & construction, Gold',
            'location' => 'Somerset West, Western Cape',
            'size_label' => '310 m²',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'one_line_summary' => 'Coastal timber home with open living toward the water and a restrained exterior palette.',
            'summary_blurb' => 'A full design-and-build timber frame home emphasising natural light, durable coastal detailing, and comfortable year-round living for a growing family.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'winelands-family',
            'title' => 'Winelands family home',
            'tagline' => 'Spacious family layout with warm interior finishes.',
            'award' => 'silver',
            'award_subheading' => 'Regional awards — design, Silver',
            'location' => 'Stellenbosch surrounds, Western Cape',
            'size_label' => '340 m²',
            'bedrooms' => 5,
            'bathrooms' => 3,
            'one_line_summary' => 'Generous family plan with warm finishes, practical storage, and strong indoor–outdoor connections.',
            'summary_blurb' => 'Designed for year-round comfort with insulated timber walls, tailored joinery, and living spaces arranged around northern light and vineyard views.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'helderberg-coastal',
            'title' => 'Helderberg coastal villa',
            'tagline' => 'Elevated site with wind-aware detailing and outdoor living.',
            'award' => 'gold',
            'award_subheading' => 'Coastal construction category — Gold',
            'location' => 'Helderberg, Western Cape',
            'size_label' => '290 m²',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'one_line_summary' => 'Wind-tested coastal form with deep outdoor living and low-maintenance cladding choices.',
            'summary_blurb' => 'The structure responds to coastal exposure while keeping maintenance practical, with sheltered terraces and glazing tuned for views and privacy.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'stellenbosch-extension',
            'title' => 'Stellenbosch extension',
            'tagline' => 'Timber addition blending with an existing brick dwelling.',
            'award' => 'bronze',
            'award_subheading' => 'Alterations & additions — Bronze',
            'location' => 'Stellenbosch, Western Cape',
            'size_label' => '85 m² added',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'one_line_summary' => 'Compact timber extension that improves flow and daylight without overwhelming the original home.',
            'summary_blurb' => 'A careful addition that adds living space and a stronger connection to the garden while respecting the scale and character of the existing brick house.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'false-bay-renovation',
            'title' => 'False Bay renovation',
            'tagline' => 'Structural upgrade and interior refresh with timber accents.',
            'award' => 'silver',
            'award_subheading' => 'Renovation & restoration — Silver',
            'location' => 'False Bay, Western Cape',
            'size_label' => '220 m²',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'one_line_summary' => 'Selective opening-up of rooms, new finishes, and timber accents tuned for sea-side living.',
            'summary_blurb' => 'Structural improvements paired with a calmer interior palette and better daylight, prioritising durability in a marine microclimate.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'elgin-country',
            'title' => 'Elgin country house',
            'tagline' => 'Rural setting with wide verandahs and a simple roof form.',
            'award' => 'gold',
            'award_subheading' => 'Country residential — Gold',
            'location' => 'Elgin, Western Cape',
            'size_label' => '265 m²',
            'bedrooms' => 4,
            'bathrooms' => 2,
            'one_line_summary' => 'Simple gable forms, generous verandahs, and views framed across orchards and mountains.',
            'summary_blurb' => 'Designed for seasonal comfort and quiet rural living, with practical service zones and generous covered outdoor spaces.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'strand-compact',
            'title' => 'Strand compact home',
            'tagline' => 'Efficient footprint on a smaller urban stand.',
            'award' => 'bronze',
            'award_subheading' => 'Compact housing — Bronze',
            'location' => 'Strand, Western Cape',
            'size_label' => '165 m²',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'one_line_summary' => 'Clever storage and a double-height volume make the most of a narrow urban stand near the coast.',
            'summary_blurb' => 'An efficient plan that still delivers generous light, sea glimpses, and a calm interior through careful sequencing of spaces.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'breede-river-lodge',
            'title' => 'Breede River lodge',
            'tagline' => 'Weekend retreat with indoor–outdoor flow.',
            'award' => 'silver',
            'award_subheading' => 'Leisure architecture — Silver',
            'location' => 'Breede River, Western Cape',
            'size_label' => '180 m²',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'one_line_summary' => 'Durable weekend retreat with deep decks and easy flow from kitchen to outdoor dining.',
            'summary_blurb' => 'Materials chosen for durability in a riverbank microclimate, with a compact footprint and strong connection to the water’s edge.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'modern-gable-cottage',
            'title' => 'Modern gable cottage',
            'tagline' => 'Contemporary interpretation of a traditional gable silhouette.',
            'award' => 'gold',
            'award_subheading' => 'Residential design — Gold',
            'location' => 'Overberg, Western Cape',
            'size_label' => '195 m²',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'one_line_summary' => 'Clean lines and a restrained exterior palette with a warm timber interior and simple roof geometry.',
            'summary_blurb' => 'A contemporary cottage language that reads quietly in the landscape while delivering bright, efficient rooms and careful detailing throughout.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'coastal-deck-house',
            'title' => 'Coastal deck house',
            'tagline' => 'Living level opened toward sea views and prevailing breezes.',
            'award' => 'gold',
            'award_subheading' => 'Coastal design & construction — Gold',
            'location' => 'False Bay coast, Western Cape',
            'size_label' => '300 m²',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'one_line_summary' => 'Large deck and sliding joinery connect interior spaces to sea air, views, and outdoor living.',
            'summary_blurb' => 'Living spaces are arranged for outlook and breeze, with durable finishes and sun control tuned for year-round coastal comfort.',
            'paragraphs' => [],
        ],
    ];
}

function logohomes_project_by_slug(string $slug): ?array
{
    foreach (logohomes_projects() as $project) {
        if ($project['slug'] === $slug) {
            return $project;
        }
    }

    return null;
}
