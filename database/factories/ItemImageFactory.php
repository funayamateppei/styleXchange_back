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
        $filename = fake()->file('public/item_images', 'public/storage/item_images', false);
        $path = "/storage/item_images/$filename";
        return [
            'item_id' => \App\Models\Item::factory(),
            'path' => $path,
            'original_file_name' => $filename,
        ];
    }
}
