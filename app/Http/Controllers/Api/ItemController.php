<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\ItemComment;

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
        $data = Item::with(['user.items.itemImages', 'thread', 'itemImages', 'itemComments.user', 'likedItems', 'category'])
            ->find($id);
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
}
