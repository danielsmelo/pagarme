<?php

namespace Danielsmelo\Pagarme\Tests;

use Danielsmelo\Pagarme\PagarmeServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            PagarmeServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'pagarme' => Pagarme::class,
        ];
    }
}
