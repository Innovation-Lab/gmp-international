<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 255)->unique()->comment('ログインユーザーID');
            $table->string('password', 255)->comment('パスワード');
            $table->string('last_name', 255)->comment('姓');
            $table->string('first_name', 255)->comment('名');
            $table->string('last_name_kana', 255)->comment('セイ（フリガナ）');
            $table->string('first_name_kana', 255)->comment('メイ（フリガナ）');
            $table->string('zip_code', 255)->comment('郵便番号');
            $table->string('prefecture', 255)->comment('都道府県名');
            $table->string('address_city', 255)->comment('市区町村');
            $table->string('address_block', 255)->comment('番地');
            $table->string('address_building', 255)->nullable()->comment('建物名');
            $table->string('tel', 255)->comment('電話番号');
            $table->tinyInteger('is_catalog')->nullable()->comment('カタログフラグ');
            $table->tinyInteger('is_dm')->nullable()->comment('DMフラグ');
            $table->text('memo')->nullable()->comment('管理用メモ');
            $table->tinyInteger('seq')->nullable()->comment('表示順');
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
        Schema::dropIfExists('users');
    }
}
