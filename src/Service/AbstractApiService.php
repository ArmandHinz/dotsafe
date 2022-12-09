<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractApiService
{
    /**
     * @var HttpClientInterface
     */
    protected HttpClientInterface $client;

    /**
     * @var string $host
     */
    protected string $host;


    public function __construct(
        HttpClientInterface $client,
        string $host
    ) {
        $this->client = $client;
        $this->host = $host;
    }
}