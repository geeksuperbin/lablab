<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $guarded = [

    ];

    /*
     * 当前评论属于哪个用户
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }


}
