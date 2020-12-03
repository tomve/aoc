<?php

$file = file_get_contents('input1.txt');
$lines = explode("\n", $file);
var_dump($lines);
function trees($stepsToRight = 3, $stepsToDown = 1)
{
    global $lines;

    $trees = $right = $down = 0;

    while ($down < count($lines)) {
        if ($lines[$down][$right] == '#') {
            $trees++;
        }

        /*
         * strlen with -1 because of hardcoded space on the end
         *
         * trim() doesn't work
         *
         * see example #1 - https://www.php.net/manual/en/function.strlen.php
        */

        $right = ($right + $stepsToRight) % (strlen($lines[0]) - 1);
        $down += $stepsToDown;
    }

    return $trees;
}

var_dump('part 1: ' . trees());

var_dump('part 2: ' . trees() * trees(1,1) * trees(5, 1)
    * trees(7, 1) * trees(1, 2));

