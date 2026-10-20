<?php
/**
 * Home page (index.php), top to bottom:
 *   1. Hero: our main project (the 'featured' one) + the donate button
 *   2. Its five chapters as a strip, each linking into the project page
 *   3. The other projects as cards
 *   4. The upcoming event (only while there is one)
 *   5. Team
 *   6. Donation teaser
 *
 * @var array      $projects  app/data/projects.php
 * @var array      $team      app/data/team.php
 * @var array|null $event     upcoming_event()
 */

$featured = current(array_filter($projects, static fn (array $project): bool => !empty($project['featured'])));
$others   = array_values(array_filter($projects, static fn (array $project): bool => empty($project['featured'])));

// Photos inside the letters of the hero title, one per line (slide index, focus point).
$titlePhotos = [[0, 'center 58%'], [1, 'center 82%']];
?>

<section class="home-hero" aria-labelledby="home-hero-title">
    <div class="home-hero__intro container">
        <p class="label">Unser Hauptprojekt</p>
        <div class="home-hero__stage">
            <h1 class="home-hero__title" id="home-hero-title">
                <a href="<?= e($featured['path']) ?>" class="home-hero__link">
                    <?php foreach ($featured['title'] as $i => $line): ?>
                        <?php [$slide, $focus] = $titlePhotos[$i % count($titlePhotos)]; ?>
                        <?php $photo = $featured['slides'][$slide]['image']; ?>
                        <span class="<?= e(class_names('home-hero__line', str_ends_with($line, '-') ? 'home-hero__line--hyphen' : null)) ?>" style="--photo: url('<?= e(image_url($photo, 1600)) ?>'); --photo-small: url('<?= e(image_url($photo, 800)) ?>'); --photo-focus: <?= e($focus) ?>"><?= e($line) ?></span>
                    <?php endforeach; ?>
                </a>
            </h1>
        </div>
        <p class="home-hero__lead"><?= e($featured['card']['text']) ?></p>
        <div class="button-row home-hero__actions">
            <a href="/spenden.php" class="btn btn--donate btn--lg">Jetzt spenden</a>
            <a href="<?= e($featured['path']) ?>" class="btn btn--outline btn--lg">Projekt ansehen</a>
        </div>
    </div>

    <nav class="chapters container" aria-label="<?= e($featured['name']) ?> in fünf Schritten">
        <ol class="chapters__list" role="list">
            <?php foreach ($featured['slides'] as $i => $slide): ?>
                <li class="chapter">
                    <a href="<?= e($featured['path']) ?>#kapitel-<?= $i + 1 ?>" class="chapter__link">
                        <?= image($slide['thumb'], '', '3.25rem', ['class' => 'chapter__thumb']) ?>
                        <span class="chapter__text">
                            <span class="chapter__label"><?= e($slide['label']) ?></span>
                            <span class="chapter__title"><?= e($slide['title']) ?></span>
                        </span>
                        <span class="icon-btn icon-btn--sm chapter__arrow"><?= icon('arrow-up-right') ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
</section>

<section class="section projects" id="projekte" aria-labelledby="projekte-title">
    <div class="container">
        <header class="section-head fade-in">
            <p class="label">Unsere Arbeit</p>
            <h2 class="section-head__title" id="projekte-title"><?= accent('Weitere Projekte', 'Projekte') ?></h2>
        </header>
        <div class="projects__list">
            <?php foreach ($others as $i => $project): ?>
                <?php view('partials/project-card', ['project' => $project, 'delay' => $i]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if ($event): ?>
    <section class="event-section" id="veranstaltung" aria-labelledby="event-title">
        <div class="container">
            <article class="event fade-in">
                <div class="event__date" aria-hidden="true">
                    <p class="event__day"><?= e($event['day']) ?></p>
                    <p class="event__time"><?= e($event['time']) ?></p>
                </div>
                <div class="event__body">
                    <p class="label label--on-dark"><?= e($event['label']) ?></p>
                    <h2 class="event__title" id="event-title"><?= accent($event['title'], $event['accent']) ?></h2>
                    <p class="event__text"><?= e($event['text']) ?></p>
                    <a href="/kontakt.php?betreff=veranstaltung" class="btn btn--light btn--lg">
                        <?= e($event['button']) ?> <?= icon('arrow-right') ?>
                    </a>
                </div>
            </article>
        </div>
    </section>
<?php endif; ?>

<section class="section section--flush-top team" id="team" aria-labelledby="team-title">
    <div class="container">
        <header class="section-head section-head--split fade-in">
            <div>
                <p class="label">Über uns</p>
                <h2 class="section-head__title" id="team-title"><?= accent('Das Team', 'Team') ?></h2>
            </div>
            <p class="section-head__intro">Expertise in hybriden Bedrohungen, strategischer Kommunikation und Wirtschaftsanalyse. Wir übersetzen komplexe Strukturen in wirksame Aufklärung.</p>
        </header>

        <ul class="team-gallery" role="list" data-team-gallery>
            <?php foreach ($team as $i => $member): ?>
                <?php view('partials/team-card', ['member' => $member, 'active' => $i === 0]) ?>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php
view('partials/donate-band', [
    'label'  => 'Funding & Partner',
    'title'  => 'Demokratie braucht Rückhalt.',
    'accent' => 'Rückhalt',
    'text'   => 'Mit Ihrer Spende ermöglichen Sie unabhängige Aufklärung – österreichweit, niedrigschwellig, wirkungsorientiert.',
    'button' => 'Jetzt spenden',
]);
