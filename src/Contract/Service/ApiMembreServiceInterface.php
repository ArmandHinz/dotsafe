<?php

namespace App\Contract\Service;

use App\Dto\MembreDto;
use App\Entity\Technologie;

interface ApiMembreServiceInterface
{
    /**
     * @param Technologie|null $technologie
     * @return array
     */
    public function findWithFilters(?Technologie $technologie): array;

    /**
     * @param MembreDto $dto
     * @return array
     */
    public function createItem(MembreDto $dto): array;

    /**
     * @param int $memberId
     * @param MembreDto $dto
     * @return array
     */
    public function updateItem(int $memberId, MembreDto $dto): array;

    /**
     * @param int $memberId
     * @return void
     */
    public function deleteItem(int $memberId): void;
}