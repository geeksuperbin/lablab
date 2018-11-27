<?php

// 发送一个通知
Route::get('notice/send','FamousSayController@notice');

// 读一个通知
Route::get('notice/read','FamousSayController@read');


// 队列测试
Route::get('queue/send','QueueMailController@send');



// 事件测试
Route::get('event/send','ScanController@send');



// Blade 模版引擎研究
Route::get('blade/t1','ViewBladeController@t1');
Route::get('blade/t2','ViewBladeController@t2');

// 路由直接到视图，不走控制器
Route::get('blade/t3',function(){
    return view('child');
});

Route::get('blade/t4',function(){
    return view('alert');
});


Route::get('blade/t5',function(){
    return view('used',[
        'name' => 'Geek彬',
        'records' => 0, // if 条件语句测试
        'users' => [
            [
                'id'=>1,
                'name'=>'test1'
            ],
            [
                'id'=>2,
                'name'=>'test2'
            ],
            [
                'id'=>3,
                'name'=>'test3'
            ],
            [
                'id'=>4,
                'name'=>'test4'
            ],
            [
                'id'=>5,
                'name'=>'test5'
            ],
        ],
//        'users'=>[
//
//        ],
        'sign' => 0

    ]);
});


Route::get('blade/t6',function(){
    return view('each',[
        'jobs' => [
            'title' => 'sss',
            'slot' => 'fdsf',
            'foo' => 'gfg',
            'hell' => 'sf',
            'name' => 'sfs',
        ]

    ]);



});
