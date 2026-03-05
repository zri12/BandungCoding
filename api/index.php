<?php

define('LARAVEL_START', microtime(true));

$root = dirname(__DIR__);

// ── Writable /tmp paths ──────────────────────────────────────────────────────
$tmpStorage        = '/tmp/storage';
$tmpBootstrapCache = '/tmp/bootstrap/cache';

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
    $tmpBootstrapCache,
] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// ── Copy committed cache files to /tmp (only once per cold start) ────────────
foreach (['packages.php', 'services.php', 'routes-v7.php'] as $f) {
    $src = $root . '/bootstrap/cache/' . $f;
    $dst = $tmpBootstrapCache . '/' . $f;
    if (file_exists($src) && !file_exists($dst)) {
        copy($src, $dst);
    }
}

// ── CRITICAL: set cache env vars BEFORE require bootstrap/app.php ────────────
$scheme = (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) ? $_SERVER['HTTP_X_FORWARDED_PROTO'] : 'https');
$host   = (!empty($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST']
           : (!empty($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'bandung-coding.vercel.app'));
$appUrl = $scheme . '://' . $host;

foreach ([
    'APP_PACKAGES_CACHE' => $tmpBootstrapCache . '/packages.php',
    'APP_SERVICES_CACHE' => $tmpBootstrapCache . '/services.php',
    'APP_ROUTES_CACHE'   => $tmpBootstrapCache . '/routes-v7.php',
    'APP_KEY'            => 'base64:tbZ/H9PKJNOCA/m1aKdYCu/1Hhynp1I2x76BDaA1snE=',
    'APP_URL'            => $appUrl,
    'ASSET_URL'          => $appUrl,
    'APP_ENV'            => 'production',
    'APP_DEBUG'          => 'false',
    'SESSION_DRIVER'     => 'cookie',
    'CACHE_STORE'        => 'array',
    'QUEUE_CONNECTION'   => 'sync',
    'LOG_CHANNEL'        => 'stderr',
    'DB_CONNECTION'      => 'mysql',
] as $key => $value) {
    if (!getenv($key)) {
        putenv("$key=$value");
        $_ENV[$key]    = $value;
        $_SERVER[$key] = $value;
    }
}

// ── Maintenance mode ──────────────────────────────────────────────────────────
if (file_exists($maintenance = $root . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $root . '/vendor/autoload.php';

$app = require_once $root . '/bootstrap/app.php';

$app->useStoragePath($tmpStorage);

// ── Handle request ────────────────────────────────────────────────────────────
$app->handleRequest(\Illuminate\Http\Request::capture());

