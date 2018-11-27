<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable; // 这里应该是个 trait

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];


    /**
     * 数据库字段黑名单(不能被批量赋值的属性)
     * 为空则表示都字段都可以批量赋值
     *
     * @var array
     */
    public $guarded = [

    ];


    /**
     * 设置通知的邮件频道
     */
    public function routeNotificationForMail(){
        // 设置完成后就可以用「通知」来发邮件
        // 测试后还不能发送
        return 'geekbin@163.com';
    }




}
