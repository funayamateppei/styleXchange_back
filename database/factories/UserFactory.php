<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // 住所のダミーデータ作成
        $address = fake()->address();
        $newAddress = substr($address, 8);
        // アイコンのダミーデータ作成
        $filename = fake()->file('public/icon_images', 'public/storage/icon_images', false);
        $path = "icon_images/$filename";
        $content = Storage::disk('public')->get($path);
        Storage::disk('s3')->put($path, $content);

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'text' => fake()->realText(100),
            'icon_path' => $path,
            'post_code' => fake()->postcode(),
            'address' => $newAddress,
            'height' => fake()->numberBetween(150, 190),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
