<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Thread;
use App\Models\ThreadComment;

use Illuminate\Support\Facades\Auth;
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
        $threadData = Thread::find($id);
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
}
