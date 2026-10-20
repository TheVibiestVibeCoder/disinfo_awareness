<?php
/**
 * Session start and CSRF tokens for forms.
 */

declare(strict_types=1);

/**
 * Starts the session with hardened cookie settings (idempotent).
 */
function session_start_secure(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    ini_set('session.use_strict_mode', '1');
    session_set_cookie_params([
        'httponly' => true,
        'secure'   => is_https(),  // off only for local http development
        'samesite' => 'Strict',
    ]);
    session_start();
}

/**
 * The current session's CSRF token, created on first use.
 */
function csrf_token(): string
{
    return $_SESSION['csrf_token'] ??= bin2hex(random_bytes(32));
}

/**
 * Replaces the token, e.g. after it has been used once.
 */
function csrf_rotate(): void
{
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

/**
 * Timing-safe check of a submitted token against the session token.
 */
function csrf_valid(mixed $token): bool
{
    return is_string($token)
        && $token !== ''
        && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}
