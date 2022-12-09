<?php

namespace App\Contract\Manager;

use App\Entity\Membre;

interface ProjetManagerInterface
{
    /**
     * @return Membre[]
     */
    public function findAll(): array;

}