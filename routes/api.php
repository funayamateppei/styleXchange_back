<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\MyResourceController;
use App\Http\Controllers\Api\UserResourceController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\ExhibitController;

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

Route::middleware(['auth:sanctum'])
    ->name('.api')
    ->group(function () {
        // ログインしているユーザー
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        // Userとthreadとitemをまとめて返す

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
    });

// 出品ページで使うカテゴリの情報を返すエンドポイント
Route::get('/categories', [ExhibitController::class, 'categories'])->name('categories');

// フォロー欄 特定のユーザーとログインしているユーザーがフォロー済かの情報取得
Route::get('/follows/{id}', [FollowController::class, 'getFollows'])->name('getFollows');
// 特定のユーザーのマイページ情報
Route::get('/user/{id}', [UserResourceController::class, 'userData'])->name('userData');


// CSR+ISRからSSR+CSRに変更したのでお陀仏
// フォロー欄に使用する情報を取得
Route::get('/userIds', [FollowController::class, 'userIds'])->name('userIds');