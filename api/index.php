<?php

define('LARAVEL_START', microtime(true));

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$root = dirname(__DIR__);

// Force safe defaults for Vercel serverless
foreach ([
    'SESSION_DRIVER'   => 'cookie',
    'CACHE_STORE'      => 'array',
    'QUEUE_CONNECTION' => 'sync',
    'LOG_CHANNEL'      => 'stderr',
    'DB_CONNECTION'    => 'mysql',
    'APP_ENV'          => 'production',
] as $key => $value) {
    if (!getenv($key)) {
        putenv("$key=$value");
        $_ENV[$key]    = $value;
        $_SERVER[$key] = $value;
    }
}

// On Vercel, only /tmp is writable — create all required dirs
$tmpStorage   = '/tmp/storage';
$tmpBootstrap = '/tmp/bootstrap';

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
    $tmpStorage . '/fonts',
    $tmpBootstrap . '/cache',
] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// Copy bootstrap files to /tmp so Laravel can read AND write there:
// - providers.php  : loaded by RegisterProviders bootstrapper
// - cache/packages.php : read by PackageManifest (avoids regenerating)
// - cache/services.php : read by ProviderRepository (avoids regenerating)
foreach (['providers.php', 'cache/packages.php', 'cache/services.php'] as $file) {
    $src = $root . '/bootstrap/' . $file;
    $dst = $tmpBootstrap . '/' . $file;
    if (file_exists($src) && !file_exists($dst)) {
        copy($src, $dst);
    }
}

if (file_exists($maintenance = $root . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $root . '/vendor/autoload.php';

$app = require_once $root . '/bootstrap/app.php';

$app->useBootstrapPath($tmpBootstrap);
$app->useStoragePath($tmpStorage);

try {
    $app->handleRequest(\Illuminate\Http\Request::capture());
} catch (\Throwable $e) {
    http_response_code(500);
    $style = 'background:#0d0d0d;color:#ff6b6b;padding:20px;font-family:monospace;white-space:pre-wrap;font-size:13px;';
    $chain = '';
    $ex = $e;
    $i  = 0;
    while ($ex) {
        $chain .= "\n\n[Exception $i] " . get_class($ex)
                . "\nMessage : " . htmlspecialchars($ex->getMessage())
                . "\nFile    : " . htmlspecialchars($ex->getFile()) . ':' . $ex->getLine()
                . "\nTrace:\n"  . htmlspecialchars($ex->getTraceAsString());
        $ex = $ex->getPrevious();
        $i++;
    }
    echo '<pre style="' . $style . '"><b>LARAVEL ERROR</b>' . $chain . '</pre>';
}
