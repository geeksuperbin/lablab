<?php

namespace App;

// use App\Scopes\AgeScope;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Builder;

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
    public function routeNotificationForMail()
    {
        // 设置完成后就可以用「通知」来发邮件
        // 测试后还不能发送
        return 'geekbin@163.com';
    }


    /*
 * 数据模型的启动方法
 */
    // protected  static function boot()
    // {
    //     parent::boot();
    //
    //     static::addGlobalScope(new AgeScope);
    // }


    /*
     * 使用闭包定义全局作用域
     */
    // protected  static function boot()
    // {
    //     parent::boot();
    //
    //     static::addGlobalScope('password', function(Builder $builder){
    //         $builder->where('password', '>', 200);
    //     });
    //
    // }

    /*
     * 本地作用域
     */
    public function scopePopular($query)
    {
        return $query->where('password', '>', 200);
    }



    //以下是 ORM 关联

    /**
     * 获取与用户关联的电话号码
     */
    public function phone()
    {
        return $this->hasOne('App\Phone', 'uid', 'id');
    }

    /*
     * 查询当前用户所有评论
     */
    public function comments()
    {
        return $this->hasMany('App\Comment','uid','id');
    }


    /*
     * 查询当前用户的身份
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role_map', 'uid', 'role_id');
    }






















}
