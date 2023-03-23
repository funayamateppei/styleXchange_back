<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\MyResourceController;
use App\Http\Controllers\Api\UserResourceController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\ExhibitController;
use App\Http\Controllers\Api\ThreadController;

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
                // 全てのユーザーのデータを全て返す
                Route::get('/allData', [MyResourceController::class, 'allData'])->name('allData');
                // AuthUserとthreadとitemをまとめて返す
                Route::get('/data', [MyResourceController::class, 'data'])->name('data');
            });
        Route::get('/isFollowing', [MyResourceController::class, 'isFollowing'])->name('isFollowing');

        // 出品処理 threads $ thread_images & items & item_images 保存
        Route::post('/exhibit', [ExhibitController::class, 'exhibit'])->name('exhibit');
    });

// 出品ページで使うカテゴリの情報を返すエンドポイント
Route::get('/categories', [ExhibitController::class, 'categories'])->name('categories');

// フォロー欄 特定のユーザーとログインしているユーザーがフォロー済かの情報取得
Route::get('/follows/{id}', [FollowController::class, 'getFollows'])->name('getFollows');
// 特定のユーザーのマイページ情報
Route::get('/user/{id}', [UserResourceController::class, 'userData'])->name('userData');

Route::prefix('/threads')
    ->group(function () {
        // 特定のthreadの情報 CSR+ISR
        Route::get('/ids', [ThreadController::class, 'getThreadIds'])->name('getThreadIds');
        Route::get('/{id}', [ThreadController::class, 'getThread'])->name('getThread');
        Route::get('/comments/{id}', [ThreadController::class, 'getThreadComments'])->name('getThreadComments');
    });

// 特定のユーザーのプロフィールページ CSR+ISR
// フォロー欄に使用する情報を取得
Route::get('/userIds', [FollowController::class, 'userIds'])->name('userIds');
