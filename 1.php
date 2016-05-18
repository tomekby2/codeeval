<?php
/**
 * Zadanie:
 * https://www.codeeval.com/open_challenges/1/
 */

function fizzBuzz($x, $y, $limit) {
    $numbers = array();
    for($i = 1; $i <= $limit; ++$i) {
        $print = '';
        if($i % $x == 0) $print = 'F';
        if($i % $y == 0) $print .= 'B';
        if($print == '') $print = $i;
        
        $numbers[] = $print;
    }
    return $numbers;
}

$fh = fopen($argv[1], "r");
while (true) {
    $test = fgets($fh);
    if($test == '') break;

    $test = explode(' ', $test);
    
    list($x, $y, $limit) = $test;
    fwrite(STDOUT, implode(' ', fizzBuzz($x, $y, $limit)));
    fwrite(STDOUT, "\n");
}
