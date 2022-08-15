<?php

namespace Crenata\AffiliateConnector\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static $this getInstance()
 * @method $this setUrl(string $url)
 * @method $this setMethod(string $method)
 * @method $this setTimeout(int $timeout)
 * @method $this setOptions(array $options)
 * @method \Illuminate\Http\Client\Response|\Illuminate\Http\JsonResponse send()
 */
class ConnectorRequest extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor() {
        return "ConnectorRequest";
    }
}