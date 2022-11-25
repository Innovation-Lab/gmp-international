<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('admins')->insert([
            'name' => 'テスト管理者',
            'email' => 'test@example.com',
            'password' => Hash::make('password1234'),
            'authority' => Admin::MANAGER,
            'remember_token' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => NULL,
        ]);

        DB::table('users')->insert([
            'email' => 'test@example.com',
            'password' => Hash::make('password1234'),
            'firebase_uid' => '12345678',
            'last_name' => 'テスト',
            'first_name' => 'ユーザー',
            'last_name_kana' => NULL,
            'first_name_kana' => NULL,
            'gender' => NULL,
            'birthday' => NULL,
            'zipcode' => NULL,
            'address1' => NULL,
            'address2' => NULL,
            'address3' => NULL,
            'address4' => NULL,
            'jititai_id' => NULL,
            'jititai_name' => NULL,
            'profile_image_path' => NULL,
            'remember_token' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => NULL,
        ]);

        DB::table('notifications')->insert($this->getNotificationsData());

        $this->call([
             CarSeeder::class,
        ]);
    }

    private function getNotificationsData() {
        $data = [];
        for ($i = 1;$i <= 12;$i++) {
            $data[] = [
                'title' => '雹の被害について(テスト)'.$i,
                'content' => "6/2(木)、6/3(金)に関東地方の一部地域で雹（ひょう）が降り、各地で被害が発生しています。掲載されている情報と現車の状態に差異がある場合も各地で被害が発生しています。",
                'public' => 1,
                'release_datetime' => Carbon::now(),
                'image_path' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ];
        }
        return $data;
    }
}
