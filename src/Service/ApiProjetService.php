<?php

namespace App\Service;

use App\Contract\Service\ApiProjetServiceInterface;
use App\Contract\Service\ApiServiceInterface;
use App\Dto\ProjetDto;
use App\Entity\Contribution;
use App\Entity\Technologie;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiProjetService extends AbstractApiService implements ApiServiceInterface, ApiProjetServiceInterface
{
    public const API_ROUTE = '/api/projets/';

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

    /**
     * @inheritDoc
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function findWithFilters(?Technologie $technologie, ?Contribution $contribution): array
    {
        $response = $this->client->request(
            'GET',
            $this->host . self::API_ROUTE, array(
                'headers' => array(
                    'Accept' => 'application/json',
                ),
                'body' => array(
                    'technologies.nom' => $technologie?->getId(),
                    'contributions.membre.email' => $contribution?->getId()
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
    public function createItem(ProjetDto $dto): array
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
    public function updateItem(int $memberId, ProjetDto $dto): array
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
    public function deleteItem(int $projetId): void
    {
        $this->client->request(
            'DELETE',
            $this->host . self::API_ROUTE .$projetId , [
                'headers' => array(
                    'Accept' => 'application/json',
                )
            ]
        );
    }

    /**
     * @param ProjetDto $dto
     * @return array
     */
    private function getBody(ProjetDto $dto): array
    {
        return array(
            "nom" => $dto->getNom(),
            "contributions" => $dto->getContributions(),
        );
    }
}