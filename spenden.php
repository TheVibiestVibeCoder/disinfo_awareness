<?php
// ── Env laden ──────────────────────────────────────────────
function loadEnv(string $path): void {
    if (!file_exists($path)) return;
    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#') continue;
        if (str_contains($line, '=')) {
            [$key, $val] = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($val);
        }
    }
}
loadEnv(__DIR__ . '/.env');

$stripeSecret      = $_ENV['STRIPE_SECRET_KEY']    ?? '';
$stripePublishable = $_ENV['STRIPE_PUBLISHABLE_KEY'] ?? '';
$appUrl            = rtrim($_ENV['APP_URL'] ?? 'https://disinfoawareness.eu', '/');

$allowedPrices = [
    '5'  => $_ENV['STRIPE_PRICE_5EUR']  ?? '',
    '10' => $_ENV['STRIPE_PRICE_10EUR'] ?? '',
    '15' => $_ENV['STRIPE_PRICE_15EUR'] ?? '',
];

// ── POST: Checkout Session erstellen und weiterleiten ──────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'] ?? '';

    if (!isset($allowedPrices[$amount]) || empty($allowedPrices[$amount])) {
        header('Location: /spenden.php?fehler=1');
        exit;
    }

    $ch = curl_init('https://api.stripe.com/v1/checkout/sessions');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query([
            'mode'                           => 'subscription',
            'line_items[0][price]'           => $allowedPrices[$amount],
            'line_items[0][quantity]'        => 1,
            'success_url'                    => $appUrl . '/spenden.php?danke=1',
            'cancel_url'                     => $appUrl . '/spenden.php?abbruch=1',
            'payment_method_types[0]'        => 'card',
            'subscription_data[metadata][source]' => 'website_spenden',
        ]),
        CURLOPT_USERPWD    => $stripeSecret . ':',
        CURLOPT_HTTPHEADER => ['Stripe-Version: 2024-06-20'],
    ]);

    $response = json_decode(curl_exec($ch), true);
    $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status === 200 && isset($response['url'])) {
        header('Location: ' . $response['url']);
        exit;
    }

    header('Location: /spenden.php?fehler=1');
    exit;
}

// ── Status aus Query-Parametern ────────────────────────────
$state = match(true) {
    isset($_GET['danke'])   => 'danke',
    isset($_GET['abbruch']) => 'abbruch',
    isset($_GET['fehler'])  => 'fehler',
    default                 => null,
};
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <title>Spenden – Disinfo Awareness unterstützen</title>
    <meta name="description" content="Unterstütze Disinfo Awareness mit einer monatlichen Spende ab 5 Euro. Unabhängige Aufklärung gegen Desinformation braucht deine Hilfe.">
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
            --bg:        #050505;
            --text:      #f0f0f0;
            --white:     #ffffff;
            --muted:     #b0b0b0;
            --line:      rgba(255,255,255,0.15);
            --head:      'Bebas Neue', display;
            --body:      'Manrope', sans-serif;
            --ease:      all 0.6s cubic-bezier(0.16,1,0.3,1);
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
        h2 { font-size:clamp(2.5rem,6vw,5rem);  color:var(--white); }
        p  { font-size:clamp(1rem,1.2vw,1.15rem); color:var(--muted); font-weight:300; max-width:60ch; }
        a  { color:var(--white); text-decoration:none; transition:var(--ease); }
        strong { color:var(--white); font-weight:600; }

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

        /* STATUS BANNER */
        .status-banner {
            padding:1.2rem 2rem; text-align:center;
            font-family:var(--body); font-size:1rem; font-weight:600;
            border-bottom:1px solid var(--line);
        }
        .status-banner.danke   { background:rgba(0,200,100,.12); color:#00c864; }
        .status-banner.abbruch { background:rgba(255,200,0,.08);  color:#ffc800; }
        .status-banner.fehler  { background:rgba(255,60,60,.1);   color:#ff4444; }

        /* DONATE SECTION */
        .donate-section {
            padding: clamp(4rem, 8vh, 7rem) 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3rem;
            border-bottom: 1px solid var(--line);
        }
        .donate-intro { text-align: center; }
        .donate-intro h2 { margin-bottom: 1rem; }
        .donate-intro p  { margin: 0 auto; text-align: center; }

        /* GRID – 1 Spalte mobile, 3 Spalten ab 900px (wie restliche Seiten) */
        .donate-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0;
            width: 100%;
            max-width: 900px;
            border: 1px solid var(--line);
        }
        @media (min-width: 900px) {
            .donate-grid { grid-template-columns: repeat(3, 1fr); }
        }

        .donate-form { display: contents; }

        /* KARTEN – Mobile: vertikal gestapelt */
        .donate-card {
            all: unset;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            padding: 2.5rem 1.5rem;
            border-bottom: 1px solid var(--line);
            background: rgba(255,255,255,0.02);
            transition: background 0.3s ease;
            text-align: center;
            min-height: 160px; /* vernünftiger Touch-Target */
        }
        /* letzte Karte hat keine Doppel-Border mit dem Grid-Rand */
        .donate-card:last-of-type {
            border-bottom: none;
        }

        /* Desktop ab 900px: horizontal nebeneinander */
        @media (min-width: 900px) {
            .donate-card {
                padding: 4rem 2rem;
                border-bottom: none;
                border-right: 1px solid var(--line);
                min-height: 340px;
            }
            .donate-card:last-of-type { border-right: none; }
        }

        .donate-card:hover, .donate-card:focus-visible {
            background: rgba(255,255,255,0.07);
            outline: none;
        }
        .donate-card:active { background: rgba(255,255,255,0.12); }

        /* Betrag – skaliert flüssig auf allen Größen */
        .donate-amount {
            font-family: var(--head);
            font-size: clamp(3.5rem, 8vw, 7rem);
            color: var(--white);
            line-height: 0.9;
            display: block;
        }
        .donate-period {
            font-family: var(--head);
            font-size: clamp(0.9rem, 1.5vw, 1.2rem);
            letter-spacing: 3px;
            color: #666;
            text-transform: uppercase;
            display: block;
        }
        .donate-arrow {
            margin-top: 1.5rem;
            font-family: var(--head);
            font-size: clamp(0.85rem, 1.2vw, 1rem);
            letter-spacing: 2px;
            color: #888;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 2px;
            display: inline-block;
            transition: color 0.3s ease, border-color 0.3s ease;
        }
        .donate-card:hover .donate-arrow { color: var(--white); border-color: var(--white); }

        /* HINWEIS UNTEN */
        .donate-hint {
            font-size: clamp(0.8rem, 1.1vw, 0.9rem);
            color: #555;
            text-align: center;
            max-width: 50ch;
            margin: 0 auto;
        }

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
        .footer-link { color:#888; font-size:1rem; text-decoration:none; transition:color .3s; display:inline-block; }
        .footer-link:hover { color:var(--white); transform:translateX(5px); }
        .footer-bottom { padding:1.5rem 2rem; text-align:center; border-top:1px solid var(--line); color:#444; font-size:.8rem; text-transform:uppercase; letter-spacing:1px; }

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
            <span class="hero-subtitle fade-in">Monatliche Förderung</span>
            <h1 class="fade-in" style="transition-delay:.1s;">Unterstütz<br>Unsere<br>Arbeit</h1>
            <p class="fade-in hero-p" style="transition-delay:.2s;">
                Unabhängige Aufklärung gegen Desinformation braucht unabhängige Finanzierung.
            </p>
        </div>
    </header>

    <?php if ($state): ?>
    <div class="status-banner <?= htmlspecialchars($state) ?>">
        <?php match($state) {
            'danke'   => print('Danke für deine Unterstützung! Dein Abo ist aktiv.'),
            'abbruch' => print('Checkout abgebrochen – du kannst jederzeit erneut spenden.'),
            'fehler'  => print('Ein Fehler ist aufgetreten. Bitte versuche es nochmal oder kontaktiere uns.'),
            default   => null,
        }; ?>
    </div>
    <?php endif; ?>

    <section class="donate-section">

        <div class="donate-intro fade-in">
            <h2>Wähle deinen Betrag</h2>
            <p>Alle Beträge laufen monatlich und sind jederzeit kündbar.</p>
        </div>

        <div class="donate-grid fade-in" style="transition-delay:.1s;">

            <form method="POST" action="/spenden.php" class="donate-form">
                <button type="submit" name="amount" value="5" class="donate-card" aria-label="Monatlich 5 Euro spenden">
                    <span class="donate-amount">€5</span>
                    <span class="donate-period">Pro Monat</span>
                    <span class="donate-arrow">Zu Stripe →</span>
                </button>
            </form>

            <form method="POST" action="/spenden.php" class="donate-form">
                <button type="submit" name="amount" value="10" class="donate-card" aria-label="Monatlich 10 Euro spenden">
                    <span class="donate-amount">€10</span>
                    <span class="donate-period">Pro Monat</span>
                    <span class="donate-arrow">Zu Stripe →</span>
                </button>
            </form>

            <form method="POST" action="/spenden.php" class="donate-form">
                <button type="submit" name="amount" value="15" class="donate-card" aria-label="Monatlich 15 Euro spenden">
                    <span class="donate-amount">€15</span>
                    <span class="donate-period">Pro Monat</span>
                    <span class="donate-arrow">Zu Stripe →</span>
                </button>
            </form>

        </div>

        <p class="donate-hint fade-in" style="transition-delay:.2s;">
            Sichere Zahlung über Stripe · Monatlich kündbar · Keine versteckten Kosten
        </p>

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
            const obs = new IntersectionObserver(entries => {
                entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
            }, { threshold: .1 });
            document.querySelectorAll('.fade-in').forEach(el => obs.observe(el));
        });
    </script>
</body>
</html>
