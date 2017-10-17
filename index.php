<?php

use App\Events\Dispatcher;
use App\Events\User\Listeners\ChangeDateAfterSignIn;
use App\Events\User\Listeners\SendSignInEmail;
use App\Events\User\UserSignedIn;
use App\Models\User;

require_once 'vendor/autoload.php';

$user = new User();
$user->id = 1;
$user->name = "El Houssain INANI";
$user->email = "inanielhoussain@gmail.com";

$event = new UserSignedIn($user);
$dispatcher = new Dispatcher();

$dispatcher->addListeners(
    $event->getName(),
    new SendSignInEmail()
);
$dispatcher->addListeners(
    $event->getName(),
    new ChangeDateAfterSignIn()
);
$dispatcher->dispatch($event);