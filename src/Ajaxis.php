<?php

namespace Amranidev\Ajaxis;

use Illuminate\Support\Facades\Facade;

/**
 * class Ajaxis.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Ajaxis extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Amranidev\Ajaxis\AjaxisGenerate';
    }
}
