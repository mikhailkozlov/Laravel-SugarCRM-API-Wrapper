<?php namespace  Sugarcrm\Api\Facades;

use Illuminate\Support\Facades\Facade;

class SugarApi extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'sugarapi'; }

}