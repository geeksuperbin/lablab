<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FamousSay; // 引入 mailable 邮件对象
use Illuminate\Support\Facades\Mail; // 引入发送邮件对象
use App\Notifications\FamousSayNotice;
use App\User;
use phpspider\core\log;
use Carbon\Carbon;

class FamousSayController extends Controller
{

    public function send(){

        $when = \Carbon\Carbon::now()->addMinutes(2);

//        dd($when);


        for($i=0;$i<5;$i++){
//            Mail::to('geekbin@163.com')->send(new FamousSay());
            Mail::to('geekbin@163.com')->queue(new FamousSay());
//            Mail::to('geekbin@163.com')->later($when,new FamousSay());
            \Log::debug('success');
        }
    }


    // 发送一个通知
    public function notice(User $user){
          // 通知三步曲：
          // 通知什么
          $say = '名望和财富不值得追求，因为你永远得不到满足。———— 亚当·斯密';
          // 通知谁，这部不能省略
          $user = User::find(20);
          // 开始通知
          $user->notify(new FamousSayNotice($say));

          \Log::debug('通知已发送');
    }

    // 访问一个通知
    public function read(User $user){
//        phpinfo();
//        echo Carbon::now();
//        dd('---');

        $user = User::find(2);

        // 普通操作
//        foreach($user->notifications as $notification){
////          echo $notification->data['say'];
//            echo $notification->type;
//            echo "<br />";
//        }


        // 检索未读消息
        foreach($user->unreadNotifications as $notification){
            echo $notification->data['say'];
            echo "<br />";
        }


        // 当用户点击全部已读按钮时的操作
        // 调用这个方法会给 users 表的 read_at 字段添加时间标记
//        foreach($user->unreadNotifications as $notification){
//            $notification->markAsRead();
//        }

        // 批量标记已读
//        $user->unreadNotifications->markAsRead();


        // 批量更新
//        $user->unreadNotifications()->update([
//            'read_at' => Carbon::now()
//        ]);


        // 删除通知，批量的
//        $user->notifications()->delete();




        \Log::debug('读取一条通知');
    }


}
