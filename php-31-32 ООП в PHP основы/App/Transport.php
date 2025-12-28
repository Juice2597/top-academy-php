<?php

namespace App;

class Transport
{
    private string $engine;
    private string $name;
    private int $maxSpeed;
    private int $users;

    public function __construct(string $engine, string $name, int $maxSpeed, int $users)
    {
        $this->engine = $engine;
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->users = $users;

    }

    public function getEngine(): string
    {
        return $this->engine;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function getUsers(): int
    {
        return $this->users;
    }

    public function setEngine($engine): void
    {
        $this->engine = $engine;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setMaxSpeed(int $maxSpeed): void
    {
        $this->maxSpeed = $maxSpeed;
    }

    public function setUsers(int $users): void
    {
        $this->users = $users;
    }

}