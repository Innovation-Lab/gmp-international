<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login_id', 16)->unique()->comment('ログインID');
            $table->string('password', 16)->comment('パスワード');
            $table->string('last_name', 255)->nullable()->comment('姓');
            $table->string('first_name', 255)->nullable()->comment('名');
            $table->string('last_name_kana', 255)->nullable()->comment('セイ（フリガナ）');
            $table->string('first_name_kana', 255)->nullable()->comment('メイ（フリガナ）');
            $table->tinyInteger('authority')->comment('権限');
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
        Schema::dropIfExists('admins');
    }
}
