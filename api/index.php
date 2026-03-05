<?php

// Set the document root to the public directory so Laravel resolves paths correctly
$_SERVER['DOCUMENT_ROOT'] = __DIR__ . '/../public';

// Bootstrap Laravel and handle the request
require __DIR__ . '/../public/index.php';
