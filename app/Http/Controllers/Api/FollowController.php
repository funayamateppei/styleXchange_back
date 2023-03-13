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
}
