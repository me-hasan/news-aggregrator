<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     * @return string
     */
    public function performRequest($method)
    {
        $client = new Client([
            'base_uri' => $this->uri,
        ]);
        $response = $client->request($method);
        return $response->getBody()->getContents();
    }
}