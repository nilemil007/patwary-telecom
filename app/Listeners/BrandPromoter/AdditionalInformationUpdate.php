<?php

namespace App\Listeners\BrandPromoter;

use App\Events\BrandPromoter\BpAdditionalInfoUpdateEvent;
use App\Models\User;
use App\Notifications\BrandPromoter\AdditionalInformationUpdateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class AdditionalInformationUpdate
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
     * @param BpAdditionalInfoUpdateEvent $event
     * @return void
     */
    public function handle(BpAdditionalInfoUpdateEvent $event)
    {
        Notification::sendNow( $this->superAdmin, new AdditionalInformationUpdateNotification( $event ) );
    }
}
