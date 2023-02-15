<?php

namespace App\Notifications\Rso;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdditionalInfoUpdateNotification extends Notification
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
            'name' => $this->rso->user->name,
            'image' => $this->rso->user->image,
            'role' => $this->rso->user->role,
            'dd_house' => $this->rso->ddHouse->name,
            'msg' => 'has updated his additional information.',
        ];
    }
}
