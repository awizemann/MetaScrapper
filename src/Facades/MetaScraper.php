<?php

namespace rookmoot\MetaScraper\Facades;

use Illuminate\Support\Facades\Facade;

class MetaScraper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'metascraper';
    }
}
