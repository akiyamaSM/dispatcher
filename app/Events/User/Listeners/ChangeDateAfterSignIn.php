<?php
namespace App\Events\User\Listeners;

use App\Events\Event;
use App\Events\Listener;

class ChangeDateAfterSignIn extends Listener{

    /**
     * @param Event $event
     * @return mixed
     */
    public function handle(Event $event)
    {
        echo "Changing Sign In date to now";
    }
}