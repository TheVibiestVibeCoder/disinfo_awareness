<?php
/**
 * Home page (index.php).
 *
 * @var array $projects  app/data/projects.php
 * @var array $team      app/data/team.php
 */

view('partials/hero', [
    'variant' => 'home',
    'eyebrow' => 'Aufklärung & Resilienz',
    'title'   => ['Gemeinsam', 'Gegen', 'Desinformation'],
    'lead'    => 'Stärkung gesellschaftlicher Resilienz durch innovative Aufklärung und positive Gegennarrative.',
]);
?>

<div class="section-label fade-in">
    <h2>Unsere Arbeit</h2>
</div>

<section class="project-grid">
    <?php foreach (array_values($projects) as $i => $project): ?>
        <?php view('partials/project-card', ['project' => $project, 'delay' => $i]) ?>
    <?php endforeach; ?>
</section>

<section class="funding fade-in">
    <div class="funding__bg" style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&amp;w=2072&amp;auto=format&amp;fit=crop');"></div>
    <div class="funding__inner">
        <div class="funding__heading">
            <h2>Funding &amp;<br>Partner</h2>
        </div>
        <div class="funding__body">
            <p class="funding__text">
                Demokratie braucht Rückhalt. Mit Ihrer Spende ermöglichen Sie unabhängige Aufklärung – österreichweit, niedrigschwellig, wirkungsorientiert.
            </p>
            <a href="/spenden.php" class="btn">Jetzt Spenden</a>
        </div>
    </div>
</section>

<section class="team">
    <div class="team__header fade-in">
        <h2 class="team__title">Das Team</h2>
        <p class="team__intro">Expertise in hybriden Bedrohungen, strategischer Kommunikation und Wirtschaftsanalyse. Wir übersetzen komplexe Strukturen in wirksame Aufklärung.</p>
    </div>

    <div class="team__grid">
        <?php foreach ($team as $i => $member): ?>
            <?php view('partials/team-card', ['member' => $member, 'delay' => $i]) ?>
        <?php endforeach; ?>
    </div>
</section>
