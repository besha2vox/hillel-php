<?php

echo "Вкажи своє ім'я: ";

$userName = trim(fgets(STDIN));

echo "Привіт, $userName!
Данна програма вираховує середнє арифметичне із всіх введених тобою чисел.
Будь які рядки(слова) будуть рахуватись за число 0.
Для завершення розрахунку вкажи '=' або пустий рядок.
Даввай почнімо!
Вкажи перше число: ";

$i = 0;
$isEnd = false;
$input = trim(fgets(STDIN));
$sum = (int)$input;

while (!$isEnd) {
    if ($input === '=' || $input === '') {
        $isEnd = true;
        echo "Середнє арифметичне: " . ($sum / $i) . "\n";
        break;
    }

    echo "Вкажи наступне число: ";
    $input = trim(fgets(STDIN));
    $sum += (int)$input;
    $i++;
}

