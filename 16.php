<?php
/**
 * Zadanie:
 * https://www.codeeval.com/open_challenges/16/
 */

function countOnes($number) {
    $number = (int)$number;

    $count = 0;
    while($number != 0) {
        $count += $number & 1;
        $number >>= 1;
    }
    return $count;
}

$fh = fopen($argv[1], "r");
while (true) {
    $test = fgets($fh);
    if($test == '') break;

    $str = sprintf("%d\n", countOnes($test));
    fwrite(STDOUT, $str);
}
