<?php

namespace Crenata\AffiliateConnector\Helpers;

use Crenata\AffiliateConnector\Interfaces\ResponseHelperInterface;
use Crenata\AffiliateConnector\Interfaces\UrlHelperInterface;
use Illuminate\Http\JsonResponse;

class UrlHelper implements UrlHelperInterface {
    /**
     * Config string
     *
     * @var string
     */
    protected $config = "";

    /**
     * @return $this
     */
    public function getInstance() {
        return $this;
    }

    /**
     * @return $this
     */
    public function affiliate() {
        $this->config = "affiliate_url";
        return $this;
    }

    /**
     * @return $this
     */
    public function integrated() {
        $this->config = "integrated_url";
        return $this;
    }

    /**
     * @param string $uri
     * @return string
     */
    public function getUrl($uri) {
        return config("connector.$this->config.base") . config("connector.$this->config.$uri");
    }
}
