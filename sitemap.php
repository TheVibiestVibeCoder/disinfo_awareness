<?php
declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

// No <lastmod>: a value that always says "now" is ignored by search engines anyway.
$pages = [['path' => '/', 'priority' => '1.0', 'changefreq' => 'weekly']];

foreach (data('projects') as $project) {
    $pages[] = ['path' => $project['path'], 'priority' => '0.9', 'changefreq' => 'monthly'];
}

array_push(
    $pages,
    ['path' => '/kontakt.php',     'priority' => '0.8', 'changefreq' => 'monthly'],
    ['path' => '/spenden.php',     'priority' => '0.7', 'changefreq' => 'monthly'],
    ['path' => '/datenschutz.php', 'priority' => '0.3', 'changefreq' => 'yearly'],
    ['path' => '/impressum.php',   'priority' => '0.3', 'changefreq' => 'yearly'],
);

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($pages as $page): ?>
    <url>
        <loc><?= e(absolute_url($page['path'])) ?></loc>
        <changefreq><?= $page['changefreq'] ?></changefreq>
        <priority><?= $page['priority'] ?></priority>
    </url>
<?php endforeach; ?>
</urlset>
