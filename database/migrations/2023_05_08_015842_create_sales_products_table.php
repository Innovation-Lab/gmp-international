<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('m_product_id')->comment('商品ID');
            $table->unsignedBigInteger('user_id')->comment('顧客ID');
            $table->date('purchase_date', 255)->nullable()->comment('購入日');
            $table->date('return_date', 255)->nullable()->comment('返品日');
            $table->unsignedInteger('m_shop_id')->nullable()->comment('店舗名');
            $table->string('product_code', 255)->nullable()->comment('シリアルコード');
            $table->string('warranty_period', 255)->nullable()->comment('保証期間');
            $table->unsignedInteger('m_color_id')->nullable()->comment('カラーID');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('m_product_id')->references('id')->on('m_products');
            $table->foreign('m_shop_id')->references('id')->on('m_shops');
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
        Schema::dropIfExists('sales_products');
    }
}
