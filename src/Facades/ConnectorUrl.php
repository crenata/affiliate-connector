<?php

namespace Crenata\AffiliateConnector\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static $this getInstance()
 * @method $this affiliate()
 * @method $this integrated()
 * @method string getUrl(string $uri)
 */
class ConnectorUrl extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor() {
        return "ConnectorUrl";
    }
}