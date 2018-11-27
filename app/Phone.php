<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{


    public $guarded = [

    ];

    /*
     * 获取拥有该电话的用户模型
     */
    public function user()
    {
        return $this->belongsTo('App\User','uid','id');

    }
}
