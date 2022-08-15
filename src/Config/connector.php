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
            "controller" => "Crenata\AffiliateConnector\Http\Controllers\ProductController@getProducts"
        ]
    ]
];