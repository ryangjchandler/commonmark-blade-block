<?php

namespace RyanChandler\CommonmarkBladeBlock\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use RyanChandler\CommonmarkBladeBlock\CommonmarkBladeBlockServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CommonmarkBladeBlockServiceProvider::class,
        ];
    }
}
