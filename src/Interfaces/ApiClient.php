<?php

declare(strict_types=1);

namespace App\Interfaces;

interface ApiClient
{
    /**
     * @param string $path
     * @param array $params
     * @return array
     */
    public function get(string $path, array $params = []): array;
}