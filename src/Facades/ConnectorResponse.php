<?php

namespace Crenata\AffiliateConnector\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static $this getInstance()
 * @method $this response(object $response)
 * @method array|string|null getData()
 * @method $this setData(array|string|null $data)
 * @method string getMessage()
 * @method $this setMessage(string $message)
 * @method array|null getTrace()
 * @method $this setTrace(array|null $trace)
 * @method bool isSuccess()
 * @method int getStatus()
 * @method $this setStatus(int $status)
 * @method array toArray()
 * @method \Illuminate\Http\JsonResponse send()
 */
class ConnectorResponse extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor() {
        return "ConnectorResponse";
    }
}