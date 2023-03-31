<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Thread;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class InfinityScrollController extends Controller
{
    // Home画面 無限スクロール(MIX) CSR
    public function getHomeThreads(Request $request)
    {
        $today = Carbon::today(); // 今日の日付を取得
        $oneMonthAgo = $today->subMonth(); // 1ヶ月前の日付を取得
        $sort = $request['sort'];
        if ($sort === 'like') {
            $data = Thread::with(['threadImages', 'user', 'items'])
                ->withCount(['bookmarkedThreads', 'likedThreads'])
                ->where('updated_at', '>=', $oneMonthAgo) // 1ヶ月前以降のデータを取得
                ->orderBy('liked_threads_count', 'desc')
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
        } else if ($sort === 'new') {
            $data = Thread::with(['threadImages', 'user', 'items'])
                ->withCount(['bookmarkedThreads', 'likedThreads'])
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
        }
        return response()->json($data);
    }


    // Home画面 無限スクロール(MENS) CSR
    public function getHomeMensThreads(Request $request)
    {
        $today = Carbon::today(); // 今日の日付を取得
        $oneMonthAgo = $today->subMonth(); // 1ヶ月前の日付を取得
        $sort = $request['sort'];
        if ($sort === 'like') {
            $data = Thread::whereHas('items', function ($query) {
                $query->where('gender', 1);
            })
                ->with(['threadImages', 'user', 'items'])
                ->withCount(['bookmarkedThreads', 'likedThreads'])
                ->where('updated_at', '>=', $oneMonthAgo) // 1ヶ月前以降のデータを取得
                ->orderBy('liked_threads_count', 'desc')
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
        } else if ($sort === 'new') {
            $data = Thread::whereHas('items', function ($query) {
                $query->where('gender', 1);
            })
                ->with(['threadImages', 'user', 'items'])
                ->withCount(['bookmarkedThreads', 'likedThreads'])
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
        }
        return response()->json($data);
    }


    // Home画面 無限スクロール(Ladies) CSR
    public function getHomeLadiesThreads(Request $request)
    {
        $today = Carbon::today(); // 今日の日付を取得
        $oneMonthAgo = $today->subMonth(); // 1ヶ月前の日付を取得
        $sort = $request['sort'];
        if ($sort === 'like') {
            $data = Thread::whereHas('items', function ($query) {
                $query->where('gender', 0);
            })
                ->with(['threadImages', 'user', 'items'])
                ->withCount(['bookmarkedThreads', 'likedThreads'])
                ->where('updated_at', '>=', $oneMonthAgo) // 1ヶ月前以降のデータを取得
                ->orderBy('liked_threads_count', 'desc')
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
        } else if ($sort === 'new') {
            $data = Thread::whereHas('items', function ($query) {
                $query->where('gender', 0);
            })
                ->with(['threadImages', 'user', 'items'])
                ->withCount(['bookmarkedThreads', 'likedThreads'])
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
        }
        return response()->json($data);
    }


    // Timeline画面 無限スクロール SSR+CSR
    public function getTimelineThreads(Request $request)
    {
        $id = Auth::user()->followings()->pluck('following_id')->toArray(); // ログインユーザーがフォローしている人のidをすべて取得
        // Log::debug($id); // 確認用
        $data = Thread::with(['threadImages', 'user'])->withCount(['likedThreads', 'bookmarkedThreads'])->whereIn('user_id', $id)->orderBy('updated_at', 'desc')->paginate(8); // フォロー中のユーザーのthreadを取得
        return response()->json($data);
    }


    // 検索結果 (カテゴリ) 無限スクロール CSR
    public function searchByCategory(Request $request)
    {
        $gender = $request['gender'];
        $category_id = $request['category'];
        Log::debug($gender . $category_id);
        $data = Thread::whereHas('items', function ($query) use ($gender, $category_id) {
            if ($gender == 1) {
                $genderBoolean = true;
            } else if ($gender == 0) {
                $genderBoolean = false;
            }
            $query->where('gender', $genderBoolean)->where('category_id', $category_id);
        })
            ->with(['threadImages', 'user'])
            ->withCount(['likedThreads', 'bookmarkedThreads'])
            ->orderBy('updated_at', 'desc')
            ->paginate(8);
        return response()->json($data);
    }


    // 検索結果 (フリーワード) 無限スクロール CSR
    public function searchByWord(Request $request)
    {
        $word = $request['word'];
        $data = Thread::whereHas('items', function ($query) use ($word) {
            $query->where(function ($subQuery) use ($word) {
                $subQuery->where('title', 'LIKE', '%' . $word . '%')
                    ->orWhere('text', 'LIKE', '%' . $word . '%');
            });
        })
            ->with(['threadImages', 'user'])
            ->withCount(['likedThreads', 'bookmarkedThreads'])
            ->orderBy('updated_at', 'desc')
            ->paginate(8);
        return response()->json($data);
    }
}
