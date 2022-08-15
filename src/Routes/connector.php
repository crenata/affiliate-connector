<?php

use Crenata\AffiliateConnector\Constants\HttpMethodConstant;
use Illuminate\Support\Facades\Route;

foreach (config("connector.api", []) as $api) {
    switch ($api["method"]) {
        case HttpMethodConstant::POST:
            Route::post($api["url"], $api["controller"]);
            break;
        case HttpMethodConstant::PUT:
            Route::put($api["url"], $api["controller"]);
            break;
        case HttpMethodConstant::PATCH:
            Route::patch($api["url"], $api["controller"]);
            break;
        case HttpMethodConstant::DELETE:
            Route::delete($api["url"], $api["controller"]);
            break;
        case HttpMethodConstant::OPTIONS:
            Route::options($api["url"], $api["controller"]);
            break;
        default:
            Route::get($api["url"], $api["controller"]);
            break;
    }
}