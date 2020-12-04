<?php

$file = file_get_contents('input1.txt');
$passports = explode("\n\n", $file);

$requiredFields = ['byr', 'iyr', 'eyr', 'hgt', 'hcl', 'ecl', 'pid'];

function part01()
{
    global $passports, $requiredFields;

    $validPassports = 0;

    foreach ($passports as $passport) {
        foreach ($requiredFields as $field) {
            if (strpos($passport, $field) !== false) {
                $valid = true;
            } else {
                $valid = false;
                break;
            }
        }

        if ($valid == true) {
            $validPassports++;
        }
    }

    return $validPassports;
}

function part02()
{
    global $passports, $requiredFields;

    $validPassports = 0;
    $passport_content = [];

    foreach ($passports as $passport) {
        $passport = str_replace("\n", ' ', $passport);

        $passport_array = explode(' ', $passport);

        foreach ($passport_array as $passport_item) {
            list($k, $v) = explode(':', $passport_item);
            $passport_content[$k] = $v;
        }

        $valid = false;

        foreach ($requiredFields as $field) {
            if (isset($passport_content[$field])) {
                $passport_value = $passport_content[$field];

                if (
                    (($field === 'byr') && ($passport_value >= 1920) && ($passport_value <= 2002))
                    || (($field === 'iyr') && ($passport_value >= 2010) && ($passport_value <= 2020))
                    || (($field === 'eyr') && ($passport_value >= 2020) && ($passport_value <= 2030))
                    || (($field === 'ecl') && (in_array($passport_value, ['amb','blu', 'brn', 'gry', 'grn', 'hzl', 'oth'])))
                    || (($field === 'hgt') && (strpos($passport_value, 'cm') !== false)
                        && ((int) $passport_value >= 150) && ((int) $passport_value <= 193))
                    || (($field === 'hgt') && (strpos($passport_value, 'in') !== false)
                        && ((int) $passport_value >= 59) && ((int) $passport_value <= 76))
                    || (($field === 'pid') && is_numeric($passport_value) && (strlen($passport_value) == 9))
                    || (($field === 'hcl') && preg_match('/^#[0-9a-f]{6}$/', $passport_value))
                ) {
                    $valid = true;
                } else {
                    $valid = false;
                    break;
                }
            } else {
                $valid = false;
                break;
            }
        }

        if ($valid) {
            $validPassports++;
        }

        $passport_content = [];
    }

    return $validPassports;
}

var_dump('part 1: ' . part01());

var_dump('part 2: ' . part02());