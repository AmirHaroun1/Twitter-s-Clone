<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class reply extends Notification
{
    protected $tweeta;
    protected $reply;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tweet,$reply)
    {
        $this->tweeta = $tweet;
        $this->reply = $reply;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'replier_user_name'=> $this->reply->user->user_name,
            'replier_name'=> $this->reply->user->name,
            'reply_body'=> $this->reply->body,
            'tweet_id'=> $this->tweeta->id,
        ];
    }
}
