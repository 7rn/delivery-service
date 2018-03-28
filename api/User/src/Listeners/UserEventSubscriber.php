<?php
/**
 * UserEventSubscriber.php
 * Created by @anonymoussc on 03/25/2018 9:18 PM.
 */

namespace Api\User\Listeners;

class UserEventSubscriber
{
    public function subscribe($events)
    {
        $events->listen('user.login', 'Api\User\Listeners\LoginEventSubscriber@onUserLogin', 10);
    }

    public function onUserLogin()
    {

    }
}