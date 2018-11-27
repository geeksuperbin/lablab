<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{



    public function run()
    {

        for($i=0;$i<=20;$i++){
            $this->createUser();
        }
    }



    public function createUser(){
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        // 自定义日志存放路径
        \Log::useDailyFiles((storage_path().'/logs/debug/debug.log'));
        // 日志存放内容
        \Log::debug('执行用户表【Users】数据库填充');
    }
}
