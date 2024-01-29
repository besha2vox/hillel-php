<?php

function  multiplication(int|float $number1, int|float $number2, ?closure $func = null): int|float
{
    $result = $number1 * $number2;

    if(isset($func)) {
        $func($result);
    }

    return $result;
}

$result1 = multiplication(12, 13.4);
echo "Resalt wihout callback: $result1" . PHP_EOL;

multiplication(21, 132.4, function (int|float $result)
{
    echo "Result with callback: $result" . PHP_EOL;
});