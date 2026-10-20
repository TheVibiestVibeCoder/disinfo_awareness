<?php
/**
 * Application bootstrap — the first thing every public page requires.
 * Defines the base paths and loads all helper functions.
 */

declare(strict_types=1);

define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', __DIR__);

require APP_PATH . '/lib/helpers.php';
require APP_PATH . '/lib/view.php';
require APP_PATH . '/lib/seo.php';
require APP_PATH . '/lib/csrf.php';
require APP_PATH . '/lib/contact-form.php';
