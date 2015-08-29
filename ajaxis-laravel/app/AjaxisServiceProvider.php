<?php
use Illuminate\Support\ServiceProvider;
class AjaxisServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('Ajaxis', function(){
            return new AjaxisGenerate();
        });
    }
}