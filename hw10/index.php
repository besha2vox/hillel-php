<?php

function generateFibonacci(int $max): Generator {
    [$prevNumber, $currentNumber] =  [0, 1];
    while ($prevNumber < $max) {
        yield $prevNumber;
        [$prevNumber, $currentNumber] = [$currentNumber, $prevNumber + $currentNumber];
    }
}

echo "Вкажіть будь яке ціле і позитивне число: ";
$input = trim(fgets(STDIN));

$numbers = generateFibonacci((int)$input);

foreach ($numbers as $i => $number) {
    echo $i === 0 ? $number : ", $number";
}

echo PHP_EOL;