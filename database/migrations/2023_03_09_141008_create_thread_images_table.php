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
        Schema::create('thread_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('path', 255);
            $table->string('original_file_name', 255);
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
        Schema::dropIfExists('thread_images');
    }
};
