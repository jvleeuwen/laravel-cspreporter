<?php

namespace Jvleeuwen\Cspreporter;

class Cspreporter extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cspreporter';
    }
}