<?php

namespace App;

class Cars extends Transport
{
    private int $headlights;
    private int $wheels;

    public function __construct(string $engine, string $name, int $maxSpeed, int $users, int $headlights, int $wheels)
    {
        parent::__construct($engine, $name, $maxSpeed, $users);

        $this->headlights = $headlights;
        $this->wheels = $wheels;
    }

    public function getHeadlights(): int
    {
        return $this->headlights;
    }

    public function getWheels(): int
    {
        return $this->wheels;
    }

    public function setHeadlights(int $headlights): void
    {

        $this->headlights = $headlights;
    }

    public function setWheels(int $wheels): void
    {

        $this->wheels = $wheels;
    }
}