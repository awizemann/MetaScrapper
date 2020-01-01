<?php

namespace hojjabr\MetaScrapper\Facades;

use Illuminate\Support\Facades\Facade;

class MetaScrapper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'metascrapper';
    }
}
