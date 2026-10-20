<?php
/**
 * Template rendering.
 *
 *   view('partials/hero', [...])          renders app/views/partials/hero.php
 *   render_page('kontakt', $meta, [...])  renders a complete page in the base layout
 */

declare(strict_types=1);

/**
 * Renders a template from app/views/. The keys of $data become variables
 * inside the template; nothing else from the caller leaks in.
 */
function view(string $template, array $data = []): void
{
    $file = APP_PATH . "/views/{$template}.php";
    if (!is_file($file)) {
        throw new InvalidArgumentException("View not found: {$template}");
    }

    (static function (string $__file, array $__data): void {
        extract($__data, EXTR_SKIP);
        require $__file;
    })($file, $data);
}

/**
 * Renders a full HTML page: app/views/pages/{$view}.php inside the base layout.
 *
 * @param string $view  Page template name; also the default page stylesheet
 *                      (assets/css/pages/{$view}.css).
 * @param array  $page  Page meta, see page_meta() for the keys.
 * @param array  $data  Variables for the page template.
 */
function render_page(string $view, array $page, array $data = []): void
{
    $page['stylesheet'] ??= $view;

    ob_start();
    view("pages/{$view}", $data);
    $content = ob_get_clean();

    view('layout/base', ['page' => page_meta($page), 'content' => $content]);
}

/**
 * Renders one of the four project pages from app/data/projects.php.
 */
function render_project_page(string $slug): void
{
    $project = data('projects')[$slug] ?? throw new InvalidArgumentException("Unknown project: {$slug}");

    render_page('project', $project['meta'] + [
        'path'    => $project['path'],
        'og_type' => 'article',
    ], ['project' => $project]);
}
