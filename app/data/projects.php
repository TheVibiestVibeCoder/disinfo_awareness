<?php
/**
 * The four project areas, in the order shown on the home page.
 *
 * Each entry feeds:
 *   - the teaser card on the home page        ('title', 'card')
 *   - its own project page                     ('meta', 'lead', 'sections', 'cta')
 *   - the sitemap                              ('path')
 * Template of the project pages: app/views/pages/project.php
 *
 * Text is plain text and gets escaped — EXCEPT 'sections.*.text', which is
 * trusted HTML so paragraphs can use <strong>.
 * Lists of strings ('title', 'image_title') are rendered with line breaks.
 */

return [
    'ngobusiness' => [
        'path'  => '/ngobusiness.php',
        'title' => ['NGO-', 'Business'],
        'card'  => [
            'text'  => 'Eine österreichweite Kampagne nutzt parlamentarische Anfragen der FPÖ gezielt gegen den Zivilsektor. Wir zeigen datengetrieben, was dahintersteckt.',
            'image' => 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?q=80&w=1170&auto=format&fit=crop',
        ],
        'meta' => [
            'title'        => 'NGO-Business – Parlamentarische Anfragen als Instrument | Disinfo Awareness',
            'og_title'     => 'NGO-Business – Parlamentarische Anfragen als Instrument',
            'description'  => 'Eine koordinierte Kampagne nutzt parlamentarische Anfragen der FPÖ gezielt gegen den Zivilsektor. Disinfo Awareness zeigt datengetrieben, was dahintersteckt.',
            'og_image_alt' => 'NGO-Business Analyse',
        ],
        'lead'     => 'Eine österreichweite Kampagne nutzt parlamentarische Anfragen der FPÖ gezielt gegen den Zivilsektor. Wir zeigen datengetrieben, was dahintersteckt.',
        'sections' => [
            [
                'title' => 'Koordinierter Druck auf den Zivilsektor',
                'text'  => [
                    'Seit 2025 häufen sich parlamentarische Anfragen, die gezielt auf NGOs und zivilgesellschaftliche Organisationen abzielen – nicht zur parlamentarischen Kontrolle, sondern zur <strong>Stigmatisierung des gesamten Sektors</strong>.',
                    'Das Muster ist systematisch: ähnliche Anfragetexte, koordinierte Medienverwertung, strategisches Framing. Wir dokumentieren und analysieren diese Kampagne.',
                ],
                'image'       => 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?q=80&w=1170&auto=format&fit=crop',
                'image_title' => ['Muster', 'sichtbar machen'],
            ],
            [
                'title' => 'Unsere Analyse',
                'text'  => [
                    'Wir werten Anfragetexte, Zeitpunkte und Medienberichterstattung systematisch aus und machen Muster sichtbar, die im einzelnen Dokument nicht erkennbar sind.',
                    'Ein geschwächter Zivilsektor ist ein geschwächtes demokratisches System. Unsere Dokumentation gibt NGOs und der Öffentlichkeit eine fundierte Grundlage – <strong>transparent, quellenbasiert, widerlegbar</strong>.',
                ],
                'image'       => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=2070&auto=format&fit=crop',
                'image_title' => ['Daten &', 'Fakten'],
            ],
        ],
        'cta' => [
            'title'  => 'Mehr erfahren',
            'text'   => 'Sie sind Teil des Zivilsektors oder möchten unsere Analyse unterstützen? Melden Sie sich.',
            'button' => 'Kontakt aufnehmen',
        ],
    ],

    'schulprojekte' => [
        'path'  => '/schulprojekte.php',
        'title' => ['Schul-', 'projekte'],
        'card'  => [
            'text'  => 'Wir stärken junge Menschen im kritischen Umgang mit Informationen – durch praxisnahe Workshops, die über reine Media Literacy hinausgehen.',
            'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1122&auto=format&fit=crop',
        ],
        'meta' => [
            'title'        => 'Schulprojekte – Medienkompetenz der nächsten Generation | Disinfo Awareness',
            'og_title'     => 'Schulprojekte – Medienkompetenz der nächsten Generation',
            'description'  => 'Wir stärken junge Menschen im kritischen Umgang mit Informationen – durch praxisnahe Workshops, die über reine Media Literacy hinausgehen. Österreichweit.',
            'og_image_alt' => 'Schulprojekte gegen Desinformation',
        ],
        'lead'     => 'Wir stärken junge Menschen im kritischen Umgang mit Informationen – durch praxisnahe Workshops, die über reine Media Literacy hinausgehen.',
        'sections' => [
            [
                'title' => 'Warum Schulen?',
                'text'  => [
                    'Junge Menschen sind gleichzeitig eine der wichtigsten Zielgruppen gezielter Informationsmanipulation und eine der wirkungsvollsten Gruppen für nachhaltige Resilienzbildung.',
                    'Wer früh lernt, manipulative Muster zu erkennen, trägt dieses Wissen ein Leben lang – und gibt es weiter. <strong>Der Multiplikator-Effekt in Schulen ist enorm.</strong>',
                ],
                'image'       => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1122&auto=format&fit=crop',
                'image_title' => ['Wissen für', 'die Zukunft'],
            ],
            [
                'title' => 'Mehr als Media Literacy',
                'text'  => [
                    'Unsere Workshops erklären, <strong>warum</strong> Desinformation funktioniert – welche psychologischen Mechanismen sie nutzt, welche Akteure dahinterstecken und wie man sich schützt, ohne in Zynismus zu verfallen.',
                    'Interaktive Einheiten von 2–4 Stunden, angepasst ab der 5. Schulstufe. Wir kommen zu euch – österreichweit.',
                ],
                'image'       => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1170&auto=format&fit=crop',
                'image_title' => ['Praxis &', 'Interaktion'],
            ],
        ],
        'cta' => [
            'title'  => 'Workshop anfragen',
            'text'   => 'Sie sind Lehrkraft oder Schulleitung und möchten einen Workshop buchen? Wir melden uns bei Ihnen.',
            'button' => 'Anfrage senden',
        ],
    ],

    'gemeinde' => [
        'path'  => '/gemeinde.php',
        'title' => ['Gemeinde-', 'Aufklärung'],
        'card'  => [
            'text'  => 'Desinformation unterscheidet nicht zwischen Stadt und Land – die Abwehr sollte das auch nicht. Wir schulen Multiplikator:innen vor Ort, damit Resilienz auch abseits urbaner Zentren entsteht.',
            'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?q=80&w=1074&auto=format&fit=crop',
        ],
        'meta' => [
            'title'        => 'Gemeinde-Aufklärung – Resilienz abseits urbaner Zentren | Disinfo Awareness',
            'og_title'     => 'Gemeinde-Aufklärung – Resilienz abseits urbaner Zentren',
            'description'  => 'Wir schulen Multiplikator:innen vor Ort, damit Resilienz gegen Desinformation auch abseits urbaner Zentren entsteht. Gemeinde-Aufklärung in ländlichen Regionen.',
            'og_image_alt' => 'Gemeinde-Aufklärung gegen Desinformation',
        ],
        'lead'     => 'Desinformation unterscheidet nicht zwischen Stadt und Land – die Abwehr sollte das auch nicht. Wir schulen Multiplikator:innen vor Ort.',
        'sections' => [
            [
                'title' => 'Die Lücke im ländlichen Raum',
                'text'  => [
                    'Staatliche Aufklärungskampagnen erreichen häufig nur urban geprägte, politisch hochinteressierte Bevölkerungsschichten. Ländliche Regionen bleiben strukturell unterversorgt – dabei sind sie oft besonders exponiert gegenüber gezielter Desinformation.',
                    'Wir bringen fundiertes Wissen über hybride Bedrohungen dorthin, wo Information über persönliche Netzwerke fließt: in den Gemeindesaal, den Verein und an den Stammtisch.',
                ],
                'image'       => 'https://images.unsplash.com/photo-1665072204431-b3ba11bd6d06?q=80&w=1738&auto=format&fit=crop',
                'image_title' => ['Dialog auf', 'Augenhöhe'],
            ],
            [
                'title' => 'Multiplikator:innen als Schlüssel',
                'text'  => [
                    'Wir schulen Personen, die in ihren Gemeinschaften bereits Vertrauen genießen – Vereinsvorstände, Bürgermeister:innen, Lehrkräfte, Gemeinderäte. Einmal geschult, geben sie ihr Wissen weiter und stärken die Resilienz ganzer Ortschaften.',
                    'Kein Frontalunterricht, keine Belehrung. Wir befähigen Menschen, manipulative Muster selbst zu durchschauen – praxisnah und auf regionale Realitäten zugeschnitten.',
                ],
                'image'       => 'https://images.unsplash.com/photo-1607778417094-1fef13315e6e?q=80&w=1546&auto=format&fit=crop',
                'image_title' => ['Wissen,', 'das wirkt'],
            ],
        ],
        'cta' => [
            'title'  => 'Mitmachen',
            'text'   => 'Sie möchten Ihre Gemeinde oder Ihren Verein für Desinformation wappnen? Wir kommen zu Ihnen.',
            'button' => 'Anfrage senden',
        ],
    ],

    'diaspora' => [
        'path'  => '/diaspora.php',
        'title' => ['Diaspora-', 'Aufklärung'],
        'card'  => [
            'text'  => 'Diaspora-Communities sind oft besonders exponiert gegenüber gezielter Informationsmanipulation – und werden in der Aufklärungsarbeit häufig vergessen. Wir ändern das.',
            'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=2069&auto=format&fit=crop',
        ],
        'meta' => [
            'title'        => 'Diaspora-Aufklärung – Gezielte Unterstützung für exponierte Communities | Disinfo Awareness',
            'og_title'     => 'Diaspora-Aufklärung – Gezielte Unterstützung für exponierte Communities',
            'description'  => 'Diaspora-Communities sind oft besonders exponiert gegenüber gezielter Informationsmanipulation – und werden häufig vergessen. Disinfo Awareness ändert das.',
            'og_image_alt' => 'Diaspora-Aufklärung gegen Desinformation',
        ],
        'lead'     => 'Diaspora-Communities sind oft besonders exponiert gegenüber gezielter Informationsmanipulation – und werden in der Aufklärungsarbeit häufig vergessen. Wir ändern das.',
        'sections' => [
            [
                'title' => 'Besondere Verwundbarkeit',
                'text'  => [
                    'Diaspora-Communities bewegen sich in zwei Informationsräumen gleichzeitig: dem Herkunftsland und dem Aufnahmeland. Staatliche Akteure nutzen diesen doppelten Raum gezielt aus – häufig mit Inhalten in der Herkunftssprache, die auf westliche Faktenchecks nie stoßen.',
                    'Bestehende Aufklärungsangebote richten sich fast ausschließlich an <strong>deutschsprachige, akademisch geprägte Zielgruppen</strong>. Diaspora-Communities bleiben strukturell unterversorgt.',
                ],
                'image'       => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=2069&auto=format&fit=crop',
                'image_title' => ['Vergessene', 'Zielgruppe'],
            ],
            [
                'title' => 'Unser Ansatz',
                'text'  => [
                    'Wir arbeiten mit Community-Organisationen, Vereinen und Kultureinrichtungen zusammen, die das Vertrauen ihrer jeweiligen Communities bereits genießen – denn Aufklärung funktioniert nur über Vertrauen.',
                    'Gemeinsam entwickeln wir <strong>maßgeschneiderte, mehrsprachige</strong> Workshop-Formate und Aufklärungsmaterialien – niedrigschwellig und kulturell sensibel.',
                ],
                'image'       => 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=2070&auto=format&fit=crop',
                'image_title' => ['Vertrauen &', 'Kooperation'],
            ],
        ],
        'cta' => [
            'title'  => 'Kooperieren',
            'text'   => 'Sie vertreten eine Community-Organisation oder möchten ein gemeinsames Aufklärungsformat entwickeln? Wir freuen uns auf den Austausch.',
            'button' => 'Kooperation anfragen',
        ],
    ],
];
