<?php

namespace App\Notifications\Rso;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeUsernameNotification extends Notification
{
    use Queueable;

    private mixed $rso;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $rso )
    {
        $this->rso = $rso;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'name' => $this->rso->user->name,
            'image' => $this->rso->user->image,
            'role' => $this->rso->user->role,
            'dd_house' => $this->rso->user->ddHouse->name,
            'msg' => 'has changed his username.',
        ];
    }
}
