<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UserCreatedListener implements ShouldQueue
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
    public function handle (UserCreatedEvent $event)
    {
        \Log::info('USER_CREATED_LISTENER',[
            'user_id' => $event->user->id,
            'email' => $event->user->email,
        ]);
        \Log::info('Sending user email...');
    }
}
