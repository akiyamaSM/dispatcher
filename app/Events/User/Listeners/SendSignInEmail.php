<?php

namespace App\Events\User\Listeners;
use App\Events\Event;
use App\Events\Listener;



class SendSignInEmail extends Listener{

    /**
     * @param Event $event
     * @return mixed
     */
    public function handle(Event $event)
    {
        echo "Sending Email To {$event->user->email}";
    }
}