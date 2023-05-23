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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('is_catalog')->nullable()->default(0)->comment('カタログフラグ')->change();
            $table->integer('is_dm')->nullable()->default(0)->comment('DMフラグ')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('is_catalog')->nullable()->comment('カタログフラグ')->change();
            $table->integer('is_dm')->nullable()->comment('DMフラグ')->change();
        });
    }
};
