<?php
/**
 * Donation teaser: white text and the orange donate button on a blurred photo.
 * Used at the end of the home page and of every project page.
 *
 * @var string      $label
 * @var string      $title
 * @var string|null $accent  Word of the title in the accent colour
 * @var string      $text
 * @var string      $button  Button label
 */

$accent ??= null;
?>
<section class="donate-band" aria-labelledby="donate-band-title">
    <div class="container">
        <div class="donate-band__inner fade-in" style="--photo: url('<?= e(asset('img/hintergrund/blur-gruppe.webp')) ?>')">
            <p class="label label--on-dark"><?= e($label) ?></p>
            <h2 class="donate-band__title" id="donate-band-title"><?= accent($title, $accent) ?></h2>
            <p class="donate-band__text"><?= e($text) ?></p>
            <a href="/spenden.php" class="btn btn--donate btn--lg"><?= e($button) ?></a>
        </div>
    </div>
</section>
