<?php

function day02($part = 'one')
{
    $file = file_get_contents('input1.txt');

    $lines = explode("\n", $file);
    $i = 0;

    foreach ($lines as $line) {
        $expl = explode(':', $line);

        $characters = trim($expl[1]);

        $numbers_character = explode('-', $expl[0]);
        $max_character = explode(' ', $numbers_character[1]);

        $min = (int) $numbers_character[0];
        $max = (int) $max_character[0];
        $single_character = trim($max_character[1]);

        if ($part === 'one') {
            $count_match = substr_count($characters, $single_character);

            if (($count_match >= $min) && ($count_match <= $max)) {
                $i++;
            }
        }

        if ($part === 'two') {
            if (
                isset($characters[$min - 1]) && ($characters[$min - 1] == $single_character)
                != (isset($characters[$max - 1]) && ($characters[$max - 1] == $single_character))
            ) {
                $i++;
            }
        }
    }

    return $i;
}

var_dump(day02());

var_dump(day02('two'));