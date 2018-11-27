<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Exception;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * 任务最大尝试次数
     */
    public $tries = 5;

    /**
     * 任务运行的超时时间
     */
    public $timeout = 120;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     * // 目的 让队列来调用此任务
     *
     * @return void
     */
    public function handle()
    {
        $res = $this->user;

        $content = '秋安,【 '.$res->name. ' 】用户 : )';

        \Log::debug('当前运行进程：'.getmypid());
//        sleep(1);

        print($content);
    }


    public function failed(Exception $exception){
        // 给用户发送失败通知
    }
}
