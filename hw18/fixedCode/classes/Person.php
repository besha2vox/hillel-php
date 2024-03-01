<?php

class Person
{
    private Key $key;

    public function __construct(Key $key)
    {
        $this->key = $key;
    }

    public function getKey(): Key
    {
        return $this->key;
    }
}