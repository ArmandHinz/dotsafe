<?php

namespace App\Dto;

class ProjetDto
{
    /**
     * @var string
     */
    private string $nom;
    /**
     * @var array
     */
    private array $contributions;
    /**
     * @var array
     */
    private array $technologies;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return ProjetDto
     */
    public function setNom(string $nom): ProjetDto
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return array
     */
    public function getContributions(): array
    {
        return $this->contributions;
    }

    /**
     * @param array $contributions
     * @return ProjetDto
     */
    public function setContributions(array $contributions): ProjetDto
    {
        $this->contributions = $contributions;
        return $this;
    }

    /**
     * @return array
     */
    public function getTechnologies(): array
    {
        return $this->technologies;
    }

    /**
     * @param array $technologies
     * @return ProjetDto
     */
    public function setTechnologies(array $technologies): ProjetDto
    {
        $this->technologies = $technologies;
        return $this;
    }
}