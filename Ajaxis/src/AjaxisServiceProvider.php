<?php
namespace Amranidev\Ajaxis;
use Illuminate\Support\ServiceProvider;
use Amranidev\Ajaxis\AjaxisGenerate;
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