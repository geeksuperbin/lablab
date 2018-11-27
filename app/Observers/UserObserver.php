<?php

namespace App\Observers;


use App\User;



class UserObserver
{
    /*
     * 监听用户创建事件
     */
    public function created(User $user)
    {
        \Log::info($user->name.' 用户已创建');
    }

    /*
     * 监听用户删除事件
     */
    public function deleting(User $user)
    {
        \Log::info($user->name.' 用户已删除');

    }
}

