<?php

namespace Crenata\AffiliateConnector\Helpers;

use Crenata\AffiliateConnector\Interfaces\ResponseHelperInterface;
use Illuminate\Http\JsonResponse;

class ResponseHelper implements ResponseHelperInterface {
    /**
     * Response when success
     *
     * @var array|string|null
     */
    protected $data;

    /**
     * Response message from server
     *
     * @var string
     */
    protected $message = "Success";

    /**
     * Return trace when error
     * Available on mode debug only
     *
     * @var array|null
     */
    protected $trace = null;

    /**
     * Return true if success
     *
     * @var bool
     */
    protected $success = true;

    /**
     * Return response code
     *
     * @var int
     */
    protected $status = 200;

    /**
     * @return $this
     */
    public function getInstance() {
        return $this;
    }

    /**
     * @return array|string|null
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param array|string|null $data
     * @return $this
     */
    public function setData($data) {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getTrace() {
        return $this->trace;
    }

    /**
     * @param array|null $trace
     * @return $this
     */
    public function setTrace($trace) {
        $this->trace = $trace;
        $this->success = empty($trace);

        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccess() {
        return $this->success;
    }

    /**
     * @return int
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * @param array|mixed $response
     * @return $this
     */
    public function response($response) {
        if ($response instanceof JsonResponse) {
            $response = $response->getOriginalContent();
        }

        $this->data = $response["data"];
        $this->message = $response["message"];
        $this->trace = $response["trace"];
        $this->success = $response["status"] === 200;
        $this->status = $response["status"];

        return $this;
    }

    /**
     * @return array
     */
    public function toArray() {
        return [
            "data" => $this->getData(),
            "message" => $this->getMessage(),
            "trace" => env("APP_DEBUG") ? $this->getTrace() : null,
            "success" => $this->getStatus() === 200,
            "status" => $this->getStatus()
        ];
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function send() {
        return response()->json($this->toArray(), $this->status);
    }
}
