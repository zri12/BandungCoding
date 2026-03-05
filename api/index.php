<?php

define('LARAVEL_START', microtime(true));

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$root = dirname(__DIR__);

// ── Writable /tmp paths ───────────────────────────────────────────────────────
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
    $tmpStorage . '/fonts',
    $tmpBootstrapCache,
] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// ── Copy committed cache files to /tmp ───────────────────────────────────────
// PackageManifest and ProviderRepository need a WRITABLE path to (re)write
// cache files. We seed /tmp from our committed copies so they don't need to
// regenerate from scratch.
foreach (['packages.php', 'services.php'] as $f) {
    $src = $root . '/bootstrap/cache/' . $f;
    $dst = $tmpBootstrapCache . '/' . $f;
    if (file_exists($src) && !file_exists($dst)) {
        copy($src, $dst);
    }
}

// ── CRITICAL: set cache env vars BEFORE require bootstrap/app.php ────────────
// Application::configure() calls new Application() in its constructor which
// immediately calls registerBaseBindings() → PackageManifest is created with
// getCachedPackagesPath(). That method reads APP_PACKAGES_CACHE first.
// If we set these env vars here (before the require), the Application picks up
// the /tmp paths and never tries to write to the read-only project path.
foreach ([
    'APP_PACKAGES_CACHE' => $tmpBootstrapCache . '/packages.php',
    'APP_SERVICES_CACHE' => $tmpBootstrapCache . '/services.php',
    // Fallback APP_KEY so encryption doesn't fail if not set in Vercel dashboard
    'APP_KEY'            => 'base64:tbZ/H9PKJNOCA/m1aKdYCu/1Hhynp1I2x76BDaA1snE=',
    'APP_ENV'            => 'production',
    // Temporarily true so Laravel renders the full error in the browser
    'APP_DEBUG'          => 'true',
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

// Application constructor → registerBaseBindings() → PackageManifest gets
// getCachedPackagesPath() which NOW reads APP_PACKAGES_CACHE → /tmp ✓
$app = require_once $root . '/bootstrap/app.php';

$app->useStoragePath($tmpStorage);
// No useBootstrapPath() — providers.php is read from original (read-only is fine)

// ── Handle request ────────────────────────────────────────────────────────────
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
                . "\nTrace:\n"   . htmlspecialchars($ex->getTraceAsString());
        $ex = $ex->getPrevious();
        $i++;
    }
    echo '<pre style="' . $style . '"><b>LARAVEL ERROR</b>' . $chain . '</pre>';
}
