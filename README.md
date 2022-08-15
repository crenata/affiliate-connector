<div align="center">

![GitHub top language](https://img.shields.io/github/languages/top/crenata/affiliate-connector)
![GitHub all releases](https://img.shields.io/github/downloads/crenata/affiliate-connector/total)
![GitHub issues](https://img.shields.io/github/issues/crenata/affiliate-connector)
![GitHub](https://img.shields.io/github/license/crenata/affiliate-connector)
![GitHub release (latest by date including pre-releases)](https://img.shields.io/github/v/release/crenata/affiliate-connector?display_name=tag&include_prereleases)

</div>

# Connector
A Laravel package as connector between Affiliate with Products.

## Warning
This package for internal purposes, any incoming issues won't be responded.

## Installation
Run these command into your laravel project folder.
```
composer require crenata/affiliate-connector
```

### Publish Configuration
You need to publish the package's config. To publish configuration, run the following command.
```
php artisan vendor:publish --tag=connector-config
```

### Generate Authentication Bridge
To secure the bridge, You must generate `secret key` and `private key` to your `server` and `client` project. To generate the key, run the following command.
```
php artisan connector:generate
```
And you will see.
```
Server : CONNECTOR_SERVER=dc6917876732a081d1d35b225aedab5bae8e5438
Client : CONNECTOR_CLIENT=ba770d272202ad9b938638687760e2ec96a7e954b19447fd5f412c615e2c7ef7

Copy the key to the .env file each projects.
```
In the server section, add `CONNECTOR_SERVER` to .env file. And also in the client section, add `CONNECTOR_CLIENT` to .env file.

## Usage
Make sure you're following these steps.

### Create Get All Product
Create your query to get all products, and change default controller in `config/connector.php` to your created controller.
```
"api" => [
    [
        "method" => HttpMethodConstant::GET,
        "url" => "products",
        "controller" => "Crenata\AffiliateConnector\Http\Controllers\ConnectorController@getProducts" // Replace with your controller.
    ],
    ...
]
```
Expected Return :
```
[
    [
        "id" => int,
        "name" => string,
        "description" => string,
        "price" => int
    ],
    ...
]
```

### Create Get Product With Ids
Create your query to get products using `WHERE id IN()`, and change default controller in `config/connector.php` to your created controller. At this request, you will receive query string with param `ids` as `string` that contains `product ids` separated by `comma`.
```
"api" => [
    [
        "method" => HttpMethodConstant::GET,
        "url" => "product-with-ids",
        "controller" => "Crenata\AffiliateConnector\Http\Controllers\ConnectorController@getProductWithIds" // Replace with your controller.
    ],
    ...
]
```
Expected Return :
```
[
    [
        "id" => int,
        "name" => string,
        "description" => string,
        "price" => int
    ],
    ...
]
```

### Create Find Product
Create your query to get product using `WHERE id`, and change default controller in `config/connector.php` to your created controller. At this request, you will receive query string with param `id` as `int`.
```
"api" => [
    [
        "method" => HttpMethodConstant::GET,
        "url" => "find-product",
        "controller" => "Crenata\AffiliateConnector\Http\Controllers\ConnectorController@findProduct" // Replace with your controller.
    ],
    ...
]
```
Expected Return :
```
[
    "id" => int,
    "name" => string,
    "description" => string,
    "price" => int
]
```

## Authors
- [Hafiizh Ghulam](mailto:hafiizh.ghulam@frisidea.com)