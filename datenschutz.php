<?php
$page_title    = 'Datenschutzerklärung – Disinfo Awareness';
$page_desc     = 'Datenschutzerklärung von Disinfo Awareness: Informationen zur Verarbeitung personenbezogener Daten gemäß DSGVO.';
$page_canonical = 'https://disinfoawareness.eu/datenschutz.php';
$og_type       = 'website';
$twitter_card  = 'summary';
$robots        = 'noindex, follow';
$schema_json   = '{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Datenschutzerklärung – Disinfo Awareness",
  "description": "Datenschutzerklärung von Disinfo Awareness: Informationen zur Verarbeitung personenbezogener Daten gemäß DSGVO.",
  "url": "https://disinfoawareness.eu/datenschutz.php",
  "inLanguage": "de",
  "publisher": { "@type": "Organization", "name": "Disinfo Awareness", "url": "https://disinfoawareness.eu" }
}';

$extra_head = <<<'CSS'
<style>
    h1 { font-size: clamp(3.5rem, 16vw, 12rem); }
    h3 { font-size: 2rem; color: var(--highlight); margin-bottom: 1.5rem; letter-spacing: 1px; }
    h4 { font-size: 1.3rem; color: #fff; margin-bottom: 0.8rem; margin-top: 1.5rem; font-family: var(--font-head); letter-spacing: 1px; }
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
</style>
CSS;

require __DIR__ . '/includes/head.php';
?>
<body>

<?php require __DIR__ . '/includes/nav.php'; ?>

<main id="main-content" role="main">

    <header class="hero">
        <div id="canvas-container"></div>
        <div class="hero-content">
            <div class="hero-subtitle fade-in">Informationspflicht</div>
            <h1 class="fade-in" style="transition-delay: 0.1s;">Datenschutz</h1>
            <p class="fade-in" style="transition-delay: 0.2s; margin: 0 auto;">
                Erklärung zur Informationspflicht / Datenschutzerklärung
            </p>
        </div>
    </header>

    <section class="grid-wrapper content-split">
        <div class="info-card info-card-left fade-in">
            <h3>Grundlagen</h3>
        </div>
        <div class="info-card fade-in" style="transition-delay: 0.1s;">
            <p>Der Schutz Ihrer persönlichen Daten ist uns ein besonderes Anliegen. Wir verarbeiten Ihre Daten daher ausschließlich auf Grundlage der gesetzlichen Bestimmungen (DSGVO, TKG 2003).</p>
            <h4>1. Kontaktaufnahme &amp; PDF-Zusendung</h4>
            <p>Wenn Sie uns per E-Mail oder über das Kontaktformular kontaktieren oder ein PDF anfordern, verarbeiten wir Ihre angegebenen Daten (z. B. Name, E-Mail-Adresse) zur Bearbeitung Ihrer Anfrage und zur Übermittlung des Dokuments. Diese Daten werden sechs Monate gespeichert und nicht ohne Ihre Einwilligung weitergegeben.</p>
            <p style="font-size: 0.9rem; color: #888;">Rechtsgrundlage: Art. 6 Abs. 1 lit. b bzw. a DSGVO.</p>
        </div>
    </section>

    <section class="grid-wrapper content-split">
        <div class="info-card info-card-left fade-in">
            <h3>Technik</h3>
        </div>
        <div class="info-card fade-in" style="transition-delay: 0.1s;">
            <h4>2. Zugriff auf unsere Website</h4>
            <p>Beim Besuch unserer Website werden Ihre IP-Adresse sowie Beginn und Ende der Sitzung erfasst. Dies ist technisch notwendig und dient unserem berechtigten Interesse gemäß Art. 6 Abs. 1 lit. f DSGVO.</p>
            <h4>3. Cookies</h4>
            <p>Unsere Website verwendet Cookies, um benutzerfreundliche Funktionen bereitzustellen. Sie können das Setzen von Cookies im Browser unterbinden. Die Deaktivierung kann jedoch die Funktionalität einschränken.</p>
        </div>
    </section>

    <section class="grid-wrapper content-split">
        <div class="info-card info-card-left fade-in">
            <h3>Ihre Rechte</h3>
        </div>
        <div class="info-card fade-in" style="transition-delay: 0.1s;">
            <h4>4. Betroffenenrechte</h4>
            <p>Sie haben das Recht auf Auskunft, Berichtigung, Löschung, Einschränkung, Datenübertragbarkeit sowie Widerspruch. Bei Datenschutzverstößen können Sie sich bei uns oder der österreichischen Datenschutzbehörde beschweren.</p>
            <div style="margin-top: 3rem; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 2rem;">
                <h4>Kontakt für Datenschutz</h4>
                <p><strong>Disinfo Awareness</strong><br>E-Mail: <a href="https://disinfoawareness.eu/kontakt.php">Kontaktformular</a></p>
            </div>
        </div>
    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
