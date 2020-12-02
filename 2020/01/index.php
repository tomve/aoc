<?php

function day01($part = 'one')
{
    $file = file_get_contents('input1.txt');

    $numbers = explode("\n", $file);
    $multiple = 0;

    foreach ($numbers as $number) {
        foreach ($numbers as $second_number) {
            $number = (int) $number;
            $second_number = (int) $second_number;

            if ($part === 'one') {
                $result = ($number + $second_number);

                if ($result == 2020) {
                    $multiple = ($number * $second_number);
                }
            }

            if ($part === 'two') {
                foreach ($numbers as $third_number) {
                    $third_number = (int) $third_number;
                    $result = ($number + $second_number + $third_number);

                    if ($result == 2020) {
                        $multiple = ($number * $second_number * $third_number);
                    }
                }
            }
        }
    }

    return $multiple;
}

var_dump(day01());

var_dump(day01('two'));