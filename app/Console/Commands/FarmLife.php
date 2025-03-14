<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Farm;
use App\Models\Cow;
use App\Models\Chicken;

class FarmLife extends Command
{
    protected $signature = 'farm:life';
    protected $description = 'Simulate farm life';

    public function handle()
    {
        $farm = new Farm();

        // Добавляем 10 коров и 20 кур
        for ($i = 0; $i < 10; $i++) {
            $farm->addAnimal(new Cow());
        }
        for ($i = 0; $i < 20; $i++) {
            $farm->addAnimal(new Chicken());
        }

        // Выводим информацию о количестве животных
        $this->info('Animals on the farm:');
        foreach ($farm->getAnimalCounts() as $animal => $count) {
            $this->line("$animal: $count");
        }

        // Собираем продукцию 7 раз (неделя)
        for ($i = 0; $i < 7; $i++) {
            $farm->collectProducts();
        }

        // Выводим общее количество собранной продукции
        $this->info('Total products collected in a week:');
        foreach ($farm->getTotalProducts() as $product => $amount) {
            $this->line("$product: $amount");
        }

        // Добавляем ещё 5 кур и 1 корову
        for ($i = 0; $i < 5; $i++) {
            $farm->addAnimal(new Chicken());
        }
        $farm->addAnimal(new Cow());

        // Выводим информацию о количестве животных после добавления
        $this->info('Animals on the farm after adding more:');
        foreach ($farm->getAnimalCounts() as $animal => $count) {
            $this->line("$animal: $count");
        }

        // Снова собираем продукцию 7 раз (неделя)
        for ($i = 0; $i < 7; $i++) {
            $farm->collectProducts();
        }

        // Выводим общее количество собранной продукции за вторую неделю
        $this->info('Total products collected in the second week:');
        foreach ($farm->getTotalProducts() as $product => $amount) {
            $this->line("$product: $amount");
        }
    }
}
