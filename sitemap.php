<?php
header('Content-Type: application/xml; charset=utf-8');

$baseUrl = 'https://disinfoawareness.eu';
$currentDate = date('c');

$pages = [
    ['loc' => '/',                    'priority' => '1.0', 'changefreq' => 'weekly',  'title' => 'Homepage'],
    ['loc' => '/schulprojekte.php',   'priority' => '0.9', 'changefreq' => 'monthly', 'title' => 'Schulprojekte'],
    ['loc' => '/ngobusiness.php',     'priority' => '0.9', 'changefreq' => 'monthly', 'title' => 'NGO-Business'],
    ['loc' => '/gemeinde.php',        'priority' => '0.9', 'changefreq' => 'monthly', 'title' => 'Gemeinde-Aufklärung'],
    ['loc' => '/diaspora.php',        'priority' => '0.9', 'changefreq' => 'monthly', 'title' => 'Diaspora-Aufklärung'],
    ['loc' => '/kontakt.php',         'priority' => '0.8', 'changefreq' => 'monthly', 'title' => 'Kontakt'],
    ['loc' => '/spenden.php',         'priority' => '0.7', 'changefreq' => 'monthly', 'title' => 'Spenden'],
    ['loc' => '/datenschutz.php',     'priority' => '0.3', 'changefreq' => 'yearly',  'title' => 'Datenschutz'],
    ['loc' => '/impressum.php',       'priority' => '0.3', 'changefreq' => 'yearly',  'title' => 'Impressum'],
];

// Start XML
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<?php foreach ($pages as $page): ?>
    <!-- <?php echo isset($page['title']) ? htmlspecialchars($page['title']) : 'Page'; ?> -->
    <url>
        <loc><?php echo htmlspecialchars($baseUrl . $page['loc']); ?></loc>
        <lastmod><?php echo $currentDate; ?></lastmod>
        <changefreq><?php echo $page['changefreq']; ?></changefreq>
        <priority><?php echo $page['priority']; ?></priority>
    </url>
<?php endforeach; ?>

</urlset>
