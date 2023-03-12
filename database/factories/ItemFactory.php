<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sizes = ['XXS以下', 'XS', 'S', 'M', 'L', 'XL', '2XL', '3XL', '4XL以上', 'FREE'];
        $randomSize = $sizes[array_rand($sizes)];

        $conditions = ['新品未使用', '未使用に近い', '目立った傷や汚れなし', 'やや傷や汚れあり', '傷や汚れあり', '全体的に状態が悪い'];
        $randomCondition = $conditions[array_rand($conditions)];

        $days = ['1~2日で発送', '2~3日で発送', '4~7日で発送'];
        $randomDays = $days[array_rand($days)];

        return [
            'thread_id' => \App\Models\Thread::factory(),
            'user_id' => \App\Models\User::factory(),
            'title' => fake()->colorName(),
            'text' => fake()->realText(150),
            'price' => fake()->numberBetween(300, 80000),
            'category_id' => fake()->numberBetween(25, 208),
            'color' => fake()->colorName(),
            'size' => $randomSize,
            'condition' => $randomCondition,
            'days' => $randomDays,
            'sale' => fake()->boolean(90),
            'postage' => fake()->boolean(80),
        ];
    }
}
