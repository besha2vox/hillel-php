<?php

class Circle extends Figure {
    private $radius;

    public function __construct($radius) {
        if ($radius <= 0) {
            throw new Exception('Radius must be a positive number.');
        }
        $this->radius = $radius;
    }

    public function area() {
        return pi() * ($this->radius ** 2);
    }

    public function perimeter() {
        return 2 * pi() * $this->radius;
    }
}