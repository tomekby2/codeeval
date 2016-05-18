<?php
/**
 * Zadanie:
 * https://www.codeeval.com/open_challenges/196/
 */

function swapDigits(array $words) {
    foreach($words as &$word) {
        $tmp = $word[0];
        $word[0] = substr($word, -1);
        $word[strlen($word) - 1] = $tmp;
    }
    return $words;
}

$fh = fopen($argv[1], "r");
while (true) {
    $test = fgets($fh);
    if($test == '') break;

    // Usuwamy enter w razie potrzeby
    if(!is_numeric(substr($test, -1))) {
        $test = substr($test, 0, -1);
    }
    
    $words = swapDigits(explode(' ', $test));
    
    $str = sprintf("%s\n", implode(' ', $words));
    fwrite(STDOUT, $str);
}
