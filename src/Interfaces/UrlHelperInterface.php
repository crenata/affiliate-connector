<?php

namespace Crenata\AffiliateConnector\Interfaces;

interface UrlHelperInterface {
    /**
     * @return $this
     */
    public function getInstance();

    /**
     * @return $this
     */
    public function affiliate();

    /**
     * @return $this
     */
    public function integrated();

    /**
     * @param string $uri
     * @return string
     */
    public function getUrl($uri);
}