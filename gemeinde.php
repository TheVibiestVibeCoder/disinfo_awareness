<?php
$page_title    = 'Gemeinde-Aufklärung – Resilienz abseits urbaner Zentren | Disinfo Awareness';
$page_desc     = 'Wir schulen Multiplikator:innen vor Ort, damit Resilienz gegen Desinformation auch abseits urbaner Zentren entsteht. Gemeinde-Aufklärung in ländlichen Regionen.';
$page_canonical = 'https://disinfoawareness.eu/gemeinde.php';
$og_type       = 'article';
$og_title      = 'Gemeinde-Aufklärung – Resilienz abseits urbaner Zentren';
$og_image_alt  = 'Gemeinde-Aufklärung gegen Desinformation';
$schema_json   = '{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Gemeinde-Aufklärung – Resilienz abseits urbaner Zentren",
  "description": "Wir schulen Multiplikator:innen vor Ort, damit Resilienz gegen Desinformation auch abseits urbaner Zentren entsteht.",
  "url": "https://disinfoawareness.eu/gemeinde.php",
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
            <h1 class="fade-in" style="transition-delay: 0.1s;">Gemeinde-<br>Aufklärung</h1>
            <p class="fade-in hero-p" style="transition-delay: 0.2s;">
                Desinformation unterscheidet nicht zwischen Stadt und Land – die Abwehr sollte das auch nicht. Wir schulen Multiplikator:innen vor Ort.
            </p>
        </div>
    </header>

    <section class="grid-wrapper content-split">
        <div class="card-item text-card fade-in">
            <div class="card-content">
                <h3>Die Lücke im ländlichen Raum</h3>
                <p>Staatliche Aufklärungskampagnen erreichen häufig nur urban geprägte, politisch hochinteressierte Bevölkerungsschichten. Ländliche Regionen bleiben strukturell unterversorgt – dabei sind sie oft besonders exponiert gegenüber gezielter Desinformation.</p>
                <p>Wir bringen fundiertes Wissen über hybride Bedrohungen dorthin, wo Information über persönliche Netzwerke fließt: in den Gemeindesaal, den Verein und an den Stammtisch.</p>
            </div>
        </div>
        <div class="card-item fade-in" style="transition-delay: 0.1s;">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1665072204431-b3ba11bd6d06?q=80&w=1738&auto=format&fit=crop');"></div>
            <div class="card-content"><h3>Dialog auf<br>Augenhöhe</h3></div>
        </div>
    </section>

    <section class="grid-wrapper content-split swap-desktop">
        <div class="card-item text-card fade-in">
            <div class="card-content">
                <h3>Multiplikator:innen als Schlüssel</h3>
                <p>Wir schulen Personen, die in ihren Gemeinschaften bereits Vertrauen genießen – Vereinsvorstände, Bürgermeister:innen, Lehrkräfte, Gemeinderäte. Einmal geschult, geben sie ihr Wissen weiter und stärken die Resilienz ganzer Ortschaften.</p>
                <p>Kein Frontalunterricht, keine Belehrung. Wir befähigen Menschen, manipulative Muster selbst zu durchschauen – praxisnah und auf regionale Realitäten zugeschnitten.</p>
            </div>
        </div>
        <div class="card-item fade-in">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1607778417094-1fef13315e6e?q=80&w=1546&auto=format&fit=crop');"></div>
            <div class="card-content"><h3>Wissen,<br>das wirkt</h3></div>
        </div>
    </section>

    <section class="cta-section fade-in">
        <h2>Mitmachen</h2>
        <p>Sie möchten Ihre Gemeinde oder Ihren Verein für Desinformation wappnen? Wir kommen zu Ihnen.</p>
        <a href="https://disinfoawareness.eu/kontakt.php" class="cta-btn" aria-label="Anfrage senden">Anfrage senden</a>
    </section>

    <section class="cta-section fade-in">
        <h2 style="margin-bottom: 1.5rem;">Jetzt Spenden</h2>
        <p>Demokratie ist kein Selbstläufer. Jede Spende hält unsere Aufklärungsarbeit am Laufen – unabhängig, unbestechlich, wirkungsorientiert.</p>
        <a href="https://disinfoawareness.eu/spenden.php" class="cta-btn" aria-label="Jetzt spenden">Jetzt spenden</a>
    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
