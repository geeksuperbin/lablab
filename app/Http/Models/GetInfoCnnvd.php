<?php


require  '../../../vendor/autoload.php';

use phpspider\core\phpspider;
use phpspider\core\log;

// 基于 phpspider 采集 cnnvd 漏洞数据
// 直接调用 php GetInfoCnnvd.php，只能命令行执行，也不能用 artisan 执行

// 参数配置
$configs = array(
    // 定义当前采集名称
    'name' => 'cnnvd 漏洞库采集',
    // 工作的爬虫任务数，tasknum >1 需要redis支持
    'tasknum' => 1,
    // 是否显示日志
    'log_show' => false,
//        'log_show' => true,
    // 定义采取哪些域名下的网页, 非域名下的url会被忽略以提高爬取速度
    'domains' => array(
        'www.cnnvd.org.cn'
    ),
    // 定义采集的入口链接
    'scan_urls' => array(
        "http://www.cnnvd.org.cn/web/vulnerability/querylist.tag?pageno=1&repairLd="
    ),
    // 定义列表页url的规则
    'list_url_regexes' => array(
        "http://www.cnnvd.org.cn/web/vulnerability/querylist.tag\?pageno=\d+\&repairLd=",
    ),
    // 定义内容页url的规则
    'content_url_regexes' => array(
        "http://www.cnnvd.org.cn/web/xxk/ldxqById.tag\?CNNVD=CNNVD\-\d+\-\d+",   //文章内容页
    ),
    //定义内容页的抽取规则
    'fields' => array(
        //漏洞信息
        array(
            'name' => "hole_info",
            'selector' => "//div[@class='detail_xq w770']//following-sibling::h2",
        ),
        //CNNVD编号
        array(
            'name' => "cnnvd",
            'selector' => "//span[contains(text(),'CNNVD编号')]",
        ),
        //CVE编号
        array(
            'name' => "cve",
            'selector' => "//a[contains(text(),'CVE')]",
        ),
        //发布时间
        array(
            'name' => "pub_time",
            'selector' => "//span[contains(text(),'发布时间')]//following-sibling::a[1]",
        ),
        //更新时间
        array(
            'name' => "upd_time",
            'selector' => "//span[contains(text(),'更新时间')]//following-sibling::a[1]",
        ),
        //漏洞来源
        array(
            'name' => "hole_res",
            'selector' => "//li[@id='1']",
        ),
        //危害等级
        array(
            'name' => "danger_lev",
            'selector' => "//span[contains(text(),'危害等级')]//following-sibling::a[1]",
        ),
        //漏洞类型
        array(
            'name' => "hole_type",
            'selector' => "//span[contains(text(),'漏洞类型')]//following-sibling::a[1]",
        ),
        //威胁类型
        array(
            'name' => "danger_type",
            'selector' => "//span[contains(text(),'威胁类型')]//following-sibling::a[1]",
        ),
        //厂商
        array(
            'name' => "manufacturer",
            'selector' => "//span[contains(text(),'商')]//following-sibling::a[1]",
        ),
        //漏洞简介
        array(
            'name' => "hole_intro",
            'selector' => "//div[@class='d_ldjj']",
        ),
        //漏洞公告
        array(
            'name' => "hole_notice",
            'selector' => "//div[@class='d_ldjj m_t_20'][1]",//需要[0]索引修正
        ),
        //参考网址
        array(
            'name' => "refer_url",
            'selector' => "//div[@class='d_ldjj m_t_20'][2]",
        ),
        //受影响实体
        array(
            'name' => "affect_entity",
            'selector' => "//div[@class='d_ldjj m_t_20'][3]",
        ),
        //补丁
        array(
            'name' => "patch",
            'selector' => "//div[@class='d_ldjj m_t_20'][1]",//需要[1]索引修正
        )
    ),
    //数据库配置
    'db_config' => array(
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'root',
        'pass' => 'root123',
        'name' => 'lablab'
    ),
    //采集数据导出到数据库
    'export' => array(
        'type' => 'db',
        'table' => 'vul_lib_cnnvd'
    ),
//    //redis配置，根据需要配置
//    'queue_config' => array(
//        'host' => '127.0.0.1',
//        'port' => 6379,
//        'pass' => '',
//        'db' => 7,
//        'prefix' => 'spider',
//        'timeout' => 30
//    )
);

//初始化采集实例
$spider = new phpspider($configs);

//关卡钩子处理
//列表页预加载
$spider->on_start = function ($spider) {
    // 生成列表页URL入队列
    //            for ($i = 1; $i <= 11641; $i++) {
    for ($i = 1; $i <= 2; $i++) {
        $url = "http://www.cnnvd.org.cn/web/vulnerability/querylist.tag?pageno={$i}&repairLd=";
        $spider->add_url($url);
    }
};

//采集内容自定义处理
$spider->on_extract_field = function ($fieldname, $data, $page) {
    log::debug($data);
    if ($fieldname == 'hole_res') {
        //需要做去字符处理
        $data = str_replace('漏洞来源：', '', cutstr_html($data));
        //        log::debug($data);
        return $data;
    } else if ($fieldname == 'hole_intro') {
        $data = str_replace('漏洞简介', '', cutstr_html($data));
        return $data;
    } else if ($fieldname == 'hole_notice') {
        $data = str_replace('漏洞公告', '', cutstr_html($data));
        return $data;
    } else if ($fieldname == 'refer_url') {
        $data = str_replace('参考网址', '', cutstr_html($data));
        return $data;
    } else if ($fieldname == 'affect_entity') {
        $data = str_replace('受影响实体', '', cutstr_html($data));
        return $data;
    } else if ($fieldname == 'patch') {
        $data = str_replace('补丁', '', cutstr_html($data));
        return $data;
    } else if ($fieldname == 'cnnvd') {
        $data = str_replace('CNNVD编号：', '', cutstr_html($data));
        return $data;
    } else {
        return cutstr_html($data);
    }
};

//开始采集
$spider->start();


