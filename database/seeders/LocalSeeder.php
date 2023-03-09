<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Thread;
use App\Models\ThreadImage;
use App\Models\ThreadComment;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()
            ->count(50)
            ->create();

        Thread::factory()->count(100)->recycle($users)
            ->has(ThreadImage::factory()->count(3))
            ->has(ThreadComment::factory()->count(3)->recycle($users))
            ->create();
    }
}
