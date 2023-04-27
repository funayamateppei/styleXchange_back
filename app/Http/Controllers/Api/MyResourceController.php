<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

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

    // プロフィール編集処理
    public function updateData(Request $request)
    {
        DB::beginTransaction(); // トランザクションを開始
        try {
            $data = [];
            if ($request->file('iconFile')) {
                $file = $request->file('iconFile');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $store = $file->storeAs('icon_images', $filename, 's3');
                $data['icon_path'] = $store;
                // 以前のアイコン画像を削除
                $previous_icon_path = Auth::user()->icon_path;
                if ($previous_icon_path) {
                    if (Storage::disk('s3')->exists($previous_icon_path)) {
                        $delete = Storage::disk('s3')->delete($previous_icon_path);
                        Log::debug($delete);
                    }
                }
            }
            if ($request->input('height')) {
                $data['height'] = $request->input('height');
            }
            if ($request->input('name')) {
                $data['name'] = $request->input('name');
            }
            if ($request->input('email')) {
                $data['email'] = $request->input('email');
            }
            if ($request->input('text')) {
                $data['text'] = $request->input('text');
            }
            if ($request->input('postcode')) {
                $data['post_code'] = $request->input('postcode');
            }
            if ($request->input('address')) {
                $data['address'] = $request->input('address');
            }
            if ($request->input('instagramId')) {
                $data['instagram_id'] = $request->input('instagramId');
            }
            // Log::debug($data);
            Auth::user()->update($data);
            DB::commit();
            return response()->noContent();
        } catch (\Exception $e) {
            // エラー処理
            Log::debug($e);
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // いいね一覧
    public function likesData(Request $request)
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        $isThreadSelect = $request['isThreadSelect'];
        Log::debug($isThreadSelect);
        if ($isThreadSelect == 1) {
            $data = $user->likedThreadBy()->with('threadImages')->orderBy('created_at', 'desc')->paginate(15);
        } else if ($isThreadSelect == 0) {
            $data = $user->likedItemBy()->with('itemImages')->orderBy('created_at', 'desc')->paginate(15);
        }
        return response()->json($data);
    }

    // ブックマーク一覧
    public function bookmarksData()
    {
        $id = Auth::id();
        $data = User::where('id', $id)->first();
        $items = $data->bookmarkedBy()->with('threadImages')->orderBy('created_at', 'desc')->paginate(15);
        return response()->json($items);
    }
}
