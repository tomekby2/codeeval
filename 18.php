<?php
/**
 * Zadanie:
 * https://www.codeeval.com/open_challenges/18/
 */
 
$fh = fopen($argv[1], "r");
while (true) {
    $test = fgets($fh);
    if($test == '') break;

    list($limit, $num) = explode(',', $test);
    $multiply = (int)$num;
    while($multiply < (int)$limit) $multiply += $num;

    fwrite(STDOUT, sprintf("%d\n", $multiply));
}
