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
        'theme_color' => '#f1f2eb',                      // keep in sync with --cream in tokens.css
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
        // Subject chips of the form. The key is used in links that preselect a subject,
        // e.g. /kontakt.php?betreff=workshop; the label becomes the e-mail subject.
        // While an event is upcoming, its subject is added (app/data/event.php).
        'subjects'   => [
            'allgemein'     => 'Allgemeine Anfrage',
            'workshop'      => 'Workshop Buchung',
            'presse'        => 'Presse',
            'partnerschaft' => 'Partnerschaft',
        ],
        'rate_limit' => ['max' => 3, 'window' => 600],   // max messages per session per window (seconds)
    ],

    'social' => [
        // TODO before going live: confirm the URL of the association's LinkedIn page.
        'linkedin' => 'https://www.linkedin.com/company/disinfo-awareness/',
    ],

    'bank' => [
        'holder'    => 'Disinfo Awareness',
        'iban'      => 'AT86 2011 1857 6215 7900',
        'bic'       => 'GIBAATWWXXX',
        'reference' => 'Spende Disinfo Awareness',
        'qr_image'  => 'img/bank-qr.jpg',                // in assets/
    ],
];
