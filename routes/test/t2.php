<?php

// 数据库测试（查）
//Route::get('database/t1','TestDatabaseController@t1');
Route::get('database/t1','TestDatabaseController@t1')->middleware('check.age');

Route::get('database/t2','TestDatabaseController@t2');

Route::get('database/t3','TestDatabaseController@t3');

Route::get('database/t4','TestDatabaseController@t4');





