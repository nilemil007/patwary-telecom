<?php

namespace App\Providers;

//use App\Models\ItopReplace;
//use App\Observers\ReplaceItopNumber;
use App\Events\BrandPromoter\ApproveAdditionalInfoEvent;
use App\Events\BrandPromoter\BpAdditionalInfoUpdateEvent;
use App\Events\BrandPromoter\ChangePasswordEvent;
use App\Events\BrandPromoter\UpdateProfilePictureEvent;
use App\Events\BrandPromoter\UpdateUsernameEvent;
use App\Events\ItopReplaceEvent;
use App\Listeners\BrandPromoter\AdditionalInformationUpdate;
use App\Listeners\BrandPromoter\ApproveAdditionalInfoListener;
use App\Listeners\BrandPromoter\ChangePasswordListener;
use App\Listeners\BrandPromoter\ProfileInformationUpdate;
use App\Listeners\BrandPromoter\UpdateProfilePictureListner;
use App\Listeners\BrandPromoter\UpdateUsernameListner;
use App\Listeners\UpdateReplaceNumberListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ItopReplaceEvent::class => [
            UpdateReplaceNumberListener::class,
        ],
        BpAdditionalInfoUpdateEvent::class => [
            AdditionalInformationUpdate::class,
        ],
        UpdateProfilePictureEvent::class => [
            UpdateProfilePictureListner::class,
        ],
        UpdateUsernameEvent::class => [
            UpdateUsernameListner::class,
        ],
        ChangePasswordEvent::class => [
            ChangePasswordListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
//        ItopReplace::observe( ReplaceItopNumber::class );
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
