<?php
/**
 * General helpers: configuration, content data, escaping, URLs, images, icons.
 */

declare(strict_types=1);

/**
 * Reads a value from app/config.php using dot notation, e.g. config('bank.iban').
 *
 * @throws InvalidArgumentException for unknown keys, so typos fail loudly.
 */
function config(string $key): mixed
{
    static $config = null;
    $config ??= require APP_PATH . '/config.php';

    $value = $config;
    foreach (explode('.', $key) as $segment) {
        if (!is_array($value) || !array_key_exists($segment, $value)) {
            throw new InvalidArgumentException("Unknown config key: {$key}");
        }
        $value = $value[$segment];
    }

    return $value;
}

/**
 * Loads a content file from app/data/, e.g. data('team').
 */
function data(string $name): array
{
    static $cache = [];

    return $cache[$name] ??= require APP_PATH . "/data/{$name}.php";
}

/**
 * The event from app/data/event.php while it is still ahead (including its day),
 * null afterwards — so the announcement disappears without anyone editing the site.
 */
function upcoming_event(): ?array
{
    $event = data('event');

    return date('Y-m-d') <= $event['date'] ? $event : null;
}

/**
 * Escapes a value for safe output in HTML text and attributes.
 */
function e(string|int|float|null $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Escapes each line and joins them with <br> — for headlines that break
 * at fixed points, e.g. ['NGO-', 'Business'].
 *
 * @param string|list<string> $lines
 */
function lines(string|array $lines): string
{
    return implode('<br>', array_map('e', (array) $lines));
}

/**
 * Escapes a headline and colours one of its words in the accent colour —
 * the signature of the design: one orange word per headline.
 * accent('Das Team', 'Team') → 'Das <span class="accent">Team</span>'
 */
function accent(string $text, ?string $word = null): string
{
    $html = e($text);
    if ($word === null || $word === '') {
        return $html;
    }

    $needle = e($word);
    $pos = mb_strpos($html, $needle);
    if ($pos === false) {
        return $html;
    }

    return mb_substr($html, 0, $pos)
        . '<span class="accent">' . $needle . '</span>'
        . mb_substr($html, $pos + mb_strlen($needle));
}

/**
 * Absolute URL on the canonical domain (for canonical tags, Open Graph, sitemap).
 * Links between pages use plain root-relative paths instead.
 */
function absolute_url(string $path = '/'): string
{
    return config('site.url') . $path;
}

/**
 * Public URL of a file in /assets, with a cache-busting version parameter
 * so browsers fetch the new file as soon as it changes.
 */
function asset(string $path): string
{
    $path = ltrim($path, '/');
    $file = ROOT_PATH . '/assets/' . $path;

    return '/assets/' . $path . (is_file($file) ? '?v=' . filemtime($file) : '');
}

/**
 * All generated widths of a photo in assets/img/, smallest first.
 * A photo 'team/laura-pattiss' consists of files like team/laura-pattiss-480.webp,
 * named after their real pixel width.
 *
 * @return array<int, string>  width => path relative to assets/
 */
function image_variants(string $name): array
{
    static $cache = [];
    if (isset($cache[$name])) {
        return $cache[$name];
    }

    $variants = [];
    foreach (glob(ROOT_PATH . "/assets/img/{$name}-*.webp") ?: [] as $file) {
        if (preg_match('/-(\d+)\.webp$/', $file, $match)) {
            $variants[(int) $match[1]] = 'img/' . $name . '-' . $match[1] . '.webp';
        }
    }
    if ($variants === []) {
        throw new InvalidArgumentException("Image not found: assets/img/{$name}-<width>.webp");
    }
    ksort($variants);

    return $cache[$name] = $variants;
}

/**
 * URL of the smallest variant of a photo that is at least $width pixels wide
 * (or the largest there is) — for CSS backgrounds, which have no srcset.
 */
function image_url(string $name, int $width): string
{
    $variants = image_variants($name);
    foreach ($variants as $variantWidth => $path) {
        if ($variantWidth >= $width) {
            return asset($path);
        }
    }

    return asset(end($variants));
}

/**
 * Responsive <img> for a photo in assets/img/: srcset from every generated width,
 * width/height from the largest file so the browser reserves the space early.
 *
 * @param string                     $sizes       the sizes attribute, e.g. '(min-width: 900px) 50vw, 100vw'
 * @param array<string, string|null> $attributes  extra attributes; 'loading' defaults to lazy
 */
function image(string $name, string $alt, string $sizes, array $attributes = []): string
{
    $variants = image_variants($name);
    $largest  = end($variants);
    [$width, $height] = getimagesize(ROOT_PATH . '/assets/' . $largest) ?: [0, 0];

    $srcset = [];
    foreach ($variants as $variantWidth => $path) {
        $srcset[] = asset($path) . " {$variantWidth}w";
    }

    $attributes = [
        'src'      => asset($largest),
        'srcset'   => implode(', ', $srcset),
        'sizes'    => $sizes,
        'alt'      => $alt,
        'width'    => (string) $width,
        'height'   => (string) $height,
        'loading'  => 'lazy',
        'decoding' => 'async',
    ] + $attributes;

    $html = '<img';
    foreach ($attributes as $key => $value) {
        if ($value !== null) {
            $html .= ' ' . $key . '="' . e($value) . '"';
        }
    }

    return $html . '>';
}

/**
 * Inline SVG icon (24×24 grid, drawn with the current text colour).
 * Purely decorative: the surrounding element carries the accessible name.
 */
function icon(string $name, string $class = 'icon'): string
{
    $paths = [
        'arrow-up-right' => '<path d="M7 17 17 7M8 7h9v9"/>',
        'arrow-right'    => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'chevron-down'   => '<path d="m6 9 6 6 6-6"/>',
        'menu'           => '<path d="M4 8h16M4 16h16"/>',
        'close'          => '<path d="M6 6l12 12M18 6 6 18"/>',
        'copy'           => '<rect x="9" y="9" width="11" height="11" rx="2"/><path d="M5 15V5a2 2 0 0 1 2-2h8"/>',
        'check'          => '<path d="m5 12 5 5 9-10"/>',
    ];
    if (!isset($paths[$name])) {
        throw new InvalidArgumentException("Unknown icon: {$name}");
    }

    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"'
        . ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'
        . $paths[$name] . '</svg>';
}

/**
 * Joins CSS class names, skipping empty ones: class_names('a', null, 'b') → 'a b'.
 */
function class_names(string|false|null ...$classes): string
{
    return implode(' ', array_filter($classes));
}

/**
 * Scroll-reveal classes with an optional stagger step (0–4), e.g. inside loops.
 */
function fade_in(int $delay = 0): string
{
    $delay = min($delay, 4);

    return class_names('fade-in', $delay > 0 ? "delay-{$delay}" : null);
}

/**
 * Whether the current request came in over HTTPS.
 */
function is_https(): bool
{
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (int) ($_SERVER['SERVER_PORT'] ?? 0) === 443;
}
