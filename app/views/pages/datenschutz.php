<?php
/**
 * Privacy policy (datenschutz.php).
 */

view('partials/hero', [
    'variant' => 'legal',
    'eyebrow' => 'Informationspflicht',
    'title'   => 'Datenschutz',
    'lead'    => 'Erklärung zur Informationspflicht / Datenschutzerklärung',
]);
?>

<section class="split legal-section">
    <div class="legal-section__aside fade-in">
        <h3 class="legal-section__title">Grundlagen</h3>
    </div>
    <div class="legal-section__body fade-in delay-1">
        <p>Der Schutz Ihrer persönlichen Daten ist uns ein besonderes Anliegen. Wir verarbeiten Ihre Daten daher ausschließlich auf Grundlage der gesetzlichen Bestimmungen (DSGVO, TKG 2003).</p>
        <h4 class="legal-heading">1. Kontaktaufnahme &amp; PDF-Zusendung</h4>
        <p>Wenn Sie uns per E-Mail oder über das Kontaktformular kontaktieren oder ein PDF anfordern, verarbeiten wir Ihre angegebenen Daten (z. B. Name, E-Mail-Adresse) zur Bearbeitung Ihrer Anfrage und zur Übermittlung des Dokuments. Diese Daten werden sechs Monate gespeichert und nicht ohne Ihre Einwilligung weitergegeben.</p>
        <p class="legal-note">Rechtsgrundlage: Art. 6 Abs. 1 lit. b bzw. a DSGVO.</p>
    </div>
</section>

<section class="split legal-section">
    <div class="legal-section__aside fade-in">
        <h3 class="legal-section__title">Technik</h3>
    </div>
    <div class="legal-section__body fade-in delay-1">
        <h4 class="legal-heading">2. Zugriff auf unsere Website</h4>
        <p>Beim Besuch unserer Website werden Ihre IP-Adresse sowie Beginn und Ende der Sitzung erfasst. Dies ist technisch notwendig und dient unserem berechtigten Interesse gemäß Art. 6 Abs. 1 lit. f DSGVO.</p>
        <h4 class="legal-heading">3. Cookies</h4>
        <p>Unsere Website verwendet Cookies, um benutzerfreundliche Funktionen bereitzustellen. Sie können das Setzen von Cookies im Browser unterbinden. Die Deaktivierung kann jedoch die Funktionalität einschränken.</p>
    </div>
</section>

<section class="split legal-section">
    <div class="legal-section__aside fade-in">
        <h3 class="legal-section__title">Ihre Rechte</h3>
    </div>
    <div class="legal-section__body fade-in delay-1">
        <h4 class="legal-heading">4. Betroffenenrechte</h4>
        <p>Sie haben das Recht auf Auskunft, Berichtigung, Löschung, Einschränkung, Datenübertragbarkeit sowie Widerspruch. Bei Datenschutzverstößen können Sie sich bei uns oder der österreichischen Datenschutzbehörde beschweren.</p>
        <div class="legal-contact">
            <h4 class="legal-heading">Kontakt für Datenschutz</h4>
            <p><strong><?= e(config('site.name')) ?></strong><br>E-Mail: <a href="/kontakt.php">Kontaktformular</a></p>
        </div>
    </div>
</section>
