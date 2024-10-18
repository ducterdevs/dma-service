<?php

namespace Ducterdevs\DucterMasterAuthentication\Http\Middleware;

use Closure;
use Ducterdevs\DucterMasterAuthentication\Services\DucterMasterAuthenticationService;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class DMAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (is_null(Config::get('dma.base_uri')) || is_null(Config::get('dma.api_endpoint'))) {
            throw new Exception(__('The Ductermaster authentication service is not configured.'));
        }

        $token = $request->bearerToken();

        // Abort if token is missing
        if (is_null($token)) {
            throw new AuthenticationException(__('Unauthenticated.'));
        }

        try {
            $client = DucterMasterAuthenticationService::createFromApplication($token);

            $response =  $client->me();
        } catch (\Throwable $th) {
            throw $th;
        }

        if ($response->unauthorized()) {
            throw new AuthenticationException(__('Unauthenticated.'));
        }

        if ($response->successful()) {
            $user =  (object)   $response->collect('data')->toArray();

            $request->setUserResolver(function () use ($user) {
                return $user;
            });
        }

        return $next($request);
    }
}
