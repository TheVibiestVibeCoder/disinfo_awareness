<?php
/**
 * Page hero over the particle canvas.
 *
 * @var string|null         $variant  home | project | contact | legal — null for the default
 * @var string              $eyebrow  Small line above the title
 * @var string|list<string> $title    Title; list items become line breaks
 * @var string|null         $lead     Optional paragraph below the title
 */

$variant ??= null;
$lead    ??= null;
?>
<header class="<?= e(class_names('hero', $variant ? "hero--{$variant}" : null)) ?>">
    <div class="hero__canvas" data-hero-canvas></div>
    <div class="hero__content">
        <div class="hero__eyebrow fade-in"><?= e($eyebrow) ?></div>
        <h1 class="hero__title fade-in delay-1"><?= lines($title) ?></h1>
        <?php if ($lead): ?>
            <p class="hero__lead fade-in delay-2"><?= e($lead) ?></p>
        <?php endif; ?>
    </div>
</header>
