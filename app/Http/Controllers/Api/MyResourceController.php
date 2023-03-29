<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
        DB::beginTransaction(); // トランザクションを開始
        try {
            $data = [];
            if ($request->file('iconFile')) {
                $file = $request->file('iconFile');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $store = $file->storeAs('icon_images', $filename, 'public');
                $icon_path = '/storage/' . $store;
                $data['icon_path'] = $icon_path;

                // 以前のアイコン画像を削除
                $previous_icon_path = Auth::user()->icon_path;
                if ($previous_icon_path) {
                    $relative_path = Str::substr($previous_icon_path, 9);
                    if (File::exists(storage_path('app/public/' . $relative_path))) {
                        $delete = File::delete(storage_path('app/public/' . $relative_path));
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
                $data['postcode'] = $request->input('postcode');
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
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
