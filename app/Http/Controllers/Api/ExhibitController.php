<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Thread;
use App\Models\ThreadImage;
use App\Models\Item;
use App\Models\ItemImage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExhibitController extends Controller
{
    // 出品ページで使用するカテゴリ一覧を返す処理
    public function categories(Request $request)
    {
        $data = Category::get();
        return response()->json($data);
    }

    // 出品処理
    public function exhibit(Request $request)
    {
        // threadsに保存する情報
        $thread = $request->input('thread');
        $threadResponse = Thread::create($thread);

        // thread_imagesに保存する情報
        $threadImages = $request->file('threadImages');
        foreach ($threadImages as $threadImage) {
            $filename = uniqid() . '.' . $threadImage->getClientOriginalExtension(); // 画像ファイルにユニークな名前をつける + 拡張子
            $store = $threadImage->storeAs('storage/thread_images', $filename, 'public');
            $path = '/' . $store;
            $threadImageData = [
                'thread_id' => $threadResponse->id,
                'path' => $path,
                'original_file_name' => $filename,
            ];
            $threadImagesResponse = ThreadImage::create($threadImageData);
        }

        // itemsとitem_imagesに保存する情報
        $items = $request->input('items');
        $itemImages = $request->file('items');
        foreach ($items as $key => $item) { // $itemsにpostで送られてきたファイルを格納
            $items[$key]['images'] = $itemImages[$key]['images'];
        }

        foreach ($items as $item) {
            $itemData = [
                'thread_id' => $threadResponse->id,
                'user_id' => Auth::id(),
                'title' => $item['title'],
                'text' => $item['text'],
                'price' => $item['price'],
                'gender' => $item['gender'],
                'category_id' => $item['category_id'],
                'color' => $item['color'],
                'size' => $item['size'],
                'condition' => $item['condition'],
                'days' => $item['days'],
                'postage' => $item['postage'],
            ];
            $itemResponse = Item::create($itemData);
            Log::debug($itemResponse);
        }




        // Log::debug($thread); // 確認用
        // Log::debug($threadResponse); // 確認用
        // Log::debug($threadImages); // 確認用
        // Log::debug($threadImagesResponse); // 確認用
        // Log::debug($items); // 確認用
    }
}
