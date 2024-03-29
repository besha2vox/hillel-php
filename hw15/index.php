<?php

class ParentClass {
    protected $text = "some text";

    public function print(): void
    {
        echo ucfirst($this->text) . PHP_EOL;
    }
}

class ChildClass extends ParentClass {
    public function print(): void
    {
        echo strtoupper($this->text) . PHP_EOL;
    }
}

$parent = new ParentClass();
$parent->print();

$child = new ChildClass();
$child->print();