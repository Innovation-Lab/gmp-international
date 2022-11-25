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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            $table->string('title')->length(100)->nullable()->comment('タイトル');
            $table->text('content')->nullable()->comment('本文');
            $table->tinyInteger('public')->default(1)->comment('公開フラグ(1:非公開:、 2:公開'); 
            $table->datetime('release_datetime')->nullable()->comment('公開日時');
            $table->string('image_path')->nullable()->comment('画像パス');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
