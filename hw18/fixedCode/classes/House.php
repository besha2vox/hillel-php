<?php

class House
{
    public bool $door = false;
    public array $tenants = [];
    protected Key $key;

    public function __construct(Key $key)
    {
        $this->key = $key;
    }

    public function comeIn(Person $person)
    {
        if ($this->door) {
            $this->tenants[] = $person;
        }
    }

    public function openDoor(Key $key): void
    {
        if ($key->getSignature() === $this->key->getSignature()) {
            $this->door = true;
        }
    }
}