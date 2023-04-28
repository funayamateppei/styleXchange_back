<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Thread;
use Illuminate\Support\Facades\Storage;

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
        // $gender = $this->state(function (array $attributes) {
        //     return $attributes['gender'];
        // });
        // $filename = $gender === true
        //     ? fake()->file('public/thread_man_image', 'public/storage/thread_images', false)
        //     : fake()->file('public/thread_woman_image', 'public/storage/thread_images', false);
        // $path = "/storage/thread_images/$filename";
        // return [
        //     'thread_id' => \App\Models\Thread::factory(),
        //     'path' => $path,
        //     'original_file_name' => $filename,
        // ];
        return [
            'thread_id' => \App\Models\Thread::factory(),
            'path' => function (array $attributes) {
                $thread = Thread::find($attributes['thread_id']);
                $gender = $thread ? $thread->gender : false;
                $source = $gender
                    ? 'public/thread_man_image'
                    : 'public/thread_woman_image';
                $filename = fake()->file($source, 'public/storage/thread_images', false);

                // 基になるファイルをコピーしてS3にアップロードする
                $path = "thread_images/$filename";
                $content = Storage::disk('public')->get($path);
                Storage::disk('s3')->put($path, $content);
                return $path;
            },
            'original_file_name' => function (array $attributes) {
                $filename = basename($attributes['path']);
                return $filename;
            },
        ];
    }
}
