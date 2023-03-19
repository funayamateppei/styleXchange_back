<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('categories')->insert([
            ['name' => 'トップス', 'parent' => '1', 'gender' => '2', 'big_category' => true, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ジャケット/アウター', 'parent' => '2', 'gender' => '2', 'big_category' => true, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'パンツ', 'parent' => '3', 'gender' => '2', 'big_category' => true, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'スカート', 'parent' => '4', 'gender' => '0', 'big_category' => true, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ワンピース', 'parent' => '5', 'gender' => '0', 'big_category' => true, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => '靴', 'parent' => '6', 'gender' => '2', 'big_category' => true, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'バッグ', 'parent' => '7', 'gender' => '2', 'big_category' => true, 'sort_number' => 7, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => '帽子', 'parent' => '8', 'gender' => '2', 'big_category' => true, 'sort_number' => 8, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'アクセサリー', 'parent' => '9', 'gender' => '2', 'big_category' => true, 'sort_number' => 9, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => '小物', 'parent' => '10', 'gender' => '2', 'big_category' => true, 'sort_number' => 10, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'スーツ', 'parent' => '11', 'gender' => '1', 'big_category' => true, 'sort_number' => 11, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'スーツ/フォーマル/ドレス', 'parent' => '12', 'gender' => '0', 'big_category' => true, 'sort_number' => 12, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // トップス
            ['name' => 'Tシャツ(半袖/袖なし)', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ロンT(七分/長袖)', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'シャツ', 'parent' => '1', 'gender' => '1', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'シャツ/ブラウス(半袖/袖なし)', 'parent' => '1', 'gender' => '0', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'シャツ/ブラウス(七分/長袖)', 'parent' => '1', 'gender' => '0', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ポロシャツ', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'タンクトップ', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 7, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ニット/セーター', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 8, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'パーカー', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 9, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'カーディガン', 'parent' => '1', 'gender' => '1', 'big_category' => false, 'sort_number' => 10, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'カーディガン/ボレロ', 'parent' => '1', 'gender' => '0', 'big_category' => false, 'sort_number' => 11, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'トレーナー/スウェット', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 12, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ジャージ', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 13, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ベスト', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 14, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '1', 'gender' => '2', 'big_category' => false, 'sort_number' => 15, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // ジャケット/アウター
            ['name' => 'テーラードジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ノーカラージャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'Gジャン/デニムジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'レザージャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ダウンジャケット/ダウンベスト', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ライダースジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ミリタリージャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 7, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ナイロンジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 8, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'フライトジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 9, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ダッフルコート', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 10, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ピーコート', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 11, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ステンカラーコート', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 12, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'トレンチコート', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 13, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'モッズコート', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 14, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'チェスターコート', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 15, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'スタジャン', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 16, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'スカジャン', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 17, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ブルゾン', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 18, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'マウンテンパーカー', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 19, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ポンチョ', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 20, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '2', 'gender' => '2', 'big_category' => false, 'sort_number' => 21, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // パンツ
            ['name' => 'デニム/ジーンズ', 'parent' => '3', 'gender' => '2', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ショートパンツ', 'parent' => '3', 'gender' => '2', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'カジュアルパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ハーフパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ワークパンツ/カーゴパンツ', 'parent' => '3', 'gender' => '2', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'スラックス', 'parent' => '3', 'gender' => '1', 'big_category' => false, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'チノパン', 'parent' => '3', 'gender' => '2', 'big_category' => false, 'sort_number' => 7, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ペインターパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false, 'sort_number' => 8, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'サルエルパンツ', 'parent' => '3', 'gender' => '2', 'big_category' => false, 'sort_number' => 9, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'オーバーオール', 'parent' => '3', 'gender' => '1', 'big_category' => false, 'sort_number' => 10, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'オーバーオール/サロペット', 'parent' => '3', 'gender' => '0', 'big_category' => false, 'sort_number' => 11, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'クロップドパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false, 'sort_number' => 12, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ガウチョパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false, 'sort_number' => 13, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '3', 'gender' => '2', 'big_category' => false, 'sort_number' => 14, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // スカート
            ['name' => 'ミニスカート', 'parent' => '4', 'gender' => '0', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ひざ丈スカート', 'parent' => '4', 'gender' => '0', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ロングスカート', 'parent' => '4', 'gender' => '0', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'キュロット', 'parent' => '4', 'gender' => '0', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '4', 'gender' => '0', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // ワンピース
            ['name' => 'ミニワンピース', 'parent' => '5', 'gender' => '0', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ひざ丈ワンピース', 'parent' => '5', 'gender' => '0', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ロングワンピース', 'parent' => '5', 'gender' => '0', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '5', 'gender' => '0', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // 靴
            ['name' => 'スニーカー', 'parent' => '6', 'gender' => '2', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'サンダル', 'parent' => '6', 'gender' => '2', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ブーツ', 'parent' => '6', 'gender' => '2', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'モカシン', 'parent' => '6', 'gender' => '2', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ローファー/革靴', 'parent' => '6', 'gender' => '2', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'デッキシューズ', 'parent' => '6', 'gender' => '1', 'big_category' => false, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ドレス/ビジネス', 'parent' => '6', 'gender' => '2', 'big_category' => false, 'sort_number' => 7, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ハイヒール/パンプス', 'parent' => '6', 'gender' => '0', 'big_category' => false, 'sort_number' => 8, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ミュール', 'parent' => '6', 'gender' => '0', 'big_category' => false, 'sort_number' => 9, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'フラットシューズ/バレエシューズ', 'parent' => '6', 'gender' => '0', 'big_category' => false, 'sort_number' => 10, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '6', 'gender' => '2', 'big_category' => false, 'sort_number' => 11, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // バッグ
            ['name' => 'ショルダーバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'トートバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ボストンバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'リュック/バックパック', 'parent' => '7', 'gender' => '2', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ウエストポーチ/サコッシュ', 'parent' => '7', 'gender' => '2', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ボディバッグ/ウェストバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'クラッチバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false, 'sort_number' => 7, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'トラベルバッグ', 'parent' => '7', 'gender' => '1', 'big_category' => false, 'sort_number' => 8, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ポーチ/バニティ', 'parent' => '7', 'gender' => '0', 'big_category' => false, 'sort_number' => 9, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'メッセンジャーバッグ', 'parent' => '7', 'gender' => '0', 'big_category' => false, 'sort_number' => 10, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '7', 'gender' => '2', 'big_category' => false, 'sort_number' => 11, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // 帽子
            ['name' => 'キャップ', 'parent' => '8', 'gender' => '2', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ハット', 'parent' => '8', 'gender' => '2', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ニットキャップ/ビーニー', 'parent' => '8', 'gender' => '2', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ハンチング/ベレー帽', 'parent' => '8', 'gender' => '2', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'キャスケット', 'parent' => '8', 'gender' => '2', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '8', 'gender' => '2', 'big_category' => false, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // アクセサリー
            ['name' => 'ネックレス', 'parent' => '9', 'gender' => '2', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ブレスレット', 'parent' => '9', 'gender' => '2', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'バングル', 'parent' => '9', 'gender' => '2', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'リング', 'parent' => '9', 'gender' => '2', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ピアス', 'parent' => '9', 'gender' => '2', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'アンクレット', 'parent' => '9', 'gender' => '2', 'big_category' => false, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'イヤリング', 'parent' => '9', 'gender' => '0', 'big_category' => false, 'sort_number' => 7, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ブローチ/コサージュ', 'parent' => '9', 'gender' => '0', 'big_category' => false, 'sort_number' => 8, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'チャーム', 'parent' => '9', 'gender' => '0', 'big_category' => false, 'sort_number' => 9, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '9', 'gender' => '2', 'big_category' => false, 'sort_number' => 10, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // 小物
            ['name' => 'バンダナ/スカーフ', 'parent' => '10', 'gender' => '2', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ネクタイ', 'parent' => '10', 'gender' => '2', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => '手袋', 'parent' => '10', 'gender' => '2', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'マフラー', 'parent' => '10', 'gender' => '2', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ストール', 'parent' => '10', 'gender' => '2', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ベルト', 'parent' => '10', 'gender' => '2', 'big_category' => false, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ウォレットチェーン', 'parent' => '10', 'gender' => '2', 'big_category' => false, 'sort_number' => 7, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '10', 'gender' => '2', 'big_category' => false, 'sort_number' => 8, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // スーツ
            ['name' => 'スーツジャケット', 'parent' => '11', 'gender' => '1', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'スーツベスト', 'parent' => '11', 'gender' => '1', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'スラックス', 'parent' => '11', 'gender' => '1', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'セットアップ', 'parent' => '11', 'gender' => '1', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '11', 'gender' => '1', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],

            // スーツ/フォーマル/ドレス
            ['name' => 'スカートスーツ上下', 'parent' => '12', 'gender' => '0', 'big_category' => false, 'sort_number' => 1, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'パンツスーツ上下', 'parent' => '12', 'gender' => '0', 'big_category' => false, 'sort_number' => 2, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ドレス', 'parent' => '12', 'gender' => '0', 'big_category' => false, 'sort_number' => 3, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'シューズ', 'parent' => '12', 'gender' => '0', 'big_category' => false, 'sort_number' => 4, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'ウェディング', 'parent' => '12', 'gender' => '0', 'big_category' => false, 'sort_number' => 5, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
            ['name' => 'その他', 'parent' => '12', 'gender' => '0', 'big_category' => false, 'sort_number' => 6, 'created_at' => $now, 'updated_at' => $now, 'deleted_at' => null],
        ]);
    }
}
