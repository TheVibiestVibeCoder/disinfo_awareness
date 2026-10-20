<?php
/**
 * Project page template — schulprojekte, ngobusiness, gemeinde, diaspora.
 * Content comes from app/data/projects.php.
 *
 * @var array $project
 */

view('partials/hero', [
    'variant' => 'project',
    'eyebrow' => 'Unsere Arbeit',
    'title'   => $project['title'],
    'lead'    => $project['lead'],
]);
?>

<?php foreach ($project['sections'] as $i => $section): ?>
    <?php $reverse = $i % 2 === 1; // every second section is mirrored on desktop ?>
    <section class="<?= e(class_names('split', 'feature', $reverse ? 'feature--reverse' : null)) ?>">
        <div class="feature__panel feature__panel--text fade-in">
            <div class="feature__content">
                <h3 class="feature__title"><?= e($section['title']) ?></h3>
                <?php foreach ($section['text'] as $paragraph): ?>
                    <p class="feature__text"><?= $paragraph /* trusted HTML from app/data */ ?></p>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="feature__panel <?= fade_in($reverse ? 0 : 1) ?>" data-inview>
            <div class="feature__bg" style="background-image: url('<?= e($section['image']) ?>');"></div>
            <div class="feature__content">
                <h3 class="feature__title"><?= lines($section['image_title']) ?></h3>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<?php
view('partials/cta', $project['cta'] + ['href' => '/kontakt.php']);

view('partials/cta', [
    'variant' => 'donate',
    'title'   => 'Jetzt Spenden',
    'text'    => 'Demokratie ist kein Selbstläufer. Jede Spende hält unsere Aufklärungsarbeit am Laufen – unabhängig, unbestechlich, wirkungsorientiert.',
    'button'  => 'Jetzt spenden',
    'href'    => '/spenden.php',
]);
