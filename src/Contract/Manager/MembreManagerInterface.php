<?php

namespace App\Contract\Manager;

use App\Entity\Membre;

interface MembreManagerInterface
{
    /**
     * @return Membre[]
     */
    public function findAll(): array;

}