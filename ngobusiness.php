<?php
$page_title    = 'NGO-Business – Parlamentarische Anfragen als Instrument | Disinfo Awareness';
$page_desc     = 'Eine koordinierte Kampagne nutzt parlamentarische Anfragen der FPÖ gezielt gegen den Zivilsektor. Disinfo Awareness zeigt datengetrieben, was dahintersteckt.';
$page_canonical = 'https://disinfoawareness.eu/ngobusiness.php';
$og_type       = 'article';
$og_title      = 'NGO-Business – Parlamentarische Anfragen als Instrument';
$og_image_alt  = 'NGO-Business Analyse';
$schema_json   = '{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "NGO-Business – Parlamentarische Anfragen als Instrument",
  "description": "Eine koordinierte Kampagne nutzt parlamentarische Anfragen der FPÖ gezielt gegen den Zivilsektor. Wir zeigen datengetrieben, was dahintersteckt.",
  "url": "https://disinfoawareness.eu/ngobusiness.php",
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
            <h1 class="fade-in" style="transition-delay: 0.1s;">NGO-<br>Business</h1>
            <p class="fade-in hero-p" style="transition-delay: 0.2s;">
                Eine österreichweite Kampagne nutzt parlamentarische Anfragen der FPÖ gezielt gegen den Zivilsektor. Wir zeigen datengetrieben, was dahintersteckt.
            </p>
        </div>
    </header>

    <section class="grid-wrapper content-split">
        <div class="card-item text-card fade-in">
            <div class="card-content">
                <h3>Koordinierter Druck auf den Zivilsektor</h3>
                <p>Seit 2025 häufen sich parlamentarische Anfragen, die gezielt auf NGOs und zivilgesellschaftliche Organisationen abzielen – nicht zur parlamentarischen Kontrolle, sondern zur <strong>Stigmatisierung des gesamten Sektors</strong>.</p>
                <p>Das Muster ist systematisch: ähnliche Anfragetexte, koordinierte Medienverwertung, strategisches Framing. Wir dokumentieren und analysieren diese Kampagne.</p>
            </div>
        </div>
        <div class="card-item fade-in" style="transition-delay: 0.1s;">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?q=80&w=1170&auto=format&fit=crop');"></div>
            <div class="card-content"><h3>Muster<br>sichtbar machen</h3></div>
        </div>
    </section>

    <section class="grid-wrapper content-split swap-desktop">
        <div class="card-item text-card fade-in">
            <div class="card-content">
                <h3>Unsere Analyse</h3>
                <p>Wir werten Anfragetexte, Zeitpunkte und Medienberichterstattung systematisch aus und machen Muster sichtbar, die im einzelnen Dokument nicht erkennbar sind.</p>
                <p>Ein geschwächter Zivilsektor ist ein geschwächtes demokratisches System. Unsere Dokumentation gibt NGOs und der Öffentlichkeit eine fundierte Grundlage – <strong>transparent, quellenbasiert, widerlegbar</strong>.</p>
            </div>
        </div>
        <div class="card-item fade-in">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=2070&auto=format&fit=crop');"></div>
            <div class="card-content"><h3>Daten &amp;<br>Fakten</h3></div>
        </div>
    </section>

    <section class="cta-section fade-in">
        <h2>Mehr erfahren</h2>
        <p>Sie sind Teil des Zivilsektors oder möchten unsere Analyse unterstützen? Melden Sie sich.</p>
        <a href="https://disinfoawareness.eu/kontakt.php" class="cta-btn" aria-label="Kontakt aufnehmen">Kontakt aufnehmen</a>
    </section>

    <section class="cta-section fade-in">
        <h2 style="margin-bottom: 1.5rem;">Jetzt Spenden</h2>
        <p>Demokratie ist kein Selbstläufer. Jede Spende hält unsere Aufklärungsarbeit am Laufen – unabhängig, unbestechlich, wirkungsorientiert.</p>
        <a href="https://disinfoawareness.eu/spenden.php" class="cta-btn" aria-label="Jetzt spenden">Jetzt spenden</a>
    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
