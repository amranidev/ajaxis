<?php

namespace Amranidev\Ajaxis\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return ['Amranidev\Ajaxis\AjaxisServiceProvider'];
    }
}
