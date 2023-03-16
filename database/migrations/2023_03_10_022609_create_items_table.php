<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title');
            $table->string('text');
            $table->integer('price'); //価格
            $table->boolean('gender'); // 0 man, 1 woman
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete(); // カテゴリ
            $table->string('color')->nullable(); // 色
            $table->string('size')->nullable(); //サイズ
            $table->string('condition'); // 洋服の状態(選択)
            $table->string('days'); // 発送までの日数(選択)
            $table->boolean('sale')->default(true); // 販売中or売切
            $table->boolean('postage')->default(true); // 送料込みor着払い
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
