<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    public function run(): void
    {
        if (!Ad::query()
            ->count()) {
            Ad::factory(10)
                ->create();
        } else {
            $this->command->warn('Ads has already been created');
        }
    }
}
