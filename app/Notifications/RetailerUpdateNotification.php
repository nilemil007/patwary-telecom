<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RetailerUpdateNotification extends Notification
{
    use Queueable;

    private $retailer, $rso;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $retailer, $rso )
    {
        $this->retailer = $retailer;
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
            'retailer_code' => $this->retailer->retailer_code,
            'retailer_itop' => $this->retailer->itop_number,
            'msg' => "has updated ".$this->retailer->retailer_name."'s"." information.",
        ];
    }
}
