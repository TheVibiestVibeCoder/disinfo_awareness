<?php
/**
 * Contents of <head>: meta, social previews, icons, structured data, fonts, styles.
 * Everything is served from this domain — no requests to third parties.
 *
 * @var array $page  Page meta (see page_meta()).
 */

// Global stylesheets in cascade order; the page's own stylesheet comes last.
$stylesheets = ['css/tokens.css', 'css/base.css', 'css/layout.css', 'css/components.css'];
if ($page['stylesheet']) {
    $stylesheets[] = "css/pages/{$page['stylesheet']}.css";
}

// Both fonts are needed for the first screen of every page.
$fonts = ['fonts/anton-latin.woff2', 'fonts/manrope-latin.woff2'];
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>document.documentElement.classList.add('js')</script>

    <title><?= e($page['title']) ?></title>
    <meta name="description" content="<?= e($page['description']) ?>">
    <meta name="robots" content="<?= e($page['robots']) ?>">
    <link rel="canonical" href="<?= e($page['canonical']) ?>">

    <meta property="og:type" content="<?= e($page['og_type']) ?>">
    <meta property="og:title" content="<?= e($page['og_title']) ?>">
    <meta property="og:description" content="<?= e($page['description']) ?>">
    <meta property="og:url" content="<?= e($page['canonical']) ?>">
    <meta property="og:site_name" content="<?= e(config('site.name')) ?>">
    <meta property="og:locale" content="<?= e(config('site.locale')) ?>">
    <meta property="og:image" content="<?= e($page['og_image']) ?>">
    <meta property="og:image:alt" content="<?= e($page['og_image_alt']) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <meta name="twitter:card" content="<?= e($page['twitter_card']) ?>">
    <meta name="twitter:title" content="<?= e($page['og_title']) ?>">
    <meta name="twitter:description" content="<?= e($page['description']) ?>">
    <meta name="twitter:image" content="<?= e($page['og_image']) ?>">
    <meta name="twitter:image:alt" content="<?= e($page['og_image_alt']) ?>">
    <meta name="twitter:site" content="<?= e(config('seo.twitter')) ?>">
    <meta name="twitter:creator" content="<?= e(config('seo.twitter')) ?>">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/icons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/assets/icons/android-chrome-512x512.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="<?= e(config('site.theme_color')) ?>">
    <meta name="msapplication-TileColor" content="<?= e(config('site.theme_color')) ?>">

    <script type="application/ld+json"><?= json_ld($page['schema']) ?></script>

<?php foreach ($fonts as $font): ?>
    <link rel="preload" href="/assets/<?= e($font) ?>" as="font" type="font/woff2" crossorigin>
<?php endforeach; ?>
<?php foreach ($stylesheets as $stylesheet): ?>
    <link rel="stylesheet" href="<?= e(asset($stylesheet)) ?>">
<?php endforeach; ?>
