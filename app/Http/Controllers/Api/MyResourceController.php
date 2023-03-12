<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

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

    // ユーザーの情報
    public function userData(Request $request)
    {
        $id = $request['id'];
        $userData = User::with(['threads.threadImages', 'items.itemImages'])->find($id);
        return response()->json($userData);
    }

    public function me(Request $request)
    {
        $data = $request->user();
        return response()->json($data);
    }
}
