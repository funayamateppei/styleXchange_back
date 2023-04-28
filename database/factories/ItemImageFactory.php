<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\Storage;

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
        $path = "item_images/$filename";
        $content = Storage::disk('public')->get($path);
        Storage::disk('s3')->put($path, $content);
        return [
            'item_id' => \App\Models\Item::factory(),
            'path' => $path,
            'original_file_name' => $filename,
        ];
    }
}
