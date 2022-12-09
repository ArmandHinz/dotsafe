<?php

namespace App\Contract\Service;

use App\Dto\TechnologieDto;

interface ApiTechnologieServiceInterface
{
    /**
     * @param TechnologieDto $dto
     * @return array
     */
    public function createItem(TechnologieDto $dto): array;

    /**
     * @param int $memberId
     * @param TechnologieDto $dto
     * @return array
     */
    public function updateItem(int $memberId, TechnologieDto $dto): array;

    /**
     * @param int $technologieId
     * @return void
     */
    public function deleteItem(int $technologieId): void;
}