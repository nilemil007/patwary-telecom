<?php

namespace App\Providers;

//use App\Models\ItopReplace;
//use App\Observers\ReplaceItopNumber;
use App\Events\BrandPromoter\BpEvent;
use App\Events\ItopReplaceEvent;
use App\Listeners\BrandPromoter\AdditionalInformationUpdate;
use App\Listeners\BrandPromoter\ProfileInformationUpdate;
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
        BpEvent::class => [
            ProfileInformationUpdate::class,
            AdditionalInformationUpdate::class,
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
