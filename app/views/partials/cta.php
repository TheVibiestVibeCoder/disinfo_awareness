<?php
/**
 * Full-width call-to-action band with one button.
 *
 * @var string      $title
 * @var string      $text
 * @var string      $button   Button label
 * @var string      $href     Button target
 * @var string|null $variant  e.g. 'donate' — null for the default
 */

$variant ??= null;
?>
<section class="<?= e(class_names('cta', $variant ? "cta--{$variant}" : null, 'fade-in')) ?>">
    <h2 class="cta__title"><?= e($title) ?></h2>
    <p class="cta__text"><?= e($text) ?></p>
    <a href="<?= e($href) ?>" class="btn"><?= e($button) ?></a>
</section>
