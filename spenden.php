<?php // Spendenformular – Banküberweisung ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <title>Jetzt Spenden – Disinfo Awareness</title>
    <meta name="description" content="Unterstütze Disinfo Awareness mit einer Banküberweisung. Gemeinsam für eine informierte Gesellschaft.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://disinfoawareness.eu/spenden.php">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#050505">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Manrope:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg:    #050505;
            --text:  #f0f0f0;
            --white: #ffffff;
            --muted: #b0b0b0;
            --line:  rgba(255,255,255,0.15);
            --head:  'Bebas Neue', display;
            --body:  'Manrope', sans-serif;
            --ease:  all 0.6s cubic-bezier(0.16,1,0.3,1);
        }

        * { margin:0; padding:0; box-sizing:border-box; }
        html { scroll-behavior:smooth; }
        body {
            background:var(--bg); color:var(--text);
            font-family:var(--body); line-height:1.6;
            overflow-x:hidden; -webkit-font-smoothing:antialiased;
        }

        h1,h2,h3,h4 { font-family:var(--head); text-transform:uppercase; font-weight:400; letter-spacing:1px; line-height:.9; }
        h1 { font-size:clamp(3.5rem,14vw,12rem); color:var(--white); margin-bottom:1rem; word-break:break-word; }
        h2 { font-size:clamp(2.5rem,6vw,5rem);   color:var(--white); }
        h3 { font-size:clamp(1.5rem,3vw,2.5rem);  color:var(--white); }
        p  { font-size:clamp(1rem,1.2vw,1.15rem); color:var(--muted); font-weight:300; max-width:60ch; }
        a  { color:var(--white); text-decoration:none; transition:var(--ease); }

        /* NAV */
        nav {
            position:fixed; top:0; left:0; width:100%;
            padding:1rem 1.5rem; z-index:100;
            display:flex; justify-content:space-between; align-items:center;
            background:linear-gradient(to bottom,rgba(5,5,5,.95) 0%,rgba(5,5,5,.8) 50%,transparent 100%);
            backdrop-filter:blur(2px);
        }
        .logo { font-family:var(--head); font-size:1.4rem; letter-spacing:1.5px; white-space:nowrap; }
        .nav-actions { display:flex; gap:1rem; }
        .cta-btn {
            border:1px solid var(--white); padding:.5rem 1.2rem;
            font-family:var(--head); font-size:1.1rem;
            background:rgba(0,0,0,.5); backdrop-filter:blur(10px);
            white-space:nowrap; cursor:pointer; display:inline-block; color:var(--white);
        }
        .cta-btn:hover { background:var(--white); color:var(--bg); }
        @media(max-width:450px){
            .logo{font-size:1.2rem}
            .cta-btn{padding:.4rem .8rem;font-size:1rem}
            .nav-actions{gap:.5rem}
        }

        /* HERO */
        .hero {
            position:relative; height:70dvh; min-height:420px;
            display:flex; flex-direction:column; justify-content:center; align-items:center;
            text-align:center; padding:2rem 1.5rem;
            border-bottom:1px solid var(--line); overflow:hidden;
        }
        #canvas-container {
            position:absolute; top:0; left:0; width:100%; height:100%;
            z-index:1; opacity:.5; pointer-events:none;
        }
        .hero-content { position:relative; z-index:10; width:100%; max-width:900px; }
        .hero-subtitle {
            font-family:var(--head); font-size:clamp(1rem,2vw,1.5rem);
            letter-spacing:4px; color:#888; margin-bottom:2rem;
            text-transform:uppercase; display:block;
        }
        .hero-p { margin:0 auto; text-align:center; }

        /* SPENDEN SECTION */
        .spenden-section {
            padding: clamp(4rem,8vh,7rem) 1.5rem;
            border-bottom: 1px solid var(--line);
        }
        .spenden-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 4rem;
            max-width: 900px;
            margin: 0 auto;
        }
        @media(min-width:900px){
            .spenden-grid { grid-template-columns: 1fr 1.6fr; gap: 5rem; align-items: start; }
        }

        /* QR-Spalte */
        .qr-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
            text-align: center;
        }
        @media(min-width:900px){ .qr-col { align-items: flex-start; text-align: left; } }

        .col-label {
            font-family: var(--head);
            font-size: clamp(1rem,1.5vw,1.3rem);
            letter-spacing: 3px;
            color: #666;
            text-transform: uppercase;
            display: block;
            margin-bottom: .5rem;
        }

        /* Platzhalter bis das echte QR-Bild da ist */
        .qr-placeholder {
            width: 100%;
            max-width: 220px;
            aspect-ratio: 1;
            border: 1px dashed rgba(255,255,255,0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            color: #444;
        }
        .qr-placeholder .qr-icon {
            font-family: var(--head);
            font-size: 2.5rem;
            letter-spacing: 2px;
            color: #333;
        }
        .qr-placeholder .qr-sub {
            font-size: .75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #333;
        }
        /* Sobald das echte Bild da ist einfach .qr-placeholder ersetzen durch: */
        /* <img src="qr-spenden.png" alt="QR-Code" class="qr-image"> */
        .qr-image {
            width: 100%;
            max-width: 220px;
            border: 1px solid var(--line);
            display: block;
        }

        .qr-hint {
            font-size: .9rem;
            color: #555;
            max-width: 26ch;
        }
        @media(min-width:900px){ .qr-hint { max-width: 100%; } }

        /* Bankdaten-Spalte */
        .bank-col { display: flex; flex-direction: column; gap: 2rem; }

        .bank-fields { border-top: 1px solid var(--line); }

        .bank-field {
            padding: 1.1rem 0;
            border-bottom: 1px solid var(--line);
        }
        .field-label {
            font-family: var(--head);
            font-size: .8rem;
            letter-spacing: 2px;
            color: #555;
            text-transform: uppercase;
            display: block;
            margin-bottom: .4rem;
        }
        .field-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }
        .field-value {
            font-size: clamp(.95rem,1.3vw,1.1rem);
            color: var(--white);
            font-weight: 400;
            letter-spacing: .5px;
            flex: 1;
        }

        /* Copy-Button */
        .copy-btn {
            all: unset;
            cursor: pointer;
            font-family: var(--head);
            font-size: .8rem;
            letter-spacing: 2px;
            color: #666;
            border: 1px solid rgba(255,255,255,0.12);
            padding: .25rem .75rem;
            white-space: nowrap;
            flex-shrink: 0;
            transition: color .2s ease, border-color .2s ease;
        }
        .copy-btn:hover { color: var(--white); border-color: rgba(255,255,255,.4); }
        .copy-btn:focus-visible { outline: 1px solid var(--white); }
        .copy-btn.copied { color: #00c864; border-color: #00c864; }

        /* FOOTER */
        footer { background:#020202; border-top:1px solid var(--line); }
        .footer-grid { display:grid; grid-template-columns:1fr; }
        @media(min-width:900px){ .footer-grid{ grid-template-columns:1.5fr 1fr 1fr; } }
        .footer-col {
            padding:3rem 2rem; border-bottom:1px solid var(--line);
            display:flex; flex-direction:column; gap:1rem;
        }
        @media(min-width:900px){
            .footer-col{ border-right:1px solid var(--line); border-bottom:none; }
            .footer-col:last-child{ border-right:none; }
        }
        .footer-col h4 { font-family:var(--head); font-size:1.5rem; color:var(--white); margin-bottom:.2rem; letter-spacing:2px; }
        .footer-col p  { margin:0; max-width:100%; }
        .footer-link { color:#888; font-size:1rem; display:inline-block; transition:color .3s, transform .3s; }
        .footer-link:hover { color:var(--white); transform:translateX(5px); }
        .footer-bottom { padding:1.5rem 2rem; text-align:center; border-top:1px solid var(--line); color:#444; font-size:.8rem; text-transform:uppercase; letter-spacing:1px; }

        /* INTRO */
        .spenden-intro {
            padding: clamp(4rem,8vh,7rem) 1.5rem;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(to bottom, var(--bg), #0a0a0a);
        }
        .spenden-intro-inner {
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        .spenden-intro-inner h2 { margin-bottom: .5rem; }

        /* PARTNER */
        .partner-section {
            padding: clamp(4rem,8vh,7rem) 1.5rem;
            border-bottom: 1px solid var(--line);
        }
        .partner-inner { max-width: 900px; margin: 0 auto; }
        .partner-inner h2 { margin-bottom: 1.5rem; }
        .partner-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 3rem;
            border-top: 1px solid var(--line);
            padding-top: 2rem;
        }
        .partner-item {
            border: 1px solid rgba(255,255,255,0.12);
            padding: 1.2rem 2.5rem;
            font-family: var(--head);
            font-size: 1.1rem;
            letter-spacing: 2px;
            color: #666;
            text-transform: uppercase;
        }

        /* FADE IN */
        .fade-in { opacity:0; transform:translateY(20px); transition:opacity .8s ease-out,transform .8s ease-out; will-change:opacity,transform; }
        .fade-in.visible { opacity:1; transform:translateY(0); }
    </style>
</head>
<body>

    <nav role="navigation" aria-label="Hauptnavigation">
        <a href="https://disinfoawareness.eu/" class="logo">Disinfo Awareness</a>
        <div class="nav-actions">
            <a href="https://disinfoawareness.eu/kontakt.php" class="cta-btn">Kontakt</a>
        </div>
    </nav>

    <main>

    <header class="hero">
        <div id="canvas-container"></div>
        <div class="hero-content">
            <span class="hero-subtitle fade-in">Direkt & unkompliziert</span>
            <h1 class="fade-in" style="transition-delay:.1s;">Jetzt<br>Spenden</h1>
            <p class="fade-in hero-p" style="transition-delay:.2s;">
                Jede Überweisung hilft uns, unabhängig gegen Desinformation aufzuklären.
            </p>
        </div>
    </header>

    <section class="spenden-intro fade-in">
        <div class="spenden-intro-inner">
            <h2>Warum Ihre Spende zählt</h2>
            <p>Desinformation greift nicht laut an – sie unterhöhlt leise Vertrauen, vergiftet Debatten und macht Fakten verhandelbar. Die Antwort darauf ist Aufklärung, die nicht aufhört, wenn eine Förderperiode endet.</p>
            <p>Wir sind ein gemeinnütziger Verein ohne staatliche Kernfinanzierung. Was wir bewegen, bewegen wir durch den Einsatz engagierter Menschen – und durch Spenden wie Ihre. <strong>Jede Überweisung ist ein direktes Bekenntnis zur Demokratie.</strong></p>
        </div>
    </section>

    <section class="spenden-section">
        <div class="spenden-grid">

            <!-- QR-Code -->
            <div class="qr-col fade-in">
                <span class="col-label">Per QR-Code</span>
                <!-- Ersetze diesen Platzhalter durch: <img src="qr-spenden.png" alt="QR-Code Banküberweisung" class="qr-image"> -->
                <div class="qr-placeholder">
                    <span class="qr-icon">▦</span>
                    <span class="qr-sub">Folgt demnächst</span>
                </div>
                <p class="qr-hint">Scanne den Code direkt mit deiner Banking-App</p>
            </div>

            <!-- Bankdaten -->
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
                            <span class="field-value" id="iban">AT12 3456 7890 1234 5678</span>
                            <button class="copy-btn" data-copy="iban" aria-label="IBAN kopieren">Kopieren</button>
                        </div>
                    </div>

                    <div class="bank-field">
                        <span class="field-label">BIC</span>
                        <div class="field-row">
                            <span class="field-value" id="bic">BKAUATWW</span>
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

    <section class="partner-section fade-in">
        <div class="partner-inner">
            <span class="col-label">Förderung &amp; Kooperationen</span>
            <h2>Partner</h2>
            <p>Wir danken unseren Förderern und Kooperationspartnern, die unsere Arbeit möglich machen. Gemeinsam für eine informierte und resiliente Gesellschaft.</p>
            <div class="partner-grid">
                <div class="partner-item">Partner 1</div>
                <div class="partner-item">Partner 2</div>
                <div class="partner-item">Partner 3</div>
                <div class="partner-item">Förderer 1</div>
                <div class="partner-item">Förderer 2</div>
            </div>
        </div>
    </section>

    </main>

    <footer role="contentinfo">
        <div class="footer-grid">
            <div class="footer-col">
                <h4>Disinfo Awareness</h4>
                <p>Ein gemeinnütziger Verein zur Stärkung der Demokratie. Wir verbinden Technologie mit Bildung für eine resilientere Gesellschaft.</p>
            </div>
            <div class="footer-col">
                <h4>Kontakt</h4>
                <a href="https://disinfoawareness.eu/kontakt.php" class="footer-link">Kontakt</a>
                <a href="https://www.linkedin.com/in/markus-schwinghammer-335a0b201/" class="footer-link">LinkedIn</a>
            </div>
            <div class="footer-col">
                <h4>Rechtliches</h4>
                <a href="https://disinfoawareness.eu/impressum.html" class="footer-link">Impressum</a>
                <a href="https://disinfoawareness.eu/datenschutz.html" class="footer-link">Datenschutz</a>
            </div>
        </div>
        <div class="footer-bottom">&copy; 2026 Disinfo Awareness. Wien, Österreich.</div>
    </footer>

    <script type="importmap">{"imports":{"three":"https://unpkg.com/three@0.160.0/build/three.module.js"}}</script>
    <script type="module">
        import * as THREE from 'three';
        const isMobile = window.innerWidth < 768;
        const container = document.getElementById('canvas-container');
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2(0x050505, isMobile ? 0.045 : 0.035);
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 100);
        camera.position.z = 10;
        const renderer = new THREE.WebGLRenderer({ antialias: !isMobile, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, isMobile ? 1.5 : 2));
        container.appendChild(renderer.domElement);

        const bgCount = isMobile ? 150 : 600;
        const bgGeo = new THREE.BufferGeometry();
        const bgPos = new Float32Array(bgCount * 3);
        for (let i = 0; i < bgCount; i++) {
            bgPos[i*3] = (Math.random()-.5)*60; bgPos[i*3+1] = (Math.random()-.5)*60; bgPos[i*3+2] = (Math.random()-.5)*60;
        }
        bgGeo.setAttribute('position', new THREE.BufferAttribute(bgPos, 3));
        scene.add(new THREE.Points(bgGeo, new THREE.PointsMaterial({ size:.05, color:0x444444, transparent:true, opacity:.6 })));

        const fgCount = isMobile ? 40 : 100;
        const fgGeo = new THREE.BufferGeometry();
        const fgPos = new Float32Array(fgCount * 3);
        for (let i = 0; i < fgCount; i++) {
            fgPos[i*3] = (Math.random()-.5)*30; fgPos[i*3+1] = (Math.random()-.5)*20; fgPos[i*3+2] = (Math.random()-.5)*10;
        }
        fgGeo.setAttribute('position', new THREE.BufferAttribute(fgPos, 3));
        const fgParticles = new THREE.Points(fgGeo, new THREE.PointsMaterial({ size:isMobile?.12:.09, color:0xffffff, transparent:true, opacity:.8 }));
        scene.add(fgParticles);

        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', e => { mouseX = e.clientX - window.innerWidth/2; mouseY = e.clientY - window.innerHeight/2; });
        const clock = new THREE.Clock();
        (function animate() {
            requestAnimationFrame(animate);
            camera.rotation.x += .05 * (-mouseY*.0005 - camera.rotation.x);
            camera.rotation.y += .05 * (-mouseX*.0005 - camera.rotation.y);
            fgParticles.rotation.y = clock.getElapsedTime() * .1;
            renderer.render(scene, camera);
        })();
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Fade-in
            const obs = new IntersectionObserver(entries => {
                entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
            }, { threshold: .1 });
            document.querySelectorAll('.fade-in').forEach(el => obs.observe(el));

            // Copy-Buttons
            document.querySelectorAll('.copy-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id  = btn.dataset.copy;
                    const val = document.getElementById(id)?.textContent.trim() ?? '';
                    navigator.clipboard.writeText(val).then(() => {
                        btn.textContent = 'Kopiert ✓';
                        btn.classList.add('copied');
                        setTimeout(() => {
                            btn.textContent = 'Kopieren';
                            btn.classList.remove('copied');
                        }, 2000);
                    });
                });
            });
        });
    </script>
</body>
</html>
