<?php

namespace App;

class Airplane extends Transport
{
    private int $wings;

    public function __construct(string $engine, string $name, int $maxSpeed, int $users,int $wings)
    {
        parent::__construct($engine, $name, $maxSpeed, $users);
        $this->wings = $wings;

    }

    public function getWings(): int
    {
        return $this->wings;
    }

    public function setWings(int $wings): void
    {
        $this->wings = $wings;
    }




}