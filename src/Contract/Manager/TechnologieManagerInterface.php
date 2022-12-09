<?php

namespace App\Contract\Manager;

use App\Entity\Technologie;

interface TechnologieManagerInterface
{
    /**
     * @return Technologie[]
     */
    public function findAll(): array;

}