<?php

namespace Api\User\Providers;

use Illuminate\Support\ServiceProvider;
use Api\User\Repositories\Login\LoginRepository;
use Api\User\Repositories\Users\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();

        $this->loadMigrationsFrom(__DIR__.'/../../Database/Migrations');

        $dispatcher = $this->app->make('events');
        $dispatcher->subscribe('App\Components\Passerby\Listeners\LoginEventSubscriber');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Api\User\Repositories\LoginRepositoryInterface', function ($app) {
            return new LoginRepository();
        });

        $this->app->bind('Api\User\Repositories\UserRepositoryInterface', function ($app) {
            return new UserRepository();
        });
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../../Config/config.php' => config_path('user.php'),
        ],'config-user');
        $this->mergeConfigFrom(
            __DIR__.'/../../Config/config.php', 'user'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/components/user');

        $sourcePath = __DIR__.'/../../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/components/user';
        }, \Config::get('view.paths')), [$sourcePath]), 'user');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/components/user');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'user');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../../Resources/lang', 'user');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
