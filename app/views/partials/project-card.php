<?php
/**
 * Project teaser on the home page.
 *
 * @var array $project  Entry from app/data/projects.php
 * @var int   $delay    Reveal stagger step (0–4)
 */
?>
<article class="project-card <?= fade_in($delay) ?>" data-inview>
    <div class="project-card__bg" style="background-image: url('<?= e($project['card']['image']) ?>');"></div>
    <div class="project-card__content">
        <h2 class="project-card__title"><?= lines($project['title']) ?></h2>
        <p class="project-card__text"><?= e($project['card']['text']) ?></p>
        <a href="<?= e($project['path']) ?>" class="project-card__link">Mehr erfahren</a>
    </div>
</article>
