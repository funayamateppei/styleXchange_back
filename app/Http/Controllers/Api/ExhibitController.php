<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Thread;
use App\Models\ThreadImage;
use App\Models\Item;
use App\Models\ItemImage;

use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        // Log::debug($request);
        try {
            // threadsにデータを保存する
            $thread = $request->input('thread'); // threadsに保存する情報
            $threadResponse = Thread::create($thread);

            // thread_imagesにthreadsに保存したデータと紐づいた情報を保存する
            $threadImages = $request->file('threadImages'); // thread_imagesに保存する情報
            foreach ($threadImages as $threadImage) {
                $filename = uniqid() . '.' . $threadImage->getClientOriginalExtension();
                $path = $threadImage->storeAs('thread_images', $filename, 's3');
                $threadImageData = [
                    'thread_id' => $threadResponse->id,
                    'path' => $path,
                    'original_file_name' => $filename,
                ];
                $threadImagesResponse = ThreadImage::create($threadImageData);
            }

            // itemsにthreadsに保存したデータと紐づいた情報を保存する/item_imagesにitemsに保存したデータと紐づいた情報を保存する
            $items = $request->input('items'); // itemsとitem_imagesに保存する情報
            $itemImages = $request->file('items');
            foreach ($items as $key => $item) { // $itemsにpostで送られてきたファイルを格納
                $items[$key]['images'] = $itemImages[$key]['images'];
            }

            // itemsにthreadsに保存したデータと紐づいた情報を保存する処理
            foreach ($items as $item) {
                $itemData = [
                    'thread_id' => $threadResponse->id,
                    'user_id' => Auth::id(),
                    'title' => $item['title'],
                    'text' => $item['text'] ?? '',
                    'price' => $item['price'],
                    'gender' => $item['gender'],
                    'category_id' => $item['category_id'],
                    'color' => $item['color'] ?? '',
                    'size' => $item['size'],
                    'condition' => $item['condition'],
                    'days' => $item['days'],
                    'postage' => $item['postage'],
                    'url' => $item['url'],
                ];
                $itemResponse = Item::create($itemData);

                // item_imagesにitemsに保存したデータと紐づいた情報を保存する処理
                foreach ($item['images'] as $itemImage) {
                    $filename = uniqid() . '.' . $itemImage->getClientOriginalExtension();
                    $path = $itemImage->storeAs('item_images', $filename, 's3');
                    $itemImageData = [
                        'item_id' => $itemResponse->id,
                        'path' => $path,
                        'original_file_name' => $filename,
                    ];
                    $itemImageResponse = ItemImage::create($itemImageData);
                }
            }
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
