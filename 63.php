<?php
/**
 * Zadanie:
 * https://www.codeeval.com/open_challenges/63/
 */

function isPrime($number) {
    $number = (int)$number;
    if($number <= 1) return false;
    if($number <= 3) return true;
    if($number % 2 == 0 or $number % 3 == 0) return false;
    
    for($i = 5; $i * $i <= $number;) {
        if($number % $i == 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}

function countPrimes($from, $to) {
    $count = 0;
    for($i = (int)$from; $i <= (int)$to; ++$i) {
        $count += isPrime($i);
    }
    return $count;
}

$fh = fopen($argv[1], "r");
while (true) {
    $test = fgets($fh);
    if($test == '') break;

    list($from, $to) = explode(',', $test);
    
    $str = sprintf("%d\n", countPrimes($from, $to));
    fwrite(STDOUT, $str);
}
