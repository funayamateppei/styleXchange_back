<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MyResourceController extends Controller
{
    // ログインユーザーの情報
    public function data()
    {
        $userData = User::with(['threads.threadImages', 'items.itemImages'])
            ->withCount(['followings as following_count', 'followers as follower_count'])
            ->find(Auth::id());
        return response()->json($userData);
    }

    // 全てのユーザーの情報
    public function allData()
    {
        $allUserData = User::with(['threads.threadImages', 'items.itemImages'])->get();
        return response()->json($allUserData);
    }

    public function me(Request $request)
    {
        $data = $request->user();
        return response()->json($data);
    }

    public function isFollowing(Request $request)
    {
        $user = $request->user();
        $data = User::with('followings')->find($user->id);
        return response()->json($data);
    }

    public function updateData(Request $request)
    {
        $data = $request->all();
        Log::debug($data);
    }
}
