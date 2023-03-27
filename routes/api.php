<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\MyResourceController;
use App\Http\Controllers\Api\UserResourceController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\ExhibitController;
use App\Http\Controllers\Api\ThreadController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\InfinityScrollController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum']) // ログインしていないと使えないルーティング
    ->name('.api')
    ->group(function () {
        // ログインしているユーザーを取得
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        // マイページ
        Route::prefix('/my')
            ->name('my.')
            ->group(function () {
                // AuthUserとthreadとitemをまとめて返す ISR+CSR
                Route::get('/allData', [MyResourceController::class, 'allData'])->name('allData');
                Route::get('/data', [MyResourceController::class, 'data'])->name('data');
            });
        // 特定のユーザーのページでフォローしているかしていないかを判断する処理
        Route::get('/isFollowing', [MyResourceController::class, 'isFollowing'])->name('isFollowing');

        // 出品処理 threads $ thread_images & items & item_images 保存
        Route::post('/exhibit', [ExhibitController::class, 'exhibit'])->name('exhibit');

        // thread 関連処理
        Route::prefix('/threads')
            ->group(function () {
                // コメント機能
                Route::post('/comments/{id}', [ThreadController::class, 'postThreadComments'])->name('postThreadComments');
                // いいね機能
                Route::post('/likes/{id}', [ThreadController::class, 'postThreadLikes'])->name('postThreadLikes');
                // ブックマーク機能
                Route::post('/bookmarks/{id}', [ThreadController::class, 'postThreadBookmarks'])->name('postThreadBookmarks');
            });

        // thread 関連処理
        Route::prefix('/items')
            ->group(function () {
                // コメント機能
                Route::post('/comments/{id}', [ItemController::class, 'postItemComments'])->name('postItemComments');
                // いいね機能
                Route::post('/likes/{id}', [ItemController::class, 'postItemLikes'])->name('postItemLikes');
            });
    });

// Homeページでの無限スクロールのエンドポイント SSR+CSR
Route::get('/home', [InfinityScrollController::class, 'getHomeThreads'])->name('getHomeThreads');
Route::get('/home/mens', [InfinityScrollController::class, 'getHomeThreads'])->name('getHomeThreads');
Route::get('/home/ladies', [InfinityScrollController::class, 'getHomeThreads'])->name('getHomeThreads');

// フォロー中の人の投稿だけがでる無限スクロールのエンドポイント SSR+CSR
Route::get('/timeline', [InfinityScrollController::class, 'getTimelineThreads'])->name('getTimelineThreads');

// 出品ページで使うカテゴリの情報を返すエンドポイント ISR
Route::get('/categories', [ExhibitController::class, 'categories'])->name('categories');

// フォロー欄 特定のユーザーとログインしているユーザーがフォロー済かの情報取得 SSR+CSR
Route::get('/follows/{id}', [FollowController::class, 'getFollows'])->name('getFollows');
// 特定のユーザーのマイページ情報 ISR+CSR
Route::get('/user/{id}', [UserResourceController::class, 'userData'])->name('userData');

// 特定のthreadの情報 CSR+ISR
Route::prefix('/threads')
    ->group(function () {
        Route::get('/comments/{id}', [ThreadController::class, 'getThreadComments'])->name('getThreadComments');
        Route::get('/ids', [ThreadController::class, 'getThreadIds'])->name('getThreadIds');
        Route::get('/{id}', [ThreadController::class, 'getThread'])->name('getThread');
    });

// 特定のitemsの情報 CSR+ISR
Route::prefix('/items')
    ->group(function () {
        Route::get('/comments/{id}', [ItemController::class, 'getItemComments'])->name('getItemComments');
        Route::get('/ids', [ItemController::class, 'getItemIds'])->name('getItemIds');
        Route::get('/{id}', [ItemController::class, 'getItem'])->name('getItem');
    });

// 特定のユーザーのプロフィールページ フォロー欄に使用する情報を取得 CSR+ISR
Route::get('/userIds', [FollowController::class, 'userIds'])->name('userIds');
