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

<a href="#main-content" class="skip-link">Zum Inhalt springen</a>

<?php view('layout/nav', ['path' => $page['path']]) ?>

<main id="main-content" tabindex="-1">
<?= $content ?>
</main>

<?php view('layout/footer') ?>

<script type="module" src="<?= e(asset('js/main.js')) ?>"></script>
</body>
</html>
