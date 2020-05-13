<?php

declare(strict_types=1);

namespace App\Client;


use App\Interfaces\ApiClient;
use GuzzleHttp\Client;
use function GuzzleHttp\Promise\queue;
use GuzzleHttp\Psr7\Response;

class VilniusApiClient implements ApiClient
{
    protected string $apiUrl;

    protected Client $client;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        $this->client = new Client();
    }

    public function get(string $path, array $params = []): Response
    {
        $this->client->request('GET', $this->apiUrl . $path, $params);
    }
}