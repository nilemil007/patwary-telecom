<?php

namespace App\Notifications\BrandPromoter;

use App\Models\DdHouse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApproveAdditionalInfoNotification extends Notification
{
    use Queueable;

    private $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $user )
    {
        $this->user = $user->toArray();
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
            'name' => $this->user['name'],
            'image' => $this->user['image'],
            'msg' => 'has approved your additional information update request.',
        ];
    }
}
