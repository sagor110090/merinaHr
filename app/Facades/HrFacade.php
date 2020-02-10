<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class HrFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Hr';
    }

}
