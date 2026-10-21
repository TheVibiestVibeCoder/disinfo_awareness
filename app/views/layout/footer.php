<?php
/**
 * Site footer: our claim, short description, links to every page.
 */

$projects = data('projects');
?>
<footer class="site-footer">
    <div class="container">
        <p class="site-footer__claim">Gemeinsam gegen <span class="accent">Desinformation</span></p>

        <div class="site-footer__grid">
            <div class="site-footer__about">
                <p class="site-footer__name"><?= e(config('site.name')) ?></p>
                <p class="site-footer__text">Ein gemeinnütziger Verein zur Stärkung der Demokratie. Wir verbinden Technologie mit Bildung für eine resilientere Gesellschaft.</p>
            </div>

            <nav class="site-footer__nav" aria-label="Fußzeile">
                <div class="site-footer__col">
                    <h2 class="site-footer__title">Projekte</h2>
                    <ul role="list">
                        <?php foreach ($projects as $project): ?>
                            <li><a href="<?= e($project['path']) ?>" class="site-footer__link"><?= e($project['name']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="site-footer__col">
                    <h2 class="site-footer__title">Kontakt</h2>
                    <ul role="list">
                        <li><a href="/kontakt.php" class="site-footer__link">Kontakt</a></li>
                        <li><a href="<?= e(config('social.linkedin')) ?>" class="site-footer__link" rel="noopener">LinkedIn</a></li>
                        <li><a href="/spenden.php" class="site-footer__link">Spenden</a></li>
                    </ul>
                </div>
                <div class="site-footer__col">
                    <h2 class="site-footer__title">Rechtliches</h2>
                    <ul role="list">
                        <li><a href="/impressum.php" class="site-footer__link">Impressum</a></li>
                        <li><a href="/datenschutz.php" class="site-footer__link">Datenschutz</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <p class="site-footer__bottom">&copy; <?= date('Y') ?> <?= e(config('site.name')) ?>. Wien, Österreich.</p>
    </div>
</footer>
