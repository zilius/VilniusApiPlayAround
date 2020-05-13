<?php

declare(strict_types=1);

namespace App\Client;

use App\Interfaces\ApiClient;
use Exception;
use GuzzleHttp\Client;

class VilniusApiClient implements ApiClient
{

    /** @var string $apiUrl */
    protected string $apiUrl;

    /** @var Client $client */
    protected Client $client;

    /**
     * VilniusApiClient constructor.
     * @param string $apiUrl
     */
    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        $this->client = new Client();
    }

    /**
     * @param string $path
     * @param array $params
     * @return array
     * @throws Exception on non 200 response
     */
    public function get(string $path, array $params = []): array
    {
        $params['headers'] = [
            'Accept' => '*/*',
            'X-CSRF-TOKEN' => '',
        ];

        $url = $this->apiUrl . $path;
        $response = $this->client->request('GET', $url, $params);

        if ($response->getStatusCode() === 200) {
            $responseBody = json_decode((string)$response->getBody(), true);
            return $responseBody;
        } else {
            throw new Exception("Request failed");
        }
    }
}