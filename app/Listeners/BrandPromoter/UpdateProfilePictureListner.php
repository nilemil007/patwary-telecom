<?php

namespace App\Listeners\BrandPromoter;

use App\Events\BrandPromoter\UpdateProfilePictureEvent;
use App\Models\User;
use App\Notifications\BrandPromoter\ProfilePictureUpdateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UpdateProfilePictureListner
{
    private $superAdmin;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->superAdmin = User::firstWhere('role', 'super-admin');
    }

    /**
     * Handle the event.
     *
     * @param UpdateProfilePictureEvent $event
     * @return void
     */
    public function handle(UpdateProfilePictureEvent $event)
    {
        Notification::sendNow( $this->superAdmin, new ProfilePictureUpdateNotification( $event ) );
    }
}
