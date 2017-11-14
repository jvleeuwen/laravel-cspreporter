<?php

namespace Jvleeuwen\Cspreporter;

use Illuminate\Support\Facades\Facade;

class CspreporterFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cspreporter';
    }
}
