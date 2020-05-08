<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\tweet;

class likes extends Notification
{
    use Queueable;
    protected  $tweeta;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tweet)
    {
        $this->tweeta =  $tweet;
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
            'username'=> auth()->user()->user_name,
            'first Name'=> auth()->user()->name,
            'tweet_id'=> $this->tweeta->id,
            'tweet_body'=> $this->tweeta->body,
        ];
    }
}
