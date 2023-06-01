<?php

namespace Danielsmelo\Pagarme\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Danielsmelo\Pagarme\Pagarme
 */
class Pagarme extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Danielsmelo\Pagarme\Pagarme::class;
    }
}
