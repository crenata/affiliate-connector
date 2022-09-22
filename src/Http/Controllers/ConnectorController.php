<?php

namespace Crenata\AffiliateConnector\Http\Controllers;

use Crenata\AffiliateConnector\Facades\ConnectorResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ConnectorController extends Controller {
    public function getProducts(Request $request) {
        return ConnectorResponse::getInstance()->send();
    }
    public function getProductWithIds(Request $request) {
        return ConnectorResponse::getInstance()->send();
    }
    public function findProduct(Request $request) {
        return ConnectorResponse::getInstance()->send();
    }
}