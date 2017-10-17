<?php

use App\Models\User;

require_once 'vendor/autoload.php';

$user = new User();
$user->id = 1;
$user->name = "El Houssain INANI";
$user->email = "inanielhoussain@gmail.com";

$event = new \App\Events\User\UserSignedIn($user);
$dispatcher = new \App\Events\Dispatcher();

$dispatcher->addAction($event->getName(), new \App\Events\User\Listeners\SendSignInEmail());
$dispatcher->action($event->getName());