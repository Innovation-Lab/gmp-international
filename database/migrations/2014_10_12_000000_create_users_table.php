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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100)->nullable()->unique()->comment('メールアドレス');
            $table->string('tel', 50)->nullable()->unique()->comment('電話番号');
            $table->string('password')->nullable()->comment('パスワード');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('firebase_uid', 100)->nullable()->unique();
            $table->string('last_name', 50)->nullable()->comment('姓');
            $table->string('first_name', 50)->nullable()->comment('名');
            $table->string('last_name_kana', 50)->nullable()->comment('せい（ふりがな）');
            $table->string('first_name_kana', 50)->nullable()->comment('めい（ふりがな）');
            $table->tinyInteger('gender')->length(1)->nullable()->comment('性別（1:男性、2:女性）'); 
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->string('zipcode')->length(10)->nullable()->comment('郵便番号');
            $table->string('address1', 20)->nullable()->comment('都道府県');
            $table->string('address2')->nullable()->comment('住所1');
            $table->string('address3')->nullable()->comment('住所2');
            $table->string('address4')->nullable()->comment('住所3');
            $table->string('jititai_id', 10)->nullable()->comment('自治体ID');
            $table->string('jititai_name', 100)->nullable()->comment('自治体名');
            $table->string('profile_image_path')->nullable()->comment('プロフィール画像パス');
            $table->tinyInteger('frozen')->length(1)->default(1)->comment('1:一般:、2:凍結）');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); //論理削除カラム
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
};
