<?php
/**
 * SEO Metadata Configuration File
 *
 * Zentrale Konfiguration für alle SEO-relevanten Metadaten
 * Hier können URLs, Texte, Beschreibungen und Bilder für die Google-Suche angepasst werden
 *
 * Last updated: 2026-01-22
 */

// =============================================================================
// GLOBALE WEBSITE-EINSTELLUNGEN (für alle Seiten)
// =============================================================================

$seo_global = [
    // Basis-Informationen
    'site_name' => 'Disinfo Awareness',
    'site_url' => 'https://disinfoawareness.eu',
    'default_language' => 'de',
    'locale' => 'de_DE',

    // Standard-Bilder für Social Media (wenn keine seiten-spezifischen Bilder angegeben)
    'default_og_image' => 'https://disinfoconsulting.eu/wp-content/uploads/2026/01/Gemini_Generated_Image_gsrva8gsrva8gsrv.png',
    'default_og_image_width' => '1200',
    'default_og_image_height' => '630',

    // Tab Icon / Favicon
    'favicon_ico' => '/favicon.ico',
    'favicon_16' => '/favicon-16x16.png',
    'favicon_32' => '/favicon-32x32.png',
    'apple_touch_icon' => '/apple-touch-icon.png',
    'android_chrome_192' => '/android-chrome-192x192.png',
    'android_chrome_512' => '/android-chrome-512x512.png',
    'manifest' => '/site.webmanifest',

    // Social Media Profile URLs
    'twitter_handle' => '@disinfoawareness', // Falls vorhanden
    'facebook_page' => '', // Falls vorhanden
    'linkedin_page' => '', // Falls vorhanden

    // Organisations-Daten (für Schema.org)
    'organization_name' => 'Disinfo Awareness',
    'organization_logo' => 'https://disinfoconsulting.eu/wp-content/uploads/2026/01/Gemini_Generated_Image_gsrva8gsrva8gsrv.png',
    'organization_email' => 'kontakt@disinfoawareness.eu',

    // Farben & Theme
    'theme_color' => '#050505',
    'background_color' => '#050505',
];

// =============================================================================
// SEITEN-SPEZIFISCHE SEO-EINSTELLUNGEN
// =============================================================================

$seo_pages = [
    // Homepage
    'index.html' => [
        'title' => 'Disinfo Awareness – Gegen Desinformation im ländlichen Raum',
        'description' => 'Disinfo Awareness bekämpft Desinformation in ländlichen Regionen durch Aufklärung, innovative Strategien und nachhaltige Bildungsprojekte. Jetzt mehr erfahren!',
        'keywords' => 'Desinformation, Fake News, ländlicher Raum, Medienkompetenz, Aufklärung, Demokratie',
        'og_type' => 'website',
        'og_image' => 'https://disinfoawareness.eu/images/og-homepage.jpg',
        'og_image_alt' => 'Disinfo Awareness – Gegen Desinformation',
        'canonical' => 'https://disinfoawareness.eu/',
        'priority' => '1.0',
        'changefreq' => 'weekly',
    ],

    // Aufklärung / Projekt 2026
    'aufklaerung.html' => [
        'title' => 'Projekt 2026: Resilientes Land – Nachhaltige Aufklärung gegen Desinformation',
        'description' => 'Unser Projekt 2026 stärkt ländliche Gemeinschaften durch gezielte Aufklärung, Medienbildung und innovative Ansätze gegen Desinformation. Erfahren Sie mehr!',
        'keywords' => 'Projekt 2026, Aufklärung, Medienkompetenz, ländliche Resilienz, Bildungsprojekt',
        'og_type' => 'article',
        'og_image' => 'https://disinfoawareness.eu/images/og-aufklaerung.jpg',
        'og_image_alt' => 'Projekt 2026: Resilientes Land',
        'canonical' => 'https://disinfoawareness.eu/aufklaerung.html',
        'priority' => '0.9',
        'changefreq' => 'monthly',
    ],

    // PIM - Positive Info Manipulation
    'pim.html' => [
        'title' => 'PIM – Positive Informations-Manipulation für das Gute',
        'description' => 'Positive Informations-Manipulation (PIM) nutzt bewährte Kommunikationsstrategien, um konstruktive Botschaften zu verbreiten und Desinformation entgegenzuwirken.',
        'keywords' => 'PIM, Positive Manipulation, Kommunikationsstrategie, Informationskampagnen, Social Media',
        'og_type' => 'article',
        'og_image' => 'https://disinfoawareness.eu/images/og-pim.jpg',
        'og_image_alt' => 'Positive Informations-Manipulation Strategie',
        'canonical' => 'https://disinfoawareness.eu/pim.html',
        'priority' => '0.9',
        'changefreq' => 'monthly',
    ],

    // Innovation Lab
    'innovation.html' => [
        'title' => 'Innovation Lab – KI, Datenanalyse & digitale Lösungen',
        'description' => 'Unser Innovation Lab entwickelt KI-gestützte Tools zur Desinformationserkennung, Datenanalysen und digitale Lösungen für nachhaltige Aufklärungsarbeit.',
        'keywords' => 'Innovation Lab, KI, Künstliche Intelligenz, Datenanalyse, Fact-Checking, digitale Tools',
        'og_type' => 'article',
        'og_image' => 'https://disinfoawareness.eu/images/og-innovation.jpg',
        'og_image_alt' => 'Innovation Lab für Desinformationsbekämpfung',
        'canonical' => 'https://disinfoawareness.eu/innovation.html',
        'priority' => '0.9',
        'changefreq' => 'monthly',
    ],

    // Kontakt
    'kontakt.php' => [
        'title' => 'Kontakt – Disinfo Awareness',
        'description' => 'Nehmen Sie Kontakt mit Disinfo Awareness auf. Wir freuen uns auf Ihre Fragen, Anregungen oder Kooperationsanfragen im Kampf gegen Desinformation.',
        'keywords' => 'Kontakt, Kontaktformular, Anfrage, Kooperation',
        'og_type' => 'website',
        'og_image' => 'https://disinfoawareness.eu/images/og-kontakt.jpg',
        'og_image_alt' => 'Kontaktieren Sie Disinfo Awareness',
        'canonical' => 'https://disinfoawareness.eu/kontakt.php',
        'priority' => '0.9',
        'changefreq' => 'yearly',
    ],

    // Datenschutz
    'datenschutz.html' => [
        'title' => 'Datenschutzerklärung – Disinfo Awareness',
        'description' => 'Datenschutzerklärung von Disinfo Awareness: Informationen zur Verarbeitung personenbezogener Daten gemäß DSGVO.',
        'keywords' => 'Datenschutz, DSGVO, Datenschutzerklärung, Privatsphäre',
        'og_type' => 'website',
        'canonical' => 'https://disinfoawareness.eu/datenschutz.html',
        'priority' => '0.5',
        'changefreq' => 'yearly',
        'robots' => 'noindex, follow', // Nicht in Suchmaschinen indexieren
    ],

    // Impressum
    'impressum.html' => [
        'title' => 'Impressum – Disinfo Awareness',
        'description' => 'Impressum und rechtliche Angaben von Disinfo Awareness gemäß §5 TMG.',
        'keywords' => 'Impressum, rechtliche Hinweise, Kontaktdaten',
        'og_type' => 'website',
        'canonical' => 'https://disinfoawareness.eu/impressum.html',
        'priority' => '0.5',
        'changefreq' => 'yearly',
        'robots' => 'noindex, follow', // Nicht in Suchmaschinen indexieren
    ],
];

// =============================================================================
// HELPER-FUNKTIONEN
// =============================================================================

/**
 * Gibt die vollständigen SEO Meta-Tags für eine bestimmte Seite aus
 *
 * @param string $page_key Der Dateiname der Seite (z.B. 'index.html')
 * @return void
 */
function render_seo_meta_tags($page_key) {
    global $seo_global, $seo_pages;

    // Prüfen ob Seite existiert
    if (!isset($seo_pages[$page_key])) {
        $page_key = 'index.html'; // Fallback zur Homepage
    }

    $page = $seo_pages[$page_key];
    $title = $page['title'];
    $description = $page['description'];
    $canonical = $page['canonical'] ?? $seo_global['site_url'] . '/' . $page_key;
    $og_image = $page['og_image'] ?? $seo_global['default_og_image'];
    $og_image_alt = $page['og_image_alt'] ?? $title;
    $og_type = $page['og_type'] ?? 'website';
    $robots = $page['robots'] ?? 'index, follow';

    // Basic Meta Tags
    echo "    <!-- SEO Meta Tags -->\n";
    echo "    <title>{$title}</title>\n";
    echo "    <meta name=\"description\" content=\"{$description}\">\n";

    if (isset($page['keywords'])) {
        echo "    <meta name=\"keywords\" content=\"{$page['keywords']}\">\n";
    }

    echo "    <meta name=\"robots\" content=\"{$robots}\">\n";
    echo "    <link rel=\"canonical\" href=\"{$canonical}\">\n";
    echo "    <meta name=\"language\" content=\"{$seo_global['default_language']}\">\n";
    echo "\n";

    // Open Graph Tags (Facebook, LinkedIn, etc.)
    echo "    <!-- Open Graph Meta Tags -->\n";
    echo "    <meta property=\"og:type\" content=\"{$og_type}\">\n";
    echo "    <meta property=\"og:title\" content=\"{$title}\">\n";
    echo "    <meta property=\"og:description\" content=\"{$description}\">\n";
    echo "    <meta property=\"og:url\" content=\"{$canonical}\">\n";
    echo "    <meta property=\"og:site_name\" content=\"{$seo_global['site_name']}\">\n";
    echo "    <meta property=\"og:locale\" content=\"{$seo_global['locale']}\">\n";
    echo "    <meta property=\"og:image\" content=\"{$og_image}\">\n";
    echo "    <meta property=\"og:image:alt\" content=\"{$og_image_alt}\">\n";
    echo "    <meta property=\"og:image:width\" content=\"{$seo_global['default_og_image_width']}\">\n";
    echo "    <meta property=\"og:image:height\" content=\"{$seo_global['default_og_image_height']}\">\n";
    echo "\n";

    // Twitter Card Tags
    echo "    <!-- Twitter Card Meta Tags -->\n";
    echo "    <meta name=\"twitter:card\" content=\"summary_large_image\">\n";
    echo "    <meta name=\"twitter:title\" content=\"{$title}\">\n";
    echo "    <meta name=\"twitter:description\" content=\"{$description}\">\n";
    echo "    <meta name=\"twitter:image\" content=\"{$og_image}\">\n";
    echo "    <meta name=\"twitter:image:alt\" content=\"{$og_image_alt}\">\n";

    if (!empty($seo_global['twitter_handle'])) {
        echo "    <meta name=\"twitter:site\" content=\"{$seo_global['twitter_handle']}\">\n";
        echo "    <meta name=\"twitter:creator\" content=\"{$seo_global['twitter_handle']}\">\n";
    }
    echo "\n";
}

/**
 * Gibt die Favicon-Links aus
 *
 * @return void
 */
function render_favicon_tags() {
    global $seo_global;

    echo "    <!-- Favicon & App Icons -->\n";
    echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"{$seo_global['favicon_ico']}\">\n";
    echo "    <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"{$seo_global['favicon_16']}\">\n";
    echo "    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"{$seo_global['favicon_32']}\">\n";
    echo "    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"{$seo_global['apple_touch_icon']}\">\n";
    echo "    <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\" href=\"{$seo_global['android_chrome_192']}\">\n";
    echo "    <link rel=\"icon\" type=\"image/png\" sizes=\"512x512\" href=\"{$seo_global['android_chrome_512']}\">\n";
    echo "    <link rel=\"manifest\" href=\"{$seo_global['manifest']}\">\n";
    echo "    <meta name=\"theme-color\" content=\"{$seo_global['theme_color']}\">\n";
    echo "    <meta name=\"msapplication-TileColor\" content=\"{$seo_global['theme_color']}\">\n";
    echo "\n";
}

/**
 * Gibt Schema.org JSON-LD strukturierte Daten aus
 *
 * @param string $page_key Der Dateiname der Seite
 * @return void
 */
function render_schema_org($page_key) {
    global $seo_global, $seo_pages;

    if (!isset($seo_pages[$page_key])) {
        $page_key = 'index.html';
    }

    $page = $seo_pages[$page_key];
    $canonical = $page['canonical'] ?? $seo_global['site_url'] . '/' . $page_key;

    echo "    <!-- Schema.org Structured Data -->\n";
    echo "    <script type=\"application/ld+json\">\n";

    // Organization Schema (für Homepage)
    if ($page_key === 'index.html') {
        echo "    {\n";
        echo "      \"@context\": \"https://schema.org\",\n";
        echo "      \"@type\": \"Organization\",\n";
        echo "      \"name\": \"{$seo_global['organization_name']}\",\n";
        echo "      \"url\": \"{$seo_global['site_url']}\",\n";
        echo "      \"logo\": \"{$seo_global['organization_logo']}\",\n";
        echo "      \"email\": \"{$seo_global['organization_email']}\",\n";
        echo "      \"description\": \"{$page['description']}\",\n";
        echo "      \"sameAs\": [";

        $social = [];
        if (!empty($seo_global['facebook_page'])) $social[] = "\"{$seo_global['facebook_page']}\"";
        if (!empty($seo_global['linkedin_page'])) $social[] = "\"{$seo_global['linkedin_page']}\"";
        echo implode(",\n        ", $social);

        echo "]\n";
        echo "    }\n";
    } else {
        // WebPage Schema (für andere Seiten)
        echo "    {\n";
        echo "      \"@context\": \"https://schema.org\",\n";
        echo "      \"@type\": \"WebPage\",\n";
        echo "      \"name\": \"{$page['title']}\",\n";
        echo "      \"description\": \"{$page['description']}\",\n";
        echo "      \"url\": \"{$canonical}\",\n";
        echo "      \"inLanguage\": \"{$seo_global['default_language']}\",\n";
        echo "      \"publisher\": {\n";
        echo "        \"@type\": \"Organization\",\n";
        echo "        \"name\": \"{$seo_global['organization_name']}\",\n";
        echo "        \"url\": \"{$seo_global['site_url']}\"\n";
        echo "      }\n";
        echo "    }\n";
    }

    echo "    </script>\n";
}

/**
 * Gibt alle SEO-relevanten Meta-Tags aus (komplettes Paket)
 *
 * @param string $page_key Der Dateiname der Seite (z.B. 'index.html')
 * @return void
 */
function render_complete_seo($page_key) {
    render_seo_meta_tags($page_key);
    render_favicon_tags();
    render_schema_org($page_key);
}

/**
 * Gibt den Seitentitel zurück
 *
 * @param string $page_key Der Dateiname der Seite
 * @return string
 */
function get_page_title($page_key) {
    global $seo_pages;
    return $seo_pages[$page_key]['title'] ?? 'Disinfo Awareness';
}

/**
 * Gibt die Seitenbeschreibung zurück
 *
 * @param string $page_key Der Dateiname der Seite
 * @return string
 */
function get_page_description($page_key) {
    global $seo_pages;
    return $seo_pages[$page_key]['description'] ?? '';
}
