<?php

namespace App\Listeners;

use App\Events\EventsReminderCreated;
use App\Mail\ReminderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailUserReminderAboutCreated implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(EventsReminderCreated $event)
    {
        $user = Auth::user();

        $when = now()->addSeconds(5);
        $email = new ReminderCreated(
            $event->nameReminder,
            $event->descReminder,
        );
       
        Mail::to($user)->later($when, $email);
        sleep(2);
    }
}
