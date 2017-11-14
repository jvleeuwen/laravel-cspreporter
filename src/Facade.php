<?php

namespace Jvleeuwen\Cspreporter;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cspreporter';
    }
}
