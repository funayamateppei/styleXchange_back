<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\ItemImage;
use App\Models\ItemComment;
use App\Models\Category;
use App\Models\Thread;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        DB::beginTransaction(); // トランザクションを開始
        try {
            $item_id = $request->route('id');
            // thread_imagesを削除する処理
            if ($request->input('deletedImageIds')) {
                $delete_item_image_id = $request->input('deletedImageIds');
                foreach ($delete_item_image_id as $id) {
                    $itemImage = ItemImage::find($id);
                    $originalFileName = $itemImage->original_file_name;
                    $itemImage->delete();
                    if (File::exists(storage_path('app/public/' . 'item_images/' . $originalFileName))) {
                        $delete = File::delete(storage_path('app/public/' . 'item_images/' . $originalFileName));
                        Log::debug($delete);
                    }
                }
            }
            // thread_imagesを追加する処理
            if ($request->file('newImages')) {
                foreach ($request->file('newImages') as $image) {
                    $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                    $store = $image->storeAs('item_images', $filename, 'public');
                    $path = '/storage/' . $store;
                    $threadImageData = [
                        'item_id' => $item_id,
                        'path' => $path,
                        'original_file_name' => $filename,
                    ];
                    $itemImagesResponse = ItemImage::create($threadImageData);
                }
            }
            // threadを更新する処理
            $data = $request->input('item');
            $itemUpdateResponse = Item::find($item_id)->update($data);
            DB::commit();
            return response()->noContent();
        } catch (\Exception $e) {
            // エラー処理
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // 削除処理
    public function deleteItem(Request $request)
    {
        $item_id = $request->route('id');
        $item = Item::find($item_id);
        $thread_id = $item->thread_id;
        DB::beginTransaction();
        try {
            $item->delete();
            // スレッドに属するアイテム数をカウント
            $item_count = DB::table('items')->where('thread_id', $thread_id)->count();
            // アイテム数が0の場合はスレッドを削除
            if ($item_count === 0) {
                DB::table('threads')->where('id', $thread_id)->delete();
            }
            DB::commit();
            return response()->noContent();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->serverError();
        }
    }
}
