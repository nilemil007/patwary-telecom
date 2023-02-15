<?php

namespace App\Listeners\BrandPromoter;

use App\Events\BrandPromoter\UpdateUsernameEvent;
use App\Models\User;
use App\Notifications\BrandPromoter\UpdateUsernameNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UpdateUsernameListner
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
     * @param UpdateUsernameEvent $event
     * @return void
     */
    public function handle(UpdateUsernameEvent $event)
    {
        Notification::sendNow( $this->superAdmin, new UpdateUsernameNotification( $event ) );
    }
}
