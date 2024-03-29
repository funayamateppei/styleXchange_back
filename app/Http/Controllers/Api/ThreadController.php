<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Thread;
use App\Models\ThreadComment;
use App\Models\ThreadImage;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ThreadController extends Controller
{
    // ISR用 thread全て取得
    public function getThreadIds(Request $request)
    {
        $data = Thread::orderBy('created_at', 'desc')->get();
        return response()->json($data);
    }

    // 特定のthreadの情報取得
    public function getThread(Request $request)
    {
        $id = $request['id'];
        $data = Thread::with(['user.threads.threadImages', 'items.itemImages', 'threadImages', 'threadComments.user', 'likedThreads', 'bookmarkedThreads'])
            ->find($id);
        return response()->json($data);
    }

    // 特定のthreadのコメント取得
    public function getThreadComments(Request $request)
    {
        $id = $request['id'];
        $threadData = Thread::with('user')->find($id);
        $commentData = ThreadComment::with('user')
            ->where('thread_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();
        $data = [
            'threadData' => $threadData,
            'commentData' => $commentData,
        ];
        return response()->json($data);
    }

    // 特定のthreadに対してコメントをする処理
    public function postThreadComments(Request $request)
    {
        $id = $request['id'];
        $data = $request->get('comment');
        // Log::debug($data); // 確認用
        $comment = [
            'comment' => $data,
            'thread_id' => $id,
            'user_id' => Auth::id(),
        ];
        ThreadComment::create($comment);
        return response()->noContent();
    }

    // いいね機能
    public function postThreadLikes(Request $request)
    {
        try {
            $user_id = Auth::id();
            $thread_id = $request['id'];

            $thread = Thread::findOrFail($thread_id); // threadが存在するか確認

            $is_like = $thread->likedThreads()->where('user_id', $user_id)->exists();

            $is_like
                ? $thread->likedThreads()->detach($user_id)  // $is_likeがtrue
                : $thread->likedThreads()->attach($user_id); // $is_likeがtrue

            return response()->noContent();
        } catch (\Exception $e) {
            Logger($e);
            abort(404);
        }
    }

    // ブックマーク機能
    public function postThreadBookmarks(Request $request)
    {
        try {
            $user_id = Auth::id();
            $thread_id = $request['id'];

            $thread = Thread::findOrFail($thread_id); // threadが存在するか確認

            $is_like = $thread->bookmarkedThreads()->where('user_id', $user_id)->exists();

            $is_like
                ? $thread->bookmarkedThreads()->detach($user_id)  // $is_likeがtrue
                : $thread->bookmarkedThreads()->attach($user_id); // $is_likeがtrue

            return response()->noContent();
        } catch (\Exception $e) {
            Logger($e);
            abort(404);
        }
    }

    // 更新処理
    public function updateThread(Request $request)
    {
        DB::beginTransaction(); // トランザクションを開始
        try {
            $thread_id = $request->route('id');
            // thread_imagesを削除する処理
            if ($request->input('deletedImageIds')) {
                $delete_thread_image_id = $request->input('deletedImageIds');
                foreach ($delete_thread_image_id as $id) {
                    $threadImage = ThreadImage::find($id);
                    $previous_path = $threadImage->path;
                    $threadImage->delete(); // レコード削除
                    if (Storage::disk('s3')->exists($previous_path)) {
                        Storage::disk('s3')->delete($previous_path); // s3に保存されているファイル削除
                    }
                }
            }
            // thread_imagesを追加する処理
            if ($request->file('newImages')) {
                foreach ($request->file('newImages') as $image) {
                    $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('thread_images', $filename, 's3');
                    $threadImageData = [
                        'thread_id' => $thread_id,
                        'path' => $path,
                        'original_file_name' => $filename,
                    ];
                    $threadImagesResponse = ThreadImage::create($threadImageData);
                }
            }
            // threadを更新する処理
            $data['text'] = $request->input('text');
            $data['archive'] = $request->input('archive');
            $threadUpdateResponse = Thread::find($thread_id)->update($data);
            DB::commit();
            return response()->noContent();
        } catch (\Exception $e) {
            // エラー処理
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // 削除処理
    public function deleteThread(Request $request)
    {
        DB::beginTransaction(); // トランザクションを開始
        try {
            $thread_id = $request->route('id');
            // スレッドに関連する画像ファイルを削除
            $threadImages = ThreadImage::where('thread_id', $thread_id)->get();
            foreach ($threadImages as $threadImage) {
                $imagePath = $threadImage->path;
                Storage::disk('s3')->delete($imagePath);
            }
            // アイテムに関連する画像ファイルを削除
            $items = Item::where('thread_id', $thread_id)->get();
            foreach ($items as $item) {
                $itemImages = $item->itemImages()->get();
                foreach ($itemImages as $itemImage) {
                    $imagePath = $itemImage->path;
                    Storage::disk('s3')->delete($imagePath);
                }
            }
            $threadDeleteResponse = Thread::find($thread_id)->delete();
            DB::commit();
            return response()->noContent();
        } catch (\Exception $e) {
            // エラー処理
            Log::debug($e);
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
