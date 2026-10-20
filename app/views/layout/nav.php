<?php
/**
 * Site header: logo, main navigation, donate button — and the menu dialog for small screens.
 * Behaviour: initHeader(), initNavMenu(), initMobileMenu() in main.js.
 *
 * @var string $path  URL path of the current page, to mark the active link.
 */

$projects = data('projects');
$event    = upcoming_event();

// Secondary links, shared by the desktop navigation and the menu dialog.
$links = array_filter([
    $event ? ['href' => '/#veranstaltung', 'label' => 'Veranstaltung'] : null,
    ['href' => '/#team', 'label' => 'Team'],
    ['href' => '/kontakt.php', 'label' => 'Kontakt'],
]);

$current = static fn (string $href): ?string => $href === $path ? 'page' : null;
?>
<header class="site-header" data-site-header>
    <div class="site-header__inner container">
        <a href="/" class="site-header__logo" <?= $path === '/' ? 'aria-current="page"' : '' ?>><?= e(config('site.name')) ?></a>

        <nav class="site-nav" aria-label="Hauptnavigation">
            <ul class="site-nav__list" role="list">
                <li class="site-nav__item site-nav__item--menu" data-nav-menu>
                    <button type="button" class="site-nav__link" aria-expanded="false" aria-controls="nav-projekte">
                        Projekte <?= icon('chevron-down', 'icon site-nav__chevron') ?>
                    </button>
                    <ul class="site-nav__menu" id="nav-projekte" role="list">
                        <?php foreach ($projects as $project): ?>
                            <li>
                                <a href="<?= e($project['path']) ?>" class="site-nav__menu-link" <?= ($current($project['path']) ? 'aria-current="page"' : '') ?>>
                                    <?= e($project['name']) ?>
                                    <?php if (!empty($project['featured'])): ?><span class="site-nav__tag">Hauptprojekt</span><?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php foreach ($links as $link): ?>
                    <li class="site-nav__item">
                        <a href="<?= e($link['href']) ?>" class="site-nav__link" <?= ($current($link['href']) ? 'aria-current="page"' : '') ?>><?= e($link['label']) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="site-header__actions">
            <a href="/spenden.php" class="btn btn--donate btn--sm" <?= ($current('/spenden.php') ? 'aria-current="page"' : '') ?>>Spenden</a>
            <button type="button" class="icon-btn site-header__menu-button" aria-haspopup="dialog" aria-controls="mobile-menu" data-menu-open>
                <?= icon('menu') ?>
                <span class="visually-hidden">Menü öffnen</span>
            </button>
        </div>
    </div>
</header>

<dialog class="mobile-menu" id="mobile-menu" aria-label="Menü" data-mobile-menu>
    <div class="mobile-menu__bar container">
        <a href="/" class="site-header__logo"><?= e(config('site.name')) ?></a>
        <button type="button" class="icon-btn" data-menu-close>
            <?= icon('close') ?>
            <span class="visually-hidden">Menü schließen</span>
        </button>
    </div>

    <nav class="mobile-menu__body container" aria-label="Hauptnavigation">
        <p class="label">Projekte</p>
        <ul class="mobile-menu__projects" role="list">
            <?php foreach ($projects as $project): ?>
                <li>
                    <a href="<?= e($project['path']) ?>" class="mobile-menu__project" <?= ($current($project['path']) ? 'aria-current="page"' : '') ?>>
                        <?= e($project['name']) ?>
                        <?php if (!empty($project['featured'])): ?><span class="site-nav__tag">Hauptprojekt</span><?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <ul class="mobile-menu__links" role="list">
            <?php foreach ($links as $link): ?>
                <li><a href="<?= e($link['href']) ?>" class="mobile-menu__link" <?= ($current($link['href']) ? 'aria-current="page"' : '') ?>><?= e($link['label']) ?></a></li>
            <?php endforeach; ?>
        </ul>

        <div class="mobile-menu__footer">
            <a href="/spenden.php" class="btn btn--donate btn--lg btn--block">Jetzt spenden</a>
            <p class="mobile-menu__legal">
                <a href="/impressum.php">Impressum</a>
                <a href="/datenschutz.php">Datenschutz</a>
            </p>
        </div>
    </nav>
</dialog>
