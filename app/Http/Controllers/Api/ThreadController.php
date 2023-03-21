<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Thread;

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
        $data = Thread::with(['user', 'items.itemImages', 'threadImages', 'threadComments', 'likedThreads', 'bookmarkedThreads'])
            ->find($id);
        return response()->json($data);
    }
}
