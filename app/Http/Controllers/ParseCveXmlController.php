<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Translate;
use Illuminate\Support\Facades\Redis;



/**
 * CVE 数据采集实现逻辑：
 *  获取 CVE 原始数据，并进行格式化处理
 *  调用 google 翻译对原文进行翻译
 *  将原文和翻译的中文一并存入到数据库中
 *
 */

class ParseCveXmlController extends Controller
{


    public function parse(){
//         $res = Redis::set('name','Hello world');

        $res = file_get_contents('../resources/allitems.xml');
//        $res = file_get_contents('../resources/demo.xml');
//        $res = file_get_contents('http://cve.mitre.org/data/downloads/allitems-cvrf-year-1999.xml');
        $items = xmlToArray($res)['item'];

        $chunks = array_chunk($items,1000);
        unset($res);
        unset($items);
        foreach($chunks as $key => $chunk){
            file_put_contents(public_path().'/chunk/chunk-'.$key,json_encode($chunk));
            unset($chunk);
        }
//        dd('finished');

//        dump($res['item']);
//        dump(count($chunks));
//        dump($chunks[1]);
//        dd('-------');
//        $str = "This candidate has been reserved by an organization or individual that will use it when announcing a new security problem.  When the candidate has been publicized, the details for this candidate will be provided";
//
        $result = Translate::setFromAndTo("en","zh")->translate($str);

        dump($result);
    }

    /**
     * 处理 cve 漏洞信息
     */
    public function get(){
        $res = file_get_contents(public_path().'/chunk/chunk-4');
        $res = json_decode($res);
        dd($res);
//        \Debugbar::info($res);
    }

}
