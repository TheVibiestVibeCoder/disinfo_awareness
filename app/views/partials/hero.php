<?php
/**
 * Page header of the subpages: label, big title, optional lead.
 * (The home page opens with its own hero, see pages/home.php.)
 *
 * @var string              $eyebrow  Small label above the title
 * @var string|list<string> $title    Title; list items become line breaks
 * @var string|null         $lead     Optional paragraph below the title
 * @var string|null         $variant  'compact' for short pages (contact, legal) — null for the default
 */

$variant ??= null;
$lead    ??= null;
?>
<header class="<?= e(class_names('page-hero', $variant ? "page-hero--{$variant}" : null)) ?>">
    <div class="container">
        <p class="label page-hero__label"><?= e($eyebrow) ?></p>
        <h1 class="page-hero__title"><?= lines($title) ?></h1>
        <?php if ($lead): ?>
            <p class="page-hero__lead"><?= e($lead) ?></p>
        <?php endif; ?>
    </div>
</header>
