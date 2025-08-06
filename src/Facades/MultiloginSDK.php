<?php

namespace ChrisReedIO\MultiloginSDK\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\MultiloginSDK\MultiloginSDK
 */
class MultiloginSDK extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ChrisReedIO\MultiloginSDK\MultiloginSDK::class;
    }
}
