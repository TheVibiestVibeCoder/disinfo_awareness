<?php
/**
 * Project teaser on the home page. The whole card is clickable (stretched link).
 *
 * @var array $project  Entry from app/data/projects.php
 * @var int   $delay    Reveal stagger step (0–4)
 */
?>
<article class="project-card <?= fade_in($delay) ?>">
    <div class="project-card__media">
        <?= image($project['card']['image'], $project['card']['alt'], '(min-width: 900px) 30vw, 85vw') ?>
    </div>
    <div class="project-card__body">
        <h3 class="project-card__title">
            <a href="<?= e($project['path']) ?>" class="project-card__link"><?= e($project['name']) ?></a>
        </h3>
        <p class="project-card__text"><?= e($project['card']['text']) ?></p>
        <p class="project-card__more" aria-hidden="true">
            Mehr erfahren
            <span class="icon-btn icon-btn--sm"><?= icon('arrow-up-right') ?></span>
        </p>
    </div>
</article>
