<?php

namespace Fahadalihyd\Payprov2;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fahadalihyd\Payprov2\Skeleton\SkeletonClass
 */
class Payprov2Facade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'payprov2';
    }
}
