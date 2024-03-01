<?php

namespace classes;
class Key
{
    private string $signature;

    public function __construct()
    {
        $this->signature = uniqid('key', true);
    }

    public function getSignature(): string
    {
        return $this->signature;
    }
}