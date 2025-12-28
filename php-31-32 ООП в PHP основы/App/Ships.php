<?php

namespace App;

class Ships extends Transport
{
    private int $radioTower;
    private int $anchor;

    public function __construct(string $engine, string $name, int $maxSpeed, int $users, int $radioTower, int $anchor)
    {
        parent::__construct($engine, $name, $maxSpeed, $users);
        $this->radioTower = $radioTower;
        $this->anchor = $anchor;

    }

    public function getRadioTower(): string
    {
        return $this->radioTower;
    }

    public function getAnchor(): int
    {
        return $this->anchor;
    }

    public function setRadioTower(int $radioTower): void
    {
        $this->radioTower = $radioTower;
    }

    public function setAnchor(int $anchor): void
    {
         $this->anchor = $anchor;
    }
}