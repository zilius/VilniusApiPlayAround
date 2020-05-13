<?php

declare(strict_types=1);

namespace App\Interfaces;

use GuzzleHttp\Psr7\Response;

interface ApiClient
{
    public function get(string $path, array $params = []) : Response;
}