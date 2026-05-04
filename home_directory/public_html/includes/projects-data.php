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
            'slug' => 'shore-house',
            'title' => 'Shore House',
            'tagline' => 'Timber frame home overlooking the Atlantic Ocean.',
            'award' => 'gold',
            'award_subheading' => 'Master Builders Western Cape — design & construction, Gold',
            'location' => 'Scarbrough, Western Cape',
            'size_label' => '310 m²',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'one_line_summary' => 'Coastal timber home with open living toward the water and a restrained exterior palette.',
            'summary_blurb' => 'A full design-and-build timber frame home emphasising natural light, durable coastal detailing, and comfortable year-round living for a growing family.',
            'paragraphs' => [],
        ],
        [
            'slug' => 'grotto-bay',
            'title' => 'Grotto Bay',
            'tagline' => 'Timber frame home situated on a rocky outcrop.',
            'award' => 'gold',
            'award_subheading' => 'Master Builders Western Cape — design & construction, Gold',
            'location' => 'Grotto Bay, Western Cape',
            'size_label' => '310 m²',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'one_line_summary' => 'Coastal timber home with open living and an elegant exterior.',
            'summary_blurb' => 'A full design-and-build timber frame home emphasising natural light, durable coastal detailing, and comfortable year-round living for a growing family.',
            'paragraphs' => [],
        ],
        
    ];
}

/**
 * Parse project JSON into normalized records for overview sliders.
 *
 * @return list<array{
 *   slug: string,
 *   title: string,
 *   award: string,
 *   location: string,
 *   size_label: string
 * }>
 */
function logohomes_parse_projects_overview_json(string $projectsJson): array
{
    $decoded = json_decode($projectsJson, true);
    if (!is_array($decoded)) {
        return [];
    }

    $records = [];

    foreach ($decoded as $project) {
        if (!is_array($project)) {
            continue;
        }
        $records[] = [
            'slug' => isset($project['slug']) && is_string($project['slug']) ? $project['slug'] : '',
            'title' => isset($project['title']) && is_string($project['title']) ? $project['title'] : '',
            'award' => isset($project['award']) && is_string($project['award']) ? $project['award'] : '',
            'location' => isset($project['location']) && is_string($project['location']) ? $project['location'] : '',
            'size_label' => isset($project['size_label']) && is_string($project['size_label']) ? $project['size_label'] : '',
        ];
    }

    return $records;
}

/**
 * JSON-backed accessor for overview slider data.
 *
 * @return list<array{
 *   slug: string,
 *   title: string,
 *   award: string,
 *   location: string,
 *   size_label: string
 * }>
 */
function logohomes_projects_overview_records(): array
{
    $projectsJson = json_encode(logohomes_projects(), JSON_UNESCAPED_UNICODE);
    if (!is_string($projectsJson)) {
        return [];
    }

    return logohomes_parse_projects_overview_json($projectsJson);
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
