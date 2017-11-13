<?php

declare(strict_types=1);

namespace Jvleeuwen\Cspreporter\Facades;

use Illuminate\Support\Facades\Facade;

class Cspreporter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cspreporter.cspreporter';
    }
}
