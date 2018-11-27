<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // 数据库填充总控，集中顺序调用其它 Seed 类
         $this->call(UsersTableSeeder::class);

    }
}
