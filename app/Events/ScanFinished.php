<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

// 扫描完成事件类
class ScanFinished
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     * 创建一个新的事件实例
     *
     * @return void
     */
    public function __construct(User $user)
    {
        // 传递事件需要的数据
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     * 获取事件广播频道
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {

        // 私有频道
        return new PrivateChannel('channel-name');
    }
}
