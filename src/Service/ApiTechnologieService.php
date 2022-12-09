<?php

namespace App\Service;

use App\Contract\Service\ApiServiceInterface;
use App\Contract\Service\ApiTechnologieServiceInterface;
use App\Dto\TechnologieDto;
use App\Entity\Technologie;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiTechnologieService extends AbstractApiService implements ApiServiceInterface, ApiTechnologieServiceInterface
{
    public const API_ROUTE = '/api/technologies/';

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
    public function createItem(TechnologieDto $dto): array
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
    public function updateItem(int $memberId, TechnologieDto $dto): array
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
    public function deleteItem(int $technologieId): void
    {
        $this->client->request(
            'DELETE',
            $this->host . self::API_ROUTE . $technologieId , [
                'headers' => array(
                    'Accept' => 'application/json',
                )
            ]
        );
    }

    /**
     * @param TechnologieDto $dto
     * @return array
     */
    private function getBody(TechnologieDto $dto): array
    {
        return array(
            "nom" => $dto->getNom(),
            "contributions" => $dto->getContributions(),
            "projets" => $dto->getProjets()
        );
    }
}