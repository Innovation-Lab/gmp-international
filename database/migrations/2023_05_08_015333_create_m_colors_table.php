<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->comment('カラー名');
            $table->string('alphabet_name', 50)->nullable()->comment('カラー名（英語表記）');
            $table->string('color', 50)->nullable()->comment('カラー');
            $table->string('second_color', 50)->nullable()->comment('カラー2');
            $table->string('image_path', 255)->nullable()->comment('カラー画像');
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
        Schema::dropIfExists('m_colors');
    }
}
