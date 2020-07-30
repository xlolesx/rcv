<?php

namespace App\Listeners;

use IlluminateAuthEventsLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class LoginSuccesful
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
     * @param  IlluminateAuthEventsLogin  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->subject = 'Incio de sesion';
        $event->description = 'Exitoso';

        activity($event->subject)
            ->by($event->user)
            ->log($event->description);
    }
}
