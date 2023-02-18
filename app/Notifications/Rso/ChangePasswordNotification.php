<?php

namespace App\Notifications\Rso;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangePasswordNotification extends Notification
{
    use Queueable;

    private $rso;
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
     * @return array
     */
    public function via(): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->rso->name,
            'image' => $this->rso->image,
            'role' => $this->rso->role,
            'dd_house' => $this->rso->ddHouse->name,
            'msg' => 'has changed his password.',
        ];
    }
}
