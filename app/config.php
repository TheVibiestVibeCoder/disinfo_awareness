<?php
/**
 * Site-wide settings. Every value that is not page content lives here.
 * Read with config('section.key'), e.g. config('bank.iban').
 */

return [
    'site' => [
        'name'        => 'Disinfo Awareness',
        'url'         => 'https://disinfoawareness.eu',  // canonical origin, no trailing slash
        'lang'        => 'de',
        'locale'      => 'de_DE',
        'theme_color' => '#050505',                      // keep in sync with --color-bg
        'description' => 'Disinfo Awareness bekämpft Desinformation in ländlichen Regionen durch Aufklärung, innovative Strategien und nachhaltige Bildungsprojekte.',
    ],

    // Defaults for social sharing previews (pages can override per page).
    'seo' => [
        'og_image'     => 'https://hosting.disinfoconsulting.eu/wp-content/uploads/2026/01/Gemini_Generated_Image_gsrva8gsrva8gsrv.png',
        'og_image_alt' => 'Disinfo Awareness – Gegen Desinformation',
        'twitter'      => '@disinfoawareness',
    ],

    'contact' => [
        'email'      => 'kontakt@disinfoawareness.eu',   // public address (Schema.org)
        'recipient'  => 'kontakt@disinfoconsulting.eu',  // where form messages are delivered
        'sender'     => 'kontakt@disinfoconsulting.eu',  // fixed From: address of form mails
        'subjects'   => ['Allgemeine Anfrage', 'Workshop Buchung', 'Presse', 'Partnerschaft'],
        'rate_limit' => ['max' => 3, 'window' => 600],   // max messages per session per window (seconds)
    ],

    'social' => [
        'linkedin' => 'https://www.linkedin.com/in/markus-schwinghammer-335a0b201/',
    ],

    'bank' => [
        'holder'    => 'Disinfo Awareness',
        'iban'      => 'AT86 2011 1857 6215 7900',
        'bic'       => 'GIBAATWWXXX',
        'reference' => 'Spende Disinfo Awareness',
        'qr_image'  => 'https://hosting.disinfoconsulting.eu/wp-content/uploads/2026/06/Bank_QR.jpeg',
    ],

    // Third-party front-end resources.
    'vendor' => [
        'fonts' => 'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Manrope:wght@300;400;600&display=swap',
        'three' => 'https://unpkg.com/three@0.160.0/build/three.module.js',
    ],
];
