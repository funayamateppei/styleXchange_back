<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Thread;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ThreadImage>
 */
class ThreadImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $filename = fake()->file('public/thread_images', 'public/storage/thread_images', false);
        $path = "/storage/thread_images/$filename";
        return [
            'thread_id' => \App\Models\Thread::factory(),
            'path' => $path,
            'original_file_name' => $filename,
        ];
    }
}
