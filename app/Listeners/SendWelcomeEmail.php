<?php

namespace App\Listeners;

use App\Events\RigesterUser;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
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
     * @param  \App\Events\RigesterUser  $event
     * @return void
     */
    public function handle(RigesterUser $event)
    {
        Mail::to($event->user->email)->send(new WelcomeMail($event->user->name));
    }
}
