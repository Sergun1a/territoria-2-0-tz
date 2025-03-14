<?php

namespace App\Models;

class Cow extends Animal
{
    public function collectProduct(): int
    {
        return rand(8, 12); // Корова дает 8-12 литров молока
    }
}
