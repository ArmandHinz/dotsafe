<?php

namespace App\Service;

use App\Entity\Contribution;
use App\Entity\Technologie;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiContributionService extends AbstractApiService
{
    public const API_ROUTE = '/api/contributions/';

    /**
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getList() {
        $response = $this->client->request(
            'GET',
            $this->host . self::API_ROUTE, array(
                'headers' => array(
                    'Accept' => 'application/json',
                ),
            )
        );
        return $response->toArray();
    }

    /**
     * @param int $id
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getItem(int $id) {
        $response = $this->client->request(
            'GET',
            $this->host . self::API_ROUTE . $id, [
                'headers' => array(
                    'Accept' => 'application/json',
                )
            ]
        );
        return $response->toArray();
    }
}