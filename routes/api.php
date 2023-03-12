<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\MyResourceController;

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

        // マイページ
        Route::prefix('/my')
        ->name('my.')
        ->group(function () {
            // 全てのユーザーのデータを全て返す
            Route::get('/allData', [MyResourceController::class, 'allData'])->name('allData');
            // AuthUserとthreadとitemをまとめて返す
            Route::get('/data', [MyResourceController::class, 'data'])->name('data');
            // Userとthreadとitemをまとめて返す
            Route::get('/data/{id}', [MyResourceController::class, 'userData'])->name('userData');
            // SSR時にcookieを受け取ってログインしているユーザーを取得
            Route::get('/data/me', [MyResourceController::class, 'me'])->name('me');
        });
    });

// テスト用
Route::get('/hoge', function (Request $request) {
    // こんな感じでレスポンスを作ります。
    return response()->json([
        'hoge' => 'hoge',
    ]);
});
