<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $createdAt = Carbon::now()->subDays(rand(1, 30))->subHours(rand(1, 24))->subMinutes(rand(1, 60));
        $updatedAt = $createdAt->copy()->addDays(rand(1, 30))->addHours(rand(1, 24))->addMinutes(rand(1, 60));
        return [
            'user_id' => \App\Models\User::factory(),
            'text' => fake()->realText(150),
            'archive' => fake()->boolean(90),
            'gender' => fake()->boolean(50),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
