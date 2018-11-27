<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
//        'App\Events\Event' => [
//            'App\Listeners\EventListener',
//        ],
//        'Illuminate\Mail\Events\MessageSending' => [
//            'App\Listeners\LogSentMessage',
//        ],

        // 监听扫描完成事件，并发送解析扫描结果行为
        'App\Events\ScanFinished' => [
            'App\Listeners\SendParseScanResult',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /*
     * 需要注册的订阅者类
     */
//    protected $subscribe = [
//      'App\Listeners\UserEventSubscriber',
//    ];
}
