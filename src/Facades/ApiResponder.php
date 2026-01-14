<?php

namespace Alamindev27\ApiResponder\Facades;

use Illuminate\Support\Facades\Facade;

class ApiResponder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api-responder';
    }
}
