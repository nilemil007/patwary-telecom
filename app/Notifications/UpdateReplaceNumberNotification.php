<?php

namespace App\Notifications;

use App\Models\DdHouse;
use App\Models\ItopReplace;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateReplaceNumberNotification extends Notification
{
    use Queueable;

    private $event;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $event )
    {
        $this->event = $event;
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
            'name' => $this->event->currentUser['name'],
            'image' => $this->event->currentUser['image'],
            'role' => $this->event->currentUser['role'],
            'dd_house' => DdHouse::firstWhere('id', $this->event->currentUser['dd_house_id'])->name,
            'msg' => 'has updated the itop number which he gave for replacement.',
            'tmp_itop_number' => $this->event->replace['tmp_itop_number'],
        ];
    }
}
