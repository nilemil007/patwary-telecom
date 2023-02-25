<?php

namespace App\Notifications\Retailer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RetailerUpdateNotification extends Notification
{
    use Queueable;

    private $retailer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $retailer )
    {
        $this->retailer = $retailer;
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
            'name' => $this->retailer->user->name,
            'image' => $this->retailer->user->image,
            'role' => $this->retailer->user->role,
            'dd_house' => $this->retailer->ddHouse->name,
            'msg' => 'has updated his additional information.',
        ];
    }
}
