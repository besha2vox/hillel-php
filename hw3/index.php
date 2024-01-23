<?php

$int1 = 8;
$int2 = 10;
$int3 = 0;
$float1 = 8.0;
$float2 = 5.98;
$str1 = '10';
$str2 = 'string';
$str3 = '';

function printResult($expression, $bool) {
    echo "$expression -> ";
    var_dump($bool);
}

printResult("$int1 === $int2", $int1 === $int2);
printResult("$int1 !== $int2", $int1 !== $int2);
printResult("$int1 > $int2 ", $int1 > $int2 );
printResult("$int1<= $int2", $int1<= $int2);
printResult("$int1 !== $float1", $int1 !== $float1);
printResult("$int1 === $float1", $int1 === $float1);
printResult("$float2 === $float1", $float2 === $float1);
printResult("$int1 === $str1", $int1 === $str1);
printResult("$int1 == $str1", $int1 == $str1);
printResult("$str1 === $str2", $str1 === $str2);
printResult("$str1 == $str2", $str1 == $str2);
printResult("$str1 === $str2", $str1 === $str2);
printResult("$str3 == false", $str3 == false);
printResult("$str3 === false", $str3 === false);
printResult("$str3 == null", $str3 == null);
printResult("$int2 == true", $int2 == true);
printResult("$int2 === false", $int2 === false);
printResult("$int3 == null", $int3 == null);
printResult("$int3 === null", $int3 === null);