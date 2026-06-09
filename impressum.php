<?php
$page_title    = 'Impressum – Disinfo Awareness';
$page_desc     = 'Impressum und rechtliche Angaben von Disinfo Awareness gemäß §5 TMG.';
$page_canonical = 'https://disinfoawareness.eu/impressum.php';
$og_type       = 'website';
$twitter_card  = 'summary';
$robots        = 'noindex, follow';
$schema_json   = '{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Impressum – Disinfo Awareness",
  "description": "Impressum und rechtliche Angaben von Disinfo Awareness gemäß §5 TMG.",
  "url": "https://disinfoawareness.eu/impressum.php",
  "inLanguage": "de",
  "publisher": { "@type": "Organization", "name": "Disinfo Awareness", "url": "https://disinfoawareness.eu" }
}';

$extra_head = <<<'CSS'
<style>
    h1 { font-size: clamp(3.5rem, 16vw, 12rem); }
    h3 { font-size: 2rem; color: var(--highlight); margin-bottom: 1.5rem; letter-spacing: 1px; }
    h4 { font-size: 1.2rem; color: #888; margin-bottom: 0.5rem; font-family: var(--font-body); text-transform: uppercase; letter-spacing: 2px; font-weight: 600; }
    p, li { font-size: 1rem; color: #b0b0b0; font-weight: 300; max-width: 65ch; margin-bottom: 1rem; }
    .hero { height: 50dvh; min-height: 350px; }
    .hero-subtitle { font-size: clamp(1rem, 2vw, 1.5rem); }
    #canvas-container { opacity: 0.5; }

    .grid-wrapper { display: grid; grid-template-columns: 1fr; width: 100%; }
    @media (min-width: 900px) { .content-split { grid-template-columns: 1fr 2fr; } }

    .info-card {
        padding: 3rem 2rem; border-bottom: 1px solid var(--grid-line);
        background: linear-gradient(to bottom, #0a0a0a, var(--bg-color));
    }
    @media (min-width: 900px) {
        .info-card { border-right: 1px solid var(--grid-line); border-bottom: 1px solid var(--grid-line); padding: 4rem 3rem; }
        .info-card-left { display: flex; align-items: flex-start; justify-content: flex-start; }
        .info-card:nth-child(2n) { border-right: none; }
    }

    .data-row { margin-bottom: 2rem; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 1rem; }
    .data-row:last-child { border-bottom: none; }
    .data-value { color: #fff; font-size: 1.1rem; display: block; }
    .legal-text { font-size: 0.95rem; color: #aaa; line-height: 1.7; text-align: justify; }
</style>
CSS;

require __DIR__ . '/includes/head.php';
?>
<body>

<a href="#main-content" class="skip-link">Zum Hauptinhalt springen</a>
<?php require __DIR__ . '/includes/nav.php'; ?>

<main id="main-content" role="main">

    <header class="hero">
        <div id="canvas-container"></div>
        <div class="hero-content">
            <div class="hero-subtitle fade-in">Offenlegung</div>
            <h1 class="fade-in" style="transition-delay: 0.1s;">Impressum</h1>
            <p class="fade-in" style="transition-delay: 0.2s; margin: 0 auto;">
                Informationen gemäß §5 (1) ECG, § 25 MedienG, § 63 GewO und § 14 UGB.
            </p>
        </div>
    </header>

    <section class="grid-wrapper content-split">
        <div class="info-card info-card-left fade-in">
            <h3>Vereinsdaten</h3>
        </div>
        <div class="info-card fade-in" style="transition-delay: 0.1s;">
            <div class="data-row">
                <h4>Vollständiger Name</h4>
                <span class="data-value">Disinfo Awareness – Verein zur Aufklärung über Desinformation und FIMI (Foreign Information Manipulation Interference) zur Stärkung der Informationsresilienz</span>
            </div>
            <div class="data-row">
                <h4>ZVR-Zahl</h4>
                <span class="data-value">1154237575</span>
            </div>
            <div class="data-row">
                <h4>Zustellanschrift</h4>
                <span class="data-value">Staudingergasse 8/6</span>
                <span class="data-value">1200 Wien</span>
                <span class="data-value">Österreich</span>
            </div>
            <div class="data-row">
                <h4>Zuständige Behörde</h4>
                <span class="data-value">Landespolizeidirektion Wien, Referat Vereins-, Versammlungs- und Medienrechtsangelegenheiten</span>
            </div>
            <div class="data-row">
                <h4>Kontakt</h4>
                <a href="https://disinfoawareness.eu/kontakt.php" class="data-value" style="color: var(--highlight);">Zum Kontaktformular</a>
            </div>
        </div>
    </section>

    <section class="grid-wrapper content-split">
        <div class="info-card info-card-left fade-in">
            <h3>Vertretung</h3>
        </div>
        <div class="info-card fade-in" style="transition-delay: 0.1s;">
            <div class="data-row">
                <h4>Obmann</h4>
                <span class="data-value">Markus Schwinghammer</span>
            </div>
            <div class="data-row">
                <h4>Obmann-Stellvertreter</h4>
                <span class="data-value">Mag. Robert Buchhaus</span>
            </div>
            <div class="data-row">
                <h4>Vertretungsregelung</h4>
                <p style="margin: 0;">Der/Die Obmann/Obfrau vertritt den Verein nach außen. Der/Die Stellvertreter/in vertritt ihn/sie im Falle der Verhinderung.</p>
            </div>
        </div>
    </section>

    <section class="grid-wrapper content-split">
        <div class="info-card info-card-left fade-in">
            <h3>Rechtliches</h3>
        </div>
        <div class="info-card fade-in" style="transition-delay: 0.1s;">
            <div class="data-row">
                <h4>Urheberrecht</h4>
                <p class="legal-text">Die Inhalte dieser Webseite unterliegen, soweit dies rechtlich möglich ist, diversen Schutzrechten (z. B. dem Urheberrecht). Jegliche Verwendung oder Verbreitung von bereitgestelltem Material, welche urheberrechtlich untersagt ist, bedarf schriftlicher Zustimmung des Webseitenbetreibers.</p>
                <p class="legal-text">Die Urheberrechte Dritter werden vom Betreiber dieser Webseite mit größter Sorgfalt beachtet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden derartiger Rechtsverletzungen werden wir den betroffenen Inhalt umgehend entfernen.</p>
            </div>
            <div class="data-row">
                <h4>Haftungsausschluss</h4>
                <p class="legal-text">Trotz sorgfältiger inhaltlicher Kontrolle übernimmt der Webseitenbetreiber dieser Webseite keine Haftung für die Inhalte externer Links. Für den Inhalt der verlinkten Seiten sind ausschließlich deren Betreiber verantwortlich. Sollten Sie dennoch auf ausgehende Links aufmerksam werden, welche auf eine Webseite mit rechtswidriger Tätigkeit oder Information verweisen, ersuchen wir um dementsprechenden Hinweis, um diese nach § 17 Abs. 2 ECG umgehend zu entfernen.</p>
            </div>
            <div class="data-row" style="border: none; padding-top: 1rem;">
                <p style="font-size: 0.8rem; color: #666;">Grundlegende Richtung (Blattlinie): Information über die Tätigkeit des Vereins sowie Förderung der Medienkompetenz und Resilienz gegen Desinformation.</p>
            </div>
        </div>
    </section>

    <section class="grid-wrapper content-split">
        <div class="info-card info-card-left fade-in">
            <h3>Bildnachweise</h3>
        </div>
        <div class="info-card fade-in" style="transition-delay: 0.1s;">
            <div class="data-row">
                <h4>Fotografie</h4>
                <p class="legal-text">Einige auf dieser Website verwendete Fotografien wurden über <a href="https://unsplash.com" target="_blank" rel="noopener">Unsplash</a> bezogen und werden gemäß der <a href="https://unsplash.com/license" target="_blank" rel="noopener">Unsplash-Lizenz</a> verwendet. Die Unsplash-Lizenz erlaubt die kostenlose Nutzung der Bilder für kommerzielle und nicht-kommerzielle Zwecke ohne Namensnennung. Wir bedanken uns bei der Unsplash-Community und den jeweiligen Fotograf:innen für die Bereitstellung ihres Bildmaterials.</p>
            </div>
        </div>
    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
