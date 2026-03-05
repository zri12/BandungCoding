<?php
// Diagnostic endpoint — visit /phptest to check the runtime
header('Content-Type: text/plain; charset=utf-8');

$root = dirname(__DIR__);

echo "=== PHP RUNTIME CHECK ===\n\n";
echo "PHP Version : " . phpversion() . "\n";
echo "SAPI        : " . php_sapi_name() . "\n";
echo "File        : " . __FILE__ . "\n";
echo "Project root: " . $root . "\n\n";

echo "=== CRITICAL FILES ===\n";
$files = [
    'vendor/autoload.php',
    'bootstrap/app.php',
    'bootstrap/providers.php',
    '.env',
];
foreach ($files as $f) {
    $path = $root . '/' . $f;
    echo $f . ': ' . (file_exists($path) ? 'EXISTS (' . filesize($path) . ' bytes)' : 'MISSING') . "\n";
}

echo "\n=== ENVIRONMENT VARIABLES ===\n";
$vars = ['APP_KEY', 'APP_ENV', 'APP_DEBUG', 'APP_URL', 'SESSION_DRIVER', 'CACHE_STORE', 'DB_HOST', 'DB_DATABASE'];
foreach ($vars as $v) {
    $val = getenv($v);
    if ($v === 'APP_KEY' && $val) {
        echo $v . ': SET (' . strlen($val) . ' chars)' . "\n";
    } else {
        echo $v . ': ' . ($val !== false ? $val : 'NOT SET') . "\n";
    }
}

echo "\n=== FILESYSTEM ===\n";
echo "/tmp writable : " . (is_writable('/tmp') ? 'YES' : 'NO') . "\n";
echo "/tmp/storage  : " . (is_dir('/tmp/storage') ? 'exists' : 'not yet') . "\n";

echo "\n=== LOADED EXTENSIONS ===\n";
$needed = ['pdo', 'pdo_mysql', 'mbstring', 'openssl', 'tokenizer', 'xml', 'ctype', 'json', 'bcmath', 'fileinfo'];
foreach ($needed as $ext) {
    echo $ext . ': ' . (extension_loaded($ext) ? 'OK' : 'MISSING') . "\n";
}
