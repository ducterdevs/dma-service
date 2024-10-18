<?php

namespace Ducterdevs\DucterMasterAuthentication\Facades;

use Illuminate\Support\Facades\Facade;

class DMA extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ducterdevs\DucterMasterAuthentication\DMA::class;
    }
}