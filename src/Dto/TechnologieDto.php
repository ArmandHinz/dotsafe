<?php

namespace App\Dto;

class TechnologieDto
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
    private array $projets;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return TechnologieDto
     */
    public function setNom(string $nom): TechnologieDto
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
     * @return TechnologieDto
     */
    public function setContributions(array $contributions): TechnologieDto
    {
        $this->contributions = $contributions;
        return $this;
    }

    /**
     * @return array
     */
    public function getProjets(): array
    {
        return $this->projets;
    }

    /**
     * @param array $projets
     * @return TechnologieDto
     */
    public function setProjets(array $projets): TechnologieDto
    {
        $this->projets = $projets;
        return $this;
    }
}