<?php

$file = file_get_contents('input1.txt');

$numbers = explode("\n", $file);
$partOne = $partTwo = 0;

foreach ($numbers as $number) {
    $partOne += (floor((int) $number / 3) - 2);
}

foreach ($numbers as $number) {
    $tempFuel = $number;

    while ($tempFuel > 0) {
        $fuel = (floor((int) $tempFuel / 3) - 2);

        if ($fuel < 0) {
            $fuel = 0;
        }

        $partTwo += $fuel;
        $tempFuel = $fuel;
    }
}

var_dump($partOne);
var_dump($partTwo);