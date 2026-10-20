<?php
/**
 * Call to action at the end of a project page: title, text, one dark button.
 * (Donating has its own block: partials/donate-band.php.)
 *
 * @var string $title
 * @var string $text
 * @var string $button  Button label
 * @var string $href    Button target
 */
?>
<section class="cta fade-in" aria-labelledby="cta-title">
    <div class="container cta__inner">
        <h2 class="cta__title" id="cta-title"><?= e($title) ?></h2>
        <p class="cta__text"><?= e($text) ?></p>
        <a href="<?= e($href) ?>" class="btn btn--primary btn--lg">
            <?= e($button) ?> <?= icon('arrow-right') ?>
        </a>
    </div>
</section>
