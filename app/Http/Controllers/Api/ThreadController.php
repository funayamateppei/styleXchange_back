<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Thread;
use App\Models\ThreadComment;

class ThreadController extends Controller
{
    public function getThreadIds(Request $request)
    {
        $data = Thread::orderBy('created_at', 'desc')->get();
        return response()->json($data);
    }

    public function getThread(Request $request)
    {
        $id = $request['id'];
        $data = Thread::with(['user.threads.threadImages', 'items.itemImages', 'threadImages', 'threadComments.user', 'likedThreads', 'bookmarkedThreads'])
            ->find($id);
        return response()->json($data);
    }

    public function getThreadComments(Request $request)
    {
        $id = $request['id'];
        $threadData = Thread::find($id);
        $commentData = ThreadComment::with('user')
            ->where('thread_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'threadData' => $threadData,
            'commentData' => $commentData,
        ];
        return response()->json($data);
    }
}
