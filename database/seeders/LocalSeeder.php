<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Thread;
use App\Models\ThreadImage;
use App\Models\ThreadComment;
use App\Models\Item;
use App\Models\Category;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ユーザー50人作成
        $users = User::factory()
            ->count(50)
            ->create();

        $threads = Thread::factory()->count(100)->recycle($users)
            ->has(ThreadImage::factory()->count(3))
            ->has(ThreadComment::factory()->count(3)->recycle($users))
            ->has(
                Item::factory()->count(2)->state(function (array $attributes, Thread $thread) use ($users) {
                    return [
                        'user_id' => $thread->user_id,
                    ];
                })
            )
            ->create();

        // threadのいいね機能のダミーデータ
        foreach ($threads as $thread) {
            $likesCount = rand(1, 3); // ランダムに1~3の数字を格納
            $usersForLikes = $users->random($likesCount); // 各スレッドに1~3人のランダムのuserを割り当てる
            foreach ($usersForLikes as $user) {
                $thread->likedThreads()->attach($user); // Threadモデルに定義している関数(リレーション定義)を使ってattach()
            }
        }

        // threadのブックマーク機能のダミーデータ
        foreach ($threads as $thread) {
            $likesCount = rand(1, 3); // ランダムに1~3の数字を格納
            $usersForLikes = $users->random($likesCount); // 各スレッドに1~3人のランダムのuserを割り当てる
            foreach ($usersForLikes as $user) {
                $thread->bookmarkedThreads()->attach($user); // Threadモデルに定義している関数(リレーション定義)を使ってattach()
            }
        }
    }
}
