<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;

class GoogleHomeService
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('hass.google_home_base_url'),
            'timeout'  => 2.0,
        ]);

        $this->headers = [
            'Accept'        => 'application/json',
        ];
    }

    public function run(string $command)
    {
        dump('running');
        $body = ['user' => 'bjornmulder', 'command' => $command];
        $response = $this->client->request('POST', '/assistant',
            ['headers' => $this->headers, 'body' => json_encode($body)]
        );
        dump('posted');

        return $response->getBody()->getContents();
    }

}
