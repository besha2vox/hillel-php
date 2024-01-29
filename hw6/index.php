<?php

declare(strict_types=1);

// Task #1
$calculateCircleArea = fn (int|float $radius): int|float => 2 * pi() * $radius ** 2;

echo 'Task #1: ' . $calculateCircleArea(14) . PHP_EOL;

// Task #2
$power = fn (int|float $number, int|float $pow): int|float => $number ** $pow;
$number1 = 14;

echo "Task #2: " . $power($number1, 2) . PHP_EOL;

// Task #3
function power (int|float &$number, int|float $pow): void
{
    $number **= $pow;
};

$number2 = 5;
power($number2, 3);
echo "Task #3: $number2" . PHP_EOL;