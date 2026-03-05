<?php

define('LARAVEL_START', microtime(true));

$root = dirname(__DIR__);

// On Vercel, only /tmp is writable — create required storage directories
$tmpStorage = '/tmp/storage';
foreach ([
    $tmpStorage,
    $tmpStorage . '/app',
    $tmpStorage . '/app/public',
    $tmpStorage . '/framework',
    $tmpStorage . '/framework/cache',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/views',
    $tmpStorage . '/logs',
    '/tmp/bootstrap',
    '/tmp/bootstrap/cache',
] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// Maintenance mode check
if (file_exists($maintenance = $root . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $root . '/vendor/autoload.php';

/** @var \Illuminate\Foundation\Application $app */
$app = require_once $root . '/bootstrap/app.php';

// Override storage & bootstrap paths to writable /tmp directories
$app->useStoragePath($tmpStorage);
$app->useBootstrapPath('/tmp/bootstrap');

$app->handleRequest(Illuminate\Http\Request::capture());
