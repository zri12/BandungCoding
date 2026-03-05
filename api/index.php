<?php

define('LARAVEL_START', microtime(true));

// Show errors so Vercel logs capture them
ini_set('display_errors', '1');
error_reporting(E_ALL);

$root = dirname(__DIR__);

// Force safe defaults for Vercel serverless (in case env vars not set)
foreach ([
    'SESSION_DRIVER'   => 'cookie',
    'CACHE_STORE'      => 'array',
    'QUEUE_CONNECTION' => 'sync',
    'LOG_CHANNEL'      => 'stderr',
    'DB_CONNECTION'    => 'mysql',
] as $key => $value) {
    if (!getenv($key)) {
        putenv("$key=$value");
        $_ENV[$key] = $value;
    }
}

// On Vercel, only /tmp is writable
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

$app->useStoragePath($tmpStorage);

$app->handleRequest(Illuminate\Http\Request::capture());
