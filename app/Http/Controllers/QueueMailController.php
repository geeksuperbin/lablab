<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;

class QueueMailController extends Controller
{

    public function send(Request $request){

        $id = $request->id;

        // 获取查询用户
        $user = User::find($id);

//        dd($user);
//        dump(User::find($id)->name);

//        dd($request->all());


        // 队列给用户发邮件
//        dispatch(new SendReminderEmail($user));

        //  延迟1分钟执行
//        $job = (new SendReminderEmail($user))
//                    ->delay(Carbon::now()->addMinutes(1));


        //  指定推送的队列
        $job = (new SendReminderEmail($user))
                ->onQueue('processing');

//        $job = (new SendReminderEmail($user))
//            ->onQueue('Level0');

        $job = (new SendReminderEmail($user))->onQueue('default');



        // 切换连接
//        $job = (new SendReminderEmail($user))->onConnection('database');
        for($i=0;$i<20;$i++){
            dispatch($job);
        }

    }


}
