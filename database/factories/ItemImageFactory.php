<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemImage>
 */
class ItemImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_id' => \App\Models\Item::factory(),
            'path' => 'item_images/000000.jpg',
            'original_file_name' => fake()->file('public/item_images', 'public/storage/item_images', false),
        ];
    }
}
