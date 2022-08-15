<?php

namespace Crenata\AffiliateConnector\Http\Middleware;

use Closure;
use Crenata\AffiliateConnector\Facades\ConnectorResponse;
use Illuminate\Http\Request;
use kornrunner\Ethereum\Address;

class ConnectorMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next (\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next) {
        $token = $request->bearerToken();
        if (empty($token)) return ConnectorResponse::getInstance()
            ->setMessage("Unauthenticated")
            ->setStatus(401)
            ->send();

        try {
            $addr = new Address($token);
            $address = strtolower($addr->get());
            $generatedAddress = env("CONNECTOR_SERVER");

            if (empty($generatedAddress)) return ConnectorResponse::getInstance()
                ->setMessage("Please add CONNECTOR_SERVER to .env file by using 'php artisan connector:generate'")
                ->setStatus(500)
                ->send();

            if (strtolower($generatedAddress) !== $address) return ConnectorResponse::getInstance()
                ->setMessage("Unauthenticated")
                ->setStatus(401)
                ->send();

            return $next($request);
        } catch (\Exception $e) {
            return ConnectorResponse::getInstance()
                ->setMessage("Unauthenticated")
                ->setStatus(401)
                ->send();
        }
    }
}
