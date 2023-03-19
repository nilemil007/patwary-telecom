<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RetailerApprovedNotification extends Notification
{
    use Queueable;

    private $retailer, $superAdmin;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $retailer, $superAdmin )
    {
        $this->retailer = $retailer;
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
            'retailer_code' => $this->retailer->retailer_code,
            'retailer_itop' => $this->retailer->itop_number,
            'msg' => "has approved ".$this->retailer->retailer_name."'s"." information update request.",
        ];
    }
}
