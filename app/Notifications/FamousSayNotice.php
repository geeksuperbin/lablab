<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

//class FamousSayNotice extends Notification implements ShouldQueue
class FamousSayNotice extends Notification
{
    use Queueable;

    public $say;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($say)
    {
        $this->say = $say;
//        $this->notifiableId = 666;

        \Log::debug('发送通知初始化');
    }

    /**
     * Get the notification's delivery channels.
     * 获取通知发送频道
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        \Log::debug('发送通知频道');

//        return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $url = url('/ppt/1');

        \Log::debug('发送邮件通知');
        return (new MailMessage)
                    ->subject('通知')
                    ->line('通知的介绍'.$this->say)
                    ->action('通知行动', $url)
                    ->line('感谢您使用我们的应用程序');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
//    public function toArray($notifiable)
    public function toDatabase($notifiable)
    {

        \Log::debug('发送数据库通知');
        // 存入数据库里的数据
        return [
            'say'=>$this->say
        ];
    }





}
