<?php
/**
 * OrderEventSubscriber.php
 * Created by @anonymoussc on 03/25/2018 9:21 PM.
 */

namespace Api\Order\Listeners;

class OrderEventSubscriber
{
    public function subscribe($events)
    {
        $events->listen('user.login', 'Api\User\Listeners\LoginEventSubscriber@onUserLogin', 10);
    }

    public function onUserLogin()
    {

    }
}