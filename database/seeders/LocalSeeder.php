<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Thread;
use App\Models\ThreadImage;
use App\Models\ThreadComment;
use App\Models\Item;
use App\Models\ItemComment;
use App\Models\ItemImage;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ユーザー15人作成
        $users = User::factory()
            ->count(15)
            ->create();

        // threads5件作成
        $threads = Thread::factory()->count(5)->recycle($users)
            ->has(ThreadImage::factory()->count(3))
            ->has(ThreadComment::factory()->count(3)->recycle($users)) // thread1つに対してコメント3件作成
            ->has(
                Item::factory()->count(2)->state(function (array $attributes, Thread $thread) use ($users) {
                    return [
                        'user_id' => $thread->user_id, // thread1つに対してitem2件作成 thread作成者のuser_id格納
                        'gender' => $thread->gender, // 作成したthreadのgenderを受け渡す
                    ];
                })
                    ->has(ItemImage::factory()->count(2)) // item1つに対して2件画像作成
                    ->has(ItemComment::factory()->count(3)->recycle($users)) // item1つに対してコメント3件作成
            )
            ->create();

        // threadのいいね機能のダミーデータ
        foreach ($threads as $thread) {
            $likesCount = rand(1, 10); // ランダムに1~3の数字を格納
            $usersForLikes = $users->random($likesCount); // 作成した50人のユーザーからランダムに$likeCount人格納する
            foreach ($usersForLikes as $user) {
                $thread->likedThreads()->attach($user); // Threadモデルに定義している関数(リレーション定義)を使ってattach()
            }
        }

        // threadのブックマーク機能のダミーデータ
        foreach ($threads as $thread) {
            $bookmarksCount = rand(1, 10); // ランダムに1~3の数字を格納
            $usersForLikes = $users->random($bookmarksCount); // 作成した50人のユーザーからランダムに$likeCount人格納する
            foreach ($usersForLikes as $user) {
                $thread->bookmarkedThreads()->attach($user); // Threadモデルに定義している関数(リレーション定義)を使ってattach()
            }
        }

        // itemsのいいね機能のダミーデータ
        foreach ($threads as $thread) {
            foreach ($thread->items as $item) { //threadインスタンスに紐づいている$itemsを1つずつ取り出す(ループ)
                $likesCount = rand(1, 10); // ランダムに1~3の数字を格納
                $usersForLikes = $users->random($likesCount); // 作成した50人のユーザーからランダムに$likeCount人格納する
                foreach ($usersForLikes as $user) {
                    $item->likedItems()->attach($user); // Itemモデルに定義している関数(リレーション定義)を使ってattach()
                }
            }
        }

        // itemsの購入履歴機能のダミーデータ
        // foreach ($threads as $thread) {
        //     foreach ($thread->items as $item) { //threadインスタンスに紐づいている$itemsを1つずつ取り出す(ループ)
        //         $likesCount = rand(1, 3); // ランダムに1~3の数字を格納
        //         $usersForLikes = $users->random($likesCount); // 作成した50人のユーザーからランダムに$likeCount人格納する
        //         foreach ($usersForLikes as $user) {
        //             $item->purchasedItems()->attach($user); // Itemモデルに定義している関数(リレーション定義)を使ってattach()
        //         }
        //     }
        // }

        // フォロワー/フォローの関係を作成する
        foreach ($users as $user) { // 作成したユーザー全員をまわす
            // ユーザーのフォロワーを作成する
            $followCount = rand(5, 12);
            $usersForFollows = $users->random($followCount)->reject(function ($followedUser) use ($user) {
                return $followedUser->id == $user->id; // 自分をフォローしようとした時は除外する
            });
            foreach ($usersForFollows as $followedUser) {
                $user->followings()->attach($followedUser);
            }
        }
    }
}
