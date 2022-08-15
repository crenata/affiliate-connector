<?php

namespace Crenata\AffiliateConnector\Interfaces;

interface ResponseHelperInterface {
    /**
     * @return $this
     */
    public function getInstance();

    /**
     * @return array|string|null
     */
    public function getData();

    /**
     * @param array|string|null $data
     * @return $this
     */
    public function setData($data);

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message);

    /**
     * @return array|null
     */
    public function getTrace();

    /**
     * @param array|null $trace
     * @return $this
     */
    public function setTrace($trace);

    /**
     * @return bool
     */
    public function isSuccess();

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * @param object $response
     * @return $this
     */
    public function response($response);

    /**
     * @return array
     */
    public function toArray();

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function send();
}