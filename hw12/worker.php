<?php

class Worker
{
    private string $name;
    private string $role;

    public function __construct(string $name, ?string $role)
    {
        $this->setName($name);
        $this->setRole($role);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setName($name): void
    {
        if (strlen($name) < 2) {
            throw new Exception("Invalide name" . PHP_EOL);
        }
        $this->name = $name;
    }

    public function setRole($role): void
    {
        if (!$this->isRoleValid($role)) {
            throw new Exception("Role can be one of manager, developer, tester" . PHP_EOL);
        }
        $this->role = $role;
    }

    public function printWorkerInfo(): void
    {
        echo "Worker name: $this->name. Role: $this->role" . PHP_EOL;
    }

    private function isRoleValid($role): bool
    {
       return match ($role) {
            'manager', 'developer', 'tester' => true,
            default => false
        };
    }
}