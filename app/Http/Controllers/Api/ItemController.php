<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\ItemComment;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    // ISR用 item全て取得
    public function getItemIds(Request $request)
    {
        $data = Item::orderBy('created_at', 'desc')->get();
        return response()->json($data);
    }

    // 特定のitemの情報取得
    public function getItem(Request $request)
    {
        $id = $request['id'];
        $data = Item::with(['user.items.itemImages', 'thread.threadImages', 'itemImages', 'itemComments.user', 'likedItems', 'category'])
            ->find($id);
        // 大分類のカテゴリーを取得
        $category = $data->category;
        $parentCategory = Category::where([['id', $category->parent], ['big_category', true]])
            ->first();
        $data->parent_category = $parentCategory;
        return response()->json($data);
    }

    // 特定のitemのコメント取得
    public function getItemComments(Request $request)
    {
        $id = $request['id'];
        $itemData = Item::find($id);
        $commentData = ItemComment::with('user')
            ->where('item_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();
        $data = [
            'itemData' => $itemData,
            'commentData' => $commentData,
        ];
        return response()->json($data);
    }

    // コメント機能
    public function postItemComments(Request $request)
    {
        $id = $request['id'];
        $data = $request->get('comment');
        // Log::debug($data); // 確認用
        $comment = [
            'comment' => $data,
            'item_id' => $id,
            'user_id' => Auth::id(),
        ];
        ItemComment::create($comment);
        return response()->noContent();
    }

    // いいね機能
    public function postItemLikes(Request $request)
    {
        try {
            $user_id = Auth::id();
            $item_id = $request['id'];

            $item = Item::findOrFail($item_id); // itemが存在するか確認

            $is_like = $item->likedItems()->where('user_id', $user_id)->exists();

            $is_like
                ? $item->likedItems()->detach($user_id)  // $is_likeがtrue
                : $item->likedItems()->attach($user_id); // $is_likeがfalse

            return response()->noContent();
        } catch (\Exception $e) {
            Logger($e);
            abort(404);
        }
    }

    // 更新処理
    public function updateItem(Request $request)
    {
        Log::debug($request->all());
    }

    // 削除処理
    public function deleteItem(Request $request)
    {
        Log::debug($request['id']);
    }
}
