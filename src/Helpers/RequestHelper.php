<?php

namespace Crenata\AffiliateConnector\Helpers;

use Crenata\AffiliateConnector\Constants\HttpMethodConstant;
use Crenata\AffiliateConnector\Facades\ConnectorResponse;
use Crenata\AffiliateConnector\Interfaces\RequestHelperInterface;
use Illuminate\Support\Facades\Http;

class RequestHelper implements RequestHelperInterface {
    /**
     * Url request
     *
     * @var string
     */
    protected $url;

    /**
     * Method request
     *
     * @var string
     */
    protected $method = HttpMethodConstant::GET;

    /**
     * Body request
     *
     * @var array
     */
    protected $body = [];

    /**
     * Timeout request in sec
     *
     * @var int
     */
    protected $timeout = 5;

    /**
     * Options request
     *
     * @var array
     */
    protected $options = [];

    /**
     * @return $this
     */
    public function getInstance() {
        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method) {
        $this->method = $method;

        return $this;
    }

    /**
     * @param array $body
     * @return $this
     */
    public function setBody($body) {
        $this->body = $body;

        return $this;
    }

    /**
     * @param int $timeout
     * @return $this
     */
    public function setTimeout($timeout) {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options) {
        $this->options = $options;

        return $this;
    }

    /**
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function send() {
        if (empty($this->url)) return ConnectorResponse::getInstance()
            ->setMessage("Use setUrl() function")
            ->setStatus(500)
            ->send();

        $token = env("CONNECTOR_CLIENT");
        if (empty($token)) return ConnectorResponse::getInstance()
            ->setMessage("Please add CONNECTOR_CLIENT to .env file by using 'php artisan connector:generate'")
            ->setStatus(500)
            ->send();

        try {
            if ($this->method === HttpMethodConstant::POST ||
                $this->method === HttpMethodConstant::PUT ||
                $this->method === HttpMethodConstant::PATCH
            ) {
                $body = "form_params";
            } else {
                $body = "query";
            }
            return Http::withToken($token)
                ->connectTimeout($this->timeout)
                ->timeout($this->timeout)
                ->withOptions($this->options)
                ->send($this->method, $this->url, [
                    $body => $this->body
                ])
                ->json();
        } catch (\Exception $e) {
            return ConnectorResponse::getInstance()
                ->setMessage($e->getMessage())
                ->setTrace($e->getTrace())
                ->setStatus(500)
                ->send();
        }
    }
}
