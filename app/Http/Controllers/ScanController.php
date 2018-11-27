<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\ScanFinished;
use App\Http\Controllers\Controller;

class ScanController extends Controller
{


    public function send(Request $request){

        $id = $request->id;

        $user = User::find($id);
//        dd($user);

        // 触发扫描完成事件
        event(new ScanFinished($user));

//        dd($user);
    }



    public function get($sign){
        \Log::debug('********'.$sign.'********');
    }
}
