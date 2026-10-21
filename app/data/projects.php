<?php
/**
 * The four project areas, in the order shown on the site.
 *
 * Each entry feeds:
 *   - the home page: the 'featured' project opens the page as its hero
 *     ('title', 'card.text', 'slides'), the others get a card ('name', 'card')
 *   - its own project page                     ('meta', 'lead', 'slides' or 'sections', 'cta')
 *   - navigation, footer and sitemap           ('name', 'path')
 * Template of the project pages: app/views/pages/project.php
 *
 * Text is plain text and gets escaped — EXCEPT 'sections.*.text', which is
 * trusted HTML so paragraphs can use <strong>.
 * Lists of strings ('title', 'image_title') are rendered with line breaks.
 *
 * Photos are names in assets/img/ without the width suffix, e.g. 'projekte/diaspora-1'
 * for projekte/diaspora-1-800.webp + projekte/diaspora-1-1600.webp.
 * How to replace a photo: design/Design-Baseline.md, section "Fotos austauschen".
 *
 * 'subject' preselects the subject of the contact form behind the CTA button
 * (a key of config('contact.subjects')).
 */

return [
    'gemeinde' => [
        'path'     => '/gemeinde.php',
        'name'     => 'Gemeinde-Aufklärung',
        'title'    => ['Gemeinde-', 'Aufklärung'],
        'featured' => true,  // our main project: opens the home page
        'subject'  => 'workshop',
        'card'     => [
            'text' => 'Desinformation unterscheidet nicht zwischen Stadt und Land – die Abwehr sollte das auch nicht. Wir schulen Multiplikator:innen vor Ort, damit Resilienz auch abseits urbaner Zentren entsteht.',
        ],
        'meta' => [
            'title'        => 'Gemeinde-Aufklärung – Resilienz abseits urbaner Zentren | Disinfo Awareness',
            'og_title'     => 'Gemeinde-Aufklärung – Resilienz abseits urbaner Zentren',
            'description'  => 'Wir schulen Multiplikator:innen vor Ort, damit Resilienz gegen Desinformation auch abseits urbaner Zentren entsteht. Gemeinde-Aufklärung in ländlichen Regionen.',
            'og_image_alt' => 'Gemeinde-Aufklärung gegen Desinformation',
        ],
        'lead'   => 'Desinformation unterscheidet nicht zwischen Stadt und Land – die Abwehr sollte das auch nicht. Wir schulen Multiplikator:innen vor Ort.',
        // The project description as five slides. Photos 1–4 are Unsplash placeholders
        // until photos from our own events are chosen.
        'slides' => [
            [
                'label'  => '1 · Die Lücke',
                'title'  => 'Wo Kampagnen nicht hinkommen',
                'text'   => 'Staatliche Aufklärung erreicht vor allem urbane, politisch interessierte Menschen. Ländliche Regionen sind unterversorgt und gerade deshalb besonders exponiert.',
                'image'  => 'gemeinde/slide-1',
                'thumb'  => 'gemeinde/thumb-1',
                'alt'    => 'Weite Felder mit einem Bauernhof unter dem Abendhimmel',
                'credit' => 'Foto: Michael Pointner / Unsplash',
            ],
            [
                'label'  => '2 · Vor Ort',
                'title'  => 'Wir kommen in die Gemeinde',
                'text'   => 'Wir gehen in den Gemeindesaal, ins Vereinslokal und an den Stammtisch, also dorthin, wo Information über persönliche Gespräche läuft.',
                'image'  => 'gemeinde/slide-2',
                'thumb'  => 'gemeinde/thumb-2',
                'alt'    => 'Rustikale Gaststube mit Holztischen und Bleiglasfenstern',
                'credit' => 'Foto: Tim Raderschad / Unsplash',
            ],
            [
                'label'  => '3 · Multiplikator:innen',
                'title'  => 'Vertrauen ist der Hebel',
                'text'   => 'Wir schulen Bürgermeister:innen, Gemeinderät:innen, Vereinsvorstände, Lehrkräfte und interessierte Bürger:innen, die ihr Wissen glaubwürdig weitertragen.',
                'image'  => 'gemeinde/slide-3',
                'thumb'  => 'gemeinde/thumb-3',
                'alt'    => 'Ältere Frau im Gespräch an einem Tisch',
                'credit' => 'Foto: Age Cymru / Unsplash',
            ],
            [
                'label'  => '4 · Methode',
                'title'  => 'Dialog statt Frontalvortrag',
                'text'   => 'Es gibt keinen Frontalunterricht. Anhand regionaler Beispiele tauschen sich die Teilnehmenden aus und lernen, manipulative Muster selbst zu erkennen.',
                'image'  => 'gemeinde/slide-4',
                'thumb'  => 'gemeinde/thumb-4',
                'alt'    => 'Menschen diskutieren an einem großen Tisch',
                'credit' => 'Foto: Redd Francisco / Unsplash',
            ],
            [
                'label'  => '5 · Wirkung',
                'title'  => 'Resilienz, die bleibt',
                'text'   => 'Das Wissen wandert in Familie, Verein und Gemeinderat und stärkt so ganze Ortschaften.',
                'image'  => 'gemeinde/slide-5',
                'thumb'  => 'gemeinde/thumb-5',
                'alt'    => 'Vortrag von Disinfo Awareness über ausländische Informationsmanipulation vor Publikum',
                'credit' => null,  // our own photo
            ],
        ],
        'cta' => [
            'title'  => 'Mitmachen',
            'text'   => 'Sie möchten Ihre Gemeinde oder Ihren Verein für Desinformation wappnen? Wir kommen zu Ihnen.',
            'button' => 'Gemeinde anfragen',
        ],
    ],

    'ngobusiness' => [
        'path'    => '/ngobusiness.php',
        'name'    => 'NGO-Business',
        'title'   => ['NGO-', 'Business'],
        'subject' => 'partnerschaft',
        'card'    => [
            'text'  => 'Eine österreichweite Kampagne nutzt parlamentarische Anfragen der FPÖ gezielt gegen den Zivilsektor. Wir zeigen datengetrieben, was dahintersteckt.',
            'image' => 'projekte/ngobusiness-1',
            'alt'   => 'Blick in einen voll besetzten Parlamentssaal',
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
                'image'       => 'projekte/ngobusiness-1',
                'alt'         => 'Blick in einen voll besetzten Parlamentssaal',
                'image_title' => ['Muster', 'sichtbar machen'],
            ],
            [
                'title' => 'Unsere Analyse',
                'text'  => [
                    'Wir werten Anfragetexte, Zeitpunkte und Medienberichterstattung systematisch aus und machen Muster sichtbar, die im einzelnen Dokument nicht erkennbar sind.',
                    'Ein geschwächter Zivilsektor ist ein geschwächtes demokratisches System. Unsere Dokumentation gibt NGOs und der Öffentlichkeit eine fundierte Grundlage – <strong>transparent, quellenbasiert, widerlegbar</strong>.',
                ],
                'image'       => 'projekte/ngobusiness-2',
                'alt'         => 'Grüne Zeichenkolonnen auf einem dunklen Bildschirm',
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
        'path'    => '/schulprojekte.php',
        'name'    => 'Schulprojekte',
        'title'   => ['Schul-', 'projekte'],
        'subject' => 'workshop',
        // New photos from the EP workshop will replace the current ones.
        'card' => [
            'text'  => 'Wir stärken junge Menschen im kritischen Umgang mit Informationen – durch praxisnahe Workshops, die über reine Media Literacy hinausgehen.',
            'image' => 'projekte/schulprojekte-1',
            'alt'   => 'Bücherstapel mit Apfel und Buchstabenwürfeln auf einem Tisch',
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
                'image'       => 'projekte/schulprojekte-1',
                'alt'         => 'Bücherstapel mit Apfel und Buchstabenwürfeln auf einem Tisch',
                'image_title' => ['Wissen für', 'die Zukunft'],
            ],
            [
                'title' => 'Mehr als Media Literacy',
                'text'  => [
                    'Unsere Workshops erklären, <strong>warum</strong> Desinformation funktioniert – welche psychologischen Mechanismen sie nutzt, welche Akteure dahinterstecken und wie man sich schützt, ohne in Zynismus zu verfallen.',
                    'Interaktive Einheiten von 2–4 Stunden, angepasst ab der 5. Schulstufe. Wir kommen zu euch – österreichweit.',
                ],
                'image'       => 'projekte/schulprojekte-2',
                'alt'         => 'Workshop in einem Seminarraum, eine Gruppe hört einem Vortrag zu',
                'image_title' => ['Praxis &', 'Interaktion'],
            ],
        ],
        'cta' => [
            'title'  => 'Workshop anfragen',
            'text'   => 'Sie sind Lehrkraft oder Schulleitung und möchten einen Workshop buchen? Wir melden uns bei Ihnen.',
            'button' => 'Anfrage senden',
        ],
    ],

    'diaspora' => [
        'path'    => '/diaspora.php',
        'name'    => 'Diaspora-Aufklärung',
        'title'   => ['Diaspora-', 'Aufklärung'],
        'subject' => 'partnerschaft',
        'card'    => [
            'text'  => 'Diaspora-Communities sind oft besonders exponiert gegenüber gezielter Informationsmanipulation – und werden in der Aufklärungsarbeit häufig vergessen. Wir ändern das.',
            'image' => 'projekte/diaspora-1',
            'alt'   => 'Eine Gruppe Freund:innen sitzt Arm in Arm und blickt in die Ferne',
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
                'image'       => 'projekte/diaspora-1',
                'alt'         => 'Eine Gruppe Freund:innen sitzt Arm in Arm und blickt in die Ferne',
                'image_title' => ['Vergessene', 'Zielgruppe'],
            ],
            [
                'title' => 'Unser Ansatz',
                'text'  => [
                    'Wir arbeiten mit Community-Organisationen, Vereinen und Kultureinrichtungen zusammen, die das Vertrauen ihrer jeweiligen Communities bereits genießen – denn Aufklärung funktioniert nur über Vertrauen.',
                    'Gemeinsam entwickeln wir <strong>maßgeschneiderte, mehrsprachige</strong> Workshop-Formate und Aufklärungsmaterialien – niedrigschwellig und kulturell sensibel.',
                ],
                'image'       => 'projekte/diaspora-2',
                'alt'         => 'Viele Hände liegen übereinander als Zeichen des Zusammenhalts',
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
