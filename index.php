<?php
$page_title    = 'Disinfo Awareness – Gegen Desinformation im ländlichen Raum';
$page_desc     = 'Disinfo Awareness bekämpft Desinformation in ländlichen Regionen durch Aufklärung, innovative Strategien und nachhaltige Bildungsprojekte. Jetzt mehr erfahren!';
$page_canonical = 'https://disinfoawareness.eu/';
$og_type       = 'website';
$og_image_alt  = 'Disinfo Awareness – Gegen Desinformation';
$schema_json   = '{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Disinfo Awareness",
  "url": "https://disinfoawareness.eu",
  "logo": "https://disinfoconsulting.eu/wp-content/uploads/2026/01/Gemini_Generated_Image_gsrva8gsrva8gsrv.png",
  "email": "kontakt@disinfoawareness.eu",
  "description": "Disinfo Awareness bekämpft Desinformation in ländlichen Regionen durch Aufklärung, innovative Strategien und nachhaltige Bildungsprojekte."
}';

$extra_head = <<<'CSS'
<style>
    /* --- SECTION LABEL --- */
    .section-label { padding: 2.5rem 1.5rem; border-bottom: 1px solid var(--grid-line); text-align: center; }

    /* --- PROJECT CARDS GRID --- */
    .grid-wrapper { display: grid; grid-template-columns: 1fr; width: 100%; }

    .card-item {
        position: relative;
        border-bottom: 1px solid var(--grid-line);
        padding: 2rem 1.5rem;
        display: flex; flex-direction: column; justify-content: flex-end;
        overflow: hidden; height: 480px;
    }

    .card-item::after {
        content: '';
        position: absolute; bottom: 0; left: 0; width: 100%; height: 75%;
        background: linear-gradient(to top, rgba(5,5,5,0.95) 0%, rgba(5,5,5,0.6) 50%, transparent 100%);
        z-index: 2; pointer-events: none;
    }

    .card-bg {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-size: cover; background-position: center top;
        z-index: 1;
        transition: transform 0.8s ease, filter 0.8s ease;
        filter: grayscale(30%) brightness(0.8);
    }

    .card-item:hover .card-bg, .card-item.is-in-view .card-bg {
        transform: scale(1.05);
        filter: grayscale(0%) brightness(0.9);
    }

    .card-content { position: relative; z-index: 3; pointer-events: none; text-shadow: 0 2px 10px rgba(0,0,0,0.5); }

    .card-item h2 { font-size: clamp(1.8rem, 2.5vw, 2.8rem); margin-bottom: 0.3rem; line-height: 1; }

    .card-item p {
        font-size: 0.95rem; opacity: 0.9; margin-bottom: 1.2rem;
        margin-left: 0; max-width: 100%; color: #e0e0e0; line-height: 1.5;
    }

    .card-link {
        pointer-events: auto;
        font-family: var(--font-head); font-size: 1.1rem;
        border-bottom: 1px solid var(--highlight);
        padding-bottom: 2px; display: inline-block; margin-bottom: 0.5rem;
    }

    @media (min-width: 900px) {
        .projects-wrapper { grid-template-columns: repeat(2, 1fr); }
        .card-item {
            height: 480px; border-right: 1px solid var(--grid-line);
            border-bottom: 0; padding: 3rem 2.5rem;
        }
        .card-item:nth-child(-n+2) { border-bottom: 1px solid var(--grid-line); }
        .card-item:nth-child(2n)   { border-right: none; }
    }

    /* --- FUNDING SECTION --- */
    .funding-section {
        position: relative; border-top: 1px solid var(--grid-line);
        border-bottom: 1px solid var(--grid-line); overflow: hidden;
        min-height: 45vh; display: flex; align-items: center;
    }

    .funding-bg {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-size: cover; background-position: center; z-index: 1;
        filter: grayscale(100%) brightness(0.2);
    }

    .funding-content-wrapper {
        position: relative; z-index: 2; width: 100%;
        display: grid; grid-template-columns: 1fr;
    }

    @media (min-width: 900px) {
        .funding-content-wrapper { grid-template-columns: 1fr 1fr; min-height: 45vh; }
    }

    .funding-left {
        padding: 3rem 2rem; border-bottom: 1px solid var(--grid-line);
        display: flex; align-items: center; justify-content: flex-start;
    }

    .funding-right {
        padding: 3rem 2rem; display: flex; flex-direction: column;
        justify-content: center; align-items: flex-start;
        background: rgba(5,5,5,0.6); backdrop-filter: blur(5px);
    }

    @media (min-width: 900px) {
        .funding-left { border-bottom: 0; border-right: 1px solid var(--grid-line); justify-content: center; }
    }

    /* --- TEAM SECTION --- */
    #dc-team-section {
        --team-panel:       rgba(255, 255, 255, 0.03);
        --team-panel-hover: rgba(255, 255, 255, 0.06);
        --team-border:      rgba(255, 255, 255, 0.12);
        --team-text-sub:    #cccccc;

        width: 100%;
        background: radial-gradient(circle at 50% 0%, #131313 0%, #050505 70%);
        position: relative;
        padding: clamp(5rem, 10vh, 8rem) 1.5rem;
        overflow: hidden; isolation: isolate;
        border-top: 1px solid var(--grid-line);
    }

    .team-header { text-align: center; max-width: 800px; margin: 0 auto 4rem auto; }
    .team-header h2 { margin-bottom: 1.5rem; }
    .team-desc { font-size: 1.1rem; line-height: 1.6; color: var(--team-text-sub) !important; max-width: 700px; margin: 0 auto; font-weight: 300; }

    .team-grid {
        display: grid; grid-template-columns: 1fr;
        justify-content: center; gap: 2rem;
        max-width: 1600px; margin: 0 auto; width: 100%; align-items: start;
    }

    @media (min-width: 900px)  { .team-grid { grid-template-columns: repeat(2, minmax(350px, 550px)); } }
    @media (min-width: 1600px) { .team-grid { grid-template-columns: repeat(4, 1fr); } }

    .team-card {
        background: var(--team-panel); border: 1px solid var(--team-border);
        border-radius: 4px; overflow: hidden;
        transition: all 0.4s cubic-bezier(0.2, 0.8, 0.2, 1);
        display: flex; flex-direction: column; position: relative;
    }
    .team-card:hover {
        background: var(--team-panel-hover); border-color: rgba(255,255,255,0.3);
        transform: translateY(-4px); box-shadow: 0 20px 50px rgba(0,0,0,0.5);
    }

    .team-image-container { width: 100%; height: 400px; position: relative; overflow: hidden; background: #111; cursor: pointer; }
    .team-img {
        width: 100%; height: 100%; object-fit: cover; object-position: 50% 20%;
        filter: grayscale(100%) contrast(1.1);
        transition: transform 0.6s ease, filter 0.6s ease;
    }
    .team-card:hover .team-img { filter: grayscale(0%) contrast(1); transform: scale(1.05); }

    .team-info {
        padding: 1.5rem 2rem 2rem 2rem; position: relative;
        background: var(--team-panel); z-index: 2; cursor: pointer;
        border-top: 1px solid rgba(255,255,255,0.05);
    }
    .team-name { font-family: var(--font-head); font-size: 1.8rem; font-weight: 400; margin: 0 0 0.5rem 0; color: #fff !important; letter-spacing: 1px; }
    .team-role  { font-family: var(--font-body); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 600; color: var(--team-text-sub) !important; display: block; }

    .team-toggle {
        position: absolute; top: -25px; right: 1.5rem;
        width: 50px; height: 50px;
        background: #000; border: 1px solid var(--team-border); border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        transition: all 0.3s ease; z-index: 10; box-shadow: 0 5px 15px rgba(0,0,0,0.5);
    }
    .team-toggle svg { width: 16px; height: 16px; stroke: #fff; transition: transform 0.3s ease; }
    .team-card:hover .team-toggle { border-color: #fff; }

    .team-card.expanded { border-color: #fff; background: #0a0a0a; z-index: 10; }
    .team-card.expanded .team-toggle { background: #fff; border-color: #fff; }
    .team-card.expanded .team-toggle svg { stroke: #000; transform: rotate(45deg); }

    .team-bio-wrapper { max-height: 0; overflow: hidden; transition: max-height 0.6s cubic-bezier(0.2, 0.8, 0.2, 1); background: rgba(0,0,0,0.2); }
    .team-card.expanded .team-bio-wrapper { max-height: 600px; border-top: 1px solid var(--team-border); }
    .team-bio-inner { padding: 2rem; color: var(--team-text-sub) !important; font-size: 0.95rem; line-height: 1.7; }

    .team-links { display: flex; gap: 1rem; margin-top: 1.5rem; flex-wrap: wrap; }
    .team-link {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 20px; border: 1px solid var(--team-border); border-radius: 2px;
        font-family: var(--font-head); font-size: 1rem; text-transform: uppercase;
        letter-spacing: 1px; font-weight: 400; transition: all 0.3s ease;
        background: transparent; color: #fff !important;
    }
    .team-link:hover { background: #fff; color: #000 !important; border-color: #fff; }
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
            <div class="hero-subtitle fade-in">Aufklärung &amp; Resilienz</div>
            <h1 class="fade-in" style="transition-delay: 0.1s;">Gemeinsam<br>Gegen<br>Desinformation</h1>
            <p class="fade-in hero-p" style="transition-delay: 0.2s;">
                Stärkung gesellschaftlicher Resilienz durch innovative Aufklärung und positive Gegennarrative.
            </p>
        </div>
    </header>

    <div class="section-label fade-in">
        <h2>Unsere Arbeit</h2>
    </div>

    <section class="grid-wrapper projects-wrapper">
        <div class="card-item fade-in">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?q=80&w=1170&auto=format&fit=crop');"></div>
            <div class="card-content">
                <h2>NGO-<br>Business</h2>
                <p>Eine österreichweite Kampagne nutzt parlamentarische Anfragen der FPÖ gezielt gegen den Zivilsektor. Wir zeigen datengetrieben, was dahintersteckt.</p>
                <a href="https://disinfoawareness.eu/ngobusiness.php" class="card-link">Mehr erfahren</a>
            </div>
        </div>
        <div class="card-item fade-in" style="transition-delay: 0.1s;">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1122&auto=format&fit=crop');"></div>
            <div class="card-content">
                <h2>Schul-<br>projekte</h2>
                <p>Wir stärken junge Menschen im kritischen Umgang mit Informationen – durch praxisnahe Workshops, die über reine Media Literacy hinausgehen.</p>
                <a href="https://disinfoawareness.eu/schulprojekte.php" class="card-link">Mehr erfahren</a>
            </div>
        </div>
        <div class="card-item fade-in" style="transition-delay: 0.2s;">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1559027615-cd4628902d4a?q=80&w=1074&auto=format&fit=crop');"></div>
            <div class="card-content">
                <h2>Gemeinde-<br>Aufklärung</h2>
                <p>Desinformation unterscheidet nicht zwischen Stadt und Land – die Abwehr sollte das auch nicht. Wir schulen Multiplikator:innen vor Ort, damit Resilienz auch abseits urbaner Zentren entsteht.</p>
                <a href="https://disinfoawareness.eu/gemeinde.php" class="card-link">Mehr erfahren</a>
            </div>
        </div>
        <div class="card-item fade-in" style="transition-delay: 0.3s;">
            <div class="card-bg" style="background-image: url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=2069&auto=format&fit=crop');"></div>
            <div class="card-content">
                <h2>Diaspora-<br>Aufklärung</h2>
                <p>Diaspora-Communities sind oft besonders exponiert gegenüber gezielter Informationsmanipulation – und werden in der Aufklärungsarbeit häufig vergessen. Wir ändern das.</p>
                <a href="https://disinfoawareness.eu/diaspora.php" class="card-link">Mehr erfahren</a>
            </div>
        </div>
    </section>

    <section class="funding-section fade-in">
        <div class="funding-bg" style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop');"></div>
        <div class="funding-content-wrapper">
            <div class="funding-left">
                <h2>Funding &amp;<br>Partner</h2>
            </div>
            <div class="funding-right">
                <p style="margin-bottom: 2rem; color: #e0e0e0;">
                    Demokratie braucht Rückhalt. Mit Ihrer Spende ermöglichen Sie unabhängige Aufklärung – österreichweit, niedrigschwellig, wirkungsorientiert.
                </p>
                <a href="https://disinfoawareness.eu/spenden.php" class="cta-btn" aria-label="Jetzt spenden">Jetzt Spenden</a>
            </div>
        </div>
    </section>

    <section id="dc-team-section">
        <div class="team-header fade-in">
            <h2>Das Team</h2>
            <p class="team-desc">Expertise in hybriden Bedrohungen, strategischer Kommunikation und Wirtschaftsanalyse. Wir übersetzen komplexe Strukturen in wirksame Aufklärung.</p>
        </div>

        <div class="team-grid">

            <div class="team-card fade-in" tabindex="0">
                <div class="team-image-container trigger-expand">
                    <img src="https://disinfoconsulting.eu/wp-content/uploads/2025/06/20250603-IMG_9344-scaled.jpg" alt="Markus Schwinghammer" class="team-img">
                </div>
                <div class="team-info trigger-expand">
                    <div class="team-toggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                    </div>
                    <h3 class="team-name">Markus Schwinghammer</h3>
                    <span class="team-role">Gründer<br>&amp; Obmann</span>
                </div>
                <div class="team-bio-wrapper">
                    <div class="team-bio-inner">
                        <p>Experte für Informationsmanipulation und hybride Bedrohungen. Erfahrung im öffentlichen Dienst und der Koordination von nationalen wie internationalen Abwehrmaßnahmen.</p>
                        <div class="team-links">
                            <a href="https://www.linkedin.com/in/markus-schwinghammer-335a0b201/" class="team-link" aria-label="LinkedIn Profil von Markus Schwinghammer">LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-card fade-in" tabindex="0" style="transition-delay: 0.1s;">
                <div class="team-image-container trigger-expand">
                    <img src="https://disinfoconsulting.eu/wp-content/uploads/2026/01/Gemini_Generated_Image_b8u35bb8u35bb8u3-scaled.png" alt="Robert Buchhaus" class="team-img">
                </div>
                <div class="team-info trigger-expand">
                    <div class="team-toggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                    </div>
                    <h3 class="team-name">Robert Buchhaus</h3>
                    <span class="team-role">Gründer<br>&amp; Obmann Stelv.</span>
                </div>
                <div class="team-bio-wrapper">
                    <div class="team-bio-inner">
                        <p>Spezialist für Fundraising und NGO-Kooperationen. Mit jahrzehntelanger Erfahrung im Dritten Sektor übersetzt er komplexe Strukturen in wirksame Aufklärung.</p>
                        <div class="team-links">
                            <a href="https://www.linkedin.com/in/robert-buchhaus-693284106/" class="team-link" aria-label="LinkedIn Profil von Robert Buchhaus">LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-card fade-in" tabindex="0" style="transition-delay: 0.2s;">
                <div class="team-image-container trigger-expand">
                    <img src="https://disinfoconsulting.eu/wp-content/uploads/2026/01/1695822991482.jpg" alt="Ivana Damjanovic" class="team-img">
                </div>
                <div class="team-info trigger-expand">
                    <div class="team-toggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                    </div>
                    <h3 class="team-name">Ivana Damjanovic</h3>
                    <span class="team-role">Projektmanagement<br>&amp; Gender</span>
                </div>
                <div class="team-bio-wrapper">
                    <div class="team-bio-inner">
                        <p>Verantwortlich für Projektsteuerung und Diversity. Sie stellt sicher, dass unsere Aufklärung inklusiv gestaltet ist und unterschiedliche gesellschaftliche Gruppen erreicht.</p>
                        <div class="team-links">
                            <a href="https://www.linkedin.com/in/ivana-damjanovic-463950195/" class="team-link" aria-label="LinkedIn Profil von Ivana Damjanovic">LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-card fade-in" tabindex="0" style="transition-delay: 0.3s;">
                <div class="team-image-container trigger-expand">
                    <img src="https://disinfoconsulting.eu/wp-content/uploads/2026/01/Gemini_Generated_Image_zh9v2zzh9v2zzh9v.png" alt="Valentin Meixner" class="team-img">
                </div>
                <div class="team-info trigger-expand">
                    <div class="team-toggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                    </div>
                    <h3 class="team-name">Valentin Meixner</h3>
                    <span class="team-role">Projektmanagement<br>&amp; Workshops</span>
                </div>
                <div class="team-bio-wrapper">
                    <div class="team-bio-inner">
                        <p>Koordination unserer Bildungsprojekte und Konzeption interaktiver Workshop-Formate. Er vermittelt Resilienz-Strategien praxisnah und zielgruppengerecht.</p>
                        <div class="team-links">
                            <a href="https://www.linkedin.com/in/valentin-meixner-9a963a207/" class="team-link" aria-label="LinkedIn Profil von Valentin Meixner">LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-card fade-in" tabindex="0" style="transition-delay: 0.4s;">
                <div class="team-image-container trigger-expand">
                    <img src="https://disinfoconsulting.eu/wp-content/uploads/2026/06/WhatsApp-Image-2026-06-09-at-12.50.11.jpeg" alt="Laura Pattiss" class="team-img">
                </div>
                <div class="team-info trigger-expand">
                    <div class="team-toggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                    </div>
                    <h3 class="team-name">Laura Pattiss</h3>
                    <span class="team-role">Projektmanagement<br>&amp; Art</span>
                </div>
                <div class="team-bio-wrapper">
                    <div class="team-bio-inner">
                        <p>Kunsthistorikerin und langjährige Praxis im Kunstbetrieb. Laura koordiniert unsere Kunstprojekte von der ersten Idee bis zur Umsetzung.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
