<?php

namespace Amranidev\Ajaxis;

use Illuminate\Support\ServiceProvider;

/**
 * class AjaxisServiceProvider.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class AjaxisServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Ajaxis', function () {
            return new AjaxisGenerate();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../public' => public_path(),
        ], 'public');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'Ajaxis');
    }
}
