<?php

use Crenata\AffiliateConnector\Constants\HttpMethodConstant;

return [
    "middleware" => "connector",

    "route" => [
        "prefix" => "connector"
    ],

    "api" => [
        [
            "method" => HttpMethodConstant::GET,
            "url" => "products",
            "controller" => "Crenata\AffiliateConnector\Http\Controllers\ConnectorController@getProducts"
        ],
        [
            "method" => HttpMethodConstant::GET,
            "url" => "product-with-ids",
            "controller" => "Crenata\AffiliateConnector\Http\Controllers\ConnectorController@getProductWithIds"
        ],
        [
            "method" => HttpMethodConstant::GET,
            "url" => "find-product",
            "controller" => "Crenata\AffiliateConnector\Http\Controllers\ConnectorController@findProduct"
        ]
    ],

    "affiliate_url" => [
        "base" => "http://localhost:8001/api/v1/",
        "submit_transaction" => "transaction/submit"
    ],

    "integrated_url" => [
        "base" => "http://localhost:8000/api/v1/"
    ]
];