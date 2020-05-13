<?php

declare(strict_types=1);

namespace App\Service;


use App\Interfaces\ApiClient;

class VilniusApiService
{
    /** @var ApiClient $client */
    protected ApiClient $client;

    /**
     * VilniusApiService constructor.
     * @param ApiClient $client
     */
    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string|null $dateFrom
     * @param string|null $dateTo
     * @param string|null $pageNumber
     * @return array
     */
    public function getContainers(string $dateFrom = null, string $dateTo = null, string $pageNumber = null): array
    {
        $params = [
            'query' => ['limit' => 20]
        ];

        if ($dateFrom) {
            $params['query']['service_date_from'] = $dateFrom;
        }

        if ($dateTo) {
            $params['query']['service_date_to'] = $dateTo;
        }

        if ($pageNumber) {
            $params['query']['page'] = $pageNumber;
        }

        return $this->client->get('waste-managment/container-service', $params);
    }

    /**
     * @param string $container_code
     * @param null $pageNumber
     * @return array
     */
    public function getContainer(string $container_code, $pageNumber = null): array
    {
        $params = [
            'query' => ['limit' => 20, 'container_code' => $container_code]
        ];

        if ($pageNumber) {
            $params['query']['page'] = $pageNumber;
        }


        return $this->client->get('waste-managment/container-service', $params);
    }

}