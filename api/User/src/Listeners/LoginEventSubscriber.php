<?php
/**
 * LoginEventSubscriber.php
 * Created by @anonymoussc on 03/25/2018 9:17 PM.
 */

namespace Api\User\Listeners;

class LoginEventSubscriber
{
    public function subscribe($events)
    {
        $events->listen('user.login', 'Api\User\Listeners\LoginEventSubscriber@onUserLogin', 10);
        $events->listen('user.logout', 'Api\User\Listeners\Listeners\LoginEventSubscriber@onUserLogout', 10);
        $events->listen('user.register', 'Api\User\Listeners\LoginEventSubscriber@onUserRegister', 10);
        $events->listen('user.resend', 'Api\User\Listeners\Listeners\LoginEventSubscriber@resend', 10);
        $events->listen('user.reset', 'Api\User\Listeners\Listeners\LoginEventSubscriber@passwordReset', 10);
    }

    public function onUserLogin()
    {

    }

    public function onUserLogout()
    {

    }

    public function onUserRegister()
    {

    }

    public function resend()
    {

    }

    public function passwordReset()
    {

    }
}