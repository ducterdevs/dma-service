<?php

namespace Ducterdevs\DucterMasterAuthentication\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class DucterMasterAuthenticationService
{
    public function __construct(public string $token,public string $appKey) {}

    /**
     * Show User authenticated
     */
    public function me() {
        return $this->request('/me');
    }

    /**
     * Creates the simpliroute client from the LDC
     */
    public static function createFromApplication($token) {

        $appKey = Config::get('app.key');

        return new DucterMasterAuthenticationService($token,$appKey);
    }

    /**
     * Makes the request
     *
     * @param string $endpoint
     * @param string $method
     * @param array $payload
     * @param string $baseUri
     * @return \Illuminate\Http\Client\Response
     */
    private function request($endpoint, $method = 'get', $payload = null, $baseUri = null, $timeout = null)
    {
        $_baseUri = Config::get('dma.api_endpoint');

        if ($baseUri) {
            $_baseUri = $baseUri;
        }

        $url = "{$_baseUri}{$endpoint}";

        $http = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Application-Id' => $this->appKey
        ])->withToken($this->token);

        if ($timeout !== null) {
            $http->timeout($timeout);
        }

        $response = $http->$method($url, $payload);

        return $response;
    }
}
