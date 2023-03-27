<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class FollowController extends Controller
{
    public function getFollows(Request $request)
    {
        $id = $request['id'];
        $data = User::with(['followings.followers', 'followers.followers'])->find($id);
        return response()->json($data);
    }

    public function userIds(Request $request)
    {
        $data = User::orderBy('created_at', 'desc')->get();
        return response()->json($data);
    }

    // フォロー/アンフォロー機能
    public function follow(Request $request)
    {
        try {
            $user_id = Auth::id();
            $following_id = $request['id'];

            $following = User::findOrFail($following_id); // Userが存在するか確認

            $is_follow = $following->followers()->where('user_id', $user_id)->exists();

            $is_follow
                ? $following->followers()->detach($user_id)  // $is_followがtrue
                : $following->followers()->attach($user_id); // $is_followがfalse

            return response()->noContent();
        } catch (\Exception $e) {
            Logger($e);
            abort(404);
        }
    }
}
