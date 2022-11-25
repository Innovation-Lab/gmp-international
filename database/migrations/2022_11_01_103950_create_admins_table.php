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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable()->unique()->comment('アカウントID');
            $table->string('password')->comment('パスワード');
            $table->tinyInteger('authority')->length(1)->nullable()->comment('権限（1:管理者:、2:一般）');
            $table->string('remember_token')->length(100)->nullable()->comment('トークン');
            $table->string('name')->nullable()->comment('名前');
            $table->timestamps();
            $table->softDeletes();
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
};
