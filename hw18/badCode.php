<?php

class key
{
    private $signature;
    public function __construct()
    {
        $this->signature=uniqid('key',true);
    }
    public function getSignature()
    {
        return $this->signature;
    }
}
class person
{
    private $key;
    public function __construct($key)
    {
        $this->key=$key;
    }
    public function getKey()
    {
        return $this->key;
    }
}
class house
{
    public $door=false;
    protected $tenant=[];
    protected $key;
    public function __construct($key)
    {
        $this->key=$key;
    }
    public function comeIn($person)
    {
        if ($this->door)
            $this->tenants[]=$person;

    }
    public function openDoor($key)
    {
        if ($key->getSignature()===$this->key->getSignature())
            $this->door=true;

    }
}
$key=new classes\key;
$house=new classes\house($key);
$person=new classes\person($key);
$house->openDoor($person->getKey());
$house->comeIn($person);

/*
 * 1. Відсутність типізації
 * 2. Відсутність дожок в блоках if
 * 3. Імена класів повинні бути оголошені в форматі StudlyCaps
 * 4. Кожен клас знаходиться в окремому файлі
 * 5. Відсутні пробіли навколо операторів
 */