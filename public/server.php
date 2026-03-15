<?php

/**
 * Laravel Development Server Router
 * Handles routing for the PHP built-in development server
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// If the requested resource is a file or directory (and not /), return it
if ($uri !== '/' && file_exists(__DIR__ . $uri) && is_file(__DIR__ . $uri)) {
    return false;
}

// Otherwise, route everything through index.php
require __DIR__ . '/index.php';
