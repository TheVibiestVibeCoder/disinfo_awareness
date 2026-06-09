<?php
$page_title    = 'Jetzt Spenden – Disinfo Awareness';
$page_desc     = 'Unterstütze Disinfo Awareness mit einer Banküberweisung. Gemeinsam für eine informierte Gesellschaft.';
$page_canonical = 'https://disinfoawareness.eu/spenden.php';
$robots        = 'index, follow';
$schema_json   = '{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Jetzt Spenden – Disinfo Awareness",
  "description": "Unterstütze Disinfo Awareness mit einer Banküberweisung.",
  "url": "https://disinfoawareness.eu/spenden.php",
  "inLanguage": "de",
  "publisher": { "@type": "Organization", "name": "Disinfo Awareness", "url": "https://disinfoawareness.eu" }
}';

$extra_head = <<<'CSS'
<style>
    h1 { font-size: clamp(3.5rem, 9vw, 8.5rem); }
    h2 { font-size: clamp(2.5rem, 6vw, 5rem); }
    #canvas-container { opacity: 0.5; }

    .spenden-intro {
        padding: clamp(4rem,8vh,7rem) 1.5rem;
        border-bottom: 1px solid var(--grid-line);
        background: linear-gradient(to bottom, var(--bg-color), #0a0a0a);
    }
    .spenden-intro-inner {
        max-width: 700px; margin: 0 auto; text-align: center;
        display: flex; flex-direction: column; gap: 1.5rem;
    }

    .spenden-section { padding: clamp(4rem,8vh,7rem) 1.5rem; border-bottom: 1px solid var(--grid-line); }
    .spenden-grid { display: grid; grid-template-columns: 1fr; gap: 4rem; max-width: 900px; margin: 0 auto; }
    @media (min-width: 900px) { .spenden-grid { grid-template-columns: 1fr 1.6fr; gap: 5rem; align-items: start; } }

    .qr-col { display: flex; flex-direction: column; align-items: center; gap: 1.5rem; text-align: center; }
    @media (min-width: 900px) { .qr-col { align-items: flex-start; text-align: left; } }

    .col-label { font-family: var(--font-head); font-size: clamp(1rem,1.5vw,1.3rem); letter-spacing: 3px; color: #666; text-transform: uppercase; display: block; margin-bottom: .5rem; }

    .qr-image { width: 100%; max-width: 220px; border: 1px solid var(--grid-line); display: block; }
    .qr-hint { font-size: .9rem; color: #555; max-width: 26ch; }
    @media (min-width: 900px) { .qr-hint { max-width: 100%; } }

    .bank-col { display: flex; flex-direction: column; gap: 2rem; }
    .bank-fields { border-top: 1px solid var(--grid-line); }
    .bank-field { padding: 1.1rem 0; border-bottom: 1px solid var(--grid-line); }
    .field-label { font-family: var(--font-head); font-size: .8rem; letter-spacing: 2px; color: #555; text-transform: uppercase; display: block; margin-bottom: .4rem; }
    .field-row { display: flex; justify-content: space-between; align-items: center; gap: 1rem; }
    .field-value { font-size: clamp(.95rem,1.3vw,1.1rem); color: var(--highlight); font-weight: 400; letter-spacing: .5px; flex: 1; }

    .copy-btn {
        all: unset; cursor: pointer;
        font-family: var(--font-head); font-size: .8rem; letter-spacing: 2px; color: #666;
        border: 1px solid rgba(255,255,255,0.12); padding: .25rem .75rem;
        white-space: nowrap; flex-shrink: 0; transition: color .2s ease, border-color .2s ease;
    }
    .copy-btn:hover { color: var(--highlight); border-color: rgba(255,255,255,.4); }
    .copy-btn:focus-visible { outline: 1px solid var(--highlight); }
    .copy-btn.copied { color: #00c864; border-color: #00c864; }
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
            <span class="hero-subtitle fade-in">Direkt &amp; unkompliziert</span>
            <h1 class="fade-in" style="transition-delay:.1s;">Jetzt<br>Spenden</h1>
            <p class="fade-in hero-p" style="transition-delay:.2s;">
                Jede Überweisung hilft uns, unabhängig gegen Desinformation aufzuklären.
            </p>
        </div>
    </header>

    <section class="spenden-intro fade-in">
        <div class="spenden-intro-inner">
            <h2>Warum Ihre Spende zählt</h2>
            <p>Desinformation unterhöhlt leise Vertrauen und macht Fakten verhandelbar. Als gemeinnütziger Verein ohne staatliche Kernfinanzierung halten uns Spenden wie Ihre unabhängig und handlungsfähig. <strong>Jede Überweisung ist ein direktes Bekenntnis zur Demokratie.</strong></p>
        </div>
    </section>

    <section class="spenden-section">
        <div class="spenden-grid">

            <div class="qr-col fade-in">
                <span class="col-label">Per QR-Code</span>
                <img src="https://disinfoconsulting.eu/wp-content/uploads/2026/06/Bank_QR.jpeg" alt="QR-Code für Banküberweisung an Disinfo Awareness" class="qr-image">
                <p class="qr-hint">Scanne den Code direkt mit deiner Banking-App</p>
            </div>

            <div class="bank-col fade-in" style="transition-delay:.12s;">
                <div>
                    <span class="col-label">Bankverbindung</span>
                    <h2>Überweisen</h2>
                </div>
                <div class="bank-fields">
                    <div class="bank-field">
                        <span class="field-label">Kontoinhaber</span>
                        <div class="field-row">
                            <span class="field-value">Disinfo Awareness</span>
                        </div>
                    </div>
                    <div class="bank-field">
                        <span class="field-label">IBAN</span>
                        <div class="field-row">
                            <span class="field-value" id="iban">AT86 2011 1857 6215 7900</span>
                            <button class="copy-btn" data-copy="iban" aria-label="IBAN kopieren">Kopieren</button>
                        </div>
                    </div>
                    <div class="bank-field">
                        <span class="field-label">BIC</span>
                        <div class="field-row">
                            <span class="field-value" id="bic">GIBAATWWXXX</span>
                            <button class="copy-btn" data-copy="bic" aria-label="BIC kopieren">Kopieren</button>
                        </div>
                    </div>
                    <div class="bank-field">
                        <span class="field-label">Verwendungszweck</span>
                        <div class="field-row">
                            <span class="field-value" id="zweck">Spende Disinfo Awareness</span>
                            <button class="copy-btn" data-copy="zweck" aria-label="Verwendungszweck kopieren">Kopieren</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
