<?php

namespace App\Models;

class Chicken extends Animal
{
    public function collectProduct(): int
    {
        return rand(0, 1); // Курица дает 0-1 яйцо
    }
}
