<?php
namespace Amranidev\Ajaxis;
use Illuminate\Support\Facades\Facade;

class Ajaxis extends Facade
{
    
    protected static function getFacadeAccessor() {
        return 'Amranidev\Ajaxis\AjaxisGenerate';
    }
}

