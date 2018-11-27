<?php

namespace App\Listeners;

use App\Events\ScanFinished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\ScanController;

class SendParseScanResult implements ShouldQueue
//class SendParseScanResult
{
    use InteractsWithQueue;

    // 队列化任务使用的连接名称
//    public $connection='database';
    public $connection='sync';


    // 队列化任务使用的队列名称
    public $queue = 'listeners';


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->event = $event;
//        dd($this->event->user);
    }

    /**
     * Handle the event.
     *
     * @param  ScanFinished  $event
     * @return void
     */
//    public function handle(ScanFinished $event)
    public function handle(ScanFinished $event)
    {
        $res = $event->user->name;
//        dump($res);
//        echo 'ScanFinished 的事件被处理了';
        (new ScanController())->get('解析xml结果,用户：'.$res);
        \Log::debug('事件处理完成');

//        return false;
    }

    public function failed(ScanFinished $event, $exception){
            \Log::debug('事件发生错误');
    }
}
