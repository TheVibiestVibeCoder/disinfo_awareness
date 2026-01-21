<?php
/**
 * Dynamic XML Sitemap Generator for Disinfo Awareness
 * Generates sitemap with all important pages for disinfoawareness.eu
 *
 * Pages included:
 * - Homepage (index.html)
 * - Projekt 2026 (aufklaerung.html)
 * - Positive Info Manipulation (pim.html)
 * - Innovation Lab (innovation.html)
 * - Contact Form (kontakt.php)
 * - Privacy Policy (datenschutz.html)
 * - Legal Imprint (impressum.html)
 */

header('Content-Type: application/xml; charset=utf-8');

// Get the base URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'https';
$baseUrl = $protocol . '://' . $_SERVER['HTTP_HOST'];
$currentDate = date('c');

// Define all pages with their SEO configuration
$pages = [
    // Homepage - highest priority
    [
        'loc' => '/',
        'priority' => '1.0',
        'changefreq' => 'weekly',
        'lastmod' => $currentDate
    ],
    [
        'loc' => '/index.html',
        'priority' => '1.0',
        'changefreq' => 'weekly',
        'lastmod' => $currentDate
    ],

    // Main content pages - high priority
    [
        'loc' => '/aufklaerung.html',
        'priority' => '0.9',
        'changefreq' => 'monthly',
        'lastmod' => $currentDate,
        'title' => 'Projekt 2026: Resilienz im ländlichen Raum'
    ],
    [
        'loc' => '/pim.html',
        'priority' => '0.9',
        'changefreq' => 'monthly',
        'lastmod' => $currentDate,
        'title' => 'Positive Info Manipulation Strategy'
    ],
    [
        'loc' => '/innovation.html',
        'priority' => '0.9',
        'changefreq' => 'monthly',
        'lastmod' => $currentDate,
        'title' => 'Innovation Lab & PIM Lab'
    ],

    // Contact page - important for engagement
    [
        'loc' => '/kontakt.php',
        'priority' => '0.8',
        'changefreq' => 'monthly',
        'lastmod' => $currentDate,
        'title' => 'Kontakt'
    ],

    // Legal pages - lower priority but required
    [
        'loc' => '/datenschutz.html',
        'priority' => '0.5',
        'changefreq' => 'yearly',
        'lastmod' => $currentDate,
        'title' => 'Datenschutz'
    ],
    [
        'loc' => '/impressum.html',
        'priority' => '0.5',
        'changefreq' => 'yearly',
        'lastmod' => $currentDate,
        'title' => 'Impressum'
    ]
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
        <lastmod><?php echo $page['lastmod']; ?></lastmod>
        <changefreq><?php echo $page['changefreq']; ?></changefreq>
        <priority><?php echo $page['priority']; ?></priority>
    </url>
<?php endforeach; ?>

</urlset>
