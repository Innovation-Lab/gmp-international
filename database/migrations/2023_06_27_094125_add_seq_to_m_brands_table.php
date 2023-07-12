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
        Schema::table('m_brands', function (Blueprint $table) {
            $table->integer('seq')->nullable()->default(100)->after('public_flag')->comment('表示順');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_brands', function (Blueprint $table) {
            $table->dropColumn('seq');
        });
    }
};
