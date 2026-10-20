<?php
/**
 * Project page template — gemeinde, ngobusiness, schulprojekte, diaspora.
 * Content comes from app/data/projects.php:
 *   - 'slides'   (the main project): one card per slide; the cards stack up while scrolling
 *   - 'sections' (all others): text and photo side by side, alternating sides
 * Both end with the project's call to action and the donation teaser.
 *
 * @var array $project
 */

$isFeatured = !empty($project['featured']);

view('partials/hero', [
    'eyebrow' => $isFeatured ? 'Unser Hauptprojekt' : 'Unsere Arbeit',
    'title'   => $project['title'],
    'lead'    => $project['lead'],
]);
?>

<?php if (!empty($project['slides'])): ?>
    <section class="slides" aria-label="Projektbeschreibung">
        <div class="container">
            <ol class="slides__list" role="list">
                <?php foreach ($project['slides'] as $i => $slide): ?>
                    <li class="slide" id="kapitel-<?= $i + 1 ?>" style="--i: <?= $i ?>">
                        <article class="slide__card">
                            <div class="slide__body">
                                <p class="slide__label"><?= e($slide['label']) ?></p>
                                <div class="slide__content">
                                    <h2 class="slide__title"><?= e($slide['title']) ?></h2>
                                    <p class="slide__text"><?= e($slide['text']) ?></p>
                                </div>
                            </div>
                            <figure class="slide__media">
                                <?= image($slide['image'], $slide['alt'], '(min-width: 900px) 58vw, 100vw', $i === 0 ? ['loading' => 'eager', 'fetchpriority' => 'high'] : []) ?>
                                <?php if ($slide['credit']): ?>
                                    <figcaption class="photo-credit"><?= e($slide['credit']) ?></figcaption>
                                <?php endif; ?>
                            </figure>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>
<?php else: ?>
    <div class="features">
        <?php foreach ($project['sections'] as $i => $section): ?>
            <section class="<?= e(class_names('feature', $i % 2 === 1 ? 'feature--reverse' : null)) ?>" aria-labelledby="feature-<?= $i ?>">
                <div class="container feature__inner">
                    <figure class="feature__media fade-in">
                        <?= image($section['image'], $section['alt'], '(min-width: 900px) 55vw, 100vw', $i === 0 ? ['loading' => 'eager', 'fetchpriority' => 'high'] : []) ?>
                        <figcaption class="feature__caption"><?= lines($section['image_title']) ?></figcaption>
                    </figure>
                    <div class="feature__body fade-in delay-1">
                        <h2 class="feature__title" id="feature-<?= $i ?>"><?= e($section['title']) ?></h2>
                        <?php foreach ($section['text'] as $paragraph): ?>
                            <p class="feature__text"><?= $paragraph /* trusted HTML from app/data */ ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php
view('partials/cta', $project['cta'] + ['href' => '/kontakt.php?betreff=' . $project['subject']]);

view('partials/donate-band', [
    'label'  => 'Spenden',
    'title'  => 'Demokratie ist kein Selbstläufer.',
    'accent' => 'Selbstläufer',
    'text'   => 'Jede Spende hält unsere Aufklärungsarbeit am Laufen – unabhängig, unbestechlich, wirkungsorientiert.',
    'button' => 'Jetzt spenden',
]);
