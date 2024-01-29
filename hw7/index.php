<?php

/*
Написати програму на PHP, яка містить іменовану функцію, що приймає три аргументи:
два обовʼязкових типу int і третій необовʼязковий типу closure
Функція має повертати результат множення першого і другого аргументів, а в разі
передачі третього аргументу (анонімної функції), перед return має викликати
анонімну функції і передати в неї результат обчислення.
Реалізувати аноннімну функцію, яка виводить на екран переданий аргумент.
 */

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