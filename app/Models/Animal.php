<?php

namespace App\Models;

abstract class Animal
{
    protected string $id;

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function getId(): string
    {
        return $this->id;
    }

    abstract public function collectProduct(): int;
}
