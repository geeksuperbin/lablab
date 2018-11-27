<?php

// 数据库测试（查）
//Route::get('database/t1','TestDatabaseController@t1');
Route::get('database/t1','TestDatabaseController@t1')->middleware('check.age');

Route::get('database/t2','TestDatabaseController@t2');

Route::get('database/t3','TestDatabaseController@t3');

Route::get('database/t4','TestDatabaseController@t4');



Route::get('database/t5','TestDatabaseController@t5');
Route::get('database/t6','TestDatabaseController@t6');
Route::get('database/t7','TestDatabaseController@t7');
Route::get('database/t8','TestDatabaseController@t8');
Route::get('database/t9','TestDatabaseController@t9');





