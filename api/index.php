<?php

// On Vercel, only /tmp is writable. Redirect Laravel storage to /tmp.
$tmpStorage = '/tmp/storage';
$dirs = [
    $tmpStorage,
    $tmpStorage . '/app',
    $tmpStorage . '/app/public',
    $tmpStorage . '/framework',
    $tmpStorage . '/framework/cache',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/views',
    $tmpStorage . '/logs',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// Also make bootstrap/cache writable via /tmp
$tmpBootstrap = '/tmp/bootstrap/cache';
if (!is_dir($tmpBootstrap)) {
    mkdir($tmpBootstrap, 0775, true);
}

// Set document root for Laravel
$_SERVER['DOCUMENT_ROOT'] = __DIR__ . '/../public';

// Bootstrap and run Laravel
require __DIR__ . '/../public/index.php';
