<?php

namespace App\Contract\Service;

use App\Dto\ProjetDto;
use App\Entity\Contribution;
use App\Entity\Technologie;

interface ApiProjetServiceInterface
{
    /**
     * @param Technologie|null $technologie
     * @param Contribution|null $contribution
     * @return array
     */
    public function findWithFilters(?Technologie $technologie, ?Contribution $contribution): array;

    /**
     * @param ProjetDto $dto
     * @return array
     */
    public function createItem(ProjetDto $dto): array;

    /**
     * @param int $memberId
     * @param ProjetDto $dto
     * @return array
     */
    public function updateItem(int $memberId, ProjetDto $dto): array;

    /**
     * @param int $projetId
     * @return void
     */
    public function deleteItem(int $projetId): void;
}