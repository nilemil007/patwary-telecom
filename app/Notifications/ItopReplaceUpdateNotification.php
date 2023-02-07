<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ItopReplaceUpdateNotification extends Notification
{
    use Queueable;

    public $tmpItopNumber;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $replace )
    {
        $this->tmpItopNumber = $replace['tmp_itop_number'];
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
    public function toArray(): array
    {
        return [
            'tmp_itop_number' => $this->tmpItopNumber,
        ];
    }
}
