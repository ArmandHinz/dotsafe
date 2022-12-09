<?php

namespace App\Service;

use App\Contract\Service\ApiMembreServiceInterface;
use App\Contract\Service\ApiServiceInterface;
use App\Dto\MembreDto;
use App\Entity\Technologie;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiMembreService extends AbstractApiService implements ApiServiceInterface, ApiMembreServiceInterface
{
    public const API_ROUTE = '/api/membres/';

    /**
     * @inheritDoc
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
     * @inheritDoc
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

    /**
     * @inheritDoc
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function findWithFilters(?Technologie $technologie): array
    {
        $response = $this->client->request(
            'GET',
            $this->host . self::API_ROUTE, array(
                'headers' => array(
                    'Accept' => 'application/json',
                ),
                'body' => array(
                    'contributions.technologie.nom' => $technologie?->getId()
                )
            )
        );
        return $response->toArray();
    }

    /**
     * @inheritDoc
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function createItem(MembreDto $dto): array
    {
        $response = $this->client->request(
            'POST',
            $this->host . self::API_ROUTE, [
                'headers' => array(
                    'Accept' => 'application/json',
                ),
                'body' => $this->getBody($dto)
            ]
        );
        return $response->toArray();
    }

    /**
     * @inheritDoc
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function updateItem(int $memberId, MembreDto $dto): array
    {
        $response = $this->client->request(
            'PUT',
            $this->host . self::API_ROUTE .$memberId , [
                'headers' => array(
                    'Accept' => 'application/json',
                ),
                'body' => $this->getBody($dto)
            ]
        );
        return $response->toArray();
    }

    /**
     * @inheritDoc
     * @throws TransportExceptionInterface
     */
    public function deleteItem(int $memberId): void
    {
        $this->client->request(
            'DELETE',
            $this->host . self::API_ROUTE .$memberId , [
                'headers' => array(
                    'Accept' => 'application/json',
                )
            ]
        );
    }

    /**
     * @param MembreDto $dto
     * @return array
     */
    private function getBody(MembreDto $dto): array
    {
        return array(
            "prenom"=> $dto->getPrenom(),
            "nom"=> $dto->getNom(),
            "email"=> $dto->getPrenom(),
            "contributions"=> $dto->getContributions()
        );
    }
}