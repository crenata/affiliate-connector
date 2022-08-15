<?php

namespace Crenata\AffiliateConnector\Interfaces;

interface RequestHelperInterface {
    /**
     * @return $this
     */
    public function getInstance();

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl($url);

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method);

    /**
     * @param int $timeout
     * @return $this
     */
    public function setTimeout($timeout);

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options);

    /**
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function send();
}