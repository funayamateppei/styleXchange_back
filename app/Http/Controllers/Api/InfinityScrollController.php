<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Thread;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InfinityScrollController extends Controller
{
    // Home画面 無限スクロール(MIX) SSR+CSR
    public function getHomeThreads()
    {
        $data = Thread::with(['threadImages', 'user'])->orderBy('updated_at', 'desc')->paginate(8);
        return response()->json($data);
    }

    // Timeline画面 無限スクロール SSR+CSR
    public function getTimelineThreads()
    {
        $id = Auth::user()->followings()->pluck('following_id')->toArray(); // ログインユーザーがフォローしている人のidをすべて取得
        // Log::debug($id); // 確認用
        $data = Thread::with(['threadImages', 'user'])->withCount(['likedThreads', 'bookmarkedThreads'])->whereIn('user_id', $id)->orderBy('updated_at', 'desc')->paginate(8); // フォロー中のユーザーのthreadを取得
        return response()->json($data);
    }
}