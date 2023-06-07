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
        Schema::table('m_shops', function (Blueprint $table) {
            $table->string('tel', 11)->nullable()->default(NULL)->comment('電話番号')->after('name');
            $table->string('fax', 11)->nullable()->default(NULL)->comment('FAX')->after('tel');
            $table->string('zip_code', 7)->nullable()->default(NULL)->comment('郵便番号')->after('fax');
            $table->string('prefecture', 11)->nullable()->default(NULL)->comment('都道府県')->after('zip_code');
            $table->string('address_city_block', 255)->nullable()->default(NULL)->comment('市区町村番地')->after('prefecture');
            $table->string('address_building', 255)->nullable()->default(NULL)->comment('建物名')->after('address_city_block');
            $table->string('week_business_hour', 255)->nullable()->default(NULL)->comment('営業時間１')->after('address_building');
            $table->text('week_business_hour_memo')->nullable()->default(NULL)->comment('営業時間１メモ')->after('week_business_hour');
            $table->string('holiday_business_hour', 255)->nullable()->default(NULL)->comment('営業時間２')->after('week_business_hour_memo');
            $table->text('holiday_business_hour_memo')->nullable()->default(NULL)->comment('営業時間２メモ')->after('holiday_business_hour');
            $table->string('image_path', 255)->nullable()->default(NULL)->comment('画像')->after('holiday_business_hour_memo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_shops', function (Blueprint $table) {
            $table->dropColumn('tel');
            $table->dropColumn('fax');
            $table->dropColumn('zip_code');
            $table->dropColumn('prefecture');
            $table->dropColumn('address_city_block');
            $table->dropColumn('address_building');
            $table->dropColumn('week_business_hour');
            $table->dropColumn('week_business_hour_memo');
            $table->dropColumn('holiday_business_hour');
            $table->dropColumn('holiday_business_hour_memo');
        });
    }
};
