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
        Schema::table('admins', function (Blueprint $table) {
            $table->string('image_path')->nullable()->default(NULL)->comment('画像')->after('authority');
            $table->unsignedInteger('m_shop_id')->nullable()->default(NULL)->comment('所属店舗ID')->after('image_path');
            
            $table->foreign('m_shop_id')->references('id')->on('m_shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('image_path');
            $table->dropColumn('m_shop_id');
        });
    }
};
