<?php
// --- PHP KONTAKTFORMULAR LOGIK ---
$message_sent = false;
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Empfänger-Adresse hier eintragen:
    $to = "kontakt@disinfoconsulting.eu"; 
    
    // Daten bereinigen
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = strip_tags(trim($_POST["message"]));

    // Validierung
    if ( empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $error_message = "Bitte füllen Sie alle Felder korrekt aus.";
    } else {
        // E-Mail Inhalt
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Nachricht:\n$message\n";

        // Header
        $headers = "From: $name <$email>";

        // Senden
        if (mail($to, $subject, $email_content, $headers)) {
            $message_sent = true;
        } else {
            $error_message = "Es gab ein Problem beim Senden. Bitte versuchen Sie es später erneut.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Kontakt - Disinfo Awareness</title>
    <meta name="theme-color" content="#050505">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Manrope:wght@300;400;600&display=swap" rel="stylesheet">
    
    <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.160.0/build/three.module.js"
            }
        }
    </script>

    <style>
        /* --- RESET & VARIABLES --- */
        :root {
            --bg-color: #050505;
            --text-color: #f0f0f0;
            --highlight: #ffffff;
            --grid-line: rgba(255, 255, 255, 0.15);
            --font-head: 'Bebas Neue', display;
            --font-body: 'Manrope', sans-serif;
            --input-bg: rgba(255,255,255,0.05);
            --success-color: #4BB543;
            --error-color: #ff3333;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: var(--font-body);
            line-height: 1.6;
            width: 100%;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* --- TYPOGRAPHY --- */
        h1, h2, h3, h4 {
            font-family: var(--font-head);
            text-transform: uppercase;
            font-weight: 400;
            letter-spacing: 1px;
            line-height: 0.9;
        }

        h1 {
            font-size: clamp(3.5rem, 16vw, 12rem);
            color: var(--highlight);
            margin-bottom: 1rem;
            word-break: break-word; 
        }

        h3 {
            font-size: 2.5rem;
            color: var(--highlight);
            margin-bottom: 1.5rem;
        }

        p {
            font-size: 1.1rem;
            color: #b0b0b0;
            font-weight: 300;
            max-width: 60ch;
        }

        a {
            color: var(--highlight);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        /* --- NAVIGATION --- */
        nav {
            position: fixed;
            top: 0; left: 0; width: 100%;
            padding: 1rem 1.5rem; 
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to bottom, rgba(5,5,5,0.95) 0%, rgba(5,5,5,0.8) 50%, transparent 100%);
            backdrop-filter: blur(2px);
        }

        .logo {
            font-family: var(--font-head);
            font-size: 1.4rem;
            letter-spacing: 1.5px;
            white-space: nowrap;
        }

        .nav-actions { display: flex; gap: 1rem; }

        .cta-btn {
            border: 1px solid var(--highlight);
            padding: 0.5rem 1.2rem;
            font-family: var(--font-head);
            font-size: 1.1rem;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(10px);
            white-space: nowrap;
            cursor: pointer;
            display: inline-block;
        }

        .cta-btn:hover {
            background: var(--highlight);
            color: var(--bg-color);
        }

        @media (max-width: 450px) {
            .logo { font-size: 1.2rem; }
            .cta-btn { padding: 0.4rem 0.8rem; font-size: 1rem; }
            .nav-actions { gap: 0.5rem; }
        }

        /* --- HERO --- */
        .hero {
            position: relative;
            height: 60dvh; 
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem 1.5rem;
            border-bottom: 1px solid var(--grid-line);
            overflow: hidden;
        }

        #canvas-container {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 1;
            opacity: 0.5; 
            pointer-events: none; 
        }

        .hero-content { position: relative; z-index: 10; width: 100%; max-width: 1200px; }

        .hero-subtitle {
            font-family: var(--font-head);
            font-size: clamp(1rem, 2vw, 1.5rem);
            letter-spacing: 4px;
            color: #888;
            margin-bottom: 2rem;
            text-transform: uppercase;
        }

        /* --- CONTACT GRID --- */
        .grid-wrapper {
            display: grid;
            grid-template-columns: 1fr; 
            width: 100%;
        }

        @media (min-width: 900px) {
            .content-split {
                grid-template-columns: 1fr 1fr; 
                min-height: 100vh; 
            }
        }

        /* Left Column: Info & Image */
        .info-col {
            position: relative;
            padding: 3rem 2rem;
            border-bottom: 1px solid var(--grid-line);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (min-width: 900px) {
            .info-col {
                border-right: 1px solid var(--grid-line);
                border-bottom: none;
                padding: 4rem 3rem;
            }
        }

        .info-bg {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: url('https://images.unsplash.com/photo-1545285446-ff15b9e9b9b9?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3Dp');
            background-size: cover;
            background-position: center;
            z-index: 1;
            filter: grayscale(100%) brightness(0.2);
            transition: all 0.8s ease;
        }
        
        .info-col:hover .info-bg {
            filter: grayscale(0%) brightness(0.4);
            transform: scale(1.05);
        }

        .info-content { position: relative; z-index: 2; }

        .contact-details { margin-top: 3rem; }
        .contact-item { margin-bottom: 2rem; }
        .contact-label {
            font-family: var(--font-head);
            color: #666;
            letter-spacing: 2px;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            display: block;
        }
        .contact-value { font-size: 1.1rem; color: #fff; }

        /* Right Column: Form */
        .form-col {
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: linear-gradient(to bottom, #0a0a0a, var(--bg-color));
        }

        @media (min-width: 900px) {
            .form-col { padding: 4rem 3rem; }
        }

        /* FORM STYLES */
        .form-group { margin-bottom: 1.5rem; }

        label {
            display: block;
            font-family: var(--font-head);
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            color: #888;
            font-size: 1.1rem;
        }

        input, textarea, select {
            width: 100%;
            padding: 1rem;
            background: var(--input-bg);
            border: 1px solid var(--grid-line);
            color: #fff;
            font-family: var(--font-body);
            font-size: 1rem;
            transition: border-color 0.3s ease;
            outline: none;
            border-radius: 0; /* Clean edges */
        }

        input:focus, textarea:focus, select:focus {
            border-color: var(--highlight);
            background: rgba(255,255,255,0.08);
        }

        textarea { resize: vertical; min-height: 150px; }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: var(--highlight);
            color: var(--bg-color);
            border: none;
            font-family: var(--font-head);
            font-size: 1.4rem;
            cursor: pointer;
            transition: opacity 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover { opacity: 0.8; }

        /* Messages */
        .msg-box {
            padding: 1rem;
            margin-bottom: 2rem;
            border: 1px solid;
            font-family: var(--font-body);
        }
        .msg-success {
            border-color: var(--success-color);
            color: var(--success-color);
            background: rgba(75, 181, 67, 0.1);
        }
        .msg-error {
            border-color: var(--error-color);
            color: var(--error-color);
            background: rgba(255, 51, 51, 0.1);
        }

        /* --- FOOTER --- */
        footer {
            background: #020202;
            border-top: 1px solid var(--grid-line);
            color: #666;
            font-size: 0.9rem;
        }
        .footer-bottom {
            padding: 1.5rem 2rem; text-align: center; 
            color: #444; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px;
        }

        /* --- ANIMATIONS --- */
        .fade-in { 
            opacity: 0; transform: translateY(20px); 
            transition: opacity 0.8s ease-out, transform 0.8s ease-out; 
            will-change: opacity, transform;
        }
        .fade-in.visible { opacity: 1; transform: translateY(0); }

    </style>
</head>
<body>

    <nav>
        <a href="https://disinfoawareness.eu/" class="logo">Disinfo Awareness</a>
        <div class="nav-actions">
            <a href="https://disinfoawareness.eu/kontakt.php" class="cta-btn" style="background:var(--highlight); color:var(--bg-color);">Kontakt</a>
            <a href="https://disinfoawareness.eu/kontakt.php" class="cta-btn">Mitmachen</a>
        </div>
    </nav>

    <header class="hero">
        <div id="canvas-container"></div>
        <div class="hero-content">
            <div class="hero-subtitle fade-in">Wir freuen uns auf Sie</div>
            <h1 class="fade-in" style="transition-delay: 0.1s;">Kontakt</h1>
        </div>
    </header>

    <section class="grid-wrapper content-split">
        
        <div class="info-col fade-in">
            <div class="info-bg"></div>
            <div class="info-content">
                <h3>Lass uns sprechen</h3>
                <p>
                    Egal ob Sie einen Workshop buchen möchten, Fragen zu unserer Forschung haben oder Partner werden wollen – wir sind erreichbar.
                </p>

                <div class="contact-details">
                    <div class="contact-item">
                        <span class="contact-label">Standort</span>
                        <span class="contact-value">Wien, Österreich<br>(Termine nach Vereinbarung)</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-label">Social</span>
                        <div style="display:flex; gap:1rem; margin-top:0.5rem;">
                            <a href="https://www.linkedin.com/in/markus-schwinghammer-335a0b201/">LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-col fade-in" style="transition-delay: 0.1s;">
            
            <?php if($message_sent): ?>
                <div class="msg-box msg-success">
                    <strong>Vielen Dank!</strong> Ihre Nachricht wurde erfolgreich gesendet. Wir melden uns in Kürze.
                </div>
            <?php endif; ?>

            <?php if(!empty($error_message)): ?>
                <div class="msg-box msg-error">
                    <strong>Fehler:</strong> <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required placeholder="Ihr Name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="ihre@email.com">
                </div>

                <div class="form-group">
                    <label for="subject">Betreff</label>
                    <select id="subject" name="subject">
                        <option value="Allgemeine Anfrage">Allgemeine Anfrage</option>
                        <option value="Workshop Buchung">Workshop Buchung</option>
                        <option value="Presse">Presse</option>
                        <option value="Partnerschaft">Partnerschaft</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Nachricht</label>
                    <textarea id="message" name="message" required placeholder="Wie können wir helfen?"></textarea>
                </div>

                <button type="submit" class="submit-btn">Nachricht Senden</button>
            </form>
        </div>

    </section>

    <footer>
        <div class="footer-bottom">
            &copy; 2026 Disinfo Awareness. Wien, Österreich.
        </div>
    </footer>

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
        const bgGeometry = new THREE.BufferGeometry();
        const bgPos = new Float32Array(bgCount * 3);
        for(let i = 0; i < bgCount; i++) {
            bgPos[i * 3] = (Math.random() - 0.5) * 60; 
            bgPos[i * 3 + 1] = (Math.random() - 0.5) * 60; 
            bgPos[i * 3 + 2] = (Math.random() - 0.5) * 60; 
        }
        bgGeometry.setAttribute('position', new THREE.BufferAttribute(bgPos, 3));
        const bgMaterial = new THREE.PointsMaterial({ size: 0.05, color: 0x444444, transparent: true, opacity: 0.6 });
        const bgParticles = new THREE.Points(bgGeometry, bgMaterial);
        scene.add(bgParticles);

        const fgCount = isMobile ? 40 : 100;
        const fgGeometry = new THREE.BufferGeometry();
        const fgPos = new Float32Array(fgCount * 3);
        for(let i = 0; i < fgCount; i++) {
            fgPos[i * 3] = (Math.random() - 0.5) * 30; 
            fgPos[i * 3 + 1] = (Math.random() - 0.5) * 20; 
            fgPos[i * 3 + 2] = (Math.random() - 0.5) * 10; 
        }
        fgGeometry.setAttribute('position', new THREE.BufferAttribute(fgPos, 3));
        const fgMaterial = new THREE.PointsMaterial({ size: isMobile ? 0.12 : 0.09, color: 0xffffff, transparent: true, opacity: 0.8 });
        const fgParticles = new THREE.Points(fgGeometry, fgMaterial);
        scene.add(fgParticles);

        let mouseX = 0, mouseY = 0;
        const windowHalfX = window.innerWidth / 2, windowHalfY = window.innerHeight / 2;
        document.addEventListener('mousemove', (event) => {
            mouseX = (event.clientX - windowHalfX);
            mouseY = (event.clientY - windowHalfY);
        });
        if(isMobile) {
            window.addEventListener('deviceorientation', (event) => {
                if(event.gamma && event.beta) {
                    mouseX = event.gamma * 10;
                    mouseY = event.beta * 10;
                }
            });
        }
        const clock = new THREE.Clock();
        function animate() {
            requestAnimationFrame(animate);
            const time = clock.getElapsedTime();
            const targetX = mouseX * 0.0005, targetY = mouseY * 0.0005;
            camera.rotation.x += 0.05 * (-targetY - camera.rotation.x);
            camera.rotation.y += 0.05 * (-targetX - camera.rotation.y);
            bgParticles.rotation.y = time * 0.05;
            fgParticles.rotation.y = time * 0.1;
            renderer.render(scene, camera);
        }
        animate();
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fadeObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('visible');
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.fade-in').forEach(el => fadeObserver.observe(el));
        });
    </script>
</body>
</html>