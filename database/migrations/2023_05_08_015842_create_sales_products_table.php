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
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('purchase_date', 255)->comment('購入日');
            $table->date('return_date', 255)->nullable()->comment('返品日');
            $table->unsignedInteger('shop_id')->nullable()->comment('店舗名');
            $table->foreign('shop_id')->references('id')->on('m_shops');
            $table->string('product_code', 255)->unique()->comment('シリアルコード');
            $table->string('warranty_period', 255)->comment('保証期間');
            $table->unsignedInteger('m_color_id')->comment('カラーID');
            $table->foreign('m_color_id')->references('id')->on('m_colors');
            $table->softDeletes();
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
        Schema::dropIfExists('sales_products');
    }
}
