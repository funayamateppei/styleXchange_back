<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;

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

        $gender = fake()->boolean(50);
        $categories = Category::where('big_category', false)
            ->where('gender', $gender ? '!=' : '=', 1)
            ->get()
            ->pluck('id')
            ->toArray();
        $category_id = fake()->randomElement($categories);

        $url = [
            'https://jp.mercari.com/item/m96115622053?utm_medium=share&source_location=share&utm_source=ios',
            'https://jp.mercari.com/item/m40808130126?source_location=share&utm_source=ios&utm_medium=share',
            'https://jp.mercari.com/item/m34699151604?source_location=share&utm_source=ios&utm_medium=share',
            'https://jp.mercari.com/item/m19466101735?utm_source=ios&source_location=share&utm_medium=share',
            'https://jp.mercari.com/item/m37815542830?source_location=share&utm_source=ios&utm_medium=share',
        ];
        $randomUrl = $url[array_rand($url)];

        return [
            'thread_id' => \App\Models\Thread::factory(),
            'user_id' => \App\Models\User::factory(),
            'title' => fake()->colorName(),
            'text' => fake()->realText(150),
            'price' => fake()->numberBetween(300, 80000),
            'gender' => $gender,
            'category_id' => $category_id,
            'color' => fake()->colorName(),
            'size' => $randomSize,
            'condition' => $randomCondition,
            'days' => $randomDays,
            'sale' => fake()->boolean(90),
            'postage' => fake()->boolean(80),
            'url' => $randomUrl,
        ];
    }
}
