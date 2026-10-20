<?php
/**
 * General helpers: configuration, content data, escaping, URLs, CSS classes.
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
