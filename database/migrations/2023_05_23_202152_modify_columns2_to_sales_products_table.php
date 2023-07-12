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
        Schema::table('sales_products', function (Blueprint $table) {
            $table->string('other_color_name')->nullable()->comment('カラー（入力）');
            $table->string('other_shop_name')->nullable()->comment('購入店舗（入力）');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_products', function (Blueprint $table) {
            $table->dropColumn('other_color_name');
            $table->dropColumn('other_shop_name');
        });
    }
};
