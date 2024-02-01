<?php

function IsConditionSatisfactory(int $min, int $max): bool
{
    if ($min > $max) {
        echo "Min number($min) bigger then max number($max)";
        return false;
    }

    if ($min === $max) {
        echo "Min number is equal max number: $min";
        return false;
    }

    return true;
}

function printNumbers(int $min, int $max): void
{
    if (!IsConditionSatisfactory($min, $max)) {
        return;
    }

    while ($min <= $max) {
        echo $min . ($min === $max ? PHP_EOL : ', ');
        $min++;
    }
}

function factorial(int $number): void
{
    if($number < 0) {
        echo "The factorial can be calculated only for positive numbers" . PHP_EOL;
    }
    if($number === 0) {
        echo "!$number = 1;" . PHP_EOL;
    }

    $result = 1;
    $i = 1;
    while ($i <= $number){
        $result *= $i;
        $i++;

    }

    echo "!$number = $result" . PHP_EOL;
}

function printEvenNumbers(int $min, int $max): void
{
    if (!IsConditionSatisfactory($min, $max)) {
        return;
    }
    while ($min <= $max) {
        if ($min % 2 === 0) {
            echo $min . ($min === $max || $min === $max - 1 ? PHP_EOL : ', ');
        }
        $min++;
    }
}

echo "Task 1" . PHP_EOL;
printNumbers(1 ,10);

echo PHP_EOL . "Task 2" . PHP_EOL;
factorial(5);

echo PHP_EOL . "Task 3" . PHP_EOL;
printEvenNumbers(1, 20);