<?php
/**
 * Zadanie:
 * https://www.codeeval.com/open_challenges/16/
 */

function count_ones($number) {
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

	$str = sprintf("%d\n", count_ones($test));
	fwrite(STDOUT, $str);
}
