<?php

function flattenKeys(array $array, string $prefix = ''): array {
    $keys = [];
    foreach ($array as $k => $v) {
        if (is_array($v)) {
            $keys = array_merge($keys, flattenKeys($v, $prefix.$k.'.'));
        } else {
            $keys[] = $prefix.$k;
        }
    }
    return $keys;
}

$en = include __DIR__ . '/lang/en/messages.php';
$id = include __DIR__ . '/lang/id/messages.php';

$enFlat = flattenKeys($en);
$idFlat = flattenKeys($id);

$missInEn = array_diff($idFlat, $enFlat);
$missInId = array_diff($enFlat, $idFlat);

echo 'EN total keys: ' . count($enFlat) . PHP_EOL;
echo 'ID total keys: ' . count($idFlat) . PHP_EOL;
echo PHP_EOL;
echo 'Missing in EN (' . count($missInEn) . '):' . PHP_EOL;
foreach ($missInEn as $k) echo "  - $k\n";
echo PHP_EOL;
echo 'Missing in ID (' . count($missInId) . '):' . PHP_EOL;
foreach ($missInId as $k) echo "  - $k\n";
