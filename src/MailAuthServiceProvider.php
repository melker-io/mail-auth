<?php

namespace Melkerio\MailAuth;

use Illuminate\Support\ServiceProvider;

class MailAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        // $this->loadViewsFrom(__DIR__.'/../views', 'mail-auth');
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->mergeConfigFrom(
            __DIR__.'/../mail-auth.php', 'mail-auth'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mailAuth', function() {
            return new MailAuth;
        });
    }
}
