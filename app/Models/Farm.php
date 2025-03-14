<?php

namespace App\Models;

class Farm
{
    private array $animals = [];
    private array $products = [];

    public function addAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
    }

    public function collectProducts(): void
    {
        foreach ($this->animals as $animal) {
            $product = $animal->collectProduct();
            $className = get_class($animal);
            $this->products[$className] = ($this->products[$className] ?? 0) + $product;
        }
    }

    public function getAnimalCounts(): array
    {
        $counts = [];
        foreach ($this->animals as $animal) {
            $className = get_class($animal);
            $counts[$className] = ($counts[$className] ?? 0) + 1;
        }
        return $counts;
    }

    public function getTotalProducts(): array
    {
        return $this->products;
    }
}
