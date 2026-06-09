<?php
/**
 * Shared <head> template.
 *
 * Required variables (set before require):
 *   $page_title    string  Full <title> text
 *   $page_desc     string  Meta description
 *   $page_canonical string Canonical URL
 *
 * Optional variables (with defaults):
 *   $og_type       string  Open Graph type     (default: 'website')
 *   $og_title      string  OG title            (default: $page_title)
 *   $og_desc       string  OG description      (default: $page_desc)
 *   $og_image      string  OG image URL        (default: shared image)
 *   $og_image_alt  string  OG image alt text   (default: 'Disinfo Awareness')
 *   $twitter_card  string  Twitter card type   (default: 'summary_large_image')
 *   $robots        string  Robots meta value   (default: 'index, follow')
 *   $schema_json   string  Raw ld+json content (default: '')
 *   $extra_head    string  Extra HTML for </head> (default: '')
 */

$og_type      ??= 'website';
$og_title     ??= $page_title;
$og_desc      ??= $page_desc;
$og_image     ??= 'https://disinfoconsulting.eu/wp-content/uploads/2026/01/Gemini_Generated_Image_gsrva8gsrva8gsrv.png';
$og_image_alt ??= 'Disinfo Awareness – Gegen Desinformation';
$twitter_card ??= 'summary_large_image';
$robots       ??= 'index, follow';
$schema_json  ??= '';
$extra_head   ??= '';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_desc, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="robots" content="<?= htmlspecialchars($robots, ENT_QUOTES, 'UTF-8') ?>">
    <link rel="canonical" href="<?= htmlspecialchars($page_canonical, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="language" content="de">

    <meta property="og:type" content="<?= htmlspecialchars($og_type, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:title" content="<?= htmlspecialchars($og_title, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($og_desc, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:url" content="<?= htmlspecialchars($page_canonical, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:site_name" content="Disinfo Awareness">
    <meta property="og:locale" content="de_DE">
    <meta property="og:image" content="<?= htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:image:alt" content="<?= htmlspecialchars($og_image_alt, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <meta name="twitter:card" content="<?= htmlspecialchars($twitter_card, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($og_title, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($og_desc, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:image:alt" content="<?= htmlspecialchars($og_image_alt, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:site" content="@disinfoawareness">
    <meta name="twitter:creator" content="@disinfoawareness">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#050505">
    <meta name="msapplication-TileColor" content="#050505">

<?php if ($schema_json): ?>
    <script type="application/ld+json">
<?= $schema_json ?>
    </script>
<?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Manrope:wght@300;400;600&display=swap" rel="stylesheet">

    <script type="importmap">{"imports":{"three":"https://unpkg.com/three@0.160.0/build/three.module.js"}}</script>

    <link rel="stylesheet" href="/assets/css/main.css">

<?= $extra_head ?>
</head>
