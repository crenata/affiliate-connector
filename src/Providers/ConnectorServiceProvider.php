<?php

namespace Crenata\AffiliateConnector\Providers;

use Crenata\AffiliateConnector\Console\Commands\GenerateConnector;
use Crenata\AffiliateConnector\Helpers\RequestHelper;
use Crenata\AffiliateConnector\Helpers\ResponseHelper;
use Crenata\AffiliateConnector\Helpers\UrlHelper;
use Crenata\AffiliateConnector\Http\Middleware\ConnectorMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ConnectorServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot() {
        if ($this->app->runningInConsole()) {
            $this->registerPublish();
        }
        $this->registerFacades();
        $this->registerMiddleware();
        $this->registerRoutes();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->commands([
            GenerateConnector::class
        ]);
    }

    /**
     * Register any publish.
     *
     * @return void
     */
    public function registerPublish() {
        $this->publishes([
            __DIR__ . "/../Config/connector.php" => config_path("connector.php")
        ], "connector-config");
    }

    /**
     * Register any facades.
     *
     * @return void
     */
    public function registerFacades() {
        $this->app->singleton("ConnectorRequest", function () {
            return new RequestHelper();
        });
        $this->app->singleton("ConnectorResponse", function () {
            return new ResponseHelper();
        });
        $this->app->singleton("ConnectorUrl", function () {
            return new UrlHelper();
        });
    }

    /**
     * Register any middleware.
     *
     * @return void
     */
    public function registerMiddleware() {
        $this->app["router"]->aliasMiddleware(config("connector.middleware", "connector"), ConnectorMiddleware::class);
    }

    /**
     * Register any routes.
     *
     * @return void
     */
    public function registerRoutes() {
        Route::middleware(config("connector.middleware", "connector"))
            ->prefix(config("connector.route.prefix", "connector"))
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . "/../Routes/connector.php");
            });
    }
}