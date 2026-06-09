<?php
$page_title    = 'Schulprojekte – Medienkompetenz der nächsten Generation | Disinfo Awareness';
$page_desc     = 'Wir stärken junge Menschen im kritischen Umgang mit Informationen – durch praxisnahe Workshops, die über reine Media Literacy hinausgehen. Österreichweit.';
$page_canonical = 'https://disinfoawareness.eu/schulprojekte.php';
$og_type       = 'article';
$og_title      = 'Schulprojekte – Medienkompetenz der nächsten Generation';
$og_image_alt  = 'Schulprojekte gegen Desinformation';
$schema_json   = '{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Schulprojekte – Medienkompetenz der nächsten Generation",
  "description": "Wir stärken junge Menschen im kritischen Umgang mit Informationen – durch praxisnahe Workshops, die über reine Media Literacy hinausgehen.",
  "url": "https://disinfoawareness.eu/schulprojekte.php",
  "inLanguage": "de",
  "publisher": { "@type": "Organization", "name": "Disinfo Awareness", "url": "https://disinfoawareness.eu" }
}';

require __DIR__ . '/includes/project-page-head.php';
?>
<body>

<a href="#main-content" class="skip-link">Zum Hauptinhalt springen</a>
<?php require __DIR__ . '/includes/nav.php'; ?>

<main id="main-content" role="main">

    <header class="hero">
        <div id="canvas-container"></div>
        <div class="hero-content">
            <div class="hero-subtitle fade-in">Unsere Arbeit</div>
            <h1 class="fade-in" style="transition-delay: 0.1s;">Schul-<br>projekte</h1>
            <p class="fade-in hero-p" style="transition-delay: 0.2s;">
                Wir stärken junge Menschen im kritischen Umgang mit Informationen – durch praxisnahe Workshops, die über reine Media Literacy hinausgehen.
            </p>
        </div>
    </header>

    <section class="grid-wrapper content-split">
        <div class="card-item text-card fade-in">
            <div class="card-content">
                <h3>Warum Schulen?</h3>
                <p>Junge Menschen sind gleichzeitig eine der wichtigsten Zielgruppen gezielter Informationsmanipulation und eine der wirkungsvollsten Gruppen für nachhaltige Resilienzbildung.</p>
                <p>Wer früh lernt, manipulative Muster zu erkennen, trägt dieses Wissen ein Leben lang – und gibt es weiter. <strong>Der Multiplikator-Effekt in Schulen ist enorm.</strong></p>
            </div>
        </div>
        <div class="card-item fade-in" style="transition-delay: 0.1s;">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1122&auto=format&fit=crop');"></div>
            <div class="card-content"><h3>Wissen für<br>die Zukunft</h3></div>
        </div>
    </section>

    <section class="grid-wrapper content-split swap-desktop">
        <div class="card-item text-card fade-in">
            <div class="card-content">
                <h3>Mehr als Media Literacy</h3>
                <p>Unsere Workshops erklären, <strong>warum</strong> Desinformation funktioniert – welche psychologischen Mechanismen sie nutzt, welche Akteure dahinterstecken und wie man sich schützt, ohne in Zynismus zu verfallen.</p>
                <p>Interaktive Einheiten von 2–4 Stunden, angepasst ab der 5. Schulstufe. Wir kommen zu euch – österreichweit.</p>
            </div>
        </div>
        <div class="card-item fade-in">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1170&auto=format&fit=crop');"></div>
            <div class="card-content"><h3>Praxis &amp;<br>Interaktion</h3></div>
        </div>
    </section>

    <section class="cta-section fade-in">
        <h2>Workshop anfragen</h2>
        <p style="margin: 0 auto 2rem auto;">Sie sind Lehrkraft oder Schulleitung und möchten einen Workshop buchen? Wir melden uns bei Ihnen.</p>
        <a href="https://disinfoawareness.eu/kontakt.php" class="cta-btn" aria-label="Workshop anfragen">Anfrage senden</a>
    </section>

    <section class="cta-section fade-in">
        <h2 style="margin-bottom: 1.5rem;">Jetzt Spenden</h2>
        <p style="margin: 0 auto 2rem auto;">Demokratie ist kein Selbstläufer. Jede Spende hält unsere Aufklärungsarbeit am Laufen – unabhängig, unbestechlich, wirkungsorientiert.</p>
        <a href="https://disinfoawareness.eu/spenden.php" class="cta-btn" aria-label="Jetzt spenden">Jetzt spenden</a>
    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
