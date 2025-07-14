<?php

namespace Database\Factories;

use App\Enums\Api\V1\Ad\AdOperatorEnum;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    protected $model = Ad::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'operator' => $this->faker->randomElement(AdOperatorEnum::cases())->value,
            'user_id' => User::query()
                ->inRandomOrder()
                ->first()
                ->id,
        ];
    }
}
