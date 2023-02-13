<?php

namespace App\Listeners\BrandPromoter;

use App\Events\BrandPromoter\BpEvent;
use App\Models\User;
use App\Notifications\BrandPromoter\AdditionalInformationUpdateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class AdditionalInformationUpdate
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
     * @param BpEvent $event
     * @return void
     */
    public function handle(BpEvent $event)
    {
        $superAdmin = User::firstWhere('role', 'super-admin');

        Notification::sendNow( $superAdmin, new AdditionalInformationUpdateNotification( $event ) );
    }
}
