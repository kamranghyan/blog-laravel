<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Jobs\UserCreated;

class EventServiceProvider extends ServiceProvider
{
    
    public function boot(): void
    {
        \App::bindMethod(UserCreated::class . '@handle', function($job){
            return $job->handle();
        });
    }

}
