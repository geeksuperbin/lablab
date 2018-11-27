<?php

use SoapBox\Formatter\Formatter;


/**
 * 字符过滤器
 *
 * @param $string
 * @return string
 */
function cutstr_html($string){
    //    print_r($string);exit;

    //自定义过滤字符
    $string = preg_replace("/(&#\d+;)|(&gt;)|(更多)/si","",$string);
    //过滤html元素
    $string = strip_tags($string);
    $string = trim($string);
    $string = str_replace("\t","",$string);
    $string = str_replace("\r\n","",$string);
    $string = str_replace("\r","",$string);
    $string = str_replace("\n","",$string);
    $string = str_replace(" ","",$string);

    return trim($string);
}


/**
 * xml 转 array
 *
 * @param $path
 * @return mixed
 */
function xmlToArray($contents)
{
    $formatter = Formatter::make($contents, Formatter::XML);
    $array = $formatter->toArray();
    return $array;

}

/**
 * php 判断返回的内容是不是xml格式的
 */
function is_xml($content){
    //判断返回的内容是不是 xml 格式
    $xml_parser = xml_parser_create();
    $res = xml_parse($xml_parser,$content,true);
    xml_parser_free($xml_parser);
    return $res;

}


/**
 * 随机字符串
 *
 * @return string
 */
function get_hash(){
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()+-';
    $random = $chars[mt_rand(0,73)].$chars[mt_rand(0,73)].$chars[mt_rand(0,73)].$chars[mt_rand(0,73)].$chars[mt_rand(0,73)];//Random 5 times
    $content = uniqid().$random;  // 类似 5443e09c27bf4aB4uT
    return sha1($content);
}

