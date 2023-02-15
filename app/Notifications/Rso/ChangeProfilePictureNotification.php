<?php

namespace App\Notifications\Rso;

use App\Models\DdHouse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeProfilePictureNotification extends Notification
{
    use Queueable;

    private string $image;
    private mixed $rso;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $image, $rso )
    {
        $this->image = 'storage/users/'.$image;
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
            'image' => $this->image,
            'role' => $this->rso->user->role,
            'dd_house' => $this->rso->user->ddHouse->name,
            'msg' => 'has updated his profile picture.',
        ];
    }
}
