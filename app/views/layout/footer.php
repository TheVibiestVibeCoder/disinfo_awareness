<footer class="site-footer" aria-label="Fußzeile">
    <div class="site-footer__grid">
        <div class="site-footer__col">
            <h4 class="site-footer__title"><?= e(config('site.name')) ?></h4>
            <p class="site-footer__text">Ein gemeinnütziger Verein zur Stärkung der Demokratie. Wir verbinden Technologie mit Bildung für eine resilientere Gesellschaft.</p>
        </div>
        <div class="site-footer__col">
            <h4 class="site-footer__title">Kontakt</h4>
            <a href="/kontakt.php" class="site-footer__link">Kontakt</a>
            <a href="<?= e(config('social.linkedin')) ?>" class="site-footer__link">LinkedIn</a>
        </div>
        <div class="site-footer__col">
            <h4 class="site-footer__title">Rechtliches</h4>
            <a href="/impressum.php" class="site-footer__link">Impressum</a>
            <a href="/datenschutz.php" class="site-footer__link">Datenschutz</a>
        </div>
    </div>
    <div class="site-footer__bottom">&copy; <?= date('Y') ?> <?= e(config('site.name')) ?>. Wien, Österreich.</div>
</footer>
