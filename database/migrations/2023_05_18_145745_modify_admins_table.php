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
            $table->dropColumn('login_id');
            $table->string('email', 255)->unique()->comment('ログインID')->after('id');
            $table->string('password', 255)->comment('パスワード')->change();
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
            $table->dropColumn('email');
            $table->string('login_id', 16)->unique()->comment('ログインID')->after('id');
            $table->string('password', 16)->comment('パスワード')->change();
        });
    }
};
