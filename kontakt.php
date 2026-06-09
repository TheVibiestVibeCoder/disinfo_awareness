<?php
session_start();

$message_sent  = false;
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Honeypot: bots fill this, humans don't
    if (!empty($_POST['website'])) {
        $message_sent = true; // silently succeed to not reveal detection
        goto render;
    }

    // CSRF validation
    if (
        empty($_POST['csrf_token']) ||
        !isset($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
    ) {
        $error_message = 'Ungültige Anfrage. Bitte laden Sie die Seite neu.';
        goto render;
    }
    // Regenerate token after use
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    // Sanitize inputs – strip newlines from everything to prevent header injection
    $name    = mb_substr(preg_replace('/[\r\n\t]/', ' ', strip_tags(trim($_POST['name']    ?? ''))), 0, 120);
    $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST['message'] ?? ''));

    // Whitelist the subject dropdown (prevents any injection via that field)
    $allowed_subjects = ['Allgemeine Anfrage', 'Workshop Buchung', 'Presse', 'Partnerschaft'];
    $raw_subject      = trim($_POST['subject'] ?? '');
    $subject          = in_array($raw_subject, $allowed_subjects, true) ? $raw_subject : 'Allgemeine Anfrage';

    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Bitte füllen Sie alle Felder korrekt aus.';
        goto render;
    }

    $to      = 'kontakt@disinfoconsulting.eu';
    $body    = "Name: $name\nEmail: $email\n\nNachricht:\n$message\n";

    // Fixed From header — user address goes in Reply-To only (prevents header injection)
    $headers  = "From: Disinfo Awareness <kontakt@disinfoconsulting.eu>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        $message_sent = true;
    } else {
        $error_message = 'Es gab ein Problem beim Senden. Bitte versuchen Sie es später erneut.';
    }

} else {
    // Generate CSRF token for the form
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

render:

$page_title    = 'Kontakt – Disinfo Awareness';
$page_desc     = 'Nehmen Sie Kontakt mit Disinfo Awareness auf. Wir freuen uns auf Ihre Fragen, Anregungen oder Kooperationsanfragen im Kampf gegen Desinformation.';
$page_canonical = 'https://disinfoawareness.eu/kontakt.php';
$og_image_alt  = 'Kontaktieren Sie Disinfo Awareness';
$schema_json   = '{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Kontakt – Disinfo Awareness",
  "description": "Nehmen Sie Kontakt mit Disinfo Awareness auf.",
  "url": "https://disinfoawareness.eu/kontakt.php",
  "inLanguage": "de",
  "publisher": { "@type": "Organization", "name": "Disinfo Awareness", "url": "https://disinfoawareness.eu" }
}';

$extra_head = <<<'CSS'
<style>
    h1 { font-size: clamp(3.5rem, 16vw, 12rem); }
    h3 { font-size: 2.5rem; color: var(--highlight); margin-bottom: 1.5rem; line-height: 1; }
    .hero { height: 60dvh; min-height: 400px; }
    #canvas-container { opacity: 0.5; }

    .grid-wrapper { display: grid; grid-template-columns: 1fr; width: 100%; }
    @media (min-width: 900px) { .content-split { grid-template-columns: 1fr 1fr; min-height: 100vh; } }

    .info-col {
        position: relative; padding: 3rem 2rem;
        border-bottom: 1px solid var(--grid-line); overflow: hidden;
        display: flex; flex-direction: column; justify-content: center;
    }
    @media (min-width: 900px) { .info-col { border-right: 1px solid var(--grid-line); border-bottom: none; padding: 4rem 3rem; } }

    .info-bg {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: url('https://images.unsplash.com/photo-1545285446-ff15b9e9b9b9?q=80&w=1170&auto=format&fit=crop');
        background-size: cover; background-position: center;
        z-index: 1; filter: grayscale(100%) brightness(0.2); transition: all 0.8s ease;
    }
    .info-col:hover .info-bg { filter: grayscale(0%) brightness(0.4); transform: scale(1.05); }
    .info-content { position: relative; z-index: 2; }

    .contact-details { margin-top: 3rem; }
    .contact-item { margin-bottom: 2rem; }
    .contact-label { font-family: var(--font-head); color: #666; letter-spacing: 2px; font-size: 1.2rem; margin-bottom: 0.5rem; display: block; }
    .contact-value { font-size: 1.1rem; color: #fff; }

    .form-col {
        padding: 3rem 2rem; display: flex; flex-direction: column; justify-content: center;
        background: linear-gradient(to bottom, #0a0a0a, var(--bg-color));
    }
    @media (min-width: 900px) { .form-col { padding: 4rem 3rem; } }

    .form-group { margin-bottom: 1.5rem; }
    label { display: block; font-family: var(--font-head); letter-spacing: 1px; margin-bottom: 0.5rem; color: #888; font-size: 1.1rem; }
    input, textarea, select {
        width: 100%; padding: 1rem;
        background: rgba(255,255,255,0.05); border: 1px solid var(--grid-line);
        color: #fff; font-family: var(--font-body); font-size: 1rem;
        transition: border-color 0.3s ease; outline: none; border-radius: 0;
    }
    input:focus, textarea:focus, select:focus { border-color: var(--highlight); background: rgba(255,255,255,0.08); }
    textarea { resize: vertical; min-height: 150px; }
    select option { background: #111; }

    .submit-btn {
        width: 100%; padding: 1rem;
        background: var(--highlight); color: var(--bg-color);
        border: none; font-family: var(--font-head); font-size: 1.4rem;
        cursor: pointer; transition: opacity 0.3s ease; margin-top: 1rem;
    }
    .submit-btn:hover { opacity: 0.8; }

    .msg-box { padding: 1rem; margin-bottom: 2rem; border: 1px solid; }
    .msg-success { border-color: #4BB543; color: #4BB543; background: rgba(75,181,67,0.1); }
    .msg-error   { border-color: #ff3333; color: #ff3333; background: rgba(255,51,51,0.1); }

    .honeypot { position: absolute; left: -9999px; }
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
            <div class="hero-subtitle fade-in">Wir freuen uns auf Sie</div>
            <h1 class="fade-in" style="transition-delay: 0.1s;">Kontakt</h1>
        </div>
    </header>

    <section class="grid-wrapper content-split">

        <div class="info-col fade-in">
            <div class="info-bg" aria-hidden="true"></div>
            <div class="info-content">
                <h3>Lass uns sprechen</h3>
                <p>Egal ob Sie einen Workshop buchen möchten, Fragen zu unserer Forschung haben oder Partner werden wollen – wir sind erreichbar.</p>
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

            <?php if ($message_sent): ?>
                <div class="msg-box msg-success" role="alert">
                    <strong>Vielen Dank!</strong> Ihre Nachricht wurde erfolgreich gesendet. Wir melden uns in Kürze.
                </div>
            <?php endif; ?>

            <?php if (!empty($error_message)): ?>
                <div class="msg-box msg-error" role="alert">
                    <strong>Fehler:</strong> <?= htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endif; ?>

            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>" method="POST" novalidate>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                <!-- Honeypot: hidden from real users, bots fill it in -->
                <div class="honeypot" aria-hidden="true">
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required placeholder="Ihr Name" maxlength="120" autocomplete="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="ihre@email.com" maxlength="254" autocomplete="email">
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
                    <textarea id="message" name="message" required placeholder="Wie können wir helfen?" maxlength="5000"></textarea>
                </div>

                <button type="submit" class="submit-btn">Nachricht Senden</button>
            </form>
        </div>

    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
