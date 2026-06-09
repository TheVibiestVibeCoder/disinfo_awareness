<?php
$page_title    = 'Diaspora-Aufklärung – Gezielte Unterstützung für exponierte Communities | Disinfo Awareness';
$page_desc     = 'Diaspora-Communities sind oft besonders exponiert gegenüber gezielter Informationsmanipulation – und werden häufig vergessen. Disinfo Awareness ändert das.';
$page_canonical = 'https://disinfoawareness.eu/diaspora.php';
$og_type       = 'article';
$og_title      = 'Diaspora-Aufklärung – Gezielte Unterstützung für exponierte Communities';
$og_image_alt  = 'Diaspora-Aufklärung gegen Desinformation';
$schema_json   = '{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Diaspora-Aufklärung – Gezielte Unterstützung für exponierte Communities",
  "description": "Diaspora-Communities sind oft besonders exponiert gegenüber gezielter Informationsmanipulation – und werden häufig vergessen. Wir ändern das.",
  "url": "https://disinfoawareness.eu/diaspora.php",
  "inLanguage": "de",
  "publisher": { "@type": "Organization", "name": "Disinfo Awareness", "url": "https://disinfoawareness.eu" }
}';

require __DIR__ . '/includes/project-page-head.php';
?>
<body>

<?php require __DIR__ . '/includes/nav.php'; ?>

<main id="main-content" role="main">

    <header class="hero">
        <div id="canvas-container"></div>
        <div class="hero-content">
            <div class="hero-subtitle fade-in">Unsere Arbeit</div>
            <h1 class="fade-in" style="transition-delay: 0.1s;">Diaspora-<br>Aufklärung</h1>
            <p class="fade-in hero-p" style="transition-delay: 0.2s;">
                Diaspora-Communities sind oft besonders exponiert gegenüber gezielter Informationsmanipulation – und werden in der Aufklärungsarbeit häufig vergessen. Wir ändern das.
            </p>
        </div>
    </header>

    <section class="grid-wrapper content-split">
        <div class="card-item text-card fade-in">
            <div class="card-content">
                <h3>Besondere Verwundbarkeit</h3>
                <p>Diaspora-Communities bewegen sich in zwei Informationsräumen gleichzeitig: dem Herkunftsland und dem Aufnahmeland. Staatliche Akteure nutzen diesen doppelten Raum gezielt aus – häufig mit Inhalten in der Herkunftssprache, die auf westliche Faktenchecks nie stoßen.</p>
                <p>Bestehende Aufklärungsangebote richten sich fast ausschließlich an <strong>deutschsprachige, akademisch geprägte Zielgruppen</strong>. Diaspora-Communities bleiben strukturell unterversorgt.</p>
            </div>
        </div>
        <div class="card-item fade-in" style="transition-delay: 0.1s;">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=2069&auto=format&fit=crop');"></div>
            <div class="card-content"><h3>Vergessene<br>Zielgruppe</h3></div>
        </div>
    </section>

    <section class="grid-wrapper content-split swap-desktop">
        <div class="card-item text-card fade-in">
            <div class="card-content">
                <h3>Unser Ansatz</h3>
                <p>Wir arbeiten mit Community-Organisationen, Vereinen und Kultureinrichtungen zusammen, die das Vertrauen ihrer jeweiligen Communities bereits genießen – denn Aufklärung funktioniert nur über Vertrauen.</p>
                <p>Gemeinsam entwickeln wir <strong>maßgeschneiderte, mehrsprachige</strong> Workshop-Formate und Aufklärungsmaterialien – niedrigschwellig und kulturell sensibel.</p>
            </div>
        </div>
        <div class="card-item fade-in">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=2070&auto=format&fit=crop');"></div>
            <div class="card-content"><h3>Vertrauen &amp;<br>Kooperation</h3></div>
        </div>
    </section>

    <section class="cta-section fade-in">
        <h2>Kooperieren</h2>
        <p>Sie vertreten eine Community-Organisation oder möchten ein gemeinsames Aufklärungsformat entwickeln? Wir freuen uns auf den Austausch.</p>
        <a href="https://disinfoawareness.eu/kontakt.php" class="cta-btn" aria-label="Kooperation anfragen">Kooperation anfragen</a>
    </section>

    <section class="cta-section fade-in">
        <h2 style="margin-bottom: 1.5rem;">Jetzt Spenden</h2>
        <p>Demokratie ist kein Selbstläufer. Jede Spende hält unsere Aufklärungsarbeit am Laufen – unabhängig, unbestechlich, wirkungsorientiert.</p>
        <a href="https://disinfoawareness.eu/spenden.php" class="cta-btn" aria-label="Jetzt spenden">Jetzt spenden</a>
    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
