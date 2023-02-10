<?php

namespace App\Listeners;

use App\Events\ItopReplaceEvent;
use App\Models\User;
use App\Notifications\UpdateReplaceNumberNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UpdateReplaceNumberListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ItopReplaceEvent $event
     * @return void
     */
    public function handle(ItopReplaceEvent $event)
    {
        $superAdmin = User::firstWhere('role', 'super-admin');

        Notification::sendNow($superAdmin, new UpdateReplaceNumberNotification( $event ));
    }
}
