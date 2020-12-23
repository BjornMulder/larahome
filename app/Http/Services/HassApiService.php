<?php

declare(strict_types=1);

namespace App\Http\Services;

use GuzzleHttp\Client;

class HassApiService
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('hass.api_base_url'),
            'timeout'  => 2.0,
        ]);

        $this->headers = [
            'Authorization' => 'Bearer ' . config('hass.api_token'),
            'Accept'        => 'application/json',
        ];
    }

    public function get(string $path, array $query = [])
    {
        $response = $this->client->request('GET', $path,
            ['headers' => $this->headers, 'query' => $query]
        );

        return $response->getBody()->getContents();
    }

    public function callService(string $domain, string $service, array $body = [])
    {
        $response = $this->client->request('POST', '/api/services/' . $domain . '/' . $service,
            ['headers' => $this->headers, 'body' => json_encode($body)]
        );

        return $response->getBody()->getContents();
    }
}
