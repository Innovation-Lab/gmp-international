<?php

namespace Database\Seeders;

use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
                UsersTableSeeder::class,
            ]
        );
        // 複数生成する場合
        // $this->call(UsersTableSeeder::class);
    }
}