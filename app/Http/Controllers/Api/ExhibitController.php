<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
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
        $data = $request->all();
        Log::debug($data);
    }
}
