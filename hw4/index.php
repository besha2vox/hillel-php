<?php

echo "Введіть число для отримання кольору по індексу:
1: green; 2: red; 3: blue; 4: brown; 5: violet; 6: black.
Всі інші значення повернуть white" . PHP_EOL;

$value = trim(fgets(STDIN));

$returnValue = match($value) {
    '1' => 'green',
    '2' => 'red',
    '3' => 'blue',
    '4' => 'brown',
    '5' => 'violet',
    '6' => 'black',
    default => 'white'
};

echo $returnValue . PHP_EOL;