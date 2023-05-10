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
            $table->unsignedInteger('brand_id')->comment('ブランドID');
            $table->foreign('brand_id')->references('id')->on('m_brands');
            $table->string('name', 255)->comment('商品名');
            $table->string('color_array', 255)->comment('カラー');
            $table->string('image_path', 255)->comment('画像');
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
        Schema::dropIfExists('m_products');
    }
}
