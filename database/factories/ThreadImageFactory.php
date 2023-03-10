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
        return [
            'thread_id' => \App\Models\Thread::factory(),
            'path' => 'thread_images/000000.jpg',
            'original_file_name' => fake()->file('public/thread_images', 'public/storage/thread_images', false),
        ];
    }
}
