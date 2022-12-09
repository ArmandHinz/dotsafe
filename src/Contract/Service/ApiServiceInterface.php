<?php

namespace App\Contract\Service;

interface ApiServiceInterface
{
    /**
     * @return mixed
     */
    public function getList();

    /**
     * @param int $id
     * @return mixed
     */
    public function getItem(int $id);
}