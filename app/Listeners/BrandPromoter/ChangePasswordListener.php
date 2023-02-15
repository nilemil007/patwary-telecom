<?php

namespace App\Listeners\BrandPromoter;

use App\Events\BrandPromoter\ChangePasswordEvent;
use App\Models\User;
use App\Notifications\BrandPromoter\ChangePasswordNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ChangePasswordListener
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
     * @param ChangePasswordEvent $event
     * @return void
     */
    public function handle(ChangePasswordEvent $event)
    {
        Notification::sendNow( $this->superAdmin, new ChangePasswordNotification( $event ) );
    }
}
