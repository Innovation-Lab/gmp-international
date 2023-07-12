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
        Schema::create('color_urls', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('m_product_id')->nullable()->comment('製品ID');
            $table->unsignedInteger('m_color_id')->nullable()->comment('カラーID');
            $table->text('url')->nullable()->comment('画像URL');
            $table->timestamps();
            
            $table->foreign('m_product_id')->references('id')->on('m_products');
            $table->foreign('m_color_id')->references('id')->on('m_colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_urls');
    }
};
