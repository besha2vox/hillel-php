<?php

define('CLASSES_DIR', __DIR__ . '/classes/');
require CLASSES_DIR . '/Figure.php';
require CLASSES_DIR . '/Rectangle.php';
require CLASSES_DIR . '/Circle.php';

try {
    $rectangle = new Rectangle(5, 7);
    echo "Rectangle area: " . $rectangle->area() . "\n";
    echo "Rectangle perimeter: " . $rectangle->perimeter() . "\n";

    $circle = new Circle(3);
    echo "Circle area: " . $circle->area() . "\n";
    echo "Circle perimeter: " . $circle->perimeter() . "\n";
} catch (Exception $error) {
    echo $error->getMessage();
}

xdebug_info();