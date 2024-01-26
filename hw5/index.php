<?php

echo "Введіть будь який текст. 
При умові, коли текст складає більше 20 символів і більше 1го речення - 
Ви отримаєте тільки перше речення." . PHP_EOL;

echo PHP_EOL . "Input: ";
$inputText = trim(fgets(STDIN));

$dotIndex = stripos($inputText, '.');
$textLength = strlen($inputText);

if ($textLength > 20) {
    echo PHP_EOL . ($dotIndex === $textLength - 1 || !$dotIndex ?
        "Output: Рядок має 1 речення." :
        "Output:" . substr($inputText, 0, $dotIndex + 1)) . PHP_EOL;
} else {
    echo PHP_EOL . "Output: Рядок задовільняє умову по кількості символів (до 20)." . PHP_EOL;
}
