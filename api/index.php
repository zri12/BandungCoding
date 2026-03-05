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
    $tmpStorage . '/fonts',
] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

if (file_exists($maintenance = $root . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Redirect bootstrap/cache to /tmp so it is writable on Vercel
$tmpBootstrap = '/tmp/bootstrap';
if (!is_dir($tmpBootstrap . '/cache')) {
    mkdir($tmpBootstrap . '/cache', 0775, true);
}
// Pre-seed cache files from the committed copies so PackageManifest doesn't try to regenerate
foreach (['packages.php', 'services.php'] as $cacheFile) {
    $src = $root . '/bootstrap/cache/' . $cacheFile;
    $dst = $tmpBootstrap . '/cache/' . $cacheFile;
    if (file_exists($src) && !file_exists($dst)) {
        copy($src, $dst);
    }
}

require $root . '/vendor/autoload.php';

/** @var \Illuminate\Foundation\Application $app */
$app = require_once $root . '/bootstrap/app.php';

// IMPORTANT: useBootstrapPath must be called AFTER configure() in bootstrap/app.php
// so RegisterProviders::$bootstrapProviderPath (set during withProviders()) still points
// to the correct /var/task/user/bootstrap/providers.php — only the cache dir changes.
$app->useBootstrapPath($tmpBootstrap);
$app->useStoragePath($tmpStorage);

// ── Step-by-step bootstrap to show EXACTLY which step fails ─────────────────
$bootstrappers = [
    \Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables::class,
    \Illuminate\Foundation\Bootstrap\LoadConfiguration::class,
    \Illuminate\Foundation\Bootstrap\HandleExceptions::class,
    \Illuminate\Foundation\Bootstrap\RegisterFacades::class,
    \Illuminate\Foundation\Bootstrap\RegisterProviders::class,
    \Illuminate\Foundation\Bootstrap\BootProviders::class,
];

$style = 'background:#0d0d0d;color:#ff6b6b;padding:20px;font-family:monospace;white-space:pre-wrap;font-size:13px;';

foreach ($bootstrappers as $step) {
    try {
        $app->make($step)->bootstrap($app);
    } catch (\Throwable $e) {
        http_response_code(500);
        $chain = '';
        $ex = $e;
        $i  = 0;
        while ($ex) {
            $chain .= "\n\n[Exception $i] " . get_class($ex) . "\n"
                    . 'Message : ' . htmlspecialchars($ex->getMessage()) . "\n"
                    . 'File    : ' . htmlspecialchars($ex->getFile()) . ':' . $ex->getLine() . "\n"
                    . "Trace:\n" . htmlspecialchars($ex->getTraceAsString());
            $ex = $ex->getPrevious();
            $i++;
        }
        echo '<pre style="' . $style . '"><b>BOOTSTRAP FAILED AT:</b> '
            . htmlspecialchars(basename(str_replace('\\', '/', $step)))
            . $chain . '</pre>';
        exit;
    }
}

// Mark app as bootstrapped so the kernel doesn't re-run bootstrappers
(function () { $this->hasBeenBootstrapped = true; })->call($app);

// ── Dispatch request ─────────────────────────────────────────────────────────
try {
    $kernel  = $app->make(\Illuminate\Contracts\Http\Kernel::class);
    $request = \Illuminate\Http\Request::capture();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    http_response_code(500);
    $chain = '';
    $ex = $e;
    $i  = 0;
    while ($ex) {
        $chain .= "\n\n[Exception $i] " . get_class($ex) . "\n"
                . 'Message : ' . htmlspecialchars($ex->getMessage()) . "\n"
                . 'File    : ' . htmlspecialchars($ex->getFile()) . ':' . $ex->getLine() . "\n"
                . "Trace:\n" . htmlspecialchars($ex->getTraceAsString());
        $ex = $ex->getPrevious();
        $i++;
    }
    echo '<pre style="' . $style . '"><b>REQUEST FAILED</b>' . $chain . '</pre>';
}
