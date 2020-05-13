<?php

declare(strict_types=1);

namespace App\Service;


use App\Interfaces\ApiClient;

class VilniusApiService
{
    protected ApiClient $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function getContainers($limit = 5000, $dateFrom = null, $dateTo = null)
    {
        $params = [
            'query' => ['limit' => $limit]
        ];


        $this->client->get('container-service');
    }

}