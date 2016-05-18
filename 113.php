<?php

/**
 * Zadanie:
 * https://www.codeeval.com/open_challenges/113/
 */

function multiplyVectors(array $first, array $second) {
    for($i = 0; $i < count($first); ++$i) {
        $first[$i] = (int)$first[$i] * (int)$second[$i];
    }
    return $first;
}

$fh = fopen($argv[1], "r");
while (true) {
    $test = fgets($fh);
    if($test == '') break;

    $test = explode(' | ', $test);
    
    list($first, $second) = $test;
    $first = explode(' ', $first);
    $second = explode(' ', $second);
    
    fwrite(STDOUT, implode(' ', multiplyVectors($first, $second)));
    fwrite(STDOUT, "\n");
}
