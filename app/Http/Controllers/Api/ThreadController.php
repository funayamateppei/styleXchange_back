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
}
