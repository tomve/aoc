<?php

function day02($part = 'one')
{
    $s=microtime(true);
    $file = file_get_contents('input1.txt');

    $lines = explode("\n", $file);
    $i = $pii=0;

    foreach ($lines as $line) {
        $expl = explode(':', $line);

        $characters = trim($expl[1]);

        $numbers_character = explode('-', $expl[0]);
        $max_character = explode(' ', $numbers_character[1]);

        $min = (int) $numbers_character[0];
        $max = (int) $max_character[0];
        $single_character = trim($max_character[1]);

            $count_match = substr_count($characters, $single_character);

            if (($count_match >= $min) && ($count_match <= $max)) {
                $i++;
            }


            if (
                isset($characters[$min - 1]) && ($characters[$min - 1] == $single_character)
                != (isset($characters[$max - 1]) && ($characters[$max - 1] == $single_character))
            ) {
                $pii++;
            }

    }

    $en=microtime(true);
    return ($en-$s );
}



function ddd()
{
    $s=microtime(true);
    $p1 = $p2 = 0;
    foreach (file('input1.txt') as $line) {
        preg_match('#(?<min>\d+)+\-(?<max>\d+) (?<l>\w): (?<p>\w+)#', $line, $m);

        $occurrences = count_chars($m['p'])[ord($m['l'])];
        if ($occurrences >= $m['min'] && $occurrences <= $m['max'])
            $p1++;
        if ($m['p'][$m['min']-1] == $m['l'] ^ $m['p'][$m['max']-1] == $m['l'])
            $p2++;
    }


    $en=microtime(true);
    return ($en-$s);
}
$a=[];
for ($i=1;$i<1000;$i++){
    $a[$i]=[day02(), ddd()];
}

$day=$dd=0;
foreach ($a as $item_run => $item){
    $day += $item[0];
    $dd += $item[1];
}

var_dump($day/99);
var_dump($dd/99);