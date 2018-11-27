<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $guarded = [

    ];

    /*
     * 属于该身份的所有用户
     */
    public function users()
    {
       return $this->belongsToMany('App\User', 'user_role_map', 'role_id', 'uid');
    }


}
