<?php

namespace App\Events\BrandPromoter;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class UpdateProfilePictureEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $image;
    public $currentUser;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $image )
    {
        $this->image = 'storage/users/'.$image;
        $this->currentUser = Auth::user()->toArray();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|PrivateChannel
     */
    public function broadcastOn(): Channel|PrivateChannel
    {
        return new PrivateChannel('channel-name');
    }
}
