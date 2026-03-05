<?php
$en = include __DIR__ . '/lang/en/messages.php';
$id = include __DIR__ . '/lang/id/messages.php';

// Compare values to check they're actually different
$identical = [];
function compareValues(array $en, array $id, string $prefix = '') {
    $same = [];
    foreach ($en as $k => $v) {
        if (!isset($id[$k])) continue;
        if (is_array($v)) {
            $same = array_merge($same, compareValues($v, $id[$k], $prefix.$k.'.'));
        } else {
            if ($v === $id[$k]) {
                $same[] = $prefix.$k . ': "' . $v . '"';
            }
        }
    }
    return $same;
}

$sameValues = compareValues($en, $id);
$total = count($sameValues);
echo "Keys with identical EN/ID values ($total):\n";
foreach ($sameValues as $item) {
    echo "  $item\n";
}

// Also show a sample of actual differences
echo "\nSample of actual translations (EN vs ID):\n";
$samples = ['navbar.home', 'navbar.services', 'home.hero_badge', 'home.hero_title', 'services.hero_title'];
foreach ($samples as $key) {
    $parts = explode('.', $key);
    $enVal = $en;
    $idVal = $id;
    foreach ($parts as $p) {
        $enVal = $enVal[$p] ?? null;
        $idVal = $idVal[$p] ?? null;
    }
    echo "  $key:\n    EN: $enVal\n    ID: $idVal\n";
}
