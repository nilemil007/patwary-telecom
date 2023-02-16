<?php

namespace App\Notifications\Rso;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApproveNotification extends Notification
{
    use Queueable;

    private $superAdmin;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $superAdmin )
    {
        $this->superAdmin = $superAdmin;
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
            'name' => $this->superAdmin->name,
            'image' => $this->superAdmin->image,
            'msg' => 'has approved your additional information update request.',
        ];
    }
}
