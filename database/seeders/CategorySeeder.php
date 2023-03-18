<?php

namespace Database\Seeders;

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
        DB::table('categories')->insert([
            ['name' => 'トップス', 'parent' => '1', 'gender' => '2', 'big_category' => true],
            ['name' => 'ジャケット/アウター', 'parent' => '2', 'gender' => '2', 'big_category' => true],
            ['name' => 'パンツ', 'parent' => '3', 'gender' => '2', 'big_category' => true],
            ['name' => 'スカート', 'parent' => '4', 'gender' => '0', 'big_category' => true],
            ['name' => 'ワンピース', 'parent' => '5', 'gender' => '0', 'big_category' => true],
            ['name' => '靴', 'parent' => '6', 'gender' => '2', 'big_category' => true],
            ['name' => 'バッグ', 'parent' => '7', 'gender' => '2', 'big_category' => true],
            ['name' => '帽子', 'parent' => '8', 'gender' => '2', 'big_category' => true],
            ['name' => 'アクセサリー', 'parent' => '9', 'gender' => '2', 'big_category' => true],
            ['name' => '小物', 'parent' => '10', 'gender' => '2', 'big_category' => true],
            ['name' => 'スーツ', 'parent' => '11', 'gender' => '1', 'big_category' => true],
            ['name' => 'スーツ/フォーマル/ドレス', 'parent' => '12', 'gender' => '0', 'big_category' => true],

            // トップス
            ['name' => 'Tシャツ(半袖/袖なし)', 'parent' => '1', 'gender' => '2', 'big_category' => false],
            ['name' => 'ロンT(七分/長袖)', 'parent' => '1', 'gender' => '2', 'big_category' => false],
            ['name' => 'シャツ', 'parent' => '1', 'gender' => '1', 'big_category' => false],
            ['name' => 'シャツ/ブラウス(半袖/袖なし)', 'parent' => '1', 'gender' => '0', 'big_category' => false],
            ['name' => 'シャツ/ブラウス(七分/長袖)', 'parent' => '1', 'gender' => '0', 'big_category' => false],
            ['name' => 'ポロシャツ', 'parent' => '1', 'gender' => '2', 'big_category' => false],
            ['name' => 'タンクトップ', 'parent' => '1', 'gender' => '2', 'big_category' => false],
            ['name' => 'ニット/セーター', 'parent' => '1', 'gender' => '2', 'big_category' => false],
            ['name' => 'パーカー', 'parent' => '1', 'gender' => '2', 'big_category' => false],
            ['name' => 'カーディガン', 'parent' => '1', 'gender' => '1', 'big_category' => false],
            ['name' => 'カーディガン/ボレロ', 'parent' => '1', 'gender' => '0', 'big_category' => false],
            ['name' => 'トレーナー/スウェット', 'parent' => '1', 'gender' => '2', 'big_category' => false],
            ['name' => 'ジャージ', 'parent' => '1', 'gender' => '2', 'big_category' => false],
            ['name' => 'ベスト', 'parent' => '1', 'gender' => '2', 'big_category' => false],
            ['name' => 'その他', 'parent' => '1', 'gender' => '2', 'big_category' => false],

            // ジャケット/アウター
            ['name' => 'テーラードジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ノーカラージャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'Gジャン/デニムジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'レザージャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ダウンジャケット/ダウンベスト', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ライダースジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ミリタリージャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ナイロンジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'フライトジャケット', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ダッフルコート', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ピーコート', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ステンカラーコート', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'トレンチコート', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'モッズコート', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'チェスターコート', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'スタジャン', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'スカジャン', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ブルゾン', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'マウンテンパーカー', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'ポンチョ', 'parent' => '2', 'gender' => '2', 'big_category' => false],
            ['name' => 'その他', 'parent' => '2', 'gender' => '2', 'big_category' => false],

            // パンツ
            ['name' => 'デニム/ジーンズ', 'parent' => '3', 'gender' => '2', 'big_category' => false],
            ['name' => 'ショートパンツ', 'parent' => '3', 'gender' => '2', 'big_category' => false],
            ['name' => 'カジュアルパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false],
            ['name' => 'ハーフパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false],
            ['name' => 'ワークパンツ/カーゴパンツ', 'parent' => '3', 'gender' => '2', 'big_category' => false],
            ['name' => 'スラックス', 'parent' => '3', 'gender' => '1', 'big_category' => false],
            ['name' => 'チノパン', 'parent' => '3', 'gender' => '2', 'big_category' => false],
            ['name' => 'ペインターパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false],
            ['name' => 'サルエルパンツ', 'parent' => '3', 'gender' => '2', 'big_category' => false],
            ['name' => 'オーバーオール', 'parent' => '3', 'gender' => '1', 'big_category' => false],
            ['name' => 'オーバーオール/サロペット', 'parent' => '3', 'gender' => '0', 'big_category' => false],
            ['name' => 'クロップドパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false],
            ['name' => 'ガウチョパンツ', 'parent' => '3', 'gender' => '0', 'big_category' => false],
            ['name' => 'その他', 'parent' => '3', 'gender' => '2', 'big_category' => false],

            // スカート
            ['name' => 'ミニスカート', 'parent' => '4', 'gender' => '0', 'big_category' => false],
            ['name' => 'ひざ丈スカート', 'parent' => '4', 'gender' => '0', 'big_category' => false],
            ['name' => 'ロングスカート', 'parent' => '4', 'gender' => '0', 'big_category' => false],
            ['name' => 'キュロット', 'parent' => '4', 'gender' => '0', 'big_category' => false],
            ['name' => 'その他', 'parent' => '4', 'gender' => '0', 'big_category' => false],

            // ワンピース
            ['name' => 'ミニワンピース', 'parent' => '5', 'gender' => '0', 'big_category' => false],
            ['name' => 'ひざ丈ワンピース', 'parent' => '5', 'gender' => '0', 'big_category' => false],
            ['name' => 'ロングワンピース', 'parent' => '5', 'gender' => '0', 'big_category' => false],
            ['name' => 'その他', 'parent' => '5', 'gender' => '0', 'big_category' => false],

            // 靴
            ['name' => 'スニーカー', 'parent' => '6', 'gender' => '2', 'big_category' => false],
            ['name' => 'サンダル', 'parent' => '6', 'gender' => '2', 'big_category' => false],
            ['name' => 'ブーツ', 'parent' => '6', 'gender' => '2', 'big_category' => false],
            ['name' => 'モカシン', 'parent' => '6', 'gender' => '2', 'big_category' => false],
            ['name' => 'ローファー/革靴', 'parent' => '6', 'gender' => '2', 'big_category' => false],
            ['name' => 'デッキシューズ', 'parent' => '6', 'gender' => '1', 'big_category' => false],
            ['name' => 'ドレス/ビジネス', 'parent' => '6', 'gender' => '2', 'big_category' => false],
            ['name' => 'ハイヒール/パンプス', 'parent' => '6', 'gender' => '0', 'big_category' => false],
            ['name' => 'ミュール', 'parent' => '6', 'gender' => '0', 'big_category' => false],
            ['name' => 'フラットシューズ/バレエシューズ', 'parent' => '6', 'gender' => '0', 'big_category' => false],
            ['name' => 'その他', 'parent' => '6', 'gender' => '2', 'big_category' => false],

            // バッグ
            ['name' => 'ショルダーバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false],
            ['name' => 'トートバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false],
            ['name' => 'ボストンバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false],
            ['name' => 'リュック/バックパック', 'parent' => '7', 'gender' => '2', 'big_category' => false],
            ['name' => 'ウエストポーチ/サコッシュ', 'parent' => '7', 'gender' => '2', 'big_category' => false],
            ['name' => 'ボディバッグ/ウェストバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false],
            ['name' => 'クラッチバッグ', 'parent' => '7', 'gender' => '2', 'big_category' => false],
            ['name' => 'トラベルバッグ', 'parent' => '7', 'gender' => '1', 'big_category' => false],
            ['name' => 'ポーチ/バニティ', 'parent' => '7', 'gender' => '0', 'big_category' => false],
            ['name' => 'メッセンジャーバッグ', 'parent' => '7', 'gender' => '0', 'big_category' => false],
            ['name' => 'その他', 'parent' => '7', 'gender' => '2', 'big_category' => false],

            // 帽子
            ['name' => 'キャップ', 'parent' => '8', 'gender' => '2', 'big_category' => false],
            ['name' => 'ハット', 'parent' => '8', 'gender' => '2', 'big_category' => false],
            ['name' => 'ニットキャップ/ビーニー', 'parent' => '8', 'gender' => '2', 'big_category' => false],
            ['name' => 'ハンチング/ベレー帽', 'parent' => '8', 'gender' => '2', 'big_category' => false],
            ['name' => 'キャスケット', 'parent' => '8', 'gender' => '2', 'big_category' => false],
            ['name' => 'その他', 'parent' => '8', 'gender' => '2', 'big_category' => false],

            // アクセサリー
            ['name' => 'ネックレス', 'parent' => '9', 'gender'=> '2', 'big_category' => false],
            ['name' => 'ブレスレット', 'parent' => '9', 'gender'=> '2', 'big_category' => false],
            ['name' => 'バングル', 'parent' => '9', 'gender'=> '2', 'big_category' => false],
            ['name' => 'リング', 'parent' => '9', 'gender'=> '2', 'big_category' => false],
            ['name' => 'ピアス', 'parent' => '9', 'gender'=> '2', 'big_category' => false],
            ['name' => 'アンクレット', 'parent' => '9', 'gender'=> '2', 'big_category' => false],
            ['name' => 'イヤリング', 'parent' => '9', 'gender' => '0', 'big_category' => false],
            ['name' => 'ブローチ/コサージュ', 'parent' => '9', 'gender' => '0', 'big_category' => false],
            ['name' => 'チャーム', 'parent' => '9', 'gender' => '0', 'big_category' => false],
            ['name' => 'その他', 'parent' => '9', 'gender'=> '2', 'big_category' => false],

            // 小物
            ['name' => 'バンダナ/スカーフ', 'parent' => '10', 'gender' => '2', 'big_category' => false],
            ['name' => 'ネクタイ', 'parent' => '10', 'gender' => '2', 'big_category' => false],
            ['name' => '手袋', 'parent' => '10', 'gender' => '2', 'big_category' => false],
            ['name' => 'マフラー', 'parent' => '10', 'gender' => '2', 'big_category' => false],
            ['name' => 'ストール', 'parent' => '10', 'gender' => '2', 'big_category' => false],
            ['name' => 'ベルト', 'parent' => '10', 'gender' => '2', 'big_category' => false],
            ['name' => 'ウォレットチェーン', 'parent' => '10', 'gender' => '2', 'big_category' => false],
            ['name' => 'その他', 'parent' => '10', 'gender' => '2', 'big_category' => false],

            // スーツ
            ['name' => 'スーツジャケット', 'parent' => '11', 'gender' => '1', 'big_category' => false],
            ['name' => 'スーツベスト', 'parent' => '11', 'gender' => '1', 'big_category' => false],
            ['name' => 'スラックス', 'parent' => '11', 'gender' => '1', 'big_category' => false],
            ['name' => 'セットアップ', 'parent' => '11', 'gender' => '1', 'big_category' => false],
            ['name' => 'その他', 'parent' => '11', 'gender' => '1', 'big_category' => false],

            // スーツ/フォーマル/ドレス
            ['name' => 'スカートスーツ上下', 'parent' => '12', 'gender' => '0', 'big_category' => false],
            ['name' => 'パンツスーツ上下', 'parent' => '12', 'gender' => '0', 'big_category' => false],
            ['name' => 'ドレス', 'parent' => '12', 'gender' => '0', 'big_category' => false],
            ['name' => 'シューズ', 'parent' => '12', 'gender' => '0', 'big_category' => false],
            ['name' => 'ウェディング', 'parent' => '12', 'gender' => '0', 'big_category' => false],
            ['name' => 'その他', 'parent' => '12', 'gender' => '0', 'big_category' => false],


            // // メンズ
            // ['name' => 'トップス', 'parent' => '1'],
            // ['name' => 'ジャケット/アウター', 'parent' => '2'],
            // ['name' => 'パンツ', 'parent' => '3'],
            // ['name' => '靴', 'parent' => '1/4'],
            // ['name' => 'バッグ', 'parent' => '1/5'],
            // ['name' => 'スーツ', 'parent' => '1/6'],
            // ['name' => '帽子', 'parent' => '1/7'],
            // ['name' => 'アクセサリー', 'parent' => '1/8'],
            // ['name' => '小物', 'parent' => '1/9'],
            // ['name' => 'その他', 'parent' => '1/0'],
            // // レディース
            // ['name' => 'トップス', 'parent' => '2/1'],
            // ['name' => 'ジャケット/アウター', 'parent' => '2/2'],
            // ['name' => 'パンツ', 'parent' => '2/3'],
            // ['name' => 'スカート', 'parent' => '2/4'],
            // ['name' => 'ワンピース', 'parent' => '2/5'],
            // ['name' => '靴', 'parent' => '2/6'],
            // ['name' => 'バッグ', 'parent' => '2/7'],
            // ['name' => '帽子', 'parent' => '2/8'],
            // ['name' => 'アクセサリー', 'parent' => '2/9'],
            // ['name' => '小物', 'parent' => '2/10'],
            // ['name' => 'スーツ/フォーマル/ドレス', 'parent' => '2/13'],
            // ['name' => 'その他', 'parent' => '2/0'],

            // 小分類
            // メンズ/トップス
            // ['name' => 'Tシャツ(半袖/袖なし)', 'parent' => '1/1/1'],
            // ['name' => 'ロンT(七分/長袖)', 'parent' => '1/1/2'],
            // ['name' => 'シャツ', 'parent' => '1/1/3'],
            // ['name' => 'ポロシャツ', 'parent' => '1/1/4'],
            // ['name' => 'タンクトップ', 'parent' => '1/1/5'],
            // ['name' => 'ニット/セーター', 'parent' => '1/1/6'],
            // ['name' => 'パーカー', 'parent' => '1/1/7'],
            // ['name' => 'カーディガン', 'parent' => '1/1/8'],
            // ['name' => 'トレーナー/スウェット', 'parent' => '1/1/9'],
            // ['name' => 'ジャージ', 'parent' => '1/1/10'],
            // ['name' => 'ベスト', 'parent' => '1/1/11'],
            // ['name' => 'その他', 'parent' => '1/1/0'],

            // メンズ/ジャケット/アウター
            // ['name' => 'テーラードジャケット', 'parent' => '1/2/1'],
            // ['name' => 'ノーカラージャケット', 'parent' => '1/2/2'],
            // ['name' => 'Gジャン/デニムジャケット', 'parent' => '1/2/3'],
            // ['name' => 'レザージャケット', 'parent' => '1/2/4'],
            // ['name' => 'ダウンジャケット/ダウンベスト', 'parent' => '1/2/5'],
            // ['name' => 'ライダースジャケット', 'parent' => '1/2/6'],
            // ['name' => 'ミリタリージャケット', 'parent' => '1/2/7'],
            // ['name' => 'ナイロンジャケット', 'parent' => '1/2/8'],
            // ['name' => 'フライトジャケット', 'parent' => '1/2/9'],
            // ['name' => 'ダッフルコート', 'parent' => '1/2/10'],
            // ['name' => 'ピーコート', 'parent' => '1/2/11'],
            // ['name' => 'ステンカラーコート', 'parent' => '1/2/12'],
            // ['name' => 'ステンカラーコート', 'parent' => '1/2/13'],
            // ['name' => 'トレンチコート', 'parent' => '1/2/14'],
            // ['name' => 'モッズコート', 'parent' => '1/2/15'],
            // ['name' => 'チェスターコート', 'parent' => '1/2/16'],
            // ['name' => 'スタジャン', 'parent' => '1/2/17'],
            // ['name' => 'スカジャン', 'parent' => '1/2/18'],
            // ['name' => 'ブルゾン', 'parent' => '1/2/19'],
            // ['name' => 'マウンテンパーカー', 'parent' => '1/2/20'],
            // ['name' => 'ポンチョ', 'parent' => '1/2/21'],
            // ['name' => 'その他', 'parent' => '1/2/0'],

            // メンズ/パンツ
            // ['name' => 'デニム/ジーンズ', 'parent' => '1/3/1'],
            // ['name' => 'ワークパンツ/カーゴパンツ', 'parent' => '1/3/2'],
            // ['name' => 'スラックス', 'parent' => '1/3/3'],
            // ['name' => 'チノパン', 'parent' => '1/3/4'],
            // ['name' => 'ショートパンツ', 'parent' => '1/3/5'],
            // ['name' => 'ペインターパンツ', 'parent' => '1/3/6'],
            // ['name' => 'サルエルパンツ', 'parent' => '1/3/7'],
            // ['name' => 'オーバーオール', 'parent' => '1/3/8'],
            // ['name' => 'その他', 'parent' => '1/3/0'],

            // メンズ/靴
            // ['name' => 'スニーカー', 'parent' => '1/4/1'],
            // ['name' => 'サンダル', 'parent' => '1/4/2'],
            // ['name' => 'ブーツ', 'parent' => '1/4/3'],
            // ['name' => 'モカシン', 'parent' => '1/4/4'],
            // ['name' => 'ドレス/ビジネス', 'parent' => '1/4/5'],
            // ['name' => 'デッキシューズ', 'parent' => '1/4/6'],
            // ['name' => 'その他', 'parent' => '1/4/0'],

            // メンズ/バッグ
            // ['name' => 'ショルダーバッグ', 'parent' => '1/5/1'],
            // ['name' => 'トートバッグ', 'parent' => '1/5/2'],
            // ['name' => 'ボストンバッグ', 'parent' => '1/5/3'],
            // ['name' => 'リュック/バックパック', 'parent' => '1/5/4'],
            // ['name' => 'ウエストポーチ/サコッシュ', 'parent' => '1/5/5'],
            // ['name' => 'トラベルバッグ', 'parent' => '1/5/6'],
            // ['name' => 'その他', 'parent' => '1/5/0'],

            // メンズ/スーツ
            // ['name' => 'スーツジャケット', 'parent' => '1/6/1'],
            // ['name' => 'スーツベスト', 'parent' => '1/6/2'],
            // ['name' => 'スラックス', 'parent' => '1/6/3'],
            // ['name' => 'セットアップ', 'parent' => '1/6/5'],
            // ['name' => 'その他', 'parent' => '1/6/0'],

            // メンズ/帽子
            // ['name' => 'キャップ', 'parent' => '1/7/1'],
            // ['name' => 'ハット', 'parent' => '1/7/2'],
            // ['name' => 'ハットキャップ/ビーニー', 'parent' => '1/7/3'],
            // ['name' => 'ハンチング/ベレー帽', 'parent' => '1/7/4'],
            // ['name' => 'キャスケット', 'parent' => '1/7/5'],
            // ['name' => 'その他', 'parent' => '1/7/0'],

            // メンズ/アクセサリー
            // ['name' => 'ネックレス', 'parent' => '1/8/1'],
            // ['name' => 'ブレスレット', 'parent' => '1/8/2'],
            // ['name' => 'バングル', 'parent' => '1/8/3'],
            // ['name' => 'リング', 'parent' => '1/8/4'],
            // ['name' => 'ピアス', 'parent' => '1/8/5'],
            // ['name' => 'アンクレット', 'parent' => '1/8/6'],
            // ['name' => 'その他', 'parent' => '1/8/0'],

            // メンズ/小物
            // ['name' => 'バンダナ', 'parent' => '1/9/1'],
            // ['name' => 'ネクタイ', 'parent' => '1/9/2'],
            // ['name' => '手袋', 'parent' => '1/9/3'],
            // ['name' => 'マフラー', 'parent' => '1/9/4'],
            // ['name' => 'ストール', 'parent' => '1/9/5'],
            // ['name' => 'ベルト', 'parent' => '1/9/6'],
            // ['name' => 'ウォレットチェーン', 'parent' => '1/9/7'],
            // ['name' => 'その他', 'parent' => '1/9/0'],

            // ------------------------------------------- //
            // レディース/トップス
            // ['name' => 'Tシャツ(半袖/袖なし)', 'parent' => '2/1/1'],
            // ['name' => 'ロンT(七分/長袖)', 'parent' => '2/1/2'],
            // ['name' => 'シャツ/ブラウス(半袖/袖なし)', 'parent' => '2/1/3'],
            // ['name' => 'シャツ/ブラウス(七分/長袖)', 'parent' => '2/1/4'],
            // ['name' => 'ポロシャツ', 'parent' => '2/1/5'],
            // ['name' => 'タンクトップ', 'parent' => '2/1/6'],
            // ['name' => 'ニット/セーター', 'parent' => '2/1/7'],
            // ['name' => 'パーカー', 'parent' => '2/1/8'],
            // ['name' => 'カーディガン/ボレロ', 'parent' => '2/1/9'],
            // ['name' => 'トレーナー/スウェット', 'parent' => '2/1/10'],
            // ['name' => 'ジャージ', 'parent' => '2/1/11'],
            // ['name' => 'ベスト', 'parent' => '2/1/12'],
            // ['name' => 'その他', 'parent' => '2/1/0'],

            // レディース/ジャケット/アウター
            // ['name' => 'テーラードジャケット', 'parent' => '2/2/1'],
            // ['name' => 'ノーカラージャケット', 'parent' => '2/2/2'],
            // ['name' => 'Gジャン/デニムジャケット', 'parent' => '2/2/3'],
            // ['name' => 'レザージャケット', 'parent' => '2/2/4'],
            // ['name' => 'ダウンジャケット/ダウンベスト', 'parent' => '2/2/5'],
            // ['name' => 'ライダースジャケット', 'parent' => '2/2/6'],
            // ['name' => 'ミリタリージャケット', 'parent' => '2/2/7'],
            // ['name' => 'ナイロンジャケット', 'parent' => '2/2/8'],
            // ['name' => 'フライトジャケット', 'parent' => '2/2/9'],
            // ['name' => 'ダッフルコート', 'parent' => '2/2/10'],
            // ['name' => 'ピーコート', 'parent' => '2/2/11'],
            // ['name' => 'ステンカラーコート', 'parent' => '2/2/12'],
            // ['name' => 'ステンカラーコート', 'parent' => '2/2/13'],
            // ['name' => 'トレンチコート', 'parent' => '2/2/14'],
            // ['name' => 'モッズコート', 'parent' => '2/2/15'],
            // ['name' => 'チェスターコート', 'parent' => '2/2/16'],
            // ['name' => 'スタジャン', 'parent' => '2/2/17'],
            // ['name' => 'スカジャン', 'parent' => '2/2/18'],
            // ['name' => 'ブルゾン', 'parent' => '2/2/19'],
            // ['name' => 'マウンテンパーカー', 'parent' => '2/2/20'],
            // ['name' => 'ポンチョ', 'parent' => '2/2/21'],
            // ['name' => 'その他', 'parent' => '2/2/0'],

            // レディース/パンツ
            // ['name' => 'デニム/ジーンズ', 'parent' => '2/3/1'],
            // ['name' => 'ショートパンツ', 'parent' => '2/3/2'],
            // ['name' => 'カジュアルパンツ', 'parent' => '2/3/3'],
            // ['name' => 'ハーフパンツ', 'parent' => '2/3/4'],
            // ['name' => 'ワークパンツ/カーゴパンツ', 'parent' => '2/3/5'],
            // ['name' => 'チノパン', 'parent' => '2/3/6'],
            // ['name' => 'クロップドパンツ', 'parent' => '2/3/7'],
            // ['name' => 'サルエルパンツ', 'parent' => '2/3/8'],
            // ['name' => 'オーバーオール/サロペット', 'parent' => '2/3/9'],
            // ['name' => 'ガウチョパンツ', 'parent' => '2/3/10'],
            // ['name' => 'その他', 'parent' => '1/3/0'],

            // // レディース/スカート
            // ['name' => 'ミニスカート', 'parent' => '2/4/1'],
            // ['name' => 'ひざ丈スカート', 'parent' => '2/4/1'],
            // ['name' => 'ロングスカート', 'parent' => '2/4/2'],
            // ['name' => 'キュロット', 'parent' => '2/4/3'],
            // ['name' => 'その他', 'parent' => '2/4/0'],

            // // レディース/ワンピース
            // ['name' => 'ミニワンピース', 'parent' => '2/5/1'],
            // ['name' => 'ひざ丈ワンピース', 'parent' => '2/5/2'],
            // ['name' => 'ロングワンピース', 'parent' => '2/5/3'],
            // ['name' => 'その他', 'parent' => '2/5/0'],

            // レディース/靴
            // ['name' => 'ハイヒール/パンプス', 'parent' => '2/6/1'],
            // ['name' => 'ブーツ', 'parent' => '2/6/2'],
            // ['name' => 'サンダル', 'parent' => '2/6/3'],
            // ['name' => 'スニーカー', 'parent' => '2/6/4'],
            // ['name' => 'ミュール', 'parent' => '2/6/5'],
            // ['name' => 'モカシン', 'parent' => '2/6/6'],
            // ['name' => 'ローファー/革靴', 'parent' => '2/6/7'],
            // ['name' => 'フラットシューズ/バレエシューズ', 'parent' => '2/6/8'],
            // ['name' => 'その他', 'parent' => '2/6/0'],

            // レディース/バッグ
            // ['name' => 'トートバッグ', 'parent' => '2/7/1'],
            // ['name' => 'リュック/バックパック', 'parent' => '2/7/2'],
            // ['name' => 'ボストンバッグ', 'parent' => '2/7/3'],
            // ['name' => 'ショルダーバッグ', 'parent' => '2/7/4'],
            // ['name' => 'クラッチバッグ', 'parent' => '2/7/5'],
            // ['name' => 'ポーチ/バニティ', 'parent' => '2/7/6'],
            // ['name' => 'ボディバッグ/ウェストバッグ', 'parent' => '2/7/7'],
            // ['name' => 'メッセンジャーバッグ', 'parent' => '2/7/8'],
            // ['name' => 'その他', 'parent' => '2/7/0'],

            // レディース/帽子
            // ['name' => 'ニットキャップ/ビーニー', 'parent' => '2/8/1'],
            // ['name' => 'ハット', 'parent' => '2/8/2'],
            // ['name' => 'ハンチング/ベレー帽', 'parent' => '2/8/3'],
            // ['name' => 'キャップ', 'parent' => '2/8/4'],
            // ['name' => 'キャスケット', 'parent' => '2/8/5'],
            // ['name' => 'その他', 'parent' => '2/8/0'],

            // レディース/アクセサリー
            // ['name' => 'ネックレス', 'parent' => '2/9/1'],
            // ['name' => 'ブレスレット', 'parent' => '2/9/2'],
            // ['name' => 'バングル', 'parent' => '2/9/3'],
            // ['name' => 'リング', 'parent' => '2/9/4'],
            // ['name' => 'ピアス', 'parent' => '2/9/5'],
            // ['name' => 'イヤリング', 'parent' => '2/9/6'],
            // ['name' => 'アンクレット', 'parent' => '2/9/7'],
            // ['name' => 'ブローチ/コサージュ', 'parent' => '2/9/8'],
            // ['name' => 'チャーム', 'parent' => '2/9/9'],
            // ['name' => 'その他', 'parent' => '2/9/0'],

            // レディース/小物
            // ['name' => '手袋/アームカバー', 'parent' => '2/10/1'],
            // ['name' => 'ベルト', 'parent' => '2/10/2'],
            // ['name' => 'マフラー/ショール', 'parent' => '2/10/3'],
            // ['name' => 'ストール/スヌード', 'parent' => '2/10/4'],
            // ['name' => 'バンダナ/スカーフ', 'parent' => '2/10/5'],
            // ['name' => 'その他', 'parent' => '2/10/0'],

            // レディース/スーツ/フォーマル/ドレス
            // ['name' => 'スカートスーツ上下', 'parent' => '2/13/1'],
            // ['name' => 'パンツスーツ上下', 'parent' => '2/13/2'],
            // ['name' => 'ドレス', 'parent' => '2/13/3'],
            // ['name' => 'シューズ', 'parent' => '2/13/4'],
            // ['name' => 'ウェディング', 'parent' => '2/13/5'],
            // ['name' => 'その他', 'parent' => '2/13/0'],
        ]);
    }
}
