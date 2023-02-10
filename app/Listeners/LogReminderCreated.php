<?php

namespace App\Listeners;

use App\Events\EventsReminderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class LogReminderCreated implements ShouldQueue
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
        Log::info("Lembrete {$event->nameReminder} criado com sucesso.");
    }
}
