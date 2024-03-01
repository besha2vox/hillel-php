<?php

use classes\House;
use classes\Key;
use classes\Person;

require __DIR__ . '/classes/Key.php';
require __DIR__ . '/classes/Person.php';
require __DIR__ . '/classes/House.php';

$key = new Key;
$house = new House($key);
$person = new Person($key);

$house->openDoor($person->getKey());
$house->comeIn($person);