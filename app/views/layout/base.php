<?php
/**
 * The HTML frame around every page.
 *
 * @var array  $page     Page meta (see page_meta()).
 * @var string $content  Rendered page template.
 */
?>
<!DOCTYPE html>
<html lang="<?= e(config('site.lang')) ?>">
<head>
<?php view('layout/head', ['page' => $page]) ?>
</head>
<body>

<?php view('layout/nav') ?>

<main id="main-content">
<?= $content ?>
</main>

<?php view('layout/footer') ?>

<script type="module" src="<?= e(asset('js/hero-canvas.js')) ?>"></script>
<script type="module" src="<?= e(asset('js/main.js')) ?>"></script>
</body>
</html>
