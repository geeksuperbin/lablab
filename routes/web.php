<?php

// 引入测试路由文件
require __DIR__.'/test/t1.php';
require __DIR__.'/test/t2.php';



// 连通测试，如果在浏览器看见「Hello World」则表示配置正确
Route::get('/',function(){
    exit('Hello World');
});


// 实现基于 phpoffice/phppresentation 的 PPT 内容自动构建
Route::get('ppt/index', 'PowerPointController@index');


// 实现基于 soapbox/laravel-formatter 的 CVE XML 内容解析
Route::get('cve/parse', 'ParseCveXmlController@parse');
Route::get('cve/get', 'ParseCveXmlController@get');


// 每天6点整给自己发送一条名人名言邮件
Route::get('mail/send','FamousSayController@send');



















