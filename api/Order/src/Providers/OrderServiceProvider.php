<?php

namespace Api\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Api\Order\Repositories\Orders\OrderRepository;

class OrderServiceProvider extends ServiceProvider
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
        $dispatcher->subscribe('Api\Order\Listeners\OrderEventSubscriber');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Api\Order\Repositories\OrderRepositoryInterface', function ($app) {
            return new OrderRepository();
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
            __DIR__.'/../../Config/config.php' => config_path('order.php'),
        ],'config-order');
        $this->mergeConfigFrom(
            __DIR__.'/../../Config/config.php', 'order'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/components/order');

        $sourcePath = __DIR__.'/../../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/components/order';
        }, \Config::get('view.paths')), [$sourcePath]), 'order');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/components/order');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'order');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../../Resources/lang', 'order');
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
