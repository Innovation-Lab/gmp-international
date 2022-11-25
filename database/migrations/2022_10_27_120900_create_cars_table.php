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
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('brand', 20)->nullable()->comment('ブランド名');
            $table->integer('brand_code')->length(10)->nullable()->comment('ブランドコード');
            $table->string('car_name', 20)->nullable()->comment('車種');
            $table->integer('car_name_code')->length(10)->nullable()->comment('車種コード');
            $table->string('grade', 255)->nullable()->comment('グレード名');
            $table->integer('grade_id')->length(10)->nullable()->comment('グレードID');
            $table->string('color', 255)->nullable()->comment('カラー');
            $table->string('model', 255)->nullable()->comment('型式');
            $table->string('frame_number', 255)->nullable()->comment('車台番号');
            $table->string('number_plate', 50)->nullable()->comment('登録番号（ナンバー）');
            $table->integer('displacement')->length(10)->nullable()->comment('排気量');
            $table->string('model_year', 10)->nullable()->comment('年式');
            $table->integer('mileage')->length(10)->nullable()->comment('走行距離');
            $table->date('inspection_expiration_date', 10)->nullable()->comment('車検満期日');
            $table->date('vehicle_inspection_date', 10)->nullable()->comment('次回車検日');
            $table->string('photo_path')->nullable()->comment('車両画像パス');
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
        Schema::dropIfExists('cars');
    }
};
