<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use \App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $value = [
                'email' => Str::random(5) .'_'. date('Ymd') .'@sample.com',
                'password' => Hash::make('pass'),
                'last_name' => '創新',
                'first_name' => '太郎',
                'last_name_kana' => 'ソウシン',
                'first_name_kana' => 'タロウ',
                'zip_code' => '1234567',
                'prefecture' => '東京都',
                'address_city' => '千代田区',
                'address_block' => '紀尾井町1-1-1',
                'address_building' => '紀尾井町ビル16F',
                'tel' => '09000010002',
            ];

            User::create($value);
        });
    }
}
