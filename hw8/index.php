<?php

function createArray (int $length, int $min, int $max): array {
    $arr = [];
    for($i = 0; $i < $length; $i++)
    {
        $arr[$i] = rand($min, $$max);
    }
    return  $arr;
}

function sortArray(array $array): array {
    $length = count($array);
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}

function getMinMax(array $array): array {
    $min = PHP_INT_MAX;
    $max = PHP_INT_MIN;
    foreach ($array as $num){
        if($min > $num) {
            $min = $num;
            continue;
        }
        if($max < $num) {
            $max = $num;
        }
    }
    return ['min' => $min, 'max' => $max];
}

// Create array of numbers:
$numbers = createArray(10, 12, 100);

// Get min and max number from array using custom function:
$minMax = getMinMax($numbers);
echo "min => " . $minMax["min"] . PHP_EOL . "max => " . $minMax["max"] . PHP_EOL;

// Sort array:
$sortedNumbers = sortArray($numbers);
echo "Sorted array: ";
var_dump($sortedNumbers);

// Get min and max number from sorted array:
$lastKey = array_key_last($sortedNumbers);
echo "min: $sortedNumbers[0]" . PHP_EOL . "max:$sortedNumbers[$lastKey]" . PHP_EOL;
