<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('m_brand_id')->comment('ブランドID');
            $table->string('name', 255)->comment('商品名');
            $table->string('name_kana')->comment('商品名（カナ）');
            $table->string('color_array', 255)->nullable()->comment('カラー');
            $table->string('image_path', 255)->nullable()->comment('画像');
            $table->timestamps();
            
            $table->foreign('m_brand_id')->references('id')->on('m_brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_products');
    }
}
