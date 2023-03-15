<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserResourceController extends Controller
{
    // ユーザーの情報
    public function userData(Request $request)
    {
        $id = $request['id'];
        $userData = User::with(['threads.threadImages', 'items.itemImages', 'followers'])
            ->withCount(['followings as following_count', 'followers as follower_count'])
            ->find($id);
        return response()->json($userData);
    }
}
